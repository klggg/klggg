<?php
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

//判断邮箱参数存在as
if (isset($_POST['email'])){
	$var = array("email","username","password","confirm_password");
	$data = post_var($var);
	
	//判断推荐人是否已经存在
	if (IsExiest($_POST['invite_username'])!=false && $_POST['invite_username']!=""){
		$result = usersClass::GetUsers(array("username"=>urlencode($_POST['invite_username'])));
		if ($result!=false){
			$data_info['invite_userid'] = $result['user_id'];
		}else{
			$msg = array($MsgInfo["users_reg_invite_username_not_exiest"],"","/?user&q=reg");
		}
	}elseif (IsExiest($_POST['invite_user_id'])!=false){
		$data_info['invite_userid'] = $_POST['invite_user_id'];
	}
	
	if ($msg == ""){
		$result = usersClass::RegUsers($data);
		if ($result>0){
			
			if ($data_info['invite_userid']!=""){
				$sql="insert into `{users_friends}` set `user_id`={$result},`friends_userid`={$data_info['invite_userid']},`addtime` = '".time()."',`addip` = '".ip_address()."',status=1";
				$mysql->db_query($sql);
				$_sql="insert into `{users_friends}` set `user_id`={$data_info['invite_userid']},`friends_userid`={$result},`addtime` = '".time()."',`addip` = '".ip_address()."',status=1";
				$mysql->db_query($_sql);
				$_sql="insert into `{users_friends_invite}` set `user_id`={$data_info['invite_userid']},`friends_userid`=$result,`addtime` = '".time()."',`addip` = '".ip_address()."',status=1,type=1";
				$mysql->db_query($_sql);
			}
			$credit_log['user_id'] = $result;
			$credit_log['nid'] = "reg";
			$credit_log['code'] = "payment";
			$credit_log['type'] = "reg";
			$credit_log['addtime'] = time();
			$credit_log['article_id'] = $result;
			$credit_log['remark'] = "注册获得金币";
			creditClass::ActionCreditLog($credit_log);
			
			//注册送VIP
			if($_G['system']['con_reg_vip']>0)
			{
			$data['vip_type'] = 1;
		    $data['gold_status'] = 0;
		    $data['user_id'] = $result;
		    $data['remark'] = "注册赠送VIP";
		    $data['kefu_userid'] = 0;
			$data['money'] = 0;
			$data['vip_time']=$_G['system']['con_reg_vip'];
			usersClass::UsersVipApply($data);
			}
				
			$_result = usersClass::GetUsersTypeCheck();
			$data_info['type_id'] = $_result['id'];
			$data_info['status'] = 1;
			$data_info['user_id'] = $result;
			usersClass::UpdateUsersInfo($data_info);
			
			//加入cookie
			$data['user_id'] = $result;
			$data['cookie_status'] = $_G['system']['con_cookie_status'];
			SetCookies($data);
			
			
						//ucenter登录
			$ucenter_login = "";
		
			if ($_G['module']['ucenter_status']==1){
				$user_result = usersClass::GetUsers(array("user_id"=>$data['user_id']));
				$_data['username'] = $user_result['username'];
				$_data['password'] = $user_result['password'];
				$_data['user_id'] = $user_result['user_id'];
				$_data['email'] = $user_result['email'];
				$ucenter_login = ucenterClass::UcenterLogin($_data);
				if ($ucenter_login==""){
					$msg = array("论坛同步失败，请跟管理员联系");
				}
			}
			
			//如果注册成功，则发送邮箱进行确认
			$active_id = urlencode(authcode($result.",".time(),"TTWCGY"));
			$reg_active_url = "?user&q=active&id={$active_id}";
			$email_info['user_id'] = $result;
			$email_info['email'] = $data['email'];
			$email_info['title'] = $MsgInfo["users_add_reg_email_title"];
			$data['webname'] = $_G['system']['con_webname'];
			$email_info["msg"] = RegEmailMsg($data);
			$email_info['type'] = "reg";
			$result = usersClass::SendEmail($email_info);
			echo "<script>location.href='/?user&q=reg&type=email'</script>";
		}else{
			$msg = array($MsgInfo[$result]);
		}
	}
}elseif($_REQUEST["type"]=="email"){
	$emailurl = "http://mail.".str_replace("@","",strstr($_G['user_result']['email'],"@"));
	$_U['emailurl'] = $emailurl;
}elseif($_REQUEST["type"]=="sendemail"){
	$active_id = urlencode(authcode($_G['user_id'].",".time(),"TTWCGY"));
	$reg_active_url = "?user&q=active&id={$active_id}";
	$data['webname'] = $_G['system']['con_webname'];
	$data['email'] = $_G['user_result']['email'];
	$data['user_id'] = $_G['user_result']['user_id'];
	$data['username'] = $_G['user_result']['username'];
	$email_info['user_id'] = $_G['user_result']['user_id'];
	$email_info['email'] = $_G['user_result']['email'];
	$email_info['title'] = $MsgInfo["users_add_reg_email_title"];
	$email_info["msg"] = RegEmailMsg($data);
	$email_info['type'] = "reg";
	$result = usersClass::SendEmail($email_info);
	if ($result) return "发送成功";
}
$template = 'user_reg.html';

?>