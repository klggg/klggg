<ul class="nav3"> 
<li><a href="{$_A.query_url}/list&code={$magic.request.code}" id="c_so">{$MsgInfo.linkages_name_list}</a></li> 
<li><a href="{$_A.query_url}/type_new&code={$magic.request.code}">{$MsgInfo.linkages_name_add_type}</a></li> 
</ul> 
{if $_A.query_type == "list" }
<div class="module_add">
<div class="module_title"><strong>{$MsgInfo.linkages_name_list}</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<form action="{$_A.query_url}/type_action&code={$magic.request.code}" method="post">
	<tr >
		<td class="main_td">{$MsgInfo.linkages_name_type_id}</td>
		<td class="main_td">{$MsgInfo.linkages_name_type_name}</td>
		<td class="main_td">{$MsgInfo.linkages_name_type_code}</td>
		<td class="main_td">{$MsgInfo.linkages_name_type_nid}</td>
		<td class="main_td">{$MsgInfo.linkages_name_type_order}</td>
		<td class="main_td">{$MsgInfo.linkages_name_type_manage}</td>
	</tr>
	{if $magic.request.code!=""}
	{ loop module="linkages" function="GetTypeList" var="item" username=request email=request limit="all" code="request"}
		
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center" >{ $item.id}</td>
		<td class="main_td1" align="center" ><input type="text" value="{$item.name}" name="name[]" /></td>
		<td class="main_td1" align="center" >{ $item.code}</td>
		<td class="main_td1" align="center">{$item.nid}</td>
		<td class="main_td1" align="center" ><input type="text" value="{$item.order|default:10}" name="order[]" size="5" /><input type="hidden" name="id[]" value="{$item.id}" /></td>
		<td class="main_td1" align="center" width="130"><a href="{$_A.query_url}/new&code={$magic.request.code}&id={$item.id}">{$MsgInfo.linkages_name_manage}</a> / <a href="{$_A.query_url}/type_edit&code={$magic.request.code}&id={$item.id}">{$MsgInfo.linkages_name_edit}</a> / <a href="#" onClick="javascript:if(confirm('{$MsgInfo.linkages_name_del_msg}')) location.href='{$_A.query_url}/type_del&code={$magic.request.code}&id={$item.id}'">{$MsgInfo.linkages_name_del}</a></td>
	</tr>
	{ /loop}
	{else}
	{ list module="linkages" function="GetTypeList" var="loop" username=request email=request  code="request"}
		{foreach from=$loop.list item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center" >{ $item.id}</td>
		<td class="main_td1" align="center" ><input type="text" value="{$item.name}" name="name[]" /></td>
		<td class="main_td1" align="center" >{ $item.code}</td>
		<td class="main_td1" align="center" width="*">{$item.nid}</td>
		<td class="main_td1" align="center" ><input type="text" value="{$item.order|default:10}" name="order[]" size="5" /><input type="hidden" name="id[]" value="{$item.id}" /></td>
		<td class="main_td1" align="center" width="130"><a href="{$_A.query_url}/new&code={$magic.request.code}&id={$item.id}">{$MsgInfo.linkages_name_manage}</a> / <a href="{$_A.query_url}/type_edit&code={$magic.request.code}&id={$item.id}">{$MsgInfo.linkages_name_edit}</a> / <a href="#" onClick="javascript:if(confirm('{$MsgInfo.linkages_name_del_msg}')) location.href='{$_A.query_url}/type_del&code={$magic.request.code}&id={$item.id}'">{$MsgInfo.linkages_name_del}</a></td>
	</tr>
	{ /foreach}
	<tr >
		<td colspan="8"  class="page">
			{$loop.pages|showpage}
		</td>
	</tr>
	{/list}
	{/if}
	<tr >
		<td colspan="8"  class="submit">
			<input type="submit" name="submit" value="{$MsgInfo.linkages_name_submit}" />
		</td>
	</tr>
	</form>	
</table>

{elseif $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
<div class="module_title"><strong>{$MsgInfo.linkages_name_sub}</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="{$_A.query_url}/actions&code={$magic.request.code}&type_id={$magic.request.id}" method="post">
	<tr >
		<td class="main_td">{$MsgInfo.linkages_name_id}</td>
		<td class="main_td">{$MsgInfo.linkages_name_type_name}</td>
		<td class="main_td">{$MsgInfo.linkages_name_type_nid}</td>
		<td class="main_td">{$MsgInfo.linkages_name_name}</td>
		<td class="main_td">{$MsgInfo.linkages_name_value}</td>
		<td class="main_td">{$MsgInfo.linkages_name_order}</td>
		<td class="main_td">{$MsgInfo.linkages_name_manage}</td>
	</tr>
	{ foreach  from=$_A.linkage_list key=key item=item}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{$item.id}</td>
		<td class="main_td1" align="center">{$item.type_name}</td>
		<td class="main_td1" align="center">{$item.type_nid}</td>
		<td class="main_td1" align="center"><input type="text" value="{$item.name}" name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" value="{$item.value}" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" value="{$item.order|default:10}" name="order[]" size="5" /><input type="hidden" name="id[]" value="{$item.id}" /></td>
		<td class="main_td1" align="center" width="130"><!--<a href="{$_A.query_url}/subnew&id={$item.type_id}&pid={$item.id}">管理</a> /--> <a href="#" onClick="javascript:if(confirm('{$MsgInfo.linkages_name_del_msg}')) location.href='{$_A.query_url}/del&code={$magic.request.code}&type_id={$item.type_id}&id={$item.id}'">{$MsgInfo.linkages_name_del}</a></td>
	</tr>
	{ /foreach}
<tr >
	<td colspan="7"  class="submit">
		<input type="submit" name="submit" value="{$MsgInfo.linkages_name_submit}" />
	</td>
</tr>
</form>	
</table>

<div class="module_add">
<form name="form1" method="post" action="" onsubmit="return check_form()" >
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }{$MsgInfo.linkages_name_edit}{else}{$MsgInfo.linkages_name_new}{/if} ({$_A.linkage_type_result.name}) {$MsgInfo.linkages_name_sub}</strong></div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_type_name}：</div>
		<div class="c">
			{$_A.linkage_type_result.name}
		</div>
	</div>

	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_name}：</div>
		<div class="c">
			<input type="text" name="name"  value="{$_A.linkage_result.name}"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_value}：</div>
		<div class="c">
			<input type="text" name="value"  value="{$_A.linkage_result.value}" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_order}：</div>
		<div class="c">
			<input type="text" name="order"  value="{$_A.linkage_result.order|default:10}" onkeyup="value=value.replace(/[^0-9]/g,'')"/>
		</div>
	</div>
	
	<div class="module_submit" >
		<input type="hidden" name="pid" value="{$magic.request.pid|default:0}" />
		<input type="hidden" name="type_id" value="{$magic.request.id}" />
		<input type="submit"  name="submit" value="{$MsgInfo.linkages_name_submit}" />
		<input type="reset"  name="reset" value="{$MsgInfo.linkages_name_reset}" />
	</div>
