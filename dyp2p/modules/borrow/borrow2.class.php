<?

/******************************
 * $File: borrow.class.php
 * $Description: 数据库处理文件
******************************/
class borrowClass extends amountClass {
	
	/**
	 * 用户添加基本的借款信息
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Add($data = array()){
		global $mysql;global $_G;
		$max = isset($_G['system']['con_borrow_maxaccount'])?$_G['system']['con_borrow_maxaccount']:"50000";//最大的投资额度
		$min = isset($_G['system']['con_borrow_minaccount'])?$_G['system']['con_borrow_minaccount']:"500";//最小的投资额度
		$apr = isset($_G['system']['con_borrow_apr'])?$_G['system']['con_borrow_apr']:"22.18";
        if (!isset($data['user_id']) && trim($data['user_id'])==""){
			return "user_no_login";
		}
		if (!isset($data['name']) && trim($data['name'])==""){
			return "borrow_name_empty";
		}
		if (!isset($data['account']) || trim($data['account'])==""){
			return "borrow_account_empty";
		}
		if ($data['vouch_status']!=1){
			$result = self::GetAmountOne($data['user_id'],"credit");
			if (isset($data['account']) && $data['account']>$result['account_use']){
				return "borrow_account_over_credituse";
			}
		}else{
			$result = self::GetAmountOne($data['user_id'],"borrow_vouch");
			if (isset($data['account']) && $data['account']>$result['account_use']){
				return "borrow_account_over_vouchuse";
			}
		}
		$sql = "select count(1) as num from `{borrow}` where user_id={$data['user_id']} and status=0";
		$result = $mysql->db_fetch_array($sql);
		if ($result["num"]>0){
			return "borrow_is_exist";
		}
		if($data['account'] > $max){
			return  "borrow_account_over_max";
		}
		if($data['account'] < $min){
			return  "borrow_account_over_min";
		}
		if (!isset($data['borrow_apr']) || trim($data['borrow_apr'])==""){
			return "borrow_apr_empty";
		}
		if ($data['borrow_apr']>$apr){
			return "borrow_apr_over_max";
		}
		if ($data['status']==1){
			$data['verify_time'] = time();
		}
		if ($data['status']==1){
			$data['verify_remark'] = "自动审核";
		}
		$sql = "insert into `{borrow}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
        return $mysql->db_query($sql);
		
	}
	
	/**
	 * 用户修改基本的信息
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Update($data = array()){
		global $mysql;
		$user_id = $data['user_id'];
        if ($data['user_id'] == "") {
            return self::ERROR;
        }
		
		$_sql = "";
		$sql = "update `{borrow}` set ";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where user_id = '$user_id' and borrow_nid='{$data['borrow_nid']}' and (status=0 or status=-1)";
		
        return $mysql->db_query($sql);
	}
	
	/**
	 * 查看基本的借款信息
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetOnes($data = array()){
		global $mysql,$_G;
		$user_id = $data['user_id'];
		$con_borrow_credit_max = IsExiest($_G["system"]["con_borrow_credit_max"])!=""?$_G["system"]["con_borrow_credit_max"]:30;
		$id = $data['id'];
		if ($id=="") {
			if (IsExiest($_G['user_result']["credit"])==""){
			$credit = creditClass::GetUserCredit($user_id);
			}else{
			$credit = $_G['user_result']["credit"];
			}
			if ($credit<$con_borrow_credit_max){
				echo "<script>alert('您的信用积分还未到{$con_borrow_credit_max}分，请先上传资料认证增加信用积分');location.href='/?user&q=code/attestation';</script>";
					exit;
			}else{
				$sql = "select 1 from {borrow} where (status=0 or status=1) and user_id='{$user_id}'";
				$result = $mysql->db_fetch_array($sql);
				if ($result != false){
					echo "<script>alert('您已经有一个借款标，请处理好借款标再进行借款');location.href='/?user&q=code/borrow/publish';</script>";
					exit;
				}
			}
		}else{
			$sql = "select p1.* ,p2.username,p2.realname from {borrow} as p1 
					  left join {user} as p2 on p1.user_id=p2.user_id 
					  where p1.user_id=$user_id and p1.borrow_nid='{$id}' and (p1.status=0 or p1.status=-1)
					";
			$result = $mysql->db_fetch_array($sql);
			if ($result == false){
				echo "<script>alert('您操作有误，请不要乱操作');location.href='/?user&q=code/borrow/publish';</script>";
				exit;
			}else{
				return $result;
			}
		}
	}
	
	/**
	 * 撤销
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	 
	public static function CancelUser($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		if (IsExiest($data['id'])!=""){
			$_sql .= " and borrow_nid='{$data['id']}'";
		}else{
			return "borrow_nid_empty";
		}
		$borrow_nid = $data['id'];
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and user_id={$data['user_id']} ";
		}
		$sql = "select `name`,borrow_nid,status,vouch_status from `{borrow}` $_sql";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			return false;
		}
		$sql = "update `{borrow}` set cancel_remark='{$data['cancel_remark']}',cancel_time='".time()."',cancel_ip='".ip_address()."',cancel_status=2 where borrow_nid='{$borrow_nid}'";
		return $mysql->db_query($sql);
	
	
	}
	public static function Cancel($data = array()){
		global $mysql,$MsgInfo;
		$_sql = " where 1=1 ";
		if (IsExiest($data['id'])!=""){
			$_sql .= " and borrow_nid='{$data['id']}'";
		}else{
			return "borrow_nid_empty";
		}
		$borrow_nid = $data['id'];
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and user_id={$data['user_id']} ";
		}
		$sql = "select `name`,borrow_nid,status,vouch_status from `{borrow}` $_sql";
		$result = $mysql->db_fetch_array($sql);
		
		if ($result["status"]==5) return "borrow_cancel_has" ;
		if ($result["tender_times"]>0) return "borrow_cancel_yestender";
		
		
		if ($data['cancel_status']!=""){
			$sql = "update `{borrow}` set cancel_verify_remark='{$data['cancel_verify_remark']}',cancel_verify_time='".time()."',cancel_verify_ip='".ip_address()."',cancel_status='{$data['cancel_status']}' where borrow_nid = '{$data['id']}'";
			$mysql->db_query($sql);
			if ($data['cancel_status']==3){
				return "borrow_cancel_verify_false";
			}
		
		}
		
		
		$vouch_status = $result["vouch_status"];
		$borrow_url = "<a href=\'{$_G['weburl']}/invest/a{$result['borrow_nid']}.html\' target=_blank>{$result['name']}</a>";
		$sql = "update  `{borrow}`  set status=5,reverify_time='".time()."',reverify_remark='用户撤销' $_sql";
		$result = $mysql->db_query($sql);
		
		if ($result==false)
		{
			return "borrow_cancel_false";
		}
		
		//返回所有投资者的金钱。
		$result = self::GetTenderList(array("borrow_nid"=>$borrow_nid,"limit"=>"all"));
		
		foreach ($result as $key => $value){
			if ($value['status']==0){
				$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
				
				$log['user_id'] = $value['user_id'];
				$log['type'] = "tender_user_cancel";
				$log['money'] = $value['account'];
				$log['total'] = $account_result['total'];
				$log['use_money'] = $account_result['use_money']+$log['money'];
				$log['no_use_money'] = $account_result['no_use_money']-$log['money'];
				$log['collection'] = $account_result['collection'];
				$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
				$log['to_user'] = $data['user_id'];
				$log['remark'] = str_replace("#borrow_url#",$borrow_url,$MsgInfo["account_tender_user_cancel"]);
				accountClass::AddLog($log);
				
				
				//同时更新投标的状态为3
				$sql = "update `{borrow_tender}` set status=3 where id = '{$value['id']}'";
				$mysql->db_query($sql);
				
				
				
				//提醒设置
				$remind['nid'] = "tender_user_cancel";
				$remind['sent_user'] = "0";
				$remind['code'] = "borrow";
				$remind['article_id'] = $data['id'];
				$remind['receive_user'] = $value['user_id'];
				$remind['title'] = str_replace("#borrow_name#",$value['borrow_name'],$MsgInfo["remind_tender_user_cancel_title"]);
				$remind['content'] = str_replace("#borrow_url#",$borrow_url,$MsgInfo["remind_tender_user_cancel_contents"]);
				$remind['type'] = "system";
				remindClass::sendRemind($remind);
				
					
			}
		}
		
		if ($vouch_status==1){
			//投资人投资担保额度的增加
			$result = self::GetVouchList(array("limit"=>"all","borrow_nid"=>$borrow_nid));
			if ($result!=""){
				foreach ($result as $key => $value){
					if ($value['status']!=2){
						//添加额度记录
						$amountlog_result = self::GetAmountOne($value['user_id'],"tender_vouch");
						$amountlog["user_id"] = $value['user_id'];
						$amountlog["type"] = "tender_vouch_false";
						$amountlog["amount_type"] = "tender_vouch";
						$amountlog["account"] = $value['account'];
						$amountlog["account_all"] = $amountlog_result['account_all'];
						$amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
						$amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account']; 
						$amountlog["remark"] = "担保标[{$borrow_url}]失败，投资担保额度返还";
						self::AddAmountLog($amountlog);
						
						$sql = "update `{borrow_vouch}` set status=2 where id = {$value['id']}";
						$mysql->db_query($sql);
						
						//提醒设置
						$remind['nid'] = "vouch_user_cancel";
						$remind['sent_user'] = "0";
						$remind['code'] = "borrow";
						$remind['article_id'] = $value['id'];
						$remind['receive_user'] = $value['user_id'];
						$remind['title'] = str_replace("#borrow_name#",$value['borrow_name'],$MsgInfo["remind_vouch_user_cancel_title"]);
						$remind['content'] = str_replace("#borrow_url#",$borrow_url,$MsgInfo["remind_vouch_user_cancel_contents"]);
						$remind['type'] = "system";
						remindClass::sendRemind($remind);
					}
				}
			}
		}
		
		
		return true;
	}
	
	//借款标的分页列表
	function GetPageList($data = array()){
		global $mysql;
		$user_id = IsExiest($data['user_id'])==""?"":$data['user_id'];
		$username = IsExiest($data['username'])==""?"":$data['username'];
	
		$page = IsExiest($data['page'])==""?1:$data['page'];
		$epage = IsExiest($data['epage'])==""?10:$data['epage'];
		
		$_sql = "where 1=1 ";		
		//判断用户id是否为空 
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and p2.user_id = {$data['user_id']}";
		}
		//判断用户名是否为空 
		if (IsExiest($data['username'])!=""){
			$_sql .= " and p2.username = '{$data['username']}'";
		}
		//判断时间1
		if (IsExiest($data['dotime1'])!=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime2!=""){
				$_sql .= " and p1.addtime > ".get_mktime($dotime1);
			}
		}
		//判断时间2
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.addtime < ".get_mktime($dotime2);
			}
		}
		//判断状态
		if (IsExiest($data['status'])!="" && $data['status']!="undefined"){
			$_sql .= " and p1.status in ({$data['status']})";
		}
		
		//判断关键字
		if (IsExiest($data['keywords'])!="" && $data['status']!="undefined"){
			$_sql .= " and (p1.name like '%".urldecode($data['keywords'])."%' )";
			
		}
		//判断类型
		if (IsExiest($data['type'])!=""){
			if ($data['type']=="care"){
				$_sql .= " and p1.borrow_nid in (select article_id from `{user_care}` where code='borrow' and user_id={$data['care_userid']})";
			}
			
			
		}
		
		$_select = " p1.*,p2.username,p2.realname,p2.qq,p3.credit";
		$_order = " order by p1.id desc";
		$sql = "select SELECT from `{borrow}` as p1 
				 left join `{user}` as p2 on p1.user_id=p2.user_id
				 left join `{credit}` as p3 on p1.user_id=p3.user_id 
				$_sql ORDER LIMIT";
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $limit), $sql));	
		if ($list!=""){
				foreach ($list as $key => $value){
					$list[$key]["borrow_url"] = "/invest/a{$value['borrow_nid']}.html";
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
	 * 列表
	 *
	 * @return Array
	 */
	function GetList($data = array()){
		global $mysql;

		$user_id = empty($data['user_id'])?"":$data['user_id'];
		$username = empty($data['username'])?"":$data['username'];
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1 ";		 
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and p2.user_id = {$data['user_id']}";
		}
		if (IsExiest($data['username'])!=""){
			$_sql .= " and p2.username = '{$data['username']}'";
		}
		if (IsExiest($data['type'])!=""){
			$type = $data['type'];
			if ($type==""){
				$_sql .= "  and p1.status=1 ";
			}elseif ($type=="review"){
				$_sql .= " and p1.account=p1.borrow_account_yes ";
			}elseif ($type=="reviews"){
				$_sql .= " and p1.account=p1.borrow_account_yes ";
				$_sql .= " and p1.status=1";
			}elseif ($type=="success"){
				$_sql .= " and p1.status=3";
			}elseif ($type=="vouch"){
				$_sql .= " and p1.vouch_status=1 and p1.status=1";
			}elseif ($type=="now"){//正在还
				$_sql .= " and p1.repay_account_all!=p1.repay_account_yes";
			}elseif ($type=="yes"){//已还
				$_sql .= " and p1.repay_account_all=p1.repay_account_yes";
			}elseif ($type=="late"){//过期
				$_sql .= " and p1.verify_time + borrow_valid_time*24*60*60<".time();
			}elseif ($type=="cancel"){
				$_sql .= " and p1.cancel_status!=0 ";
			}
			
		}
		
