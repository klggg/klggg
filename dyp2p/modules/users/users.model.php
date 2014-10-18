<?php
/******************************
 * $File: users.model.php
 * $Description: 用户基本信息操作
 * $Author: hummer 
 * $Time:2010-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/

//#borrow_url# 表示借款标的地址
//#borrow_name#  表示借款的名称

$MsgInfo["users_empty"] = "查不到此用户";
$MsgInfo["users_username_empty"] = "用户名不能为空";
$MsgInfo["users_username_long15"] = "用户名长度不能大于15个字符";
$MsgInfo["users_username_long4"] = "用户名长度不能小于4个字符";
$MsgInfo["users_username_exist"] = "用户名已经存在";
$MsgInfo["users_password_empty"] = "密码不能为空";
$MsgInfo["users_password_error"] = "密码不一致";
$MsgInfo["users_password_error_shuz"] = "只能是英文字母或数字组合";
$MsgInfo["users_password_long6"] = "密码不能小于6位";
$MsgInfo["users_email_empty"] = "邮箱不能为空";
$MsgInfo["users_email_long32"] = "邮箱长度不能大于32个字符";
$MsgInfo["users_email_exist"] = "邮箱已经存在";
$MsgInfo["users_userid_empty"] = "用户名ID不能为空";
$MsgInfo["users_valicode_empty"] = "验证码不能为空";
$MsgInfo["users_valicode_error"] = "验证码不正确";
$MsgInfo["users_keywords_empty"] = "账户不能为空";
$MsgInfo["users_reg_invite_username_not_exiest"] = "介绍人的用户名不存在，请选择是否填写正确，如果没有请为空";

$MsgInfo["users_info_userid_empty"] = "用户资料id不能为空";

$MsgInfo["users_admin_id_error"] = "找不到相应的后台管理权限";
$MsgInfo["users_admin_login_password_error"] = "用户名密码不正确。";
$MsgInfo["users_admin_login_password_error_msg"] = "用户#username#在“".date("Y-m-d H:i:s")."”登录后台#admin_url#密码错误。";
$MsgInfo["users_admin_login_status_error"] = "您的账户已经被冻结，请跟网站管理员联系";
$MsgInfo["users_admin_login_status_error_msg"] = "用户#username#在“".date("Y-m-d H:i:s")."”登录后台#admin_url#因为用户状态被冻结而不能正常登录。";
$MsgInfo["users_admin_login_admin_id_error"] = "您不是管理员，不能管理后台";
$MsgInfo["users_admin_login_admin_id_error_msg"] = "用户#username#在“".date("Y-m-d H:i:s")."”登录后台#admin_url#因为不是管理员而不能登录后台。";
$MsgInfo["users_admin_login_success"] = "登录成功";
$MsgInfo["users_admin_login_success_msg"] = "用户#username#在“".date("Y-m-d H:i:s")."”登录后台#admin_url#成功。";


$MsgInfo["users_add_success"] = "注册成功";
$MsgInfo["users_add_success_msg"] = "在“".date("Y-m-d H:i:s")."”添加“#username#”用户成功。";
$MsgInfo["users_add_error"] = "用户名添加错误，请跟管理员联系";
$MsgInfo["users_add_error_msg"] = "在“".date("Y-m-d H:i:s")."”添加“#username#”用户失败。";
$MsgInfo["users_add_error"] = "用户名添加错误，请跟管理员联系";
$MsgInfo["users_add_reg_email_title"] = "新用户激活信";
$MsgInfo["users_add_reg_email_msg"] =  '
	<div style="background: url(http://'.$_SERVER['HTTP_HOST'].'/data/images/base/email_bg.png) no-repeat left bottom; font-size:14px; width: 588px; ">
	<div style="padding: 10px 0px; background: url(http://'.$_SERVER['HTTP_HOST'].'/data/images/base/email_button.png)  no-repeat ">
		
		<div style="padding: 2px 20px 30px;">
			<p>亲爱的 <span style="color: rgb(196, 0, 0);">#username#</span> , 您好！</p>
			<p>感谢您注册#webname#，您登录的邮箱帐号为 <strong style="font-size: 16px;">#email#</strong></p>
			<p>请点击下面的链接即可完成激活。</p>
			<p style="overflow: hidden; width: 100%; word-wrap: break-word;"><a title="点击完成注册" href="http://'.$_SERVER['HTTP_HOST'].'#url#" target="_blank" swaped="true">http://'.$_SERVER['HTTP_HOST'].'#url#</a>
			<br><span style="color: rgb(153, 153, 153);">(如果链接无法点击，请将它拷贝到浏览器的地址栏中)</span></p>

			<p>感谢您光临#webname#用户中心，我们的宗旨：为您提供优秀的产品和优质的服务！ <br>现在就登录吧!
			<a title="点击登录#webname#用户中心" style="color: rgb(15, 136, 221);" href="http://'.$_SERVER['HTTP_HOST'].'/?user" target="_blank" swaped="true">http://'.$_SERVER['HTTP_HOST'].'/?user</a> 
			</p>
			<p style="text-align: right;"><br>#webname#用户中心 敬启</p>
			<p><br>此为自动发送邮件，请勿直接回复！如您有任何疑问，请点击<a title="点击联系我们" style="color: rgb(15, 136, 221);" href="http://'.$_SERVER['HTTP_HOST'].'/help/index.html" target="_blank" >联系我们&gt;&gt;</a></p>
		</div>
	</div>
</div>
		';
$MsgInfo["users_update_password_success_msg"] = "在“".date("Y-m-d H:i:s")."”修改“#username#”用户密码成功。";
$MsgInfo["users_update_password_error_msg"] = "在“".date("Y-m-d H:i:s")."”添加“#username#”用户密码失败。";
$MsgInfo["users_update_email_success_msg"] = "在“".date("Y-m-d H:i:s")."”修改“#username#”用户邮箱成功。";
$MsgInfo["users_update_email_error_msg"] = "在“".date("Y-m-d H:i:s")."”添加“#username#”用户邮箱失败。";


$MsgInfo["users_login_success"] = "登录成功。";
$MsgInfo["users_login_success_msg"] = "“".date("Y-m-d H:i:s")."”登录成功。";
$MsgInfo["users_login_error"] = "用户名密码错误。";
$MsgInfo["users_login_error_msg"] = "用户“#keywords#”在“".date("Y-m-d H:i:s")."”登录失败。";;


$MsgInfo["users_active_success"] = "邮箱激活成功";
$MsgInfo["users_active_pass"] = "激活地址已经过期，请重新激活";
$MsgInfo["users_active_yes"] = "您的邮箱已经激活，不需要再一次激活";
$MsgInfo["users_active_error"] = "激活错误，请跟管理员联系";


//以下为模板的文件的英文文字
$MsgInfo["users_name_id"] = "ID";
$MsgInfo["users_name_username"] = "用户名";
$MsgInfo["users_name_email"] = "邮箱";
$MsgInfo["users_name_logintime"] = "登录次数";
$MsgInfo["users_name_password"] = "密码";
$MsgInfo["users_name_password1"] = "确认密码";
$MsgInfo["users_name_reg_time"] = "注册时间";
$MsgInfo["users_name_reg_ip"] = "注册ip";
$MsgInfo["users_name_up_time"] = "上次登录时间";
$MsgInfo["users_name_up_ip"] = "上次登录IP";
$MsgInfo["users_name_last_time"] = "最后登录时间";
$MsgInfo["users_name_last_ip"] = "最后登录IP";


$MsgInfo["users_name_order_last_time"] = "最后登录时间排序";
$MsgInfo["users_name_order_default"] = "默认排序";
$MsgInfo["users_name_order_up_time"] = "按上次登录时间排序";
$MsgInfo["users_name_order_reg_time"] = "按注册时间排序";

$MsgInfo["users_name_operatinger"] = "操作人";
$MsgInfo["users_name_operating"] = "操作";
$MsgInfo["users_name_operating_id"] = "操作id";
$MsgInfo["users_name_type"] = "类型";
$MsgInfo["users_name_result"] = "结果";
$MsgInfo["users_name_content"] = "内容";
$MsgInfo["users_name_add_time"] = "添加时间";
$MsgInfo["users_name_add_ip"] = "添加ip";

$MsgInfo["users_name_code"] = "模块";
$MsgInfo["users_name_last_ip"] = "最后登录IP";
$MsgInfo["users_name_sousuo"] = "搜索";

$MsgInfo["users_name_new"] = "添加用户";
$MsgInfo["users_name_edit"] = "编辑用户";
$MsgInfo["users_name_del"] = "删除用户";
$MsgInfo["users_name_submit"] = "提交";
$MsgInfo["users_name_reset"] = "重置";
$MsgInfo["users_name_success"] = "成功";
$MsgInfo["users_name_false"] = "失败";
$MsgInfo["users_name_edit_not_empty"] = "不修改请为空";

$MsgInfo["users_type_name_empty"] = "类型名称不能为空";
$MsgInfo["users_type_nid_empty"] = "类型标识名不能为空";
$MsgInfo["users_type_nid_exiest"] = "类型标识名已经存在";
$MsgInfo["users_type_add_success"] = "添加类型成功";
$MsgInfo["users_type_update_success"] = "修改类型成功";
$MsgInfo["users_type_del_success"] = "删除类型成功";
$MsgInfo["users_type_empty"] = "类型不存在";
$MsgInfo["users_type_id_empty"] = "类型ID不存在";
$MsgInfo["users_type_upfiles_exiest"] = "类型有图片存在，不能删除";



$MsgInfo["users_admin_type_name_empty"] = "管理类型名称不能为空";
$MsgInfo["users_admin_type_user_exiest"] = "还有管理员存在，不能删除类型";
$MsgInfo["users_admin_type_not_delete"] = "超级管理员不能删除";
$MsgInfo["users_admin_type_id_empty"] = "管理类型ID不能为空";
$MsgInfo["users_admin_type_nid_empty"] = "管理类型标识名不能为空";
$MsgInfo["users_admin_type_nid_exiest"] = "管理类型标识名已经存在";
$MsgInfo["users_admin_type_add_success"] = "添加管理类型成功";
$MsgInfo["users_admin_type_update_success"] = "修改管理类型成功";
$MsgInfo["users_admin_type_del_success"] = "删除管理类型成功";
$MsgInfo["users_admin_type_empty"] = "管理类型不存在";
$MsgInfo["users_admin_type_id_empty"] = "管理类型ID不存在";
$MsgInfo["users_admin_type_upfiles_exiest"] = "管理类型有图片存在，不能删除";


$MsgInfo["users_admin_name_empty"] = "管理员别名不能为空";
$MsgInfo["users_admin_password_empty"] = "管理员密码不能为空";
$MsgInfo["users_admin_user_id_empty"] = "用户ID不能为空";
$MsgInfo["users_admin_update_success"] = "管理员操作成功";
$MsgInfo["users_admin_del_success"] = "管理员删除成功";


$MsgInfo["usres_vip_apply_success"] = "VIP申请成功，请等待管理员审核";
$MsgInfo["users_vip_status_yes"] = "vip已经审核通过，请不要再审核";


$MsgInfo["users_login_lock"] = "您的账号已被锁定，请跟管理员联系";

?>
