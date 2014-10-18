{if $_A.query_type == "raise"}
<ul class="nav3">
<li><a href="{$_A.query_url}/raise">全部</a></li> 
<li><a href="{$_A.query_url_all}&status=-1">草稿</a></li> 
<li><a href="{$_A.query_url_all}&status=0">筹资中</a></li> 
<li><a href="{$_A.query_url_all}&status=1">筹资成功</a></li> 
<li><a href="{$_A.query_url_all}&status=2">筹资失败</a></li> 
<li><a href="{$_A.query_url}/raise_add">发起项目</a></li> 
</ul> 
<div class="module_add">
	<div class="module_title"><strong>项目列表</strong><div  style="float:right">
	<a href="{$_A.query_url}/raise_add">发起项目</a>
	</div></div>
	
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr>
			<td width="" class="main_td">ID</td>
			<td width="" class="main_td">项目标题</td>
			<td width="" class="main_td">筹资金额</td>
			<td width="" class="main_td">已筹资</td>
			<td width="" class="main_td">筹资期限</td>
			<td width="" class="main_td">发起时间</td>
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">查看</td>
		</tr>
		{ list  module="borrow" function="GetRaiseList" var="loop" raise_name="request" status="request" dotime1="request" dotime2="request"}
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{ $item.id}<input type="hidden" name="id[]" value="{ $item.id}" /></td>
			<td title="{$item.raise_name}"><a href="{$_A.query_url}/raise_edit&id={$item.id}">{$item.raise_name|truncate:15}</a></td>
			<td>{$item.raise_account}元</td>
              <td>{$item.raise_account_yes}元</td>
			<td>{$item.raise_period}天</td>
			
			<td>{$item.addtime|date_format}</td>
			<td>{if $item.raise_status==0}{if $item.end_day>=0}筹资中{else}已到期{/if}{elseif $item.raise_status==1}筹资成功{elseif $item.raise_status==2}筹资失败{else}草稿{/if}</td>
			<td title="{$item.raise_name}">
            
          
            <a href="{$_A.query_url}/raise_edit&id={$item.id}">查看</a>
            &nbsp;&nbsp;
			<a href="{$_A.query_url}/raise_tender&raise_id={$item.id}">筹资列表</a>
            
            </td>
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="14" class="action">
		<div class="floatl">
			
		</div>
		<div class="floatr">
			 标题：<input type="text" name="raise_name" id="raise_name" value="{$magic.request.raise_name|urldecode}" size="8"/> 
			 添加时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/>
			<input type="button" value="搜索" class="submit" onclick="sousuo('{$_A.query_url}/raise&status={$magic.request.status}')">
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


<script>

var urls = '{$_A.query_url}/raise';
{literal}
function sousuo(url){
	var sou = "";
	
	var raise_name = $("#raise_name").val();
	if (raise_name!="" && raise_name!=null){
		sou += "&raise_name="+raise_name;
	}
	
	var dotime1 = $("#dotime1").val();
	if (dotime1!="" && dotime1!=null){
		sou += "&dotime1="+dotime1;
	}
	var dotime2 = $("#dotime2").val();
	if (dotime2!="" && dotime2!=null){
		sou += "&dotime2="+dotime2;
	}
	var status = $("#status").val();
	if (status!="" && status!=null){
		sou += "&status="+status;
	}

		location.href=url+sou;
	
}
</script>
{/literal}


