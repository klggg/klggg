{if $magic.request.examine==""}
<ul class="nav3"> 
<li><a href="{$_A.query_url}/amount" id="c_so">额度列表</a></li> 
<li><a href="{$_A.query_url}/amount_apply">额度审核</a></li> 
<li><a href="{$_A.query_url}/amount_log">额度记录</a></li> 
<li><a href="{$_A.query_url}/amount_type">额度类型</a></li> 
</ul> 
{/if}

{if $_A.query_type == "amount"}

<div class="module_add">
	
	
	<div class="module_title"><strong>用户额度列表</strong></div>
	</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">用户名</td>
		<td width="" class="main_td" colspan="3" align="center">借款额度</td>
		<td width="" class="main_td" colspan="3" align="center">担保借款额度</td>
		<td width="" class="main_td" colspan="3" align="center">担保投资额度</td>
	</tr>
	<tr >
		<td width="" class="main_td"></td>
		<td width="*" class="main_td">总额度 =</td>
		<td width="" class="main_td">可用额度 +</td>
		<td width="*" class="main_td">不可用额度</td>
		<td width="*" class="main_td">总额度 =</td>
		<td width="" class="main_td">可用额度 +</td>
		<td width="*" class="main_td">不可用额度</td>
		<td width="*" class="main_td">总额度 =</td>
		<td width="" class="main_td">可用额度 +</td>
		<td width="*" class="main_td">不可用额度</td>
	</tr>
	{list module="borrow" function="GetAmountList" var="loop" username=request epage=20}
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.borrow_amount}</td>
		<td class="main_td1" align="center">{$item.borrow_amount_use}</td>
		<td class="main_td1" align="center">{$item.borrow_amount_nouse}</td>
		<td class="main_td1" align="center">{$item.vouch_borrow}</td>
		<td class="main_td1" align="center">{$item.vouch_borrow_use}</td>
		<td class="main_td1" align="center">{$item.vouch_borrow_nouse}</td>
		<td class="main_td1" align="center">{$item.vouch_tender}</td>
		<td class="main_td1" align="center">{$item.vouch_tender_use}</td>
		<td class="main_td1" align="center">{$item.vouch_tender_nouse}</td>
	</tr>
	{/foreach}
	
	<tr align="center">
		<td colspan="10" align="center"><div align="center">{$loop.pages|showpage}</div></td>
	</tr>
	{/list}
	
</table>

{elseif $_A.query_type == "amount_type"}

<div class="module_add">
	<div class="module_title"><strong>额度类型</strong></div>
	<div style="margin-top:10px;">
	<div style="float:left; width:30%;">
		
	<div style="border:1px solid #CCCCCC; ">
	
	<form action="{$_A.query_url_all}" method="post">
	<div class="module_title"><strong>{if $magic.request.edit!=""}<input type="hidden" name="id" value="{$_A.amount_type_result.id}" />修改类型 （<a href="{$_A.query_url_all}">添加</a>）{else}添加类型{/if}</strong></div>
	
	
	<div class="module_border">
		<div class="l">类型名称：</div>
		<div class="c">
			<input type="text" name="name" value="{$_A.amount_type_result.name}"/>
		</div>
	</div>
	
	<div class="module_border">
	<div class="l">额度类型：</div>
		<div class="c">
			{input type='select' value='$_A.borrow_amount_type' name='amount_type' checked='$_A.amount_type_result.amount_type'}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类型标识名：</div>
		<div class="c">
			<input type="text" name="nid" value="{$_A.amount_type_result.nid}"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">额度计算：</div>
		<div class="c">
			初始<input type="text" name="default" value="{$_A.amount_type_result.default}" style="width:35px; overflow:hidden"/> + <select name="credit_nid"><option value="">无</option>{loop module="credit" function="GetClassList" limit="all"}<option value="{$var.nid}" {if $_A.amount_type_result.credit_nid==$var.nid} selected="selected"{/if}>{$var.name}</option>
		
			{/loop}
			</select>*<input type="text" name="multiples" value="{$_A.amount_type_result.multiples}" style="width:25px; overflow:hidden"/>倍数+申请
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">描述：</div>
		<div class="c">
			<textarea name="remark" rows="5" cols="30">{$_A.amount_type_result.remark}</textarea>
		</div>
	</div>
	

	<div class="module_border_ajax" >
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
	
	
	<div class="module_title"><strong>额度类型列表</strong></div>
	</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="" class="main_td">名称</td>
		<td width="" class="main_td">类型</td>
		<td width="" class="main_td">标识名</td>
		<td width="*" class="main_td">初始额度</td>
		<td width="*" class="main_td">积分类型</td>
		<td width="*" class="main_td">积分倍数</td>
		<td width="*" class="main_td">简介</td>
		<td width="*" class="main_td">操作</td>
	</tr>
	{ list module="borrow" function="GetAmountTypeList" var="loop" username=request }
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.name}</td>
		<td class="main_td1" align="center">{$item.amount_type|in_array:"$_A.borrow_amount_type"}</td>
		<td class="main_td1" align="center">{$item.nid}</td>
		<td class="main_td1" align="center">{$item.default}</td>
		<td class="main_td1" align="center">{$item.credit_name|default:-}</td>
		<td class="main_td1" align="center">{$item.multiples}</td>
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


