{if $magic.request.fullcheck==""}
<ul class="nav3"> 
<li><a href="{$_A.query_url_all}" id="c_so">满标待审</a></li> 
<li><a href="{$_A.query_url_all}&status=4">满标审核失败</a></li> 
<li><a href="{$_A.query_url_all}&type=repay">正在还款借款</a></li> 
<li><a href="{$_A.query_url_all}&type=repayyes">已还完借款</a></li> 
</ul> 
<div class="module_add">
	<div class="module_title"><strong>借款列表</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="*" class="main_td">用户积分</td>
			<td width="*" class="main_td">贷款号</td>
			<td width="" class="main_td">借款标题</td>
			<td width="" class="main_td">借款金额</td>
			<td width="" class="main_td">利率</td>
			<td width="" class="main_td">借款期限</td>
			<td width="" class="main_td">还款方式</td>
			<td width="" class="main_td">借款类型</td>
			<td width="" class="main_td">投资次数</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">查看</td>
		</tr>
		{ list  module="borrow" function="GetList" var="loop" borrow_name="request" type="request"  borrow_nid="request" username="request" query_type="full"  status="request" dotime1="request" dotime2="request"}
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{ $item.id}<input type="hidden" name="id[]" value="{ $item.id}" /></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/users/view&user_id={$item.user_id}",500,230,"true","","true","text");'>	{$item.username}</a></td>
			<td>{$item.credit.approve_credit|credit:"credit"}</td>
			<td>{$item.borrow_nid}</td>
			<td title="{$item.name}"><a href="{$_A.query_url_all}&view={$item.borrow_nid}">{$item.name|truncate:10}</a></td>
			<td>{$item.account}元</td>
			<td>{$item.borrow_apr}%</td>
			<td>{if $item.borrow_period == 0.03}1天
                            	{elseif $item.borrow_period == 0.06}2天
                            	{elseif $item.borrow_period == 0.10}3天
                            	{elseif $item.borrow_period == 0.13}4天
                            	{elseif $item.borrow_period == 0.16}5天
                            	{elseif $item.borrow_period == 0.20}6天
                            	{elseif $item.borrow_period == 0.23}7天
                            	{elseif $item.borrow_period == 0.26}8天
                            	{elseif $item.borrow_period == 0.30}9天
                            	{elseif $item.borrow_period == 0.33}10天
                            	{elseif $item.borrow_period == 0.36}11天
                            	{elseif $item.borrow_period == 0.40}12天
                            	{elseif $item.borrow_period == 0.43}13天
                            	{elseif $item.borrow_period == 0.46}14天
                            	{elseif $item.borrow_period == 0.50}15天
                            	{elseif $item.borrow_period == 0.53}16天
                            	{elseif $item.borrow_period == 0.56}17天
                            	{elseif $item.borrow_period == 0.60}18天
                            	{elseif $item.borrow_period == 0.63}19天
                            	{elseif $item.borrow_period == 0.66}20天
                            	{elseif $item.borrow_period == 0.70}21天
                            	{elseif $item.borrow_period == 0.73}22天
                            	{elseif $item.borrow_period == 0.76}23天
                            	{elseif $item.borrow_period == 0.80}24天
                            	{elseif $item.borrow_period == 0.83}25天
                            	{elseif $item.borrow_period == 0.86}26天
                            	{elseif $item.borrow_period == 0.90}27天
                            	{elseif $item.borrow_period == 0.93}28天
                            	{elseif $item.borrow_period == 0.96}29天
                            	{elseif $item.borrow_period == 0.10}30天
                            	{elseif $item.borrow_period >= 1 && $item.borrow_period<10 }{$item.borrow_period|truncate:1}个月
                            	{else}{$item.borrow_period|truncate:2}个月
                            	{/if}</td>
			<td>{$item.borrow_style|linkages:"borrow_style"}</td>
			<td>{if $item.vouchstatus==1}<font color="#FF0000">担保标借款</font>{elseif $item.is_flow==1}<font color="#FF0000">流转借款</font>{elseif $item.is_jin==1}<font color="#FF0000">净值借款</font>{elseif $item.fast_status==1}<font color="#FF0000">抵押借款</font>{else}普通标借款{/if}</td>
			<td width="" class="main_td">{$item.tender_times}次</td>
			<td>{$item.borrow_type_nid|linkages:"borrow_type_nid"}</td>
			<td title="{$item.name}"><a href="{$_A.query_url_all}&view={$item.borrow_nid}">查看</a></td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="14" class="action">
		<div class="floatl">
			
		</div>
		<div class="floatr">
			 标题：<input type="text" name="borrow_name" id="borrow_name" value="{$magic.request.borrow_name}" size="8"/> 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}" size="8"/>贷款号：<input type="text" name="borrow_nid" id="borrow_nid" value="{$magic.request.borrow_nid}" size="8"/>
			 添加时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/> <select id="is_vouch" ><option value="">全部</option><option value="1" {if $magic.request.is_vouch==1} selected="selected"{/if}>担保标</option><option value="0" {if $magic.request.is_vouch=="0"} selected="selected"{/if}>普通标</option></select> <input type="button" value="搜索" class="submit" onclick="sousuo('{$_A.query_url}/full&type={$magic.request.type}&status={$magic.request.status}')">
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