{elseif $_A.query_type == "raise_tender"} 
<div class="module_add">
	<div class="module_title"><strong>筹资列表</strong></div>
	
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr>
			<td width="" class="main_td">ID</td>
			<td   nowrap="nowrap">投资人</td>
			<td   nowrap="nowrap">项目标题</td>
				<td   nowrap="nowrap">筹资金额</td>
				<td   nowrap="nowrap">已筹资</td>
				<td   nowrap="nowrap">筹资期限</td>
				<td   nowrap="nowrap">项目类别</td>
				<td   nowrap="nowrap">投资金额</td>
				<td   nowrap="nowrap">投资时间</td>
				<td   nowrap="nowrap">状态</td>
		</tr>
		{ list  module="borrow" function="GetRauseTenderList" var="loop"   raise_id="$magic.request.raise_id"  username="request" raise_name="request" dotime1="request" dotime2="request"}
			{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td  width="40" >{$key+1}</td>
			<td  ><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=code/users/view&user_id={$item.user_id}&type=scene",700,400,"true","","true","text");'>	{$item.username}</a></td>
				<td  width="200"><a href="/zhongchou/a{$item.raise_id}.html" target="_blank" title="{$item.raise_name}">{$item.raise_name|truncate:15}</a></td>
				<td  >{$item.raise_account}元</td>
				<td  >{$item.raise_account_yes}元</td>
				<td  >{$item.raise_period}天</td>
				<td  >{$item.raise_type|linkages:"raise_type"}</td>
				<td  >{$item.tender_account}</td>
				<td  >{$item.addtime|date_format:"Y-m-d"}</td>

				<td  >{if $item.status==0}成功{elseif $item.raise_status==1}已回馈{else}-{/if}</td>
			
		</tr>
		{ /foreach}
		<tr>
		<td colspan="14" class="action">
		<div class="floatl">
			
		</div>
		<div class="floatr">
			 用户名：<input type="text" name="username" id="username" value="{$magic.request.username|urldecode}" size="8"/>  标题：<input type="text" name="raise_name" id="raise_name" value="{$magic.request.raise_name|urldecode}" size="8"/> 
			 添加时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/>
			<input type="button" value="搜索" class="submit" onclick="sousuo('{$_A.query_url}/raise_tender')">
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


<script>

var urls = '{$_A.query_url}/raise_tender';
{literal}
function sousuo(url){
	var sou = "";
	
	var raise_name = $("#raise_name").val();
	if (raise_name!="" && raise_name!=null){
		sou += "&raise_name="+raise_name;
	}
	
	var username = $("#username").val();
	if (username!="" && username!=null){
		sou += "&username="+username;
	}
	
	var dotime1 = $("#dotime1").val();
	if (dotime1!="" && dotime1!=null){
		sou += "&dotime1="+dotime1;
	}
	var dotime2 = $("#dotime2").val();
	if (dotime2!="" && dotime2!=null){
		sou += "&dotime2="+dotime2;
	}
	

		location.href=url+sou;
	
}
</script>
{/literal}
{elseif $_A.query_type == "raise_add" || $_A.query_type == "raise_edit"}

<form action="" method="post" id="frm" enctype="multipart/form-data" >
<div class="module_add">
	<div class="module_title"><strong>{if $_A.query_type == "raise_edit" }<input type="hidden" name="id"  value="{$magic.request.id}" />修改项目{else}添加项目{/if}</strong><input type="hidden" name="user_id" value="{$_A.articles_result.user_id|default:$_G.user_id}" /></div>
	<div style="margin-top:10px;">
	<div style="float:right; width:30%;">
		
		<div style="border:1px solid #CCCCCC; margin-bottom:10px ">
			<div class="module_title"><strong>发起新项目</strong></div>
			<div class="module_border">
				<div class="c">
					状态：<select name='status' >
					<option value="0" {if $_A.articles_result.status==0} selected="selected"{/if}>发布</option>
					<option value="-1" {if $_A.articles_result.status=='-1'} selected="selected"{/if}>草稿</option>
					</select>
				</div>
			</div>
			<div class="module_border">
				<div class="c">
					排序：<input type="text" name="order" value="{$_A.articles_result.order|default:10}" size="5" onkeyup="value=value.replace(/[^0-9]/g,'')"/>
				</div>
			</div>
			<div class="module_border">
				<div class="c">
					分类： <input type="checkbox" name="flag[]" value="tuijian"  align="absmiddle" {$_A.articles_result.flag|checked:"tuijian"}/>推荐 <input type="checkbox" name="flag[]" value="ding"  align="absmiddle" {$_A.articles_result.flag|checked:"ding"}/>置顶
				</div>
			</div>

			<div class="module_submit"><input type="button" value="确认提交" class="submit_button" name="save" onclick="submitForm()"/>
</div>
			
		</div>
		
		<div style="border:1px solid #CCCCCC; margin-bottom:10px; ">
			<div class="module_title"><strong>项目标签</strong></div>
			<div class="module_border" style="padding:10px;">
					标签：<input type="text" name="tags"  class="input_border" value="{ $_A.articles_result.tags}" size="30"/>
			</div>
		</div>

		
		<div style="border:1px solid #CCCCCC; margin-top:10px; ">
			<div class="module_title"><strong>项目缩略图</strong></div>
			<div class="module_border" style="padding:10px;">
				{if $_A.articles_result.litpic!=""}<img src="{$_A.articles_result.fileurl}" width="50" height="50" align="absmiddle" /><input type="checkbox" name="clearlitpic" value="1" title="选中则会删除掉缩略图" /><input type="hidden" name="oldlitpic" value="{$_A.articles_result.litpic}" />取消 {/if}<input type="file" name="litpic" style="width:150px" />
			</div>
		</div>
		
		
		<div style="border:1px solid #CCCCCC; margin-top:10px; ">
			<div class="module_title"><strong>项目副简介</strong></div>
			<div class="module_border" style="padding:10px;">
					<textarea name="raise_intro" rows="5" cols="50">{ $_A.articles_result.raise_intro}</textarea>
			</div>
		</div>
		
	</div>
		</div>
	<div style="float:left; width:67%; text-align:left">
	<div class="module_add">
	<div class="module_title"><strong>发起项目</strong></div>
	
	<div class="module_border">
		<div class="c" style="padding:10px 0">
			项目标题：<input type="text" name="raise_name" value="{$_A.articles_result.raise_name}" style="height:25px; width:400px"/>
		</div>
	</div>
	
	<div class="module_border">
		<div class="c" style="padding:10px 0">
			筹资金额：<input type="text" name="raise_account" value="{$_A.articles_result.raise_account}" onblur="num_only(this);"  size="8" maxlength="10"/> 元
		</div>
	</div>
	
	<div class="module_border">
		<div class="c" style="padding:10px 0">
			筹资期限：<input type="text" name="raise_period" value="{$_A.articles_result.raise_period}"  onblur="num_only(this);"  size="8" maxlength="6"/> 天
		</div>
	</div>
	
	<div class="module_border">
		<div class="c" style="padding:10px 0">
			项目类别：{linkages nid="raise_type"  name="raise_type" type="value"  value="$_A.articles_result.raise_type" }
		</div>
	</div>
	
	<div class="module_border" style=" padding-top:10px;">
			<textarea id="bcontents" name="raise_contents" rows="28"  style="width: 100%">{$_A.articles_result.raise_contents}</textarea>		
	
		<script>
		var admin_url = "/{$_A.admin_url}";
		{literal}
		$('#bcontents').xheditor({skin:'o2007blue',upImgUrl:admin_url+"&q=plugins&p=xheditor&immediate=1",upImgExt:"jpg,jpeg,gif,png"});
		function submitForm(){
		$("#bcontents").val();
		$('#frm').submit();
		return false;}
		
			function num_only(field) {
var result = new String();
var numbers = "0123456789";
var chars = field.value.split(""); // create array 
for (i = 0; i < chars.length; i++) {
if (numbers.indexOf(chars[i]) != -1) result += chars[i];
}
if (field.value != result) field.value = result;
}
		</script>
		{/literal}
		
	</div>
	
		</form>
{/if}