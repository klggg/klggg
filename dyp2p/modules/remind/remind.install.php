<?
/******************************
 * $File: remind.install.php
 * $Description: 提醒模块安装文件
******************************/
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$sql = "
DROP TABLE IF EXISTS `{remind}`;
CREATE TABLE IF NOT EXISTS `{remind}` (
	`id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`nid` varchar(50) NOT NULL,
	`status` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
	`order` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
	`type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '类型',
	`message` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '短消息',
	`email` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '邮箱',
	`phone` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '手机',
	`addtime` int(10)  NOT NULL DEFAULT '0',
	`addip` char(20)  NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `nid`(`nid`),
  KEY `type_id`(`type_id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `{remind_user}` (
 	`id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` smallint(11) unsigned NOT NULL,
	`remind` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id`(`user_id`),
  KEY `remind_id`(`remind_id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `{remind_type}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` smallint(6) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `addtime` int(10)  NOT NULL DEFAULT '0',
  `addip` char(20)  NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `name`(`name`),
  KEY `nid`(`nid`)
) ENGINE=MyISAM ;
";
$mysql->db_querys($sql);
