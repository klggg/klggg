<?php
/******************************
 * $File: vote.php
 * $Description: 投票管理
 * $Author: hummer 
 * $Time:2010-08-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$_A['list_purview']["vote"]["name"] = "投票管理";

$_A['list_purview']["vote"]["result"]["vote_list"] = array("name"=>"投票管理","url"=>"code/vote/list");
$_A['list_purview']["vote"]["result"]["vote_type"] = array("name"=>"投票类型","url"=>"code/vote/type");

require_once("vote.class.php");

check_rank("vote_list");
/**
 * 圈子列表
**/
if ($_A['query_type'] == "list"){
	if (isset($_POST['title']) && $_REQUEST['vote']==""){
		$var = array("title","status","remark","input","order","type_id");
		$data = post_var($var);
		if ($_POST['id']!=""){
			$data['id'] = $_POST['id'];
			$result = voteClass::UpdateVote($data);
			if ($result>0){
				$msg = array($MsgInfo["vote_update_success"],"",$_A['query_url_all']);
			}else{
				$msg = array($MsgInfo[$result]);
			}
			$admin_log["operating"] = "update";
		}else{
			$result = voteClass::AddVote($data);
			if ($result>0){
				$msg = array($MsgInfo["vote_add_success"],"",$_A['query_url_all']);
			}else{
				$msg = array($MsgInfo[$result]);
			}
			$admin_log["operating"] = "add";
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "vote";
		$admin_log["type"] = "vote";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
		
	}elseif ($_REQUEST['edit']!=""){
		$data['id'] = $_REQUEST['edit'];
		$result = voteClass::GetVoteOne($data);
		if (is_array($result)){
			$_A["vote_result"] = $result;
		}else{
			$msg = array($MsgInfo[$result]);
		}
		
	}elseif ($_REQUEST['vote']!=""){
		if (isset($_POST['title']) ){
			$_data['vote_id'] = $_REQUEST['vote'];
			$_data['title'] = $_POST['title'];
			$_data['status'] = $_POST['status'];
			$_data['answer_status'] = $_POST['answer_status'];
			$_data['order'] = $_POST['order'];
			$_data['nid'] = $_POST['nid'];
			$_data['id'] = $_POST['id'];
			if ($_POST['id']!=""){
				$_data['id'] = $_POST['id'];
				$result = voteClass::UpdateVoteAnswer($_data);
				if ($result>0){
					$msg = array($MsgInfo["vote_answer_update_success"],"",$_A['query_url_all']."&vote={$_REQUEST['vote']}");
				}else{
					$msg = array($MsgInfo[$result]);
				}
				$admin_log["operating"] = "update";
			}else{
				$result = voteClass::AddVoteAnswer($_data);
				if ($result>0){
					$msg = array($MsgInfo["vote_answer_add_success"],"",$_A['query_url_all']."&vote={$_REQUEST['vote']}");
				}else{
					$msg = array($MsgInfo[$result]);
				}
				$admin_log["operating"] = "add";
			}
			
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "vote";
			$admin_log["type"] = "answer";
			$admin_log["article_id"] = $result>0?$result:0;
			$admin_log["result"] = $result>0?1:0;
			$admin_log["content"] =  $msg[0];
			$admin_log["data"] =  $data;
			usersClass::AddAdminLog($admin_log);
		}else{
			$data['id'] = $_REQUEST['vote'];
			$result = voteClass::GetVoteOne($data);
			if (is_array($result)){
				$_A["vote_result"] = $result;
			}else{
				$msg = array($MsgInfo[$result]);
			}
			
			$data['id'] = $_REQUEST['answer'];
			$result = voteClass::GetVoteAnswerOne($data);
			if (is_array($result)){
				$_A["vote_answer_result"] = $result;
			}
			
		}
	
	}elseif($_REQUEST['answer_del']!=""){
		$data['id'] = $_REQUEST['answer_del'];
		$result = voteClass::DeleteVoteAnswer($data);
		if ($result>0){
			$msg = array($MsgInfo["vote_answer_del_success"],"",$_A['query_url_all']."&vote={$_REQUEST['vote_id']}");
		}else{
			$msg = array($MsgInfo[$result]);
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "vote";
		$admin_log["type"] = "answer";
		$admin_log["operating"] = "del";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}
	elseif($_REQUEST['del']!=""){
		$data['id'] = $_REQUEST['del'];
		$result = voteClass::DeleteVote($data);
		if ($result>0){
			$msg = array($MsgInfo["vote_del_success"],"",$_A['query_url_all']);
		}else{
			$msg = array($MsgInfo[$result]);
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "vote";
		$admin_log["type"] = "vote";
		$admin_log["operating"] = "del";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}
}


/**
 * 投票类型
**/

elseif ($_A['query_type'] == "type" ){
	if (isset($_POST['name'])){
		$var = array("name","nid","remark","status","order");
		$data = post_var($var);
		if ($_POST['id']!=""){
			$data['id'] = $_POST['id'];
			$result = voteClass::UpdateVoteType($data);
			if ($result>0){
				$msg = array($MsgInfo["vote_type_update_success"],"",$_A['query_url_all']);
			}else{
				$msg = array($MsgInfo[$result]);
			}
			$admin_log["operating"] = "update";
		}else{
			$result = voteClass::AddVoteType($data);
			if ($result>0){
				$msg = array($MsgInfo["vote_type_add_success"],"",$_A['query_url_all']);
			}else{
				$msg = array($MsgInfo[$result]);
			}
			$admin_log["operating"] = "add";
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "vote";
		$admin_log["type"] = "type";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
		
	}elseif ($_REQUEST['edit']!=""){
		$data['id'] = $_REQUEST['edit'];
		$result = voteClass::GetVoteTypeOne($data);
		if (is_array($result)){
			$_A["vote_type_result"] = $result;
		}else{
			$msg = array($MsgInfo[$result]);
		}
	
	}elseif($_REQUEST['del']!=""){
		$data['id'] = $_REQUEST['del'];
		$result = voteClass::DeleteVoteType($data);
		if ($result>0){
			$msg = array($MsgInfo["vote_type_del_success"],"",$_A['query_url_all']);
		}else{
			$msg = array($MsgInfo[$result]);
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "vote";
		$admin_log["type"] = "type";
		$admin_log["operating"] = "del";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}
	
}



?>