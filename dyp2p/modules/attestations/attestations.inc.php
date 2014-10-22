<?php
/******************************
 * $File: attestations.inc.php
 * $Description: 证明材料管理
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

include_once("attestations.class.php");

if (isset($_POST['valicode']) && $_POST['valicode']!=$_SESSION['valicode']){
		$msg = array("验证码错误");
}else{
	$_SESSION['valicode'] = "";
	if ($_U['query_type'] == "list"){	
		
	}
	elseif($_U['query_type'] == "one"){
		if (isset($_POST['name'])){
			$var = array("name","type_id");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$_G['upimg']['file'] = "pic";
			$_G['upimg']['code'] = "attestations";
			$_G['upimg']['type'] = "album";
			$_G['upimg']['user_id'] = $data["user_id"];
			$_G['upimg']['article_id'] = $data["attestations_id"];
			$data["pic_result"] = $upload->upfile($_G['upimg']);
			$result = attestationsClass::AddAttestations($data);
			if ($result>0){
				if ($_POST['web']=="amount"){
					if ($data['type_id']!=5 && $data['type_id']!=2 && $data['type_id']!=3 && $data['type_id']!=17 && $data['type_id']!=18 && $data['type_id']!=4){
						echo "<script>location.href='/amount/index.html';</script>";
					}else{
						$msg = array("操作成功","","/amount_att/index.html");
					}
				}else{
					$msg = array("操作成功","","/borrow_att/index.html");
				}
			}else{
				$msg = array($reuslt);
			}
		}
	}
	elseif($_U['query_type'] == "more"){
		if (isset($_POST['name'])){
			$var = array("name","type_id");
			$data = post_var($var);
			$data['user_id'] = $_G['user_id'];
			$_G['upimg']['file'] = "pic";
			$_G['upimg']['code'] = "attestations";
			$_G['upimg']['type'] = "album";
			$_G['upimg']['user_id'] = $data["user_id"];
			$_G['upimg']['article_id'] = $data["attestations_id"];
			$data["pic_result"] = $upload->upfile($_G['upimg']);
			
			if ($pic_result!=""){
				foreach($pic_result as $key => $value){
					if($value!=""){
						$data['litpic'] = $value['filename'];
						$result = attestationsClass::AddAttestations($data);
					}
				}
			}
			
			if ($result!==true){
				$msg = array($reuslt);
			}else{
				$msg = array("操作成功","","index.php?user&q=code/attestation");
			}
		}
		
	}
	elseif($_U['query_type'] == "view"){
		if (IsExiest($_REQUEST['user_id'])==""){
			echo "请不要乱操作";
			exit;
		}else{
			$str  = "<table ><tr><td>类型</td><td width='20%'>查看</td></tr>";
			$data["user_id"] = $_REQUEST['user_id'];
			$data["limit"] = "all";
			$data["status"] = 1;
			$result = attestationClass::GetList($data);
			foreach ($result as $key => $value){
				$str .= "<tr height='30' style='border-bottom:1px solic #cccccc'>";
				$str .= "<td>{$value['type_name']}</td>";
				$str .= "<td ><a href='{$value['litpic']}' target='_blank'>查看</a></td>";
				
				$str .= "</tr>";
			}
			$str .= "</table>";
			echo $str;
			exit;
		
		}
	
	}
	elseif($_U['query_type'] == "study"){
		if (isset($_POST['submit'])){
			$data['user_id'] = $_G['user_id'];
			$data['code'] = "approve";
			$data['type'] = $_POST['type'];
			$data['nid'] = $_POST['nid'];
			$result = attestationsClass::AddAttestationsStudy($data);
			if ($_POST['type']=="borrow_study"){
				if ($result==true){
					echo "<script>location.href='/borrow_info/index.html'</script>";
				}else{
					$msg = array($reuslt,"","/borrow_study/index.html");
				}
			}else{
				if ($result==true){
					echo "<script>location.href='/tender_finsh/index.html'</script>";
				}else{
					$msg = array($reuslt,"","/tender_study/index.html");
				}
			}	
		}
	}
}



$template = "user_attestations.html";
?>
