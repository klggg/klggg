{literal}
<script>
function CheckExamine(){
	if ($("#verify_remark").val()==""){
		alert("备注不能为空");
		return false;
	}
}
</script>
{/literal}
{if $magic.request.id5!=""}
<div  style="height:205px; overflow:hidden">
	<form name="form1" method="post" action="{$_A.query_url_all}&id5={$magic.request.id5}" onsubmit="return CheckExamine()" >
	<div class="module_border_ajax">
		<div class="c">
		<strong>说明：</strong>如果要进行ID5认证，请先确保你的ID5已经签订好协议，同时后台这边的id5认证将不扣除用户的任何费用。</div>
	</div>
	
	<div class="module_border_ajax" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5" id="verify_remark"></textarea>
		</div>
	</div>
	<div class="module_border_ajax" >
		<div class="l">验证码:</div>
		<div class="c">
			<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3" onClick="$('#valicode1').attr('src','/?plugins&q=imgcode&t=' + Math.random())"/>
		</div>
		<div class="c">
			<img src="/?plugins&q=imgcode" id="valicode1" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>

	<div class="module_submit_ajax" >
		<input type="hidden" name="borrow_nid" value="{ $magic.request.check}" />{literal}
		<input type="submit"  name="submit" class="submit_button" value="确认审核"  />{/literal}
	</div>
	
</form>
</div>
{elseif $magic.request.examine!=""}
<div  style="height:205px; overflow:hidden">
	<form name="form1" method="post" action="{$_A.query_url_all}&examine={$magic.request.examine}" onsubmit="return CheckExamine()">
	<div class="module_border_ajax">
		<div class="l">审核:</div>
		<div class="c">
		{linkages type="value" input="radio" nid="approve_status" name="status" value="$_A.approve_result.status"}
	</div>
	
	<div class="module_border_ajax" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="7">{$_A.approve_result.verify_remark}</textarea>
		</div>
	</div>
	<div class="module_border_ajax" >
		<div class="l">验证码:</div>
		<div class="c">
			<input name="valicode" type="text" size="11" maxlength="4"  tabindex="3" onClick="$('#valicode1').attr('src','/?plugins&q=imgcode&t=' + Math.random())"/>
		</div>
		<div class="c">
			<img src="/?plugins&q=imgcode" id="valicode1" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>

	<div class="module_submit_ajax" >
		<input type="hidden" name="borrow_nid" value="{ $magic.request.check}" />
		<input type="submit"  name="reset" class="submit_button" value="确认审核" />
	</div>
	
</form>
</div>
{else}
<ul class="nav3"> 
<li><a href="{$_A.query_url}/realname" id="c_so">实名认证</a></li> 
<li><a href="{$_A.query_url}/realname&action=id5list">ID5认证</a></li> 
</ul> 

{if $magic.request.action=="id5list"}
<div class="module_add">
	<div class="module_title"><strong>ID5认证列表</strong></div>
	</div>
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="" class="main_td">用户</td>
		<td width="*" class="main_td">真实姓名</td>
		<td width="*" class="main_td">身份证号码</td>
		<td width="*" class="main_td">状态</td>
		<td width="*" class="main_td">结果</td>
		<td width="*" class="main_td">头像</td>
		<td width="*" class="main_td">时间</td>
	</tr>
	
	{ list module="approve" function="GetId5List" var="loop" username=request  realname=request  card_id=request  epage=8 }
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.realname}</td>
		<td class="main_td1" align="center">{$item.card_id}</td>
		<td class="main_td1" align="center">{$item.status|linkages:"approve_cardid_status"}</td>
		<td class="main_td1" align="center">{$item.value}</td>
		<td class="main_td1" align="center">{if $item.status==3}<a href="{$item.user_id|idcard}" target="_blank"><img src="{$item.user_id|idcard}" width="40" /></a>{else}-{/if}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format}</td>
	</tr>
	{/foreach}
	<tr>
			<td colspan="15" class="action">
			<div class="floatl">
			<script>
			  var url = '{$_A.query_url_all}&action=id5list';
				{literal}
				function sousuo(){
					var username = $("#username").val();
					var realname = $("#realname").val();
					var card_id = $("#card_id").val();
					location.href=url+"&username="+username+"&realname="+realname+"&card_id="+card_id;
				}
			  </script>
			  {/literal}
			</div>
			<div class="floatr">
				用户名：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/> 真实姓名：<input type="text" name="realname" id="realname" value="{$magic.request.realname|urldecode}"/>  身份证号：<input type="text" name="card_id" id="card_id" value="{$magic.request.card_id}"/>   <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="sousuo()">
			</div>
			</td>
		</tr>
		
	<tr align="center">
		<td colspan="14" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	{/list}
</table>


{else}

