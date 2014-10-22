<?php
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

//添加用户信息表
require_once(ROOT_PATH."/modules/users/users.class.php");

$_U = array();//用户的共同配置变量

//用户中心模板引擎的配置
$magic->left_tag = "{";
$magic->right_tag = "}";
//$magic->force_compile = true;
$temlate_dir = "themes/{$_G['system']['con_template']}_member";
$magic->template_dir = $temlate_dir;
$magic->assign("tpldir",$temlate_dir);


//用户中心的管理地址
$member_url = "/?".$_G['query_site'];
$_U['member_url'] = $member_url;

//模块，分页，每页显示条数


//对地址栏进行归类
$q = empty($_REQUEST['q'])?"":urldecode($_REQUEST['q']);//获取内容
$_q = explode("/",$q);
$_U['query'] = $q;
$_U['query_sort'] = empty($_q[0])?"main":$_q[0];
$_U['query_class'] = empty($_q[1])?"list":$_q[1];
$_U['query_type'] = empty($_q[2])?"list":$_q[2];
$_U['query_url'] = $_U['member_url']."&q={$_U['query_sort']}/{$_U['query_class']}";

// 登录页面
if ($_U['query_sort'] == 'login'){
	require_once("login.php");
}

elseif ($_U['query_class'] == 'updatepwd'){
	$updatepwd_msg = "";
	if(isset($_REQUEST['id'])){
		$id = urldecode($_REQUEST['id']);
		$data = explode(",",authcode(trim($id),"DECODE"));
		$user_id = $data[0];
		$start_time = $data[1];
		if ($user_id==""){
			$updatepwd_msg = "您的操作有误，请勿乱操作";
		}elseif (time()>$start_time+10*60){
			$updatepwd_msg = "此链接已经过期，请重新申请";
		}else{
			$result = usersClass::GetUsers(array("user_id"=>$user_id));
			if ($result == false){
				$updatepwd_msg = "您的操作有误，请勿乱操作";
			}else{
				$_U['user_result'] =  $result;
			}
		}
	}else{
		$updatepwd_msg = "您的操作有误，请勿乱操作";
	}
	//$updatepwd_msg = "";
	if(isset($_POST['password']) && $updatepwd_msg=="" ){
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		if ($password==""){
			$update_msg = "新密码不能为空";
		}elseif ( strlen($password)<6 || strlen($password)>15){
			$update_msg = "密码的长度在6到15位之间";
		}elseif ($password != $confirm_password){
			$update_msg = "两次密码不一样";
		}else{
			$index['user_id'] = $user_id;
			$index['password'] = $password;
			$result = usersClass::UpdatePassword($index);
			
			
			
			if ($result==false){
				$update_msg = "您的操作有误，请勿乱操作";
			}else{
			
			     if ($_G['module']['ucenter_status']==1 ){
		                  $result_user = $mysql->db_fetch_array("select email,username from {users} where user_id='".$user_id."'");
						 
						$_data['email'] = $result_user['email'];
					$_data['username'] = $result_user['username'];
					$_data['ignoreoldpw'] = '1';
					$_data['newpassword'] = $_POST['password'];
					 ucenterClass::UcenterPwd($_data);
						
				      }
				$updatepwd_msg = "密码修改成功。";
			}
		}
	}
	
	$_U['update_msg'] = $update_msg;
	$_U['updatepwd_msg'] = $updatepwd_msg;
	$template = 'user_updatepwd.html';
}

// 退出页面
elseif ($_U['query_sort'] == 'logout'){
	include_once("logout.php");
}
	
// 取回密码
elseif ($_U['query_sort'] == 'getpwd'){
	include_once("getpwd.php");
}
	
// 注册
elseif ($_U['query_sort'] == 'reg'){
	include_once("reg.php");
}
// 激活
elseif ($_U['query_sort'] == 'active'){
	include_once("active.php");
}
#要请好友注册	
elseif ($_U['query_sort'] == "reginvite"){	
	$_user_id = Url2Key($_REQUEST['u'],"reg_invite");
	$_SESSION['reginvite_user_id'] = $_user_id[1];
	header('location:/?user&q=reg');
}
// 检查用户名是否被注册
elseif ($_U['query_sort'] == 'check_username'){
	$result = usersClass::CheckUsername(array("username"=>$_REQUEST['username']));
	if ($result == false){
		echo 1;exit;
	}else{
		echo "0";exit;
	}
}

# 检查邮箱是否被注册
elseif ($_U['query_sort'] == 'check_email'){
	$result = usersClass::GetUsers(array("email"=>urldecode($_REQUEST['email'])));
	if ($result == ""){
		echo "1";
	}else{
		echo "0";
	}
}


elseif ($_U['query_sort'] == "plugins" ){
	$magic->assign("_U",$_U);
	$_ac = !isset($_REQUEST['ac'])?"html":$_REQUEST['ac'];
	if ($_ac=="html"){
		$_p = !isset($_REQUEST['p'])?"":$_REQUEST['p'];
		$file = ROOT_PATH."plugins/html/{$_p}.inc.php";
	}else{
		$file = ROOT_PATH."plugins/{$_ac}/{$_ac}.php";
	}
	if (file_exists($file)){
		include_once ($file);exit;
	}
}


// 判断是否登录
elseif ($_G['user_id'] == ""){
	header('location:/?user&q=logout');
}


// 用户中心处理
elseif ($_U['query_sort'] == 'code'){
	
	if (is_file(ROOT_PATH."/modules/{$_U['query_class']}/{$_U['query_class']}.inc.php")){
		include(ROOT_PATH."/modules/{$_U['query_class']}/{$_U['query_class']}.inc.php");
	}else{
		$msg = array("您操作有误，请勿乱操作");
	}
}

//用户中心
else{
	$template = "user_main.html";
}





//系统信息处理文件
if (isset($msg) && $msg!="") {
	$_msg = $msg[0];
	$content = empty($msg[1])?"返回上一页":$msg[1];
	$url = empty($msg[2])?"-1":$msg[2];
	$http_referer = empty($_SERVER['HTTP_REFERER'])?"":$_SERVER['HTTP_REFERER'];
	if ($http_referer == "" && $url == ""){ $url = "/";}
	if ($url == "-1") $url = "";
	elseif ($url == "" ) $url = $http_referer;
	$_U['showmsg'] = array('msg'=>$_msg,"url"=>$url,"content"=>$content);
	$template = "user_msg.html";
}


$magic->assign("_U",$_U);

$magic->display($template);
exit;	
?>