{elseif $_A.query_type == "amount_apply"}
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
{if $magic.request.examine!=""}
<div  style="height:305px; overflow:hidden">
	<form name="form1" method="post" action="{$_A.query_url_all}&examine={$magic.request.examine}" onsubmit="return CheckExamine()">
	<div class="module_border_ajax">
		<div class="l">审核:</div>
		<div class="c">
		{input type="radio" name="status" value='1|审核通过,2|审核不通过' }
	</div>
	
	<div class="module_border_ajax">
		<div class="l">操作:</div>
		<div class="c">
		{if $_A.amount_apply_result.oprate=="add"}增加{else}减少{/if}
	</div>
	<div class="module_border_ajax">
		<div class="l">申请额度:</div>
		<div class="c">
		{$_A.amount_apply_result.amount_account}
	</div>
	<div class="module_border_ajax">
		<div class="l">通过额度:</div>
		<div class="c">
		<input type="text" value="{$_A.amount_apply_result.amount_account}" name="account" />
	</div>
	<div class="module_border_ajax" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark"  id="verify_remark" cols="45" rows="7">{$_A.amount_apply_result.verify_remark}</textarea>
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
		<input type="hidden" name="user_id" value="{$_A.amount_apply_result.user_id}" />
		<input type="hidden" name="nid" value="{$_A.amount_apply_result.nid}" />
		<input type="hidden" name="id" value="{$magic.request.examine}" />
		<input type="submit"  name="reset" class="submit_button" value="确认审核" />
	</div>
	
</form>
</div>
{else}


