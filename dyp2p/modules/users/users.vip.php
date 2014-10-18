<?
/******************************
 * $File: users.vip.php
 * $Description: 用户vip的管理中心
 * $Author: hummer 
 * $Time:2010-08-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

class usersvipClass  {
	
	function usersvipClass(){
		//连接数据库基本信息
		
        
	}
	
	
	/**
     * 18，获取管理员管理的信息（users_adminlog）
     * @param $param array('user_id' => '会员ID')
	 * @return Array（'list'=>"列表",page=>'当前页面','epage'=>'页数','total_page'=>'总页面'）
     */
	function GetUsersVipList($data){
		global $mysql;
		$_sql = " where 1=1 ";
		//判断用户id
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and p1.`user_id`  = '{$data['user_id']}'";
		}
		
		//判断是否搜索用户名
		if (IsExiest($data['username']) != false){
			$_sql .= " and p2.`username` like '%".urldecode($data['username'])."%'";
		}
		
		//判断是否搜索类型
		if (IsExiest($data['vip_type']) != false){
			$_sql .= " and p1.`vip_type` = '{$data['vip_type']}'";
		}
		
		//判断是否搜索邮箱
		if (IsExiest($data['status']) != false || $data['status']=="0"){
			$_sql .= " and p1.`status` = '{$data['status']}'";
		}
		
		if (IsExiest($data['dotime1']) != false){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p1.first_date > ".get_mktime($dotime1);
			}
		}
		
		if (IsExiest($data['dotime2'])!=false){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.first_date < ".get_mktime($dotime2);
			}
		}
		
		
		$_select = "p1.*,p2.username,p3.adminname";
		$_order = " order by id desc";
		$sql = "select SELECT from `{users_vip}` as p1 left join `{users}` as p2 on p1.user_id=p2.user_id left join `{users_admin}` as p3 on p1.kefu_userid=p3.user_id SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}
	
	
	
	public static function GetUsersVip($data = array()){
		global $mysql;
		if (IsExiest($data['user_id'])=="") return false;
		$sql = "select p1.*,p2.adminname,p3.username from `{users_vip}` as p1 left join `{users_admin}` as p2 on p1.kefu_userid=p2.user_id left join `{users}` as p3 on p1.user_id=p3.user_id where p1.user_id={$data['user_id']}";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$sql = "insert into `{users_vip}` set user_id={$data['user_id']}";
			$mysql->db_query($sql);
			self::GetUsersVip($data);
		}else{
			if ($result["status"]==1){
				if ($result["end_date"]!="" && $result["end_date"] < time()){
					$result["status"] = 3;
				}
			}
			return $result;
		}
	}
	
	public static function GetUsersVipStatus($data = array()){
		global $mysql;
		if (IsExiest($data['user_id'])=="") return false;
		$result = self::GetUsersVip($data);
		$status = $result["status"];
		if ($result["status"]==1){
			if ($result["end_date"]!="" && $result["end_date"] < time()){
				$status = 3;
			}
		}
		
		return $status;
	}
	
	
	public static function UsersVipApply($data = array()){
		global $mysql;
		if (IsExiest($data['user_id'])=="") return false;
		$result = self::GetUsersVip($data);
		if ($result["status"]==1){
			return "vip_status_yes";
		}else{
		    if(isset($data['vip_time']) && $data['vip_time']>0){
			$vip_time=$data['vip_time']*30;
			$years=$data['vip_time'];
		    }else{
			$vip_time=365;
			$years=12;
			}
			$sql = "update `{users_vip}` set years={$years},`addtime` = '".time()."',`addip` = '".ip_address()."',kefu_userid='{$data['kefu_userid']}',remark='{$data['remark']}',money='{$data['money']}',vip_type='{$data['vip_type']}',first_date='".time()."',end_date='".(time()+60*60*24*$vip_time)."',status=1 where user_id='{$data['user_id']}'";
			return $mysql->db_query($sql);
		}
	}
	
	public static function UpdateUsersVipKefu($data = array()){
		global $mysql;
		if (IsExiest($data['user_id'])=="") return false;
		
		$sql = "update `{users_vip}` set kefu_userid='{$data['kefu_userid']}' where user_id='{$data['user_id']}'";
		return $mysql->db_query($sql);
		
	}
	
	public static function CheckUsersVip($data = array()){
		global $mysql;
		if (IsExiest($data['user_id'])=="") return false;
		$result = self::GetUsersVip($data);
		if ($result["status"]==1){
			return "users_vip_status_yes";
		}else{
			$sql = "update `{users_vip}` set status={$data['status']},kefu_userid='{$data['kefu_userid']}',years={$data['years']},verify_userid={$data['verify_userid']},first_date='".time()."',end_date='".(time()+60*60*24*365)."',verify_time='{$data['verify_time']}',verify_remark='{$data['verify_remark']}' where user_id='{$data['user_id']}'";
			$mysql->db_query($sql);
			return $data['user_id'];
		}
	}
	
	
	public static function UpdateUsersVipMoney($data = array()){
		global $mysql;
		if (IsExiest($data['user_id'])=="") return false;
		
		$sql = "update `{users_vip}` set `money`={$data['money']} where user_id='{$data['user_id']}'";
		return $mysql->db_query($sql);
		
	}
}
?>