<?
/******************************
 * $File: account.inc.php
 * $Description: 资金用户处理文件
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

include_once("account.class.php");
include_once("account.count.php");
if ($_U['query_type']=="bank"){
	if (IsExiest($_POST['account'])!=false){
		$var = array("province","city","account","bank","branch");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		$result = accountClass::UpdateUsersBank($data);
		if ($result>0){
			$msg = array("资金账户修改成功","",$_U['query_url_all']);
		}else{
			$msg = array($MsgInfo[$result],"",$_U['query_url_all']);
		}
	}else{
		$result = accountClass::GetUsersBankOne(array("user_id"=>$_G['user_id']));
		if (is_array($result)){
			$_U['account_bank_result'] = $result;
		}else{
		$sql = "insert into `{account_users_bank}` set user_id='".$_G['user_id']."'";
			$mysql->db_query($sql);
			//$msg = array($MsgInfo[$result],"",$_U['query_url_all']);
		}
	}
}

elseif ($_U['query_type']=="recharge_new"){
	require_once(ROOT_PATH."modules/payment/payment.class.php");
	if (isset($_POST['money'])){
		$msg = check_valicode();
		if ($msg==""){
			$var = array("money","type","remark");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 0;
			
			if (!is_numeric($data['money'])){
				$msg = array("金额填写有误","",$_U['query_url']."/".$_U['query_type']);
			}
			if ($msg==""){
				$url = "";
				if ($data['type']==1){
					$data['payment'] = $_POST['payment1'];
					$data['remark'] = $_POST['payname'.$_POST['payment1']]."在线充值";
					$result=usersClass::GetUsersVip(array("user_id"=>$data['user_id']));
					if ($result['status']==1){
						$data['fee']=$_G['system']['con_account_recharge_vip_fee']/100*$data['money'];
					}else{
						$data['fee']=$_G['system']['con_account_recharge_fee']/100*$data['money'];
					}
					
						$data['balance'] = $data['money'] - $data['fee'];
					/*$money1 = isset($_G['system']['con_recharge_max_account'])?$_G['system']['con_recharge_max_account']:5000;
					if ($data['money'] >= $money1 ){
						$fee1 = isset($_G['system']['con_recharge_max_fee'])?$_G['system']['con_recharge_max_fee']:50;
						$data['fee'] = $fee1;
					}else{
						$fee2 = isset($_G['system']['con_recharge_fee'])?$_G['system']['con_recharge_fee']:0.01;
						$data['fee'] = $data['money']*$fee2;
					}*/
				}else{
					$data['payment'] = $_POST['payment2'];
					$data['fee'] = $_G['system']['con_account_recharge_jiangli']/100*$data['money'];
						$data['balance'] = $data['money'] + $data['fee'];
				}
			
				
				$data['nid'] = str_pad(rand(1000,9999)."00504".$_G['user_id'].rand(1000,9999),16,"0",STR_PAD_RIGHT);
				if ($data['type']==2){
				$data['status'] = 0;
				}else{
				$data['status'] = 2;
				}
				$result = accountClass::AddRecharge($data);
					$data['trade_no'] = $data['nid'];
				
				if ($data['type']==1){
					$data['subject'] = "账号充值";
//					$data['bankCode'] = $_POST['bankCode'];
					//$data['subject'] = $_G['system']['con_webname']."账号充值";
					$data['body'] = "账号充值";
					$url = paymentClass::ToSubmit($data);
				}
				if ($result!=true){
					$msg = array($result,"",$_U['query_url']."/".$_U['query_type']);
				}else{
					if ($url!=""){
						header("Location: {$url}");
						exit;
					$msg = array("网站正在转向支付网站<br>如果没反应，请点击下面的支付网站接口","支付网站",$url);
					}else{
					$msg = array("你已经成功提交了充值，请等待管理员的审核。","",$_U['query_url']."/".$_U['query_type']);
					}
				}
			}else{
				$msg = array("金额填写有误","",$_U['query_url']."/".$_U['query_type']);
			
			}
		}
	}else{
		$_U['account_payment_list'] = paymentClass::GetList(array("status"=>1));
	}
}


