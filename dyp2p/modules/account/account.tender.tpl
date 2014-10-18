
{if $magic.request.action==""}
<div class="module_add">
	<div class="module_title"><strong><font color="#FF0000">{$magic.request.username}</font>投资记录</strong><div style="float:right"> <a href="{$_A.query_url_all}&type=excel&page={$magic.request.page|default:1}&username={$magic.request.username}&borrow_name={$magic.request.borrow_name}&borrow_nid={$magic.request.borrow_nid}&status={$magic.request.status}">导出当前</a> <a href="{$_A.query_url_all}&type=excel&username={$magic.request.username}&borrow_name={$magic.request.borrow_name}&borrow_nid={$magic.request.borrow_nid}&status={$magic.request.status}">导出全部</a>&nbsp;&nbsp;&nbsp;</div></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td class="main_td">ID</td>
			<td class="main_td">投资人</td>
			<td class="main_td">投资金额</td>
			<td class="main_td">投资时间</td>
			<td class="main_td">投资状态</td>
			<td width="" class="main_td">审核状态</td>
			<td class="main_td">借款标</td>
			<td class="main_td">借款标识名</td>
			<td width="" class="main_td">借款总额</td>
			<td class="main_td">自动投标</td>
		</tr>
		{ list  module="borrow" function="GetTenderList" var="loop"  borrow_name="request" status="request"  borrow_nid="request"  username="request" query_type=$_A.query_type }
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td >{ $item.id}</td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=code/users/view&user_id={$item.user_id}&type=scene",700,400,"true","","true","text");'>	{$item.username}</a></td>
			<td>￥{$item.account}</td>
			<td>{$item.addtime|date_format}</td>
			<td>{$item.status|linkages:"borrow_tender_status"}</td>
			<td>{$item.tender_status|linkages:"borrow_tender_verify_status"}</td>
			<td><a href="{$_A.admin_url}&q=code/borrow&view={$item.borrow_nid}">{$item.borrow_name}</a></td>
			<td>{$item.borrow_nid}</td>
			<td>￥{$item.borrow_account}</td>
			<td>{$item.auto_status|linkages:"borrow_tender_auto_status"}</td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="9" class="action">
		<div class="floatl">
			投资总额：{$loop.account_tender}元 	预计获得收益：{$loop.recover_account_interest}元
		</div>
		<div class="floatr">
			 标题：<input type="text" name="borrow_name" id="borrow_name" value="{$magic.request.borrow_name}" size="8"/> 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}" size="8"/>贷款号：<input type="text" name="borrow_nid" id="borrow_nid" value="{$magic.request.borrow_nid}" size="8"/> 状态<select id="status"  name="status"><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select>  <input type="submit" value="搜索" class="submit" >
			 
			
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

{/if}