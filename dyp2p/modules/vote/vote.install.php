<?php
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

CREATE TABLE IF NOT EXISTS `{vote}` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(2) NOT NULL COMMENT '状态',
  `input` varchar(100) NOT NULL COMMENT '表单类型',
  `type_id` varchar(30) NOT NULL COMMENT '问题类型',
  `remark` varchar(200) NOT NULL,
  `order` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;


CREATE TABLE IF NOT EXISTS `{vote_answer}` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `status` int(2) NOT NULL COMMENT '状态',
  `answer_status` int(2) NOT NULL COMMENT '是否是答案',
  `order` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

CREATE TABLE IF NOT EXISTS `{vote_type}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `order` int(11) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

";

$mysql->db_querys($sql);
