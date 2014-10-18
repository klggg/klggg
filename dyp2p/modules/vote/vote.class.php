<?php
/******************************
 * $File: vote.class.php
 * $Description: 投票管理
 * $Author: hummer 
 * $Time:2011-08-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

require_once("vote.model.php");

class voteClass {
	
	
	
	/**
	 * 1,创建投票
	 *
	 * @param array $data =array("name"=>"名称","status"=>"状态");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function AddVote($data = array()){
		global $mysql;
		 //判断名称是否存在
        if (!IsExiest($data['title'])) {
            return "vote_title_empty";
        }
		
		$sql = "insert into `{vote}` set addtime='".time()."',addip='".ip_address()."',";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql));
    	$id = $mysql->db_insert_id();
		
		return $id;
	}
	
	/**
	 * 2,修改投票
	 *
	 * @param array $data =array("id"=>"id","name"=>"名称","status"=>"状态");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function UpdateVote($data = array()){
		global $mysql;
		
		 //判断名称是否存在
        if (!IsExiest($data['title'])) {
            return "vote_title_empty";
        }
		
		$sql = "update `{vote}` set ";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql)." where  id='{$data['id']}' ");
		
		
		return $data['id'];
	}
	
	/**
	 * 3,删除投票类型
	 *
	 * @param Array $data = array("id"=>"ID")
	 * @return Boolen
	 */
	function DeleteVote($data = array()){
		global $mysql,$upload;
		
		if (!IsExiest($data['id'])) return "vote_id_empty";
		
		$sql = "select 1 from `{vote_answer}` where vote_id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result != false) return "vote_answer_exiest";
		
		
		$sql = "delete from `{vote}`  where  id='{$data['id']}'";
    	$mysql -> db_query($sql);
		
		return $data['id'];
	}
	
	
	
	
	/**
	 * 5,获得投票列表
	 *
	 * @return Array
	 */
	function GetVoteList($data = array()){
		global $mysql;
		
		$_sql = " where 1=1 ";
		
		if (isset($data['status']) && ($data['status']!="" || $data['status']=="0")){
			$_sql .= " and p1.status='{$data['status']}'";
		}
		if (isset($data['type_id']) && $data['type_id']!=""){
			$_sql .= " and p1.type_id='{$data['type_id']}'";
		}
		
		$_select = " p1.*,p2.name as type_name";
		$_order = " order by p1.id asc";
		$sql = "select SELECT from `{vote}` as p1 left join `{vote_type}` as p2 on p1.type_id = p2.id   SQL ORDER LIMIT";
		
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
		$_limit = " limit ".($data["epage"] * ($data["page"] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	
	
	/**
	 * 6,获得投票的单条记录
	 *
	 * @param Array $data = array("id"=>"");
	 * @return Array
	 */
	 function GetVoteOne($data = array()){
		global $mysql;
		if (!IsExiest($data['id'])) return "vote_id_empty";
		$_select = " p1.*,p2.name as type_name";
		
		$sql = "select {$_select} from `{vote}` as p1 left join `{vote_type}` as p2 on p1.type_id = p2.id where p1.id='{$data['id']}'";
		
		$result = $mysql->db_fetch_array($sql);
		if ($result==false) return "vote_empty";
		return $result;
	}
	
	
	
	
	/**
	 * 1,创建投票答案
	 *
	 * @param array $data =array("name"=>"名称","status"=>"状态");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function AddVoteAnswer($data = array()){
		global $mysql;
		 //判断名称是否存在
        if (!IsExiest($data['title'])) {
            return "vote_answer_title_empty";
        }
		if (is_array($data['title'])){
			foreach ($data['title'] as $key => $value){
				if ($value!=""){
					$sql = "insert into `{vote_answer}` set title='{$data['title'][$key]}',`order`='{$data['order'][$key]}',`vote_id`='{$data['vote_id']}',status=1,nid='{$data['nid'][$key]}',answer_status='{$data['answer_status'][$key]}'";
					$mysql->db_query($sql);
				}
			}
			return 1;
		}else{
			$sql = "insert into `{vote_answer}` set addtime='".time()."',addip='".ip_address()."',";
			foreach($data as $key => $value){
				$_sql[] = "`$key` = '$value'";
			}
			$mysql->db_query($sql.join(",",$_sql));
			$id = $mysql->db_insert_id();
		}
		
		return $id;
	}
	
	/**
	 * 2,修改投票答案
	 *
	 * @param array $data =array("id"=>"id","name"=>"名称","status"=>"状态");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function UpdateVoteAnswer($data = array()){
		global $mysql;
		
		 //判断名称是否存在
        if (!IsExiest($data['title'])) {
            return "vote_answer_title_empty";
        }
		if (is_array($data['id'])){
			foreach ($data['id'] as $key => $value){
				if ($data['title'][$key]!=""){
					$sql = "update `{vote_answer}` set vote_id='{$data['vote_id']}',title='{$data['title'][$key]}',`order`='{$data['order'][$key]}',nid='{$data['nid'][$key]}',answer_status='{$data['answer_status'][$key]}',status='{$data['status'][$key]}' where id='{$value}'";
					$mysql->db_query($sql);
				}
			}
			return 1;
		}else{
			$sql = "update `{vote_answer}` set ";
			foreach($data as $key => $value){
				$_sql[] = "`$key` = '$value'";
			}
			$mysql->db_query($sql.join(",",$_sql)." where  id='{$data['id']}' ");
		}
		
		return $data['id'];
	}
	
	/**
	 * 3,删除投票答案类型
	 *
	 * @param Array $data = array("id"=>"ID")
	 * @return Boolen
	 */
	function DeleteVoteAnswer($data = array()){
		global $mysql,$upload;
		
		if (!IsExiest($data['id'])) return "vote_answer_id_empty";
		
		$sql = "delete from `{vote_answer}`  where  id='{$data['id']}'";
    	$mysql -> db_query($sql);
		
		return $data['id'];
	}
	
	
	
	
	/**
	 * 5,获得投票答案列表
	 *
	 * @return Array
	 */
	function GetVoteAnswerList($data = array()){
		global $mysql;
		
		$_sql = " where 1=1 ";
		if (isset($data['vote_id']) && $data['vote_id']!=""){
			$_sql .= " and p1.vote_id='{$data['vote_id']}'";
		}
		
		if (isset($data['status']) && ($data['status']!="" || $data['status']=="0")){
			$_sql .= " and p1.status='{$data['status']}'";
		}
		$_select = " p1.*";
		$_order = " order by p1.id asc";
		$sql = "select SELECT from `{vote_answer}` as p1   SQL ORDER LIMIT";
		
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
		$_limit = " limit ".($data["epage"] * ($data["page"] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	
	
	/**
	 * 6,获得投票答案的单条记录
	 *
	 * @param Array $data = array("id"=>"");
	 * @return Array
	 */
	 function GetVoteAnswerOne($data = array()){
		global $mysql;
		if (!IsExiest($data['id'])) return "vote_answer_id_empty";
		$_select = " p1.*";
		
		$sql = "select {$_select} from `{vote_answer}` as p1  where p1.id='{$data['id']}'";
		
		$result = $mysql->db_fetch_array($sql);
		if ($result==false) return "vote_answer_empty";
		return $result;
	}
	
	
	
	/**
	 * 1,投票类型
	 *
	 * @param array $data =array("name"=>"名称","status"=>"状态");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function AddVoteType($data = array()){
		global $mysql;
		 //判断名称是否存在
        if (!IsExiest($data['name'])) {
            return "vote_type_name_empty";
        }
		 //判断标识名是否存在
        if (!IsExiest($data['nid'])) {
            return "vote_type_nid_empty";
        }
		//判断标识名是否存在
		$sql = "select 1 from `{vote_type}` where nid='{$data['nid']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=false) return "vote_type_nid_exiest";
		
		$sql = "insert into `{vote_type}` set addtime='".time()."',addip='".ip_address()."',";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql));
    	return $mysql->db_insert_id();
	}
	
	/**
	 * 2,修改投票类型
	 *
	 * @param array $data =array("id"=>"id","name"=>"名称","status"=>"状态");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function UpdateVoteType($data = array()){
		global $mysql;
		
		 //判断名称是否存在
        if (!IsExiest($data['name'])) {
            return "vote_type_name_empty";
        }
		 //判断标识名是否存在
        if (!IsExiest($data['nid'])) {
            return "vote_type_nid_empty";
		}
		
		//判断标识名是否存在
		$sql = "select 1 from `{vote_type}` where nid='{$data['nid']}' and id!={$data['id']}";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=false) return "vote_type_nid_exiest";
		
		$sql = "update `{vote_type}` set ";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql)." where id='{$data['id']}' ");
		return $data['id'];
	}
	
	/**
	 * 3,删除投票类型
	 *
	 * @param Array $data = array("id"=>"ID")
	 * @return Boolen
	 */
	function DeleteVoteType($data = array()){
		global $mysql;
		
		if (!IsExiest($data['id'])) return "vote_type_id_empty";
		
		$sql = "select 1 from `{vote}` where type_id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result != false) return "vote_type_vote_exiest";
		
		$sql = "delete from `{vote_type}`  where id='{$data['id']}'";
    	$mysql -> db_query($sql);
		
		return $data['id'];
	}
	
	
	
	
	/**
	 * 5,获得投票列表
	 *
	 * @return Array
	 */
	function GetVoteTypeList($data = array()){
		global $mysql;
		
		$_sql = " where 1=1 ";
		$_select = " p1.*";
		$_order = " order by p1.id desc";
		$sql = "select SELECT from `{vote_type}` as p1  SQL ORDER LIMIT";
		
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
		$_limit = " limit ".($data["epage"] * ($data["page"] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	
	
	/**
	 * 6,获得投票的单条记录
	 *
	 * @param Array $data = array("id"=>"");
	 * @return Array
	 */
	 function GetVoteTypeOne($data = array()){
		global $mysql;
		if (!IsExiest($data['id'])) return "vote_type_id_empty";
		
		$sql = "select p1.* from `{vote_type}` as p1   where p1.id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		
		if ($result==false) return "vote_type_empty";
		return $result;
	}
	
}
?>
