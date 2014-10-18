{if $_A.query_type=="list"}
<ul class="nav3"> 
<li><a href="{$_A.query_url_all}" id="c_so">投票管理</a></li>  
<li><a href="{$_A.query_url_all}&action=new">添加投票</a></li> 
</ul> 
<div class="module_add">

{if $magic.request.action=="new" || $magic.request.edit!=""}

<div >
	<form action="{$_A.query_url_all}" method="post" enctype="multipart/form-data">
	<div class="module_title"><strong>{if $magic.request.edit!=""}<input type="hidden" name="id" value="{$_A.vote_result.id}" />修改投票 （<a href="{$_A.query_url_all}&action=new">添加</a>）{else}添加投票{/if}</strong></div>
	
	
	<div class="module_border">
		<div class="l">投票标题：</div>
		<div class="c">
			<input type="text" name="title" value="{$_A.vote_result.title}"/>
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			{input value='1|显示,0|关闭' name="status" checked="$_A.vote_result.status"}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">表单类型：</div>
		<div class="c">
			{input value='radio|单选,checked|多选' name="input" checked="$_A.vote_result.input"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">所属类型：</div>
		<div class="c">
			<select name="type_id">
				{loop module="vote" function="GetVoteTypeList" limit="all"}
				<option value="{$var.id}">{$var.name}</option>
				{/loop}
			</select>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">简介：</div>
		<div class="c">
			<textarea name="remark" rows="5" cols="30">{$_A.vote_result.remark}</textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<input type="text" name="order" value="{$_A.vote_result.order|default:10}" size="8"/>
		</div>
	</div>
	
	
	<div class="module_submit"><input type="submit" value="确认提交" class="submit_button" /></div>
		</form>
	</div>
	</div>

{elseif  $magic.request.vote!="" }<div class="module_add">
<div class="module_title"><strong>{$_A.vote_result.title}</strong>答案</div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="{$_A.query_url_all}&vote={$magic.request.vote}" method="post">
	<tr >
		<td class="main_td">id</td>
		<td class="main_td">编号</td>
		<td class="main_td">答案标题</td>
		<td class="main_td">状态</td>
		<td class="main_td">排序</td>
		<td class="main_td">正确答案</td>
		<td class="main_td">操作</td>
	</tr>
	{ loop  module="vote" function="GetVoteAnswerList" limit="all" var=item vote_id='$_A.vote_result.id'}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{$item.id}</td>
		<td class="main_td1" align="center"><input type="text" value="{$item.nid}" name="nid[{$item.id}]"  size="5" /></td>
		<td class="main_td1" align="center"><input type="text" value="{$item.title}" name="title[{$item.id}]" /></td>
		<td class="main_td1" align="center"><select name="status[{$item.id}]"><option value="1" {if $item.status==1} selected="selected"{/if}>开启</option><option value="0" {if $item.status==0} selected="selected"{/if}>关闭</option></select></td>
		<td class="main_td1" align="center" ><input type="text" value="{$item.order|default:10}" name="order[]" size="5" /><input type="hidden" name="id[{$item.id}]" value="{$item.id}" /></td>
		<td class="main_td1" align="center">
		<input name="answer_status[{$item.id}]" type="checkbox" value="1" {if $item.answer_status==1} checked="checked"{/if}/></td>
		<td class="main_td1" align="center" width="130"><!--<a href="{$_A.query_url}/subnew&id={$item.type_id}&pid={$item.id}">管理</a> /--> <a href="#" onClick="javascript:if(confirm('确认删除，删除后将不能修改')) location.href='{$_A.query_url_all}&answer_del={$item.id}&vote_id={$item.vote_id}'">删除</a></td>
	</tr>
	{ /loop}
<tr >
	<td colspan="7"  class="submit">
		<input type="submit" name="submit" value="{$MsgInfo.linkages_name_submit}" />
	</td>
</tr>
</form>	
</table>

<div class="module_add">
<form name="form1" method="post" action="" onsubmit="return check_form()" >
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }修改{else}添加{/if} ({$_A.vote_result.title}) 答案信息</strong></div>
	
	<div class="module_border">
		<div class="l">投票标题：</div>
		<div class="c">
			{$_A.vote_result.title}
		</div>
	</div>

	<div class="module_border">
		<div class="l">编号：</div>
		<div class="c">
			<input type="text" name="nid"  value="{$_A.vote_answer_result.nid}"  size="5" />(如，A,B,C,D)
		</div>
	</div>
	<div class="module_border">
		<div class="l">答案标题：</div>
		<div class="c">
			<input type="text" name="title"  value="{$_A.vote_answer_result.title}"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			{input value='1|显示,0|关闭' name="status" checked="$_A.vote_answer_result.status"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<input type="text" name="order"  value="{$_A.vote_answer_result.order|default:10}" onkeyup="value=value.replace(/[^0-9]/g,'')"/>
		</div>
	</div>
	
	
	
	<div class="module_border">
		<div class="l">正确答案：</div>
		<div class="c">
			<input name="answer_status" type="checkbox" value="1" {if $_A.vote_answer_result.answer_status==1} checked="checked"{/if}  />
		</div>
	</div>
	
	<div class="module_submit" >
		<input type="hidden" name="vote_id" value="{$magic.request.vote}" />
		<input type="submit"  name="submit" value="提交" />
		<input type="reset"  name="reset" value="重置" />
	</div>
</form>
</div>
<div class="module_add">
<div class="module_title"><strong>添加多条答案</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="{$_A.query_url_all}&vote={$magic.request.vote}" method="post">
	
	<tr  class="tr2">
		<td class="main_td1" align="center">编号</td>
		<td class="main_td1" align="center">答案标题</td>
		<td class="main_td1" align="center" >排序</td>
		<td class="main_td1" align="center" >正确答案</td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="nid[]" /></td>
		<td class="main_td1" align="center"><input type="text"  name="title[]" size="5" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
		<td class="main_td1" align="center"><input name="answer_status[]" type="checkbox" value="1"  /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="nid[]" /></td>
		<td class="main_td1" align="center"><input type="text"  name="title[]" size="5" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
		<td class="main_td1" align="center"><input name="answer_status[]" type="checkbox" value="1"  /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="nid[]" /></td>
		<td class="main_td1" align="center"><input type="text"  name="title[]" size="5" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
		<td class="main_td1" align="center"><input name="answer_status[]" type="checkbox" value="1"  /></td>
	</tr>
	<tr >
		<td class="main_td1" align="center"><input type="text"  name="nid[]" /></td>
		<td class="main_td1" align="center"><input type="text"  name="title[]" size="5" /></td>
		<td class="main_td1" align="center" ><input type="text" name="order[]" value="10" size="5" /></td>
		<td class="main_td1" align="center"><input name="answer_status[]" type="checkbox" value="1"  /></td>
	</tr>
<tr >
	<td colspan="6"  class="submit">
		<input type="submit" name="submit" value="提交" />
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


{else}
<div class="module_title"><strong>投票管理</strong></div>
	</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="" class="main_td">标题</td>
		<td width="*" class="main_td">问题类型</td>
		<td width="" class="main_td">添加时间</td>
		<td width="*" class="main_td">排序</td>
		<td width="*" class="main_td">表单类型</td>
		<td width="*" class="main_td">状态</td>
		<td width="*" class="main_td">操作</td>
	</tr>
	{ list module="vote" function="GetVoteList" var="loop" username=request status="request"}
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.title}</td>
		<td class="main_td1" align="center">{$item.type_name}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format:"Y-m-d"}</td>
		<td class="main_td1" align="center">{$item.order}</td>
		<td class="main_td1" align="center">{if $item.input=='radio'}单选{else}多选{/if}</td>
		<td class="main_td1" align="center">{if $item.status==1}显示{else}关闭{/if}</td>
		<td class="main_td1" align="center"><a href="{$_A.query_url_all}&vote={$item.id}">管理答案</a>/<a href="{$_A.query_url_all}&edit={$item.id}">修改</a>/<a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url_all}&del={$item.id}'">删除</a></td>
	</tr>
	{/foreach}
	<tr align="center">
		<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	{/list}
	
