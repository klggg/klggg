<?php
/******************************
 * $File: admin.module.php
 * $Description: 模块类处理
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

//adminClass::SaveModules(array("nid"=>"group","table"=>"group"));
//adminClass::SaveModules(array("nid"=>"group","table"=>"group_type"));

$sql = "DROP TABLE `{vote}`, `{yyd_approve}`, `{yyd_approve_edu}`, `{yyd_approve_edu_id5}`, `{yyd_approve_id5}`, `{yyd_approve_realname}`, `{yyd_approve_sms}`, `{yyd_approve_smslog}`, `{yyd_approve_video}`;";
$mysql->db_querys($sql);

?>