<?php
require_once 'comment.class.php';
if (isset($_POST['valicode']) && $_POST['valicode']!=$_SESSION['valicode']){
//if (1!=1){
		$msg = array("验证码错误","",$_U['query_url']."/".$_U['query_type']);
}else{
	$_SESSION['valicode'] = "";
	if ($_U['query_type'] == "AddReplay"){
		if(!isset($_REQUEST['huodong_id'])){
			echo "借款不存在";
			exit;
		}else{
		$data=array();
		$data['comment_id'] = $_REQUEST['id'];
		$data['huodong_id'] = $_REQUEST['huodong_id'];
		$data['user_id'] = $_REQUEST['user_id'];
		$data['contents'] = urldecode($_REQUEST['replay_contents']);
		$data['status'] = 2;
		$result=commentClass::AddReplay($data);
			if($result !== true){
				echo "回复失败";
			}else{
				echo "回复成功";
			}
		}
	}

elseif ($_U['query_type'] == "add"){	
		$data=array();
		$data['article_id'] = $_REQUEST['article_id'];
		$data['user_id'] = $_REQUEST['user_id'];
		$data['contents'] = urldecode($_REQUEST['contents']);
		$data['pid'] = $_REQUEST['pid'];
		$data['sid'] = $_REQUEST['sid'];
		$data['code'] = $_REQUEST['code'];
		$data['status'] = 1;
		$data['reply_userid'] = $_REQUEST['reply_userid'];
		$result=commentClass::AddComment($data);
		if($result>0){
			echo $result;
		}else{
			echo -1;
		}
		exit;
	}	
	
//评论
elseif ($_U['query_type'] == "AddCom"){
		if(!isset($_REQUEST['article_id'])){
			echo "借款不存在";
			exit;
		}else{
		$data=array();
		$data['article_id'] = $_REQUEST['article_id'];
		$data['user_id'] = $_REQUEST['user_id'];
		$data['contents'] = urldecode($_REQUEST['contents']);
		$data['status'] = 1;
		$data['pid'] = 0;
		$data['code'] = $_REQUEST['code'];
		$result=commentClass::AddRe($data);
			if($result !== true){
				echo "评论失败";
			}else{
				echo "评论成功";
			}
		}
	}

	
elseif ($_U['query_type'] == "new"){
	$data=array();
	$data['user_id'] = $_G['user_id'];
	$data['contents'] = iconv("UTF-8", "GBK", $_POST['contents']);
	$data['article_id'] = $_POST['article_id'];
	$data['code'] = "borrow";
	$result=commentClass::AddLy($data);
	if($result>0){
		echo "评论成功";
	}else{
		echo "评论失败";
	}
		exit;

	
}
	
	elseif ($_U['query_type'] == "del_tip"){
		echo "<br><br>是否删除此条评论<br><br><a href='/?user&q=code/comment/del_yes&user_id=".$_REQUEST['user_id']."&id=".$_REQUEST['id']."'>确定删除</a>";
		
		exit;
	
	}
	
	elseif ($_U['query_type'] == "del_yes"){
		$data['id'] = $_REQUEST['id'];
		$result = commentClass::GetOne($data);
		if ($result['reply_userid']!=$_G['user_id']){
			$msg = array("你没有权限删除此评论");
		}else{
			$result=commentClass::Delete($data);
			if($result>0){
				$msg = array("删除成功");
			}else{
				$msg = array("删除失败，请跟管理员联系");
			}
		}
	}
	
	elseif ($_U['query_type'] == "del"){
		$data['id'] = $_POST['id'];
		$result=commentClass::Delete($data);
		if($result>0){
			echo true;
		}else{
			echo false;
		}
	}
	
	elseif ($_U['query_type'] == "reply_tip"){
		echo "<br><br><form action='/?user&q=code/comment/reply_new&repay_userid=".$_REQUEST['repay_userid']."&pid=".$_REQUEST['pid']."&sid=".$_REQUEST['sid']."&code=".$_REQUEST['code']."' method='post'>";
		echo "<textarea rows='5' cols='50' name='contents'></textarea><br><br>";
		echo "<input type='submit' value='提交回复'>";
		echo "</form>";
		exit;
	
	}
	
	
	elseif ($_U['query_type'] == "reply_new"){
		$data=array();
		$data['article_id'] = $_G['user_id'];
		$data['user_id'] = $_G['user_id'];
		$data['contents'] = urldecode($_POST['contents']);
		$data['pid'] = $_REQUEST['pid'];
		$data['sid'] = $_REQUEST['sid'];
		$data['code'] = $_REQUEST['code'];
		$data['status'] = 1;
		$data['reply_userid'] = $_REQUEST['reply_userid'];
		$result=commentClass::AddComment($data);
		if($result>0){
			$msg = array("回复成功");
		}else{
			$msg = array("回复失败，请跟管理员联系");
		}
	
	}
	
}
?>
