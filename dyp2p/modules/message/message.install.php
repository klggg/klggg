<?
/******************************
 * $File: group.install.php
 * $Description: 群组
 * $Author: hummer 
 * $Time:2012-03-09
 * $Vesion:1.0
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
 ******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$sql = "

CREATE TABLE IF NOT EXISTS `yyd_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '发送用户',
  `type` varchar(100) NOT NULL COMMENT '发送类型',
  `status` int(11) NOT NULL COMMENT '状态',
  `receive_value` longtext NOT NULL COMMENT '接收id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `contents` text NOT NULL COMMENT '内容',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

CREATE TABLE IF NOT EXISTS `yyd_message_receive` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '接收人',
  `status` int(11) NOT NULL COMMENT '状态',
  `send_id` int(11) NOT NULL,
  `send_userid` int(11) NOT NULL DEFAULT '0' COMMENT '发送用户',
  `type` varchar(50) NOT NULL COMMENT '类型',
  `receive_id` longtext NOT NULL COMMENT '接收人用户id',
  `receive_yes` longtext NOT NULL COMMENT '已接收id',
  `receive_value` longtext NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `contents` text NOT NULL COMMENT '内容',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;
";

$mysql->db_querys($sql);
