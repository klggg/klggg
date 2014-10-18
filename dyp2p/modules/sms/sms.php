<?php
/******************************
 * $File: sms.php
 * $Description: 提醒模块后台处理文件
 * $Author: ahui 
 * $Time:2010-06-06
 * $Update:Ahui
 * $UpdateDate:2012-06-10  
 * Copyright(c) 2010 - 2012 by deayou.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

require_once("sms.class.php");
//require_once("sms.inc.php");
$_A['list_purview']["sms"]["name"] = "短信管理";
$_A['list_purview']["sms"]["result"]["sms_set"] = array("name"=>"短信管理","url"=>"code/sms/set");/*
$_A['list_purview']["sms"]["result"]["sms_list"] = array("name"=>"发送记录","url"=>"code/sms/list");
*/
/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	    if (isset($_POST['type']) && $_POST['type']!=""){
    		$var = array("type","id");
    		$_data = post_var($var);
    		
    		$_result = smsClass::Actionsms($_data);
    		if ($_result>0){
    			$msg = array($MsgInfo['sms_action_success'],"",$_A['query_url']);
    		}else{
    			$msg = array($MsgInfo[$_result]);
    		}	
		}
}


/**
 * 添加
**/
elseif ($_A['query_type'] == "new"){
    //var_dump($_POST);exit;
	if (isset($_POST['typename'])){
		$var = array("typename","type_content","nid","advance_time","status");
		$data = post_var($var);
       
            $data['bz'] = $_POST['dyb'].'|'.$_POST['xyb'].'|'.$_POST['jzb'].'|'.$_POST['tb'].'|'.$_POST['dbb'].'|'.$_POST['lzb'].'|'.$_POST['mb'];        
    		$result = smsClass::Add($data);
    		if ($result !== true){
    			$msg = array($MsgInfo[$result]);
    		}else{
    			$msg = array("操作成功");
    		}
        
	}else{
		$data['limit'] = "all";
		$data['id'] = $_REQUEST['id'];
		$_A['sms_type_result'] =smsClass::GetTypeOne($data);
		if (is_array($_A['sms_type_result'])){
		            $bzarry=explode('|',$_A['sms_type_result']['bz']);
                   
                    foreach($bzarry as $key => $value){
                        $_A['sms_type_result'][$value]=$value;
                    }
			$data['type_id'] = $_REQUEST['id'];
			$_A['sms_list'] = smsClass::GetList($data);
		}else{
			$msg = array($result);
		}
		$pname = empty($pname)?"跟类型下":$pname;
		$magic->assign("pname",$pname);
	}
}


/**
 * 排序
**/
elseif ($_A['query_type'] == "actions"){
	if (isset($_POST['id'])){
		$data['id'] = $_POST['id'];
		$data['name'] = $_POST['name'];
		$data['nid'] = $_POST['nid'];
		$data['order'] = $_POST['order'];$data['order'] = $_POST['order'];
		$data['message'] = $_POST['message'];
		$data['phone'] = $_POST['phone'];
		$data['email'] = $_POST['email'];
		$result = smsClass::Action($data);
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
	}else{
		//添加
		if (isset($_POST['name'])){
			$data['type'] = "add";
			$data['name'] = $_POST['name'];
			$data['nid'] = $_POST['nid'];
			$data['type_id'] = $_POST['type_id'];
			$data['order'] = $_POST['order'];
			$data['message'] = $_POST['message'];
			$data['phone'] = $_POST['phone'];
			$data['email'] = $_POST['email'];
			$result = smsClass::Action($data);
			if ($result !== true){
				$msg = array($result);
			}else{
				$msg = array("操作成功");
			}
		}else{
			$msg = array("操作有误");
		}
	}
}
/**
 * 关闭
**/
elseif ($_A['query_type'] == "close"){
	$id = $_REQUEST['id'];
	$result = smsClass::Close(array("id"=>$id));
	if ($result !== true){
		$msg = array($MsgInfo[$result]);
	}else{
		$msg = array("关闭成功");
	}
}
/*
* 开启
*/
elseif ($_A['query_type'] == "open"){
	$id = $_REQUEST['id'];
	$result = smsClass::Open(array("id"=>$id));
	if ($result !== true){
		$msg = array($MsgInfo[$result]);
	}else{
		$msg = array("开启成功");
	}
}
/**
 * 修改
**/
elseif ($_A['query_type'] == "type_edit"){
	if (isset($_POST['typename'])){
		$var = array("typename","nid","type_content","advance_time","status");
		$data = post_var($var);
        if(strlen($data['type_content'])>104){
            $msg=array("短信模板字数超过限制");
         }elseif(strlen($data['type_content'])==0){
            $msg=array("短信模板字数不能为空");
        }else{
            $data['bz'] = $_POST['dyb'].'|'.$_POST['xyb'].'|'.$_POST['jzb'].'|'.$_POST['tb'].'|'.$_POST['dbb'].'|'.$_POST['lzb'].'|'.$_POST['mb'];        
    		
    		if ($_A['query_type'] == "type_new"){
    			$result = smsClass::AddType($data);
    			if ($result !== true){
    				$msg = array($result);
    			}else{
    				$msg = array("添加成功");
    			}
    		}else{
    			$data['id'] = $_POST['id'];
               
    			$result = smsClass::UpdateType($data);
    			if ($result !== true){
    				$msg = array($MsgInfo[$result]);
    			}else{
    				$msg = array("修改成功",'',$_A['query_url']."/set");
    			}
    		}
         }
		//$user->add_log($_log,$result);//记录操作
	}elseif( $_A['query_type'] == "type_edit"){
		$data['id'] = $_REQUEST['id'];
		$_A['sms_type_result'] = smsClass::GetTypeOne($data);
        	if (is_array($_A['sms_type_result'])){
		            $bzarry=explode('|',$_A['sms_type_result']['bz']);
                   
                    foreach($bzarry as $key => $value){
                        $_A['sms_type_result'][$value]=$value;
                    }
                    }
	}
}

/**
 * 删除
**/
elseif ($_A['query_type'] == "type_del"){
	$result = LsmsClass::DeleteType($_REQUEST['id']);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}
/**
 * 类型排序
**/
elseif ($_A['query_type'] == "type_action"){
	if (isset($_POST['id'])){
		$data['id'] = $_POST['id'];
		$data['name'] = $_POST['name'];
		$data['nid'] = $_POST['nid'];
		$data['order'] = $_POST['order'];
		$result = smsClass::ActionType($data);
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
	}else{
		if (isset($_POST['name'])){
			$data['type'] = $_POST['type'];
			$data['name'] = $_POST['name'];
			$data['nid'] = $_POST['nid'];
			$data['order'] = $_POST['order'];
			$result = smsClass::ActionType($data);
			if ($result !== true){
				$msg = array($result);
			}else{
				$msg = array("操作成功");
			}
		}else{
			$msg = array("操作有误");
		}
	}
}

/*//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作","",$url);
}*/



?>