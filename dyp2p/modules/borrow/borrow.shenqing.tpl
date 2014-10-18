{if $magic.request.check==""}
<ul class="nav3">
<li><a href="{$_A.query_url_all}&status=0" id="c_so">未处理申请</a></li> 
<li><a href="{$_A.query_url_all}&status=1">已处理申请</a></li> 
</ul> 
{if $magic.request.shenqing_view!=''}
<div class="module_add">
	<div class="module_title"><strong>申请信息</strong></div>
	<div class="module_border">
		<div class="l">用户名：</div>
		<div class="r">
		<a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/users/view&user_id={$_A.borrow_result.user_id}",500,230,"true","","true","text");'>	{$_A.borrow_result.username}</a>
		</div>
		<div class="s">状态：</div>
		<div class="c">
            {if $_A.borrow_result.status==1}已处理{else}未处理{/if}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">借款类型：</div>
		<div class="r">
			{if $_A.borrow_result.borrow_style==2}担保标{elseif $_A.borrow_result.borrow_style==3}抵押标{else}信用标{/if}
		</div>
		<div class="s">借款用途：</div>
		<div class="c">
			{$_A.borrow_result.borrow_use|linkages:"borrow_use"}
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">借贷总金额：</div>
		<div class="r">
			￥{$_A.borrow_result.account}<input type="hidden" name="account" value="{$_A.borrow_result.account}" /> 
		</div>
		<div class="s">还款方式：</div>
		<div class="c">
			{$_A.borrow_result.borrow_style|linkages:"borrow_style"}
		</div>
	</div>
	<div class="module_border">
		<div class="l">借款期限：</div>
		<div class="r">
			
		<FONT COLOR="#ec6c13">{if $_A.borrow_result.borrow_period == 0.03}1</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.06}2</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.10}3</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.13}4</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.16}5</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.20}6</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.23}7</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.26}8</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.30}9</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.33}10</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.36}11</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.40}12</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.43}13</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.46}14</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.50}15</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.53}16</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.56}17</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.60}18</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.63}19</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.66}20</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.70}21</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.73}22</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.76}23</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.80}24</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.83}25</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.86}26</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.90}27</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.93}28</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.96}29</font>天
                            	{elseif $_A.borrow_result.borrow_period == 0.10}30</font>天
                            	{elseif $_A.borrow_result.borrow_period >= 1 && $_A.borrow_result.borrow_period<10 }{$_A.borrow_result.borrow_period|truncate:1}</font>个月
                            	{else}{$_A.borrow_result.borrow_period|truncate:2}</font>个月
                            	{/if}
		</div>	
		<div class="s">认证手机：</div>
		<div class="c">
        {if $_A.borrow_result.phone_status==1}{$_A.borrow_result.phone}{else}未认证{/if}
		
		</div>
	</div>
	<div class="module_border">
		<div class="l">企业名称/真实姓名：</div>
		<div class="r">
			{$_A.borrow_result.b_enterprise}
		</div>
		<div class="s">注册号码：</div>
		<div class="c">
			{$_A.borrow_result.b_regist}
		</div>
	</div>
	<div class="module_border">
		<div class="l">法人代表：</div>
		<div class="r">
			{$_A.borrow_result.b_legal}
		</div>
		<div class="s">身份证号码：</div>
		<div class="c">
			{$_A.borrow_result.b_card}
		</div>
	</div>
	<div class="module_border">
		<div class="l">联系电话：</div>
		<div class="r">
			{$_A.borrow_result.b_tel}
		</div>
		<div class="s">手机：</div>
		<div class="c">
			{$_A.borrow_result.b_phone}
		</div>
	</div>
	<div class="module_border" style="display:none">
		<div class="l">经办人：</div>
		<div class="r">
			{$_A.borrow_result.b_agent}
		</div>
		<div class="s">地址：</div>
		<div class="c">
			{$_A.borrow_result.b_address}
		</div>
	</div>
	<form action="{$_A.query_url_all}" method="post"  name="form1" onsubmit="return check_form();">
	<div class="module_border">
	    <input type="hidden" name="s_id" value="{$_A.borrow_result.s_id}" />
		<div class="l">处理备注：</div>
		<div class="r">
			<textarea name="verify_remark" rows="5" cols="40" {if $_A.borrow_result.status==1} readonly="readonly"{/if}>{$_A.borrow_result.verify_remark}</textarea>
		</div>
		<div class="s"></div>
		<div class="c">
		{if $_A.borrow_result.status==1}
		已处理
		{else}
		<input type="radio" name="status" value="1" />审批成功&nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="2"  checked="checked"/>审批失败<br />

		<input type="submit"  src="{$_A.tpldir}/images/button.gif" align="absmiddle" value="提交处理" class="submit_button" />
		{/if}
		</div>
	</div>
	</form>
	{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var verify_remark = frm.elements['verify_remark'].value;
	 var errorMsg = '';
	  if (verify_remark.length == 0 ) {
		errorMsg += '处理备注必须填写' + '\n';
	  }
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>
{/literal}
</div>
{else}
<div class="module_add">
	<div class="module_title"><strong>申请列表</strong></div>
</div>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr>
			<td width="" class="main_td">ID</td>
			<td width="*" class="main_td">用户名称</td>
			<td width="" class="main_td">手机号码</td>
			<td width="*" class="main_td">借款金额</td>
			<td width="" class="main_td">借款期限</td>
			<td width="" class="main_td">借款用途</td>
			<td width="" class="main_td">还款方式</td>
			<td width="" class="main_td">借款类型</td>
            {if $magic.request.status=="1"}
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">处理时间</td>
			<td width="120" class="main_td">处理备注</td>
			{else}
			<td width="" class="main_td">状态</td>
			<td width="" class="main_td">添加时间</td>
			{/if}
			<td width="" class="main_td">查看</td>
		</tr>
		{ list  module="borrow" function="GetshenqingList" var="loop"  username="request"  status="request" dotime1="request" dotime2="request"}
		{foreach from="$loop.list" item="item"}
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td>{ $item.s_id}<input type="hidden" name="id[]" value="{$item.s_id}" /></td>
			<td class="main_td1" align="center"><a href="javascript:void(0)" onclick='tipsWindown("用户详细信息查看","url:get?{$_A.admin_url}&q=module/users/view&user_id={$item.user_id}",500,230,"true","","true","text");'>	{$item.username}</a></td>
			<td>{if $item.phone_status==1}{$item.phone}{else}未认证{/if}</td>
			<td>{$item.account}元</td>
			<td>{if $item.borrow_period == 0.03}1天
                            	{elseif $item.borrow_period == 0.06}2天
                            	{elseif $item.borrow_period == 0.10}3天
                            	{elseif $item.borrow_period == 0.13}4天
                            	{elseif $item.borrow_period == 0.16}5天
                            	{elseif $item.borrow_period == 0.20}6天
                            	{elseif $item.borrow_period == 0.23}7天
                            	{elseif $item.borrow_period == 0.26}8天
                            	{elseif $item.borrow_period == 0.30}9天
                            	{elseif $item.borrow_period == 0.33}10天
                            	{elseif $item.borrow_period == 0.36}11天
                            	{elseif $item.borrow_period == 0.40}12天
                            	{elseif $item.borrow_period == 0.43}13天
                            	{elseif $item.borrow_period == 0.46}14天
                            	{elseif $item.borrow_period == 0.50}15天
                            	{elseif $item.borrow_period == 0.53}16天
                            	{elseif $item.borrow_period == 0.56}17天
                            	{elseif $item.borrow_period == 0.60}18天
                            	{elseif $item.borrow_period == 0.63}19天
                            	{elseif $item.borrow_period == 0.66}20天
                            	{elseif $item.borrow_period == 0.70}21天
                            	{elseif $item.borrow_period == 0.73}22天
                            	{elseif $item.borrow_period == 0.76}23天
                            	{elseif $item.borrow_period == 0.80}24天
                            	{elseif $item.borrow_period == 0.83}25天
                            	{elseif $item.borrow_period == 0.86}26天
                            	{elseif $item.borrow_period == 0.90}27天
                            	{elseif $item.borrow_period == 0.93}28天
                            	{elseif $item.borrow_period == 0.96}29天
                            	{elseif $item.borrow_period == 0.10}30天
                            	{elseif $item.borrow_period >= 1 && $item.borrow_period< 10 }{$item.borrow_period|truncate:1}个月
                            	{else}{$item.borrow_period|truncate:2}个月
                            	{/if}</td>
			<td>{$item.borrow_use|linkages:"borrow_use"}</td>					
			<td>{$item.borrow_style|linkages:"borrow_style"}</td>
			<td>{if $item.vouchstatus==1}<font color="#FF0000">担保标借款</font>{elseif $item.is_flow==1}<font color="#FF0000">流转借款</font>{elseif $item.is_jin==1}<font color="#FF0000">净值借款</font>{elseif $item.fast_status==1}<font color="#FF0000">抵押借款</font>{else}普通标借款{/if}</td>
			

			{if $magic.request.status=="1"}
			<td>处理</td>
			<td>{$item.verify_time|date_format:"Y-m-d"}</td>
			<td>{$item.verify_remark}</td>
			{else}
			<td>未处理</td>
			<td>{$item.addtime|date_format}</td>
			{/if}
			<td title="{$item.name}"><a href="{$_A.query_url_all}&shenqing_view={$item.s_id}">查看</a></td>
			
		</tr>
		{/foreach}
		
		<tr>
		<td colspan="14" class="action">
		<div class="floatl">
			
		</div>
		<div class="floatr">
			  用户名：<input type="text" name="username" id="username" value="{$magic.request.username}" size="8"/>
			 添加时间：<input type="text" name="dotime1" id="dotime1" value="{$magic.request.dotime1|default:"$day7"|date_format:"Y-m-d"}" size="15" onclick="change_picktime()"/> 到 <input type="text"  name="dotime2" value="{$magic.request.dotime2|default:"$nowtime"|date_format:"Y-m-d"}" id="dotime2" size="15" onclick="change_picktime()"/>
			 <input type="button" value="搜索" class="submit" onclick="sousuo('{$_A.query_url}/shenqing&status={$magic.request.status}')">
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

<script>

var urls = '{$_A.query_url}/first';
{literal}
function sousuo(url){
	var sou = "";
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
{else}

<div  style="height:205px; overflow:hidden">
	<form name="form1" method="post" action="{$_A.query_url_all}&check={$magic.request.check}" >
	<div class="module_border_ajax">
		<div class="l">审核状态:</div>
		<div class="c">
		<input type="radio" name="status" value="1"/>初审通过 <input type="radio" name="status" value="0"  checked="checked"/>初审不通过 </div>
	</div>
	
	<div class="module_border_ajax" >
		<div class="l">审核备注:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="7">{ $_A.borrow_result.verify_remark}</textarea>
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
		<input type="hidden" name="borrow_nid" value="{ $magic.request.check}" />
		<input type="submit"  name="reset" class="submit_button" value="审核此标" />
	</div>
	
</form>
</div>

{/if}