
<div class="module_add">
	<div class="module_title"><strong>账号信息管理</strong><div style="float:right"> <a href="{$_A.query_url_all}&type=excel&page={$magic.request.page|default:1}&username={$magic.request.username}&epage=2">导出当前</a> <a href="{$_A.query_url_all}&type=excel&username={$magic.request.username}">导出全部</a>&nbsp;&nbsp;&nbsp;</div></div>
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
		{ list module="account" function="GetList"  var="loop" username=request }
		{foreach from=$loop.list item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{$item.id}</td>
			<td><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=code/users/view&user_id={$item.user_id}&type=scene",700,400,"true","","true","text");'>{$item.username}</a></td>
			<td >￥{$item.total}</td>
			<td >￥{$item.balance}</td>
			<td >￥{$item.frost}</td>
			<td >￥{$item.await}</td>
			<td ><a href="{$_A.query_url}/recharge&username={$item.username}">充值记录</a> <a href="{$_A.query_url}/cash&username={$item.username}">提现记录</a> <a href="{$_A.query_url}/log&username={$item.username}">资金记录</a>  <a href="{$_A.query_url}/tender&username={$item.username}">投标记录</a> <a href="{$_A.query_url}/exit&username={$item.username}" style="color:#FF0000">修改资金</a></td>
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