</form>
</div>
<div class="module_add">
<div class="module_title"><strong>{$MsgInfo.linkages_name_list_new}</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="{$_A.query_url}/actions&code={$magic.request.code}" method="post">
	
	<tr  class="tr2">
		<td class="main_td1" align="center">{$MsgInfo.linkages_name_name}</td>
		<td class="main_td1" align="center">{$MsgInfo.linkages_name_value}</td>
		<td class="main_td1" align="center" >{$MsgInfo.linkages_name_order}</td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]"  value="10"size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]"  value="10"size="5" /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="name[]" /></td>
		<td class="main_td1" align="center"><input type="text" name="value[]" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
	</tr>
	<input type="hidden" name="type_id" value="{$magic.request.id}" />
<tr >
	<td colspan="6"  class="submit">
		<input type="submit" name="submit" value="{$MsgInfo.linkages_name_submit}" />
	</td>
</tr>
</form>	
</table>
{literal}
<script>
function check_form(){
	
	var frm = document.forms['form1'];
	var title = frm.elements['name'].value;
	
	 var errorMsg = '';
	  if (title == "") {
		errorMsg += '联动的名称必须填写' + '\n';
	  }
	 
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>
{/literal}

{elseif $_A.query_type == "type_new" || $_A.query_type == "type_edit"}
<div class="module_add">

	<form name="form1" method="post" action="" >
	<div class="module_title"><strong>{ if $_A.query_type == "type_edit" }{$MsgInfo.linkages_name_edit}{else}{$MsgInfo.linkages_name_new}{/if}{$MsgInfo.linkages_name_type}</strong></div>
	{ if $_A.query_type == "type_edit" }
	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_code}：</div>
		<div class="c">
			<input type="text" name="code" value="{$_A.linkage_type_result.code}" />
		</div>
	</div>
	{else}
	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_code}：</div>
		<div class="c">
			<input type="hidden" name="code" value="{$magic.request.code|default:system}" />{$magic.request.code|default:system}
		</div>
	</div>
	{/if}
	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_name}：</div>
		<div class="c">
			<input type="text" name="name" value="{$_A.linkage_type_result.name}" />
		</div>
	</div>

	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_nid}：</div>
		<div class="c">
			<input type="text" name="nid"  value="{$_A.linkage_type_result.nid}" onkeyup="value=value.replace(/[^a-z_]/g,'')"/>
		</div>
	</div>

	<div class="module_border">
		<div class="l">{$MsgInfo.linkages_name_order}：</div>
		<div class="c">
			<input type="text" name="order"  value="{$_A.linkage_type_result.order|default:10}"  onkeyup="value=value.replace(/[^0-9]/g,'')"/>
		</div>
	</div>
	
	<div class="module_submit" >
		{if $_A.query_type=="type_edit"}<input type="hidden" name="id" value="{$magic.request.id}" />{/if}
		<input type="submit"  name="submit" value="{$MsgInfo.linkages_name_submit}" />
		<input type="reset"  name="reset" value="{$MsgInfo.linkages_name_reset}" />
	</div>
	</form>
</div>
{/if}