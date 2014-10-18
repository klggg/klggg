<?php
/******************************
 * $File: vote.model.php
 * $Description: 投票文字提醒
 * $Author: hummer 
 * $Time:2011-12-08
 * $Update:None 
 * $UpdateDate:None 
******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$MsgInfo["vote_type_name_empty"] = "类型名称不能为空";
$MsgInfo["vote_type_nid_empty"] = "类型标识名不能为空";
$MsgInfo["vote_type_nid_exiest"] = "类型标识名已经存在";
$MsgInfo["vote_type_add_success"] = "添加类型成功";
$MsgInfo["vote_type_update_success"] = "修改类型成功";
$MsgInfo["vote_type_del_success"] = "删除类型成功";
$MsgInfo["vote_type_empty"] = "类型不存在";
$MsgInfo["vote_type_id_empty"] = "类型ID不存在";
$MsgInfo["vote_type_upfiles_exiest"] = "类型有图片存在，不能删除";

$MsgInfo["vote_title_empty"] = "投票标题不能为空";
$MsgInfo["vote_add_success"] = "添加投票成功";
$MsgInfo["vote_update_success"] = "修改投票成功";
$MsgInfo["vote_del_success"] = "删除投票成功";
$MsgInfo["vote_empty"] = "投票不存在";
$MsgInfo["vote_id_empty"] = "投票ID不存在";
$MsgInfo["vote_answer__exiest"] = "投票有答案存在，请先删除答案再进行删除";

$MsgInfo["vote_answer_title_empty"] = "答案标题不能为空";
$MsgInfo["vote_answer_add_success"] = "添加答案成功";
$MsgInfo["vote_answer_update_success"] = "修改答案成功";
$MsgInfo["vote_answer_del_success"] = "删除答案成功";
$MsgInfo["vote_answer_empty"] = "答案不存在";
$MsgInfo["vote_answer_id_empty"] = "答案ID不存在";
?>