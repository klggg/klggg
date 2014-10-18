
<div class="module_add">
	<div class="module_title"><strong>{$MsgInfo.account_name_users}</strong><div style="float:right"> <a href="{$_A.query_url_all}&type=excel&page={$magic.request.page|default:1}&username={$magic.request.username}&status={$magic.request.status}">导出当前</a> <a href="{$_A.query_url_all}&type=excel&username={$magic.request.username}&status={$magic.request.status}">导出全部</a>&nbsp;&nbsp;&nbsp;</div></div>
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
