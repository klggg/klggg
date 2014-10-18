<?php
/******************************
 * $File: users.php
 * $Description: 用户后台处理文件
 * $Author: hummer 
 * $Time:2011-11-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问
require_once(ROOT_PATH."modules/rating/rating.class.php");
require_once(ROOT_PATH."modules/account/account.class.php");

$_A['list_purview']["users"]["name"] = "用户管理";
$_A['list_purview']["users"]["result"]["users_list"] = array("name"=>"用户列表","url"=>"code/users/list");
$_A['list_purview']["users"]["result"]["users_new"] = array("name"=>"添加用户","url"=>"code/users/new");
$_A['list_purview']["users"]["result"]["users_info"] = array("name"=>"用户信息","url"=>"code/users/info");
$_A['list_purview']["users"]["result"]["users_type"] = array("name"=>"用户类型","url"=>"code/users/type");
$_A['list_purview']["users"]["result"]["users_vip"] = array("name"=>"VIP管理","url"=>"code/users/vip");
$_A['list_purview']["users"]["result"]["users_examine"] = array("name"=>"审核记录列表","url"=>"code/users/examine");
$_A['list_purview']["users"]["result"]["users_rebut"] = array("name"=>"用户举报","url"=>"code/users/rebut");

/**
 * 添加用户
**/
if ($_A['query_type'] == "new"){
	if ($_POST['username']!=""){
		$result = usersClass::AddUsers($_POST);
		if ($result>0){
			
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "action";
			$admin_log["operating"] = "add";
			$admin_log["article_id"] = $result;
			$admin_log["result"] = 1;
			$admin_log["content"] = str_replace(array( '#username#'), array($_POST['username']), $MsgInfo["users_add_success_msg"]);
			usersClass::AddAdminLog($admin_log);
			
			$msg = array($MsgInfo["users_add_success"]);
			
		}else{
			
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "action";
			$admin_log["operating"] = "add";
			$admin_log["article_id"] = 0;
			$admin_log["result"] = 0;
			$admin_log["content"] =  str_replace(array( '#username#'), array($_POST['username']), $MsgInfo["users_add_error_msg"])."(".$MsgInfo[$result].")";
			usersClass::AddAdminLog($admin_log);
			
			$msg = array($MsgInfo[$result]);
		}
	}	
}


elseif ($_A['query_type'] == "edit"){

	if ($_POST['user_id']!=""){
		$data['user_id'] = $_POST['user_id'];
		$msg = "";
		if ($_POST['password']!=""){
			if($_POST['password'] != $_POST['password1']){
				$msg = array($MsgInfo['users_password_error']);
			}else{
				$data['password'] = $_POST['password'];
				$result = usersClass::UpdatePassword($data);
				if ($result>0){
			
				     if ($_G['module']['ucenter_status']==1 ){
		                  $result_user = $mysql->db_fetch_array("select email,username from {users} where user_id='".$data['user_id']."'");
						 
						$_data['email'] = $result_user['email'];
					$_data['username'] = $result_user['username'];
					$_data['ignoreoldpw'] = '1';
					$_data['newpassword'] = $_POST['password'];
					 ucenterClass::UcenterPwd($_data);
						
				      }
					  
				}else{
					$msg = array($MsgInfo[$result]);
				}
			}
		}
		
		if ($msg=="" && $_POST['paypassword']!=""){
			if($_POST['paypassword'] != $_POST['paypassword1']){
				$msg = array($MsgInfo['users_password_error']);
			}else{
				$data['paypassword'] = $_POST['paypassword'];
				$result = usersClass::UpdatePayPassword($data);
				if ($result>0){
				
				}else{
					$msg = array($MsgInfo[$result]);
				}
			}
		}
				$msg = array("操作成功");
			
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "users";
		$admin_log["type"] = "edit";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}else{
		$_A['users_result'] = usersClass::GetUsers(array("user_id"=>$_REQUEST['user_id']));
		
	}
}


elseif ($_A['query_type'] == "editinfo" ){
	if ($_POST['password']!="" || $_POST['paypassword']!=""){
		$msg = check_valicode();
		$var = array("password","repassword","paypassword","repaypassword","user_id");
		$data = post_var($var);
		if ($data['password']!="" && $data['repassword']!=""){
			if ($data['password']!=$data['repassword']){
				$msg = array("两次登陆密码不一致");
			}else{
				$result=usersClass::UpdatePassword($data);
				print_r($result);
				exit;
			}
		}
		if ($data['paypassword']!="" && $data['repaypassword']!=""){
			if ($data['paypassword']!=$data['repaypassword']){
				$msg = array("两次交易密码不一致");
			}else{
				$result=usersClass::UpdatePayPassword($data);
			}
		}
		$msg = array("修改成功");
	}else{
		$result = usersClass::GetUsersInfo(array("user_id"=>$_REQUEST['user_id']));//0表示用户组的类别，1表示管理组的类型
		$_A['info_result'] = $result;
		$result = ratingClass::GetInfoOne(array("user_id"=>$_REQUEST['user_id']));//0表示用户组的类别，1表示管理组的类型
		$_A['rating_result'] = $result;
		$result = ratingClass::GetContactOne(array("user_id"=>$_REQUEST['user_id']));//0表示用户组的类别，1表示管理组的类型
		$_A['contact_result'] = $result;
		$result = ratingClass::GetCompanyOne(array("user_id"=>$_REQUEST['user_id']));//0表示用户组的类别，1表示管理组的类型
		$_A['company_result'] = $result;
	}
}

