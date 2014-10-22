<?php
/******************************
 * $File: account.php
 * $Description: 资金模块后台管理文件
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$_A['list_purview']["account"]["name"] = "资金管理";
$_A['list_purview']["account"]["result"]["account_list"] = array("name"=>"资金账号管理","url"=>"code/account/list");
$_A['list_purview']["account"]["result"]["account_log"] = array("name"=>"资金记录","url"=>"code/account/log");
$_A['list_purview']["account"]["result"]["account_bank"] = array("name"=>"账号管理","url"=>"code/account/bank");
$_A['list_purview']["account"]["result"]["account_recharge"] = array("name"=>"充值管理","url"=>"code/account/recharge");
$_A['list_purview']["account"]["result"]["account_cash"] = array("name"=>"提现管理","url"=>"code/account/cash");
$_A['list_purview']["account"]["result"]["account_recharge_new"] = array("name"=>"添加充值","url"=>"code/account/recharge_new");
$_A['list_purview']["account"]["result"]["account_web"] = array("name"=>"网站费用","url"=>"code/account/web");
$_A['list_purview']["account"]["result"]["account_users"] = array("name"=>"用户费用","url"=>"code/account/users");


require_once("account.class.php");

/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
		$data['page'] = $_REQUEST['page'];
		$data['username'] = $_REQUEST['username'];
		accountexcel::AccountList($data);
		exit;
	}
	check_rank("account_list");//检查权限
}


/**
 * 支付方式
**/
elseif ($_A['query_type'] == "payment"){
	check_rank("account_payment");//检查权限
	require_once("payment.php");
}


/**
 * 网站费用
**/
elseif ($_A['query_type'] == "web"){
	
	check_rank("account_web");//检查权限
	if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
		$data['action'] = $_REQUEST['action'];
		$data['page'] = $_REQUEST['page'];
		$data['username'] = $_REQUEST['username'];
		accountexcel::WebLog($data);
		exit;
	}
	if ($_REQUEST['action']=="account" && $_REQUEST['_type']=="excel"){
		$data['action'] = $_REQUEST['action'];
		$data['page'] = $_REQUEST['page'];
		$data['type'] = $_REQUEST['type'];
		$data['dotime1'] = $_REQUEST['dotime1'];
		$data['dotime2'] = $_REQUEST['dotime2'];
		accountexcel::WebListLog($data);
		exit;
	}
	
	if ($_REQUEST['action']=="repay" && $_REQUEST['_type']=="excel"){
		$data['epage'] = $_REQUEST['epage'];
		$data['page'] = $_REQUEST['page'];
		$data['type'] = $_REQUEST['type'];
		$data['dotime1'] = $_REQUEST['dotime1'];
		$data['dotime2'] = $_REQUEST['dotime2'];
		$data['borrow_status'] = $_REQUEST['borrow_status'];
		$data['order'] = $_REQUEST['order'];
		$data['recover_status'] = $_REQUEST['recover_status'];
		$data['showtype'] = $_REQUEST['showtype'];
		accountexcel::RecoverListLog($data);
		exit;
	}
}

/**
 * 用户费用
**/
elseif ($_A['query_type'] == "users"){
	
	check_rank("account_users");//检查权限
	if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
		$data['page'] = $_REQUEST['page'];
		$data['username'] = $_REQUEST['username'];
		accountexcel::UsersLog($data);
		exit;
	}
}

/**
 * 充值记录
**/
elseif ($_A['query_type'] == "recharge"){
	check_rank("account_recharge");//检查权限
	
	if (isset($_REQUEST['type_e']) && $_REQUEST['type_e']=="excel"){
		$data['page'] = $_REQUEST['page'];
		$data['username'] = $_REQUEST['username'];
		$data['status'] = $_REQUEST['status'];
		accountexcel::RechargeLog($data);
		exit;
	}elseif ($_REQUEST['view']!=""){
		if (isset($_POST['nid'])){
			$var = array("nid","status","verify_remark");
			$data = post_var($var);
			$data['verify_userid'] = $_G['user_id'];
			$data['verify_time'] = time();
			$result = accountClass::VerifyRecharge($data);
			if ($result >0 ){
				$msg = array($MsgInfo["account_reacharge_verify_success"],"",$_A['query_url']."/recharge");
			}else{
				$msg = array($MsgInfo[$result]);
			}
			
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "account";
			$admin_log["type"] = "recharge";
			$admin_log["operating"] = "verify";
			$admin_log["article_id"] = $result>0?$result:0;
			$admin_log["result"] = $result>0?1:0;
			$admin_log["content"] =  $msg[0];
			$admin_log["data"] =  $data;
			usersClass::AddAdminLog($admin_log);
			
		}else{
			$data['id'] = $_REQUEST['view'];
			$_A['account_recharge_result'] = accountClass::GetRecharge($data);
		}
	}
}

/**
 * 投资记录
**/
elseif ($_A['query_type'] == "tender"){
	//check_rank("account_recharge");//检查权限
	
	if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
		$data['page'] = $_REQUEST['page'];
		$data['username'] = $_REQUEST['username'];
		$data['status'] = $_REQUEST['status'];
		$data['borrow_name'] = $_REQUEST['borrow_name'];
		$data['borrow_nid'] = $_REQUEST['borrow_nid'];
		accountexcel::GetTenderList_excel($data);
		exit;
	}
}

