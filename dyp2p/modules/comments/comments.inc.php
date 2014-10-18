<?php
/******************************
 * $File:comment.inc.php
 * $Description: 评论管理文件
 * $Author: hummer 
 * $Time:2011-11-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

require_once('comments.class.php');

if ($_U['query_type'] == "new"){	
	$msg = check_valicode();
	if ($msg==""){
		$data=array();
		$data['user_id'] = $_G['user_id'];//评论人
		$data['contents'] = $_POST['comment_content'];//评论内容
		$data['article_id'] = $_POST['comment_parent'];//评论的文章
		$data['site_id'] = $_POST['site_id'];//评论的站点id
		$data['reply_id'] = $_POST['reply_id'];//回复的id
		$data['pid'] = $_POST['pid'];//回复的母id
		
		$result=commentsClass::AddComments($data);
		if($result>0){
			$msg = array("发表评论成功");
		}else{
			$msg = array($MsgInfo[$result]);
		}
	}
}	
	
$template  = "user_comments.html";
?>