elseif ($_A['query_type'] == "view" ){

	
	$_A['user_result'] =usersClass::GetUsers_view(array("user_id"=>$_REQUEST["user_id"]));

}
elseif ($_A['query_type'] == "info_view" || $_A['query_type'] == "info_edit"){
	if ($_POST['user_id']!=""){
		$var = array("user_id","niname","sex","birthday","status","province","city","area","question","answer");
		$data = post_var($var);
		$result = usersClass::UpdateUsersInfo($data);
		
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "users";
		$admin_log["type"] = "info";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  "用户修改成功";
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
			
		$msg = array("修改成功");
	}else{
		
	$_A['_user_result'] = usersClass::GetUsersInfo(array("user_id"=>$_REQUEST['user_id']));
	}


}
elseif ($_A['query_type'] == "vip" ){
	check_rank("users_vip");//检查权限
	if ($_REQUEST['action']=="view"){
		if (isset($_POST['status'])){
			$var = array("status","verify_remark","user_id","kefu_userid","years");
			$data = post_var($var);
			$data['verify_time'] = time();
			$data['user_id'] = $_REQUEST['user_id'];
			$data['verify_userid'] = $_G['user_id'];
			$user_id = $_REQUEST['user_id'];
			$_result = usersvipClass::GetUsersVip(array("user_id"=>$data["user_id"]));
			if($_result['status']==1){
				$result = usersvipClass::UpdateUsersVipKefu(array("user_id"=>$data["user_id"],"kefu_userid"=>$data['kefu_userid']));
				$msg = array("客服修改成功");
				$admin_log["operating"] = "update";
			}else{
				$result = usersvipClass::CheckUsersVip($data);//更新
				$admin_log["operating"] = "check";
				if ($data['status']==1){
					if ($_G['system']['con_vipfee_now']==1){
						$vip["user_id"] = $data['user_id'];
						$vip["nid"] = "vip_success_".$data['user_id'];
						if ($_result['vip_type']==1){
							$vip["money"] = $_G['system']['con_vip_fee'];
						}elseif ($_result['vip_type']==2){
							$vip["money"] = $_G['system']['con_vip_gao'];
						}
						$vip["income"] = 0;
						$vip["expend"] = $vip["money"];
						$vip["balance"] = -$vip["money"];
						$vip["balance_cash"] = -$vip["money"];
						$vip["balance_frost"] = 0;
						$vip["frost"] = 0;
						$vip["await"] = 0;
						$vip["type"] = "vip_success";
						$vip["to_userid"] = 0;
						$vip["remark"] =  "通过Vip审核";
						accountClass::AddLog($vip);
						usersvipClass::UpdateUsersVipMoney($vip);
					}
				}
				$msg = array("VIP用户审核成功","","{$_A['query_url']}/vip");
			}
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "vip";
			$admin_log["article_id"] = $result>0?$result:0;
			$admin_log["result"] = $result>0?1:0;
			$admin_log["content"] =  $msg[0];
			$admin_log["data"] =  $data;
			usersClass::AddAdminLog($admin_log);
		}else{
			$result = UsersvipClass::GetUsersVip(array("user_id"=>$_REQUEST['user_id']));//0表示用户组的类别，1表示管理组的类型
			$_A['vip_result'] = $result;
		}
	}

}