/**
 * 修改资金
**/
elseif ($_A['query_type'] == "exit"){
$user_id = $_POST['user_id'];
$money =isset($_POST['money'])?$_POST['money']:0;
$log = $_POST['log'];
if($user_id>0 && isset($_POST['user_id'])){
           if($money>0){
	        $log_info["user_id"] = $user_id;//操作用户id
			$log_info["nid"] = "change_add_".time();//订单号
			$log_info["money"] = $money;//操作金额
			$log_info["income"] = $money;//收入
			$log_info["expend"] = 0;//支出
			$log_info["balance"] = $money;//可提现金额
			$log_info["balance_cash"] = $money;//可提现金额
			$log_info["balance_frost"] = 0;//不可提现金额
			$log_info["frost"] = 0;//冻结金额
			$log_info["await"] = 0;//待收金额
			$log_info["type"] = "change_add";//类型
			$log_info["to_userid"] = 0;//付给谁
			$log_info["remark"] = "管理员添加资金，变动原因：".$log;//备注
			$result = accountClass::AddLog($log_info);
			}elseif($money<0){
			
			$log_info["user_id"] = $user_id;//操作用户id
			$log_info["nid"] = "change_lessen_".time();//订单号
			$log_info["money"] = abs($money);//操作金额
			$log_info["income"] = 0;//收入
			$log_info["expend"] = abs($money);//支出
			$log_info["balance_cash"] = $money;//可提现金额
			$log_info["balance_frost"] = 0;//不可提现金额
			$log_info["frost"] = 0;//冻结金额
			$log_info["await"] = 0;//待收金额
			$log_info["type"] = "change_lessen";//类型
			$log_info["to_userid"] = 0;//付给谁
			$log_info["remark"] = "管理员减少资金，变动原因：".$log;//备注
			$result = accountClass::AddLog($log_info);
			}
			
				//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "account";
		$admin_log["type"] = "change";
		$admin_log["operating"] = "users";
		$admin_log["article_id"] = $result==$log_info["nid"]?$result:0;
		$admin_log["result"] = $result==$log_info["nid"]?1:0;
		$admin_log["content"] =  "管理员变动资金";
		$admin_log["data"] =  $log_info;
		usersClass::AddAdminLog($admin_log);
		
		$msg = array("调整成功！","",$_A['query_url']."/exit&username=".urlencode($_POST['username'])."");	
			
			
}
$data['username'] = $_REQUEST['username'];
$sql = "select user_id,username from `{users}` where  username = '{$data['username']}' ";

$data_h = $mysql->db_fetch_array($sql);

$_A['account_exit_username']=urldecode($data['username']);
$_A['account_exit_result']=accountClass::GetOne($data_h);
$_A['account_exit_result']['user_id']=$data_h['user_id'];
}

/**
 * 资金使用记录
**/
elseif ($_A['query_type'] == "log"){
	check_rank("account_log");//检查权限
	if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
		$data['page'] = $_REQUEST['page'];
		$data['username'] = $_REQUEST['username'];
		$data['dotime1'] = $_REQUEST['dotime1'];
		$data['dotime2'] = $_REQUEST['dotime2'];
		accountexcel::AccountLogList($data);
		exit;
	}
}
	/**
 * 账号管理
**/
elseif ($_A['query_type'] == "bank"){
	check_rank("account_bank");//检查权限
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
	elseif ($_POST['type']=="update"){
		$var = array("user_id","province","city","account","bank","branch");
		$data = post_var($var);
		$result = accountClass::UpdateUsersBank($data);
		if ($result>0){
			$msg = array($MsgInfo["account_bank_users_update_success"],"",$_A['query_url_all']);
		}else{
			$msg = array($MsgInfo[$result],"",$_A['query_url_all']);
		}
		
		//加入管理员操作记录
		$admin_log["user_id"] = $_G['user_id'];
		$admin_log["code"] = "account";
		$admin_log["type"] = "bank";
		$admin_log["operating"] = "users";
		$admin_log["article_id"] = $result>0?$result:0;
		$admin_log["result"] = $result>0?1:0;
		$admin_log["content"] =  $msg[0];
		$admin_log["data"] =  $data;
		usersClass::AddAdminLog($admin_log);
	}
	elseif ($_REQUEST['user_id']!=""){
		$data['user_id'] = $_REQUEST['user_id'];
		$result = accountClass::GetUsersBankOne($data);
		if (is_array($result)){
			$_A['account_bank_result'] = $result;
		}else{
			$msg = array($MsgInfo[$result],"",$_A['query_url_all']);
		}
	}
	elseif ($_REQUEST['action']=="new" || $_REQUEST['action']=="edit" ){
		if (isset($_POST['name'])){
			$var = array("name","status","nid","litpic","cash_money","reach_day");
			$data = post_var($var);
			if ($_REQUEST['id']!=""){
				$data['id'] = $_REQUEST['id'];
				$result = accountClass::UpdateBank($data);
			}else{
				$result = accountClass::AddBank($data);
			}
			
			if ($result >0 ){
				if ($_REQUEST['id']!=""){
					$msg = array($MsgInfo["account_bank_update_success"],"",$_A['query_url']."/bank&action=bank");
				}else{
					$msg = array($MsgInfo["account_bank_add_success"],"",$_A['query_url']."/bank&action=bank");
				}
			}else{
				$msg = array($MsgInfo[$result]);
			}
		
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "account";
			$admin_log["type"] = "bank";
			$admin_log["operating"] = $_A['query_type']=="bank_edit"?"edit":"new";
			$admin_log["article_id"] = $result>0?$result:0;
			$admin_log["result"] = $result>0?1:0;
			$admin_log["content"] =  $msg[0];
			$admin_log["data"] =  $data;
			usersClass::AddAdminLog($admin_log);
		}
		
		elseif ($_REQUEST['action']=="del"){
			$data['id'] = $_REQUEST['id'];
			$result = accountClass::DeleteBank($data);
			if ($result >0){
				$msg = array($MsgInfo["account_bank_del_success"],"","{$_A['query_url']}/bank&action=bank");
			}else{
				$msg = array($MsgInfo[$result]);
			}
			
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "account";
			$admin_log["type"] = " bank";
			$admin_log["operating"] = 'del';
			$admin_log["article_id"] = $result>0?$result:0;
			$admin_log["result"] = $result>0?1:0;
			$admin_log["content"] =  $msg[0];
			$admin_log["data"] =  $data;
			usersClass::AddAdminLog($admin_log);
		}
		
		elseif ($_REQUEST['id']!=""){
			$data['id'] = $_REQUEST['id'];
			$_A['account_bank_result'] = accountClass::GetBank($data);
		}
	
	}
}


