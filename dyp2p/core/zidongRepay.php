<?php 
$sql_zj = "select p1.*,p2.borrow_period,p2.user_id as b_user_id,p2.name as borrow_name  from {borrow_tender} as p1 left join  `{borrow}` as p2 on p2.borrow_nid =  p1.borrow_nid where p1.status=1 and p1.flow_status=0 and p1.flow_count >0 and p2.is_flow =1 ";
$result_zj=$mysql->db_fetch_arrays($sql_zj);
foreach ($result_zj as $key => $value){
   $nowtime= $value["addtime"];
   $endtime = get_times_jh(array("num"=>$value["borrow_period"],"time"=>$nowtime));
   $borrow_nid=$value["borrow_nid"];
   $tender_id=$value["id"];
   $borrow_userid=$value["b_user_id"];
   $borrow_url = "<a href=/invest/a{$value['borrow_nid']}.html target=_blank>{$value['borrow_name']}</a>";//借款的地址
   $borrow_name=$value['borrow_name'];
   if($endtime<=time()){

	   $sql = "select p1.* from `{borrow_recover}` as p1 where p1.borrow_nid='{$borrow_nid}' and p1.tender_id='{$tender_id}' and recover_status=0 ";
	   $result_recover = $mysql->db_fetch_arrays($sql);
	   	  foreach ($result_recover as $key_recover => $value_recover){

			$sql = "update  `{borrow_recover}` set recover_yestime='".time()."',recover_account_yes = recover_account ,recover_capital_yes = recover_capital ,recover_interest_yes = recover_interest ,status=1,recover_status=1 where id = '{$value_recover['id']}'";
				$mysql->db_query($sql);
      

		 	//用户对借款标的还款
				$log_info["user_id"] = $value_recover['user_id'];//操作用户id
				$log_info["nid"] = "tender_repay_yes_".$value_recover['user_id']."_".$borrow_nid.$value_recover['id'];//订单号
				$log_info["money"] = $value_recover['recover_account'];//操作金额
				$log_info["income"] = $value_recover['recover_account'];//收入
				$log_info["expend"] = 0;//支出
				$log_info["balance_cash"] = $value_recover['recover_account'];//可提现金额
				$log_info["balance_frost"] = 0;//不可提现金额
				$log_info["frost"] = 0;//冻结金额
				$log_info["await"] = -$value_recover['recover_account'];//待收金额
				$log_info["type"] = "tender_repay_yes";//类型
				$log_info["to_userid"] = $borrow_userid;//付给谁
				$log_info["remark"] = "[{$borrow_url}]流转借款标自动进行到期还款";
				zidong_AddLog($log_info);
				
							
					//更新投资的信息
				$sql = "update  `{borrow_tender}` set recover_times=recover_times+1,recover_account_yes= recover_account_yes + {$value_recover['recover_account']},recover_account_capital_yes = recover_account_capital_yes  + {$value_recover['recover_capital']} ,recover_account_interest_yes = recover_account_interest_yes + {$value_recover['recover_interest']},recover_account_wait= recover_account_wait - {$value_recover['recover_account']},recover_account_capital_wait = recover_account_capital_wait  - {$value_recover['recover_capital']} ,recover_account_interest_wait = recover_account_interest_wait - {$value_recover['recover_interest']},flow_status=1  where id = '{$value_recover['tender_id']}'";
				$mysql->db_query($sql);
					
				
				//提醒设置
				$remind['nid'] = "loan_pay";
				$remind['receive_userid'] = $value_recover['user_id'];
				$remind['title'] = "[{$borrow_url}]流转借款标自动对[{$borrow_name}]借款的还款";
				$remind['content'] = "[{$borrow_url}]流转借款标自动在".date("Y-m-d H:i:s")."对[{$borrow_url}}</a>]借款的还款,还款金额为￥{$value_recover['recover_account']}";
				
				$tender_fee = 0;
              UpdateBorrowCount_zidong(array("user_id"=>$value_recover['user_id'],"tender_recover_times_yes"=>1,"tender_recover_times_wait"=>-1,"tender_recover_yes"=>$value_recover['recover_account'],"tender_recover_wait"=>-$value_recover['recover_account'],"tender_capital_yes"=>$value_recover['recover_capital'],"tender_capital_wait"=>-$value_recover['recover_capital'],"tender_interest_yes"=>$value_recover['recover_interest'],"tender_interest_wait"=>-$value_recover['recover_interest'],"fee_account"=>$tender_fee,"fee_tender_account"=>$tender_fee));
			 
			 
			 $repay_account =$value_recover['recover_account'];
			 $repay_capital =$value_recover['recover_capital'];
			 $repay_interest =$value_recover['recover_interest'];
			  //添加最后的还款金额
		$sql = "update `{borrow}` set repay_account_yes= repay_account_yes + {$repay_account},repay_account_capital_yes= repay_account_capital_yes + {$repay_capital},repay_account_interest_yes= repay_account_interest_yes + {$repay_interest},repay_account_wait= repay_account_wait - {$repay_account},repay_account_capital_wait= repay_account_capital_wait - {$repay_capital},repay_account_interest_wait= repay_account_interest_wait - {$repay_interest} where borrow_nid='{$borrow_nid}'";
		$result = $mysql -> db_query($sql);
		
	
					$credit_blog['user_id'] = $value_recover['user_id'];
					$credit_blog['nid'] = "tender_repay_time";
					$credit_blog['code'] = "borrow";
					$credit_blog['type'] = "tender";
					$credit_blog['addtime'] = time();
					$credit_blog['article_id'] =$value_recover['id'];
					$credit_blog['remark'] = "收到借款[{$borrow_url}]完整本息还款积分";
					zidong_ActionCreditLog($credit_blog);
					
					
					   
		 $sql = "update `{borrow_repay}` set repay_status=0,repay_yestime='".time()."',repay_account_yes=repay_account_yes+{$repay_account},repay_interest_yes=repay_interest_yes+{$repay_interest},repay_capital_yes=repay_capital_yes+{$repay_capital} where repay_period ='{$value_recover['recover_period']}' and borrow_nid='{$borrow_nid}' ";
$mysql->db_query($sql);
         
		 

		   }
		
		

	   
    }
	
}

 $sql = "update `{borrow_repay}` set repay_status=1 where repay_account=repay_account_yes and repay_account > 0 ";
 $mysql->db_query($sql);


