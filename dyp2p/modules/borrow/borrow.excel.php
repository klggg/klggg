<?
/******************************
 * $File: borrow.excel.php
 * $Description: 借款导出
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

require_once("borrow.model.php");

class borrowexcel {
	
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
	function LogList($data){
		$title = array("Id","用户名","交易号","类型","操作金额","备注","添加时间");
		if ($data['style']=="fxc"){
			$name="风险池";
		}else{
			$name="账号信息";
		}
		if ($data['page']>0){
			$_result = accountClass::GetLogList($data);
			$result  = $_result['list'];
		}else{
			$data['limit'] = "all";
			$result = accountClass::GetLogList($data);
		}
		foreach ($result as $key => $value){
			$_data[$key] = array($key+1,$value['username'],$value['nid'],$value['type'],$value['money'],$value['remark'],date("Y-m-d H:i:s",$value['addtime']));
		}
		exportData($name."管理",$title,$_data);
		exit;
	}
	
}
?>