<?php
/******************************
 * $File: liuyan.install.php
 * $Description: 留言按照文件
 * $Author: hummer 
 * $Time:2010-03-09
 * $Vesion:1.0
 * $Update:None 
 * $UpdateDate:None 
 * Copyright(c) 2013 by jichu.com. All rights reserved
 ******************************/
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

$sql = "
CREATE TABLE IF NOT EXISTS `{links}` (
 `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
 `site_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `status` smallint(2) unsigned NOT NULL DEFAULT '0',
  `order` smallint(6) NOT NULL DEFAULT '0',
 `flag` smallint(6) NULL ,
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `url` char(60) NOT NULL DEFAULT '',
  `webname` char(30) NOT NULL DEFAULT '',
  `summary` char(200) NOT NULL DEFAULT '',
`linkman` char(50) NOT NULL DEFAULT '',
  `email` char(50) NOT NULL DEFAULT '',
  `logo` char(100) NOT NULL DEFAULT '',
`logoimg` char(100) NOT NULL DEFAULT '',
`province` char(10) NOT NULL DEFAULT '',
  `city` char(10) NOT NULL DEFAULT '',
`area` char(10) NOT NULL DEFAULT '',
`hits` int(10)  NOT NULL DEFAULT '0',
  `addtime` int(10)  NOT NULL DEFAULT '0',
`addip` char(20)  NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `{links_type}` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

INSERT INTO `{links_type}` (`id`, `typename`) VALUES
(1, '友情链接'),
(2, '合作伙伴');
INSERT INTO `{links}` (`id` ,`type_id` ,`status` ,`order` ,`url` ,`webname` ,`summary` ,`linkman` ,`email` ,`logo` ,`addtime` ,`addip` )
VALUES (
'1', '1', '1', '10', 'http://www.jichu.com', '易信云投', '易信云投', '蜂鸟', 'kf@jichu.com', '', '0', ''
);
";
$mysql->db_querys($sql);