function zidong_ActionCreditLog($data){
		global $mysql;
		$_nid = explode(",",$data['nid']);
		
		//第一步先删除没有的积分记录
		$_sql = "delete from `{credit_log}` where code='{$data['code']}'  and type='{$data['type']}' and article_id='{$data['article_id']}' and nid not in ('{$data['nid']}')";
		$mysql->db_query($_sql);
		
		//第二步加入资金记录
		if (count($_nid)>0){
			foreach ($_nid as $key => $nid){
				if ($nid!=""){
					if (isset($data['value']) && $data['value']!=""){
						$_value = $data['value'];
					}else{
						$sql = "select `value` from `{credit_type}` where nid='{$nid}'";
						$result = $mysql->db_fetch_array($sql);
						$_value = $result['value'];
					}
					
				
					$sql = "insert into `{credit_log}` set code='{$data['code']}',user_id='{$data['user_id']}',`value`='{$_value}',`credit`='{$_value}',type='{$data['type']}',article_id='{$data['article_id']}',nid='{$nid}',addtime='{$data['addtime']}',remark='{$data['remark']}'";
					$mysql->db_query($sql);
				}
			}
			zidong_ActionCredit(array("user_id"=>$data['user_id']));
		}
		
	}
		function zidong_ActionCredit($data){
		global $mysql;
		$sql = "select sum(p1.credit) as num,p2.class_id from `{credit_log}` as p1 left join `{credit_type}` as p2 on p1.nid=p2.nid  where p1.user_id='{$data['user_id']}' group by p2.class_id order by p2.class_id desc";
		$result = $mysql->db_fetch_arrays($sql);
		$credits=serialize($result); 
		$sql = "select 1 from `{credit}` where user_id='{$data['user_id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$sql = "insert into `{credit}` set user_id='{$data['user_id']}',`credits`='{$credits}'";
		}else{
			$sql = "update `{credit}` set `credits`='{$credits}' where user_id='{$data['user_id']}'";
		}
		$mysql->db_query($sql);
		zidong_CountCredit(array("user_id"=>$data['user_id'],"type"=>"catoreasy"));
	}
	
		function zidong_CountCredit($data){
		global $mysql;
		if ($data['type']=="catoreasy"){
			require_once(ROOT_PATH."/modules/borrow/borrow.class.php");
			$result = zidong_GetBorrowCredit(array("user_id"=>$data['user_id']));
			$sql = "update `{credit}` set credit='{$result['credit_total']}' where user_id='{$data['user_id']}'";
			$mysql->db_query($sql);
		}
 	
	}
	
	
	
	function zidong_GetBorrowCredit($data){
		global $mysql,$_G;
		
		if (IsExiest($_G["borrow_credit_result"])!=false) return $_G["borrow_credit_result"];//防止重复读取\
		
		if ($data['user_id']=="") return false;
		
		$_result = array();
		
		//$sql = "select sum(credit) as num from `{attestations}` where user_id='{$data['user_id']}'";
		//$attcredit = $mysql->db_fetch_array($sql);
		
		require_once(ROOT_PATH."modules/attestations/attestations.class.php");
		$attcredit = attestationsClass::GetAttestationsCredit(array("user_id"=>$data['user_id']));
		
		$sql = "select sum(credit) as creditnum from `{credit_log}` where user_id='{$data['user_id']}' and code='borrow'";
		$credit_log = $mysql->db_fetch_array($sql);
		$sql = "select sum(credit) as creditnum from `{credit_log}` where user_id='{$data['user_id']}' and code='approve'";
		$approve = $mysql->db_fetch_array($sql);
		$_result[1] = $attcredit;
		$_result[2] = $credit_log['creditnum'];
		$_result[3] = $approve['creditnum'];
		
		$result = array("credit_total"=>$_result[2]+$_result[1]+$_result[3],"borrow_credit"=>$_result[2],"approve_credit"=>$_result[3]+$_result[1]);
		
		return $result;
	}
	
	
	function zidong_AddLog($data = array()){
		global $mysql;
		
		//第一步，查询是否有资金记录
		$sql = "select * from `{account_log}` where `nid` = '{$data['nid']}'";
		$result = $mysql -> db_fetch_array($sql);
		if ($result['nid']!="") return "account_log_nid_exiest";
		
		//第二步，查询原来的总资金
		$sql = "select * from `{account}` where user_id='{$data['user_id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$sql = "insert into `{account}` set user_id='{$data['user_id']}',total=0";
			$mysql->db_query($sql);
			$sql = "select * from `{account}` where user_id='{$data['user_id']}'";
			$result = $mysql->db_fetch_array($sql);
		}
		
		//第三步，加入用户的财务记录
		$sql = "insert into `{account_log}` set ";
		
		$sql .= "nid='{$data['nid']}',";
		$sql .= "user_id='{$data['user_id']}',";
		$sql .= "type='{$data['type']}',";
		$sql .= "money='{$data['money']}',";
		$sql .= "remark='{$data['remark']}',";
		$sql .= "to_userid='{$data['to_userid']}',";
		
		$sql .= "balance_cash_new='{$data['balance_cash']}',";
		$sql .= "balance_cash_old='{$result['balance_cash']}',";
		$sql .= "balance_cash=balance_cash_new+balance_cash_old,";
		
		$sql .= "balance_frost_new='{$data['balance_frost']}',";
		$sql .= "balance_frost_old='{$result['balance_frost']}',";
		$sql .= "balance_frost=balance_frost_new+balance_frost_old,";
		
		$sql .= "balance_new=balance_cash_new+balance_frost_new,";
		$sql .= "balance_old='{$result['balance']}',";
		$sql .= "balance=balance_new+balance_old,";
		
		$sql .= "income_new='{$data['income']}',";
		$sql .= "income_old='{$result['income']}',";
		$sql .= "income=income_new+income_old,";
		
		$sql .= "expend_new='{$data['expend']}',";
		$sql .= "expend_old='{$result['expend']}',";
		$sql .= "expend=expend_new+expend_old,";
		
		$sql .= "frost_new='{$data['frost']}',";
		$sql .= "frost_old='{$result['frost']}',";
		$sql .= "frost=frost_new+frost_old,";
		
		$sql .= "await_new='{$data['await']}',";
		$sql .= "await_old='{$result['await']}',";
		$sql .= "await=await_new+await_old,";
		
		$sql .= "total_old='{$result['total']}',";
		$sql .= "total=balance+frost+await,";
		$sql .=" `addtime` = '".time()."',`addip` = '".ip_address()."'";
		$mysql->db_query($sql);
		$id = $mysql->db_insert_id();
		
		$sql = "select * from `{account_log}` where user_id='{$data['user_id']}' and id='{$id}'";
		$result = $mysql->db_fetch_array($sql);
		
		//第四步，更新用户表
		$sql = "update `{account}` set income={$result['income']},expend='{$result['expend']}',";
		$sql .= "balance_cash={$result['balance_cash']},balance_frost={$result['balance_frost']},";
		$sql .= "frost={$result['frost']},";
		$sql .= "await={$result['await']},";
		$sql .= "balance={$result['balance']},";
		$sql .= "total={$result['total']}";
		$sql .=" where user_id='{$data['user_id']}'";
		$mysql->db_query($sql);
		
		//第三步，加入网站的总费用
		$sql = "select * from `{account_balance}` where `nid` = '{$data['nid']}'";
		$result = $mysql -> db_fetch_array($sql);
		if ($result==false){
			//加入网站的财务表
			$sql = "select * from `{account_balance}` order by id desc";
			$result = $mysql -> db_fetch_array($sql);
			if ($result==false){
				$result['total'] = 0;
				$result['balance'] = 0;
			}
			$total = $result['total'] + $data['income'] + $data['expend'];
			$sql = "insert into `{account_balance}` set total='{$total}',balance={$result['balance']}+".$data['income']."-".$data['expend'].",income='{$data['income']}',expend='{$data['expend']}',type='{$data['type']}',`money`='{$data['money']}',user_id='{$data['user_id']}',nid='{$data['nid']}',remark='{$data['remark']}', `addtime` = '".time()."',`addip` = '".ip_address()."'";
			$mysql->db_query($sql);
		}
		
		//第三步，加入用户的总费用
		$sql = "select * from `{account_users}` where `nid` = '{$data['nid']}'";
		$result = $mysql -> db_fetch_array($sql);
		if ($result==false){
			//加入用户的财务表
			$sql = "select * from `{account_users}` where user_id='{$data['user_id']}' order by id desc ";
			$result = $mysql -> db_fetch_array($sql);
			if ($result==false){
				$result['total'] = 0;
				$result['balance'] = 0;
			}
			$total = $result['total'] + $data['income'] + $data['expend'];
			$sql = "insert into `{account_users}` set total='{$total}',balance={$result['balance']}+".$data['income']."-".$data['expend'].",income='{$data['income']}',expend='{$data['expend']}',type='{$data['type']}',`money`='{$data['money']}',user_id='{$data['user_id']}',nid='{$data['nid']}',remark='{$data['remark']}', `addtime` = '".time()."',`addip` = '".ip_address()."',await='{$data['await']}',frost='{$data['frost']}'";
			$mysql->db_query($sql);
		}
		
		
		
		return $data['nid'];
		
	}
	//data = array("user_id"=>"");
	function UpdateBorrowCount_zidong($data = array()){
		global $mysql;
		if ($data['user_id']=="") return "";
		$user_id =$data['user_id'];
		$result = $mysql->db_fetch_array("select 1 from `{borrow_count}` where user_id='{$data['user_id']}'");
		if ($result==false){
			$sql= "insert into `{borrow_count}` set user_id='{$data['user_id']}'";
			$mysql->db_query($sql);
			
		}
		$sql = "update `{borrow_count}` set user_id='{$data['user_id']}'";
		unset ($data['user_id']);
		foreach ($data as $key => $value){
			$sql .= ",`{$key}`=`{$key}`+{$value}";
		}
		$sql .= " where user_id='{$user_id}'";
		$mysql->db_query($sql);
		return "";		
	}
	
?>