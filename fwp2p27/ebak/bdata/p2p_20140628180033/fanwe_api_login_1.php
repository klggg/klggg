<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_api_login`;");
E_C("CREATE TABLE `fanwe_api_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `bicon` varchar(255) NOT NULL,
  `is_weibo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_api_login` values('9','新浪api登录接口','a:2:{s:7:\"app_key\";s:9:\"929562715\";s:10:\"app_secret\";s:32:\"0f59b4e39c900c6f7d827c201db12349\";}','Sina','./public/attachment/201302/04/14/510f59403870b.gif','./public/attachment/201203/17/15/4f64396822524.png','1');");
E_D("replace into `fanwe_api_login` values('10','腾讯微博登录插件','a:2:{s:7:\"app_key\";s:0:\"\";s:10:\"app_secret\";s:0:\"\";}','Tencent','./public/attachment/201302/04/14/510f590f950a7.gif','./public/attachment/201203/17/15/4f643977758ee.png','1');");

require("../../inc/footer.php");
?>