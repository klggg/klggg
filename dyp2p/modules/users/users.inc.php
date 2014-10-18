<?php
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

require_once(ROOT_PATH."modules/account/account.class.php");
require_once(ROOT_PATH."modules/credit/credit.class.php");
//VIP申请
if ($_U['query_type'] == "applyvip"){
	if (isset($_POST['vip_type'])){
		if (md5($_POST['paypassword'])!=$_G['user_result']['paypassword']){
			$msg = array("支付交易密码不正确");
		}
		$data['vip_type'] = $_POST['vip_type'];
		$data['gold_status'] = $_POST['gold_status'];
		$data['user_id'] = $_G['user_id'];
		$data['remark'] = 0;
		$data['kefu_userid'] = 0;
		if ($data['gold_status']==1){
			if ($data['vip_type']==1){
				$data['money'] = $_G['system']['con_vip_fee']-20;
			}else{
				$data['money'] = $_G['system']['con_vip_gao']-20;
			}
		}else{
			if ($data['vip_type']==1){
				$data['money'] = $_G['system']['con_vip_fee'];
			}else{
				$data['money'] = $_G['system']['con_vip_gao'];
			}
		}
		$account=accountClass::GetOne(array("user_id"=>$data['user_id']));
		if ($account['balance']<$data['money']){
			$msg = array("余额不足，不能申请VIP。");
		}
		
	    if($msg==""){
		$result = usersClass::UsersVipApply($data);
		if ($result===true){
			if ($_G['system']['con_vipfee_now']==1){
				$vip["user_id"] = $data['user_id'];
				$vip["nid"] = "vip_success_".$data['user_id'].time();
				if ($data['gold_status']==1){
					if ($data['vip_type']==1){
						$vip['money'] = $_G['system']['con_vip_fee']-20;
					}else{
						$vip['money'] = $_G['system']['con_vip_gao']-20;
					}
				$credit_log['user_id'] = $data['user_id'];
				$credit_log['nid'] = "vip_gold";
				$credit_log['code'] = "payment";
				$credit_log['type'] = "vip_gold";
				$credit_log['addtime'] = time();
				$credit_log['article_id'] = $data['user_id'];
				$credit_log['remark'] = "升级Vip冲抵金币扣除";
				creditClass::ActionCreditLog($credit_log);
				}else{
					if ($data['vip_type']==1){
						$vip['money'] = $_G['system']['con_vip_fee'];
					}else{
						$vip['money'] = $_G['system']['con_vip_gao'];
					}
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
				
				$user_log["user_id"] = $data['user_id'];
				$user_log["code"] = "account";
				$user_log["type"] = "vip_success";
				$user_log["operating"] = "account";
				$user_log["article_id"] = $data['user_id'];
				$user_log["result"] = 1;
				if ($data['vip_type']==1){
					$user_log["content"] = "申请成为VIP会员成功,[<a href=/vip_xieyi/index.html target=_blank>点击此处</a>]查看协议书";
				}else{
					$user_log["content"] = "申请成为高级VIP会员成功,[<a href=/hvip_xieyi/index.html target=_blank>点击此处</a>]查看协议书";
				}
				usersClass::AddUsersLog($user_log);
			}
			$_result=usersClass::GetFriendsInvite(array("friends_userid"=>$data['user_id']));
			if ($_result['list'][0]['user_id']>0){
				$credit_invite['user_id'] = $_result['list'][0]['user_id'];
				$credit_invite['nid'] = "invite";
				$credit_invite['code'] = "payment";
				$credit_invite['type'] = "invite";
				$credit_invite['addtime'] = time();
				$credit_invite['article_id'] =  $_result['list'][0]['user_id'];
				$credit_invite['remark'] = "邀请人成为Vip获得金币";
				creditClass::ActionCreditLog($credit_invite);
			}
			$msg = array("Vip申请成功","","/vip/index.html");
		}else{
			$msg = array($MsgInfo[$result],"","/vip/index.html");
		}
		}	
	}
}

elseif ($_U['query_type'] == "protection"){
	if ((isset($_POST['type']) && $_POST['type'] == 1)){
		if (  $_G['user_result']['answer']=="" || $_POST['answer'] == $_G['user_result']['answer']){
			$_U['answer_type'] = 2;
		}else{
			$msg = array("问题答案不正确","",$url);
		}
	}elseif (isset($_POST['type']) && $_POST['type'] == 2){
		$var = array("question","answer");
		$data = post_var($var);
		if ($data['answer']==""){
			$msg = array("问题答案不能为空","",$url);	
		}else{
			$data['user_id'] = $_G['user_id'];
			$result = usersClass::UpdateUsers($data);
			if ($result == false){
				$msg = array($result);	
			}else{
				$msg = array("密码保护修改成功","",$url);	
			}
		}
	}
}


//交易密码设置
elseif ($_U['query_type'] == "paypwd"){
	if (isset($_POST['oldpassword'])){
		if ($_G['user_result']['paypassword'] == "" && md5($_POST['oldpassword']) !=$_G['user_result']['password']){
			$msg = array("密码不正确，请输入您的登录密码","",$url);	
		}elseif ($_G['user_result']['paypassword'] != "" && md5($_POST['oldpassword']) != $_G['user_result']['paypassword']){
			$msg = array("密码不正确，请输入您的旧交易密码","",$url);	
		}else{
			$data['user_id'] = $_G['user_id'];
			$data['paypassword'] = $_POST['newpassword'];
			$result = usersClass::UpdatePayPassword($data);
			if ($result>0){
				$msg = array("交易密码修改成功","","index.php?user&q=code/users/paypwd");
			}else{
				$msg = array($MsgInfo[$result]);
			}
		}
	}		
}

//交易密码设置
elseif ($_U['query_type'] == "getpaypwd"){
	if(isset($_REQUEST['id']) && $_REQUEST['id']!=""){
		if (isset($_POST['paypwd']) && $_POST['paypwd']!=""){
			if ($_POST['paypwd']==""){
				$msg = array("密码不能为空","",$url);
			}elseif ($_POST['paypwd']!=$_POST['paypwd1']){
				$msg = array("两次密码不一样","",$url);
			}else{
				$data['user_id'] = $_G['user_id'];
				$data['paypassword'] = $_POST['paypwd'];
				$result = usersClass::UpdatePayPassword($data);
				$msg = array("交易密码修改成功","","/?user&q=code/users/paypwd");
			}
		}else{
			$id = urldecode($_REQUEST['id']);
			$_id = explode(",",authcode(trim($id),"DECODE"));
			$data['user_id'] = $_id[0];
			if ($_id[1]+60*60<time()){
				$msg = array("信息已过期，请重新申请。");
			}elseif ($data['user_id']!=$_G['user_id']){
				$msg = array("此信息不是你的信息，请不要乱操作");
			}
			
		}
	}elseif (isset($_POST['valicode'])){
		$data['user_id'] = $_G['user_id'];
		$data['username'] = $_G['user_result']['username'];
		$data['email'] = $_G['user_result']['email'];
		$data['webname'] = $_G['system']['con_webname'];
		$data['title'] = "交易密码取回";
		$data['key'] = "getPayPwd";
		$data['query_url'] = "code/user/getpaypwd";
		$data['msg'] = GetPaypwdMsg($data);
		$data['type'] = "getpaypwd";
		$result = usersClass::SendEmail($data);
		$msg = array("信息已发送到您的邮箱，请注意查收");
	}
}

//登录密码设置
elseif ($_U['query_type'] == "userpwd"){
	if (isset($_POST['oldpassword'])){
		if (md5($_POST['oldpassword']) != $_G['user_result']['password']){
			$msg = array("密码不正确，请输入您的旧密码","",$url);	
		}else{
	
			$data['user_id'] = $_G['user_id'];
			$data['password'] = $_POST['newpassword'];
			$result = usersClass::UpdatePassword($data);
			if ($result == false){
				$msg = array($result);	
			}else{
				if ($_G['module']['ucenter_status']==1 ){
		
					$_data['email'] = $_G['user_result']['email'];
					$_data['username'] = $_G['user_result']['username'];
					$_data['oldpassword'] = $_POST['oldpassword'];
					$_data['newpassword'] = $_POST['newpassword'];
					ucenterClass::UcenterPwd($_data);
							
				}
				$msg = array("登录密码修改成功","",$url);	
			}
		}
	}
}

//举报
elseif ($_U['query_type'] == "addrebut"){
	if (isset($_POST['contents'])){
		$data['type_id'] = $_POST['type_id'];
		$data['contents'] = nl2br($_POST['contents']);
		$data['rebut_userid'] = $_POST['rebut_userid'];
		$data['user_id'] = $_G['user_id'];
		$result = usersClass::AddRebut($data);
		if ($result==false){
			$msg = array($result,"","");	
		}else{
			$msg = array("感谢你的举报，我们将第一时间做出处理","","");	
		}
	}else{
		$result = usersClass::GetUsers(array("username"=>urldecode($_REQUEST['username'])));
		
		if ($result==false){
			echo "<script>alert('找不到此用户，请不要乱操作');location.href='/index.php?user'</script>";
			exit;
		}elseif ($result['user_id']==$_G['user_id']){
			echo "<script>alert('不能举报自己');</script>";
			exit;
		}else{
			echo "<div style='line-height:30px; text-align:left'>* 网站真诚提醒您：请客观地反映您所遇到的真实情况,以共同维护一个诚信和公平的借贷环境。<form method='post' action='/?user&q=code/users/addrebut'>";
			echo "<div align='left'>&nbsp;&nbsp;&nbsp;所要举报的用户：{$_REQUEST['username']}<input type='hidden' name='rebut_userid' value='{$result['user_id']}'></div>";
			echo "<div align='left'>&nbsp;&nbsp;&nbsp;类型：<select name='type_id'>";
			foreach ($_G["_linkages"]['rebut_type'] as $key => $value){
				echo "<option value='{$value['value']}'>{$value['name']}</option>";
			}
			echo "</select></div><div align='left'>&nbsp;&nbsp;&nbsp;内容：<textarea rows='2' cols='20' name='contents'></textarea></div>";
			echo "<div align='left'>&nbsp;&nbsp;&nbsp;<input type='submit' value='确 定'></div>";
			echo "</form></div>";
			exit;
		}
	}
}

//邀请好友
elseif ($_U['query_type'] == "reginvite"){
	$_U['user_inviteid'] =  Key2Url($_G['user_id'],"reg_invite");
}
elseif ($_U['query_type'] == "checkrealname"){
	$data['realname'] = iconv("UTF-8", "GBK", $_GET['realname']);
	$data['user_id'] = $_G['user_id'];
	$result = usersClass::CheckRealname($data);
	echo $result;exit;
}
elseif ($_U['query_type'] == "checkphone"){
	$data['phone'] = $_GET['phone'];
	$data['user_id'] = $_G['user_id'];
	$result = usersClass::CheckPhone($data);
	echo $result;exit;
}
	
$template = "users_info.html";
?>
