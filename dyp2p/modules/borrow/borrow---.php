<?
/******************************
 * $File: borrow.inc.php
 * $Description: 借款用户中心处理文件
 * $Author: hummer 
 * $Time:2010-08-09
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

include_once("borrow.class.php");
include_once("borrow.auto.php");
//借款标的添加和修改


//用户投标
if ($_U['query_type'] == "tender"){

		include_once(ROOT_PATH."modules/account/account.class.php");
		
	       $borrow_result = borrowClass::GetOne(array("borrow_nid"=>'20130900022'));
		       $result=4171;
		       $sql = "select * from `{borrow_tender}` where id={$result}";
				$tender_result = $mysql->db_fetch_array($sql);
		
			//将借款标添加进去
			$_tender['borrow_nid'] = '20130900017';
			$_tender['user_id'] = 1439;
			$_tender['account'] = $tender_result['account'];
			$_tender['contents'] = '';
			
		
			$_tender['flow_count'] = $tender_result['flow_count'];
		
			
			$_tender['status'] = 0;
			$_tender['nid'] = $tender_result['nid'];//订单号
			
			if($borrow_result['is_flow']==1 && $result>0){
				$sql = "update `{borrow_tender}` set status=1 where id={$result}";
				$mysql->db_query($sql);
				
				$sql = "select * from `{borrow_tender}` where id={$result}";
				$tender_result = $mysql->db_fetch_array($sql);
				
				$tender_userid=$_tender['user_id'];
				$borrow_nid=$_tender['borrow_nid'];
				$tender_id=$result;
				$tender_account =$tender_result['account'];
				$flow_count=$_tender['flow_count'];
				$borrow_userid=$borrow_result['user_id'];
				$account=$tender_result['account'];
				$borrow_url = "<a href=/invest/a{$borrow_result['borrow_nid']}.html target=_blank>{$borrow_result['name']}</a>";
				
				
					

				
				//添加投资的收款纪录
				$_equal["account"] = $tender_account;
				$_equal["period"] = $borrow_result["borrow_period"];
				$_equal["apr"] = $borrow_result["borrow_apr"];
				$_equal["style"] = 2;
				$_equal["type"] = "";
				$equal_result = EqualInterest($_equal);
				
				foreach ($equal_result as $period_key => $value){
					$repay_month_account = $value['account_all'];
					
									$sql = "select 1 from `{borrow_repay}` where user_id='{$borrow_userid}' and repay_period='0' and borrow_nid='{$borrow_nid}'";
				$result = $mysql->db_fetch_array($sql);
				
				if ($result==false){
					$sql = "insert into `{borrow_repay}` set `addtime` = '".time()."',";
					$sql .= "`addip` = '".ip_address()."',user_id='{$borrow_userid}',status=1,`borrow_nid`='{$borrow_nid}',`repay_period`='0',";
					$sql .= "`repay_time`='{$value['repay_time']}',`repay_account`='{$value['account_all']}',";
					$sql .= "`repay_interest`='{$value['account_interest']}',`repay_capital`='{$value['account_capital']}'";
					$mysql ->db_query($sql);
				}else{
					$sql = "update `{borrow_repay}` set `addtime` = '".time()."',";
					$sql .= "`addip` = '".ip_address()."',user_id='{$borrow_userid}',status=1,`borrow_nid`='{$borrow_nid}',`repay_period`='0',";
					$sql .= "`repay_time`='{$value['repay_time']}',`repay_account`=`repay_account`+'{$value['account_all']}',";
					$sql .= "`repay_interest`=`repay_interest`+'{$value['account_interest']}',`repay_capital`=`repay_capital`+'{$value['account_capital']}'";
					$sql .= " where user_id='{$borrow_userid}' and repay_period='0' and borrow_nid='{$borrow_nid}'";
					$mysql ->db_query($sql);
				}
					
				//防止重复添加还款信息
					$sql = "select 1 from `{borrow_recover}` where user_id='{$tender_userid}' and borrow_nid='{$borrow_nid}' and recover_period='$period_key' and tender_id='{$tender_id}'";
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
				
				$recover_times = count($equal_result);
				//第五步,更新投资标的信息
				$_equal["type"] = "all";
				$equal_result = EqualInterest($_equal);
				$recover_all = $equal_result['account_total'];
				$recover_interest_all = $equal_result['interest_total'];
				$recover_capital_all = $equal_result['capital_total'];
				$sql = "update `{borrow_tender}` set recover_account_all='{$equal_result['account_total']}',recover_account_interest='{$equal_result['interest_total']}',recover_account_wait='{$equal_result['account_total']}',recover_account_interest_wait='{$equal_result['interest_total']}',recover_account_capital_wait='{$equal_result['capital_total']}'  where id='{$tender_id}'";
				$mysql->db_query($sql);
				
					$sql = "update `{borrow}` set repay_account_all=repay_account_all+'{$equal_result['account_total']}',repay_account_interest=repay_account_interest+'{$equal_result['interest_total']}',repay_account_capital=repay_account_capital+'{$equal_result['capital_total']}',repay_account_wait=repay_account_wait+'{$equal_result['account_total']}',repay_account_interest_wait=repay_account_interest_wait+'{$equal_result['interest_total']}',repay_account_capital_wait=repay_account_capital_wait+'{$equal_result['capital_total']}',flow_money=flow_money+'{$tender_account}',flow_count=flow_count+'{$flow_count}' where borrow_nid='{$borrow_nid}'";
			$mysql->db_query($sql);
				
				
							//第六步,扣除投资人的资金
				$log_info["user_id"] = $tender_userid;//操作用户id
				$log_info["nid"] = "tender_success_".$borrow_nid.$tender_userid.$tender_id.$period_key;//订单号
				$log_info["money"] = $tender_account;//操作金额
				$log_info["income"] = 0;//收入
				$log_info["expend"] = $tender_account;//支出
				$log_info["balance_cash"] = 0;//可提现金额
				$log_info["balance_frost"] = 0;//不可提现金额
				$log_info["frost"] = -$tender_account;//冻结金额
				$log_info["await"] = 0;//待收金额
				$log_info["type"] = "tender_success";//类型
				$log_info["to_userid"] = $borrow_userid;//付给谁
				$log_info["remark"] = "投标[{$borrow_url}]成功投资金额扣除";
				accountClass::AddLog($log_info);
				
				//第七步,添加待收的金额
				$log_info["user_id"] = $tender_userid;//操作用户id
				$log_info["nid"] = "tender_success_frost_".$borrow_nid.$tender_userid.$tender_id.$period_key;//订单号
				$log_info["money"] = $recover_all;//操作金额
				$log_info["income"] = 0;//收入
				$log_info["expend"] = 0;//支出
				$log_info["balance_cash"] = 0;//可提现金额
				$log_info["balance_frost"] = 0;//不可提现金额
				$log_info["frost"] = 0;//冻结金额
				$log_info["await"] = $recover_all;//待收金额
				$log_info["type"] = "tender_success_frost";//类型
				$log_info["to_userid"] = $borrow_userid;//付给谁
				$log_info["remark"] =  "投标[{$borrow_url}]成功待收金额增加";
				accountClass::AddLog($log_info);
				

				//加入用户操作记录
				$user_log["user_id"] = $tender_userid;
				$user_log["code"] = "tender";
				$user_log["type"] = "tender_success";
				$user_log["operating"] = "tender";
				$user_log["article_id"] = $tender_userid;
				$user_log["result"] = 1;
				$user_log["content"] = "投资流转标：[{$borrow_url}]成功";
				usersClass::AddUsersLog($user_log);	
				
				//如果有设置奖励并且招标成功，或者失败也奖励
		     if ($borrow_result['award_status']!=0){
		          //投标奖励扣除和增加。
					if ($borrow_result['award_status']==1){
						$money = round(($tender_account/$borrow_result['account'])*$borrow_result['award_account'],2);
					}elseif ($borrow_result['award_status']==2){
						$money = round((($borrow_result['award_scale']/100)*$tender_account),2);
					}
					
				
					$log_info["user_id"] = $tender_userid;//操作用户id
					$log_info["nid"] = "tender_award_add_".$tender_userid."_".$tender_id.$borrow_nid;//订单号
					$log_info["money"] = $money;//操作金额
					$log_info["income"] = $money;//收入
					$log_info["expend"] = 0;//支出
					$log_info["balance_cash"] = $money;//可提现金额
					$log_info["balance_frost"] = 0;//不可提现金额
					$log_info["frost"] = 0;//冻结金额
					$log_info["await"] = 0;//待收金额
					$log_info["type"] = "tender_award_add";//类型
					$log_info["to_userid"] = 0;//付给谁
					$log_info["remark"] =  "借款[{$borrow_url}]的借款奖励";
					accountClass::AddLog($log_info);
		      }
				
				//更新统计信息
				borrowClass::UpdateBorrowCount(array("user_id"=>$tender_userid,"tender_times"=>1,"tender_account"=>$tender_account,"tender_success_times"=>1,"tender_success_account"=>$tender_account,"tender_recover_account"=>$recover_all,"tender_recover_wait"=>$recover_all,"tender_capital_account"=>$recover_capital_all,"tender_capital_wait"=>$recover_capital_all,"tender_interest_account"=>$recover_interest_all,"tender_interest_wait"=>$recover_interest_all,"tender_recover_times"=>$recover_times,"tender_recover_times_wait"=>$recover_times));
				
				
				

				
			}
			if($borrow_result['is_flow']==1){
			
			$url="success&type=wait";
			}else{
			$url="gettender";
			}
			if ($tender_id>0){
				$msg = array("投标成功","","/index.php?user&q=code/borrow/".$url);
			}elseif (IsExiest($MsgInfo[$result])!=""){
				$msg = array($MsgInfo[$result],"","/index.php?user&q=code/borrow/".$url);
			}else{
				$msg = array($result,"","/index.php?user&q=code/borrow/".$url);
			}	
		
	
}

?>