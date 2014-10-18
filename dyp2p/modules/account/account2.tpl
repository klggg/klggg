

{if $_A.query_type=="list"}
<div class="module_add">
	<div class="module_title"><strong>账号信息管理</strong><div style="float:right"> <a href="{$_A.query_url_all}&type=excel&page={$magic.request.page|default:0}">导出当前</a> <a href="{$_A.query_url_all}&type=excel">导出全部</a>&nbsp;&nbsp;&nbsp;</div></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td class="main_td">ID</td>
			<td class="main_td">用户名</td>
			<td class="main_td">总金额 </td>
			<td class="main_td">可用金额 </td>
			<td class="main_td">冻结金额 </td>
			<td class="main_td">待收金额</td>
			<td class="main_td">操作</td>
		</tr>
		{ list module="account" function="GetList" var="loop" username=request }
		{foreach from=$loop.list item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{$item.id}</td>
			<td>{$item.username}</td>
			<td >￥{$item.total}</td>
			<td >￥{$item.balance}</td>
			<td >￥{$item.frost}</td>
			<td >￥{$item.await}</td>
			<td ><a href="{$_A.query_url}/recharge&username={$item.username}">充值记录</a> <a href="{$_A.query_url}/cash&username={$item.username}">提现记录</a> <a href="{$_A.query_url}/log&username={$item.username}">资金记录</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="12" class="action">
			总计（可用+冻结）：{$loop.all_account|default:0.00}元
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="12" class="page">
			{$loop.pages|showpage} 
			</td>
		</tr>
		{/list}
	</form>	
</table>


<!--充值记录列表 开始-->
{elseif $_A.query_type=="recharge"}
<ul class="nav3"> 
<li><a href="{$_A.query_url_all}" id="c_so">{$MsgInfo.account_name_recharge}</a></li> 
<li><a href="{$_A.query_url_all}&status=0">{$MsgInfo.account_name_recharge_verify}</a></li> 
<li><a href="{$_A.query_url_all}&status=1">{$MsgInfo.account_name_recharge_success}</a></li> 
<li><a href="{$_A.query_url_all}&status=2" >{$MsgInfo.account_name_recharge_false}</a></li>
</ul> 

{if $magic.request.view!=""}

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>充值查看</strong></div>

	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_username}：</div>
		<div class="c">
			{ $_A.account_recharge_result.username}
		</div>
	</div>

	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_recharge_type}：</div>
		<div class="c">
			{$_A.account_recharge_result.type|linkages:"account_recharge_type"}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_nid}：</div>
		<div class="c">
			{ $_A.account_recharge_result.nid }
		</div>
	</div>
	

	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_payment}：</div>
		<div class="c">
			{ $_A.account_recharge_result.payment_name}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_recharge_money}：</div>
		<div class="c">
			￥{ $_A.account_recharge_result.money }
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">	{if $_A.account_recharge_result.type==2}
		{$MsgInfo.account_name_recharge_jiangli}：
		{else}
		{$MsgInfo.account_name_recharge_fee}：
		{/if}</div>
		<div class="c">
			￥{ $_A.account_recharge_result.fee }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_recharge_balance}：</div>
		<div class="c">
			￥{ $_A.account_recharge_result.balance }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_recharge_remark}：</div>
		<div class="c">
		{ $_A.account_recharge_result.remark }
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_recharge_status}：</div>
		<div class="c">
		{$_A.account_recharge_result.status|linkages:"account_recharge_status"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_addtime}/{$MsgInfo.account_name_addip}:</div>
		<div class="c">
			{ $_A.account_recharge_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.account_recharge_result.addip}</div>
	</div>
	
	{if $_A.account_recharge_result.status==0  }
	<div class="module_title"><strong>审核此充值信息</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
	<input type="radio" name="status" value="1"/>充值成功   <input type="radio" name="status" value="2"  checked="checked"/>充值失败 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">到账金额:</div>
		<div class="c">
			<input type="text" name="balance" value="{ $_A.account_recharge_result.balance }" size="15" readonly="">（一旦审核通过将不可再进行修改）
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.account_recharge_result.verify_remark}</textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="nid" value="{ $_A.account_recharge_result.nid }" />
		
		<input type="submit"  name="reset" value="审核此充值信息" />
	</div>
	{else}
		{if $_A.account_recharge_result.type==2 }
	<div class="module_border">
		<div class="l">审核人：</div>
		<div class="c">
			{ $_A.account_recharge_result.verify_username }
		</div>
	</div>
	<div class="module_border" >
		<div class="l">审核时间:</div>
		<div class="c">
			{ $_A.account_recharge_result.verify_time|date_format:"Y-m-d H:i" }
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			{ $_A.account_recharge_result.verify_remark}
		</div>
	</div>
	{else}
	
	<div class="module_border" >
		<div class="l">返回信息:</div>
		<div class="c">
			{ $_A.account_recharge_result.return}
		</div>
	</div>
	{/if}
	{/if}
	</form>
