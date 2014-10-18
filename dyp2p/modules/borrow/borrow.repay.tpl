{if $_A.query_type == "repay"}
<ul class="nav3"> 
<li><a href="{$_A.query_url_all}" id="c_so">逾期列表</a></li> 
<li><a href="{$_A.query_url}/bad_account">坏账池</a></li> 
</ul> 
<div class="module_add">
	<div class="module_title"><strong>逾期列表</strong><div style="float:right"> <a href="{$_A.query_url_all}&page={$magic.request.page|default:1}&_type=excel&borrow_name={$magic.request.borrow_name}&borrow_nid={$magic.request.borrow_nid}&username={$magic.request.username}&vouch_status={$magic.request.vouch_status}&repay_status=0&lateing=1">导出当前</a> <a href="{$_A.query_url_all}&_type=excel&borrow_name={$magic.request.borrow_name}&borrow_nid={$magic.request.borrow_nid}&username={$magic.request.username}&vouch_status={$magic.request.vouch_status}&repay_status=0&lateing=1">导出全部</a>&nbsp;&nbsp;&nbsp;</div></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="*" class="main_td">用户积分</td>
			<td width="*" class="main_td">贷款号</td>
			<td width="" class="main_td">借款标题</td>
			<td width="" class="main_td">借款类型</td>
			<td width="" class="main_td">还款本息</td>
			<td width="" class="main_td">逾期天数</td>
			<td width="" class="main_td">逾期罚息</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">加入坏账池</td>
		</tr>
		{list module="borrow" function="GetBorrowRepayList" var="loop" borrow_name="request" repay_status="0" lateing="1"}
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{$item.id}<input type="hidden" name="id[]" value="{$item.id}" /></td>
			<td class="main_td1" align="center">{$item.borrow_username}</td>
			<td>{$item.credit.approve_credit|credit:"credit"}</td>
			<td>{$item.borrow_nid}</td>
			<td title="{$item.name}"><a href="/invest/a{$item.borrow_nid}.html" target="_blank">{$item.borrow_name}</a>(第{$item.repay_period+1}期)</td>
			<td>{if $item.vouchstatus==1}<font color="#FF0000">担保标借款</font>{elseif $item.is_flow==1}<font color="#FF0000">流转借款</font>{elseif $item.is_jin==1}<font color="#FF0000">净值借款</font>{elseif $item.fast_status==1}<font color="#FF0000">抵押借款</font>{else}普通标借款{/if}</td>
			<td>{$item.repay_account}元</td>
			<td>{if $item.late_days>30}<font color="#ff0000">{$item.late_days}天</font>{else}{$item.late_days}天{/if}</td>
			<td>{if $item.late_days>30}<font color="#ff0000">{$item.late_interest}元</font>{else}{$item.late_interest}元{/if}</td>
			<td>
			{if $item.late_days>0}
				{if $item.repay_account>$floop.all_money}
					风险金不足
				{else}
					<a href="#" onclick="javascript:if(confirm('你确定要垫付此借款吗？')) location.href='{$_A.query_url}/repay&borrow_nid={$item.borrow_nid}&id={$item.id}'">垫付</a>
				{/if}
			{elseif $item.repay_web==1}
				已垫付
			{else}
				-
			{/if}
			</td>
			{if $item.bad_status==1}
			<td>-</td>
			{else}
			<td><a href="#" onclick="javascript:if(confirm('你确定要加入坏账池吗？')) location.href='{$_A.query_url}/joinbad&borrow_nid={$item.borrow_nid}'">加入坏账池</a></td>
			{/if}
		</tr>
		{ /foreach}
		<tr>
		<td colspan="15" class="action">
		<div class="floatl">
			
		</div>
		<div class="floatr">
			 标题：<input type="text" name="borrow_name" id="borrow_name" value="{$magic.request.borrow_name}" size="8"/> 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}" size="8"/>贷款号：<input type="text" name="borrow_nid" id="borrow_nid" value="{$magic.request.borrow_nid}" size="8"/> <select id="is_vouch" ><option value="">全部</option><option value="1" {if $magic.request.is_vouch==1} selected="selected"{/if}>担保标</option><option value="0" {if $magic.request.is_vouch=="0"} selected="selected"{/if}>普通标</option></select> <input type="button" value="搜索" class="submit" onclick="sousuo('{$_A.query_url}/first&status={$magic.request.status}')">
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
{elseif $_A.query_type == "bad_account"}
<ul class="nav3"> 
<li><a href="{$_A.query_url}/repay" id="c_so">逾期列表</a></li> 
<li><a href="{$_A.query_url_all}/bad_account">坏账池</a></li> 
</ul> 
<div class="module_add">
	<div class="module_title"><strong>坏账池</strong><div style="float:right"> <a href="{$_A.query_url_all}&page={$magic.request.page|default:1}&_type=excel&borrow_name={$magic.request.borrow_name}&borrow_nid={$magic.request.borrow_nid}&username={$magic.request.username}&vouch_status={$magic.request.vouch_status}&repay_status=0&bad=1">导出当前</a> <a href="{$_A.query_url_all}&_type=excel&borrow_name={$magic.request.borrow_name}&borrow_nid={$magic.request.borrow_nid}&username={$magic.request.username}&vouch_status={$magic.request.vouch_status}&repay_status=0&bad=1">导出全部</a>&nbsp;&nbsp;&nbsp;</div></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="*" class="main_td">用户积分</td>
			<td width="*" class="main_td">贷款号</td>
			<td width="" class="main_td">借款标题</td>
			<td width="" class="main_td">借款类型</td>
			<td width="" class="main_td">还款本息</td>
			<td width="" class="main_td">待还期数</td>
		</tr>
		{list module="borrow" function="GetBadBorrowRepay" var="loop" borrow_name="request" username="request" vouch_status="request" borrow_nid="request" repay_status="0" bad="1"}
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{$item.id}<input type="hidden" name="id[]" value="{$item.id}" /></td>
			<td class="main_td1" align="center">{$item.borrow_username}</td>
			<td>{$item.credit.approve_credit|credit:"credit"}</td>
			<td>{$item.borrow_nid}</td>
			<td title="{$item.name}"><a href="/invest/a{$item.borrow_nid}.html" target="_blank">{$item.borrow_name}</a></td>
			<td>{if $item.vouchstatus==1}<font color="#FF0000">担保标借款</font>{elseif $item.is_flow==1}<font color="#FF0000">流转借款</font>{elseif $item.is_jin==1}<font color="#FF0000">净值借款</font>{elseif $item.fast_status==1}<font color="#FF0000">抵押借款</font>{else}普通标借款{/if}</td>
			<td>{$item.all_repay_account}元</td>
			<td>{$item.nore}期</td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="15" class="action">
		<div class="floatl">
			
		</div>
		<div class="floatr">
			 标题：<input type="text" name="borrow_name" id="borrow_name" value="{$magic.request.borrow_name}" size="8"/> 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}" size="8"/>贷款号：<input type="text" name="borrow_nid" id="borrow_nid" value="{$magic.request.borrow_nid}" size="8"/> <select id="vouch_status" ><option value="">全部</option><option value="1" {if $magic.request.is_vouch==1} selected="selected"{/if}>担保标</option><option value="0" {if $magic.request.is_vouch=="0"} selected="selected"{/if}>普通标</option></select> <input type="button" value="搜索" class="submit" onclick="sousuo('{$_A.query_url}/first&status={$magic.request.status}')">
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

{/if}

<script>

var urls = '{$_A.query_url}/first';
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