elseif ($_A['query_type'] == "type" ){
	if (isset($_POST['name'])){
		$msg = check_valicode();
		if ($msg==""){
			$var = array("name","nid","remark","order","checked");
			$data = post_var($var);
			if ($_POST['id']!=""){
				$data['id'] = $_POST['id'];
				$result = usersClass::UpdateUsersType($data);
				if ($result>0){
					$msg = array($MsgInfo["users_type_update_success"],"",$_A['query_url_all']);
				}else{
					$msg = array($MsgInfo[$result]);
				}
				$admin_log["operating"] = "update";
			}else{
				$result = usersClass::AddUsersType($data);
				if ($result>0){
					$msg = array($MsgInfo["users_type_add_success"],"",$_A['query_url_all']);
				}else{
					$msg = array($MsgInfo[$result]);
				}
				$admin_log["operating"] = "add";
			}
			
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "type";
			$admin_log["article_id"] = $result>0?$result:0;
			$admin_log["result"] = $result>0?1:0;
			$admin_log["content"] =  $msg[0];
			$admin_log["data"] =  $data;
			usersClass::AddAdminLog($admin_log);
		}
	}elseif ($_REQUEST['checked']!=""){
		$data['id'] = $_REQUEST['checked'];
		$result = usersClass::UpdateUsersTypeChecked($data);
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "users";
		$admin_log["type"] = "type";
		$admin_log["operating"] = "checked";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	
	}elseif ($_REQUEST['edit']!=""){
		$data['id'] = $_REQUEST['edit'];
		$result = usersClass::GetUsersTypeOne($data);
		if (is_array($result)){
			$_A["users_type_result"] = $result;
		}else{
			$msg = array($MsgInfo[$result]);
		}
	
	}elseif($_REQUEST['del']!=""){
		$data['id'] = $_REQUEST['del'];
		$result = usersClass::DelUsersType($data);
		if ($result>0){
			$msg = array($MsgInfo["users_type_del_success"],"",$_A['query_url_all']);
		}else{
			$msg = array($MsgInfo[$result]);
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "users";
		$admin_log["type"] = "type";
		$admin_log["operating"] = "del";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}
	
}
//管理员管理
elseif ($_A['query_type'] == "admin" ){
	check_rank("system_users_admin");//检查权限
	if ($_POST['type']=="user_id"){
		$var = array("username","user_id","email");
		$data = post_var($var);
		$result = usersClass::GetUserid($data);
		if ($result>0){
			echo "<script>location.href='{$_A['query_url_all']}&user_id={$result}'</script>";
		}else{
			$msg = array($MsgInfo[$result],"",$_A['query_url_all']);
		}
	}
	elseif ($_POST['action']=="update" ){
		$var = array("user_id","adminname","password","type_id","province","city","remark","qq","phone");
		$data = post_var($var);
		$result = usersClass::UpdateUsersAdmin($data);
		if ($result>0){
			$msg = array($MsgInfo["users_admin_update_success"],"",$_A['query_url_all']);
		}else{
			$msg = array($MsgInfo[$result],"",$_A['query_url_all']);
		}
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "users";
		$admin_log["type"] = "admin";
		$admin_log["operating"] = "update";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}
		
	elseif ($_REQUEST['action']=="del"){
		$data['user_id'] = $_REQUEST['user_id'];
		$result = usersClass::DeleteUsersAdmin($data);
		if ($result >0){
			$msg = array($MsgInfo["users_admin_del_success"],"","{$_A['query_url_all']}");
		}else{
			$msg = array($MsgInfo[$result]);
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "users";
		$admin_log["type"] = " admin";
		$admin_log["operating"] = 'del';
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}
	
	elseif ($_REQUEST['user_id']!=""){
		$data['user_id'] = $_REQUEST['user_id'];
		$result = usersClass::GetUsers($data);
		if (is_array($result)){
			$_A['users_result'] = $result;
			$_A['users_admin_result'] = usersClass::GetUsersAdminOne($data);
		}else{
			$msg = array($MsgInfo[$result],"",$_A['query_url_all']);
		}
	}
	
		
}

//管理员记录
elseif ($_A['query_type'] == "admin_log" ){
	check_rank("system_users_admin_log");//检查权限

}

elseif ($_A['query_type'] == "rebut" ){

}


//管理员类型
elseif ($_A['query_type'] == "admin_type" ){
	check_rank("system_users_admin_type");//检查权限
	if (isset($_POST['name'])){
			$var = array("name","nid","remark","order","module","purview");
			$data = post_var($var);
			if ($_POST['id']!=""){
				$data['id'] = $_POST['id'];
				$result = usersClass::UpdateAdminType($data);
				if ($result>0){
					$msg = array($MsgInfo["users_admin_type_update_success"],"",$_A['query_url_all']);
				}else{
					$msg = array($MsgInfo[$result]);
				}
				$admin_log["operating"] = "update";
			}else{
				$result = usersClass::AddAdminType($data);
				if ($result>0){
					$msg = array($MsgInfo["users_admin_type_add_success"],"",$_A['query_url_all']);
				}else{
					$msg = array($MsgInfo[$result]);
				}
				$admin_log["operating"] = "add";
			}
			
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "admin_type";
			$admin_log["article_id"] = $result>0?$result:0;
			$admin_log["result"] = $result>0?1:0;
			$admin_log["content"] =  $msg[0];
			$admin_log["data"] =  $data;
			usersClass::AddAdminLog($admin_log);
		
	}elseif ($_REQUEST['action']=="edit"){
		$data['id'] = $_REQUEST['id'];
		$result = usersClass::GetAdminTypeOne($data);
		if (is_array($result)){
			$_A["admin_type_result"] = $result;
		}else{
			$msg = array($MsgInfo[$result]);
		}
	
	}elseif($_REQUEST['action']=="del"){
		$data['id'] = $_REQUEST['id'];
		$result = usersClass::DelAdminType($data);
		if ($result>0){
			$msg = array($MsgInfo["users_admin_type_del_success"],"",$_A['query_url_all']);
		}else{
			$msg = array($MsgInfo[$result]);
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "users";
		$admin_log["type"] = "admin_type";
		$admin_log["operating"] = "del";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}
	
}



?>