<?
/******************************
 * $File: comments.install.php
 * $Description: 评论
 * $Author: hummer 
 * $Time:2012-03-09
 * $Vesion:1.0
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
 ******************************/

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$sql = "
CREATE TABLE IF NOT EXISTS `yyd_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `status` mediumint(2) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `article_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `contents` longtext NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;
";

$mysql->db_querys($sql);
