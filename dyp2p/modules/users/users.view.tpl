<div class="module_add">
	<div class="module_title">
	<strong>个人信息</strong>
	</div>
</div>
<div class="module_add">
	<div class="module_border">
		<div class="s">用户名:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.username} </div>
		 <div class="s">真实姓名:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.realname} </div>
	</div>
	
	<div class="module_border">
		<div class="s">邮箱:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.email} </div>
		 <div class="s">性别:</div>
		<div class="h">
		 &nbsp;{if $_A.user_result.sex==1}男{elseif $_A.user_result.sex==0}女{else}未知{/if} </div>
	</div>
	
	<div class="module_border">
		<div class="s">手机号码:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.phone} </div>
		 <div class="s">手机认证:</div>
		<div class="h">
		 &nbsp;{if $_A.user_result.phone_status==1}已认证{else}未认证{/if} </div>
	</div>
	
	<div class="module_border">
	
		 <div class="s">身份证号码:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.card_id} </div>
		 
		 	<div class="s">生日:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.birthday|date_format:"Y-m-d "|default:'无'}  </div>
	</div>
	
	<div class="module_border">
		<div class="s">投资认证:</div>
		<div class="h">
		 &nbsp;{if $_A.user_result.tender_status==1}已认证{else}未认证{/if} </div>
		 <div class="s">信用积分:</div>
		<div class="h">
		  &nbsp;{$_A.user_result.credit|default:0} 分</div>
	</div>
	
	<div class="module_border">
		<div class="s">注册时间:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.reg_time|date_format:"Y-m-d H:i:s"}</div>
		 <div class="s">最后登录时间:</div>
		<div class="h">
		  &nbsp;{$_A.user_result.up_time|date_format:"Y-m-d H:i:s"}</div>
	</div>
	
<div class="module_add">
	<div class="module_title">
	<strong>帐号资金</strong>
	</div>
</div>	
	<div class="module_border">
		<div class="s">可用余额 :</div>
		<div class="h">
		 &nbsp;{$_A.user_result.balance} 元</div>
		 <div class="s">总资产:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.total} 元</div>
	</div>
	
	<div class="module_border">
		<div class="s">冻结资金 :</div>
		<div class="h">
		 &nbsp;{$_A.user_result.frost} 元</div>
		 <div class="s">待收金额:</div>
		<div class="h">
		 &nbsp;{$_A.user_result.await} 元</div>
	</div>
</div>