/**
 * 提现记录
**/
elseif ($_A['query_type'] == "cash"){
	check_rank("account_cash");//检查权限
	if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
		$data['page'] = $_REQUEST['page'];
		$data['username'] = $_REQUEST['username'];
		$data['status'] = $_REQUEST['status'];
		accountexcel::CashLog($data);
		exit;
	}elseif ($_REQUEST['action']=="view"){
		if (isset($_POST['status'])){
			$msg = check_valicode();
			if ($msg==""){
				$var = array("status","credited","fee","verify_remark");
				$data = post_var($var);
				$data['id'] = $_REQUEST['id'];
				$data['verify_userid'] = $_G['user_id'];
				$data['verify_time'] = time();
				
				$result = accountClass::VerifyCash($data);
				if ($result >0 ){
					$msg = array($MsgInfo["account_cash_verify_success"],"",$_A['query_url']."/cash");
				}else{
					$msg = array($MsgInfo[$result]);
				}
				
				//加入管理员操作记录
				$admin_log["user_id"] = $_G['user_id'];
				$admin_log["code"] = "account";
				$admin_log["type"] = "cash";
				$admin_log["operating"] = "verify";
				$admin_log["article_id"] = $result>0?$result:0;
				$admin_log["result"] = $result>0?1:0;
				$admin_log["content"] =  $msg[0];
				$admin_log["data"] =  $data;
				usersClass::AddAdminLog($admin_log);
			}
		}else{
			$data['id'] = $_REQUEST['id'];
			$_A['account_cash_result'] = accountClass::GetCashOne($data);
		}
	}
}



/**
 * 扣除费用
**/
elseif ($_A['query_type'] == "deduct"){
	check_rank("account_deduct");//检查权限
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = usersClass::GetUsers($_data);
		if ($result==false){
			$msg = array("用户名不存在");
		}elseif ($_POST['valicode']!=$_SESSION['valicode']){
			$msg = array("验证码不正确");
		}else{
			$data['user_id'] = $result['user_id'];
			$data['money'] = $_POST['money'];
			$data['type'] = $_POST['type'];
			$data['remark'] = $_POST['remark'];
			$result = accountClass::Deduct($data);
			if ($result !== true){
				$msg = array($result);
			}else{
				$msg = array("费用已成功扣除","",$_A['query_url']."/log");
				$_SESSION['valicode'] = "";
			}
		}
	}
}



/**
 * 添加费用
**/
elseif ($_A['query_type'] == "recharge_new"){
	check_rank("account_recharge_new");//检查权限
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = usersClass::GetUsers($_data);
		if ($result==false){
			$msg = array("用户名不存在");
		}else{
			$data['user_id'] = $result['user_id'];
			$data['status'] = 0;
			$data['type']==2;
			$data['payment'] = 0;
			$data['fee'] = 0;
			$data['balance'] = $_POST['money'];
			$data['money'] = $_POST['money'];
			$data['nid'] = $result['user_id'].time().rand(100,999);
			$data['remark'] = $_POST['remark'];
			$result = accountClass::AddRecharge($data);
			if ($result !== true){
				$msg = array($result);
			}else{
				$msg = array("操作成功","",$_A['query_url']."/recharge".$_A['site_url']);
			}
		}
	}
}

//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作");
}
?>