<script>

var urls = '{$_A.query_url}/full';
{literal}
function sousuo(url){
	var sou = "";
	var username = $("#username").val();
	if (username!="" && username!=null){
		sou += "&username="+username;
	}
	var keywords = $("#keywords").val();
	if (keywords!="" && keywords!=null){
		sou += "&keywords="+keywords;
	}
	var borrow_name = $("#borrow_name").val();
	if (borrow_name!="" && borrow_name!=null){
		sou += "&borrow_name="+borrow_name;
	}
	var borrow_nid = $("#borrow_nid").val();
	if (borrow_nid!="" && borrow_nid!=null){
		sou += "&borrow_nid="+borrow_nid;
	}
	var dotime1 = $("#dotime1").val();
	if (dotime1!="" && dotime1!=null){
		sou += "&dotime1="+dotime1;
	}
	var dotime2 = $("#dotime2").val();
	if (dotime2!="" && dotime2!=null){
		sou += "&dotime2="+dotime2;
	}
	var status = $("#status").val();
	if (status!="" && status!=null){
		sou += "&status="+status;
	}
	var is_vouch = $("#is_vouch").val();
	if (is_vouch!="" && is_vouch!=null){
		sou += "&is_vouch="+is_vouch;
	}
	
		location.href=url+sou;
	
}
</script>
{/literal}
{else}

<div class="module_add">
	<form name="form1" method="post" action="{$_A.query_url_all}&fullcheck={$magic.request.fullcheck}" >
	<div class="module_border">
		<div class="l">状态:</div>
		<div class="c">
		<input type="radio" name="status" value="3"/>复审通过 <input type="radio" name="status" value="4"  checked="checked"/>复审不通过 </div>
	</div>
	
	<div class="module_border" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="reverify_remark" cols="45" rows="5">{ $_A.borrow_result.reverify_remark}</textarea>
		</div>
	</div>
	<div class="module_border" >
		<div class="l">验证码:</div>
		<div class="c">
			<input name="valicode" type="text" size="5" maxlength="4"  tabindex="3" onClick="$('#valicode').attr('src','/?plugins&q=imgcode&t=' + Math.random())"/> <img id="valicode" src="/?plugins&q=imgcode" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.borrow_result.id }" />
		<input type="hidden" name="borrow_nid" value="{ $_A.borrow_result.borrow_nid}" />
		
		<input type="submit"  name="reset" value="审核此借款标" class="submit" />
	</div>
	
</form>
</div>
{/if}