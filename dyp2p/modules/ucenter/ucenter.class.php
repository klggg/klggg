<?php
/******************************
 * $File: ucenter.class.php
 * $Description: 数据库处理文件
 * $Author: hummer 
 * $Time:2010-03-09
 * $Update:None 
 * $UpdateDate:None 
******************************/

require_once(ROOT_PATH.'modules/ucenter/config.inc.php');//
require_once(ROOT_PATH.'modules/ucenter/include/db_mysql.class.php');//
require_once(ROOT_PATH.'modules/ucenter/uc_client/client.php');//

class ucenterClass{
	
	const ERROR = '操作有误，请不要乱操作';

	/**
	 * 列表
	 *
	 * @return Array
	 */
	function Manage($data = array()){
		global $mysql;
		foreach ($data as $key => $value){
			$sql = "select 1 from `{ucenter_set}` where `key`='{$key}'";
			$_result = $mysql->db_fetch_array($sql);
			if ($_result==false){
				$sql = "insert into `{ucenter_set}` set `key`='{$key}',`value`='{$value}'";
				$mysql->db_query($sql);			
			}else{
				$sql = "update `{ucenter_set}` set `key`='{$key}',`value`='{$value}' where `key`='{$key}'";
				$mysql->db_query($sql);			
			}
		
		}
		return true;
	}
	
	function GetList(){
		global $mysql;
		$sql = "select * from `{ucenter_set}` ";
		$result = $mysql->db_fetch_arrays($sql);
		foreach ($result as $key => $value){
			$_result[$value['key']] = $value['value'];
		
		}
		return $_result;
	
	}
	
	function GetStatus(){
		global $mysql;
		$sql = "select `value` from `{ucenter_set}` where `key`='uc_status' ";
		$result = $mysql->db_fetch_array($sql);
		return $result['value'];
	}
	
	function UcenterReg($data){
		global $db_config;
		$db = new dbstuff;
		$db->connect(UC_DBHOST, UC_DBUSER,UC_DBPW, UC_DBNAME,0);
		
		$uid = uc_user_register($data['username'], $data['password'], $data['email']);
		
		if($uid <= 0) {
		return $uid;
		/*	if($uid == -1) {
				return '用户名不合法';
			} elseif($uid == -2) {
				return '包含要允许注册的词语';
			} elseif($uid == -3) {
				return '用户名已经存在';
			} elseif($uid == -4) {
				return 'Email 格式有误';
			} elseif($uid == -5) {
				return 'Email 不允许注册';
			} elseif($uid == -6) {
				return '该 Email 已经被注册';
			} else {
				return '未定义';
			}*/
		} else {
			$username = $data['username'];
			//激活
			$sql = "insert into ".UC_DZTABLEPRE."common_member set regdate='".time()."',uid='{$uid}',email='".$data['email']."',username='".$data['username']."',password='".md5($password)."',status='0',emailstatus='0',avatarstatus='0' " ;
			$db->query($sql);
			$sql = "insert into ".UC_DZTABLEPRE."common_member_field_forum set uid='{$uid}',customshow ='26' " ;
			$db->query($sql);
			$sql = "insert into ".UC_DZTABLEPRE."common_member_field_home set uid='{$uid}' " ;
			$db->query($sql);
			$sql = "insert into ".UC_DZTABLEPRE."common_member_count set uid='{$uid}' " ;
			$db->query($sql);
		}
		unset($db);
		$mysql = new Mysql($db_config);
		if ($uc_user_id>0){
			$sql = "insert into `{ucenter}`(user_id,uc_user_id) values({$data['user_id']}, {$uid})";
			$mysql->db_query($sql);
		}
		return $uid;
	}
	
	function UcenterLogin($data){
		global $db_config;
		$db = new dbstuff;

		$result = $db->connect(UC_DBHOST, UC_DBUSER,UC_DBPW, UC_DBNAME,0);

		list($uid, $username, $password, $email) = uc_user_login($data['username'], $data['password']);
		if ($uid<0){
			$_data['email'] = $data['email'];
			$_data['username'] = $data['username'];
			$_data['password'] = $data['password'];
			$_data['user_id'] = $data['user_id'];
			$uid = self::UcenterReg($_data);
			if ($uid>0){
				$mysql = new Mysql($db_config);
				$sql = "select 1 from `{ucenter}` where user_id='{$data['user_id']}'";
				$result = $mysql->db_fetch_array($sql);
				if ($result==false){
						$sql = "insert into `{ucenter}`(user_id,uc_user_id) values({$data['user_id']}, {$uid})";
						$mysql->db_query($sql);
				}
			}else{
			//注册失败
				return '';
				}
			return self::UcenterLogin($data);
		}else{
		
		
			$ucsynlogin = uc_user_synlogin($uid);
			
		}
		$mysql = new Mysql($db_config);
		return $ucsynlogin;
	}
	
	function UcenterLogout($uid){
		global $db_config;
		$db = new dbstuff;
		$result = uc_user_synlogout();
		unset($db);
		$mysql = new Mysql($db_config);
		return $result;
	}
	
	
	function UcenterPwd($data){
		global $db_config;
	
		$db = new dbstuff;
	if($data['ignoreoldpw']==1){
	$ignoreoldpw=1;
	}else{
	$ignoreoldpw=0;
	}
						
		$result = uc_user_edit($data['username'], $data['oldpassword'], $data['newpassword'],$data['email'], $ignoreoldpw , "" , "") ;
		$mysql = new Mysql($db_config);
		return $result;
	}
}
?>