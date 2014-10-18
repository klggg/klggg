
{if $magic.request.cancel!=""}
<div  style="height:205px; overflow:hidden">
	<form name="form1" method="post" action="{$_A.query_url_all}&cancel={$magic.request.cancel}" >
	
	
	<div class="module_border_ajax" >
		<div class="l">撤销理由:</div>
		<div class="c">
			<textarea name="remark" cols="45" rows="7">{ $_A.borrow_result.reverify_remark}</textarea><br />请将撤回的理由写清楚
		</div>
	</div>
	<div class="module_border_ajax" >
		<div class="l">验证码:</div>
		<div class="c">
			<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3" onClick="$('#valicode').attr('src','/?plugins&q=imgcode&t=' + Math.random())"/>
		</div>
		<div class="c">
			<img src="/?plugins&q=imgcode" id="valicode" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>

	<div class="module_submit_ajax" >
		<input type="hidden" name="tender_nid" value="{ $magic.request.cancel}" />
		<input type="submit"  name="reset" class="submit_button" value="审核此标" />
	</div>
	
</form>
</div>
{elseif $magic.request.id!=""}

<div class="module_add" >
	
	<div class="module_title"><strong>投资详细信息</strong></div>


	<div class="module_border">
		<div class="l">投资人：</div>
		<div class="r">
		<a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=code/users/view&user_id={$_A.borrow_tender_result.user_id}&type=scene",700,400,"true","","true","text");'>	{$_A.borrow_tender_result.username}</a>
		</div>
		<div class="s"></div>
		<div class="c">
			
		</div>
	</div>
	

	<div class="module_border">
		<div class="l">投资状态：</div>
		<div class="r">
			{$_A.borrow_tender_result.status|linkages:"borrow_tender_status"}<!--{if $_A.borrow_tender_result.status==1 && $_A.borrow_tender_result.tender_status==0} <input type="button"  src="{$_A.tpldir}/images/button.gif" align="absmiddle" value="投资撤回" class="submit_button" onclick='tipsWindown("投资撤回","url:get?{$_A.query_url_all}&cancel={$_A.borrow_tender_result.id}",500,230,"true","","false","text");'/>{/if}-->
		</div>
		<div class="s">审核状态：</div>
		<div class="c">
			{$_A.borrow_tender_result.tender_status|linkages:"borrow_tender_verify_status"} 
		</div>
	</div>
	{if $_A.borrow_tender_result.tender_status==1} 
	<div class="module_title"><strong>投资成功信息</strong></div>
	<div class="module_border">
		<div class="l">投资金额：</div>
		<div class="r">
		￥{$_A.borrow_tender_result.account_tender}
		</div>
		<div class="s">收款总额：</div>
		<div class="c">
			<strong>￥{$_A.borrow_tender_result.account}</strong>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">已收总额：</div>
		<div class="r">
		￥{$_A.borrow_tender_result.account_tender}
		</div>
		<div class="s">未收总额：</div>
		<div class="c">
			<strong>￥{$_A.borrow_tender_result.account}</strong>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">已收本金：</div>
		<div class="r">
		￥{$_A.borrow_tender_result.account_tender}
		</div>
		<div class="s">未收本金：</div>
		<div class="c">
			<strong>￥{$_A.borrow_tender_result.account}</strong>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">已收利息：</div>
		<div class="r">
		￥{$_A.borrow_tender_result.account_tender}
		</div>
		<div class="s">未收利息：</div>
		<div class="c">
			<strong>￥{$_A.borrow_tender_result.account}</strong>
		</div>
	</div>
	{/if}
	<div class="module_border">
		<div class="l">投资金额：</div>
		<div class="r">
		￥{$_A.borrow_tender_result.account_tender}
		</div>
		<div class="s">实投金额：</div>
		<div class="c">
			<font color="#FF0000"><strong>￥{$_A.borrow_tender_result.account}</strong></font>
		</div>
	</div>
	
	

	<div class="module_border">
		<div class="l">是否自动投标：</div>
		<div class="r">
		{$_A.borrow_tender_result.auto_status|linkages:"borrow_tender_auto_status"}
		</div>
		<div class="s">投资理由：</div>
		<div class="c">
			{$_A.borrow_tender_result.contents}
		</div>
	</div>
	
	

	<div class="module_border">
		<div class="l">投资时间：</div>
		<div class="r">
		{$_A.borrow_tender_result.addtime|date_format}
		</div>
		<div class="s">投资IP：</div>
		<div class="c">
			{$_A.borrow_tender_result.addip}
		</div>
	</div>
	
	
	<div class="module_title"><strong>借款详细信息</strong></div>
	<div class="module_border">
		
		<div class="l">标题：</div>
		<div class="r">
			<strong><a href="{$_A.query_url}&view={$_A.borrow_tender_result.borrow_nid}">{$_A.borrow_tender_result.borrow_name}</a></strong>
		</div>
		
		<div class="s">贷款号：</div>
		<div class="c">
			{$_A.borrow_tender_result.borrow_nid}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">借贷总金额：</div>
		<div class="r">
			￥{$_A.borrow_tender_result.borrow_account}
		</div>
		<div class="s">借款用途：</div>
		<div class="c">
			{$_A.borrow_tender_result.borrow_use|linkages:"borrow_use"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">借款类型：</div>
		<div class="r">
			{$_A.borrow_tender_result.borrow_flag|linkages:"borrow_flag"|default:"-"}
		</div>
		
		<div class="s">还款方式：</div>
		<div class="c">
			{$_A.borrow_tender_result.borrow_style|linkages:"borrow_style"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">借款期限：</div>
		<div class="r">
				{$_A.borrow_tender_result.borrow_period}个月
		</div>
		
		<div class="s">年利率：</div>
		<div class="c">
			{$_A.borrow_tender_result.borrow_apr} %
		</div>

	</div>
</div>

<div class="module_add">
	<div class="module_title"><strong>{$_A.borrow_tender_result.borrow_name}</strong> 投资列表</div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="*" class="main_td">投资人</td>
			<td width="*" class="main_td">投资金额</td>
			<td width="" class="main_td">投资时间</td>
			<td width="" class="main_td">审核状态</td>
			<td width="" class="main_td">投资状态</td>
			<td width="" class="main_td">投资理由</td>
			<td width="" class="main_td">自动投标</td>
			<td width="" class="main_td">查看</td>
		</tr>
		{ loop  module="borrow" function="GetTenderList" var="item" borrow_name="request"  username="request"  limit="all" borrow_nid=$_A.borrow_tender_result.borrow_nid}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=code/users/view&user_id={$item.user_id}&type=scene",700,400,"true","","true","text");'>	{$item.username}</a></td>
			<td>￥{$item.account}</td>
			<td>{$item.addtime|date_format}</td>
			<td>{$item.status|linkages:"borrow_tender_status"}</td>
			<td>{$item.tender_status|linkages:"borrow_tender_verify_status"}</td>
			<td>{$item.contents|default:"-"}</td>
			<td>{$item.auto_status|linkages:"borrow_tender_auto_status"}</td>
			<td title="{$item.name}"><a href="{$_A.query_url_all}&id={$item.id}">查看</a></td>
			
		</tr>
		{ /loop}
	</form>	
</table>

{else}
<div class="module_add">
	<div class="module_title"><strong>投资管理</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="" class="main_td">投资ID</td>
			<td width="*" class="main_td">投资人</td>
			<td width="*" class="main_td">投资金额</td>
			<td width="" class="main_td">投资时间</td>
			<td width="" class="main_td">投资状态</td>
			<td width="" class="main_td">审核状态</td>
			<td width="" class="main_td">投资理由</td>
			<td width="*" class="main_td">借款标</td>
			<td width="" class="main_td">借款标识名</td>
			<td width="" class="main_td">借款总额</td>
			<td width="" class="main_td">自动投标</td>
			<td width="" class="main_td">查看</td>
		</tr>
		{ list  module="borrow" function="GetTenderList" var="loop" borrow_name="request"  borrow_nid="request" username="request" query_type=$_A.query_type }
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{ $item.id}<input type="hidden" name="id[]" value="{ $item.id}" /></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=code/users/view&user_id={$item.user_id}&type=scene",700,400,"true","","true","text");'>	{$item.username}</a></td>
			<td>￥{$item.account}</td>
			<td>{$item.addtime|date_format}</td>
			<td>{$item.status|linkages:"borrow_tender_status"}</td>
			<td>{$item.tender_status|linkages:"borrow_tender_verify_status"}</td>
			<td>{$item.contents|default:"-"}</td>
			<td><a href="{$_A.admin_url}&q=code/borrow&view={$item.borrow_nid}">{$item.borrow_name}</a></td>
			<td>{$item.borrow_nid}</td>
			<td>￥{$item.borrow_account}</td>
			<td>{$item.auto_status|linkages:"borrow_tender_auto_status"}</td>
			<td title="{$item.name}"><a href="{$_A.query_url_all}&id={$item.id}">查看</a></td>
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="14" class="action">
		<div class="floatl">
			<input type="submit" value="确定提交" class="submit"/>
		</div>
		<div class="floatr">
			 标题：<input type="text" name="borrow_name" id="borrow_name" value="{$magic.request.borrow_name}" size="8"/> 用户名：<input type="text" name="username" id="username" value="{$magic.request.username}" size="8"/>贷款号：<input type="text" name="borrow_nid" id="borrow_nid" value="{$magic.request.borrow_nid}" size="8"/> 状态<select id="status" ><option value="">全部</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>已通过</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>未通过</option></select> <select id="is_vouch" ><option value="">全部</option><option value="1" {if $magic.request.is_vouch==1} selected="selected"{/if}>担保标</option><option value="0" {if $magic.request.is_vouch=="0"} selected="selected"{/if}>普通标</option></select> <input type="button" value="搜索" class="submit" onclick="sousuo('{$_A.query_url}{$_A.site_url}')">
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