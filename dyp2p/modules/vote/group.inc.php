<?php
/******************************
 * $File:group.inc.php
 * $Description: 圈子前台管理文件
 * $Author: hummer 
 * $Time:2011-11-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

require_once("group.class.php");

if ($_U['query_type']=="new"){
	$msg = check_valicode();
	if ($msg==""){
		$var = array("name","type_id","remark","public","litpic","order");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		if ($_POST['id']!=""){
			$data['id'] = $_POST['id'];
			$result = groupClass::UpdateGroup($data);
			if ($result>0){
				$msg = array($MsgInfo["group_update_success"],"",$_U['query_url']."/list");
			}else{
				$msg = array($MsgInfo[$result]);
			}
		}else{
			$result = groupClass::AddGroup($data);
			if ($result>0){
				$msg = array($MsgInfo["group_add_success"],"",$_U['query_url']."/list");
			}else{
				$msg = array($MsgInfo[$result]);
			}
		}
	}

}
echo 1;

$template = "user_group.html";
?>