</div>
{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var verify_remark = frm.elements['verify_remark'].value;
	 var errorMsg = '';
	  if (verify_remark.length == 0 ) {
		errorMsg += '备注必须填写' + '\n';
	  }
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>
{/literal}

{else}
<div class="module_add">
	<div class="module_title"><strong><font color="#FF0000">{$magic.request.username} </font>充值记录</strong>{if $magic.request.status==1}<input type="button" onclick="javascript:location.href='{$_A.query_url_all}&excel=1'" value="导出列表" />{/if}</div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td class="main_td">ID</td>
			<td class="main_td">用户名</td>
			<td class="main_td">交易号</td>
			<td class="main_td">类型</td>
			<td class="main_td">充值银行</td>
			<td class="main_td">充值金额</td>
			<td class="main_td">充值手续费</td>
			<td class="main_td">实际到账金额</td>
			<td class="main_td">状态</td>
			<td class="main_td"><a href="{$_A.query_url_all}&username={$magic.request.username}&email={$magic.request.email}&status={$magic.request.status}&order={if $magic.request.order=="addtime_up"}addtime_down{else}addtime_up{/if}">操作时间</a></td>
			<td class="main_td">操作IP</td>
			<td class="main_td">审核备注</td>
			<td class="main_td">管理</td>
		</tr>
		{ list module="account" function="GetRechargeList" var="loop" username=request email=request status=request order=request dotime2=request dotime1=request excel="request"}
		{foreach from=$loop.list item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/recharge&username={$item.username}">{$item.username}</a></td>
			<td >{ $item.nid}</td>
			<td >{$item.type|linkages:"account_recharge_type"}</td>
			<td >{ $item.payment_name|default:"手动充值"}</td>
			<td >￥{ $item.money}</td>
			<td >￥{ $item.fee}</td>
			<td ><font color="#FF0000">￥{$item.balance}</font></td>
			<td >{$item.status|linkages:"account_recharge_status"}</td>
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
			<td >{ $item.addip}</td>
			<td >{ $item.verify_remark|default:-}</td>
			<td >{if $item.status==0}<a href="{$_A.query_url}/recharge&view={$item.id}"><font color="#FF0000">审核</font></a>{else}<a href="{$_A.query_url}/recharge&view={$item.id}">查看</a>{/if}</td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="13" class="action">
		<div class="floatl">
		充值总金额：{$loop.all_balance|default:0.00}元 充值总手续费：{$loop.all_fee|default:0.00}元 
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>成功</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>审核</option><option value="2" {if $magic.request.status=="2"} selected="selected"{/if}>失败</option></select> 操作时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr align="center">
		<td colspan="13" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	
	{ /list}
	</form>	
</table>
{/if}

{elseif $_A.query_type=="log"}
<div class="module_add">
	<div class="module_title"><strong><font color="#FF0000">{$magic.request.username}</font>{$MsgInfo.account_name_log}</strong><div style="float:right"> <a href="{$_A.query_url_all}&type=excel&page={$magic.request.page|default:0}">导出当前</a> <a href="{$_A.query_url_all}&type=excel">导出全部</a>&nbsp;&nbsp;&nbsp;</div></div>
</div>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td class="main_td">ID</td>
			<td class="main_td">用户名</td>
			<td class="main_td">类型</td>
			<td class="main_td">操作金额</td>
			<td class="main_td">资产总额</td>
			<!--<td class="main_td">上次资产总额</td>-->
			<td class="main_td">累计存入</td>
			<td class="main_td">累计支出</td>
			<td class="main_td">冻结金额</td>
			<td class="main_td">待收金额</td>
			<td class="main_td">可用金额</td>
			<!--<td class="main_td">可提现金额</td>
			<td class="main_td">不可提现金额</td>-->
			<td class="main_td">操作时间</td>
		</tr>
		{ list module="account" function="GetLogList" var="loop" username=request email=request status=request order=request dotime1="request" dotime2="request"}
		{foreach from=$loop.list item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/log&username={$item.username}">{$item.username}</a></td>
			<td>{$item.type|linkages:"account_type"}</td>
			<td >￥{$item.money}</td>
			<td >￥{$item.total}</td>
			<!--<td >￥{$item.total_old}</td>-->
			<td >{if $item.income>0}￥{$item.income}{else}-{/if}</td>
			<td >{if $item.expend>0}￥{$item.expend}{else}-{/if}</td>
			<td >{if $item.frost>0}￥{$item.frost}{else}-{/if}</td>
			<td >{if $item.await>0}￥{$item.await}{else}-{/if}</td>
			<td >￥{$item.balance}</td>
			<!--<td >￥{$item.balance_cash}</td>
			<td >￥{$item.balance_frost}</td>-->
			<td >￥{$item.addtime|date_format:"Y-m-d"}</td>
		</tr>
		{ /foreach}
		<tr>
			<td colspan="14" class="action">
			<div class="floatl">
			
			</div>
			<div class="floatr">
				用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/>
				操作时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/> <input type="button" value="搜索" / onclick="sousuo()">
			</div>
			</td>
		</tr>
		<tr>
			<td colspan="14" class="page">
			{$loop.pages|showpage} 
			</td>
		</tr>
		{/list}
	</form>
	</table>



{elseif $_A.query_type=="web"}
<ul class="nav3"> 
<li><a href="{$_A.query_url_all}" id="c_so">网站费用</a></li> 
<li><a href="{$_A.query_url}/web_account">网站垫付</a></li> 
<li><a href="{$_A.query_url}/web_repay">网站应收明细账</a></li>
</ul> 
<div class="module_add">
	<div class="module_title"><strong>{$MsgInfo.account_name_balances}</strong><input type="button" onclick="javascript:location.href='{$_A.query_url_all}&excel=1'" value="导出列表" /></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td class="main_td">{$MsgInfo.account_name_id}</td>
			<td class="main_td">类型</td>
			<td class="main_td">{$MsgInfo.account_name_money}</td>
			<td class="main_td">{$MsgInfo.account_name_income}</td>
			<td class="main_td">{$MsgInfo.account_name_expend}</td>
			<td class="main_td">{$MsgInfo.account_name_remark}</td>
			<td class="main_td">{$MsgInfo.account_name_addtime}</td>
			<td class="main_td">{$MsgInfo.account_name_addip}</td>
		</tr>
		{ list module="account" function="GetBalanceList" var="loop" username=request type="request" dotime1="request" dotime2="request"}
		{foreach from=$loop.list item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td >{ $item.type|linkages:"account_web_fee"}</td>
			<td >￥{$item.money}</td>
			{if $item.type=="recharge"}
			<td >￥{$item.income}</td>
			<td >￥{$item.expend}</td>
			{else}
			<td >￥{$item.expend}</td>
			<td >￥{$item.income}</td>
			{/if}
			<td >{$item.remark}{$item.username}</td>
			<td >{$item.addtime|date_format}</td>
			<td >{$item.addip}</td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="9" class="action">
		<div class="floatl">
			公益基金总计：{$loop.gongyijin}元
			总计：{$loop.chengjiaofei|default:0}元
		</div>
		<div class="floatr">
			类型：{linkages name="type" nid="account_web_fee" type="value" value="$magic.request.type" default="不限"}
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/>
			操作时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
		</tr>
		<tr>
			<td colspan="9" class="page">
			{$loop.pages|showpage} 
			</td>
		</tr>
		{/list}
	</form>	
</table>

{elseif $_A.query_type=="web_repay"}
<ul class="nav3"> 
<li><a href="{$_A.query_url}/web" id="c_so">网站费用</a></li> 
<li><a href="{$_A.query_url}/web_account">网站垫付</a></li>
<li><a href="{$_A.query_url_all}">网站应收明细账</a></li> 
</ul> 
<div class="module_add">
	<div class="module_title"><strong>网站应收明细账</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr class="ytit1" >
			<td  >借款标题</td>
			<td  >应收日期</td>
			<td  >借款者</td>
			<td  >第几期/总期数</td>
			<td  >垫付金额</td>
			<td  >应收本金</td>
			<td  >应收利息</td>
			<td  >逾期罚息</td>
			<td  >逾期天数</td>
			<td  >状态</td>
		</tr>
		{list module="borrow" var="loop" function ="GetRecoverList" showpage="3" keywords="request" dotime1="request" dotime2="request" borrow_status=3 type="web" order="recover_status" recover_status=request epage="15" showtype="web"}
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td  ><a href="/invest/a{$item.borrow_nid}.html" target="_blank" title="{$item.borrow_name}">{$item.borrow_name|truncate:8}</a></td>
			<td  >{$item.recover_time|date_format:"Y-m-d"}</td>
			<td  ><a href="/u/{$item.borrow_userid}" target="_blank">{$item.borrow_username}</a></td>
			<td  >{$item.recover_period+1}/{$item.borrow_period}</td>
			<td  >￥{$item.recover_recover_account_yes}</td>
			<td  >￥{$item.recover_capital  }</td>
			<td  >￥{$item.recover_interest  }</td>
			<td  >￥{$item.late_interest|default:0  }</td>
			<td  >{$item.late_days|default:0  }天</td>
			<td  >{if $item.recover_status==1}<font color="#666666">已还</font>{else}<font color="#FF0000">未还</font>{/if}</td>
		</tr>
		{/foreach}
		<tr>
		<td colspan="14" class="action">
		<div class="floatl">
			应收总额：{$loop.all_capital|default:0.00}元
		</div>
		<div class="floatr">
			应收时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/> 状态：<select name="recover_status" id="recover_status"><option value="" {if $magic.request.recover_status==""}selected="selected"{/if}>不限</option><option value="1" {if $magic.request.recover_status==1}selected="selected"{/if}>已还</option><option value="2" {if $magic.request.recover_status==2}selected="selected"{/if}>未还</option></select> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="14" class="page">
			{$loop.pages|showpage}
			</td>
		</tr>
		{/list}
	</form>	
</table>

{elseif $_A.query_type=="web_account"}
<ul class="nav3"> 
<li><a href="{$_A.query_url}/web" id="c_so">网站费用</a></li> 
<li><a href="{$_A.query_url_all}">网站垫付</a></li>
<li><a href="{$_A.query_url}/web_repay">网站应收明细账</a></li> 
</ul> 
<div class="module_add">
	<div class="module_title"><strong>网站垫付费用</strong><input type="button" onclick="javascript:location.href='{$_A.query_url_all}&excel=1'" value="导出列表" /></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td class="main_td">ID</td>
			<td class="main_td">用户名</td>
			<td class="main_td">类型</td>
			<td class="main_td">网站垫付金额</td>
			<td class="main_td">备注</td>
			<td class="main_td">添加时间</td>
			<td class="main_td">添加IP</td>
		</tr>
		{list module="account" function="GetWebList" var="loop" type="request" dotime1="request" dotime2="request"}
		{foreach from=$loop.list item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{$item.id}</td>
			<td >{$item.username|default:"网站"}</td>
			<td >{$item.type|linkages:"account_web_type"}</td>
			<td >￥{$item.money|round:"2,3"}</td>
			<td >{$item.remark}</td>
			<td >{$item.addtime|date_format}</td>
			<td >{$item.addip}</td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="7" class="action">
		<div class="floatl">
			垫付总计：{$loop.all_money}元
		</div>
		<div class="floatr">
			类型：{linkages name="type" nid="account_web_type" type="value" value="$magic.request.type" default="不限"}
			操作时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/>
			<input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
		</tr>
		<tr>
			<td colspan="7" class="page">
			{$loop.pages|showpage} 
			</td>
		</tr>
		{/list}
	</form>	
</table>


{elseif $_A.query_type=="users"}
<div class="module_add">
	<div class="module_title"><strong>{$MsgInfo.account_name_users}</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td class="main_td">{$MsgInfo.account_name_id}</td>
			<td class="main_td">{$MsgInfo.account_name_username}</td>
			<td class="main_td">{$MsgInfo.account_name_type}</td>
			<!--<td class="main_td">{$MsgInfo.account_name_total}</td>-->
			<td class="main_td">{$MsgInfo.account_name_money}</td>
			<td class="main_td">{$MsgInfo.account_name_balance}</td>
			<td class="main_td">{$MsgInfo.account_name_income}</td>
			<td class="main_td">{$MsgInfo.account_name_expend}</td>
			<td class="main_td">待收</td>
			<td class="main_td">冻结</td>
			<td class="main_td">备注</td>
			<td class="main_td">{$MsgInfo.account_name_addtime}</td>
			<td class="main_td">{$MsgInfo.account_name_addip}</td>
		</tr>
		{ list module="account" function="GetUsersList" var="loop" username=request email=request status=request order=request type=request}
		{foreach from=$loop.list item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td>{$item.username}</td>
			<td >{$item.type|linkages:"account_type"}</td>
			<!--<td >￥{$item.total}</td>-->
			<td >￥{$item.money}</td>
			<td >￥{$item.balance}</td>
			<td >￥{$item.income}</td>
			<td >￥{$item.expend}</td>
			<td >￥{$item.await}</td>
			<td >￥{$item.frost}</td>
			<td >{$item.remark}</td>
			<td >{$item.addtime|date_format}</td>
			<td >{$item.addip}</td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="12" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			类型：{linkages name="type" nid="account_type" value="$magic.request.type" type=value default="不限"} 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 操作时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="12" class="page">
			{$loop.pages|showpage} 
			</td>
		</tr>
		{/list}
	</form>	
</table>

{elseif $_A.query_type=="bank"}
<ul class="nav3"> 
<li><a href="{$_A.query_url}/bank">用户账户信息</a></li> 
<li><a href="{$_A.query_url}/bank&action=bank">银行账户列表</a></li> 
<li><a href="{$_A.query_url}/bank&action=new">添加银行账户</a></li> 
</ul> 


{if $magic.request.action==""}

<div class="module_add">
	<div class="module_title"><strong>用户账户信息</strong></div>
	<div style="margin-top:10px;">
	<div style="float:left; width:30%;">
		
	<div style="border:1px solid #CCCCCC; ">
	
	{if $magic.request.user_id==""}
	<form action="{$_A.query_url_all}" method="post">
	<div class="module_title"><strong>查找用户</strong>(将按顺序进行搜索)<input type="hidden" name="type" value="user_id" /></div>
	
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username"  value="{$_A.user_result.username}"/>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">用户ID：</div>
		<div class="c">
			<input type="text" name="user_id" />
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">邮箱：</div>
		<div class="c">
			<input type="text" name="email" />
		</div>
	</div>
	
	<div class="module_submit"><input type="submit" value="确认提交" class="submit_button" /></div>
		</form>
	</div>
	{else}
	
	<form action="{$_A.query_url_all}&user_id={$maigc.request.user_id}" method="post">
	<div class="module_title"><strong>修改用户银行账户</strong></div>
	
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			{$_A.account_bank_result.username}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">真实姓名：</div>
		<div class="c">
			<a href="{$_A.admin_url}&q=code/approve/realname&user_id={$_A.account_bank_result.user_id}">{$_A.account_bank_result.realname|default:"未填"}</a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">所在地：</div>
		<div class="c">
			{areas type="p,c" value="$_A.account_bank_result.city"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">所属银行：</div>
		<div class="c">
		{select table="account_bank" name="name" value="id" select_name="bank" selected="$_A.account_bank_result.bank"}
			
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">支行：</div>
		<div class="c">
			<input type="text" name="branch" value="{$_A.account_bank_result.branch}" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">银行账户：</div>
		<div class="c">
			<input type="text" name="account"   value="{$_A.account_bank_result.account}"/>
		</div>
	</div>
	
	<div class="module_submit"><input type="hidden" name="type" value="update" /><input type="hidden" name="user_id" value="{$magic.request.user_id}" /><input type="submit" value="确认提交" class="submit_button" /></div>
		</form>
	</div>
	
	{/if}
	</div>
		</div>
	<div style="float:right; width:67%; text-align:left">
	
	<div class="module_add">
		<div class="module_title"><strong>用户银行账户列表</strong></div>
	</div>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		  <form action="" method="post">
			<tr >
				<td class="main_td">ID</td>
				<td class="main_td">用户名</td>
				<td class="main_td">真实姓名</td>
				<td class="main_td">所属银行</td>
				<td class="main_td">所在地</td>
				<td class="main_td">支行</td>
				<td class="main_td">银行账户</td>
				<td class="main_td">操作</td>
			</tr>
			{ list module="account" function="GetUsersBankList" var="loop" keywords="request"}
			{foreach from=$loop.list item="item"}
			<tr  {if $key%2==1} class="tr2"{/if}>
				<td >{ $item.id}</td>
				<td >{$item.username}</td>
				<td >{$item.realname}</td>
				<td >{$item.bank_name}</td>
				<td >{$item.province|areas} {$item.city|areas}</td>
				<td >{$item.branch}</td>
				<td >{$item.account}</td>
				<td ><a href="{$_A.query_url}/bank&user_id={$item.user_id}">修改</a> </td>
			</tr>
			{ /foreach}
			<tr>
			<td colspan="12" class="action">
			<div class="floatl">
			
			</div>
			<div class="floatr">
				名称：<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords}"/> <input type="button" value="搜索" / onclick="sousuo()">
			</div>
			</td>
		</tr>
			<tr>
				<td colspan="9" class="page">
				{$loop.pages|showpage} 
				</td>
			</tr>
			{/list}
		</form>	
	</table>
</div>
{elseif $magic.request.action=="bank"}
	<div class="module_add">
		<div class="module_title"><strong>{$MsgInfo.account_name_bank_list}</strong></div>
	</div>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		  <form action="" method="post">
			<tr >
				<td class="main_td">ID</td>
				<td class="main_td">{$MsgInfo.account_name_bank_name}</td>
				<td class="main_td">{$MsgInfo.account_name_bank_status}</td>
				<td class="main_td">{$MsgInfo.account_name_bank_nid}</td>
				<td class="main_td">{$MsgInfo.account_name_bank_litpic}</td>
				<td class="main_td">{$MsgInfo.account_name_bank_cash_money}</td>
				<td class="main_td">{$MsgInfo.account_name_bank_reach_day}</td>
				<td class="main_td">{$MsgInfo.account_name_bank_manage}</td>
			</tr>
			{ list module="account" function="GetBankList" var="loop" keywords="request"}
			{foreach from=$loop.list item="item"}
			<tr  {if $key%2==1} class="tr2"{/if}>
				<td >{ $item.id}</td>
				<td >{$item.name}</td>
				<td >{$item.status|linkages:"account_bank_status"}</td>
				<td >{$item.nid}</td>
				<td >{$item.litpic}</td>
				<td >{$item.cash_money}</td>
				<td >{$item.reach_day}</td>
				<td ><a href="{$_A.query_url}/bank&action=edit&id={$item.id}">{$MsgInfo.linkages_name_edit}</a>  <a href="#" onClick="javascript:if(confirm('{$MsgInfo.account_name_bank_del_msg}')) location.href='{$_A.query_url}/bank&action=del&id={$item.id}'">{$MsgInfo.linkages_name_del}</a></td>
			</tr>
			{ /foreach}
			<tr>
			<td colspan="12" class="action">
			<div class="floatl">
			
			</div>
			<div class="floatr">
				名称：<input type="text" name="keywords" id="keywords" value="{$magic.request.keywords}"/> <input type="button" value="搜索" / onclick="sousuo()">
			</div>
			</td>
		</tr>
			<tr>
				<td colspan="9" class="page">
				{$loop.pages|showpage} 
				</td>
			</tr>
			{/list}
		</form>	
	</table>

<!--添加充值记录 开始-->
{elseif $magic.request.action == "new" || $magic.request.action == "edit"}

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>{$MsgInfo.account_name_bank_new}</strong></div>

	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_bank_name}：</div>
		<div class="c">
			<input type="text" name="name" value="{$_A.account_bank_result.name}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_bank_status}：</div>
		<div class="c">
			{input name="status" type="radio" value="1|开启,0|关闭" checked="$_A.account_bank_result.status"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_bank_nid}：</div>
		<div class="c">
			<input type="text" name="nid"  value="{$_A.account_bank_result.nid}"/>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_bank_litpic}：</div>
		<div class="c">
			<input type="text" name="litpic"  value="{$_A.account_bank_result.litpic}"/>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_bank_cash_money}：</div>
		<div class="c">
			<input type="text" name="cash_money"  value="{$_A.account_bank_result.cash_money}"/>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">{$MsgInfo.account_name_bank_reach_day}：</div>
		<div class="c">
			<input type="text" name="reach_day"  value="{$_A.account_bank_result.reach_day}"/>
		</div>
	</div>
	
	<div class="module_submit" >
		
		<input type="submit"  name="reset" value="{$MsgInfo.account_name_submit}" />
	</div>
</form>
</div>
{/if}
<!--添加充值记录 结束-->

<!--提现记录列表 开始-->
{elseif $_A.query_type=="cash"}
	{if $magic.request.action==""}
<ul class="nav3"> 
<li><a href="{$_A.query_url_all}" id="c_so">全部提现</a></li> 
<li><a href="{$_A.query_url_all}&status=0">待审核</a></li> 
<li><a href="{$_A.query_url_all}&status=1">审核通过</a></li> 
<li><a href="{$_A.query_url_all}&status=2" >审核未通过</a></li>
</ul> 
<div class="module_add">
	<div class="module_title"><strong>提现管理</strong>{if $magic.request.status!="" && $magic.request.status==1 || $magic.request.status==0}<input type="button" onclick="javascript:location.href='{$_A.query_url_all}&excel=1'" value="导出列表" />{/if}</div>
</div>
<form action="" method="post" >
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		<tr >
			<td class="main_td">ID</td>
			<td class="main_td">用户名称</td>
			<td class="main_td">真实姓名</td>
			<td class="main_td">提现银行</td>
			<td class="main_td">提现账号</td>
			<td class="main_td">提现总额</td>
			<td class="main_td">到账金额</td>
			<td class="main_td">手续费</td>
			<td class="main_td">提现时间</td>
			<td class="main_td">状态</td>
			<td class="main_td">操作</td>
		</tr>
		{ list module="account" function="GetCashList" var="loop" username="request" status="request" dotime1=request dotime2=request}
			{foreach from=$loop.list item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td><a href="{$_A.query_url}/cash&username={$item.username}">{$item.username}</a></td>
			<td >{ $item.realname}</td>
			<td >{ $item.bank}</td>
			<td >{ $item.bank_id}</td>
			<td >{ $item.total}</td>
			<td >{ $item.credited}</td>
			<td >{ $item.fee}</td>	
			<td >{ $item.addtime|date_format:"Y-m-d H:i"}</td>
			<td >{if $item.status==0}审核中{elseif  $item.status==1} 已通过 {elseif $item.status==2}被拒绝{/if}</td>
			<td ><a href="{$_A.query_url}/cash&action=view&id={$item.id}">审核/查看</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="14" class="action">
		<div class="floatl">
		总提现金额：{$loop.all_total|default:0.00}元 总手续费：{$loop.all_fee|default:0.00}元
		</div>
		<div class="floatr">
			用户名：<input type="text" name="username" id="username" value="{$magic.request.username}"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> 操作时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/> <input type="button" value="搜索" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="14" class="page">
			{$loop.pages|showpage} 
			</td>
		</tr>
		{/list}
	</form>	
</table>
<!--提现记录列表 结束-->
	{else}
	

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>提现审核/查看</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			{ $_A.account_cash_result.username}
		</div>
	</div>

	<div class="module_border">
		<div class="l">提现银行：</div>
		<div class="c">
			{ $_A.account_cash_result.bank}
		</div>
	</div>

	<!--<div class="module_border">
		<div class="l">提现支行：</div>
		<div class="c">
			{ $_A.account_cash_result.branch }
		</div>
	</div>-->

	<div class="module_border">
		<div class="l">提现账号：</div>
		<div class="c">
			{ $_A.account_cash_result.bank_id }
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">提现总额：</div>
		<div class="c">
			{ $_A.account_cash_result.total }元
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">到账金额：</div>
		<div class="c">
			{ $_A.account_cash_result.credited }元
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">费用：</div>
		<div class="c">
			{ $_A.account_cash_result.fee}元
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
		{if $_A.account_cash_result.status==0}提现审核中{elseif $_A.account_cash_result.status==1} 提现已通过 {elseif $_A.account_cash_result.status==2}提现被拒绝{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">添加时间/IP:</div>
		<div class="c">
			{ $_A.account_cash_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.account_cash_result.addip}</div>
	</div>
	
	{if $_A.account_cash_result.status==0}
	<div class="module_title"><strong>审核此提现信息</strong></div>
	
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
		 <input type="radio" name="status" value="1"/>审核通过 <input type="radio" name="status" value="2"  checked="checked"/>审核不通过 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">到账金额:</div>
		<div class="c">
			<input type="text" name="credited" value="{ $_A.account_cash_result.credited}" size="10">元（一旦审核通过将不可再进行修改）
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">费用:</div>
		<div class="c">
			<input type="text" name="fee" value="{ $_A.account_cash_result.fee}" size="5">元
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.account_result.verify_remark}</textarea>
		</div>
	</div>
<div class="module_border" >
		<div class="l">验证码：</div>
		<div class="c">
			<input name="valicode" type="text" size="11" maxlength="4"  onClick="$('#valicode').attr('src','/?plugins&q=imgcode&t=' + Math.random())"/>
		
			<img src="/?plugins&q=imgcode" id="valicode" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>
	<div class="module_submit" >
		<input type="submit"  name="reset" value="审核此提现信息" />
	</div>
	{else}
	<div class="module_border">
		<div class="l">审核信息：</div>
		<div class="c">
			审核人：{ $_A.account_cash_result.verify_username },审核时间：{ $_A.account_cash_result.verify_time|date_format:"Y-m-d H:i" },审核备注：{ $_A.account_cash_result.verify_remark}
		</div>
	</div>
	{/if}
	</form>
</div>
{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var verify_remark = frm.elements['verify_remark'].value;
	 var errorMsg = '';
	  if (verify_remark.length == 0 ) {
		errorMsg += '备注必须填写' + '\n';
	  }
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>
{/literal}
	
	{/if}
<!--充值记录列表 结束-->
<!--提现审核 开始-->
{elseif $_A.query_type == "recharge_view"}


<!--添加充值记录 开始-->
{elseif $_A.query_type == "recharge_new"}

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>添加充值</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			线下充值<input type="hidden" name="type" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">金额：</div>
		<div class="c">
			<input type="text" name="money" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<input type="text" name="remark" />
		</div>
	</div>
	
	<div class="module_submit" >
		
		<input type="submit"  name="reset" value="确认充值" />
	</div>
</form>
</div>

<!--添加充值记录 结束-->




<!--添加充值记录 开始-->
{elseif $_A.query_type == "deduct"}

<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>费用扣除</strong></div>

	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username" />
		</div>
	</div>
	<div class="module_border">
		<div class="l">类型：</div>
		<div class="c">
			<select name="type">
				<option value="scene_account">现场认证费用</option>
				<option value="vouch_advanced">担保垫付扣费</option>
				<option value="borrow_kouhui">借款人罚金扣回</option>
				<option value="account_other">其他</option>
			</select>
		</div>
	</div>
	<div class="module_border">
		<div class="l">金额：</div>
		<div class="c">
			<input type="text" name="money" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注：</div>
		<div class="c">
			<input type="text" name="remark" />比如，现场费用扣除200元
		</div>
	</div>
	<div class="module_border">
		<div class="l">验证码：</div>
		<div class="c"><input  class="user_aciton_input"  name="valicode" type="text" size="8" maxlength="4" style=" padding-top:4px; height:16px; width:70px;"/>&nbsp;<img src="/?plugins&q=imgcode" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>
	<div class="module_submit" >
		
		<input type="submit"  name="reset" value="确定扣除" />
	</div>
</form>
</div>

<!--添加充值记录 结束-->


{/if}
<script>
var url = '{$_A.query_url}/{$_A.query_type}';
{literal}
function sousuo(){
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var email = $("#email").val();
	if (email!=""){
		sou += "&email="+email;
	}
	var status = $("#status").val();
	if (status!="" && status!=null){
		sou += "&status="+status;
	}
	var dotime1 = $("#dotime1").val();
	var keywords = $("#keywords").val();
	var username = $("#username").val();
	var dotime2 = $("#dotime2").val();
	var type = $("#type").val();
	if (username!=null){
		 sou += "&username="+username;
	}
	if (keywords!=null){
		 sou += "&keywords="+keywords;
	}
	if (dotime1!=null){
		 sou += "&dotime1="+dotime1;
	}
	if (dotime2!=null){
		 sou += "&dotime2="+dotime2;
	}
	if (type!=null){
		 sou += "&type="+type;
	}
	var recover_status = $("#recover_status").val();
	if (recover_status!="" && recover_status!=null){
		sou += "&recover_status="+recover_status;
	}
	if (sou!=""){
	location.href=url+sou;
	}
}

</script>
{/literal}