		if (IsExiest($data['dotime1']) !=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p1.addtime > ".get_mktime($dotime1);
			}
		}
		
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.addtime < ".get_mktime($dotime2);
			}
		}
		
		if (IsExiest($data['status'])!="" && $data['status']!="undefined"){
			$_sql .= " and p1.status in ({$data['status']})";
		}
		if (IsExiest($data['late_display'])==1 ){
			$_sql .= " and p1.verify_time >".time()." - p1.borrow_valid_time*60*60*24";
		}
		if (IsExiest($data['vouch_status'])!=""){
			$_sql .= " and p1.vouch_status in ({$data['vouch_status']})";
		}
		if (IsExiest($data['borrow_period'])!=""){
			$_sql .= " and p1.borrow_period = {$data['borrow_period']}";
		}
		
		if (IsExiest($data['flag'])!=""){
			$_sql .= " and p1.flag = {$data['flag']}";
		}
		
		if (IsExiest($data['borrow_use']) !=""){
			$_sql .= " and p1.borrow_use in ({$data['borrow_use']})";
		}
		
		
		if (IsExiest($data['borrow_usertype']) !=""){
			$_sql .= " and p1.borrow_usertype = '{$data['borrow_usertype']}'";
		}
		
		if (IsExiest($data['award_status'])!=""){
			if($data['award_status']==1){
			$_sql .= " and p1.award_status >0";
			}else{
			$_sql .= " and p1.award_status = 0";
			}
		}
		
		if (IsExiest($data['borrow_style']) ){
			$_sql .= " and p1.borrow_style in ({$data['borrow_style']})";
		}
		
		if (IsExiest($data['keywords'])){
			$_sql .= " and (p1.name like '%".urldecode($data['keywords'])."%' or p2.username  like '%".urldecode($data['keywords'])."%' or p7.username  like '%".urldecode($data['keywords'])."%') ";
			
		}
		
		if (IsExiest($data['province']) !=""){
			$_sql .= " and p2.province ={$data['province']}";
		}
		
		if (IsExiest($data['city']) !=""){
			$_sql .= " and p2.city ={$data['city']}";
		}
		
		if (IsExiest($data['use']) !=""){
			$_sql .= " and p1.use in ({$data['use']})";
		}
		
		if (IsExiest($data['account1'])!=""){
			$_sql .= " and p1.account >= {$data['account1']}";
		}
		if (IsExiest($data['nid'])!=""){
			if ($data['nid']=="vouch"){
				$_sql .= " and p1.vouch_status=1";
			}elseif ($data['nid']=="tender" ){
				$_sql .= " and p1.status = 1";
			}elseif($data['nid']=="tender_wait"){
				$_sql .= " and p1.status = 1 and p1.borrow_account_yes=p1.account";
			}elseif($data['nid']=="invest"){
				$_sql .= " and p1.status = 1 and p1.borrow_account_wait>0";
			}elseif($data['nid']=="borrow_success"){
				$_sql .= " and p1.status = 3 ";
			}elseif($data['nid']=="vouch_now"){
				$_sql .= " and p1.status = 1 and p1.vouch_status=1 ";
			}
		}
		
		if (IsExiest($data['account2'])!=""){
			$_sql .= " and p1.account <= {$data['account2']}";
		}
		$_order = " order by p1.`order` desc,p1.id desc ";
		
		if (IsExiest($data['order'])!=""){
			$order = $data['order'];
			if ($order == "account_up"){
				$_order = " order by p1.`account` desc ";
			}else if ($order == "account_down"){
				$_order = " order by p1.`account` asc";
			}
			if ($order == "credit_up"){
				$_order = " order by p3.`credit` desc,p1.id desc ";
			}else if ($order == "credit_down"){
				$_order = " order by p3.`credit` asc,p1.id desc ";
			}
			
			if ($order == "apr_up"){
				$_order = " order by p1.`borrow_apr` desc,p1.id desc ";
			}else if ($order == "apr_down"){
				$_order = " order by p1.`borrow_apr` asc,p1.id desc ";
			}
			
			if ($order == "jindu_up"){
				$_order = " order by p1.`borrow_account_scale` desc,p1.id desc ";
				
			}else if ($order == "jindu_down"){
				$_order = " order by p1.`borrow_account_scale` asc,p1.id desc ";
			}
			if ($order == "flag"){
				$_order = " order by p1.vouch_status desc,p1.`flag` desc,p1.id desc ";
			}
			if ($order == "index"){
				$_order = " order by p1.`flag` desc,p1.id desc ";
			}
			
		}
	
		$_select = " p1.*,p2.username,p2.area as user_area ,p2.qq,p2.role,p3.credit as credit_jifen,p4.pic as credit_pic,p5.area as add_area,p1.borrow_account_scale,p7.username as kefu_username,p6.kefu_userid";
		$sql = "select SELECT from `{borrow}` as p1 
				 left join `{user}` as p2 on p1.user_id=p2.user_id
				 left join `{credit}` as p3 on p1.user_id=p3.user_id 
				left join `{credit_rank}` as p4 on p3.credit<=p4.point2  and p3.credit>=p4.point1
				 left join `{userinfo}` as p5 on p1.user_id=p5.user_id 
				 left join `{borrow_vip}` as p6 on p6.user_id=p1.user_id
				 left join `{user}` as p7 on p7.user_id=p6.kefu_userid
				$_sql and p4.type='credit' ORDER LIMIT";
		//$sql = " select SELECT from `{borrow}` as p1 ,
				// `{user}` as p2 ,`{credit}` as p3,`{credit_rank}` as p4 ,`{userinfo}` as p5 ,`{borrow_vip}` as p6 ,`{user}` as p7 ,`{user_students}` $_sql and p1.user_id=p2.user_id and p1.user_id=p3.user_id and p3.credit<=p4.point2  and p3.credit>=p4.point1 and p1.user_id = p5.user_id and p1.user_id=p6.user_id and p6.kefu_userid=p7.user_id  ORDER LIMIT";
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$list =  $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));
			if ($list!=""){
				foreach ($list as $key => $value){
					$list[$key]["borrow_url"] = "/invest/a{$value['borrow_nid']}.html";
				}
			}
			return $list;
		}
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
			
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $limit), $sql));		
		if ($list!=""){
				foreach ($list as $key => $value){
					$list[$key]["borrow_url"] = "/invest/a{$value['borrow_nid']}.html";
					$list[$key]["other_time"] = $value["verify_time"]+ $value["borrow_valid_time"]*60*60*24-time();
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
	 * 查看
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetOne($data = array()){
		global $mysql;
		$_sql = "where 1=1 ";
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and  p1.user_id = '{$data['user_id']}' ";
		}
		if (IsExiest($data['id'])!=""){
			$_sql .= " and  p1.id = '{$data['id']}' ";
		}
		if (IsExiest($data['borrow_nid'])!=""){
			$_sql .= " and  p1.borrow_nid = '{$data['borrow_nid']}' ";
		}
		$sql = "select p1.* ,p2.username,p2.realname,p3.username as verify_username from `{borrow}` as p1 
				  left join `{user}` as p2 on p1.user_id=p2.user_id 
				  left join `{user}` as p3 on p1.verify_userid = p3.user_id 
				  $_sql
				";
		$result = $mysql->db_fetch_array($sql);
		
		return $result;
	}
	
	/**
	 * 修改借款信息
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Action($data = array()){
		global $mysql;
		$id = $data['id'];
        if ($data['id'] == "") {
            return self::ERROR;
        }
		
		foreach($data['id'] as $key => $value){
			$sql = "update `{borrow}` set ";
			$sql .= "`flag` = '{$data['flag'][$key]}',`view_type` = '{$data['view'][$key]}' where id = '{$value}'";
			 $mysql->db_query($sql);
		}
		 return true;
       
	}
	
	
	/**
	 * 借款初审
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Verify($data = array()){
		global $mysql;
		$sql = "select borrow_nid,status from `{borrow}` where id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result["status"]!=0){
			return "borrow_verify_error";
		}
		
		$sql = "update `{borrow}` set verify_time='".time()."',verify_userid='{$data['verify_user']}',verify_remark='{$data['verify_remark']}',status='{$data['status']}' where  id='{$data['id']}' ";
		$mysql->db_query($sql);
		$res =self::AutoTender(array("borrow_nid"=>$result['borrow_nid']));
		foreach ($res as  $key => $value){
			$_tender['borrow_nid'] = $result['borrow_nid'];
			$_tender['user_id'] = $key;
			$_tender['account'] = $value;
			$_tender['contents'] = "自动投标";
			$_tender['status'] = 0;
			$_result = self::AddTender($_tender);
			$sql = "insert into `{borrow_autolog}` set borrow_nid='{$result['borrow_nid']}',user_id='{$key}',account='{$value}',remark='{$_result}',addtime='".time()."',addip='".ip_address()."'";
			$mysql->db_query($sql);
		}
        return true;
	}
	
	
	/**
	 * 列表
	 *
	 * @return Array
	 */
	function GetTenderList($data = array()){
		global $mysql;
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1";		 
		if (IsExiest($data["user_id"])!=""){
			$_sql .= " and p1.user_id = {$data['user_id']}";
		}
		
		if (IsExiest($data["username"])!=""){
			$_sql .= " and p2.username like '%{$data['username']}%'";
		}
		
		if (IsExiest($data["tender_username"])!=""){
			$_sql .= " and p4.username like '%".urldecode($data['tender_username'])."%'";
		}
		if (IsExiest($data["tender_userid"])!=""){
			$_sql .= " and p1.user_id = '{$data['tender_username']}'";
		}
		
		if (IsExiest($data["borrow_nid"])!=""){
			$_sql .= " and p1.borrow_nid = '{$data['borrow_nid']}'";
		}
		if (IsExiest($data["borrow_userid"])!=""){
			$_sql .= " and p3.user_id = '{$data['borrow_userid']}'";
		}
	
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.addtime < ".get_mktime($dotime2);
			}
		}
		if (IsExiest($data['dotime1'])!=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p1.addtime > ".get_mktime($dotime1);
			}
		}
		if (IsExiest($data['status'])!=""){
			$_sql .= " and p1.status in ({$data['status']})";
		}
		if (IsExiest($data['borrow_status'])!=""){
			$_sql .= " and p3.status in ({$data['borrow_status']})";
		}
		
		if (IsExiest($data['keywords']) !=""){
			$_sql .= " and p3.name like '%".urldecode($data['keywords'])."%'";
		}
	
		$_select = "p1.*,p2.user_id as borrow_userid,p2.username as borrow_username,p4.username as username,p3.borrow_apr,p3.borrow_period,p3.name as borrow_name,p3.account as borrow_account,p3.borrow_account_scale,p5.credit as credit_jifen,p6.pic as credit_pic";
		$sql = "select SELECT from `{borrow_tender}` as p1
				left join `{borrow}` as p3 on p1.borrow_nid=p3.borrow_nid 
				left join `{user}` as p2 on p3.user_id = p2.user_id
				left join `{user}` as p4 on p4.user_id = p1.user_id
				 left join `{credit}` as p5 on p3.user_id=p5.user_id 
				left join `{credit_rank}` as p6 on p5.credit<=p6.point2  and p5.credit>=p6.point1
		 {$_sql}  order by p1.addtime desc LIMIT";
				
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$result= $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  'order by p1.id desc', $_limit), $sql));
			
			return $result;
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
		
	}
	
	/**
	 * 添加投标
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function AddTender($data = array()){
		global $mysql,$_G;
		
		//判断id是否为空
		if (IsExiest($data['borrow_nid']) ==""){
			return "borrow_nid_empty";
		}		
		$borrow_result = borrowClass::GetOne(array("borrow_nid"=>$data['borrow_nid']));
		if ($borrow_result==false){
			return "error";
		}elseif ($borrow_result['borrow_account_yes']>=$borrow_result['account']){
			return "tender_full_yes";
		}elseif ($borrow_result['verify_time'] == "" || $borrow_result['status'] != 1){
			return "tender_verify_no";
		}elseif ($borrow_result['verify_time'] + $borrow_result['borrow_valid_time']*60*60*24<time()){
			return "tender_late_yes";
		}elseif(!is_numeric($data['account'])){
			return "tender_money_error";
		}elseif($data['account']<$borrow_result['tender_account_min']){
			return "最小的投资金额不能小于{$borrow_result['tender_account_min']}。";
		}elseif($borrow_result['vouch_status']==1 && $borrow_result['vouch_account']!=$borrow_result['vouch_account_yes']){
			return "tender_vouch_full_no";
		}
		$tender_account_all = borrowClass::GetUserTenderAccount(array("user_id"=>$data["user_id"],"borrow_nid"=>$data['borrow_nid']));
		if ($tender_account_all+$data['account']>$borrow_result['tender_account_max'] && $borrow_result['tender_account_max']>0){
			$tender_account = $borrow_result['tender_account_max']-$tender_account_all;
			return"您已经投标了{$tender_account_all},最大投标总金额不能大于{$borrow_result['tender_account_max']}，你最多还能投资{$tender_account}";
		}else{
			$data['account_tender'] = $data['account'];
			//判断投资的金额是否大于待借的金额
			if ($borrow_result['borrow_account_wait']<$data['account']){
				$data['account'] = $borrow_result['borrow_account_wait'];
			}
			//判断金额是否是一样的
			$account_result =  accountClass::GetOne(array("user_id"=>$data['user_id']));//获取当前用户的余额
			if ($account_result['use_money']<$data['account']){
				return "tender_money_no";
			}
		}
		//判断是否是友情借款
		if ($borrow_result['tender_friends']!=""){
			$_tender_friends = explode("|",$borrow_result['tender_friends']);
			$sql = "select username from {user} where user_id='{$data['user_id']}'";
			$result = $mysql->db_fetch_array($sql);
			if (!in_array($result['username'],$_tender_friends)){
				return "tender_friends_error";
			}
		}

		//更新借款的信息
		$sql = "update  `{borrow}`  set borrow_account_yes=borrow_account_yes+{$data['account']},borrow_account_wait=borrow_account_wait-{$data['account']},borrow_account_scale=(borrow_account_yes/account)*100,tender_times=tender_times+1  where borrow_nid='{$data['borrow_nid']}'";
		$mysql->db_query($sql);//更新已经投标的钱
		
		
		
		//投标金额冻结
		$account_result =  accountClass::GetOne(array("user_id"=>$data['user_id']));//获取当前用户的余额
		$borrow_url = "<a href=\'/invest/a{$data['borrow_nid']}.html\' target=_blank>{$borrow_result['name']}</a>";
		$log['user_id'] = $data['user_id'];
		$log['type'] = "tender";
		$log['money'] = $data['account'];
		$log['total'] = $account_result['total'];
		$log['use_money'] =  $account_result['use_money']-$log['money'];
		$log['no_use_money'] =  $account_result['no_use_money']+$log['money'];
		$log['collection'] =  $account_result['collection'];
		$log['use_money_yes'] = $account_result['use_money_yes'];
		$log['use_money_no'] = $account_result['use_money_no'] - $log['money'];
		$log['to_user'] = $borrow_result['user_id'];
		$log['remark'] = "投标[{$borrow_url}]所冻结资金";
		accountClass::AddLog($log);//添加记录
		
		//添加投资的借款信息
		$sql = "insert into `{borrow_tender}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		return $mysql->db_query($sql);
			
	}
	
	//满标审核
	public static function FullCheck($data = array()){
		global $mysql,$_G;
		//第一步,判断nid是否已经存在
		if (IsExiest($data["borrow_nid"])=="") return "borrow_nid_empty";
		$borrow_nid = $data["borrow_nid"];
		//第二步，读取借款标的相关信息
		$sql = "select p1.*,p2.username  from `{borrow}` as p1 left join `{user}` as p2 on p1.user_id=p2.user_id where p1.borrow_nid='{$data['borrow_nid']}'";
		$borrow_result = $mysql->db_fetch_array($sql);
		
		$status = $data['status'];
		$borrow_status = $borrow_result["status"];
		if ($borrow_status!=1){
			return "borrow_fullcheck_error";
		}
		$borrow_userid = $borrow_result["user_id"];//借款用户id
		$borrow_username = $borrow_result["username"];//借款用户id
		$borrow_account = $borrow_result["account"];//借款金额
		$borrow_period = $borrow_result["borrow_period"];//借款金额
		$borrow_name = $borrow_result["name"];//借款 标题
		$borrow_cash_status = $borrow_result["cash_status"];//是否提现标
		$borrow_url = "<a href=\'/invest/a{$data['borrow_nid']}.html\' target=_blank>{$borrow_result['name']}</a>";//借款标地址
		if ($status == 3){
			//更新满标时的操作人
			$sql = " update `{borrow}` set status='3' where borrow_nid='{$borrow_nid}'";
			$mysql ->db_query($sql);
			//第三步，如果成功，则将还款信息输进表里面去
			$_equal["account"] = $borrow_result["account"];
			$_equal["period"] = $borrow_result["borrow_period"];
			$_equal["apr"] = $borrow_result["borrow_apr"];
			$_equal["style"] = $borrow_result["borrow_style"];
			$equal_result = EqualInterest($_equal);
			foreach ($equal_result as $key => $value){
				//防止重复添加还款信息
				$sql = "select 1 from `{borrow_repay}` where user_id='{$borrow_userid}' and repay_period='{$key}' and borrow_nid='{$borrow_nid}'";
				$result = $mysql->db_fetch_array($sql);
				if ($result==false){
					$sql = "insert into `{borrow_repay}` set `addtime` = '".time()."',";
					$sql .= "`addip` = '".ip_address()."',user_id='{$borrow_userid}',status=1,`borrow_nid`='{$borrow_nid}',`repay_period`='{$key}',";
					$sql .= "`repay_time`='{$value['repay_time']}',`repay_account`='{$value['account_all']}',";
					$sql .= "`repay_interest`='{$value['account_interest']}',`repay_capital`='{$value['account_capital']}'";
					$mysql ->db_query($sql);
				}else{
					$sql = "update `{borrow_repay}` set `addtime` = '".time()."',";
					$sql .= "`addip` = '".ip_address()."',user_id='{$borrow_userid}',status=1,`borrow_nid`='{$borrow_nid}',`repay_period`='{$key}',";
					$sql .= "`repay_time`='{$value['repay_time']}',`repay_account`='{$value['account_all']}',";
					$sql .= "`repay_interest`='{$value['account_interest']}',`repay_capital`='{$value['account_capital']}'";
					$sql .= " where user_id='$borrow_userid' and repay_period='{$key}' and borrow_nid='{$borrow_nid}'";
					$mysql ->db_query($sql);
				}
			}
			
			//第四步，如果成功，将用户投资加入详细表
			$tender_result = self::GetTenderList(array("borrow_nid"=>$borrow_nid,"limit"=>"all"));
			
			foreach ($tender_result as $_key => $_value){
				$_equal["account"] = $_value['account'];
				$_equal["period"] = $borrow_result["borrow_period"];
				$_equal["apr"] = $borrow_result["borrow_apr"];
				$_equal["type"] = "";
				$_equal["style"] = $borrow_result["borrow_style"];
				$equal_result = EqualInterest($_equal);
				$tender_id = $_value['id'];
				$tender_userid = $_value['user_id'];
				$tender_account = $_value['account'];
				foreach ($equal_result as $period_key => $value){
					$repay_month_account = $value['account_all'];
					//防止重复添加还款信息
					$sql = "select 1 from `{borrow_recover}` where user_id='{$tender_userid}' and borrow_nid='{$borrow_nid}' and recover_period='{$period_key}' and tender_id='{$tender_id}'";
					
					$result = $mysql->db_fetch_array($sql);
					if ($result==false){
						$sql = "insert into `{borrow_recover}` set `addtime` = '".time()."',";
						$sql .= "`addip` = '".ip_address()."',user_id='{$tender_userid}',status=1,`borrow_nid`='{$borrow_nid}',`borrow_userid`='{$borrow_userid}',`tender_id`='{$tender_id}',`recover_period`='{$period_key}',";
						$sql .= "`recover_time`='{$value['repay_time']}',`recover_account`='{$value['account_all']}',";
						$sql .= "`recover_interest`='{$value['account_interest']}',`recover_capital`='{$value['account_capital']}'";
						$mysql ->db_query($sql);
					}else{
						$sql = "update `{borrow_recover}` set `addtime` = '".time()."',";
						$sql .= "`addip` = '".ip_address()."',user_id='{$tender_userid}',status=1,`borrow_nid`='{$borrow_nid}',`borrow_userid`='{$borrow_userid}',`tender_id`='{$tender_id}',`recover_period`='{$period_key}',";
						$sql .= "`recover_time`='{$value['repay_time']}',`recover_account`='{$value['account_all']}',";
						$sql .= "`recover_interest`='{$value['account_interest']}',`recover_capital`='{$value['account_capital']}'";
						$sql .= " where user_id='{$tender_userid}' and recover_period='{$period_key}' and borrow_nid='{$borrow_nid}' and tender_id='{$tender_id}'";
						$mysql ->db_query($sql);
					}
				}
				
				//第五步,更新投资标的信息
				$_equal["type"] = "all";
				$equal_result = EqualInterest($_equal);
				$recover_all = $equal_result['account_total'];
				$recover_interest_all = $equal_result['interest_total'];
				
				$sql = "update `{borrow_tender}` set recover_account_all='{$equal_result['account_total']}',recover_account_interest='{$equal_result['interest_total']}',recover_account_wait='{$equal_result['account_total']}',recover_account_interest_wait='{$equal_result['interest_total']}',recover_account_capital_wait='{$equal_result['capital_total']}'  where id='{$tender_id}'";
				$mysql->db_query($sql);
				
				//第六步,扣除投资人的资金
				$account_result =  accountClass::GetOne(array("user_id"=>$tender_userid));
				$log['user_id'] = $tender_userid;
				$log['type'] = "tender_success";
				$log['money'] = $tender_account;
				$log['total'] = $account_result['total']-$log['money'];
				$log['use_money'] = $account_result['use_money'];
				$log['no_use_money'] = $account_result['no_use_money']-$log['money'];
				$log['collection'] = $account_result['collection'];
				$log['to_user'] = $borrow_userid;
				$log['use_money_yes'] = $account_result['use_money_yes'];
				$log['use_money_no'] = $account_result['use_money_no'];
				$log['remark'] = "投标[{$borrow_url}]成功投资金额扣除";
				accountClass::AddLog($log);
				
				//第七步,添加待收的金额
				$account_result =  accountClass::GetOne(array("user_id"=>$tender_userid));
				$log['user_id'] = $tender_userid;
				$log['type'] = "tender_success_frost";
				$log['money'] = $recover_all;
				$log['total'] = $account_result['total']+$log['money'];
				$log['use_money'] = $account_result['use_money'];
				$log['no_use_money'] = $account_result['no_use_money'];
				$log['collection'] = $account_result['collection']+$log['money'];
				$log['use_money_yes'] = $account_result['use_money_yes'];
				$log['use_money_no'] = $account_result['use_money_no'];
				$log['to_user'] = $user_id;
				$log['remark'] = "投标[{$borrow_url}]成功待收金额增加";
				accountClass::AddLog($log);
				
				
				
				
				//第九步,提醒设置
				$remind['nid'] = "tender_success";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $tender_userid;
				$remind['article_id'] = $borrow_nid;
				$remind['code'] = "borrow";
				$remind['title'] = "投资({$borrow_username})的标[<font color=red>{$borrow_name}</font>]满标审核成功";
				$remind['content'] = "你所投资的标[{$borrow_url}]在".date("Y-m-d",time())."已经审核通过";
				$remind['type'] = "system";
				remindClass::sendRemind($remind);
				
				
				//第十步,投资者的信用积分增加
				$credit['nid'] = "tender_success";
				$credit['article_id'] = $tender_id;
				$credit['user_id'] = $tender_userid;
				$credit['from_userid'] = $borrow_userid;
				$credit['credit'] = round($tender_account*0.01);
				$credit['remark'] = "投资成功加{$credit['credit']}分";
				creditClass::UpdateCredit($credit);//更新积分
				
				//第十步,更新投资人的状态
				$sql = "update `{borrow_tender}` set status=1 where id={$tender_id}";
				$mysql->db_query($sql);
			}	
			
			//第十一步，更新借款标的信息$nowtime = time();
			$nowtime= time();
			$endtime = get_times(array("num"=>$borrow_result["borrow_period"],"time"=>$nowtime));
			
			if ($borrow_result["borrow_style"]==1){
				$_each_time = "每三个月后".date("d",$nowtime)."日";
				$nexttime = get_times(array("num"=>3,"time"=>$nowtime));
			}else{
				$_each_time = "每月".date("d",$nowtime)."日";
				$nexttime = get_times(array("num"=>1,"time"=>$nowtime));
			}
			$_equal["account"] = $borrow_result['account'];
			$_equal["period"] = $borrow_result["borrow_period"];
			$_equal["apr"] = $borrow_result["borrow_apr"];
			$_equal["type"] = "all";
			$equal_result = EqualInterest($_equal);
			$sql = "update `{borrow}` set repay_account_all='{$equal_result['account_total']}',repay_account_interest='{$equal_result['interest_total']}',repay_account_capital='{$equal_result['capital_total']}',repay_account_wait='{$equal_result['account_total']}',repay_account_interest_wait='{$equal_result['interest_total']}',repay_account_capital_wait='{$equal_result['capital_total']}',repay_last_time='{$endtime}',repay_next_time='{$nexttime}',borrow_success_time='{$nowtime}',repay_each_time='{$_each_time}'  where borrow_nid='{$borrow_nid}'";
			$mysql->db_query($sql);
			
			//第十二步，借款者总金额增加。
			$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
			$log['user_id'] = $borrow_userid;
			$log['type'] = "borrow_success";
			$log['money'] = $borrow_account;
			$log['total'] =$account_result['total']+$log['money'];
			$log['use_money'] = $account_result['use_money']+$log['money'];
			$log['no_use_money'] = $account_result['no_use_money'];
			$log['collection'] = $account_result['collection'];
			if ($borrow_cash_status==1){
				$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
			}else{
				$log['use_money_yes'] = $account_result['use_money_yes'];
				$log['use_money_no'] = $account_result['use_money_no']+$log['money'];
			}
			$log['to_user'] = "0";
			$log['remark'] = "通过[{$borrow_url}]借到的款";
			accountClass::AddLog($log);
			
			//第十三步，冻结借款标的保证金10%。
			$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
			$log['user_id'] = $borrow_userid;
			$log['type'] = "borrow_success_frost";
			if ($borrow_result['vouch_status']==1){
				//$forst_account =$borrow_account*0.05;
			}else{
				//$forst_account =$borrow_account*0.1;
			}
			$forst_account=0;
			
			$log['money'] = $forst_account;
			$log['total'] = $account_result['total'];
			$log['use_money'] = $account_result['use_money']-$log['money'];
			$log['no_use_money'] = $account_result['no_use_money']+$log['money'];
			$log['collection'] = $account_result['collection'];
			if ($borrow_cash_status==1){
				$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
			}else{
				$log['use_money_yes'] = $account_result['use_money_yes'];
				$log['use_money_no'] = $account_result['use_money_no']-$log['money'];
			}
			$log['to_user'] = "0";
			$log['remark'] = "冻结借款标的[{$borrow_url}]的保证金";
			accountClass::AddLog($log);
				
				 
			//第十四步，扣除2%的手续费
			
			$UsersVip=usersClass::GetUsersVip(array("user_id"=>$borrow_userid));
			if ($UsersVip['status']==1){
			     if (IsExiest($_G['system']["con_borrow_success_vip_fee"])!=""){
				   $borrow_fee = $_G['system']["con_borrow_success_vip_fee"]*0.01;
			      }else{
				  $borrow_fee = 0.02;
			      }
			}else{
			    if (IsExiest($_G['system']["con_borrow_success_fee"])!=""){
				   $borrow_fee = $_G['system']["con_borrow_success_fee"]*0.01;
			      }else{
				  $borrow_fee = 0.02;
			      }
			}
			
			
			if ($borrow_period>2){
				$money = round($borrow_account*$borrow_fee+($borrow_result["borrow_period"]-2)*0.002*$borrow_account,2);
			}else{
				$money = round($borrow_account*$borrow_fee,2);
			}
			$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
			$log['user_id'] = $borrow_userid;
			$log['type'] = "borrow_fee";
			$log['money'] = $money;
			$log['total'] = $account_result['total']-$log['money'];
			$log['use_money'] = $account_result['use_money']-$log['money'];
			$log['no_use_money'] = $account_result['no_use_money'];
			$log['collection'] = $account_result['collection'];
			if ($borrow_cash_status==1){
				$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
			}else{
				$log['use_money_yes'] = $account_result['use_money_yes'];
				$log['use_money_no'] = $account_result['use_money_no']-$log['money'];
			}
			$log['to_user'] = "0";
			$log['remark'] = "借款[{$borrow_url}]的手续费";
			accountClass::AddLog($log);
			
			//第十五步，判断vip会员费是否扣除
		    accountClass::AccountVip(array("user_id"=>$borrow_userid));
			
			
			//第十六步，给介绍人的提成
			$sql = "select p1.invite_userid,p1.invite_money,p2.username  from `{user}` as p1 left join `{user}` as p2 on p1.invite_userid = p2.user_id where p1.user_id = '{$borrow_userid}' ";
			$result = $mysql ->db_fetch_array($sql);
			if ($result['invite_userid']!="" && $result['invite_money']!="" && $result['invite_money']<=0){	
				//给介绍人提成
				$vip_ticheng = (!isset($_G['system']['con_vip_ticheng']) || $_G['system']['con_vip_ticheng']=="")?20:$_G['system']['con_vip_ticheng'];
				$account_result =  accountClass::GetOne(array("user_id"=>$result['invite_userid']));
				$log['user_id'] = $result['invite_userid'];
				$log['type'] = "invite_ticheng";
				$log['money'] = $vip_ticheng;
				$log['total'] = $account_result['total']+$log['money'];
				$log['use_money'] = $account_result['use_money']+$log['money'];
				$log['no_use_money'] = $account_result['no_use_money'];
				$log['collection'] = $account_result['collection'];
				$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
				$log['to_user'] = "0";
				$log['remark'] = "邀请用户注册(<a href=\'/u/{$result['borrow_userid']}\' target=_blank>{$result['borrow_username']}</a>)成为VIP的提成";
				accountClass::AddLog($log);
				$sql = "update `{user}` set invite_money=$vip_ticheng where user_id='{$borrow_userid}'";
				$mysql -> db_query($sql);
			}
			
			//第17步，紧急标的操作
			if ($borrow_result["urgent_status"]==1){
				//紧急标的支出。
				$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
				$log['user_id'] = $borrow_userid;
				$log['type'] = "urgent_repay";
				$log['money'] =  $_G['system']['con_urgent_fee'];
				$log['total'] = $account_result['total']-$log['money'];
				$log['use_money'] = $account_result['use_money']-$log['money'];
				$log['no_use_money'] = $account_result['no_use_money'];
				$log['collection'] = $account_result['collection'];
				$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
				$log['to_user'] = $vouch_userid;
				$log['remark'] = "借款标[{$borrow_url}]借款成功的紧急标支出";
				accountClass::AddLog($log);
			
			}
			
			//第17步，担保标的操作
			if ($borrow_result["vouch_status"]==1){
				
				$result = self::GetVouchList(array("limit"=>"all","borrow_nid"=>$borrow_nid));
				if ($result!=""){
					foreach ($result as $key => $value){
					
						//1,首先更新担保的状态为1，表示担保成功
						$vouch_account = $value['account'];
						$vouch_userid = $value['user_id'];
						$vouch_id = $value['id'];
						$vouch_award = $value['award_account'];
						$sql = "update `{borrow_vouch}` set status=1 where id = {$vouch_id}";
						$mysql -> db_query($sql);
						
						//2,判断是否进行担保奖励担保奖励借款成功的奖励。
						if ($borrow_result["vouch_award_status"]==1){
							$account_result =  accountClass::GetOne(array("user_id"=>$vouch_userid));
							
							$log['user_id'] = $vouch_userid;
							$log['type'] = "vouch_success_award";
							$log['money'] = $vouch_account*$borrow_result["vouch_award_scale"]*0.01;
							$log['total'] = $account_result['total']+$log['money'];
							$log['use_money'] = $account_result['use_money']+$log['money'];
							$log['no_use_money'] = $account_result['no_use_money'];
							$log['collection'] = $account_result['collection'];
							$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
							$log['use_money_no'] = $account_result['use_money_no'];
							$log['to_user'] = $borrow_userid;
							$log['remark'] = "担保借款标[{$borrow_url}]借款成功的担保奖励";
							accountClass::AddLog($log);
						
							//借款成功的奖励支出。
							$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
							$log['user_id'] = $borrow_userid;
							$log['type'] = "vouch_success_awardpay";
							$log['money'] =  $vouch_account*$borrow_result["vouch_award_scale"]*0.01;
							$log['total'] = $account_result['total']-$log['money'];
							$log['use_money'] = $account_result['use_money']-$log['money'];
							$log['no_use_money'] = $account_result['no_use_money'];
							$log['collection'] = $account_result['collection'];
							$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
							$log['use_money_no'] = $account_result['use_money_no'];
							$log['to_user'] = $vouch_userid;
							$log['remark'] = "担保借款标的[{$borrow_url}]借款成功的担保奖励支出";
							accountClass::AddLog($log);
						}
						
						
						//将还款数据添加到vouch_collection标里面去
						/*
						$_data['account'] = $vouch_account;
						$_data['year_apr'] = $borrow_result["borrow_apr"];
						$_vouch_account = round($vouch_account/$borrow_result["borrow_period"],2);
						for ($i=0;$i<$borrow_result["borrow_period"];$i++){
							if ($i==$borrow_result["borrow_period"]-1){
								$_vouch_account = $vouch_account - $_vouch_account*$i;
							}
							$repay_time = get_times(array("time"=>time(),"num"=>$i+1));
							$sql = "insert into `{borrow_vouch_recover}` set borrow_nid={$borrow_nid},`addtime` = '".time()."',`addip` = '".ip_address()."',user_id=$vouch_userid ,`order` = {$i},vouch_id={$vouch_id},status=0,repay_account = '{$_vouch_account}',repay_time='{$repay_time}'";	
							$mysql->db_query($sql);
						}
						*/
						
						$_equal["account"] = $vouch_account;
						$_equal["period"] = $borrow_result["borrow_period"];
						$_equal["apr"] = $borrow_result["borrow_apr"];
						$_equal["type"] = "";
						$_equal["style"] = $borrow_result["borrow_style"];
						$equal_result = EqualInterest($_equal);
						foreach ($equal_result as $period_key => $value){
							$sql = "insert into `{borrow_vouch_recover}` set `addtime` = '".time()."',";
							$sql .= "`addip` = '".ip_address()."',user_id='{$vouch_userid}',status=0,vouch_id={$vouch_id},`borrow_nid`='{$borrow_nid}',`borrow_userid`='{$borrow_userid}',`order`='{$period_key}',";
							$sql .= "`repay_time`='{$value['repay_time']}',`repay_account`='{$value['account_all']}',";
							$sql .= "`repay_interest`='{$value['account_interest']}',`repay_capital`='{$value['account_capital']}'";
							$mysql->db_query($sql);
						}
					}
					
					$_borrow_account = round($borrow_account/$borrow_period,2);
					for ($i=0;$i<$borrow_period;$i++){
						if ($i==$borrow_period-1){
							$_borrow_account = $borrow_account - $_borrow_account*$i;
						}
						$repay_time = get_times(array("time"=>time(),"num"=>$i+1));
						$sql = "insert into `{borrow_vouch_repay}` set borrow_nid={$borrow_nid},`addtime` = '".time()."',`addip` = '".ip_address()."',user_id=$borrow_userid ,`order` = {$i},status=0,repay_account = '{$_borrow_account}',repay_time='{$repay_time}'";	
						$mysql->db_query($sql);
					}
				}
				
				
				//扣除借款担保额度
				//添加额度记录
				$amountlog_result = self::GetAmountOne($borrow_userid,"borrow_vouch");
				$amountlog["user_id"] = $borrow_userid;
				$amountlog["type"] = "borrow_vouch_success";
				$amountlog["amount_type"] = "borrow_vouch";
				$amountlog["account"] = $borrow_account;
				$amountlog["account_all"] = $amountlog_result['account_all'];
				$amountlog["account_use"] = $amountlog_result['account_use'] - $amountlog['account'];
				$amountlog["account_nouse"] = $amountlog_result['account_nouse'] + $amountlog['account']; 
				$amountlog["remark"] = "担保借款[{$borrow_url}]审核通过扣去借款担保额度";
				self::AddAmountLog($amountlog);
				
			}else{
				//扣除借款信用额度
				
				//添加额度记录
				$amountlog_result = self::GetAmountOne($borrow_userid,"credit");
				$amountlog["user_id"] = $borrow_userid;
				$amountlog["type"] = "borrow_success";
				$amountlog["amount_type"] = "credit";
				$amountlog["account"] = $borrow_account;
				$amountlog["account_all"] = $amountlog_result['account_all'];
				$amountlog["account_use"] = $amountlog_result['account_use'] - $amountlog['account'];
				$amountlog["account_nouse"] = $amountlog_result['account_nouse'] + $amountlog['account']; 
				$amountlog["remark"] = "借款标[{$borrow_url}]满标审核通过，借款信用额度减少";
				self::AddAmountLog($amountlog);
			}
			
			
			
			//提醒设置
			$remind['nid'] = "borrow_review_yes";
			$remind['sent_user'] = "0";
			$remind['receive_user'] = $borrow_userid;
			$remind['code'] = "borrow";
			$remind['article_id'] = $borrow_nid;
			$remind['title'] = "招标[{$borrow_name}]满标审核成功";
			$remind['content'] = "你的借款标[{$borrow_url}]在".date("Y-m-d",time())."已经审核通过";
			$remind['type'] = "system";
			remindClass::sendRemind($remind);
			
			
			//添加用户的动态
			$_trend['user_id'] = $borrow_userid;
			$_trend["type"] = "borrow_reverify_success";
			$_trend['content'] = "借款标[{$borrow_url}]通过了复审";
			$result = userClass::AddUserTrend($_trend);
			
		}
		
		//满标审核失败
		elseif ($status == 4){
			//返回所有投资者的金钱。
			$tender_result = self::GetTenderList(array("borrow_nid"=>$borrow_nid,"limit"=>"all"));
			foreach ($tender_result as $key => $value){
				$tender_userid = $value['user_id'];
				$tender_account= $value['account'];
				$tender_id= $value['id'];
				$account_result =  accountClass::GetOne(array("user_id"=>$tender_userid));
				$log['user_id'] = $tender_userid;
				$log['type'] = "tender_false";
				$log['money'] = $tender_account;
				$log['total'] = $account_result['total'];
				$log['use_money'] = $account_result['use_money']+$log['money'];
				$log['no_use_money'] = $account_result['no_use_money']-$log['money'];
				$log['collection'] = $account_result['collection'];
				$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
				$log['use_money_no'] = $account_result['use_money_no']-$log['money'];
				$log['to_user'] = $user_id;
				$log['remark'] = "招标[{$borrow_url}]失败返回的投标额";
				accountClass::AddLog($log);
				
				
				//提醒设置
				$remind['nid'] = "tender_false";
				$remind['sent_user'] = "0";
				$remind['code'] = "borrow";
				$remind['article_id'] = $borrow_nid;
				$remind['receive_user'] = $value['user_id'];
				$remind['title'] = "投资的标[<font color=red>{$borrow_name}</font>]满标审核失败";
				$remind['content'] = "你所投资的标[{$borrow_url}]在".date("Y-m-d",time())."审核失败,失败原因：{$data['reverify_remark']}";
				$remind['type'] = "system";
				remindClass::sendRemind($remind);
				
				//第十步,更新投资人的状态
				$sql = "update `{borrow_tender}` set status=2 where id={$tender_id}";
				$mysql->db_query($sql);
				
				//第17步，担保标的操作
				if ($borrow_result["vouch_status"]==1){
					
					$result = self::GetVouchList(array("limit"=>"all","borrow_nid"=>$borrow_nid));
					if ($result!=""){
						foreach ($result as $key => $value){
						
							//1,首先更新担保的状态为2，表示担保失败
							$vouch_account = $value['account'];
							$vouch_userid = $value['user_id'];
							$vouch_id = $value['id'];
							$vouch_award = $value['award_account'];
							
							$sql = "update `{borrow_vouch}` set status=2 where id = '{$vouch_id}'";
							
							$mysql -> db_query($sql);
							
							//2,投资担保人的担保额度返回
							//添加额度记录
							$amountlog_result = self::GetAmountOne($vouch_userid,"tender_vouch");
							$amountlog["user_id"] = $vouch_userid;
							$amountlog["type"] = "tender_vouch_false";
							$amountlog["amount_type"] = "tender_vouch";
							$amountlog["account"] = $vouch_account;
							$amountlog["account_all"] = $amountlog_result['account_all'];
							$amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
							$amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account']; 
							$amountlog["remark"] = "担保借款审核通过";
							self::AddAmountLog($amountlog);
						}	
					}
				}
			}
			
			//提醒设置
			$remind['nid'] = "borrow_review_no";
			$remind['sent_user'] = "0";
			$remind['code'] = "borrow";
			$remind['article_id'] = $borrow_nid;
			$remind['receive_user'] = $borrow_userid;
			$remind['title'] = "你所申请的标[<font color=red>{$borrow_name}</font>]满标审核失败";
			$remind['content'] = "你所申请的标[{$borrow_url}]在".date("Y-m-d",time())."审核失败,失败原因：{$data['repayment_remark']}";
			$remind['type'] = "system";
			remindClass::sendRemind($remind);
		}
		
		//如果有设置奖励并且招标成功，或者失败也奖励
		if ($borrow_result['award_status']!=0){
			if ($status == 3 || $borrow_result['award_false']==1){
				$tender_result = self::GetTenderList(array("borrow_nid"=>$borrow_nid,"limit"=>"all"));
				foreach ($tender_result as $key => $value){
					//投标奖励扣除和增加。
					if ($borrow_result['award_status']==1){
						$money = round(($value['account']/$borrow_account)*$borrow_result['award_account'],2);
					}elseif ($borrow_result['award_status']==2){
						$money = round((($borrow_result['award_scale']/100)*$value['account']),2);
					}
					
					$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
					$log['user_id'] = $value['user_id'];
					$log['type'] = "tender_award_add";
					$log['money'] = $money;
					$log['total'] = $account_result['total']+$log['money'];
					$log['use_money'] = $account_result['use_money']+$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] = $account_result['collection'];
					$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
					$log['use_money_no'] = $account_result['use_money_no'];
					$log['to_user'] = $borrow_userid;
					$log['remark'] = "借款[{$borrow_url}]的奖励";
					accountClass::AddLog($log);
					
					$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
					$log['user_id'] = $borrow_userid;
					$log['type'] = "borrow_award_lower";
					$log['money'] = $money;
					$log['total'] = $account_result['total']-$log['money'];
					$log['use_money'] = $account_result['use_money']-$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] = $account_result['collection'];
					$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
					$log['use_money_no'] = $account_result['use_money_no'];
					$log['to_user'] = $value['user_id'];
					$log['remark'] = "扣除借款[{$borrow_url}]的奖励";
					accountClass::AddLog($log);
				}
			}
		}
		
		//更新满标时的操作人
		$sql = " update `{borrow}` set forst_account='{$forst_account}',reverify_userid='{$data['reverify_userid']}',reverify_remark='{$data['reverify_remark']}',reverify_time='".time()."',status='{$data['status']}' where borrow_nid='{$borrow_nid}'";
		return $mysql ->db_query($sql);
	}
	
	
	/**
	 * 查看
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function GetInvest($data = array()){
		global $mysql,$_G;
		$borrow_nid = $data['id'];
		//第一步，获取借款标的信息
		$sql = "select * from `{borrow}`  where  borrow_nid = '{$borrow_nid}'";
		$result_borrow = $mysql->db_fetch_array($sql);
		
		if ($result_borrow==false){
			return "borrow_nid_empty";
		}
		$user_id = $result_borrow['user_id'];
		
		$_data["account"] = 100;
		$_data["period"] = $result_borrow["borrow_period"];
		$_data["apr"] = $result_borrow["borrow_apr"];
		$_data["style"] = $result_borrow["borrow_style"];
		$_data["type"] = "all";
		$_result = EqualInterest($_data);
		$result_borrow["borrow_interest"] = $_result["interest_total"];
		
		if (IsExiest($data["hits"])=="auto"){
			$sql = "update `{borrow}` set hits = hits+1 where  borrow_nid = '{$borrow_nid}'";
			$mysql->db_query($sql);
		}
		
		$result_borrow["other_time"] = $result_borrow["verify_time"]+$result_borrow["borrow_valid_time"]*60*60*24-time();
		
		//第二步，获取用户的基本信息
		$sql = "select p1.*,p2.credit as credit_jifen,p3.pic as credit_pic from `{user}` as p1 
				left join {credit} as p2 on p1.user_id=p2.user_id 
				left join {credit_rank} as p3 on p2.credit<=p3.point2  and p2.credit>=p3.point1
								 where  p1.user_id=$user_id";
		$result['user'] = $mysql->db_fetch_array($sql);
		
		//第三步，获取借款用户的资金账号信息
		$sql = "select * from `{account}` where  user_id={$user_id}";
		$result['account'] = $mysql->db_fetch_array($sql);
		
		if($_G['user_id']>0){
		//第四步，获取当前用户的资金账号信息
		$sql = "select * from `{account}`  where  user_id={$_G['user_id']}";
		$result['user_account'] = $mysql->db_fetch_array($sql);
		}
		
		//第五步，获取投资的担保额度
		$result['amount'] =  self::GetAmountOne($user_id);
		
		//第六步，统计
		$result["count"] = self::GetBorrowCount(array("user_id"=>$user_id));
		
		//第七步，获取当前用户的资金账号信息
		$sql = "select p1.*,p2.username as kefu_username from `{borrow_vip}` as p1 left join `{user}` as p2 on p1.kefu_userid = p2.user_id  where  p1.user_id={$user_id}";
		$result['borrow_vip'] = $mysql->db_fetch_array($sql);
		
		//第八步，获取借款用户的资金账号信息
		$sql = "select * from `{userinfo}` where  user_id={$user_id}";
		$result['userinfo'] = $mysql->db_fetch_array($sql);
		
		//第九步，判断用户是否逾期
		$sql = "select 1 from `{borrow_repay}` where  borrow_nid = '{$borrow_nid}' and user_id='{$user_id}' and repay_status=0";
		$_result = $mysql->db_fetch_array($sql);
		$result_borrow['late_status'] = 0;
		if ($_result!=false){
			foreach ($_result as $key => $value){
				$late = self::LateInterest(array("time"=>$value['repay_time'],"account"=>$value['capital']));
				if ($late_result['late_days']>0){
					$result_borrow['late_status'] = 1;
				}
			}
		}
		$result['borrow'] = $result_borrow;
		return $result;
		
		
	}
	
	//new 新版本的借款统计
	function GetBorrowCount($data = array()){
		global $mysql;
		$user_id =$data["user_id"];
		if ($user_id=="") return "borrow_user_id_empty";
		$_result = array();
		
		//统计借款的信息
		$sql = "select count(1) as num,sum(account) as borrow_account,sum(repay_account_all) as repay_account_all,sum(repay_account_interest) as repay_account_interest,sum(repay_account_capital) as repay_account_capital,sum(repay_account_yes) as repay_account_yes,sum(repay_account_interest_yes) as repay_account_interest_yes,sum(repay_account_capital_yes) as repay_account_capital_yes,sum(repay_account_wait) as repay_account_wait,sum(repay_account_interest_wait) as repay_account_interest_wait,sum(repay_account_capital_wait) as repay_account_capital_wait,status from `{borrow}` where user_id={$user_id} group by status";
		$result = $mysql -> db_fetch_arrays($sql);
		if ($result != ""){
			foreach ($result as  $key => $value){
				$_result["borrow_times"] += $value["num"];
				
				if ($value["status"]=="3"){
					$_result["borrow_success_times"] = $value["num"];
					$_result["borrow_success_account"] = $value["borrow_account"];
					
					$_result["repay_account_all"] += $value["repay_account_all"];
					$_result["repay_account_interest"] += $value["repay_account_interest"];
					$_result["repay_account_capital"] += $value["repay_account_capital"];
					$_result["repay_account_yes"] += $value["repay_account_yes"];
					$_result["repay_account_interest_yes"] += $value["repay_account_interest_yes"];
					$_result["repay_account_capital_yes"] += $value["repay_account_capital_yes"];
					$_result["repay_account_wait"] += $value["repay_account_wait"];
					$_result["repay_account_interest_wait"] += $value["repay_account_interest_wait"];
					$_result["repay_account_capital_wait"] += $value["repay_account_capital_wait"];
				}elseif ($value["status"]=="1"){
					$_result["borrow_now_times"] = $value["num"];
					$_result["borrow_now_account"] = $value["borrow_account"];
				}elseif ($value["status"]=="0"){
					$_result["borrow_wait_times"] = $value["num"];
					$_result["borrow_wait_account"] = $value["borrow_account"];
				}elseif ($value["status"]=="2"){
					$_result["borrow_false_times"] = $value["num"];
					$_result["borrow_false_account"] = $value["borrow_account"];
				}elseif ($value["status"]=="4"){
					$_result["borrow_fullfalse_times"] = $value["num"];
					$_result["borrow_fullfalse_account"] = $value["borrow_account"];
				}elseif ($value["status"]=="5"){
					$_result["borrow_cancel_times"] = $value["num"];
					$_result["borrow_cancel_account"] = $value["borrow_account"];
				}
				if($value["status"]==1 || $value["status"]==3){
					$_result["borrow_publish_times"] += $value["num"];
				}
			}
		}
		
		
		//统计投资的信息
		$sql = "select count(1) as num,sum(account) as borrow_account,sum(account_tender) as tender_account_num,sum(recover_account_all) as recover_account_all,sum(recover_account_interest) as recover_account_interest,sum(recover_account_yes) as recover_account_yes,sum(recover_account_interest_yes) as recover_account_interest_yes,sum(recover_account_capital_yes) as recover_account_capital_yes,sum(recover_account_wait) as recover_account_wait,sum(recover_account_interest_wait) as recover_account_interest_wait,sum(recover_account_capital_wait) as recover_account_capital_wait,status from `{borrow_tender}` where user_id=$user_id group by status";
		$result = $mysql -> db_fetch_arrays($sql);
		if ($result != ""){
			foreach ($result as  $key => $value){
				if ($value["status"]==1){
					$_result["tender_success_times"] = $value["num"];
					$_result["tender_success_account"] = $value["borrow_account"];//成功借出总额
					$_result["recover_account_all"] += $value["recover_account_all"];
					$_result["recover_account_interest"] += $value["recover_account_interest"];
					$_result["recover_account_yes"] += $value["recover_account_yes"];
					$_result["recover_account_interest_yes"] += $value["recover_account_interest_yes"];
					$_result["recover_account_capital_yes"] += $value["recover_account_capital_yes"];
					$_result["recover_account_wait"] = $value["recover_account_wait"];
					$_result["recover_account_interest_wait"] += $value["recover_account_interest_wait"];
					$_result["recover_account_capital_wait"] += $value["recover_account_capital_wait"];
				}
				if ($value["status"]==0){
					$_result["tender_now_times"] = $value["num"];
					$_result["tender_now_account"] = $value["borrow_account"];
				}
				
				$_result["tender_account_num"] = $value["tender_account_num"];//投标总额
				
				if ($value["status"]==2){
					$_result["tender_false_times"] = $value["num"];
					$_result["tender_false_account"] = $value["borrow_account"];
				}
				
				if ($value["status"]==3){
					$_result["tender_cancel_times"] = $value["num"];
					$_result["tender_cancel_account"] = $value["borrow_account"];
				}
				
			}
		}
		
		//逾期未还款的统计
		$sql = "select repay_account,repay_time,repay_yestime,repay_status from `{borrow_repay}` where user_id='{$user_id}' ";
		$result = $mysql->db_fetch_arrays($sql);
		if ($result!=""){
			$_result["repay_times_yes"] = 0;//已还款次数
			$_result["repay_account_yes"] = 0;//已还款总额
			$_result["repay_times_wait"] = 0;//未还款次数
			$_result["repay_account_wait"] = 0;//未还款总额
			$_result["repay_late_times_wait"] = 0;//逾期未还款次数
			$_result["repay_late_account_wait"] = 0;//逾期未还款总额
			$_result["repay_late_times_yes"] = 0;//逾期未还款次数
			$_result["repay_late_account_yes"] = 0;//逾期未还款总额
			$_result["repay_late_30in_times_yes"] = 0;//逾期30天以内已还款次数
			$_result["repay_late_30in_account_yes"] = 0;//逾期30天以内已还款总额
			$_result["repay_late_30out_times_yes"] = 0;//逾期30天以内已还款次数
			$_result["repay_late_30out_account_yes"] = 0;//逾期30天以已未还款总额
			$_result["repay_late_30in_times_wait"] = 0;//逾期30天以内未还款次数
			$_result["repay_late_30in_account_wait"] = 0;//逾期30天以内未还款总额
			$_result["repay_late_30out_times_wait"] = 0;//逾期30天以内未还款次数
			$_result["repay_late_30out_account_wait"] = 0;//逾期30天以内未还款总额
			$_result["repay_late_30out_times_wait"] = 0;//逾期30天以内未还款次数
			$_result["repay_advance_times_yes"] = 0;//提前还款
			$_result["repay_advance_account_yes"] = 0;//提前还款
			$_result["repay_zhunshi_times_yes"] = 0;//准时还款
			$_result["repay_zhunshi_account_yes"] = 0;//准时还款
			foreach ($result as $key => $value){
				//已经还款
				if ($value['repay_status']==1){
					
					$re_time = (strtotime(date("Y-m-d",$value["repay_time"]))-strtotime(date("Y-m-d",$value["repay_yestime"])))/(60*60*24);
					$_result["repay_times_yes"] +=1;
					$_result["repay_account_yes"] += $value["repay_account"];//已还款总额
					if ($re_time<0){
						$_result["repay_late_times_yes"] += 1;
						$_result["repay_late_account_yes"] += $value["repay_account"];
						if ($re_time>=-30){ 
							$_result["repay_late_30in_times_yes"] += 1;
							$_result["repay_late_30in_account_yes"] += $value["repay_account"];
						}else{
							$_result["repay_late_30out_times_yes"] += 1;
							$_result["repay_late_30out_account_yes"] += $value["repay_account"];
						}
					}else{
						if ($re_time>15){
							$_result["repay_advance_times_yes"] +=1;
							$_result["repay_advance_account_yes"] +=$value["repay_account"];
						}else{
							$_result["repay_zhunshi_times_yes"] +=1;
							$_result["repay_zhunshi_account_yes"] +=$value["repay_account"];
						}
					
					}
				}
				
				//未还款
				else{
					$re_time = (strtotime(date("Y-m-d",$value["repay_time"]))-strtotime(date("Y-m-d",time())))/(60*60*24);
					$_result["repay_times_wait"] +=1;
					$_result["repay_account_wait"] += $value["repay_account"];//已还款总额
					if ($re_time<0){
						$_result["repay_late_times_wait"] += 1;
						$_result["repay_late_account_wait"] += $value["repay_account"];
						if ($re_time>=-30){ 
							$_result["repay_late_30in_times_wait"] += 1;
							$_result["repay_late_30in_account_wait"] += $value["repay_account"];
						}else{
							$_result["repay_late_30out_times_wait"] += 1;
							$_result["repay_late_30out_account_wait"] += $value["repay_account"];
						}
					}
				}
			}		
		}
		
		//网站垫付未还
		$sql = "select sum(repay_account) as repay_account_all,count(1) as num from `{borrow_repay}` where repay_status=0 and repay_web=1 and user_id='{$user_id}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=""){
			$_result["repay_web_norepay"]["account"] = $result["repay_account_all"];
			$_result["repay_web_norepay"]["num"] = $result["num"];
		}
		//逾期已还款的统计
		$sql = "select repay_account,repay_time,repay_yestime from `{borrow_repay}` where user_id='{$user_id}' and repay_status=1";
		$result = $mysql->db_fetch_arrays($sql);
		$_result["repay_advance_yes_times"] = 0;//提前还款的次数
		$_result["repay_zhunshi_yes_times"] = 0;//准时还款
		$_result["repay_late_times"] = 0;//逾期已还款的次数
		$_result["repay_late_yes_times_all"] = 0;
		$_result["repay_late_yes_account_all"] = 0;
		$_result["repay_late_yes_interest_all"] = 0;
		$_result["repay_late_yes_0_30_times"] = 0;
		$_result["repay_late_yes_30days_times"] = 0;
		$_result["repay_late_yes_0_30_account"] = 0;
		$_result["repay_late_yes_30days_account"] = 0;
		$_result["repay_late_yes_0_30_interest"] = 0;
		$_result["repay_late_yes_30days_interest"] = 0;
		foreach ($result as $key => $value){
			$_late['account'] =  $value["repay_account"];
			$_late["time"] = $value["repay_time"];
			$_late["yestime"] = $value["repay_yestime"];
			$late_result = self::LateInterest($_late);
			if ($late_result['late_days']>0){
				if($late_result['late_days']>0 && $late_result['late_days']<=30){
					$_result["repay_late_yes_0_30_times"] +=1;
					$_result["repay_late_yes_0_30_account"] += $value["repay_account"];
					$_result["repay_late_yes_0_30_interest"] += $late_result["late_interest"];
				}elseif ($late_result['late_days']>30){
					$_result["repay_late_yes_30days_times"] +=1;
					$_result["repay_late_yes_30days_account"] += $value["repay_account"];
					$_result["repay_late_yes_30days_interest"] += $late_result["late_interest"];
				}
				$_result["repay_late_yes_times_all"] +=1;
				$_result["repay_late_yes_account_all"] += $value["repay_account"];
				$_result["repay_late_yes_interest_all"] += $late_result["late_interest"];
			}
		}
		
		//网站垫付统计
		$sql = "select sum(late_interest) as late_interest_all,sum(late_forfeit) as late_forfeit_all,sum(recover_account) as recover_account_all from `{borrow_recover}` where user_id={$user_id} and recover_web=1";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=""){
			$_result["web_repay"]["account"] = $result['recover_account_all'];
		}
		
		
		//资金记录的统计
		$sql = "select sum(money) as account,count(1) as num,type from `{account_log}` where user_id='{$user_id}' group by type";
		$result = $mysql->db_fetch_arrays($sql);
		if ($result!=""){
			foreach ($result as $key => $value){
				$_result["account_log"][$value['type']]["account"] = $value['account'];
				$_result["account_log"][$value['type']]["num"] = $value['num'];
			}
		}
		
		//最近待收日期
		$sql = "select recover_time from `{borrow_recover}` where user_id={$user_id} and recover_status=0 order by recover_time asc";
		$result = $mysql -> db_fetch_array($sql);
		$_result["recover_new_time"] = $result["recover_time"];
		
		//等待满标
		$sql = "select count(1) as num from `{borrow}` where status=1 and account!=borrow_account_yes and user_id={$user_id}";
		$result = $mysql -> db_fetch_array($sql);
		$_result["borrow_full_wait_times"] = $result["num"];
		
		//待还款
		$sql = "select count(1) as num from `{borrow}` where status=3 and account!=repay_account_capital  and user_id={$user_id}";
		$result = $mysql -> db_fetch_array($sql);
		$_result["borrow_repay_wait_times"] = $result["num"];
		
		//最近待还日期
		$sql = "select repay_time,repay_account from `{borrow_repay}` where user_id={$user_id} and repay_status=0 order by repay_time asc";
		$result = $mysql -> db_fetch_array($sql);
		$_result["repay_new_time"] = $result["repay_time"];
		$_result["repay_new_account"] = $result["repay_account"];
		
		//统计额度的信息
		//额度管理
		$_result_amount = amountClass::GetAmountOne($user_id);		
		$_result["amount"] = $_result_amount;
		
		//统计用户的资金详情
		$_result["account"] = accountClass::GetOne(array("user_id"=>$user_id));
		
		//统计充值的类型
		$sql = "select type,sum(money) as account_all,count(1) as num from `{account_recharge}` where user_id={$user_id} and status=1 group by type";
		$result = $mysql->db_fetch_arrays($sql);
		if ($result!=""){
			foreach ($result as $key => $value){
				if ($value['type']==1){
					$_result["recharge_type"]["online"]["account"] = $value["account_all"];
					$_result["recharge_type"]["online"]["num"] = $value["num"];
				}elseif ($value['type']==2){
					$_result["recharge_type"]["downline"]["account"] = $value["account_all"];
					$_result["recharge_type"]["downline"]["num"] = $value["num"];
				}else{
					$_result["recharge_type"]["web"]["account"] = $value["account_all"];
					$_result["recharge_type"]["web"]["num"] = $value["num"];
				}
			
			}
		}
		
		//提现手续费
		$sql = "select sum(fee) as fee_account,count(1) as num from `{account_cash}` where user_id={$user_id} and status=1";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=""){
			$_result["account_log"]["cash_fee"]["account"] = $result["fee_account"];
			$_result["account_log"]["cash_fee"]["num"] = $result["num"];
		}		
		//总手续费
		$_result["fee_all"] = $_result["account_log"]["recharge_fee"]["account"]+$_result["account_log"]["cash_fee"]["account"];
		//var_dump($_result);
		$_result["recover_account_interest_mon"] = $_result["recover_account_interest_yes"]- $_result["account_log"]["tender_interest_fee"]["account"];
		return $_result;
	
	}
	
	
	//已成功的借款
	function GetTenderBorrowList($data){
		global $mysql,$_G;
		$user_id =$data['user_id'];
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		$_sql = "";
		if (IsExiest($data['type'])!=""){
			if ($data['type']=="wait"){
				$_sql .= " and p1.recover_account_all!=p1.recover_account_yes";
			}elseif ($data['type']=="yes"){
				$_sql .= " and p1.recover_account_all=p1.recover_account_yes";
			}
		}
		
		
		if (IsExiest($data['dotime1'])!=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p1.addtime > ".get_mktime($dotime1);
			}
		}
		
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.addtime < ".get_mktime($dotime2);
			}
		}
		if (IsExiest($data['tender_status'])!=""){
			$_sql .= " and p1.status = {$data['tender_status']}";
		}
		if (IsExiest($data['keywords']) !=""){
			$_sql .= " and (p2.`name` like '%".urldecode($data['keywords'])."%') ";
		}
		
		$_select  = "p2.*,p1.account as tender_account,p1.recover_account_yes,p1.recover_account_all,p1.account_tender,p2.account as borrow_account,p3.qq as borrow_userqq,p3.username as borrow_username,p4.credit,p5.pic as credit_pic";
		$sql = "select SELECT from `{borrow_tender}` as p1 left join `{borrow}` as p2 on p1.borrow_nid=p2.borrow_nid left join `{user}` as p3 on p2.user_id=p3.user_id left join `{credit}` as p4 on p2.user_id=p4.user_id left join `{credit_rank}` as p5  on p4.credit<=p5.point2  and p4.credit>=p5.point1 where p1.user_id={$user_id}  {$_sql} ";
	
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  'order by p1.`order` desc,p1.id desc', $_limit), $sql));
		}	
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array("count(*) as  num","",""),$sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
	}
	
	//收款明细
	function GetRecoverList($data){
		global $mysql,$_G;
		
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where 1=1 ";
		if (IsExiest($data['user_id'])!="" ){
			$_sql .= " and p1.user_id={$data['user_id']}";
		}
		if (IsExiest($data['status'])!="" ){
			$_sql .= " and p1.status={$data['status']}";
		}
		if (IsExiest($data['borrow_status'])!="" ){
			$_sql .= " and p2.status={$data['borrow_status']}";
		}
		if (IsExiest($data['username'])!="" ){
			$_sql .= " and p3.username like '%{$data['username']}%' ";
		}
		
		if (IsExiest($data['dotime1'])!=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p1.recover_time > ".get_mktime($dotime1);
			}
		}
		
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.recover_time < ".get_mktime($dotime2);
			}
		}
		if (IsExiest($data['type'])!=""){
			if ($data['type']=="yes"){
				$_sql .= " and p1.recover_status =1 ";
			}elseif ($data['type']=="wait"){
				$_sql .= " and p1.recover_status =0 ";
			}
		}
		if (IsExiest($data['keywords'])!=""){
			$_sql .= " and (p2.name like '%".urldecode($data['keywords'])."%') ";
		}
		
		$_order = " order by p1.id ";
		if (IsExiest($data['order'])!="" ){
			if ($data['order'] == "repay_time"){
				$_order = " order by p1.recover_time asc ";
			}elseif ($data['order'] == "order"){
				$_order = " order by p1.`order` desc,p1.id desc ";
			}
		}
		
		$_select = 'p1.*,p2.name as borrow_name,p2.borrow_period,p3.username,p4.username as borrow_username,p4.user_id as borrow_userid ';
		
		$sql = "select SELECT from `{borrow_recover}` as p1 
				left join `{borrow}` as p2 on  p2.borrow_nid = p1.borrow_nid
				left join `{user}` as p3 on  p3.user_id = p1.user_id
				left join `{user}` as p4 on  p4.user_id = p2.user_id
			   {$_sql} ORDER LIMIT";
				 
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$list  = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  $_order, $_limit), $sql));
			foreach ($list as $key => $value){
				$late = self::LateInterest(array("time"=>$value['recover_time'],"account"=>$value['capital']));
				
				if ($value['recover_status']==0){
					$list[$key]['late_days'] = $late['late_days'];
					if ($late['late_days']>30){
						$list[$key]['late_interest'] = 0;
					}else{
						$list[$key]['late_interest'] = round($late['late_interest']/2,2);
					}
				}else{
					$list[$key]['late_interest'] = 0;
					$list[$key]['late_days'] = 0;
				}
			}
			return $list;
		}	
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array(" count(*) as num ","",""),$sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order , $limit), $sql));		
		$list = $list?$list:array();
		foreach ($list as $key => $value){
			
			$late = self::LateInterest(array("time"=>$value['recover_time'],"account"=>$value['recover_capital']));
			
			if ($value['recover_status']==0){
				$list[$key]['late_days'] = $late['late_days'];
				if ($late['late_days']>30){
					$list[$key]['late_interest'] = 0;
				}else{
					$list[$key]['late_interest'] = round($late['late_interest']/2,2);
				}
			}else{
				$list[$key]['late_interest'] = 0;
				$list[$key]['late_days'] = 0;
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
	
	//逾期利息计算,金额按本金来计算
	//account 金额 time 还款时间,yestime,已还时间
	//返回late_days,late_interest
	function LateInterest($data){
		global $mysql,$_G;
		$late_rate = isset($_G['system']['con_late_rate'])?$_G['system']['con_late_rate']:0.008;
		if (IsExiest($data['yestime'])!=""){
		$now_time = get_mktime(date("Y-m-d",$data['yestime']));
		}else{
		$now_time = get_mktime(date("Y-m-d",time()));
		}
		$repayment_time = get_mktime(date("Y-m-d",$data['time']));
		$late_days = ($now_time - $repayment_time)/(60*60*24);
		$_late_days = explode(".",$late_days);
		$late_days = ($_late_days[0]<0)?0:$_late_days[0];
		$late_interest = round($data['account']*$late_rate*$late_days,2);
		if ($late_days==0) $late_interest=0;
		return array("late_days"=>$late_days,"late_interest"=>$late_interest );
	}
	/**
	 * 添加担保
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	public static function AddVouch($data = array()){
		global $mysql,$_G;
		if (!isset($data['borrow_nid']) || $data['borrow_nid']==""){
			return "borrow_nid_empty";
		}		
		
		if ($_G['user_result']['islock']==1){
			return "user_islock";
		}
		
		
		$sql = "insert into `{borrow_vouch}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$mysql->db_query($sql);
		$vouch_id = $mysql->db_insert_id();
		
		if ($vouch_id>0){
			$sql = "update  {borrow}  set vouch_account_yes=vouch_account_yes+{$data['account']},vouch_account_wait=vouch_account_wait-{$data['account']},vouch_times=vouch_times+1,vouch_account_scale = 100*(vouch_account_yes/vouch_account)  where borrow_nid='{$data['borrow_nid']}'";
			$mysql->db_query($sql);//更新已经担保的钱
			
			//添加额度记录
			$amountlog_result = self::GetAmountOne($data['user_id'],"tender_vouch");
			$amountlog["user_id"] = $data['user_id'];
			$amountlog["type"] = "tender_vouch_success";
			$amountlog["amount_type"] = "tender_vouch";
			$amountlog["account"] = $data['account'];
			$amountlog["account_all"] = $amountlog_result['account_all'];
			$amountlog["account_use"] = $amountlog_result['account_use'] - $amountlog['account'];
			$amountlog["account_nouse"] = $amountlog_result['account_nouse'] + $amountlog['account']; 
			$amountlog["remark"] = "担保成功";
			self::AddAmountLog($amountlog);
			return true;
		}else{
			return false;
		}
	}
	
	
	/**
	 * 查看投标的信息
	 *
	 * @param Array $data
	 * @return Array
	 */
	public static function BorrowRepay($data = array()){
		global $mysql,$_G;
		if (IsExiest($data['id'])==""){
			return "borrow_repay_id_empty";
		}
		if (IsExiest($data['user_id'])==""){
			return "borrow_user_id_empty";
		}
		
		$_sql = "";
		
		//第一步，获取还款的信息
		$sql = "select p1.*,p2.username from `{borrow_repay}` as p1 left join `{user}` as p2 on p1.user_id=p2.user_id where p1.id={$data['id']}";
		$result= $mysql->db_fetch_array($sql);
		if ($result==""){
			return "borrow_repay_id_empty";
		}
		if ($result["user_id"]!=$data["user_id"]){
			return "borrow_user_id_empty";
		}
		if ($result["status"]!=1){
			return "borrow_repay_error";
		}
		if ($result["repay_status"]==1){
			return "borrow_repay_yes";
		}
		$repay_id = $data["id"];
		$borrow_userid = $data["user_id"];
		$borrow_username = $result["username"];
		$borrow_nid = $result["borrow_nid"];
		$repay_web = $result["repay_web"];
		$repay_vouch = $result["repay_vouch"];
		$repay_period = $result["repay_period"];
		$repay_account = $result["repay_account"];//还款总额
		$repay_capital = $result["repay_capital"];//还款本金
		$repay_interest = $result["repay_capital"];//还款利息
		$repay_time = $result["repay_time"];//还款时间
		
		
		//第二步，判断上一期是否已还款
		if ($repay_period!=0){
			$_repay_period = $repay_period-1;
			$sql = "select repay_status from `{borrow_repay}` where `repay_period`=$_repay_period and borrow_nid={$borrow_nid}";
			$result = $mysql->db_fetch_array($sql);
			if ($result!=false && $result['repay_status']!=1){
				return "borrow_repay_up_notrepay";
			}
		}
		//第三步，得到借款标的信息
		$sql = "select * from `{borrow}` where borrow_nid = '{$borrow_nid}'";
		$result = $mysql->db_fetch_array($sql);
		$forst_account = $result["forst_account"];
		$borrow_name = $result['name'];
		$vouch_status = $result["vouch_status"];
		$borrow_period = $result["borrow_period"];
		$borrow_account = $result["account"];
		$borrow_url = "<a href=\'/invest/a{$result['borrow_nid']}.html\' target=_blank>{$result['name']}</a>";//借款的地址
		
		//第三步，检查是否逾期,并且计算逾期的费用
		$late = self::LateInterest(array("time"=>$repay_time,"account"=>$repay_account));
		$late_days = $late['late_days'];
		$late_interest = $late['late_interest'];
		$late_reminder =0 ;
		if ($late_days>30){
			$late_reminder = ($late_days-30)*$repay_account*0.002;
		}
		$late_account = $late_reminder + $late_interest;
		
				
		//第四步，判断可用余额是否够还款
		$sql = "select * from {account} where user_id = '{$data['user_id']}'";
		$account_result = $mysql->db_fetch_array($sql);
		if ($account_result['use_money']<$repay_account+$late_account){
			return "borrow_repay_account_use_none";
		}
		
		//第五步，(account)扣除可用余额还款部分
		$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
		$account_log['user_id'] = $borrow_userid;
		$account_log['type'] = "borrow_repay";
		$account_log['money'] = $repay_account;
		$account_log['total'] =$account_result['total']-$account_log['money'];
		$account_log['use_money'] = $account_result['use_money']-$account_log['money'];
		$account_log['no_use_money'] = $account_result['no_use_money'];
		$account_log['collection'] = $account_result['collection'];
		$account_log['use_money_yes'] = $account_result['use_money_yes'];
		$account_log['use_money_no'] = $account_result['use_money_no']-$account_log['money'];
		$account_log['to_user'] = "0";
		$account_log['remark'] = "对[{$borrow_url}]还款";
		
		accountClass::AddLog($account_log);
		
		
		//第六步，更新借款人的还款积分
		$re_time = (strtotime(date("Y-m-d",$repay_time))-strtotime(date("Y-m-d",time())))/(60*60*24);
		if ($re_time!=0){
			if ($re_time<0){
				if ($re_time>=-3 && $re_time<=-1){
					$credit['nid'] = "repay_late_1day";
				}
				elseif ($re_time>=-30 && $re_time<-3){
					$credit['nid'] = "repay_late_3day";
				}
				elseif ($re_time>=-90 && $re_time<-30){
					$credit['nid'] = "repay_late_30day";
				}
				elseif ( $re_time<-90){
					$credit['nid'] = "repay_late_90day";
				}
			}else{
				if ($re_time>=1 && $re_time<=3){
					$credit['nid'] = "repay_advance_1day";
				}elseif ($re_time>3 && $re_time<=15){
					$credit['nid'] = "repay_advance_3day";
				}elseif ($re_time>15 ){
					$credit['nid'] = "repay_advance_30day";
				}
			}
			$result = creditClass::GetTypeOne(array("nid"=>$credit['nid']));
			$credit['article_id'] = $repay_id;
			$credit['user_id'] = $borrow_userid;
			$credit['from_userid'] = 0;
			$credit['credit'] = $result['value'];
			$credit['remark'] = "还款[{$borrow_url}]第{$repay_period}期积分为{$credit['value']}分";
			creditClass::UpdateCredit($credit);//更新积分
		}
		
		
		//第七步，判断是否是最后的还款，是则解冻借款担保金
		if ($repay_period+1 == $borrow_period){
		
			//第八步，最后一起解除冻结的金额
			$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
			$account_log['user_id'] =$data['user_id'];
			$account_log['type'] = "borrow_frost";
			$account_log['money'] = $forst_account;
			$account_log['total'] =$account_result['total'];
			$account_log['use_money'] = $account_result['use_money']+$account_log['money'];
			$account_log['no_use_money'] = $account_result['no_use_money']-$account_log['money'];
			$account_log['collection'] = $account_result['collection'];
			$account_log['use_money_yes'] = $account_result['use_money_yes']+$account_log['money'];
			$account_log['use_money_no'] = $account_result['use_money_no'];
			$account_log['to_user'] = "0";
			$account_log['remark'] = "对[{$borrow_url}]借款的解冻";
			accountClass::AddLog($account_log);
	
			//第九步，最后一起解除冻结的金额
			$credit['nid'] = "borrow_success";
			$result = creditClass::GetTypeOne(array("nid"=>$credit['nid']));
			$credit['article_id'] = $borrow_nid;
			$credit['user_id'] = $borrow_userid;
			$credit['from_userid'] = 0;
			$credit['credit'] = round($borrow_account/100);
			$credit['remark'] = "借款[{$borrow_url}]借款成功加{$credit['credit']}分";
			creditClass::UpdateCredit($credit);//更新积分
			
			
		}
		
		
		
		//判断是否是担保标
		if ($vouch_status=="1"){
		
			//第十步，投资人投资担保额度的增加
			$sql = "select * from `{borrow_vouch_recover}` where borrow_nid='{$borrow_nid}' and `order`={$repay_period}";
			$result = $mysql->db_fetch_arrays($sql);
			
			if ($result!=""){
				foreach ($result as $key => $value){
					//添加额度记录
					$amountlog_result = self::GetAmountOne($value['user_id'],"tender_vouch");
					$amountlog["user_id"] = $value['user_id'];
					$amountlog["type"] = "tender_vouch_repay";
					$amountlog["amount_type"] = "tender_vouch";
					$amountlog["account"] = $value['repay_account'];
					$amountlog["account_all"] = $amountlog_result['account_all'];
					$amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
					$amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account']; 
					$amountlog["remark"] = "担保标[{$borrow_url}]还款成功，投资担保额度返还";
					self::AddAmountLog($amountlog);
					
					$sql = "update `{borrow_vouch_recover}` set repay_yestime = ".time().",repay_yesaccount = {$amountlog['account']},status=1 where id = {$value['id']}";
					$mysql->db_query($sql);
					
				}
			}
			
			//第十一步，借款人担保额度的增加
			$sql = "select * from `{borrow_vouch_repay}` where borrow_nid='{$borrow_nid}' and `order`={$repay_period}";
			$result = $mysql->db_fetch_array($sql);
			if ($result!=""){
				$amountlog_result = self::GetAmountOne($borrow_userid,"borrow_vouch");
				$amountlog["user_id"] = $data['user_id'];
				$amountlog["type"] = "borrow_vouch_repay";
				$amountlog["amount_type"] = "borrow_vouch";
				$amountlog["account"] = $result['repay_account'];
				$amountlog["account_all"] = $amountlog_result['account_all'];
				$amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
				$amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account']; 
				$amountlog["remark"] = "担保[{$borrow_url}]还款完成，借款担保额度返回";
				self::AddAmountLog($amountlog);
			}
			$sql = "update `{borrow_vouch_repay}` set repay_yestime = ".time().",repay_yesaccount = {$amountlog['account']},status=1 where id = {$result['id']}";
			$mysql->db_query($sql);
		}else{
			//第十二步，信用投资额度的增加
			$amountlog_result = self::GetAmountOne($borrow_userid,"credit");
			$amountlog["user_id"] = $borrow_userid;
			$amountlog["type"] = "borrrow_repay";
			$amountlog["amount_type"] = "credit";
			$amountlog["account"] = $repay_capital;
			$amountlog["account_all"] = $amountlog_result['account_all'];
			$amountlog["account_use"] = $amountlog_result['account_use'] + $amountlog['account'];
			$amountlog["account_nouse"] = $amountlog_result['account_nouse'] - $amountlog['account']; 
			$amountlog["remark"] = "成功[{$borrow_url}]还款，额度增加";
			self::AddAmountLog($amountlog);
		}
		
		
		
		//第十三步，如果网站已经待还或者担保已还，就不用还给投资人
		if ($repay_web!=1 && $repay_vouch!=1){
			$sql = "select p1.* from `{borrow_recover}` as p1  where p1.`recover_period` = '{$repay_period}' and p1.borrow_nid='{$borrow_nid}'";
			$result = $mysql->db_fetch_arrays($sql);
			
		
			foreach ($result as $key => $value){
				
				//更新投资人的分期信息
				$sql = "update  `{borrow_recover}` set recover_yestime='".time()."',recover_account_yes = recover_account ,recover_capital_yes = recover_capital ,recover_interest_yes = recover_interest ,status=1,recover_status=1   where id = '{$value['id']}'";
				$mysql->db_query($sql);
				
				
				//更新投资的信息
				
				$sql = "update  `{borrow_tender}` set recover_times=recover_times+1,recover_account_yes= recover_account_yes + {$value['recover_account']},recover_account_capital_yes = recover_account_capital_yes  + {$value['recover_capital']} ,recover_account_interest_yes = recover_account_interest_yes + {$value['recover_interest']},recover_account_wait= recover_account_wait - {$value['recover_account']},recover_account_capital_wait = recover_account_capital_wait  - {$value['recover_capital']} ,recover_account_interest_wait = recover_account_interest_wait - {$value['recover_interest']}  where id = '{$value['tender_id']}'";
				$mysql->db_query($sql);
				
				
				//用户对借款标的还款
				$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
				$account_log['user_id'] =$value['user_id'];
				$account_log['type'] = "tender_repay_yes";
				$account_log['money'] = $value['recover_account'];
				$account_log['total'] = $account_result['total'];
				$account_log['use_money'] = $account_result['use_money']+$account_log['money'];
				$account_log['no_use_money'] = $account_result['no_use_money'];
				$account_log['collection'] =$account_result['collection'] -$account_log['money'];
				$account_log['use_money_yes'] = $account_result['use_money_yes']+$account_log['money'];
				$account_log['use_money_no'] = $account_result['use_money_no'];
				$account_log['to_user'] = $borrow_userid;
				$account_log['remark'] = "客户（{$borrow_username}）对[{$borrow_url}]借款的还款";
				accountClass::AddLog($account_log);
				
				
				//扣除投资的管理费
				
				$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
				$log['user_id'] = $value['user_id'];
				$log['type'] = "tender_interest_fee";//
				$_fee = isset($_G['system']['con_integral_fee'])?$_G['system']['con_integral_fee']:0.1;
				if ($_fee>0 && $_fee!="0") {
					$log['money'] = $value['recover_interest']*$_fee;
					$log['total'] = $account_result['total']-$log['money'];
					$log['use_money'] = $account_result['use_money']-$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] = $account_result['collection'];
					$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
					$log['use_money_no'] = $account_result['use_money_no'];
					$log['to_user'] = 0;
					$log['remark'] = "用户成功还款[$borrow_url]扣除利息的管理费";
					accountClass::AddLog($log);
				}
				
				
				
				//提醒设置
				$remind['nid'] = "loan_pay";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $value['user_id'];
				$remind['title'] = "客户（{$borrow_username}）对[{$borrow_name}]借款的还款";
				$remind['content'] = "客户（{$borrow_username}）在".date("Y-m-d H:i:s")."对[{$borrow_url}}</a>]借款的还款,还款金额为￥{$value['recover_account']}";
				$remind['type'] = "system";
				remindClass::sendRemind($remind);
				
			}
		}
		
		
		//第十三步，如果网站已经待还或者担保已还，就不用还给投资人
		if ($repay_vouch==1){
			$sql = "select p1.* from `{borrow_vouch_recover}` as p1  where p1.`order` = '{$repay_period}' and p1.borrow_nid='{$borrow_nid}'";
			$result = $mysql->db_fetch_arrays($sql);
			$late_rate = isset($_G['system']['con_late_rate'])?$_G['system']['con_late_rate']:0.008;
		
			foreach ($result as $key => $value){
				
				//用户对借款标的还款
				$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
				$log['user_id'] =$value['user_id'];
				$log['type'] = "vouch_tender_repay_yes";
				$log['money'] = $value['repay_account'];
				$log['total'] = $account_result['total']+$log['money'];
				$log['use_money'] = $account_result['use_money']+$log['money'];
				$log['no_use_money'] = $account_result['no_use_money'];
				$log['collection'] =$account_result['collection'] ;
				$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
				$log['to_user'] = $borrow_userid;
				$log['remark'] = "客户（{$borrow_username}）对[{$borrow_url}]借款担保垫付的还款";
				accountClass::AddLog($log);
				
				
				//扣除投资的管理费
				
				$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
				$log['user_id'] = $value['user_id'];
				$log['type'] = "tender_interest_fee";//
				$_fee = isset($_G['system']['con_integral_fee'])?$_G['system']['con_integral_fee']:0.1;
				if ($_fee>0 && $_fee!="0") {
					$log['money'] = $value['recover_interest']*$_fee;
					$log['total'] = $account_result['total']-$log['money'];
					$log['use_money'] = $account_result['use_money']-$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] = $account_result['collection'];
					$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
					$log['use_money_no'] = $account_result['use_money_no'];
					$log['to_user'] = 0;
					$log['remark'] = "用户成功还款[$borrow_url]扣除利息的管理费";
					accountClass::AddLog($log);
				}
				
				
				//提醒设置
				$remind['nid'] = "loan_pay";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $value['user_id'];
				$remind['title'] = "客户({$borrow_username})对[{$borrow_name}]借款的还款";
				$remind['content'] = "客户({$borrow_username})在".date("Y-m-d H:i:s")."对[{$borrow_url}}</a>]借款的还款,还款金额为￥{$value['repay_account']}";
				$remind['type'] = "system";
				remindClass::sendRemind($remind);
				
				if ($late_days>30){
					//担保人网站各得一半
					$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
					$log['user_id'] =$value['user_id'];
					$log['type'] = "vouch_repay_late_recover";
					$log['money'] = round((($value['repay_capital']*$late_rate*$late_days)/2),2);
					$log['total'] = $account_result['total']+$log['money'];
					$log['use_money'] = $account_result['use_money']+$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] =$account_result['collection'];
					$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
					$log['use_money_no'] = $account_result['use_money_no'];
					$log['to_user'] = $data['user_id'];
					$log['remark'] = "[{$borrow_url}]第".($repay_period+1)."期借款标逾期并少于30天的担保垫付逾期利息收入";
					accountClass::AddLog($log);
				}
			}
		}
		//第十四步，逾期还款
			
			
		//如果逾期的就扣掉预期的借款
		if ($late_days>0 ){
			
			$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
			$log['user_id'] = $borrow_userid;
			$log['type'] = "borrow_repay_late";
			$log['money'] = $late_interest;
			$log['total'] =$account_result['total']-$log['money'];
			$log['use_money'] = $account_result['use_money']-$log['money'];
			$log['no_use_money'] = $account_result['no_use_money'];
			$log['collection'] = $account_result['collection'];
			$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
			$log['use_money_no'] = $account_result['use_money_no'];
			$log['to_user'] = "0";
			$log['remark'] = "对[{$borrow_url}]借款第".($repay_period+1)."期的逾期金额的扣除";
			accountClass::AddLog($log);
			
			//更新逾期的信息
			$sql = "update`{borrow_repay}` set late_days = '{$late_days}',late_interest = '{$late_interest}' where id = {$repay_id}";
			$mysql->db_query($sql);
			
			if ($late_days>30){
				//第五步，(account)扣除可用余额还款部分
				$account_result =  accountClass::GetOne(array("user_id"=>$borrow_userid));
				$log['user_id'] = $borrow_userid;
				$log['type'] = "repay_late_reminder";
				$log['money'] = $late_reminder;
				$log['total'] =$account_result['total']-$log['money'];
				$log['use_money'] = $account_result['use_money']-$log['money'];
				$log['no_use_money'] = $account_result['no_use_money'];
				$log['collection'] = $account_result['collection'];
				$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
				$log['to_user'] = "0";
				$log['remark'] = "对[{$borrow_url}]第".($repay_period+1)."期还款逾期超过30天所扣除的催缴费";
				accountClass::AddLog($log);
				
				//更新逾期的信息
				$sql = "update`{borrow_repay}` set late_reminder = '{$late_reminder}' where id = {$repay_id}";
				$mysql->db_query($sql);
			}
		}
		
		
		//如果预期的天数小于30天，网站和用户，收入逾期利息各一半
		if ($late_days>0 && $late_days<=30  && $repay_web!=1 && $repay_vouch!=1){
		
			$sql = "select p1.* from `{borrow_recover}` as p1 where  p1.`recover_period` = '{$repay_period}' and p1.borrow_nid='{$borrow_nid}'";
			$result = $mysql->db_fetch_arrays($sql);
			$late_rate = isset($_G['system']['con_late_rate'])?$_G['system']['con_late_rate']:0.008;
			foreach ($result as $key => $value){
				//更新投资的信息
				$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
				$log['user_id'] =$value['user_id'];
				$log['type'] = "repay_late_recover";
				$log['money'] = round((($value['recover_capital']*$late_rate*$late_days)/2),2);
				$log['total'] = $account_result['total']+$log['money'];
				$log['use_money'] = $account_result['use_money']+$log['money'];
				$log['no_use_money'] = $account_result['no_use_money'];
				$log['collection'] =$account_result['collection'];
				$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
				$log['use_money_no'] = $account_result['use_money_no'];
				$log['to_user'] = $data['user_id'];
				$log['remark'] = "[{$borrow_url}]第".($repay_period+1)."期借款标逾期并少于30天的逾期利息收入";
				accountClass::AddLog($log);
				
				//更新逾期的信息
				$sql = "update`{borrow_recover}` set late_days = '{$late_result['late_days']}',late_interest = '{$log['money']}' where id = {$value['id']}";
				$mysql->db_query($sql);
			}
			
		}
		
		
		//添加最后的还款金额
		$sql = "update `{borrow}` set repay_account_yes= repay_account_yes + {$repay_account},repay_account_capital_yes= repay_account_capital_yes + {$repay_capital},repay_account_interest_yes= repay_account_interest_yes + {$repay_interest},repay_account_wait= repay_account_wait - {$repay_account},repay_account_capital_wait= repay_account_capital_wait - {$repay_capital},repay_account_interest_yes= repay_account_interest_yes - {$repay_interest} where borrow_nid='{$borrow_nid}'";
		$result = $mysql -> db_query($sql);
		
		
		$sql = "update `{borrow_repay}` set repay_status=1,repay_yestime='".time()."',repay_account_yes=repay_account,repay_interest_yes=repay_interest,repay_capital_yes=repay_capital where id='{$repay_id}'";
		$mysql->db_query($sql);
		return $result;
	}
	
	/**
	 * 担保列表
	 *
	 * @return Array
	 */
	function GetVouchList($data = array()){
		global $mysql;
		$user_id = empty($data['user_id'])?"":$data['user_id'];
		$username = empty($data['username'])?"":$data['username'];
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1";		 
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and p1.user_id = {$data['user_id']}";
		}
		if (IsExiest($data['username'])!=""){
			$_sql .= " and p2.username = '{$data['user_id']}'";
		}
		if (IsExiest($data['borrow_nid'])!=""){
			$_sql .= " and p1.borrow_nid = '{$data['borrow_nid']}'";
		}
	
		if (IsExiest($data['dotime1'])!=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p1.addtime > ".get_mktime($dotime1);
			}
		}
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.addtime < ".get_mktime($dotime2);
			}
		}
		if (IsExiest($data['status'])!=""){
			$_sql .= " and p1.status in ({$data['status']})";
		}
		if (IsExiest($data['borrow_status']) !=""){
			$_sql .= " and p3.status in ({$data['borrow_status']})";
		}
		
	
		$_select = "p1.*,p2.username,p3.name as borrow_name,p3.borrow_period,p3.account as borrow_account,p4.username as borrow_username";
		$sql = "select SELECT from `{borrow_vouch}` as p1
				left join `{user}` as p2 on p2.user_id = p1.user_id
				left join `{borrow}` as p3 on p1.borrow_nid = p3.borrow_nid
				left join `{user}` as p4 on p4.user_id = p3.user_id
		 {$_sql}  order by p1.addtime desc LIMIT";
				
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$result= $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  'order by p1.id desc', $_limit), $sql));
			
			return $result;
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
		
	}
	
	function GetVouchRepayList($data = array()){
		global $mysql;
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where p1.borrow_nid=p2.borrow_nid and p2.user_id=p3.user_id ";
		if (IsExiest($data['borrow_nid'])!=""){
			if ($data['borrow_nid'] == "request"){
				$_sql .= " and p1.borrow_nid= '{$_REQUEST['borrow_nid']}'";
			}else{
				$_sql .= " and p1.borrow_nid= '{$data['borrow_nid']}'";
			}
		}
		
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and p2.user_id = '{$data['user_id']}'";
		}	 
		
		if (IsExiest($data['vouch_userid']) !=""){
			$_sql .= " and p2.borrow_nid in (select borrow_nid from `{borrow_vouch}` where user_id={$data['vouch_userid']})";
		}	 
		
		if (IsExiest($data['username'])!=""){
			$_sql .= " and p3.username like '%{$data['username']}%'";
		}	 
		
		if (IsExiest($data['repay_time'])!=""){
			if ($date['repay_time']<=0) $data['repay_time'] = time();
			$_repayment_time = get_mktime(date("Y-m-d",$data['repay_time']));
			$_sql .= " and p1.repay_time < '{$_repayment_time}'";
		}	 
		
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p2.addtime < ".get_mktime($dotime2);
			}
		}
		if (IsExiest($data['dotime1'])!=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p2.addtime > ".get_mktime($dotime1);
			}
		}
		
		if (IsExiest($data['status'])!=""){
			$_sql .= " and p1.status in ({$data['status']})";
		}
		
		if (IsExiest($keywords)!=""){
		    if ($keywords=="request"){
				if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
					$_sql .= " and p2.name like '%".urldecode($_REQUEST['keywords'])."%'";
				}
			}else{
				$_sql .= " and p2.name like '%".$keywords."%'";
			}
			
		}
		
		$_order = " order by p1.id desc";
		if (isset($data['order']) && $data['order']!="" ){
			if ($data['order'] == "repayment_time"){
				$_order = " order by p1.repay_time asc ";
			}elseif ($data['order'] == "order"){
				$_order = " order by p1.order asc ,p1.id desc";
			}
		}
		
		$_select = " p1.*,p2.name as borrow_name,p2.borrow_period,p3.username as borrow_username";
		$sql = "select SELECT from `{borrow_vouch_repay}` as p1 left join `{borrow}` as p2 on p1.borrow_nid = p2.borrow_nid left join `{user}` as p3 on p3.user_id=p2.user_id {$_sql} ORDER LIMIT";
		
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  $_order, $_limit), $sql));
			foreach ($list as $key => $value){
				$late = self::LateInterest(array("time"=>$value['repay_time'],"account"=>$value['capital']));
				if ($value['status']!=1){
					$list[$key]['late_days'] = $late['late_days'];
					$list[$key]['late_interest'] = $late['late_interest'];
				}
			}
			return $list;
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,$_order, $limit), $sql));		
		$list = $list?$list:array();
		foreach ($list as $key => $value){
			$late = self::LateInterest(array("time"=>$value['repay_time'],"account"=>$value['capital']));
			if ($value['status']!=1){
				$list[$key]['late_days'] = $late['late_days'];
				$list[$key]['late_interest'] = $late['late_interest'];
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
	
	
	function GetVouchRecoverList($data = array()){
		global $mysql;
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where p1.borrow_nid=p2.borrow_nid and p2.user_id=p3.user_id ";
		if (IsExiest($data['borrow_nid'])!=""){
			if ($data['borrow_nid'] == "request"){
				$_sql .= " and p1.borrow_nid= '{$_REQUEST['borrow_nid']}'";
			}else{
				$_sql .= " and p1.borrow_nid= '{$data['borrow_nid']}'";
			}
		}
		
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and p2.user_id = '{$data['user_id']}'";
		}	 
		
		if (IsExiest($data['vouch_userid']) !=""){
			$_sql .= " and p1.user_id = '{$data['vouch_userid']}'";
		}	 
		
		if (IsExiest($data['username'])!=""){
			$_sql .= " and p3.username like '%{$data['username']}%'";
		}	 
		
		if (IsExiest($data['type'])=="late"){
			$_sql .= " and p1.repay_time<".time() ." and p1.status=0";
		}	 
		
		if (IsExiest($data['repay_time'])!=""){
			if ($date['repay_time']<=0) $data['repay_time'] = time();
			$_repayment_time = get_mktime(date("Y-m-d",$data['repay_time']));
			$_sql .= " and p1.repay_time < '{$_repayment_time}'";
		}	 
		
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p2.addtime < ".get_mktime($dotime2);
			}
		}
		if (IsExiest($data['dotime1'])!=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p2.addtime > ".get_mktime($dotime1);
			}
		}
		
		if (IsExiest($data['status'])!=""){
			$_sql .= " and p1.status in ({$data['status']})";
		}
		
		if (IsExiest($keywords)!=""){
		    if ($keywords=="request"){
				if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
					$_sql .= " and p2.name like '%".urldecode($_REQUEST['keywords'])."%'";
				}
			}else{
				$_sql .= " and p2.name like '%".$keywords."%'";
			}
			
		}
		
		$_order = " order by p1.id desc";
		if (isset($data['order']) && $data['order']!="" ){
			if ($data['order'] == "repayment_time"){
				$_order = " order by p1.repay_time asc ";
			}elseif ($data['order'] == "order"){
				$_order = " order by p1.order asc ,p1.id desc";
			}
		}
		
		$_select = " p1.*,p2.name as borrow_name,p2.borrow_period,p3.username as borrow_username";
		$sql = "select SELECT from `{borrow_vouch_recover}` as p1 left join `{borrow}` as p2 on p1.borrow_nid = p2.borrow_nid left join `{user}` as p3 on p3.user_id=p2.user_id {$_sql} ORDER LIMIT";
		
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  $_order, $_limit), $sql));
			
			foreach ($list as $key => $value){
				$late = self::LateInterest(array("time"=>$value['repay_time'],"account"=>$value['reapy_account']));
				if ($value['status']!=1){
					$list[$key]['late_days'] = $late['late_days'];
					$list[$key]['late_interest'] = $late['late_interest'];
				}
			}
			return $list;
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,$_order, $limit), $sql));		
		$list = $list?$list:array();
		foreach ($list as $key => $value){
			$late = self::LateInterest(array("time"=>$value['repay_time'],"account"=>$value['capital']));
			if ($value['status']!=1){
				$list[$key]['late_days'] = $late['late_days'];
				$list[$key]['late_interest'] = $late['late_interest'];
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
	
	
	//担保垫付
	function VouchDianfu($data = array()){
		global $mysql;
		$sql = "select p1.*,p2.name as borrow_name from `{borrow_vouch_recover}` as p1 left join `{borrow}` as p2 on p1.borrow_nid = p2.borrow_nid where p1.user_id='{$data['user_id']}' and  p1.id='{$data['id']}' and p1.repay_time< ".time()."";
		$result = $mysql->db_fetch_array($sql);
		
		//第一步，判断担保信息是否存在
		if ($result==false){
			return "error";
		}
		//第二步，判断担保是否逾期30天
		$late = self::LateInterest(array("time"=>$result['repay_time'],"account"=>$result['repay_account']));
		if ($late["late_days"]<10){
			return "vouch_late_days_30no";
		}
		
		$borrow_nid = $result["borrow_nid"];
		$borrow_name = $result["borrow_name"];
		$repay_period = $result["order"];
		$borrow_period = $result["borrow_period"];
		$borrow_url = "<a href=\'{$_G['weburl']}/invest/a{$result['borrow_nid']}.html\' target=_blank>{$result['borrow_name']}</a>";
		
		
		//第三步，更新担保信息垫付信息为1
		$sql = "update `{borrow_vouch_recover}` set advance_status =1,advance_time='".time()."' where id='{$data['id']}'";
		$mysql->db_query($sql);
	
		//第四步，判断是否已经垫付了
		$sql = "select * from `{borrow_repay}` where borrow_nid = '{$borrow_nid}' and repay_period='{$repay_period}'";
		$result = $mysql->db_fetch_array($sql);
		
		if ($result["repay_vouch"]!=1 && $result["repay_status"]!=1){
			
			//第六步，判断已经全部都担保垫付完毕
			$sql = "select * from `{borrow_vouch_recover}` where borrow_nid = '{$borrow_nid}' and `order`='{$repay_period}' and advance_status=0";
			$result = $mysql->db_fetch_array($sql);
			
			if ($result==false || $result==""){
				//第五步，更新还款者的担保待还信息。
				$sql = "update `{borrow_repay}` set repay_vouch=1,repay_vouch_time='".time()."' where borrow_nid='{$borrow_nid}' and repay_period='{$repay_period}'";
				$mysql->db_query($sql);
			
				$sql = "select p1.*,p2.status as vip_status from `{borrow_recover}` as p1 left join `{borrow_vip}` as p2 on p1.user_id=p2.user_id  where p1.`recover_period` = '{$repay_period}' and p1.borrow_nid='{$borrow_nid}'";
				$result = $mysql->db_fetch_arrays($sql);
				
				foreach ($result as $key => $value){
				
					//第七步，更新投资人的分期信息
					$sql = "update  `{borrow_recover}` set recover_yestime='".time()."',recover_account_yes = recover_account ,recover_capital_yes = recover_capital ,recover_interest_yes = recover_interest ,status=1,recover_status=1,recover_vouch=1   where id = '{$value['id']}'";
					$mysql->db_query($sql);
					
					//第八步，更新投资人的信息的信息
					$sql = "update  `{borrow_tender}` set recover_times=recover_times+1,recover_account_yes= recover_account_yes + {$value['recover_account']},recover_account_capital_yes = recover_account_capital_yes  + {$value['recover_capital']} ,recover_account_interest_yes = recover_account_interest_yes + {$value['recover_interest']},recover_account_wait= recover_account_wait - {$value['recover_account']},recover_account_capital_wait = recover_account_capital_wait  - {$value['recover_capital']} ,recover_account_interest_wait = recover_account_interest_wait - {$value['recover_interest']}  where id = '{$value['tender_id']}'";
					$mysql->db_query($sql);
					
					//第九步，担保者对借款标的还款
					$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
					$log['user_id'] =$value['user_id'];
					$log['type'] = "vouch_recover_yes";
					if($value['vip_status']==1){
						$log['money'] = $value['recover_account'];
					}else{
						$log['money'] = round($value['recover_capital']/2,2);
					}
					
					$log['total'] = $account_result['total'];
					$log['use_money'] = $account_result['use_money']+$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] =$account_result['collection'] -$log['money'];
					$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
					$log['use_money_no'] = $account_result['use_money_no'];
					$log['to_user'] = $borrow_userid;
					$log['remark'] = "担保者对[{$borrow_url}]借款的垫付";
					$result = accountClass::AddLog($log);
					
					
					//第十步，扣除投资的管理费
				
					$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
					$log['user_id'] = $value['user_id'];
					$log['type'] = "tender_interest_fee";//
					$_fee = isset($_G['system']['con_integral_fee'])?$_G['system']['con_integral_fee']:0.1;
					if ($_fee>0 && $_fee!="0") {
						$log['money'] = $value['recover_interest']*$_fee;
						$log['total'] = $account_result['total']-$log['money'];
						$log['use_money'] = $account_result['use_money']-$log['money'];
						$log['no_use_money'] = $account_result['no_use_money'];
						$log['collection'] = $account_result['collection'];
						$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
						$log['use_money_no'] = $account_result['use_money_no'];
						$log['to_user'] = 0;
						$log['remark'] = "担保者成功还垫付$borrow_url]扣除利息的管理费";
						accountClass::AddLog($log);
					}
					//提醒设置
					$remind['nid'] = "loan_pay";
					$remind['sent_user'] = "0";
					$remind['receive_user'] = $value['user_id'];
					$remind['title'] = "担保者对[{$borrow_name}]借款的还款";
					$remind['content'] = "担保者在".date("Y-m-d H:i:s")."对[{$borrow_url}}</a>]借款的还款,还款金额为￥{$value['recover_account']}";
					$remind['type'] = "system";
					//remindClass::sendRemind($remind);
					
				}
				//第十一步，扣除担保人的可用金额
				$sql = "select * from `{borrow_vouch_recover}` where borrow_nid = '{$borrow_nid}' and `order`='{$repay_period}' ";
				$result = $mysql->db_fetch_arrays($sql);
				
				foreach ($result as $key => $value){
					
					//第八步，更新投资人的分期信息
					//用户对借款标的还款
					$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
					$log['user_id'] =$value['user_id'];
					$log['type'] = "vouch_repay_yes";
					$log['money'] = $value['repay_account'];
					$log['total'] = $account_result['total'] -$log['money'];
					$log['use_money'] = $account_result['use_money']-$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] =$account_result['collection'];
					$log['use_money_yes'] = $account_result['use_money_yes'];
					$log['use_money_no'] = $account_result['use_money_no']-$log['money'];
					$log['to_user'] = $vouch_userid;
					$log['remark'] = "对[{$borrow_url}]借款的垫付金额的扣除";
					accountClass::AddLog($log);
					
					
					//提醒设置
					$remind['nid'] = "loan_pay";
					$remind['sent_user'] = "0";
					$remind['receive_user'] = $value['user_id'];
					$remind['title'] = "担保者对[{$borrow_name}]借款的垫付金额的扣除";
					$remind['content'] = "担保者在".date("Y-m-d H:i:s")."对[{$borrow_url}}</a>]借款的还款,垫付金额为￥{$value['repay_account']}";
					$remind['type'] = "system";
					//remindClass::sendRemind($remind);
					
				}
			}
		}
		return true;
	}
	function GetBorrowRepayList($data = array()){
		global $mysql;
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = " where p1.borrow_nid=p2.borrow_nid and p2.user_id=p3.user_id ";
		if (IsExiest($data['borrow_nid'])!=""){
			if ($data['borrow_nid'] == "request"){
				$_sql .= " and p1.borrow_nid= '{$_REQUEST['borrow_nid']}'";
			}else{
				$_sql .= " and p1.borrow_nid= '{$data['borrow_nid']}'";
			}
		}
		
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and p1.user_id = '{$data['user_id']}'";
		}	
		if (IsExiest($data['vouch_userid']) !=""){
			$_sql .= " and p2.borrow_nid in (select borrow_nid from `{borrow_vouch}` where user_id={$data['vouch_userid']})";
		}	 
		
		if (IsExiest($data['username'])!=""){
			$_sql .= " and p3.username like '%{$data['username']}%'";
		}	 
		
		if (IsExiest($data['repay_time'])!=""){
			if ($date['repay_time']<=0) $data['repay_time'] = time();
			$_repayment_time = get_mktime(date("Y-m-d",$data['repay_time']));
			$_sql .= " and p1.repay_time < '{$_repayment_time}'";
		}	 
		
		if (IsExiest($data['dotime2'])!=""){
			$dotime2 = ($data['dotime2']=="request")?$_REQUEST['dotime2']:$data['dotime2'];
			if ($dotime2!=""){
				$_sql .= " and p1.repay_time < ".get_mktime($dotime2);
			}
		}
		if (IsExiest($data['dotime1'])!=""){
			$dotime1 = ($data['dotime1']=="request")?$_REQUEST['dotime1']:$data['dotime1'];
			if ($dotime1!=""){
				$_sql .= " and p1.repay_time > ".get_mktime($dotime1);
			}
		}
		
		
		if (IsExiest($data['status'])!=""){
			$_sql .= " and p1.status in ({$data['status']})";
		}
		if (IsExiest($data['repay_status'])!=""){
			$_sql .= " and p1.repay_status in ({$data['repay_status']})";
		}
		
		
		if (IsExiest($data['borrow_status'])!=""){
			$_sql .= " and p2.status = '{$data['borrow_status']}'";
		}	
		
		if (IsExiest($keywords)!=""){
		    if ($keywords=="request"){
				if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
					$_sql .= " and p2.name like '%".urldecode($_REQUEST['keywords'])."%'";
				}
			}else{
				$_sql .= " and p2.name like '%".$keywords."%'";
			}
			
		}
		
		$_order = " order by p1.id desc";
		if (isset($data['order']) && $data['order']!="" ){
			if ($data['order'] == "repay_time"){
				$_order = " order by p1.repay_time asc ";
			}elseif ($data['order'] == "order"){
				$_order = " order by p1.repay_period asc ,p1.id desc";
			}elseif ($data['order'] == "status"){
				$_order = " order by p1.repay_status asc ,p1.repay_time asc,p1.id desc";
			}
		}
		$_select = " p1.*,p2.name as borrow_name,p2.borrow_period,p3.username as borrow_username";
		$sql = "select SELECT from `{borrow_repay}` as p1 left join `{borrow}` as p2 on p1.borrow_nid = p2.borrow_nid left join `{user}` as p3 on p3.user_id=p2.user_id {$_sql} ORDER LIMIT";
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  $_order, $_limit), $sql));
			foreach ($list as $key => $value){
				$late = self::LateInterest(array("time"=>$value['repay_time'],"account"=>$value['repay_account']));
				
				if ($value['repay_status']!=1){
					$list[$key]['late_days'] = $late['late_days'];
					$list[$key]['late_interest'] = $late['late_interest'];
					if ($list[$key]['late_days'] > 30){
						$list[$key]['late_reminder'] = round(($list[$key]['late_days'] - 30)*$value['repay_account']*0.002,2);
					}
				}
			}
			return $list;
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,$_order, $limit), $sql));		
		$list = $list?$list:array();
		foreach ($list as $key => $value){
			$late = self::LateInterest(array("time"=>$value['repay_time'],"account"=>$value['repay_account']));
			
			if ($value['repay_status']!=1){
				$list[$key]['late_days'] = $late['late_days'];
				$list[$key]['late_interest'] = $late['late_interest'];
				if ($list[$key]['late_days'] > 30){
					$list[$key]['late_reminder'] = round(($list[$key]['late_days'] - 30)*$value['repay_account']*0.002,2);
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
	
	public static function GetBorrowComment($data){
		global $mysql,$_G;
		
		require_once(ROOT_PATH."modules/comment/comment.class.php");
		$user_id = $data["user_id"];
		if ($data["type"]=="tender"){
			$sql = "select borrow_nid from `{borrow}` where user_id={$user_id}";
			$result = $mysql->db_fetch_arrays($sql);
			foreach ($result as  $key => $value){
				$_result[] = $value["borrow_nid"];
			}
			$_comment["code"] = "borrow";
			if (count($_result)>0){
				$_comment["article_id"] = join(",",$_result);
			}
			$_comment["reply_status"] = $data["reply_status"];
			$result = commentClass::GetList($_comment);
			
			return $result;
		}elseif ($data["type"]=="borrow"){
			$_comment["user_id"] = $_G["user_id"];
			$_comment["code"] = "borrow";
			$_comment["reply_status"] = $data["reply_status"];
			$result = commentClass::GetList($_comment);
			
			return $result;
		
		}
	
	}
	
	
	/**
	 * 担保列表
	 *
	 * @return Array
	 */
	function GetOtherloanList($data = array()){
		global $mysql;
	
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		
		$_sql = "where 1=1";		 
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and p1.user_id = {$data['user_id']}";
		}
		if (IsExiest($data['username'])!=""){
			$_sql .= " and p2.username = '{$data['user_id']}'";
		}
	
	
		$_select = "p1.*";
		$sql = "select SELECT from `{borrow_otherloan}` as p1
				left join `{user}` as p2 on p2.user_id = p1.user_id
		 {$_sql}  order by p1.addtime desc LIMIT";
				
		//是否显示全部的信息
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$result= $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  'order by p1.id desc', $_limit), $sql));
			return $result;
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));
		
		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, 'order by p1.id desc', $limit), $sql));		
		$list = $list?$list:array();
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
		
	}
	
	
	/**
	 * 用户添加基本的借款信息
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function AddOtherloan($data = array()){
		global $mysql;
		
		$sql = "insert into `{borrow_otherloan}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
        return $mysql->db_query($sql);
	}
	
	function UpdateOtherloan($data = array()){
		global $mysql;
		
		$sql = "update `{borrow_otherloan}` set id = {$data['id']}";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$sql .= " where id = {$data['id']} and user_id={$data['user_id']}";
        return $mysql->db_query($sql);
	}
	
	
	function DelOtherloan($data){
		global $mysql;
		if ($data["id"]=="" || $data["user_id"]==""){ return -1;}
		$sql = "delete from `{borrow_otherloan}` where user_id={$data['user_id']} and id={$data['id']}";
		$result = $mysql->db_query($sql);
		if ($result) return 1;
		return -2;
	}
	
	
	function GetOtherloanOne($data){
		global $mysql;
		if ($data["id"]=="" || $data["user_id"]==""){ return "";}
		$sql = "select * from `{borrow_otherloan}` where user_id={$data['user_id']} and id={$data['id']}";
		$result = $mysql->db_fetch_array($sql);
		return $result;
	}
	
	
	function GetUserBorrowCount($data){
		global $mysql;
		$nowtime = time()-60*60*24*2;
		$week_t = date("w",$nowtime);
		if ($week_t==0) $week_t =7;
		$first_time = $nowtime-60*60*24*($week_t+7);
		$last_time = $nowtime-60*60*24*($week_t-1);
		$sql = "select sum(p1.account) as account_all,p1.user_id,p2.username from `{borrow_tender}`  as p1 left join `{user}` as p2 on p1.user_id=p2.user_id where p1.status=1  group by p1.user_id order by account_all desc limit {$data['limit']}";
		$result = $mysql->db_fetch_arrays($sql);
		
		return $result;
	}
	
	//逾期还款列表
	function GetLateList($data = array()){
		global $mysql,$_G;
		
		$page = (!isset($data['page']) || $data['page']=="")?1:$data['page'];
		$epage = (!isset($data['epage']) || $data['epage']=="")?10:$data['epage'];
		
		$_select = 'p1.*,p3.*';
		$_order = " order by p1.id ";
		if (isset($data['late_day']) && $data['late_day']!=""){
			$_repayment_time = time()-60*60*24*$data['late_day'];
		}else{
			$_repayment_time = time();
		}
		
		$_sql = " where p1.repay_time < '{$_repayment_time}' and p1.repay_status!=1 ";
		$sql = "select SELECT from `{borrow_repay}` as p1 
				left join `{borrow}` as p2 on p1.borrow_nid=p2.borrow_nid
				left join `{user}` as p3 on p2.user_id=p3.user_id
			   {$_sql} ORDER LIMIT";
				 
		
		$_list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order , ""), $sql));	
			
		foreach ($_list as $key => $value){
			$late = self::LateInterest(array("time"=>$value['repay_time'],"account"=>$value['capital']));
			$list[$value['user_id']]['realname'] = $value['realname'];
			$list[$value['user_id']]['phone'] = $value['phone'];
			$list[$value['user_id']]['user_id'] = $value['user_id'];
			$list[$value['user_id']]['email'] = $value['email'];
			$list[$value['user_id']]['qq'] = $value['qq'];
			$list[$value['user_id']]['sex'] = $value['sex'];
			$list[$value['user_id']]['card_id'] = $value['card_id'];
			$list[$value['user_id']]['area'] = $value['area'];
			$list[$value['user_id']]['late_days'] += $late['late_days'];//总逾期天数
			if ($list[$value['user_id']]['late_numdays']<$late['late_days']){
				$list[$value['user_id']]['late_numdays'] =  $late['late_days'];
			}
			$list[$value['user_id']]['late_interest'] += round($late['late_interest']/2,2);
			$list[$value['user_id']]['late_account'] +=  $value['repay_account'];//逾期总金额
			$list[$value['user_id']]['late_num'] ++;//逾期笔数
			if ($value['repay_web']==1){
				$list[$value['user_id']]['late_webnum'] +=1;//逾期笔数
			}
			
		}
		//是否显示全部的信息
		if (isset($data['limit']) ){
			if (count($list)>0){
			return array_slice ($list,0,$data['limit']);
			}else{
			return array();
			}
		}	
		
		$total = count($list);
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		if (is_array($list)){
		$list = array_slice ($list,$index,$epage);
		}
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
	
	}
	
	//统计
	function Tongji($data = array()){
		global $mysql;
		
		//成功借款
		$sql = " select sum(account) as num from `{borrow}` where status=3 ";
		$result = $mysql->db_fetch_array($sql);
		$_result['success_num'] = $result['num'];
		
		//逾期未还款
		$_repayment_time = time();;
		$sql = " select p1.repay_capital,p1.repay_yestime,p1.status  from  `{borrow_repay}` as p1 left join `{borrow}` as p2 on p1.borrow_nid=p2.borrow_nid where p2.status=3 ";
		$result = $mysql->db_fetch_arrays($sql);
		foreach ($result as $key => $value){
			$_result['success_sum'] += $value['repay_capital'];//借款总额
			if ($value['status']==1){
				$_result['success_num1'] += $value['repay_capital'];//成功还款总额
				if (date("Ymd",$value['repay_time']) < date("Ymd",$value['repay_yestime'])){	
					$_result['success_laterepay'] += $value['repay_capital'];
				}
			}
			if ($value['status']==0){
				$_result['success_num0'] += $value['account'];//未还款总额
				if (date("Ymd",$value['repay_time']) < date("Ymd",time())){	
					$_result['false_laterepay'] += $value['repay_capital'];
				}
			}
		}
		$_result['laterepay'] = $_result['success_laterepay'] + $_result['false_laterepay'];
		
		return $_result;
	}
	
	//逾期网站垫付
	function LateRepay($data){
		global $mysql,$_G;
		$sql = "select p1.*,p2.name as borrow_name from `{borrow_repay}` as p1 left join `{borrow}` as p2 on p1.borrow_nid = p2.borrow_nid where p1.id = {$data['id']}";
		$result = $mysql->db_fetch_array($sql);
		//判断是否已经还款，如果还款返回空
		if ($result['repay_status']==1){
			return -1;
		}elseif ($result['repay_web']==1){
			return -2;
		}elseif ($result['repay_status']==0){
			$late_result = self::LateInterest(array("account"=>$result['repay_account'],"time"=>$result['repay_time']));
			if ($late_result['late_days']<30){
				return -3;
			}else{
				//更新还款的状态为，表示网站已经待还
				//第一步，将状态改为网站已还
				$sql = "update `{borrow_repay}` set repay_web=1 where id = {$data['id']}";
				$mysql -> db_query($sql);
				
				$repay_period = $result['repay_period'];
				$borrow_nid = $result['borrow_nid'];
				$borrow_name = $result['borrow_name'];
				$borrow_url = "<a href=\'/invest/a{$borrow_nid}.html\' target=_blank>{$borrow_name}</a>";
				
				$sql = "select p1.* from `{borrow_recover}` as p1  where p1.`recover_period` = '{$repay_period}' and p1.borrow_nid='{$borrow_nid}'";
				$result = $mysql->db_fetch_arrays($sql);
				foreach ($result as $key => $value){
					
					//第二步，更新投资人的分期信息
					$sql = "update  `{borrow_recover}` set recover_yestime='".time()."',recover_account_yes = recover_account ,recover_capital_yes = recover_capital ,recover_interest_yes = recover_interest ,status=1,recover_web=1,recover_status=1   where id = '{$value['id']}'";
					$mysql->db_query($sql);
					
					
					//第三步，更新投资的信息
					$sql = "update  `{borrow_tender}` set recover_times=recover_times+1,recover_account_yes= recover_account_yes + {$value['recover_account']},recover_account_capital_yes = recover_account_capital_yes  + {$value['recover_capital']} ,recover_account_interest_yes = recover_account_interest_yes + {$value['recover_interest']},recover_account_wait= recover_account_wait - {$value['recover_account']},recover_account_capital_wait = recover_account_capital_wait  - {$value['recover_capital']} ,recover_account_interest_wait = recover_account_interest_wait - {$value['recover_interest']}  where id = '{$value['tender_id']}'";
					$mysql->db_query($sql);
					
					//用户对借款标的还款
					$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
					$log['user_id'] =$value['user_id'];
					$log['type'] = "system_repayment";
					$log['money'] = $value['recover_account'];
					$log['total'] = $account_result['total'];
					$log['use_money'] = $account_result['use_money']+$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] =$account_result['collection'] -$log['money'];
					$log['use_money_yes'] = $account_result['use_money_yes']+$log['money'];
					$log['use_money_no'] = $account_result['use_money_no'];
					$log['to_user'] = $borrow_userid;
					$log['remark'] = "客户逾期超过30天，系统自动对[{$borrow_url}]借款的还款
";
					accountClass::AddLog($log);
					
					
					$account_result =  accountClass::GetOne(array("user_id"=>$value['user_id']));
					$log['user_id'] =$value['user_id'];
					$log['type'] = "tender_late_fee";
					$log['money'] = $value['recover_interest'];
					$log['total'] = $account_result['total'] -$log['money'];
					$log['use_money'] = $account_result['use_money']-$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] =$account_result['collection'] ;
					$log['use_money_yes'] = $account_result['use_money_yes']-$log['money'];
					$log['use_money_no'] = $account_result['use_money_no'];
					$log['to_user'] = "0";
					$log['remark'] = "客户逾期超过30天的[{$borrow_url}]借款标的利息扣除";
					accountClass::AddLog($log);
					
					
					
					//提醒设置
					$remind['nid'] = "loan_pay";
					$remind['sent_user'] = "0";
					$remind['receive_user'] = $value['user_id'];
					$remind['title'] = "网站对[{$borrow_name}]借款的垫付还款";
					$remind['content'] = "网站在".date("Y-m-d H:i:s")."对[{$borrow_url}}</a>]借款进行垫付还款,还款金额为{$value['repay_account']}";
					$remind['type'] = "system";
					remindClass::sendRemind($remind);
					
				}
				
			}
		}
	}
	
	//获取用户的总投资额，可以是全部的，也可以单独的某个标
	function GetUserTenderAccount($data){
		global $mysql;
		$_sql = " where 1=1 ";
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and user_id='{$data['user_id']}' ";
		}
		if (IsExiest($data['borrow_nid'])!=""){
			$_sql .= " and borrow_nid='{$data['borrow_nid']}' ";
		}
		$sql = "select sum(account) as account_all from `{borrow_tender}` {$_sql}";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=fasle ) {
			return $result["account_all"];
		}
		return 0;
	}
	
	//获取担保逾期信息
	
	//获取统计信息
	function GetCount($data = array()){
		global $mysql;
		if (IsExiest($data["type"])==""){
			$type = "all";
		}else{
			$type = $data["type"];
		}
		
		if ($type=="day"){
			if (IsExiest($data["dotime1"])==""){
				$sql = "select reverify_time from `{borrow}` where status=3 order by reverify_time asc";
				$result = $mysql->db_fetch_array($sql);
				if ($result==false) return "";
				$first_day_time = $result["reverify_time"];
			}else{
				$first_day_time = strtotime($data["dotime1"]);
			}
			if (IsExiest($data["dotime2"])==""){
				$last_day_time = time();
			}else{
				$last_day_time = strtotime($data["dotime2"]);
			}
			$first_day = date("Y-m-d",$first_day_time);
			$last_day = date("Y-m-d",$last_day_time);
			$first_time = strtotime($first_day );
			$last_time = strtotime($last_day);
			$days = ($last_time-$first_time)/(60*60*24);
			
			for ($i=0;$i<=$days;$i++){
				$j = $i+1;
				$next_first_time =   strtotime("$i day",$first_time);
				$next_last_time =   strtotime("$j day",$first_time);
				$next_day = date("Y-m-d",$next_first_time);
				//$sql = "select 1 from `{count}` where count_date='{$next_day}'";
				//$_result = $mysql->db_fetch_array($sql);
				$_result= false;
				if ($_result==false){
				
					//1，成功借款的本息，本金，利息，次数统计
					$sql = "select * from `{borrow}` where status= 3 and reverify_time>=$next_first_time and reverify_time<$next_last_time ";
					$result = $mysql->db_fetch_arrays($sql);
					if ($result==false){
						$_count[$next_day]["borrow_success_account"] =0;
						$_count[$next_day]["borrow_success_capital"] =0;
						$_count[$next_day]["borrow_success_interest"]  =0;
						$_count[$next_day]["borrow_success_times"]  =0;
					}else{
						foreach ($result as $key => $value){
							$_count[$next_day]["borrow_success_account"] += $value["repay_account_all"];
							$_count[$next_day]["borrow_success_capital"] += $value["repay_account_capital"];
							$_count[$next_day]["borrow_success_interest"] += $value["repay_account_interest"];
							$_count[$next_day]["borrow_success_times"] += 1;
							
						}
					}
					
					
					//2,已还的本息，本金，利息，次数
					$sql = "select * from `{borrow_repay}` where  repay_status=1 and repay_yestime>=$next_first_time and repay_yestime<$next_last_time ";
					$result = $mysql->db_fetch_arrays($sql);
					if ($result==false){
						$_count[$next_day]["repay_success_account"] =0;
						$_count[$next_day]["repay_success_capital"] =0;
						$_count[$next_day]["repay_success_interest"]  =0;
						$_count[$next_day]["repay_success_times"]  =0;
						$_count[$next_day]["repay_success_late_reminder"]  =0;
						$_count[$next_day]["repay_success_late_interest"]  =0;
						$_count[$next_day]["repay_success_late_times"]  =0;
					}else{
						foreach ($result as $key => $value){
							$_count[$next_day]["repay_success_account"] += $value["repay_account"];
							$_count[$next_day]["repay_success_capital"] += $value["repay_capital"];
							$_count[$next_day]["repay_success_interest"] += $value["repay_interest"];
							$_count[$next_day]["repay_success_times"] += 1;
							if ($value["late_days"]>0){ 
								$_count[$next_day]["repay_success_late_reminder"] += $value["late_reminder"];
								$_count[$next_day]["repay_success_late_interest"] += $value["late_interest"];
								$_count[$next_day]["repay_success_late_times"] += 1;
							}else{
								$_count[$next_day]["repay_success_late_reminder"]  =0;
								$_count[$next_day]["repay_success_late_interest"]  =0;
								$_count[$next_day]["repay_success_late_times"]  =0;
							}
						}
					}
					
					
					//3,投资的统计，金额，次数
					$sql = "select account from `{borrow_tender}` where addtime>=$next_first_time and addtime<$next_last_time ";
					$result = $mysql->db_fetch_arrays($sql);
					if ($result==false){
						$_count[$next_day]["tender_success_account"] =0;
						$_count[$next_day]["tender_success_times"]  =0;
						$_count[$next_day]["tender_success_all_account"] =0;
						$_count[$next_day]["tender_success_all_times"]  =0;
					}else{
						foreach ($result as $key => $value){
							if ($value["status"]==1){
								$_count[$next_day]["tender_success_account"] += $value["account"];
								$_count[$next_day]["tender_success_times"] += 1;
							}
							$_count[$next_day]["tender_success_all_account"] += $value["account"];
							$_count[$next_day]["tender_success_all_times"] += 1;
						}
					}
						
						
					
					//4,资金记录的统计，金额，次数
					$sql = "select type,sum(money) as account_all,count(1) as num from `{account_log}` where addtime>=$next_first_time and addtime<$next_last_time group by type ";
					$result = $mysql->db_fetch_arrays($sql);
					
					foreach ($result as $key => $value){
						
						$_count[$next_day]["log_".$value["type"]."_account"] += $value["account_all"];
						$_count[$next_day]["log_".$value["type"]."_account"] += $value["num"];
					}
					
					
				}
			}
			$i=0;
			if ($_count!=""){
				foreach ($_count as $_key => $_value){
					$_count[$_key]["key"] = $i++;
					foreach ($_value as $_k => $_v){
						$_count["总的"][$_k] += $_v;
					}
				}
			}
			return $_count;
			
			
		}
		
	}
	
	function GetVouchUsersList($data){
		global $mysql;
		$page = empty($data['page'])?1:$data['page'];
		$epage = empty($data['epage'])?10:$data['epage'];
		$_select = " p1.*,p2.credit,p3.tender_vouch";
		$sql = "select SELECT from `{user}` as p1 left join `{credit}` as p2 on p1.user_id=p2.user_id left join `{user_amount}` as p3 on p1.user_id=p3.user_id where p1.user_id in (select user_id from `{user_amount}` where tender_vouch >0)  ";
		if (isset($data['limit']) ){
			$_limit = "";
			if ($data['limit'] != "all"){
				$_limit = "  limit ".$data['limit'];
			}
			$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,  $_order, $_limit), $sql));
			return $list;
		}			 
		
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num', '', ''), $sql));

		$total = $row['num'];
		$total_page = ceil($total / $epage);
		$index = $epage * ($page - 1);
		$limit = " limit {$index}, {$epage}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select,$_order, $limit), $sql));		
		$list = $list?$list:array();
	
		return array(
            'list' => $list,
            'total' => $total,
            'page' => $page,
            'epage' => $epage,
            'total_page' => $total_page
        );
	}
	
	//网站统计
	public static function GetAll($data=array()){
		global $mysql;
		$sql = "select sum(account) as account,count(1) as times from `{borrow}`";
		$result = $mysql->db_fetch_array($sql);
		$_result['borrow_times'] = $result['times'];
		$_result['borrow_account'] = $result['account'];
		
		$sql = "select sum(account) as account,count(1) as times  from `{borrow}` where status=3";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$_result['borrow_success_times'] = 0;
			$_result['borrow_success_account'] = 0;
			$_result['borrow_success_scale']=0;
		}else{
			$_result['borrow_success_times'] = $result['times'];
			$_result['borrow_success_account'] = $result['account'];
			$_result['borrow_success_scale'] = round($_result['borrow_success_times']/$_result['borrow_times'],2);
		}
		return $_result;
	}
	
	//删除，只能删除草稿的标
	public static function Delete($data = array()){
		global $mysql;
		$id = $data['id'];
		if (!is_array($id)){
			$id = array($id);
		}
		if (isset($data['status']) && $data['status']!=""){
			$_sql .= " and status ='".$data['status']."'";
		}
		if (isset($data['user_id'])  && $data['user_id']!=""){
			$_sql = " and user_id={$data['user_id']} ";
		}
		$sql = "delete from {borrow}  where borrow_nid in (".join(",",$id).") $_sql";
		return $mysql->db_query($sql);
	}
	
	
	//流标处理
	function ActionLiubiao($data){
		global $mysql;
		$status= $data['status'];
		if ($status==1){
			$result = self::Cancel($data);
		}elseif($status==2){
			$valid_time = $data['days'];
			$sql = "update `{borrow}` set borrow_valid_time=borrow_valid_time +{$valid_time} where borrow_nid={$data['borrow_nid']}";
			$mysql->db_query($sql);
		}
		return true;
	}
	
	function GetLiucheng($data){
		global $mysql;
		$user_id= $data['user_id'];
		$sql = "select * from `{attestation}` where user_id='{$user_id}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$_result['attestion_status']=0;
		}else{
			$_result['attestion_status']=1;
		}
		
		
		$sql = "select * from `{borrow}` where user_id='{$user_id}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$_result['borrow_status']=0;
		}else{
			$_result['borrow_status']=1;
		}
		
		
		$sql = "select * from `{borrow}` where status=3 and user_id='{$user_id}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$_result['borrow_success_status']=0;
		}else{
			$_result['borrow_success_status']=1;
		}
		
		
		$sql = "select * from `{borrow_repay}` where status=1 and user_id='{$user_id}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$_result['borrow_repay_status']=0;
		}else{
			$_result['borrow_repay_status']=1;
		}
		return $_result;
	}
	
	public static function GetOther($data = array()){
		global $mysql;
		$_sql = "where 1=1 ";
		if (IsExiest($data['user_id'])!=""){
			$_sql .= " and  user_id = '{$data['user_id']}' ";
		}
		$sql = "select * from `{borrow_other}` $_sql ";
		$result = $mysql->db_fetch_array($sql);
		
		return $result;
	}

}



?>