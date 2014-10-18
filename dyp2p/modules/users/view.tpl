
<div class="module_add">
	<div class="module_border">
		<div class="s">用户名:</div>
		<div class="h">
		 {$_A.user_result.username} </div>
		 <div class="s">真实姓名:</div>
		<div class="h">
		 {$_A.user_result.realname} </div>
	</div>
	
	<div class="module_border">
		<div class="s">邮箱:</div>
		<div class="h">
		 {$_A.user_result.email} </div>
		 <div class="s">性别:</div>
		<div class="h">
		 {if $_A.user_result.sex==1}男{elseif $_A.user_result.sex==0}女{else}未知{/if} </div>
	</div>
	
	<div class="module_border">
		<div class="s">民族:</div>
		<div class="h">
		 {$_A.user_result.nation|linkage} </div>
		 <div class="s">生日:</div>
		<div class="h">
		 {$_A.user_result.birthday|date_format:"Y-m-d "} </div>
	</div>
	
	<div class="module_border">
		<div class="s">籍贯:</div>
		<div class="h">
		 {$_A.user_result.area|area} </div>
		 <div class="s">证件:</div>
		<div class="h">
		 {$_A.user_result.card_id} </div>
	</div>
	
	<div class="module_border">
		<div class="s">电话:</div>
		<div class="h">
		 {$_A.user_result.phone} </div>
		 <div class="s">QQ:</div>
		<div class="h">
		 {$_A.user_result.qq} </div>
	</div>
	
	<div class="module_border">
		<div class="s">余额 :</div>
		<div class="h">
		 {$_A.user_result.use_money} </div>
		 <div class="s">信用积分:</div>
		<div class="h">
		 {$_A.user_result.integral} </div>
	</div>
	
	
</div>