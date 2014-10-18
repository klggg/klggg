{if $_A.query_type == "new" || $_A.query_type == "edit"}
<div class="module_add">
	{if $magic.request.id==""}
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>{$MsgInfo.userinfo_add_user_id}</strong></div>
	

	<div class="module_border">
		<div class="l">{$MsgInfo.userinfo_user_id}：</div>
		<div class="c">
			<input type="text" name="user_id"  class="input_border"  size="20" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.userinfo_username}：</div>
		<div class="c">
			<input type="text" name="username"  class="input_border"  size="20" />
		</div>
	</div>
	
	<div class="module_submit" >
		<input type="submit"  name="submit" value="{$MsgInfo.userinfo_submit}" />
		<input type="reset"  name="reset" value="{$MsgInfo.userinfo_reset}" />
	</div>
	</form>
	{else}
	<div class="module_title"><span id="user_info_menu"> <a href="javascript:void(0)" class="current"  tab="1"  >{$MsgInfo.userinfo_jiben}</a>  <a href="javascript:void(0)"  tab="2">{$MsgInfo.userinfo_geren}</a>  <a href="javascript:void(0)" tab="3">{$MsgInfo.userinfo_fangchan}</a>  <a href="javascript:void(0)" tab="4">{$MsgInfo.userinfo_danwei}</a>  <a href="javascript:void(0)" tab="5">{$MsgInfo.userinfo_siying}</a>   <a href="javascript:void(0)" tab="6">{$MsgInfo.userinfo_caiwu}</a>   <a href="javascript:void(0)" tab="7">{$MsgInfo.userinfo_lianxi}</a>    <a href="javascript:void(0)" tab="8">{$MsgInfo.userinfo_peiou}</a>    <a href="javascript:void(0)" tab="9">{$MsgInfo.userinfo_jiaoyu}</a>     <a href="javascript:void(0)" tab="10">{$MsgInfo.userinfo_qita}</a> </span><strong>{$MsgInfo.userinfo_add}</strong></div>
	
	<form name="form1" method="post" action=""  enctype="multipart/form-data" >
	<div id="user_info_menu_tab">
		<!--基本资料 开始-->
		<div id="user_info_menu_1">
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_username}：</div>
				<div class="c">
					{$_A.userinfo_result.username} (ID:{$_A.userinfo_result.user_id})
				</div>
			</div>
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_realname}：</div>
				<div class="c">
					{$_A.userinfo_result.realname} 
				</div>
			</div>
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_email}：</div>
				<div class="c">
					{$_A.userinfo_result.email} 
				</div>
			</div>
			
		</div>
		<!--基本资料 结束-->
		
		<!--个人资料 开始-->
		<div id="user_info_menu_2" class="hide">
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_marry}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=marry&nid=user_marry&value={$_A.userinfo_result.marry}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_child}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=child&nid=user_child&value={$_A.userinfo_result.child}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_education}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=education&nid=user_education&value={$_A.userinfo_result.education}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_income}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=income&nid=user_income&value={$_A.userinfo_result.income}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_shebao}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=shebao&nid=user_shebao&value={$_A.userinfo_result.shebao}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_shebaoid}：</div>
				<div class="c">
					<input type="text" size="30" name="shebaoid" value="{$_A.userinfo_result.shebaoid}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_housing}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=housing&nid=user_housing&value={$_A.userinfo_result.housing}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_car}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=car&nid=user_car&value={$_A.userinfo_result.car}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_late}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=late&nid=user_late&value={$_A.userinfo_result.late}"></script>
				</div>
			</div>
		</div>
		<!--个人资料 开始-->
		
		<!--房产资料 开始-->
		<div id="user_info_menu_3" class="hide">
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_house_address}：</div>
				<div class="c">
					<input type="text" size="30" name="house_address" value="{$_A.userinfo_result.house_address}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_house_area}：</div>
				<div class="c">
					<input type="text" size="15" name="house_area" value="{$_A.userinfo_result.house_area}"/> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_house_year}：</div>
				<div class="c">
					<input type="text" size="15" name="house_year" value="{$_A.userinfo_result.house_year}" onclick="change_picktime()" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_house_status}：</div>
				<div class="c">
					<input type="text" size="15" name="house_status" value="{$_A.userinfo_result.house_status}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_house_holder1}：</div>
				<div class="c">
					<input type="text" size="15" name="house_holder1" value="{$_A.userinfo_result.house_holder1}" /> {$MsgInfo.userinfo_house_right}<input type="text" size="15" name="house_right1" value="{$_A.userinfo_result.house_right1}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_house_holder2}：</div>
				<div class="c">
					<input type="text" size="15" name="house_holder2" value="{$_A.userinfo_result.house_holder2}" /> {$MsgInfo.userinfo_house_right}<input type="text" size="15" name="house_right2" value="{$_A.userinfo_result.house_right2}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_userinfo_anjie}：</div>
				<div class="c">
					{$MsgInfo.userinfo_house_loanyear}：<input type="text" size="10" name="house_loanyear" value="{$_A.userinfo_result.house_loanyear}" />{$MsgInfo.userinfo_house_loanprice}<input type="text" size="10" name="house_loanprice" value="{$_A.userinfo_result.house_loanprice}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_house_balance}：</div>
				<div class="c">
					<input type="text" size="15" name="house_balance" value="{$_A.userinfo_result.house_balance}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_house_bank}：</div>
				<div class="c">
					<input type="text" size="15" name="house_bank" value="{$_A.userinfo_result.house_bank}" /> 
				</div>
			</div>
		</div>
		<!--房产资料 结束-->
		
		<!--单位资料 开始-->
		<div id="user_info_menu_4" class="hide">
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_name}：</div>
				<div class="c">
					<input type="text" size="15" name="company_name" value="{$_A.userinfo_result.company_name}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_type}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_type&nid=user_company_type&value={$_A.userinfo_result.company_type}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_industry}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_industry&nid=user_company_industry&value={$_A.userinfo_result.company_industry}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_jibie}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_jibie&nid=user_company_jibie&value={$_A.userinfo_result.company_jibie}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_office}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_office&nid=user_company_office&value={$_A.userinfo_result.company_office}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_worktime}：</div>
				<div class="c">
					<input type="text" size="15" name="company_worktime1" value="{$_A.userinfo_result.company_worktime1}" onclick="change_picktime()" />  到 <input type="text" size="15" name="company_worktime2" value="{$_A.userinfo_result.company_worktime2}" onclick="change_picktime()" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_workyear}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=company_workyear&nid=user_company_workyear&value={$_A.userinfo_result.company_workyear}"></script>
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_tel}：</div>
				<div class="c">
					<input type="text" size="15" name="company_tel" value="{$_A.userinfo_result.company_tel}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_address}：</div>
				<div class="c">
					<input type="text" size="15" name="company_address" value="{$_A.userinfo_result.company_address}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_weburl}：</div>
				<div class="c">
					<input type="text" size="15" name="company_weburl" value="{$_A.userinfo_result.company_weburl}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_company_reamrk}：</div>
				<div class="c">
					<textarea  cols="50" rows="6"name="company_reamrk"  >{$_A.userinfo_result.company_reamrk}</textarea>
				</div>
			</div>
		</div>
		<!--单位资料 结束-->
		
		
		<!--私营业主资料 开始-->
		<div id="user_info_menu_5" class="hide">
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_type}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=private_type&nid=user_company_industry&value={$_A.userinfo_result.private_type}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_date}：</div>
				<div class="c">
					<input type="text" size="15" name="private_date" value="{$_A.userinfo_result.private_date}" onclick="change_picktime()"/> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_place}：</div>
				<div class="c">
					<input type="text" size="15" name="private_place" value="{$_A.userinfo_result.private_place}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_rent}：</div>
				<div class="c">
					<input type="text" size="15" name="private_rent" value="{$_A.userinfo_result.private_rent}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_term}：</div>
				<div class="c">
					<input type="text" size="15" name="private_term" value="{$_A.userinfo_result.private_term}" /> 月
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_taxid}：</div>
				<div class="c">
					<input type="text" size="15" name="private_taxid" value="{$_A.userinfo_result.private_taxid}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_commerceid}：</div>
				<div class="c">
					<input type="text" size="15" name="private_commerceid" value="{$_A.userinfo_result.private_commerceid}" /> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_income}：</div>
				<div class="c">
					<input type="text" size="15" name="private_income" value="{$_A.userinfo_result.private_income}" /> 元（年度）
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_private_employee}：</div>
				<div class="c">
					<input type="text" size="15" name="private_employee" value="{$_A.userinfo_result.private_employee}" /> 人
				</div>
			</div>
		</div>
		<!--私营业主资料 结束-->
		
		<!--财务状况 开始-->
		<div id="user_info_menu_6" class="hide">
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_finance_repayment}：</div>
				<div class="c">
					<input type="text" size="15" name="finance_repayment" value="{$_A.userinfo_result.finance_repayment}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_finance_property}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=finance_property&nid=user_finance_property&value={$_A.userinfo_result.finance_property}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_finance_amount}：</div>
				<div class="c">
					<input type="text" size="15" name="finance_amount" value="{$_A.userinfo_result.finance_amount}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_finance_car}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=finance_car&nid=user_finance_car&value={$_A.userinfo_result.finance_car}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_finance_caramount}：</div>
				<div class="c">
					<input type="text" size="15" name="finance_caramount" value="{$_A.userinfo_result.finance_caramount}" /> 元
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_finance_creditcard}：</div>
				<div class="c">
					<input type="text" size="15" name="finance_creditcard" value="{$_A.userinfo_result.finance_creditcard}" /> 元
				</div>
			</div>
		</div>
		<!--财务状况 结束-->
		
		<!--配偶资料 开始-->
		<div id="user_info_menu_7" class="hide">
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_tel}：</div>
				<div class="c">
					<input type="text" size="20" name="tel" value="{$_A.userinfo_result.tel}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_phone}：</div>
				<div class="c">
					<input type="text" size="20" name="phone" value="{$_A.userinfo_result.phone}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_area}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=area&area={$_A.userinfo_result.area}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_post}：</div>
				<div class="c">
					<input type="text" size="20" name="post" value="{$_A.userinfo_result.post}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_address}：</div>
				<div class="c">
					<input type="text" size="20" name="address" value="{$_A.userinfo_result.address}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_linkman1}：</div>
				<div class="c">
					<input type="text" size="20" name="linkman1" value="{$_A.userinfo_result.linkman1}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_relation1}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation1&nid=user_relation&value={$_A.userinfo_result.relation1}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_tel1}：</div>
				<div class="c">
					<input type="text" size="20" name="tel1" value="{$_A.userinfo_result.tel1}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_phone1}：</div>
				<div class="c">
					<input type="text" size="20" name="phone1" value="{$_A.userinfo_result.phone1}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_linkman2}：</div>
				<div class="c">
					<input type="text" size="20" name="linkman2" value="{$_A.userinfo_result.linkman2}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_relation2}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation2&nid=user_relation&value={$_A.userinfo_result.relation2}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_tel2}：</div>
				<div class="c">
					<input type="text" size="20" name="tel2" value="{$_A.userinfo_result.tel2}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_phone2}：</div>
				<div class="c">
					<input type="text" size="20" name="phone2" value="{$_A.userinfo_result.phone2}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_linkman3}：</div>
				<div class="c">
					<input type="text" size="20" name="linkman3" value="{$_A.userinfo_result.linkman3}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_relation3}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=relation3&nid=user_relation&value={$_A.userinfo_result.relation3}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_tel3}：</div>
				<div class="c">
					<input type="text" size="20" name="tel3" value="{$_A.userinfo_result.tel3}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_phone3}：</div>
				<div class="c">
					<input type="text" size="20" name="phone3" value="{$_A.userinfo_result.phone3}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_msn}：</div>
				<div class="c">
					<input type="text" size="20" name="msn" value="{$_A.userinfo_result.msn}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_qq}：</div>
				<div class="c">
					<input type="text" size="20" name="qq" value="{$_A.userinfo_result.qq}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="w">{$MsgInfo.userinfo_wangwang}：</div>
				<div class="c">
					<input type="text" size="20" name="wangwang" value="{$_A.userinfo_result.wangwang}" />
				</div>
			</div>
		</div>
		<!--配偶资料 结束-->
		
		<!--配偶资料 开始-->
		<div id="user_info_menu_8"  class="hide">
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_mate_name}：</div>
				<div class="c">
					<input type="text" size="20" name="mate_name" value="{$_A.userinfo_result.mate_name}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_mate_salary}：</div>
				<div class="c">
					<input type="text" size="20" name="mate_salary" value="{$_A.userinfo_result.mate_salary}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_mate_phone}：</div>
				<div class="c">
					<input type="text" size="20" name="mate_phone" value="{$_A.userinfo_result.mate_phone}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_mate_tel}：</div>
				<div class="c">
					<input type="text" size="20" name="mate_tel" value="{$_A.userinfo_result.mate_tel}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_mate_type}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=mate_type&nid=user_company_industry&value={$_A.userinfo_result.mate_type}"></script> 
				</div>
			</div>
			
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_mate_office}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=mate_office&nid=user_company_office&value={$_A.userinfo_result.mate_office}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_mate_address}：</div>
				<div class="c">
					<input type="text" size="20" name="mate_address" value="{$_A.userinfo_result.mate_address}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_mate_income}：</div>
				<div class="c">
					<input type="text" size="20" name="mate_income" value="{$_A.userinfo_result.mate_income}" />
				</div>
			</div>
			
		</div>
		<!--配偶资料 结束-->
		
		<!--教育背景 开始-->
		<div id="user_info_menu_9"  class="hide">
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_education_record}：</div>
				<div class="c">
					<script src="/plugins/index.php?q=linkage&name=education_record&nid=user_education&value={$_A.userinfo_result.education_record}"></script> 
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_education_school}：</div>
				<div class="c">
					<input type="text" size="20" name="education_school" value="{$_A.userinfo_result.education_school}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_education_study}：</div>
				<div class="c">
					<input type="text" size="20" name="education_study" value="{$_A.userinfo_result.education_study}" />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_education_time}：</div>
				<div class="c">
					<input type="text" size="20" name="education_time1" value="{$_A.userinfo_result.education_time1}" onclick="change_picktime()" /> 到 <input type="text" size="20" name="education_time2" value="{$_A.userinfo_result.education_time2}" onclick="change_picktime()" /> 
				</div>
			</div>
		</div>
		<!--教育背景 结束-->
		
		<!--工作经历 开始-->
		<div id="user_info_menu_10" class="hide">
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_ability}：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="ability">{$_A.userinfo_result.ability}</textarea><br />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_interest}：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="interest">{$_A.userinfo_result.interest}</textarea><br />
				</div>
			</div>
			
			<div class="module_border">
				<div class="l">{$MsgInfo.userinfo_others}：</div>
				<div class="c">
					<textarea rows="7" cols="50" name="others">{$_A.userinfo_result.others}</textarea><br />
					
				</div>
			</div>
		</div>
		<!--工作经历 结束-->
	</div>
	<div class="module_submit" >
		<input type="hidden"  name="user_id" value="{$magic.request.id}" />
		<input type="submit"  name="submit" value="{$MsgInfo.userinfo_submit}" />
		<input type="reset"  name="reset" value="{$MsgInfo.userinfo_reset}" />
	</div>
	</form>
	
	
	{/if}
