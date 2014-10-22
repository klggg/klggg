<?php
/******************************
 * $File: remind.install.php
 * $Description: 提醒模块安装文件
 * $Author: ahui 
 * $Time:2010-06-06
 * $Update:Ahui
 * $UpdateDate:2012-06-10  
 * Copyright(c) 2010 - 2012 by deayou.com. All rights reserved
******************************/
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

$sql = "
DROP TABLE IF EXISTS `{sms_type}` ,`{sms_log}`;
CREATE TABLE `{sms_type}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` text NOT NULL COMMENT '类型名',
  `nid` char(50) NULL COMMENT '类型标识码',
  `bz` varchar(100) DEFAULT NULL COMMENT '标种',
  `status` int(1) NOT NULL COMMENT '是否开启 0关闭 1开启',
  `type_content` longtext NOT NULL COMMENT '短信模板',
  `advance_time` int(50) NOT NULL COMMENT '提前发送时间 0-9 数字代表提前天数 0及时发送',
  `addip` char(50) NOT NULL COMMENT '添加ip',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updateip` char(50) NOT NULL COMMENT '修改时ip',
  `updatetime` int(11) NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`,`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;


";
$mysql->db_querys($sql);