<div class="module_add">
	<div class="module_title"><strong>添加用户额度</strong></div>
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
	<div class="module_title"><strong>添加用户额度</strong><input type="hidden" name="user_id" value="{$magic.request.user_id}" /></div>
	
	<div class="module_border">
	<div class="l">用 户 名 ：</div>
		<div class="c">
			{$_A.users_result.username}
		</div>
	</div>
	
	
	<div class="module_border">
	<div class="l">额度类型：</div>
		<div class="c">
			{input type='select' value='$_A.borrow_amount_type' name='amount_type' checked='1'}
		</div>
	</div>
	
	<div class="module_border">
	<div class="l">操作：</div>
		<div class="c">
			{input type="radio" value="add|增加,reduce|减少" name="oprate" checked="$_A.amount_apply_result.oprate"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">金额额度：</div>
		<div class="c">
			<input type="text" name="amount_account" value="{$_A.amount_apply_result.amount_account}"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">申请信息：</div>
		<div class="c">
			<textarea name="content" cols="30" rows="4">{$_A.amount_apply_result.content}</textarea>
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
	<div class="module_title"><strong>用户额度申请列表</strong></div>
	</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="" class="main_td">用户</td>
		<td width="" class="main_td">类型</td>
		<td width="*" class="main_td">操作</td>
		<td width="*" class="main_td">申请金额</td>
		<td width="*" class="main_td">通过额度</td>
		<td width="*" class="main_td">备注</td>
		<td width="*" class="main_td">状态</td>
		<td width="*" class="main_td">时间</td>
		<td width="*" class="main_td">操作</td>
	</tr>
	{ list module="borrow" function="GetAmountApplyList" var="loop" user_id=request  username=request  epage=8 }
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.amount_type|in_array:"$_A.borrow_amount_type"}</td>
		<td class="main_td1" align="center">{if $item.oprate=="add"}增加{else}减少{/if}</td>
		<td class="main_td1" align="center">{$item.amount_account}</td>
		<td class="main_td1" align="center">{$item.account}</td>
		<td class="main_td1" align="center">{$item.content}</td>
		<td class="main_td1" align="center">{if $item.status==0}待审核{elseif $item.status==1}审核通过{else}审核不通过{/if}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format}</td>
		<td class="main_td1" align="center">{if $item.status==0}<a href="javascript:void(0)" onclick='tipsWindown("审核用户申请额度","url:get?{$_A.query_url_all}&examine={$item.id}",500,330,"true","","false","text");'/>审核</a>{else}-{/if}</td>
	</tr>
	{/foreach}
	<tr>
			<td colspan="15" class="action">
			<div class="floatl">
			<script>
			  var url = '{$_A.query_url_all}';
				{literal}
				function amount_sou(){
					var username = $("#username").val();
					location.href=url+"&username="+username;
				}
			  </script>
			  {/literal}
			</div>
			<div class="floatr">
				用户名：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}" size="7"/>  <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="amount_sou()">
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

{elseif $_A.query_type == "amount_log"}
	<div class="module_add">
	<div class="module_title"><strong>额度记录列表</strong></div>
	</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="" class="main_td">用户</td>
		<td width="" class="main_td">类型</td>
		<td width="*" class="main_td">操作类型</td>
		<td width="*" class="main_td">操作</td>
		<td width="*" class="main_td">金额</td>
		<td width="*" class="main_td">备注</td>
		<td width="*" class="main_td">时间</td>
	</tr>
	{ list module="borrow" function="GetAmountLogList" var="loop" user_id=request  username=request  amount_type=request epage=20}
	{foreach from="$loop.list" item="item"}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{ $item.id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{$item.amount_type|in_array:"$_A.borrow_amount_type"}</td>
		<td class="main_td1" align="center">{$item.type}</td>
		<td class="main_td1" align="center">{if $item.oprate=="add"}增加{else}减少{/if}</td>
		<td class="main_td1" align="center">{$item.account}</td>
		<td class="main_td1" align="center">{$item.remark}</td>
		<td class="main_td1" align="center">{$item.addtime|date_format}</td>
	</tr>
	{/foreach}
	<tr>
			<td colspan="15" class="action">
			<div class="floatl">
			增加的额度：{$loop.oprate_add|default:0} 减少的额度：{$loop.oprate_reduce|default:0}
			<script>
			  var url = '{$_A.query_url_all}';
				{literal}
				function amount_sou(){
					var username = $("#username").val();
					var amount_type = $("#amount_type").val();
					location.href=url+"&username="+username+"&amount_type="+amount_type;
				}
			  </script>
			  {/literal}
			</div>
			<div class="floatr">
				用户名：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}" size="7"/>  额度类型：{input type='select' value='$_A.borrow_amount_type' name='amount_type' checked='$magic.request.amount_type' default="全部"} <input type="button" value="{$MsgInfo.users_name_sousuo}" / onclick="amount_sou()">
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
{/if}