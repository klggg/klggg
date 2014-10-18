<?php
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问
include_once("liuyan.class.php");

if ($_G['user_id']==""){

	$msg = array("你还没有登录，请先登录","会员登录","index.php?user&q=action/login");
}
if ($_U['query_type']=="add"){
	if ($_SESSION['valicode'] != $_POST['valicode']){
		$msg = array("验证码不正确");
	}else{
		$var = array("title","name","email","tel","fax","company","address","type","status","content");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		$_G['upimg']['file'] = "litpic";
		$pic_result = $upload->upfile($_G['upimg']);
		if ($pic_result!=""){
			$data['litpic'] = $pic_result;
		}
		$result = liuyanClass::Add($data);
		if ($result !== true){
			$msg = array($result);
		}else{
			$_SESSION['valicode'] = "";
			
			$msg = array("操作成功","","/tiwen/index.html");
			
		}
	}

}elseif ($_U['query_type']=="help"){
	$var = array("name","email","phone","content");
	$data = post_var($var);
	$email_info['user_id'] = $result;
	$email_info['email'] = "10596944@qq.com";
	$email_info['title'] = "用户留言";
	$email_info["msg"] = "姓名：{$data['name']}<br>邮箱：{$data['email']}<br>电话：{$data['phone']}<br>内容：{$data['content']}<br>";
	$result = usersClass::SendEmail($email_info);
	$msg = array("操作成功","","/help/index.html");
}

$template = "user_msg.html";
?>
