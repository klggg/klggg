<!--用户列表 开始-->
{if $_A.query_type == "list"}

<ul class="nav3"> 
<li><a href="{$_A.query_url_all}" id="c_so">{$MsgInfo.users_name_order_default}</a></li> 
<li><a href="{$_A.query_url_all}&order=last_time">{$MsgInfo.users_name_order_last_time}</a></li> 
<li><a href="{$_A.query_url_all}&order=reg_time" >{$MsgInfo.users_name_order_reg_time}</a></li>
</ul> 
<div class="module_add">
	<div class="module_title"><strong>用户列表</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">{$MsgInfo.users_name_id}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_username}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_email}</td>
		<td width="*" class="main_td" nowrap="nowrap">{$MsgInfo.users_name_logintime}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_reg_time}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_reg_ip}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_up_time}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_up_ip}</td>
		<th width="" class="main_td">{$MsgInfo.users_name_last_time}</th>
		<th width="" class="main_td">{$MsgInfo.users_name_last_ip}</th>
		<th width="" class="main_td" nowrap="nowrap">修改</th>
	</tr>
	{ list module="users" function="GetUsersList" var="loop" username=request email=request order="request"}
		{foreach from=$loop.list item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.user_id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.email}</td>
		<td class="main_td1" align="center">{$item.logintime|default:0}</td>
		<td class="main_td1" align="center" >{$item.reg_time|date_format:"Y-m-d H:i:s"}</td>
		<td class="main_td1" align="center" >{$item.reg_ip}</td>
		<td class="main_td1" align="center" >{$item.up_time|date_format:"Y-m-d H:i:s"}</td>
		<td class="main_td1" align="center" >{$item.up_ip}</td>
		<td class="main_td1" align="center" >{$item.last_time|date_format:"Y-m-d H:i:s"}</td>
		<td class="main_td1" align="center" >{$item.last_ip}</td>
		<td class="main_td1" align="center" ><a href="{$_A.query_url}/edit&user_id={$item.user_id}">修改</a></td>
	</tr>
	{/foreach}
	<tr>
			<td colspan="11" class="action">
			<div class="floatl">
			<script>
	  var url = '{$_A.query_url}';
	    {literal}
	  	function sousuo(){
			var username = $("#username").val();
			var email = $("#email").val();
			location.href=url+"&username="+username+"&email="+email;
		}
	  
	  </script>
	  {/literal}
			</div>
			<div class="floatr">
				{$MsgInfo.users_name_username}：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/>  {$MsgInfo.users_name_email}：<input type="text" name="email" id="email" value="{$magic.request.email}"/>   <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr align="center">
		<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	
	{ /list}
</table>
<!--用户列表 结束-->

{elseif $_A.query_type == "info_edit" }
<div class="module_add">
	
	<form  name="form_user" method="post" action="" >
	<div class="module_title"><strong>修改用户信息</strong></div>
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			{$_A._user_result.username}
		</div>
	</div>
	<div class="module_border">
		<div class="l">昵称：</div>
		<div class="c">
		<input name="niname" type="text"  class="input_border" value="{$_A._user_result.niname}" /> <font color="#FF0000">*</font>
		</div>
	</div>
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
		<select name="status">
			<option value="0" {if $_A._user_result.status=="0"} selected="selected"{/if}>申请</option>
			<option value="1" {if $_A._user_result.status=="1"} selected="selected"{/if}>正常</option>
			<option value="2" {if $_A._user_result.status=="2"} selected="selected"{/if}>关闭</option>
		</select>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">生日：</div>
		<div class="c">
		<input name="birthday" type="text"  class="input_border" value="{$_A._user_result.birthday}" /> 
		</div>
	</div>
	<div class="module_border">
		<div class="l">性别：</div>
		<div class="c">
		<input name="sex" type="radio"  class="input_border" value="男" {if $_A._user_result.sex=="男"} checked="checked"{/if} /> 男
		<input name="sex" type="radio"  class="input_border" value="女" {if $_A._user_result.sex=="女"} checked="checked"{/if} /> 女
		</div>
	</div>
	<div class="module_border">
		<div class="l">安全问题：</div>
		<div class="c">
		<input name="question" type="text"  class="input_border" value="{$_A._user_result.question}" /> 
		</div>
	</div>
	<div class="module_border">
		<div class="l">安全答案：</div>
		<div class="c">
		<input name="answer" type="text"  class="input_border" value="{$_A._user_result.answer}" /> 
		</div>
	</div>
	<div class="module_border">
		<div class="l">所在地：</div>
		<div class="c">
		{areas type="p,c,a"  value='$_A._user_result.area'}
		</div>
	</div>
	
	
	<div class="module_submit border_b" >
	<input type="hidden" name="user_id" value="{ $_A._user_result.user_id }" />
	<input type="submit" name="submit" value="提交" />
	</div>
	</form>
