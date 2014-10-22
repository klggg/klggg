<?php
/******************************
 * $File: account.excel.php
 * $Description: 资金类文件
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

require_once("account.model.php");

class accountexcel {
	
	//导出用户的资金记录
	function AccountList($data){
		$title = array("Id","用户名称","总金额","可用金额","冻结金额","待收金额");
		if ($data['page']>0){
			$_result = accountClass::GetList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = accountClass::GetList($data);
		}
		foreach ($result as $key => $value){
			$_data[$key] = array($key+1,$value['username'],$value['total'],$value['balance'],$value['frost'],$value['await']);
		}
		exportData("账号信息管理",$title,$_data);
		exit;
	}
	
	
	//导出用户的资金记录
	function AccountLogList($data){
	global $_G;
		$title = array("Id","用户名","类型","操作金额","资产总额","累计存入","累计支出","冻结金额","待收金额","可用金额","操作时间");
		if ($data['page']>0){
			$_result = accountClass::GetLogList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = accountClass::GetLogList($data);
		}
		foreach ($result as $key => $value){
		$value['type']=$_G['linkages']['account_type'][$value['type']];
		
			$_data[$key] = array($key+1,$value['username'],$value['type'],$value['money'],$value['total'],$value['income'],$value['expend'],$value['frost'],$value['await'],$value['balance'],date("Y-m-d H:i:s",$value['addtime']));
		}
		exportData("资金记录列表",$title,$_data);
		exit;
	}
	
	
	//充值资金记录ID
	function RechargeLog($data){
		global $Linkages;
		$title = array("Id","用户名","真实名","交易号","类型","充值银行","充值金额","充值手续费","实际到账金额","状态","操作时间","操作ip");
		
		if ($data['page']>0){
			$_result = accountClass::GetRechargeList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = accountClass::GetRechargeList($data);
		}
		foreach ($result as $key => $value){
			$value['type'] = $Linkages['account_recharge_type'][$value['type']];
			$value['status'] = $Linkages['account_recharge_status'][$value['status']];
			
			$_data[$key] = array($key+1,$value['username'],$value['realname'],"'".$value['nid'],$value['type'],$value['payment_name'],$value['money'],$value['fee'],$value['balance'],$value['status'],date("Y-m-d H:i:s",$value['addtime']),$value['addip']);
		}
		exportData("充值资金记录列表",$title,$_data);
		exit;
	}
	
	
	//投资记录记录ID
	function GetTenderList_excel($data){
		global $Linkages;
		$title = array("Id","投资人","投资金额","投资时间","投资状态","审核状态","借款标","借款标识名","借款总额","自动投标");
		
		if ($data['page']>0){
			$_result = borrowClass::GetTenderList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = borrowClass::GetTenderList($data);
		}
		foreach ($result as $key => $value){
			$value['status'] = $Linkages['borrow_tender_status'][$value['status']];
			$value['tender_status'] = $Linkages['borrow_tender_verify_status'][$value['tender_status']];
			$value['auto_status'] = $Linkages['borrow_tender_auto_status'][$value['auto_status']];
			
			$_data[$key] = array($key+1,$value['username'],$value['account'],date("Y-m-d H:i:s",$value['addtime']),$value['status'],$value['tender_status'],$value['borrow_name'],$value['borrow_nid'],$value['borrow_account'],$value['auto_status']);
		}
		exportData("用户投资记录列表",$title,$_data);
		exit;
	}
	
	//体现资金记录ID用户名称				
	function CashLog($data){
		global $Linkages;
		$title = array("Id","用户名","真实姓名","提现银行","支行","所在地","提现账号","提现总额","到账金额","手续费","提现时间","提现ip","状态");
		if ($data['page']>0){
			$_result = accountClass::GetCashList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = accountClass::GetCashList($data);
		}
		foreach ($result as $key => $value){
			$value['status'] = $Linkages['account_cash_status'][$value['status']];
			$value['city'] = modifier("areas",$value['city'],"p,c");
			$_data[$key] = array($key+1,$value['username'],$value['realname'],$value['bank_name'],$value['branch'],$value['city'],$value['account'],$value['total'],$value['credited'],$value['fee'],date("Y-m-d H:i:s",$value['addtime']),$value['addip'],$value['status']);
		}
		exportData("提现资金记录列表",$title,$_data);
		exit;
	}
	
	
	
	//网站费用			
	function WebLog($data){
		$title = array("Id","类型","操作金额","收入","支出","说明","操作时间","操作ip");
		if ($data['page']>0){
			$_result = accountClass::GetBalanceList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = accountClass::GetBalanceList($data);
		}
		foreach ($result as $key => $value){
			$type = $Linkages['account_web_fee'][$value['type']];
			if ($value['type']=="recharge"){
				$income = $value['income'];
				$expend = $value['expend'];
			}else{
				$income = $value['expend'];
				$expend = $value['income'];
			}
			$_data[$key] = array($key+1,$type,$value['money'],$income,$expend,$value['remark'],date("Y-m-d H:i:s",$value['addtime']),$value['addip']);
		}
		exportData("网站费用",$title,$_data);
		exit;
	}
	
	//网站费用			
	function WebListLog($data){
		$title = array("Id","用户名","类型","网站垫付金额","备注","操作时间","操作ip");
		if ($data['page']>0){
			$_result = accountClass::GetWebList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = accountClass::GetWebList($data);
		}
		foreach ($result as $key => $value){
			$type = $Linkages['account_web_type'][$value['type']];
			$_data[$key] = array($key+1,$value['username'],$type,round($value['money'],2),$remark,date("Y-m-d H:i:s",$value['addtime']),$value['addip']);
		}
		exportData("网站垫付费用",$title,$_data);
		exit;
	}
	
	
	//网站费用			
	function RecoverListLog($data){
		require_once(ROOT_PATH."/modules/borrow/borrow.class.php");
		$title = array("Id","借款标题","应收日期","借款者","第几期","总期数","垫付金额","应收本金","应收利息","逾期罚息","逾期天数","状态");
		if ($data['page']>0){
			$_result = borrowClass::GetRecoverList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = borrowClass::GetRecoverList($data);
		}
		foreach ($result as $key => $value){
			if ($value['recover_status']==1){
				$status="已还";
			}else{
				$status = "未还";	
			}
			
			$_data[$key] = array($key+1,$value['borrow_name'],date("Y-m-d",$value['recover_time']),$value['borrow_username'],$value['recover_period']+1,$value['borrow_period'],$value['recover_recover_account_yes'],$value['recover_capital'],$value['late_interest'],$value['late_days'],$status);
		}
		exportData("网站应收明细账",$title,$_data);
		exit;
	}
	
	
	
	
	//		
	function UsersLog($data){
		$title = array("Id","用户名","类型","操作金额","余额","收入","支出","待收","冻结","备注","操作时间","操作ip");
		if ($data['page']>0){
			$_result = accountClass::GetUsersList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = accountClass::GetUsersList($data);
		}
		foreach ($result as $key => $value){
			$type = $Linkages['account_type'][$value['type']];
			$_data[$key] = array($key+1,$value['username'],$type,$value['money'],$value['balance'],$value['income'],$value['expend'],$value['await'],$value['frost'],$value['remark'],date("Y-m-d H:i:s",$value['addtime']),$value['addip']);
		}
		exportData("用户费用",$title,$_data);
		exit;
	}
}
?>