{if $magic.request.action == ""  }
<div class="module_add">
	<div class="module_title"><strong>VIP会员列表</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr >
		<td width="" class="main_td">ID</td>
		<td width="*" class="main_td">用户名</td>
		<td width="*" class="main_td">类型</td>
		<!--<td width="*" class="main_td">客服名称</td>-->
		<td width="*" class="main_td">vip期限</td>
		<td width="*" class="main_td">开始时间</td>
		<th width="" class="main_td">结束时间</th>
		<th width="" class="main_td">是否缴费</th>
		<td width="" class="main_td">操作</td>
	</tr>
	{list module="users" function="GetUsersVipList" var="loop" username="$magic.request.username" vip_type="$magic.request.vip_type" status=1 dotime1="request" dotime2="request"}
	{ foreach  from=$loop.list key=key item=item}
	<tr {if $key%2==1} class="tr2"{/if}>
		<td class="main_td1" align="center">{$item.user_id}</td>
		<td class="main_td1" align="center">{$item.username}</td>
		<td class="main_td1" align="center">{if $item.vip_type==1}VIP会员{elseif $item.vip_type==2}高级Vip会员{/if}</td>
		<!--<td class="main_td1" align="center">{$item.adminname}</td>-->
		<td class="main_td1" align="center">{$item.years}月</td>
		<td class="main_td1" align="center" >{$item.first_date|date_format:"Y-m-d H:i:s"|default:"-"}</td>
		<td class="main_td1" align="center" >{$item.end_date|date_format:"Y-m-d H:i:s"|default:"-"}</td>
		<td class="main_td1" align="center">{if $item.money>0}{$item.money}元{else}无{/if}</td>
		<td class="main_td1" align="center"><a href="{$_A.query_url}/vip&action=view&user_id={$item.user_id}{$_A.site_url}">审核查看</a> </td>
	</tr>
	{ /foreach}
	<tr>
			<td colspan="10" class="action">
			<div class="floatl">
			<script>
	  var url = '{$_A.query_url}/vip&type={$magic.request.type}';
	    {literal}
	  	function sousuo(){
			var username = $("#username").val();
			var kefu = $("#kefu").val();
			var vip_type = $("#vip_type").val();
			var dotime1 = $("#dotime1").val();
			var dotime2 = $("#dotime2").val();
			location.href=url+"&kefu="+kefu+"&username="+username+"&vip_type="+vip_type+"&dotime1="+dotime1+"&dotime2="+dotime2;
		}
	  
	  </script>
	  {/literal}
			</div>
			<div class="floatr">
				用户名：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}"/> 	开始时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/><!--客服用户名：<input type="text" name="kefu" id="kefu" value="{$magic.request.kefu|urldecode}"/>--> Vip类型：<select name="vip_type" id="vip_type">
				<option value="">全部</option>
				<option value="1" {if $magic.request.vip_type=="1"} selected="selected"{/if}>VIP会员</option>
				<option value="2" {if $magic.request.vip_type=="2"} selected="selected"{/if}>高级VIP会员</option>
				</select><input type="button" value="搜索" / onclick="sousuo()">
			</div>
			</td>
		</tr>
	<tr>
		<td colspan="10" class="page">
		{$loop.pages|showpage}
		</td>
	</tr>
	{/list}
</table>
{ elseif $magic.request.action == "view"  }
<div class="module_add">
	
	<form enctype="multipart/form-data" name="form1" method="post" action=""  >
	<div class="module_title"><strong>VIP审核查看</strong></div>
	
	<div class="module_border">
		<div class="l">用户名:</div>
		<div class="c">
			{$_A.vip_result.username}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类型:</div>
		<div class="c">
			{if $_A.vip_result.vip_type==1}VIP会员{elseif $_A.vip_result.vip_type==2}高级Vip会员{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">审核:</div>
		<div class="c">{if $_A.vip_result.status=="1"}
		已通过<input type="hidden" value="1" name="status" />
		{else}
			<input type="radio" value="1" name="status" {if $_A.vip_result.status=="1"} checked="checked"{/if} />审核通过 <input type="radio" value="2" name="status"  {if $_A.vip_result.status=="2" || $_A.vip_result.status==""} checked="checked"{/if}/>审核不通过 
			{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">客服:</div>
		<div class="c">
			<select name="kefu_userid" id="kefu_userid">
				<option value="">请选择</option>
				{loop module="users" function="GetUsersAdminList" limit="all" type_id="3"}
				<option value="{$var.user_id}" {if $var.user_id==$_A.vip_result.kefu_userid} selected="selected"{/if}>{$var.adminname}</option>
				{/loop}
				</select>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">申请期限:</div>
		<div class="c">
			{$_A.vip_result.years}月
			<input type="hidden" value="1" name="years" value="{$_A.vip_result.years}" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">备注:</div>
		<div class="c">
			{$_A.vip_result.remark}
		</div>
	</div>
	
	
	<div class="module_border">
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="55" rows="6" >{$_A.vip_result.verify_remark}</textarea>
		</div>
	</div>
	
	<div class="module_submit" >
	<input type="hidden" name="user_id" value="{$_A.vip_result.user_id}" />
		<input type="submit" value="确认提交" />
		<input type="reset" name="reset" value="重置表单" />
	</div>
	</form>
{/if}