</div>

<!--用户信息列表 开始-->
{elseif $_A.query_type == "info"}
<div class="module_add">
	<div class="module_title"><strong>用户信息</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">用户名</td>
		<td width="*" class="main_td">用户类型</td>
		<td width="*" class="main_td">管理类型</td>
		<td width="*" class="main_td">头像</td>
		<td width="*" class="main_td">用户状态</td>
		<td width="*" class="main_td">邀请人</td>
		<td width="*" class="main_td">查看详情</td>
	</tr>
	{ list module="users" function="GetUsersInfoList" var="loop" username=request email=request}
		{foreach from=$loop.list item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.user_id}</td>
		<td class="main_td1" align="center">{ $item.username}</td>
		<td class="main_td1" align="center">{$item.type_name}</td>
		<td class="main_td1" align="center">{$item.admin_name}</td>
		<td class="main_td1" align="center" >{$item.avatar}</td>
		<td class="main_td1" align="center" >{if $item.status==1}正常{elseif $item.status==0}申请{elseif $item.status==2}锁定{/if}</td>
		<td class="main_td1" align="center" >{$item.invite_username|default:-}</td>
		<td class="main_td1" align="center" ><a href="{$_A.query_url}/viewinfo&user_id={$item.user_id}">查看</a> <a href="{$_A.query_url}/info_edit&user_id={$item.user_id}">修改</a></td>
		
	</tr>
	{/foreach}
	<tr>
			<td colspan="11" class="action">
			<div class="floatl">
			<script>
	  var url = '{$_A.query_url}/info';
	    {literal}
	  	function sousuo(){
			var username = $("#username").val();
			var email = $("#email").val();
			location.href=url+"&username="+username+"&email="+email;
		}
	  
	  </script>
	  {/literal}
			</div>
			<div class="floatr">
				{$MsgInfo.users_name_username}：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/>  {$MsgInfo.users_name_email}：<input type="text" name="email" id="email" value="{$magic.request.email}"/>   <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr align="center">
		<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	
	{ /list}
</table>
<!--用户信息列表 结束-->

