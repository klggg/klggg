<?php
/******************************
 * $File: userinfo.class.php
 * $Description: 用户信息数据库处理文件
 * $Author: hummer 
 * $Time:2011-12-16
 * $Update:None 
 * $UpdateDate:None 
******************************/
require_once("userinfo.model.php");
class userinfoClass{
	
	const ERROR = '操作有误，请不要乱操作';

	/**
	 * 用户信息列表
	 * @param $param $data
	 * @return Array ('list'=>"列表",page=>'当前页面','epage'=>'页数','total_page'=>'总页面')
	 */
	function GetList($data = array()){
		global $mysql;
		$user_id = empty($data['user_id'])?"":$data['user_id'];
		$username = empty($data['username'])?"":$data['username'];
	
		
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1 ";		 
		if (!empty($user_id)){
			$_sql .= " and 2.user_id = $user_id";
		}
		if (!empty($username)){
			$_sql .= " and p2.username = '$username'";
		}
		
		$sql = "select SELECT from {user} as p2 
				 left join {userinfo} as p1 on p1.user_id=p2.user_id
				$_sql ORDER LIMIT";
				 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(' p1.*,p2.username ', 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		$vars['building'] = array("house_address","house_area","house_year","house_status","house_holder1","house_holder2","house_right1","house_right2","house_loanyear","house_loanprice","house_balance","house_bank");
		$vars['company'] = array("company_name","company_type","company_industry","company_office","company_jibie","company_worktime1","company_worktime2","company_workyear","company_tel","company_address","company_weburl","company_reamrk");
		$vars['firm'] = array("private_type","private_date","private_place","private_rent","private_term","private_taxid","private_commerceid","private_income","private_employee");
		$vars['finance'] = array("finance_repayment","finance_property","finance_amount","finance_car","finance_caramount","finance_creditcard");
		$vars['contact'] = array("tel","phone","post","address","province","city","area","linkman1","relation1","tel1","phone1","linkman2","relation2","tel2","phone2","linkman3","relation3","tel3","phone3","msn","qq","wangwang");
		$vars['mate'] = array("mate_name","mate_salary","mate_phone","mate_tel","mate_type","mate_office","mate_address","mate_income");
		$vars['edu'] = array("education_record","education_school","education_study","education_time1","education_time2");
		$vars['job'] = array("ability","interest","others","experience");
		foreach ($list as $key => $value){
			foreach ($vars as $_key => $_value){
				$list[$key][$_key.'_status'] =1;
				foreach ($_value as $__key=>$__value){
					if ($value[$__value] == ""){
						$list[$key][$_key.'_status'] =0;
					}
				}
			}
		}
		
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
		
	}
	
	/**
	 * 查看用户信息
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetOne($data = array()){
		global $mysql;
		$user_id = $data['user_id'];
		$sql = "select p1.* ,p2.username,p3.* from {userinfo} as p1 
				  left join {user} as p2 on p1.user_id=p2.user_id  left join `{user_students}` as p3 on p1.user_id=p3.user_id where p1.user_id=$user_id ";
		$result = $mysql->db_fetch_array($sql);
		if ($result == false) return "";
		$var = array();
		$vars['building'] = array("house_address","house_area","house_year");
		$vars['company'] = array("company_name","company_type","company_industry","company_office","company_jibie","company_worktime1","company_worktime2","company_workyear","company_tel","company_address","company_weburl","company_reamrk");
		$vars['firm'] = array("private_type","private_date","private_place","private_rent","private_term","private_taxid","private_commerceid","private_income","private_employee");
		$vars['finance'] = array("finance_repayment","finance_property","finance_amount","finance_car","finance_caramount","finance_creditcard");
		$vars['contact'] = array("tel","phone","post","address","province","city","area","linkman1","relation1","tel1","phone1","qq","wangwang");
		$vars['mate'] = array("mate_name","mate_salary","mate_phone","mate_tel","mate_type","mate_office","mate_address","mate_income");
		$vars['edu'] = array("education_record","education_school","education_study","education_time1","education_time2");
		$vars['job'] = array("ability","interest","others","experience");
		foreach ($vars as $key => $value){
			$result[$key."_status"] = 1;
			foreach ($value as $_key=>$_value){
				if ($result[$_value] == ""){
					$result[$key."_status"] = 0;
				}
			}
		}
		
		return $result;
	}
	
	/**
	 * 添加用户信息
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Add($data = array()){
		global $mysql;
     	 unset($data['type']);
		$sql = "insert into `{userinfo}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
        return $mysql->db_query($sql);
	}
	
	
	/**
	 * 修改用户信息
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Update($data = array()){
		global $mysql;
		 unset($data['type']);
		$user_id = $data['user_id'];
        if ($data['user_id'] == "") {
            return "userinfo_error_user_id_empty";
        }
		$type = $data['type'];
		unset($data['type']);
		if($type=="schoolinfo" || $type=="schooledu"){
			$sql = "select * from `{user_students}` where user_id='{$data['user_id']}'";
			$result = $mysql->db_fetch_array($sql);
			if ($result == false){
				$sql = "insert into `{user_students}` set `addtime` = '".time()."',`addip` = '".ip_address()."',user_id='{$data['user_id']}'";
				$mysql->db_query($sql);
			}
			$sql = "update `{user_students}` set  `updatetime` = '".time()."',`updateip` = '".ip_address()."',";
			foreach($data as $key => $value){
				$_sql[] .= "`$key` = '$value'";
			}
			$sql .= join(",",$_sql)." where user_id = '$user_id'";
			return $mysql->db_query($sql);
			
		}else{
		
			//缓存的信息
			$_sql = "";
			$sql = "insert into `{user_backup}` set  `addtime` = '".time()."',`addip` = '".ip_address()."',";
			foreach($data as $key => $value){
				$_sql[] .= "`$key` = '$value'";
			}
			$sql .= join(",",$_sql)." ";
			//$mysql->db_query($sql);	
			 
			$_sql = "";
			$sql = "update `{userinfo}` set  `updatetime` = '".time()."',`updateip` = '".ip_address()."',";
			foreach($data as $key => $value){
				$_sql[] .= "`$key` = '$value'";
			}
			$sql .= join(",",$_sql)." where user_id = '$user_id'";
			return $mysql->db_query($sql);
		}
	}
	
	
	/**
	 * 锁定用户
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Lock($data = array()){
		global $mysql;
		$user_id = $data['user_id'];
        if ($data['user_id'] == "") {
            return "userinfo_error_user_id_empty";
        }
		
		$status_var = $data["type"]."_style";
		
		$_sql = "";
		$sql = "update `{userinfo}` set  {$status_var} = 2 where user_id = '$user_id'";
        return $mysql->db_query($sql);
	}
	
	
	
	/**
	 * 解除锁定
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function UnLock($data = array()){
		global $mysql;
		$user_id = $data['user_id'];
        if ($data['user_id'] == "") {
            return "userinfo_error_user_id_empty";
        }
		
		$status_var = $data["type"]."_style";
		
		$_sql = "";
		$sql = "update `{userinfo}` set  {$status_var} = 1 where user_id = '$user_id'";
        return $mysql->db_query($sql);
	}
	
	
	/**
	 * 删除
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function Delete($data = array()){
		global $mysql;
		$id = $data['id'];
		if (!is_array($id)){
			$id = array($id);
		}
		$sql = "delete from {userinfo}  where id in (".join(",",$id).")";
		return $mysql->db_query($sql);
	}
	
	/**
	 * 获取用户信息状态
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function GetRoleMenu($data){
		global $mysql;
		$role = $data['role'];
		$result = self::GetOne(array("user_id"=>$data['user_id']));
		$info_state = ($result['info_status']==1)?"已完成":"未完成";
		$contact_state = ($result['contact_status']==1)?"已完成":"未完成";
		$schoolinfo_state = ($result['schoolinfo_status']==1)?"已完成":"未完成";
		$schooledu_state = ($result['schooledu_status']==1)?"已完成":"未完成";
		$company_state = ($result['company_status']==1)?"已完成":"未完成";
		$building_state = ($result['building_status']==1)?"已完成":"未完成";
		$firm_state = ($result['firm_status']==1)?"已完成":"未完成";
		$mate_state = ($result['mate_status']==1)?"已完成":"未完成";
		$edu_state = ($result['edu_status']==1)?"已完成":"未完成";
		$other_state = ($result['other_status']==1)?"已完成":"未完成";
		$finance_state = ($result['finance_state']==1)?"已完成":"未完成";
		
		$info = array("name"=>"个人信息","nid"=>"building","state"=>$info_state);
		$contact = array("name"=>"联系方式","nid"=>"contact","state"=>$contact_state);
		$schoolinfo = array("name"=>"学校信息","nid"=>"schoolinfo","state"=>$schoolinfo_state);
		$schooledu = array("name"=>"学校关系","nid"=>"schooledu","state"=>$schooledu_state);
		$company = array("name"=>"单位资料","nid"=>"company","state"=>$company_state);
		$building = array("name"=>"房产资料","nid"=>"building","state"=>$building_state);
		$firm = array("name"=>"私营业主","nid"=>"firm","state"=>$firm_state);
		$finance = array("name"=>"财务状况","nid"=>"finance","state"=>$finance_state);
		$mate = array("name"=>"配偶资料","nid"=>"mate","state"=>$mate_state);
		$edu = array("name"=>"教育背景","nid"=>"edu","state"=>$edu_state);
		$other = array("name"=>"其他","nid"=>"other","state"=>$other_state);
		
		//学生
		if ($role==1){
			return array($contact,$schoolinfo,$schooledu,$other);
		}
		//工薪阶层

		elseif ($role==2){
			return array($building,$company,$finance,$contact,$mate,$edu,$other);
		}
		//企业主

		elseif ($role==3){
			return array($building,$firm,$finance,$contact,$mate,$edu,$other);
		}
		elseif ($role==4){
			return array($$building,$finance,$contact,$mate,$edu,$other);
		}
		
		else{
			return array($building,$company,$finance,$contact,$mate,$edu,$other);
		}
	}
	
}
?>