elseif ($_U['query_type'] == "list"){
	$data['user_id'] = $_G["user_id"];
	$result = accountCountClass::GetRechargeCount($data);
	$_U['recharge']['online'] = $result['recharge_all_up'];
	$_U['recharge']['downline'] = $result['recharge_all_down'];
	$_U['recharge']['all'] = $result['recharge_all'];
	$_result = accountCountClass::GetCashCount($data);
	$_U['cash']['all'] = $_result['0']['account'];
}
elseif ($_U['query_type'] == "web"){
	$data['user_id'] = $_POST["user_id"];
	$log_info["user_id"] = $data['user_id'];//操作用户id
	$log_info["nid"] = "web_daicha_".$data['user_id'].time();//订单号
	$log_info["money"] = 30;//操作金额
	$log_info["income"] = 0;//收入
	$log_info["expend"] = 30;//支出
	$log_info["balance_cash"] = -30;//可提现金额
	$log_info["balance_frost"] = 0;//不可提现金额
	$log_info["frost"] = 0;//冻结金额
	$log_info["await"] = 0;//待收金额
	$log_info["type"] = "web_daicha";//类型
	$log_info["to_userid"] = 0;//付给谁
	$log_info["remark"] =  "申请网站代查成功，扣款30元。";
	accountClass::AddLog($log_info);
	usersClass::UpdateUsersInfo(array("user_id"=>$data['user_id'],"web_status"=>1));
}
elseif ($_U['query_type'] == "cash"){
	$data['user_id'] = $_G["user_id"];
	$_result = accountCountClass::GetCashCount($data);
	$_U['cash']['all'] = $_result['0']['account'];
	$_U['cash']['credited_all'] = $_result['0']['credited_all'];
	$_U['cash']['fee_all'] = $_result['0']['fee_all'];
}
elseif ($_U['query_type'] == "recharge"){
	$data['user_id'] = $_G["user_id"];
	$result = accountCountClass::GetRechargeCount($data);
	$_U['recharge']['online'] = $result['recharge_all_up'];
	$_U['recharge']['downline'] = $result['recharge_all_down'];
	$_U['recharge']['all'] = $result['recharge_all'];
}
elseif ($_U['query_type'] == "cash_new"){	
	
	
	$data['user_id'] = $_G["user_id"];
	
		$_result_jin = accountClass::Getborrowjin($data);
		$_U['result_jin']=$_result_jin['account'];

		
		if(isset($_POST['money'])){
			$msg = check_valicode();
			
			//if(isset($_POST['code_yz'])){
		$code_yz=$_POST['code_yz'];
		
		if(empty($code_yz)){
	    $msg = array("请填写手机验证码");
		}else{
		$sql = "select code,id from `{approve_smslog}` where user_id='{$data['user_id']}' and type='smstixian' and code_status=0 ORDER BY `id` DESC LIMIT 0 , 1";
		   $code = $mysql->db_fetch_array($sql);
		   if($code_yz!=$code['code']){
		  $msg = array("手机验证码错误");
		   }
		}
		//}
			if ($msg!=""){
				
			}elseif ($_G["user_result"]['paypassword']!=md5($_POST['paypassword'])){
				$msg = array("交易密码填写有误");
			}elseif (!is_numeric($_POST['money'])){
				$msg = array("金额填写有误");
			}elseif ($_POST['money']<0){
				$msg = array("金额必须为正数");	
			}else{
				$data['status'] = 0;
				$data['total'] = $_POST['money']+$_G['system']['con_account_cash_1']*$data['account']*0.01;
				$data['account'] = $_POST['money'];
				$data['bank'] = $_POST['bank'];
				$data['bank_id'] = $_POST['bank_id'];
				$data['nid'] = "cash_".$_G['user_id'].time().rand(100,999);
				$data['fee'] = $_G['system']['con_account_cash_1']*$data['account']*0.01;
				$data['credited'] = $data['total']-$data['fee'];
				$result = accountClass::AddCash($data);
				if ($result>0){
				$mysql->db_fetch_array("update `{approve_smslog}` set code_status=1,code_time='".time()."' where id='".$code['id']."' ");
					$msg = array("您的提现申请已经成功提交，除工作日外预计24小时到账","","/?user&q=code/account/log");
				}else{
					$msg = array($MsgInfo[$result],"","/?user&q=code/account/cash_new");
				}
			}
		}
}
$template = "user_account.html";
?>