{elseif $_A.query_type == "rebut"}
<div class="module_add">
	<div class="module_title"><strong>用户记录</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">编号</td>
		<td width="" class="main_td">举报用户</td>
		<td width="" class="main_td">被举报用户</td>
		<td width="" class="main_td">类型</td>
		<td width="" class="main_td">举报留言</td>
		<td width="" class="main_td">举报时间</td>
	</tr>
	{ list module="users" function="GetRebutList" var="loop" username=request email=request epage="12" epage="10"}
	{foreach from=$loop.list item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{$item.id}</td>
		<td class="main_td1" align="center">{$item.username|default:-}</td>
		<td class="main_td1" align="center">{$item.rebut_username}</td>
		<td class="main_td1" align="center">{$item.type_id|linkages:"rebut_type"}</td>
		<td class="main_td1" align="center" width="200" >{$item.contents}</td>
		<td class="main_td1" align="center" >{$item.addtime|date_format:"Y-m-d H:i:s"}</td>
	</tr>
	{/foreach}
	
	<tr>
			<td colspan="11" class="action">
			<div class="floatl">
			<script>
	  var url = '{$_A.query_url_all}';
	    {literal}
	  	function sousuo(){
			var username = $("#username").val();
			var email = $("#email").val();
			location.href=url+"&username="+username+"&email="+email;
		}
	  
	  </script>
	  {/literal}
			</div>
			<div class="floatr">
				{$MsgInfo.users_name_username}：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/>  {$MsgInfo.users_name_email}：<input type="text" name="email" id="email" value="{$magic.request.email}"/>   <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr align="center">
		<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	{ /list}
</table>
<!--用户记录列表 开始-->
{elseif $_A.query_type == "log"}
<div class="module_add">
	<div class="module_title"><strong>用户记录</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">{$MsgInfo.users_name_id}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_username}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_code}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_type}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_operating}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_operating_id}</td>
		<td width="*" class="main_td">{$MsgInfo.users_name_result}</td>
		<th width="" class="main_td">{$MsgInfo.users_name_content}</th>
		<th width="" class="main_td">{$MsgInfo.users_name_add_time}</th>
		<th width="" class="main_td">{$MsgInfo.users_name_add_ip}</th>
	</tr>
	{ list module="users" function="GetUserslogList" var="loop" username=request email=request epage="12" page="request"}
		{foreach from=$loop.list item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.username|default:-}</td>
		<td class="main_td1" align="center">{$item.code}</td>
		<td class="main_td1" align="center" >{$item.type}</td>
		<td class="main_td1" align="center" >{$item.operating}</td>
		<td class="main_td1" align="center" >{$item.article_id}</td>
		<td class="main_td1" align="center" >{if $item.result==1}<font color="#006600">{$MsgInfo.users_name_success}</font>{else}<font color="#FF0000">{$MsgInfo.users_name_false}</font>{/if}</td>
		<td class="main_td1" align="center" width="200" >{$item.content}</td>
		<td class="main_td1" align="center" >{$item.addtime|date_format:"Y-m-d H:i:s"}</td>
		<td class="main_td1" align="center" >{$item.addip}</td>
	</tr>
	{/foreach}
	
	<tr>
			<td colspan="11" class="action">
			<div class="floatl">
			<script>
	  var url = '{$_A.query_url_all}';
	    {literal}
	  	function sousuo(){
			var username = $("#username").val();
			var email = $("#email").val();
			location.href=url+"&username="+username+"&email="+email;
		}
	  
	  </script>
	  {/literal}
			</div>
			<div class="floatr">
				{$MsgInfo.users_name_username}：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/>  {$MsgInfo.users_name_email}：<input type="text" name="email" id="email" value="{$magic.request.email}"/>   <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr align="center">
		<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	{ /list}
</table>
<!--用户记录列表 结束-->

{elseif $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
	
	<form  name="form_user" method="post" action="" { if $_A.query_type == "new" }onsubmit="return check_user();"{/if} >
	<div class="module_title"><strong>{ if $_A.query_type == "edit" }{$MsgInfo.users_name_edit}{else}{$MsgInfo.users_name_new}{/if}</strong></div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.users_name_username}：</div>
		<div class="c">
			{ if $_A.query_type != "edit" }<input name="username" type="text"  class="input_border" />{else}{ $_A.users_result.username}<input name="username" type="hidden"  class="input_border" value="{$_A.users_result.username}" />{/if} <font color="#FF0000">*</font>
		</div>
	</div>
	<div class="module_border">
		<div class="l">邮箱：</div>
		<div class="c">
			{ if $_A.query_type != "edit" }<input name="email" type="text"  class="input_border" />{else}{ $_A.users_result.email}<input name="email" type="hidden"  class="input_border" value="{$_A.users_result.email}" />{/if} <font color="#FF0000">*</font>
		</div>
	</div>
	<div class="module_border">
		<div class="l">{$MsgInfo.users_name_password}：</div>
		<div class="c">
			<input name="password" type="password" class="input_border" />{ if $_A.query_type == "edit" } {$MsgInfo.users_name_edit_not_empty}{/if} <font color="#FF0000">*</font>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.users_name_password1}：</div>
		<div class="c">
			<input name="password1" type="password" class="input_border" />{ if $_A.query_type == "edit" } {$MsgInfo.users_name_edit_not_empty}{/if} <font color="#FF0000">*</font>
		</div>
	</div>
	<div class="module_border">
		<div class="l">支付密码：</div>
		<div class="c">
			<input name="paypassword" type="password" class="input_border" />{ if $_A.query_type == "edit" } {$MsgInfo.users_name_edit_not_empty}{/if} <font color="#FF0000">*</font>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">确认支付密码：</div>
		<div class="c">
			<input name="paypassword1" type="password" class="input_border" />{ if $_A.query_type == "edit" } {$MsgInfo.users_name_edit_not_empty}{/if} <font color="#FF0000">*</font>
		</div>
	</div>
	
	
	<div class="module_submit border_b" >
	{ if $_A.query_type == "edit" }<input type="hidden" name="user_id" value="{ $_A.users_result.user_id }" />{/if}
	<input type="submit" value="{$MsgInfo.users_name_submit}" /><input type="hidden" name="status" value="1" />
	<input type="reset" name="reset" value="{$MsgInfo.users_name_reset}" />
	</div>
	</form>