</table>
{/if}

{elseif $_A.query_type == "type"}
<div class="module_add">
	<div class="module_title"><strong>投票类型</strong></div>
	<div style="margin-top:10px;">
	<div style="float:left; width:30%;">
		
	<div style="border:1px solid #CCCCCC; ">
	
	<form action="{$_A.query_url_all}" method="post">
	<div class="module_title"><strong>{if $magic.request.edit!=""}<input type="hidden" name="id" value="{$_A.vote_type_result.id}" />修改投票类型 （<a href="{$_A.query_url_all}">添加</a>）{else}添加投票类型{/if}</strong></div>
	
	
	<div class="module_border">
		<div class="l">类型名称：</div>
		<div class="c">
			<input type="text" name="name" value="{$_A.vote_type_result.name}"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">标识名：</div>
		<div class="c">
			<input type="text" name="nid" value="{$_A.vote_type_result.nid}"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			{input name="status" value="1|开启,2|关闭" checked="$_A.vote_type_result.status"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">描述：</div>
		<div class="c">
			<textarea name="remark" rows="5" cols="30">{$_A.vote_type_result.remark}</textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<input type="text" name="order" value="{$_A.vote_type_result.order|default:10}" size="8"/>
		</div>
	</div>
	
	
	<div class="module_submit"><input type="submit" value="确认提交" class="submit_button" /></div>
		</form>
	</div>
	</div>
		</div>
	<div style="float:right; width:67%; text-align:left">
	<div class="module_add">
	
	
	
	<div class="module_title"><strong>投票类型列表</strong></div>
	</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="" class="main_td">名称</td>
		<td width="" class="main_td">标识名</td>
		<td width="*" class="main_td">状态</td>
		<td width="*" class="main_td">排序</td>
		<td width="*" class="main_td">描述</td>
		<td width="*" class="main_td">操作</td>
	</tr>
	{ list module="vote" function="GetVoteTypeList" var="loop" username=request }
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.name}</td>
		<td class="main_td1" align="center">{$item.nid}</td>
		<td class="main_td1" align="center">{if $item.status==1}开启{else}关闭{/if}</td>
		<td class="main_td1" align="center">{$item.order}</td>
		<td class="main_td1" align="center">{$item.remark}</td>
		<td class="main_td1" align="center"><a href="{$_A.query_url_all}&edit={$item.id}">修改</a>/<a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='{$_A.query_url_all}&del={$item.id}'">删除</a></td>
	</tr>
	{/foreach}
	
	<tr align="center">
		<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	{/list}
	
</table>

<!--菜单列表 结束-->
</div>
</div>
{/if}