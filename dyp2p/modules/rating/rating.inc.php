<?php
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

include_once("rating.class.php");
$valicode = isset($_POST['valicode'])?$_POST['valicode']:"";

$url = $_U['query_url']."/{$_U['query_type']}";
if (isset($_G['query_string'][2])){
	$url .= "&".$_G['query_string'][2];
}
if (isset($_POST['valicode']) && $valicode!=$_SESSION['valicode']){
		
		$msg = array("验证码错误","",$url);
}else{
	$_SESSION['valicode'] = "";
	//密码保护功能
	if  ($_U['query_type'] == "info" || $_U['query_type'] == "basic"){
		if (isset($_POST['submit'])){
			$var = array("sex","marry","children","income","birthday","edu","is_car","address","school_year","school","house","phone","province","city","area","realname","card_id","phone_num");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 1;
			$result = ratingClass::GetInfoOne($data);
			if (is_array($result)){
				$_result = ratingClass::UpdateInfo($data);
			}else{
				$_result = ratingClass::AddInfo($data);
			}
			if ($_result > 0){
				$sql="select * from `{credit_log}` where user_id={$data['user_id']} and type='info_credit'";
				$cre_result=$mysql->db_fetch_array($sql);
				if ($cre_result==false){
					$credit_log['user_id'] = $data['user_id'];
					$credit_log['nid'] = "info_credit";
					$credit_log['code'] = "approve";
					$credit_log['type'] = "info_credit";
					$credit_log['addtime'] = time();
					$credit_log['article_id'] =$data['user_id'];
					$credit_log['remark'] = "填写个人详情获得的积分";
					creditClass::ActionCreditLog($credit_log);
				}
				if ($_POST['web']=="amount"){
					echo "<script>location.href='/amount_job/index.html';</script>";
				}elseif ($_POST['web']=="borrow"){
					echo "<script>location.href='/borrow_job/index.html';</script>";
				}else{

					$msg = array("提交成功","",$url);
					
				}
			}else{
				$msg = array("提交失败","","/borrow_info/index.html");
			}
		}else{
			$data['user_id'] = $_G['user_id'];
			$result = ratingClass::GetInfoOne($data);
			if (is_array($result)){
				$_U["rating_result"] = $result;
			}
		}
	}elseif($_U['query_type'] == "contact"){
		if (isset($_POST['submit'])){
			//$var = array("linkman2","linkman3","linkman4","linkman5","linkman6","linkman7","linkman8","linkman9","linkman10","linkman11","phone2","phone3","phone4","phone5","phone6","phone7","phone8","phone9","phone10","phone11");
			$var = array("linkman2","linkman3","linkman4","linkman5","linkman6","linkman8","phone2","phone3","phone4","phone5","phone6","phone8");
			$data = post_var($var);
			$array=$data;
			unset($array['phone5']);
			unset($array['linkman5']);
			foreach ($array as $key => $value){
				if ($value==""){
					unset($array[$key]);
				}
			}
			if (count($array)!= count(array_unique($array))){
				if ($_POST['web']=="amount"){
					$msg = array("除紧急联系人，不能有重复值","","/amount_contact/index.html");
				}elseif ($_POST['web']=="borrow"){
					$msg = array("除紧急联系人，不能有重复值","","/borrow_contact/index.html");
				}else{
					$msg = array("除紧急联系人，不能有重复值","",$url);
				}
			}else{
				$data['user_id'] = $_G['user_id'];
				$data['status'] = 1;
				$result = ratingClass::GetContactOne($data);
				//echo "<script>alert('1')</ script>";
				if (is_array($result)){
					$_result = ratingClass::UpdateContact($data);
				}else{
					$_result = ratingClass::AddContact($data);
				}
				if ($_result > 0){
					$sql="select * from `{credit_log}` where user_id={$data['user_id']} and type='contact_credit'";
					$cre_result=$mysql->db_fetch_array($sql);
					if ($cre_result==false){
						$credit_log['user_id'] = $data['user_id'];
						$credit_log['nid'] = "contact_credit";
						$credit_log['code'] = "approve";
						$credit_log['type'] = "contact_credit";
						$credit_log['addtime'] = time();
						$credit_log['article_id'] =$data['user_id'];
						$credit_log['remark'] = "填写主要联系人获得的积分";
						creditClass::ActionCreditLog($credit_log);
					}
					if ($_POST['web']=="amount"){
						echo "<script>location.href='/amount_contact/index.html'</script>";
					}elseif ($_POST['web']=="borrow"){
						echo "<script>location.href='/borrow_contact/index.html'</script>";
					}else{
						$msg = array("提交成功","",$url);
					}
				}else{
					$msg = array("提交失败","","/borrow_contact/index.html");
				}
			}
		}else{
			$data['user_id'] = $_G['user_id'];
			$result = ratingClass::GetContactOne($data);
			if (is_array($result)){
				$_U["rating_result"] = $result;
			}
		}
	}elseif($_U['query_type'] == "job"){
		if (isset($_POST['submit'])){
			$var = array("name","type","industry","peoples","worktime1","office","address","tel");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 1;
			$result = ratingClass::GetJobOne($data);
			if (is_array($result)){
				$_result = ratingClass::UpdateJob($data);
			}else{
				$_result = ratingClass::AddJob($data);
				$sql="select * from `{credit_log}` where user_id={$data['user_id']} and type='work_credit'";
				$cre_result=$mysql->db_fetch_array($sql);
				if ($cre_result==false){
				$credit_log['user_id'] = $data['user_id'];
				$credit_log['nid'] = "work_credit";
				$credit_log['code'] = "approve";
				$credit_log['type'] = "work_credit";
				$credit_log['addtime'] = time();
				$credit_log['article_id'] =$data['user_id'];
				$credit_log['remark'] = "填写工作信息获得的积分";
				creditClass::ActionCreditLog($credit_log);
				}
			}
			if ($_result > 0){
				if ($_POST['web']=="amount"){
					echo "<script>location.href='/amount_finance/index.html'</script>";
				}elseif ($_POST['web']=="borrow"){
					echo "<script>location.href='/borrow_finance/index.html'</script>";
				}else{
					$msg = array("提交成功","",$url);
				}
			}else{
				$msg = array("提交失败","","/borrow_job/index.html");
			}
		}else{
			$data['user_id'] = $_G['user_id'];
			$result = ratingClass::GetJobOne($data);
			if (is_array($result)){
				$_U["rating_result"] = $result;
			}
		}
	}elseif($_U['query_type'] == "company"){
		if (isset($_POST['submit'])){
			$var = array("name","license_num","tax_num_di","tax_num_guo","address","rent_time","rent_money","hangye","people","time");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 1;
			$result = ratingClass::GetCompanyOne($data);
			if (is_array($result)){
				$_result = ratingClass::UpdateCompany($data);
			}else{
				$_result = ratingClass::AddCompany($data);
				$sql="select * from `{credit_log}` where user_id={$data['user_id']} and type='work_credit'";
				$cre_result=$mysql->db_fetch_array($sql);
				if ($cre_result==false){
					$credit_log['user_id'] = $data['user_id'];
					$credit_log['nid'] = "work_credit";
					$credit_log['code'] = "approve";
					$credit_log['type'] = "work_credit";
					$credit_log['addtime'] = time();
					$credit_log['article_id'] =$data['user_id'];
					$credit_log['remark'] = "填写工作信息获得的积分";
					creditClass::ActionCreditLog($credit_log);
				}
			}
			if ($_result > 0){
				if ($_POST['web']=="amount"){
					echo "<script>location.href='/amount_finance/index.html'</script>";
				}elseif ($_POST['web']=="borrow"){
					echo "<script>location.href='/borrow_finance/index.html'</script>";
				}else{
					$msg = array("提交成功","",$url);
				}
			}else{
				$msg = array("提交失败","","/borrow_company/index.html");
			}
		}else{
			$data['user_id'] = $_G['user_id'];
			$result = ratingClass::GetCompanyOne($data);
			if (is_array($result)){
				$_U["rating_result"] = $result;
			}
		}
	}elseif($_U['query_type'] == "addassets"){
		if (isset($_POST['submit'])){
			$var = array("name","account","assetstype","other");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 0;
			$_result = ratingClass::AddAssets($data);
			if ($_result > 0){
				$msg = array("提交成功","","/borrow_finance/index.html");
			}else{
				$msg = array("提交失败","","/borrow_finance/index.html");
			}
		}elseif (isset($_REQUEST['edit'])){
			$data['id'] = $_REQUEST['edit'];
			$result = ratingClass::GetAssetsOne($data);
			if (is_array($result)){
				$_U["rating_result"] = $result;
			}
		}
	}elseif($_U['query_type'] == "addrevenue" || $_U['query_type'] == "addpayment"){
		if (isset($_POST['submit'])){
			$var = array("type","use_type","name","account","other");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 1;
			if (isset($_REQUEST['edit'])){
				$data['id'] = $_REQUEST['edit'];
				$_result = ratingClass::UpdateFinance($data);
			}else{
				$_result = ratingClass::AddFinance($data);
			}
			if ($_result > 0){
				if ($_POST['web']=="amount"){
					echo "<script>location.href='/amount_finance/index.html'</script>";
				}elseif ($_POST['web']=="borrow"){
					echo "<script>location.href='/borrow_finance/index.html'</script>";
				}else{
					 if($_U['query_url']=='/?user&q=code/rating')
					{
					$msg = array("提交成功","","/?user&q=code/rating/finance");
					}else{
					$msg = array("提交成功","",$url);
					}
				}
			}else{
				$msg = array("提交失败","","/borrow_finance/index.html");
			}
		}elseif (isset($_REQUEST['edit'])){
			$data['id'] = $_REQUEST['edit'];
			$result = ratingClass::GetFinanceOne($data);
			if (is_array($result)){
				$_U["rating_result"] = $result;
			}else{
				if($_REQUEST['type']=="amount"){
					$msg = array("读取失败","","/amount_finance/index.html");
				}else{
					$msg = array("读取失败","","/borrow_finance/index.html");
				}
			}
		}
	}elseif($_U['query_type'] == "assets"){
		if($_REQUEST['del']!=""){
			$data['id'] = $_REQUEST['del'];
			$data['user_id'] = $_G['user_id'];
			$result = ratingClass::DelAssets($data);
			if ($result>0){
				$msg = array("删除成功","","/borrow_finance/index.html");
			}else{
				$msg = array("删除失败","","/borrow_finance/index.html");
			}
		}
	}elseif($_U['query_type'] == "finance"){
		if($_REQUEST['del']!=""){
			$data['id'] = $_REQUEST['del'];
			$data['user_id'] = $_G['user_id'];
			$result = ratingClass::DelFinance($data);
			if ($result>0){
				if ($_REQUEST['type']=="amount"){
					$msg = array("删除成功","","/amount_finance/index.html");
				}elseif ($_REQUEST['type']=="borrow"){
					$msg = array("删除成功","","/borrow_finance/index.html");
				}else{
					$msg = array("删除成功","",$url);
				}
			}else{
				$msg = array("删除失败","","/borrow_finance/index.html");
			}
		}
	}
}

$template = "user_rating.html";
?>