</div>
{literal}
<script>
function check_user(){
	 var frm = document.forms['form_user'];
	 var username = frm.elements['username'].value;
	 var password = frm.elements['password'].value;
	  var password1 = frm.elements['password1'].value;
	   var email = frm.elements['email'].value;
	 var errorMsg = '';
	  if (username.length == 0 ) {
		errorMsg += '<? echo $this->magic_vars['MsgInfo']['users_username_empty']; ?> \n';
	  }
	   if (username.length<4) {
		errorMsg += '<? echo $this->magic_vars['MsgInfo']['users_username_long4']; ?> \n';
	  }
	  if (password.length==0) {
		errorMsg += '<? echo $this->magic_vars['MsgInfo']['users_password_empty']; ?> \n';
	  }
	  if (password.length<6) {
		errorMsg += '<? echo $this->magic_vars['MsgInfo']['users_password_long6']; ?> \n';
	  }
	   if (password.length!=password1.length) {
		errorMsg += '<? echo $this->magic_vars['MsgInfo']['users_password_error']; ?> \n';
	  }
	   if (email.length==0) {
		errorMsg += '<? echo $this->magic_vars['MsgInfo']['users_email_empty']; ?> \n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>
{/literal}




<!--审核记录列表 开始-->
{elseif $_A.query_type == "examine"}
<div class="module_add">
<div class="module_title"><strong>审核记录列表</strong></div>
</div> 
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">id</td>
		<td width="*" class="main_td">审核人</td>
		<td width="*" class="main_td">模块</td>
		<td width="*" class="main_td">类型</td>
		<td width="*" class="main_td">文章</td>
		<th width="" class="main_td">结果</th>
		<td width="*" class="main_td">审核备注</td>
		<td width="*" class="main_td">审核时间</td>
	</tr>
	{ list module="users" function="GetExamineList" var="loop" username=request  epage="12" page="request"}
		{foreach from=$loop.list item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.username|default:-}</td>
		<td class="main_td1" align="center">{$item.code}</td>
		<td class="main_td1" align="center" >{$item.type}</td>
		<td class="main_td1" align="center" >{$item.article_id}</td>
		<td class="main_td1" align="center" >{if $item.result==1}<font color="#006600">{$MsgInfo.users_name_success}</font>{else}<font color="#FF0000">{$MsgInfo.users_name_false}</font>{/if}(result={$item.result})</td>
		<td class="main_td1" align="center" >{$item.remark}</td>
		<td class="main_td1" align="center" >{$item.addtime|date_format:"Y-m-d H:i:s"}</td>
	</tr>
	{/foreach}
	
	<tr>
			<td colspan="11" class="action">
			<div class="floatl">
			<script>
	  var url = '{$_A.query_url_all}';
	    {literal}
	  	function sousuo(){
			var username = $("#username").val();
			var email = $("#email").val();
			location.href=url+"&username="+username+"&email="+email;
		}
	  
	  </script>
	  {/literal}
			</div>
			<div class="floatr">
				{$MsgInfo.users_name_username}：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/>    <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr align="center">
		<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	{ /list}
</table>
<!--审核记录列表 结束-->



{elseif $_A.query_type=="type"}

<div class="module_add">
	<div class="module_title"><strong>用户类型</strong></div>
	<div style="margin-top:10px;">
	<div style="float:left; width:30%;">
		
	<div style="border:1px solid #CCCCCC; ">
	
	<form action="{$_A.query_url_all}" method="post">
	<div class="module_title"><strong>{if $magic.request.edit!=""}<input type="hidden" name="id" value="{$_A.users_type_result.id}" />修改用户类型 （<a href="{$_A.query_url_all}">添加</a>）{else}添加用户类型{/if}</strong></div>
	
	
	<div class="module_border">
		<div class="l">类型名称：</div>
		<div class="c">
			<input type="text" name="name" value="{$_A.users_type_result.name}"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">标识名：</div>
		<div class="c">
			<input type="text" name="nid" value="{$_A.users_type_result.nid}" onkeyup="value=value.replace(/[^a-z0-9_]/g,'')"/>
		</div>
	</div>
	<div class="module_border">
		<div class="l">默&nbsp;&nbsp;认：</div>
		<div class="c">
			{input type="radio" name="checked" value="0|否,1|是" checked="$_A.users_type_result.checked"}（注册的时候用户默认的类型）
		</div>
	</div>
	<div class="module_border">
		<div class="l">描述：</div>
		<div class="c">
			<textarea name="remark" rows="5" cols="30">{$_A.users_type_result.remark}</textarea>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">排序：</div>
		<div class="c">
			<input type="text" name="order" value="{$_A.users_type_result.order|default:10}" size="8"/>
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">验证码：</div>
		<div class="c">
			<input name="valicode" type="text" size="11" maxlength="4"  onClick="$('#valicode').attr('src','/?plugins&q=imgcode&t=' + Math.random())"/>
		
			<img src="/?plugins&q=imgcode" id="valicode" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>
	
	
	<div class="module_submit"><input type="submit" value="确认提交" class="submit_button" /></div>
		</form>
	</div>
	</div>
		</div>
	<div style="float:right; width:67%; text-align:left">
	<div class="module_add">
	
	
	
	<div class="module_title"><strong>用户类型列表</strong></div>
	</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="" class="main_td">名称</td>
		<td width="" class="main_td">标识名</td>
		<td width="*" class="main_td">添加时间</td>
		<td width="*" class="main_td">是否默认</td>
		<td width="*" class="main_td">排序</td>
		<td width="*" class="main_td">操作</td>
	</tr>
	{ list module="users" function="GetUsersTypeList" var="loop" username=request }
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.name}</td>
		<td class="main_td1" align="center">{$item.nid}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format}</td>
		<td class="main_td1" align="center">{if $item.checked==1}是{else}<a href="{$_A.query_url_all}&checked={$item.id}" title="设为默认">否</a>{/if}</td>
		<td class="main_td1" align="center">{$item.order}</td>
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
{elseif $_A.query_type=="spread"}
<div class="module_add">
	<div class="module_title"><strong>审核部门</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">年份</td>
		<td width="" class="main_td">月份</td>
		<td width="" class="main_td">当月提出申请的总额度</td>
		<td width="*" class="main_td">当月实际审核的总额度</td>
		<td width="*" class="main_td">当月的完成比率</td>
		<td width="*" class="main_td">当月通过审核的总额度</td>
		<td width="*" class="main_td">当月的通过比率</td>
		<td width="*" class="main_td">当月的任务额度</td>
		<th width="" class="main_td">达成率</th>
		<th width="" class="main_td">提成收入</th>
	</tr>
	{list module="borrow" function="GetSpreadVerifyCount" var="loop" month="request"}
		{foreach from="$loop.list" item="item"}
		<tr {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center">{$item.Year}年</td>
			<td class="main_td1" align="center">{$key}月份</td>
			<td class="main_td1" align="center">￥{$item.ApplyTotal}</td>
			<td class="main_td1" align="center">￥{$item.Apply}</td>
			<td class="main_td1" align="center">{$item.VerifyScale}%</td>
			<td class="main_td1" align="center">￥{$item.VerifyYes}</td>
			<td class="main_td1" align="center">{$item.VerifyYesScale}%</td>
			<td class="main_td1" align="center">￥{$item.VerifyTask}</td>
			<td class="main_td1" align="center">{$item.VerifyTaskScale}%</td>
			<td class="main_td1" align="center">￥{$item.VerifyIncome}</td>
		</tr>
		{/foreach}
		<tr>
			<td colspan="10" class="action">
			<div class="floatl">
			</div>
			<div class="floatr">
			<script>
			var url = '{$_A.query_url_all}';
			{literal}
			function sousuo(){
				var month = $("#month").val();
				location.href=url+"&month="+month;
			}

			</script>
			{/literal}
				月份:<select name="month" id="month">
					{literal}
					<?
					for($i=1;$i<=12;$i++){
						echo "<option value='".$i."'>".$i."月份</option>";
					}
					?>
					{/literal}
					 </select>
			<input type="submit" value="搜索" onClick="sousuo()">
			</div>
			</td>
		</tr>
	{/list}
</table>

{elseif $_A.query_type == "vip" ||  $_A.query_type == "vipview" }

	{include file="users.vip.tpl" template_dir = "modules/users"}
{elseif $_A.query_type == "view" }

	{include file="users.view.tpl" template_dir = "modules/users"}	
{elseif $_A.query_type == "viewinfo" ||  $_A.query_type == "viewinfo" }

	{include file="users.viewinfo.tpl" template_dir = "modules/users"}


{elseif $_A.query_type == "admin" ||  $_A.query_type == "admin_log"  ||  $_A.query_type == "admin_type" }

	{include file="users.admin.tpl" template_dir = "modules/users"}

{/if}