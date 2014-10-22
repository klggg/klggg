<?php
/******************************
 * $File:code.php
 * $Description: 模块管理文件
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问



//当前模块的信息
$code = $_A['query_class'] ;
if ($code==""){
	$msg = array("操作有误");
}else{
	if (file_exists("modules/$code/$code.php")){
		$_A['module_other_status'] = adminClass::GetModuleStatus(array("nid"=>$code));
		require_once("modules/$code/$code.php");
		$_A['module_other_result'] = $_A['list_purview'][$code]["result"];
		
		$magic->assign("_A",$_A);
		$template_tpl= "{$code}.tpl";//如果是其他的，则直接读取模块所在的相应模板
		$magic->assign("template_dir","modules/{$code}/");
		$magic->assign("module_tpl",$template_tpl);
		$magic->assign("MsgInfo",$MsgInfo);
		$template = "admin_code.html";
	}else{
		$msg = array("{$code}模块不存在");
	}
}
			
?>