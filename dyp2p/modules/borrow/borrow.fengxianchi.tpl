<div class="module_add">
	<div class="module_title"><strong>风险池管理</strong><div style="float:right"> <a href="{$_A.query_url_all}&page={$magic.request.page|default:1}&_type=excel&type={$magic.request.type}&username={$magic.request.username}&dotime1={$magic.request.dotime1}&dotime2={$magic.request.dotime2}">导出当前</a> <a href="{$_A.query_url_all}&_type=excel&type={$magic.request.type}&username={$magic.request.username}&dotime1={$magic.request.dotime1}&dotime2={$magic.request.dotime2}">导出全部</a>&nbsp;&nbsp;&nbsp;</div></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
		<tr >
			<td width="" class="main_td">投资ID</td>
			<td width="*" class="main_td">用户名</td>
			<td width="" class="main_td">交易号</td>
			<td width="*" class="main_td">类型</td>
			<td width="*" class="main_td">操作金额</td>
			<td width="" class="main_td">备注</td>
			<td width="*" class="main_td">添加时间</td>
		</tr>
		{list  module="account" function="GetLogList" var="loop" type="2" nid="request" username="$magic.request.username" dotime2=request dotime1=request style="fxc"}
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{$item.id}<input type="hidden" name="id[]" value="{ $item.id}" /></td>
			<td>{$item.username|default:"系统"}</td>
			<td>{$item.nid}</td>
			<td>{$item.type|linkages:"fengxianchi_type"}</td>
			<td>{$item.money}</td>
			<td>{$item.remark}</td>
			<td>{$item.addtime|date_format:"Y-m-d"}</td>
		</tr>
		{/foreach}
		<tr>
		<td>总计：{$loop.all_money}</td>
		<td colspan="6" class="action">
		<div class="floatr">
		用户名：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}" size="8"/>
		操作时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/> <input type="button" value="搜索" / onclick="sousuo1()">
		</div>
		</td>
		</tr>
		<tr>
			<td colspan="14" class="page">
			{$loop.pages|showpage} 
			</td>
		</tr>
		{/list}
			<script>
	  var url = '{$_A.query_url}/fengxianchi';
	    {literal}
	  	function sousuo1(){
			var type = 2;
			var username = $("#username").val();
			var dotime2 = $("#dotime2").val();
			var dotime1 = $("#dotime1").val();
			location.href=url+"&username="+username+"&dotime2="+dotime2+"&dotime1="+dotime1+"&style=fxc";
		}
	  </script>
	  {/literal}	
</table>