<div class="module_add">
	<div class="module_title"><strong>身份认证</strong></div>
	<div style="margin-top:10px;">
	<div style="float:left; width:30%;">
		
	<div style="border:1px solid #CCCCCC; ">
	
	{if $magic.request.user_id==""}
	<form action="{$_A.query_url_all}" method="post">
	<div class="module_title"><strong>查找用户</strong>(将按顺序进行搜索)<input type="hidden" name="type" value="user_id" /></div>
	
	
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="c">
			<input type="text" name="username" />
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">用户ID：</div>
		<div class="c">
			<input type="text" name="user_id" />
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">邮箱：</div>
		<div class="c">
			<input type="text" name="email" />
		</div>
	</div>
	
	<div class="module_submit"><input type="submit" value="确认提交" class="submit_button" /></div>
		</form>
	</div>
	{else}
	<form action="" method="post" enctype="multipart/form-data">
	<div class="module_title"><strong>修改身份认证信息</strong><input type="hidden" name="user_id" value="{$magic.request.user_id}" /></div>
	
	<div class="module_border">
	<div class="l">用 户 名 ：</div>
		<div class="c">
			{$_A.approve_result.username}
		</div>
	</div>
	
	
	<div class="module_border">
	<div class="l">状&nbsp;&nbsp;态：</div>
		<div class="c">
			{$_A.approve_result.status|linkages:"approve_status"}
		</div>
	</div>
	
	{if $_A.approve_result.verify_remark!=""}
	<div class="module_border">
	<div class="l"><font color="#FF0000">审核备注：</font></div>
		<div class="c">
			{$_A.approve_result.verify_remark}
		</div>
	</div>
	{/if}
	
	<div class="module_border">
	<div class="l">真实姓名：</div>
		<div class="c">
			<input type="text" name="realname" value="{$_A.approve_result.realname}"/>
		</div>
	</div>
	
	<div class="module_border">
	<div class="l">性别：</div>
		<div class="c">
			{input type="radio" value="男|男,女|女" name="sex" checked="$_A.approve_result.sex"}
		</div>
	</div>
	
	<div class="module_border">
	<div class="l">身份证号：</div>
		<div class="c">
			<input type="text" name="card_id" value="{$_A.approve_result.card_id}"/>
		</div>
	</div>
	
	
	
	<div class="module_border">
	<div class="l">身份证正面：</div>
		<div class="c">
			<input type="file" name="card_pic1" style=" width:200px"/>{if $_A.approve_result.card_pic1!=""}<a href="./{ $_A.approve_result.card_pic1_url}" target="_blank" title="有图片"><img src="{ $_A.tpldir  }/images/ico_yes.gif" border="0"  /></a>{/if}
		</div>
	</div>
	
	
	
	<div class="module_border">
	<div class="l">身份证背面：</div>
		<div class="c">
			<input type="file" name="card_pic2" size="6"  style=" width:200px"/>{if $_A.approve_result.card_pic2!=""}<a href="./{ $_A.approve_result.card_pic2_url}" target="_blank" title="有图片"><img src="{ $_A.tpldir }/images/ico_yes.gif" border="0"  /></a>{/if}
		</div>
	</div>
	
	<div class="module_border" >
	<div class="l">验 证 码 ：</div>
		<div class="c">
			<input name="valicode" type="text" size="11" maxlength="4"  onClick="$('#valicode').attr('src','/?plugins&q=imgcode&t=' + Math.random())"/>
		
			<img src="/?plugins&q=imgcode" id="valicode" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" />
		</div>
	</div>
	
	
	<div class="module_submit"><input type="submit" value="确认提交" class="submit_button" /></div>
		</form>
	</div>
	{/if}
	</div>
		</div>
	<div style="float:right; width:67%; text-align:left">
	<div class="module_add">
	<div class="module_title"><strong>实名认证列表</strong></div>
	</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="" class="main_td">用户</td>
		<td width="" class="main_td">真实姓名</td>
		<td width="" class="main_td">身份证号</td>
		<td width="*" class="main_td">性别</td>
		<td width="*" class="main_td">正面</td>
		<td width="*" class="main_td">反面</td>
		<td width="*" class="main_td">ID5认证</td>
		<td width="*" class="main_td">状态</td>
		<td width="*" class="main_td">时间</td>
		<td width="*" class="main_td">操作</td>
	</tr>
	{ list module="approve" function="GetRealnameList" var="loop" username=request  realname=request  card_id=request  epage=8 }
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.realname}</td>
		<td class="main_td1" align="center">{$item.card_id}</td>
		<td class="main_td1" align="center">{$item.sex}</td>
		<td class="main_td1" align="center">{if $item.card_pic1==""}-{else}<a href="./{ $item.card_pic1_url}" target="_blank" title="有图片"><img src="{ $_A.tpldir  }/images/ico_yes.gif" border="0"  /></a>{/if}</td>
		<td class="main_td1" align="center">{if $item.card_pic2==""}-{else}<a href="./{ $item.card_pic2_url}" target="_blank" title="有图片"><img src="{ $_A.tpldir }/images/ico_yes.gif" border="0"  /></a>{/if}</td>
		<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("ID5认证审核","url:get?{$_A.query_url_all}&id5={$item.user_id}",500,230,"true","","false","text");'>{$item.id5_status|linkages:"approve_cardid_status"}</a></td>
		<td class="main_td1" align="center">{$item.status|linkages:"approve_status"}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format:"Y-m-d"}</td>
		<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("人工审核","url:get?{$_A.query_url_all}&examine={$item.user_id}",500,230,"true","","false","text");'/>审核</a>/<a href="{$_A.query_url_all}&user_id={$item.user_id}&page={$magic.request.page}">修改</a></td>
	</tr>
	{/foreach}
	<tr>
			<td colspan="15" class="action">
			<div class="floatl">
			<script>
			  var url = '{$_A.query_url_all}';
				{literal}
				function sousuo(){
					var username = $("#username").val();
					var realname = $("#realname").val();
					var card_id = $("#card_id").val();
					location.href=url+"&username="+username+"&realname="+realname+"&card_id="+card_id;
				}
			  </script>
			  {/literal}
			</div>
			<div class="floatr">
				用户名：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}" size="7"/> 真实姓名：<input type="text" size="7" name="realname" id="realname" value="{$magic.request.realname|urldecode}"/>  身份证号：<input type="text" name="card_id" id="card_id" value="{$magic.request.card_id}" size="7"/>   <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="sousuo()">
			</div>
			</td>
		</tr>
		
	<tr align="center">
		<td colspan="14" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	{/list}
	
</table>
<!--菜单列表 结束-->
</div>
</div>

	{/if}
{/if}
