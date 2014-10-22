<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_adv`;");
E_C("CREATE TABLE `fanwe_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tmpl` varchar(255) NOT NULL,
  `adv_id` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_ids` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_table` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tmpl` (`tmpl`),
  KEY `adv_id` (`adv_id`),
  KEY `city_ids` (`city_ids`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_table` (`rel_table`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_adv` values('1','red','首页广告位1','<a href=\"http://www.souho.net\" target=\"_blank\" title=\"更多极品商业源码,就在搜虎精品社区VIP服务：vip.souho.cc\"><img src=\"./public/attachment/201212/25/10/50d90ba803a9d.jpg\" border=\"0\" /></a>','1','首页广告1','','0','');");
E_D("replace into `fanwe_adv` values('2','red','如何借款顶部广告','<a title=\"\" target=\"_blank\"><img src=\"./public/attachment/201301/26/09/510334e9c8cce.jpg\" bordr=\"0\" /></a>','1','如何借款顶部广告','','0','');");
E_D("replace into `fanwe_adv` values('3','red','安全保障左侧','<p><a title=\"\" href=\"./\" target=\"_blank\"><img border=\"0\" src=\"./public/attachment/201302/05/16/5110c3c857167.jpg\" /></a></p>','1','安全保障左侧','','0','');");

require("../../inc/footer.php");
?>