</div>
{literal}
<script>
change_menu_tab("user_info_menu");

function check_form(){
	 var frm = document.forms['form1'];
	 var name = frm.elements['name'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (name.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>
{/literal}
{elseif $_A.query_type == "view"}
<div class="module_add">
	
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>{$MsgInfo.userinfo_zhengjian}</strong></div>

	<div class="module_border">
		<div class="l">{$MsgInfo.userinfo_username}：</div>
		<div class="c">
			{ $_A.attestation_result.username}
		</div>
	</div>


	<div class="module_border">
		<div class="l">{$MsgInfo.userinfo_type_name}：</div>
		<div class="c">
			{ $_A.attestation_result.type_name }
		</div>
	</div>


	<div class="module_border">
		<div class="l">{$MsgInfo.userinfo_litpic}：</div>
		<div class="c">
			<a href="{ $_A.attestation_result.litpic|imgurl_format }" ><img src="{ $_A.attestation_result.litpic|imgurl_format }" width="100" height="100" /></a>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.userinfo_content}:</div>
		<div class="c">
			{ $_A.attestation_result.content}</div>
	</div>

	<div class="module_border">
		<div class="l">{$MsgInfo.userinfo_addtime}:</div>
		<div class="c">
			{ $_A.attestation_result.addtime|date_format:'Y-m-d H:i:s'}/{ $_A.attestation_result.addip}</div>
	</div>
	
	
	<div class="module_title"><strong>{$MsgInfo.userinfo_view}</strong></div>
	
	<div class="module_border">
		<div class="l">{$MsgInfo.userinfo_user_id}:</div>
		<div class="c">
		<input type="radio" name="status" value="0" {if $_A.attestation_result.status==0} checked="checked"{/if} />{$MsgInfo.userinfo_view_wait} <input type="radio" name="status" value="1" {if $_A.attestation_result.status==1} checked="checked"{/if}/>{$MsgInfo.userinfo_view_yes} <input type="radio" name="status" value="2" {if $_A.attestation_result.status==2} checked="checked"{/if}/>{$MsgInfo.userinfo_view_no} </div>
	</div>
	
	<div class="module_border" >
		<div class="l">{$MsgInfo.userinfo_jifen}:</div>
		<div class="c">
			<input type="text" name="jifen" value="{ $_A.attestation_result.jifen}" size="5">
		</div>
	</div>
	
	<div class="module_border" >
		<div class="l">{$MsgInfo.userinfo_verify_remark}:</div>
		<div class="c">
			<textarea name="verify_remark" cols="45" rows="5">{ $_A.attestation_result.verify_remark}</textarea>
		</div>
	</div>

	<div class="module_submit" >
		<input type="hidden" name="id" value="{ $_A.attestation_result.id }" />
		
		<input type="submit"  name="reset" value="{$MsgInfo.userinfo_view}" />
	</div>
	</form>
</div>
{literal}
<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var verify_remark = frm.elements['verify_remark'].value;
	 var errorMsg = '';
	  if (verify_remark.length == 0 ) {
		errorMsg += '备注必须填写' + '\n';
	  }
	  
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}

</script>
{/literal}
{elseif $_A.query_type=="list"}
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
	  <form action="" method="post">
		<tr >
			<td width="*" class="main_td">{$MsgInfo.userinfo_username}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_fangchan}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_danwei}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_siying}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_caiwu}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_lianxi}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_peiou}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_jiaoyu}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_qita}</td>
			<td width="" class="main_td">{$MsgInfo.userinfo_action}</td>
		</tr>
		<!--
		
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center">{$item.username}</td>
			<td class="main_td1" align="center" >{if $item.building_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} / {if $item.building_style==2}<a href="{$_A.query_url}/unlock&type=building&user_id={$item.user_id}{$_A.site_url}">解锁</a>{else}<a href="{$_A.query_url}/lock&type=building&user_id={$item.user_id}{$_A.site_url}">锁定</a>{/if}</td>
			<td class="main_td1" align="center" >{if $item.company_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} /  {if $item.company_style==2}<a href="{$_A.query_url}/unlock&type=company&user_id={$item.user_id}{$_A.site_url}">解锁</a>{else}<a href="{$_A.query_url}/lock&type=company&user_id={$item.user_id}{$_A.site_url}">锁定</a>{/if}</td>
			<td class="main_td1" align="center" >{if $item.firm_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} /  {if $item.firm_style==2}<a href="{$_A.query_url}/unlock&type=firm&user_id={$item.user_id}{$_A.site_url}">解锁</a>{else}<a href="{$_A.query_url}/lock&type=firm&user_id={$item.user_id}{$_A.site_url}">锁定</a>{/if}</td>
			<td class="main_td1" align="center" >{if $item.finance_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} /  {if $item.finance_style==2}<a href="{$_A.query_url}/unlock&type=finance&user_id={$item.user_id}{$_A.site_url}">解锁</a>{else}<a href="{$_A.query_url}/lock&type=finance&user_id={$item.user_id}{$_A.site_url}">锁定</a>{/if}</td>
			<td class="main_td1" align="center" >{if $item.contact_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} /  {if $item.contact_style==2}<a href="{$_A.query_url}/unlock&type=contact&user_id={$item.user_id}{$_A.site_url}">解锁</a>{else}<a href="{$_A.query_url}/lock&type=contact&user_id={$item.user_id}{$_A.site_url}">锁定</a>{/if}</td>
			<td class="main_td1" align="center" >{if $item.mate_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} /  {if $item.mate_style==2}<a href="{$_A.query_url}/unlock&type=mate&user_id={$item.user_id}{$_A.site_url}">解锁</a>{else}<a href="{$_A.query_url}/lock&type=mate&user_id={$item.user_id}{$_A.site_url}">锁定</a>{/if}</td>
			<td class="main_td1" align="center" >{if $item.edu_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} /  {if $item.edu_style==2}<a href="{$_A.query_url}/unlock&type=edu&user_id={$item.user_id}{$_A.site_url}">解锁</a>{else}<a href="{$_A.query_url}/lock&type=edu&user_id={$item.user_id}{$_A.site_url}">锁定</a>{/if}</td>
			<td class="main_td1" align="center" >{if $item.job_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} /  {if $item.job_style==2}<a href="{$_A.query_url}/unlock&type=job&user_id={$item.user_id}{$_A.site_url}">解锁</a>{else}<a href="{$_A.query_url}/lock&type=job&user_id={$item.user_id}{$_A.site_url}">锁定</a>{/if}</td>
			
			<td class="main_td1" align="center" ><a href="{$_A.query_url}/new&id={$item.user_id}{$_A.site_url}">{$MsgInfo.userinfo_editl}</a> </td>
		</tr>
		
		-->
		{ foreach  from=$_A.userinfo_list key=key item=item}
		
		<tr  {if $key%2==1} class="tr2"{/if}>
			<td class="main_td1" align="center">{$item.username}</td>
			<td class="main_td1" align="center" >{if $item.building_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} </td>
			<td class="main_td1" align="center" >{if $item.company_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if}</td>
			<td class="main_td1" align="center" >{if $item.firm_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if}</td>
			<td class="main_td1" align="center" >{if $item.finance_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if}</td>
			<td class="main_td1" align="center" >{if $item.contact_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if}</td>
			<td class="main_td1" align="center" >{if $item.mate_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} </td>
			<td class="main_td1" align="center" >{if $item.edu_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if}</td>
			<td class="main_td1" align="center" >{if $item.job_status==1}{$MsgInfo.userinfo_status_all}{else}{$MsgInfo.userinfo_status_no_all}{/if} </td>
			
			<td class="main_td1" align="center" ><a href="{$_A.query_url}/new&id={$item.user_id}{$_A.site_url}">{$MsgInfo.userinfo_editl}</a> </td>
		</tr>
		{ /foreach}
		<tr>
		<td colspan="15" class="action">
		<div class="floatl">
		
		</div>
		<div class="floatr">
			{$MsgInfo.userinfo_username}：<input type="text" name="username" id="username" value="{$magic.request.username}"/> {$MsgInfo.userinfo_status}<select id="status" ><option value="">{$MsgInfo.userinfo_all}</option><option value="1" {if $magic.request.status==1} selected="selected"{/if}>{$MsgInfo.userinfo_view_yes}</option><option value="0" {if $magic.request.status=="0"} selected="selected"{/if}>{$MsgInfo.userinfo_view_no}</option></select> <input type="button" value="{$MsgInfo.userinfo_sousuo}" / onclick="sousuo()">
		</div>
		</td>
	</tr>
		<tr>
			<td colspan="9" class="page">
			{$_A.showpage} 
			</td>
		</tr>
	</form>	
</table>
<script>
var url = '{$_A.query_url}';
{literal}
function sousuo(){
	var sou = "";
	var username = $("#username").val();
	if (username!=""){
		sou += "&username="+username;
	}
	var status = $("#status").val();
	if (status!=""){
		sou += "&status="+status;
	}
	if (sou!=""){
	location.href=url+sou;
	}
}
</script>
{/literal}


{/if}