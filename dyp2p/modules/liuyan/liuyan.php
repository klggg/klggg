<?php
/******************************
 * $File: linkages.php
 * $Description: 联动管理
 * $Author: hummer 
 * $Time:2010-08-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$_A['list_purview']["liuyan"]["name"] = "留言管理";
$_A['list_purview']["liuyan"]["result"]["liuyan_list"] = array("name"=>"留言管理","url"=>"code/liuyan/list");

require_once("liuyan.class.php");

check_rank("liuyan_list");//检查权限

/**
 * 留言列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "留言列表";
	
	$data['page'] = $_A['page'];
	$data['epage'] = 20;
	$result = liuyanClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['liuyan_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}

	
/**
 * 添加
**/
elseif ($_A['query_type'] == "new"  || $_A['query_type'] == "edit" ){
	
	$_A['list_title'] = "列表";
	
	if (isset($_POST['title'])){
		$var = array("title","name","email","tel","fax","company","address","type","status","content");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		$_G['upimg']['file'] = "litpic";
		$pic_result = $upload->upfile($_G['upimg']);
		if ($pic_result!=""){
			$data['litpic'] = $pic_result;
		}
		
		if ($_A['query_type'] != "new"){
			$data['id'] = $_POST['id'];
			$result = liuyanClass::Update($data);
		}else{
			$result = liuyanClass::Add($data);
		}
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功","",$_A['query_url'].$_A['site_url']);
		}
		$user->add_log($_log,$result);//记录操作
	}
	
	else{
		$result = liuyanClass::GetSet();
		if ($result!=false){
			$_A['liuyan_type_list'] = explode("|",$result['type']);
		
			if ($_A['query_type'] == "edit"){
				$data['id'] = $_REQUEST['id'];
				$_A['liuyan_result'] = liuyanClass::GetOne($data);
				
			}
		}
	}

	
	
}	


/**
 * 查看
**/
elseif ($_A['query_type'] == "view"){
	$data['id'] = $_REQUEST['id'];
	if (isset($_POST['reply'])){
		$data['reply'] = nl2br($_POST['reply']);
		$data['replytime'] = time(); 
		$data['replyip'] = ip_address(); 
		$result = liuyanClass::Update($data);
		$msg = array("回复成功");
	}else{
		$_A['liuyan_result'] = liuyanClass::GetOne($data);
	}
}


/**
**/
elseif ($_A['query_type'] == "del"){
	$data['id'] = $_REQUEST['id'];
	$result = liuyanClass::Delete($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}

/**
 * 留言设置
**/
elseif ($_A['query_type'] == "set"){
	if (isset($_POST['type'])){
		$result = liuyanClass::ActionSet($_POST);
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("设置成功");
		}
	}else{
		$_A['liuyan_set'] = liuyanClass::GetSet();
	}
}

//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作","",$_A['query_url'].$_A['site_url']);
}
?>