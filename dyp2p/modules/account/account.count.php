<?php
//借款的统计
class accountCountClass
{
	
	
	/**
	 * 统计所有用户的资金记录
	 *
	 * @return Array
	 */
	public static function GetAccoutAll($data = array()){
		global $mysql;
		$sql = "select sum(use_money) as use_money_all,sum(no_use_money) as no_use_money_all,sum(collection) as collection_all,sum(total) as total_all from `{account}`";
		$result = $mysql->db_fetch_array($sql);
		return $result;
	}
	
	
	/**
	 * 统计资金记录的全部
	 *
	 * @return Array
	 */
	public static function GetAccoutLogAll($data = array()){
		global $mysql;
		$sql = "select sum(p1.money) as account,count(1) as num,p1.type,p2.name as type_name from `{account_log}` as p1 left join `{linkage}` as p2 on p1.type=p2.value where p2.type_id=30  group by  p1.type ";
		$result = $mysql->db_fetch_arrays($sql);
		if ($result!=false){
			foreach ($result as $key => $value){
				$_result[$value['type']] = $value['account'];
			}
		}	
		$_result["tender_recover"]  = $_result["tender_success_frost"]-$_result["tender_success"] ;
		return $_result;
	}
	
	function GetRechargeCount($data=array()){
		global $mysql;
		if (IsExiest($data['user_id'])!=false) {
			$_sql = " and p1.user_id = {$data['user_id']}";
		}
		$sql = "select sum(p1.money) as account,count(1) as num,p1.type from `{account_recharge}` as p1 where p1.status=1  $_sql group by  p1.type ";
		$result = $mysql->db_fetch_arrays($sql);
		if ($result!=false){
			foreach ($result as $key => $value){
				if ($value['type']==2){
					$_result['recharge_all_down'] += $value['account'];
				}elseif ($value['type']==1){
					$_result['recharge_all_up'] += $value['account'];
				}else{
					$_result['recharge_all_other'] += $value['account'];
				}
				$_result['recharge_all'] += $value['account'];
			}
		}	
		return $_result;
	
	}
	
	
	function GetCashCount(){
		global $mysql;
		$sql = "select sum(p1.total) as account,sum(p1.credited) as credited_all,sum(p1.fee) as fee_all,count(1) as num from `{account_cash}` as p1 where p1.status=1  ";
		$result = $mysql->db_fetch_arrays($sql);
		
		return $result;
	
	}
	
}
?>
