<?php
/******************************
 * $File: return.php
 * $Description: 支付方式返回文件
 * $Author: hummer 
 * $Time:2010-08-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/
ob_start();
require_once ('../../core/config.inc.php');
require_once (ROOT_PATH.'modules/account/account.class.php');
require_once (ROOT_PATH.'modules/payment/payment.class.php');
if (isset($_REQUEST['trade_status']) && $_REQUEST['trade_status']=="TRADE_SUCCESS" ){
	$trade_no = $_REQUEST['out_trade_no'];
	accountClass::OnlineReturn(array("trade_no"=>$_REQUEST['out_trade_no']));
	echo "<script>location.href='/index.php?user&q=code/account/recharge';</script>";
}
elseif (isset($_REQUEST['ipsbillno']) && $_REQUEST['ipsbillno']!=""){
	echo "ipscheckok";
    $billno = $_GET['billno'];
	$amount = $_GET['amount'];
	$mydate = $_GET['date'];
	$succ = $_GET['succ'];
	$msg = $_GET['msg'];
	$attach = $_GET['attach'];
	$ipsbillno = $_GET['ipsbillno'];
	$retEncodeType = $_GET['retencodetype'];
	$currency_type = $_GET['Currency_type'];
	$signature = $_GET['signature'];
	$content = 'billno'.$billno."currencytype".$currency_type.'amount'. $amount.'date' . $mydate .'succ'. $succ .'ipsbillno'. $ipsbillno . 'retencodetype'.$retEncodeType;
	$result = paymentClass::GetOne(array("nid"=>"ips"));
	$cert = $result['fields']['PrivateKey']['value'];
	$signature_1ocal = strtolower(md5($content . $cert));
	
	if ($signature_1ocal == $signature){
	
		if ($succ == 'Y'){
			accountClass::OnlineReturn(array("trade_no"=>$billno));
			
			$msg = '交易成功';
		}else{
			$msg = '交易失败！';
		}
	}else{
		$msg = '签名不正确！';
	}
	echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
}
elseif (isset($_REQUEST['sp_billno']) && $_REQUEST['sp_billno']!=""){

    $sql = "insert into `{account_check}` set `addtime` = '".time()."',sp_billno='".$_REQUEST['sp_billno']."'";
	$mysql->db_query($sql);
		
	require_once (ROOT_PATH."modules/payment/classes/tenpay/PayResponseHandler.class.php");
	$result = paymentClass::GetOne(array("nid"=>"tenpay"));
	$key = $result['fields']['PrivateKey']['value'];
	$resHandler = new PayResponseHandler();
	$resHandler->setKey($key);
	
	if($resHandler->isTenpaySign()) {
		//交易单号
		$transaction_id = $resHandler->getParameter("transaction_id");
		$sp_billno = $_REQUEST['sp_billno'];
		//金额,以分为单位
		$total_fee = $resHandler->getParameter("total_fee")/100;
		
		//支付结果
		$pay_result = $resHandler->getParameter("pay_result");
		
		if( 0 == $pay_result ) {
			accountClass::OnlineReturn(array("trade_no"=>$sp_billno));
			$msg = "支付成功";
		} else {
			$msg = "支付失败";
		}
			
	} else {
		$msg =  "认证签名失败" ;
	}
	echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";
}

//国付宝
elseif (isset($_POST['respCode']) && $_POST['respCode']!=""){

	if ($_POST['respCode']=="0000"){
		accountClass::OnlineReturn(array("trade_no"=>$_POST['merOrderNum']));
		$msg = "支付成功";
	} else {
		$msg = "支付失败";
	}

	echo "<script>alert('{$msg}');location.href='/index.php?user&q=code/account/recharge';</script>";

}elseif (isset($_REQUEST['merid']) && $_REQUEST['merid']!=""){
	include_once(ROOT_PATH."/modules/payment/classes/chinapay/netpayclient.php");
	$flag = buildKey(ROOT_PATH."/modules/payment/classes/chinapay/PgPubk.key");
	if(!$flag) {
		echo "导入公钥文件失败！";
		exit;
	}
	$merid = $_REQUEST["merid"];
	$orderno = $_REQUEST["orderno"];
	$transdate = $_REQUEST["transdate"];
	$amount = $_REQUEST["amount"];
	$currencycode = $_REQUEST["currencycode"];
	$transtype = $_REQUEST["transtype"];
	$status = $_REQUEST["status"];
	$checkvalue = $_REQUEST["checkvalue"];
	$gateId = $_REQUEST["GateId"];
	$priv1 = $_REQUEST["Priv1"];
	$plain = $merid . $orderno . $amount . $currencycode . $transdate . $transtype . $status . $checkvalue;
	//对订单验证签名
	$flag = verifyTransResponse($merid, $orderno, $amount, $currencycode, $transdate, $transtype, $status, $checkvalue);
	$flag  =  verify($plain, $checkvalue);
	if(!flag) {
		echo "<h2>验证签名失败！</h2>";
		exit;
	}else{
		if ($status == '1001'){
			accountClass::OnlineReturn(array("trade_no"=>$orderno));
			$msg = "支付成功";
			echo "<script>alert('{$msg}');location.href='/?user&q=code/account/log';</script>";
		}else{
			$msg = "支付失败";
			echo "<script>alert('{$msg}');location.href='/?user&q=code/account/log';</script>";
		}
	}
}
?>