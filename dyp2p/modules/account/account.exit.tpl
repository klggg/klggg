
<div class="module_add">
	<div class="module_title"><strong><font color="#FF0000">{$_A.account_exit_username}</font>调整资金</strong></div>
</div>
<form action="{$_A.query_url_all}" name="form1" method="post" onsubmit="return check_form();">
	<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	<tr>
	  <td>用户名</td>
	  <td>{$_A.account_exit_username}<input value="{$_A.account_exit_username}"  name="username" type="hidden"/></td>
	  </tr>
	  <tr>
	  <td>变动金额</td>
	  <td><input name="money"  value="0" type="text"/>如果是减少余额，请填负数，如-1000</td>
	  </tr>
	  
	  <td>变动原因</td>
	  <td><input  name="log" value="" type="text" size="30"/></td>
	  </tr><input  name="user_id" value="{$_A.account_exit_result.user_id}" type="hidden"/>
	  <tr><td colspan="2" align="center"><div style="text-align:center; width:400px;"><input value=" 提 交 " name="submit" type="submit" /></div></td></tr>
	</table>
</form>
{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var verify_remark = frm.elements['log'].value;
	  var money = frm.elements['money'].value;
	 var errorMsg = '';
	  if (verify_remark.length == 0 ) {
		errorMsg += '变动原因必须填写' + '\n';
	  }
	  
	  if (money.length == 0 || money==0) {
		errorMsg += '变动金额必须填写' + '\n';
	  }
	  
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>
{/literal}