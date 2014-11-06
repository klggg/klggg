<?php
/******************************
 * $File: attestations.class.php
 * $Description: Ö¤Ã÷²ÄÁÏÀàÎÄ¼þ¹ÜÀí
******************************/

if (!defined('ROOT_PATH'))  /*die('²»ÄÜ·ÃÎÊ')*/echo "<script>window.location.href='/404.htm';</script>";//·ÀÖ¹Ö±½Ó·ÃÎÊ

require_once("attestations.model.php");

class attestationsClass{

	

	function attestationsClass(){
		
	
	}
	/**
	 * 1,Ìí¼ÓÖ¤Ã÷×ÊÁÏ
	 *
	 * @param array $data =array("name"=>"Ö¤Ã÷×ÊÁÏÃû³Æ","status"=>"×´Ì¬","degree"=>"Ñ§Àú","in_year"=>"ÈëÑ§Ê±¼ä","professional"=>"×¨Òµ");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function AddAttestationsType($data = array()){
		global $mysql;
		 //ÅÐ¶ÏÃû³ÆÊÇ·ñ´æÔÚ
        if (!IsExiest($data['name'])) {
            return "attestations_type_name_empty";
        }
		 //ÅÐ¶Ï±êÊ¶ÃûÊÇ·ñ´æÔÚ
        if (!IsExiest($data['nid'])) {
            return "attestations_type_nid_empty";
        }
		//ÅÐ¶Ï±êÊ¶ÃûÊÇ·ñ´æÔÚ
		$sql = "select 1 from `{attestations_type}` where nid='{$data['nid']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=false) return "attestations_type_nid_exiest";
		
		$sql = "insert into `{attestations_type}` set addtime='".time()."',addip='".ip_address()."',";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql));
    	return $mysql->db_insert_id();
	}
	
	function AddAttestationsStudy($data = array()){
		global $mysql;
		if (!IsExiest($data['user_id'])) return false;
		if (!IsExiest($data['nid'])) return false;
		if (!IsExiest($data['code'])) return false;
		if (!IsExiest($data['type'])) return false;
		$sql="select * from `{credit_log}` where user_id={$data['user_id']} and type='{$data['type']}'";
		$result=$mysql->db_fetch_array($sql);
		if ($result==false){
			$credit_log['user_id'] = $data['user_id'];
			$credit_log['nid'] = $data['nid'];
			$credit_log['code'] = $data['code'];
			$credit_log['type'] = $data['type'];
			$credit_log['addtime'] = time();
			$credit_log['article_id'] =$data['user_id'];
			$credit_log['remark'] = "Í¨¹ýÑ§Ï°²âÊÔ»ñµÃµÄ»ý·Ö";
			creditClass::ActionCreditLog($credit_log);
		}
		if ($data['type']=="tender_study"){
			$sql="update `{users_info}` set `tender_status`=1 where `user_id` = {$data['user_id']}";
			$mysql->db_query($sql);
		}
    	return true;
	}
	
	/**
	 * 2,ÐÞ¸ÄÖ¤Ã÷×ÊÁÏ
	 *
	 * @param array $data =array("id"=>"id","name"=>"Ãû³Æ","status"=>"×´Ì¬");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function UpdateAttestationsType($data = array()){
		global $mysql;
		
		 //ÅÐ¶ÏÃû³ÆÊÇ·ñ´æÔÚ
        if (!IsExiest($data['name'])) {
            return "attestations_type_name_empty";
        }
		 //ÅÐ¶Ï±êÊ¶ÃûÊÇ·ñ´æÔÚ
        if (!IsExiest($data['nid'])) {
            return "attestations_type_nid_empty";
		}
		
		//ÅÐ¶Ï±êÊ¶ÃûÊÇ·ñ´æÔÚ
		$sql = "select 1 from `{attestations_type}` where nid='{$data['nid']}' and id!={$data['id']}";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=false) return "attestations_type_nid_exiest";
		
		$sql = "update `{attestations_type}` set ";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql)." where id='{$data['id']}' ");
		return $data['id'];
	}
	
	/**
	 * 3,É¾³ýÖ¤Ã÷×ÊÁÏ
	 *
	 * @param Array $data = array("id"=>"ID")
	 * @return Boolen
	 */
	function DelAttestationsType($data = array()){
		global $mysql;
		
		if (!IsExiest($data['id'])) return "attestations_type_id_empty";
		
		$sql = "select 1 from `{attestations}` where type_id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result != false) return "attestations_type_upfiles_exiest";
		
		$sql = "delete from `{attestations_type}`  where id='{$data['id']}'";
    	$mysql -> db_query($sql);
		
		return $data['id'];
	}
	
	
	
	
	/**
	 * 5,»ñµÃÖ¤Ã÷×ÊÁÏÁÐ±í
	 *
	 * @return Array
	 */
	function GetAttestationsTypeList($data = array()){
		global $mysql;
		
		$_sql = " where 1=1 ";
		$_select = " p1.*";
		$_order = " order by p1.id desc";
		$sql = "select SELECT from `{attestations_type}` as p1  SQL ORDER ";
		
		//ÊÇ·ñÏÔÊ¾È«²¿µÄÐÅÏ¢
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//ÅÐ¶Ï×ÜµÄÌõÊý
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//·ÖÒ³·µ»Ø½á¹û
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data["epage"] * ($data["page"] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//·µ»Ø×îÖÕµÄ½á¹û
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	
	
	/**
	 * 6,»ñµÃÖ¤Ã÷×ÊÁÏµÄµ¥Ìõ¼ÇÂ¼
	 *
	 * @param Array $data = array("id"=>"");
	 * @return Array
	 */
	 function GetAttestationsTypeOne($data = array()){
		global $mysql;
		if (!IsExiest($data['id'])) return "attestations_type_id_empty";
		
		$sql = "select p1.* from `{attestations_type}` as p1   where p1.id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		
		if ($result==false) return "attestations_type_empty";
		return $result;
	}
	
	
	/**
	 * 5,»ñµÃÓÃ»§Ö¤Ã÷×ÊÁÏÁÐ±í
	 *
	 * @return Array
	 */
	function GetAttestationsUserid($data = array()){
		global $mysql;
		
		
		$_sql = " where 1=1 ";
		
		//ËÑË÷ÓÃ»§id
        if (IsExiest($data['user_id'])!=false) {
            $_sql .= " and p2.user_id ='{$data['user_id']}'";
        }
		
		//ËÑË÷ÓÃ»§Ãû
		elseif (IsExiest($data['username'])!=false) {
            $_sql .= " and p2.username = '{$data['username']}'";
        }
		
		//ËÑË÷ÓÃ»§Ãû
		elseif (IsExiest($data['email'])!=false) {
            $_sql .= " and p2.email = '{$data['email']}'";
        }
		
		$sql = "select p2.user_id from `{users}` as p2 {$_sql}";
		$result = $mysql -> db_fetch_array($sql);
		if ($result == false  || (!IsExiest($data['username']) && !IsExiest($data['user_id']) && !IsExiest($data['email']))){
			return "attestations_user_not_exiest";
		}
		return $result['user_id'];
	}
	
	
	function AddAttestations($data){
		global $mysql;
		if ($data["pic_result"]=="") return "";
		foreach ($data["pic_result"] as $key => $value){
		   $attestations_type = $mysql->db_fetch_array("select credit from {attestations_type} where id='{$data['type_id']}'");


		    $value['order'] = intval($value['order']);
	
			$sql = "insert into `{attestations}` set addtime='".time()."',addip='".ip_address()."',user_id='{$data['user_id']}',upfiles_id='{$value['upfiles_id']}',`order`='{$value['order']}',type_id='{$data['type_id']}', credit='".$attestations_type['credit']."'";
			$mysql->db_query($sql);
		
		}
		
		return $data['type_id'];
	}
	
	
	function GetAttestationsList($data = array()){
		global $mysql;
		
		
		$_sql = " where 1=1 ";
		
		//ËÑË÷ÓÃ»§id
        if (IsExiest($data['user_id'])!=false) {
            $_sql .= " and p1.user_id ='{$data['user_id']}'";
        }
		
		//ËÑË÷ÓÃ»§id
        if (IsExiest($data['type_id'])!=false) {
            $_sql .= " and p1.type_id in ({$data['type_id']}) ";
        }
		
		//ËÑË÷ÓÃ»§id
        if (IsExiest($data['status'])!=false) {
            $_sql .= " and p1.status = '{$data['status']}'";
        }
		
		//ËÑË÷ÓÃ»§Ãû
		if (IsExiest($data['username'])!=false) {
            $_sql .= " and p2.username like '%{$data['username']}%'";
        }
		
		$_select = " p1.*,p2.username,p3.name as type_name,p3.validity,p4.fileurl,p4.name,p4.contents";
		$_order = " order by p1.id desc";
		$sql = "select SELECT from `{attestations}` as p1 left join `{attestations_type}` as p3 on p1.type_id=p3.id left join `{users}` as p2 on p1.user_id=p2.user_id left join `{users_upfiles}` as p4 on p1.upfiles_id=p4.id SQL"; 
		if (IsExiest($data['group'])!=false) {
            $sql .= " group by p1.type_id ORDER LIMIT";
        }else{
            $sql .= " ORDER LIMIT";
		}
		
		//ÊÇ·ñÏÔÊ¾È«²¿µÄÐÅÏ¢
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			$result = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
			foreach ($result as $key => $value){
				$endtime = strtotime("{$value['validity']} month",$value['addtime']);
				if ($value['validity']>0){
					if ($endtime>time()){
					$result[$key]['validity_time'] = $endtime;
					}else{
					$result[$key]['validity_time'] =-1;
					$result[$key]['credit'] =0;
					}
				}else{
					$result[$key]['validity_time'] =0;
				}
			}
			return $result;
		}			 
		
		//ÅÐ¶Ï×ÜµÄÌõÊý
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//·ÖÒ³·µ»Ø½á¹û
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data["epage"] * ($data["page"] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		foreach ($list as $key => $value){
			if ($value['validity']>0){
				//$list[$key]['validity_time'] = strtotime("{$value['validity']} month",$value['addtime']);
				$list[$key]['validity_time'] = 2;
			}
		}
		//·µ»Ø×îÖÕµÄ½á¹û
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	
	/**
	 * 6,»ñµÃÖ¤Ã÷×ÊÁÏµÄµ¥Ìõ¼ÇÂ¼
	 *
	 * @param Array $data = array("id"=>"");
	 * @return Array
	 */
	 function GetAttestationsOne($data = array()){
		global $mysql;
		if (!IsExiest($data['id'])) return "attestations_id_empty";
		
		$_select = " p1.*,p2.username,p3.name as type_name,p4.fileurl,p4.name,p4.contents,p4.addtime";
		$sql = "select {$_select} from `{attestations}` as p1 left join `{attestations_type}` as p3 on p1.type_id=p3.id left join `{users}` as p2 on p1.user_id=p2.user_id left join `{users_upfiles}` as p4 on p1.upfiles_id=p4.id where p1.id={$data['id']}";
		$result = $mysql->db_fetch_array($sql);
		
		if ($result==false) return "attestations_empty";
		
		$result["default"] = 0;
		if ($result["litpic"]==$result["id"]){
			$result["default"] = 1;
		}
		return $result;
	}
	
	/**
	 * 2,ÐÞ¸ÄÖ¤Ã÷×ÊÁÏ
	 *
	 * @param array $data =array("id"=>"id","name"=>"Ãû³Æ","status"=>"×´Ì¬");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function UpdateAttestations($data = array()){
		global $mysql;
		
		//id
		if (!IsExiest($data['id'])) return "attestations_id_empty";
		if (!IsExiest($data['upfiles_id'])) return "attestations_upfilesid_empty";
		
         //ÅÐ¶ÏÃû³ÆÊÇ·ñ´æÔÚ
        if (!IsExiest($data['name'])) {
            return "attestations_name_empty";
        }
        $data['order'] = intval($data['order']);
		$sql = "update `{attestations}` set `type_id` = '{$data['type_id']}',`order` = '{$data['order']}' where id='{$data['id']}'  and user_id='{$data['user_id']}'";
		
		$mysql->db_query($sql);
		$id = $data['id'];
		$type_id = $data['type_id'];
		$upfiles_id = $data['upfiles_id'];
		unset($data['id']);
		unset($data['order']);
		unset($data['type_id']);
		unset($data['upfiles_id']);
		if ($data['default']==1){
			$sql = " update `{attestations}` set litpic={$id} where id='{$type_id}'";
			$mysql->db_query($sql);
		}
		unset($data['default']);
		$sql = "update `{users_upfiles}` set updatetime='".time()."',updateip='".ip_address()."',";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql)." where id='{$upfiles_id}' and user_id='{$data['user_id']}'");
		return $id;
	}
	
	/**
	 * 3,É¾³ýÖ¤Ã÷×ÊÁÏ
	 *
	 * @param Array $data = array("id"=>"ID")
	 * @return Boolen
	 */
	function DelAttestations($data = array()){
		global $mysql,$upload;
		
		if (!IsExiest($data['id'])) return "attestations_id_empty";
		
		$sql = "select 1 from `{attestations}` where id='{$data['id']}' and user_id='{$data['user_id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result == false) return "ablums_upfiles_not_exiest";
		
		$_data['user_id'] = $result["user_id"];
		$_data['id'] = $result["upfiles_id"];
		$upload->Delete($_data);
		$sql = "delete from `{attestations}` where id='{$data['id']}'  and user_id='{$data['user_id']}'";
		$mysql->db_query($sql);
		return $data['id'];
	}
	
		/**
	 *4,ÉóºËÖ¤Ã÷×ÊÁÏ
	 *
	 * @param Array $data = array("id"=>"");
	 * @return id
	 */
	 function CheckAttestations($data = array()){
		global $mysql;
		echo "<script>alert({$data})</script>";
		if (!IsExiest($data['id'])) return "attestations_id_empty";
		$sql = "select p1.*,p2.username from `{attestations}` as p1  left join `{users}` as p2 on p1.user_id=p2.user_id where id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false) return "attestations_empty";


		$data['verify_userid'] = intval($data['verify_userid']);
		$sql = "update `{attestations}` set verify_userid='{$data['verify_userid']}',verify_remark='{$data['verify_remark']}', verify_time='".time()."',status='{$data['status']}' where id='{$data['id']}'";
		$mysql->db_query($sql);
		
		//¼ÓÈëÉóºË¼ÇÂ¼
		$_data["user_id"] = $result["user_id"];
		$_data["result"] = $data["status"];
		$_data["code"] = "attestations";
		$_data["type"] = "attestation";
		$_data["article_id"] = $data["id"];
		$_data["verify_userid"] = $data["verify_userid"];
		$_data["remark"] = $data["verify_remark"];
		usersClass::AddExamine($_data);
		return $data['id'];
	}
	
		/**
	 *4,ÉóºËÖ¤Ã÷×ÊÁÏ
	 *
	 * @param Array $data = array("id"=>"");
	 * @return id
	 */
	 function CheckCreditAttestations($data = array()){
		global $mysql;
		if (!IsExiest($data['id'])) return "attestations_id_empty";
		if (!IsExiest($data['type_id'])) return "attestations_type_id_empty";
		$_credit = array_sum($data['credit']);
		$sql = "select credit from `{attestations_type}` where id='{$data['type_id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result['credit']<$_credit) return "attestations_credit_most";
		foreach ($data['id'] as  $key => $value){

			$data['user_id'] = intval($data['user_id']);
			$sql = "update `{attestations}` set credit='{$data['credit'][$key]}',verify_remark='{$data['verify_remark'][$key]}',status='{$data['status'][$key]}',verify_userid='{$data['user_id']}',verify_time='".time()."' where id='{$value}'";
			$mysql->db_query($sql);
		}
		//¼ÓÈëÉóºË¼ÇÂ¼
		$_data["user_id"] = $result["user_id"];
		$_data["result"] = $data["status"];
		$_data["code"] = "attestations";
		$_data["type"] = "attestation";
		$_data["article_id"] = join(",",$data["id"]);
		$_data["verify_userid"] = $data["verify_userid"];
		$_data["remark"] = $data["verify_remark"];
		usersClass::AddExamine($_data);
		return $data['id'];
	}
	
		/**
	 *4,ÉóºËÖ¤Ã÷×ÊÁÏ
	 *
	 * @param Array $data = array("id"=>"");
	 * @return id
	 */
	 function GetAttestationsCredit($data = array()){
	 	global $mysql;
		$_sql = " where 1=1 ";
		
		//ËÑË÷ÓÃ»§id
        if (IsExiest($data['user_id'])!=false) {
            $_sql .= " and p1.user_id ='{$data['user_id']}'";
        }
		
		//ËÑË÷ÓÃ»§id
        if (IsExiest($data['type_id'])!=false) {
            $_sql .= " and p1.type_id ='{$data['type_id']}'";
        }
        
		//echo "<script>alert('".$_sql."');</ script>";
		
		$sql = "select p1.credit,p1.addtime,p2.validity from `{attestations}`  as p1 left join `{attestations_type}` as p2 on p1.type_id=p2.id {$_sql}";
		//select p1.credit,p1.addtime,p2.validity from `{attestations}`  as p1 left join `{attestations_type}` as p2 on p1.type_id=p2.id where 1=1  and p1.user_id ='13'
		$result = $mysql->db_fetch_arrays($sql);
		$num = 0;
		foreach ($result as $key => $value){
			$_time = strtotime("{$value['validity']} month",$value['addtime']);
			
			if ($value['validity']==0 || $_time>time()){
				$num += $value['credit'];
			}
		}
		//echo "<script>alert('".$num."');</s cript>";
		return $num;
	 
	 }
	 
	 	/**
	 *4,ÉóºËÖ¤Ã÷×ÊÁÏ
	 *
	 * @param Array $data = array("id"=>"");
	 * @return id
	 */
	 function GetAttestationsUserCredit($data = array()){
	 	global $mysql;
		$_sql = " where 1=1 ";
		
		//ËÑË÷ÓÃ»§id
        if (IsExiest($data['user_id'])!=false) {
            $_sql .= " and p1.user_id ='{$data['user_id']}'";
        }
		
		$_result = array();
		//ËÑË÷ÓÃ»§id
        if (IsExiest($data['type_id'])!=false) {
            $_sql .= " and p1.type_id ='{$data['type_id']}'";
        }
		$result = self::GetAttestationsTypeList(array("limit"=>"all"));
		foreach ($result as $key=>$value){
			$_result [$value["nid"]]['num'] = 0;
			$_result [$value["nid"]]['name'] = $value['name'];
		}
		$sql = "select p1.type_id,p1.credit,p1.addtime,p1.status,p2.nid,p2.validity,p2.name as type_name from `{attestations}`  as p1 left join `{attestations_type}` as p2 on p1.type_id=p2.id {$_sql} ";
		$result = $mysql->db_fetch_arrays($sql);
		if ($result !=false){
			foreach($result as $key =>$value){
				$endtime = strtotime("{$value['validity']} month",$value['addtime']);
				if ($value['validity']==0 || $endtime>time()){
					$_result[$value["nid"]]['num'] +=$value['credit'];
				}else{
					$_result[$value["nid"]]['num'] = 0;
				}
				$_result [$value["nid"]]['name'] = $value['type_name'];
				$_result [$value["nid"]]['status'] = $value['status'];
			}
		}
		return $_result;
		
	 
	 }
	 
	  
	 /**
	 *1,ÉóºËÖ¤Ã÷×ÊÁÏ
	 *
	 * @param Array $data = array("id"=>"");
	 * @return id
	 */
	 function GetAttestationsUser($data = array()){
		global $mysql;
	 	$sql = "select * from `{attestations_user}` where user_id='{$data['user_id']}'";
		$result = $mysql->db_fetch_arrays($sql);
		$user_result = array();
		if ($result!=false) {
			foreach ($result as $key => $value){
				$user_result[$value['type_id']]['status'] = $value['status'];
				$user_result[$value['type_id']]['credit'] = $value['credit'];
			}
		}
		$sql = "select * from `{attestations_type}` ";
		$_result = $mysql->db_fetch_arrays($sql);
		foreach ($_result as $key => $value){
			$_result[$key]['credit'] = 0 ;
			$_result[$key]['status'] = "" ;
			$_result[$key]['upfiles'] = "" ;
			if (isset($user_result[$value['id']])){
				$_result[$key]['status'] = $user_result[$value['id']]['status'];
				$_result[$key]['credit'] = $user_result[$value['id']]['credit'];
				if ($_result[$key]['status']==1){
					$_data = $data;
					$_data['type_id'] =$value['id'];
					$_data['limit'] = "all";
					$_result[$key]['upfiles'] = self::GetAttestationsList($_data);
				}
			}
		}
		return $_result;
	 }
	 
	   
	 /**
	 *1,ÉóºËÖ¤Ã÷×ÊÁÏ
	 * ×´Ì¬ËµÃ÷£º1±íÊ¾ÒÑÍ¨¹ý£¬2±íÊ¾
	 * @param Array $data = array("user_id"=>"ÓÃ»§id"£¬"type_id"=>"ÓÃ»§id");
	 * @return id
	 */
	 function ActionAttestationsUser($data = array()){
	 	global $mysql;
		if (!IsExiest($data['user_id'])) return "attestations_user_id_empty";
		if (!IsExiest($data['type_id'])) return "attestations_type_id_empty";
		$sql = "select 1 from `{attestations_user}` where type_id = '{$data['type_id']}' and user_id='{$data['user_id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result == false) {
			$sql = "insert into `{attestations_user}` set user_id='{$data['user_id']}',type_id='{$data['type_id']}'";
			$mysql->db_query($sql);
		}
		$sql = "update `{attestations_user}` set  ";
		$_sql = array();
		foreach($data as $key => $value){
			$_sql[] = $key."='".$value."'"; 
		}
		$sql .= join(",",$_sql)." where type_id = '{$data['type_id']}' and user_id='{$data['user_id']}'";
		$mysql->db_query($sql);
		return $data['user_id'];
	 }
}
?>