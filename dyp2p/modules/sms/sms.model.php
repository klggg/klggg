<?php
/******************************
 * $File: sms.model.php
 * $Description: 提醒语言文件
 * $Author: ahui 
 * $Time:2010-06-06
 * $Update:Ahui
 * $UpdateDate:2012-06-10  
 * Copyright(c) 2010 - 2012 by deayou.com. All rights reserved
******************************/

if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问


$MsgInfo['sms_id'] = "ID";
$MsgInfo['sms_type'] = "短信类型";
$MsgInfo['sms_nid'] = "标示名";
$MsgInfo['sms_content'] = "短信模板";
$MsgInfo['sms_action'] = "操作";
$MsgInfo['sms_open'] = "开启";
$MsgInfo['sms_close'] = "关闭";
$MsgInfo['sms_update'] = "修改";
$MsgInfo['sms_submit'] = "确认";
$MsgInfo['sms_reset'] = "重置";
$MsgInfo['sms_pre'] = "后缀";
$MsgInfo['sms_status'] = "状态";
$MsgInfo['sms_advance'] = "提前发送时间";
$MsgInfo['sms_action_success'] = "操作成功";
$MsgInfo['sms_id_empty'] = "操作ID不能为空";
$MsgInfo['sms_error_pre_empty']='后缀不能为空';
$MsgInfo['sms_error_content_empty']='模板内容不能为空';
$MsgInfo['sms_error_id_empty'] = "操作有误，请不要乱操作。";
$MsgInfo['sms_error_nid_empty'] = "标识名不能为空。";
$MsgInfo['sms_error_name_empty'] = "短信类型不能为空。";
$MsgInfo['sms_option_fail'] = '操作失败';
$MsgInfo['sms_error_advance_time_empty'] ='提前时间不能为空';
$MsgInfo['sms_type_content_error']='短信模板字数超过限制';
$MsgInfo['sms_type_content_empty']='短信模板不可为空';
?>