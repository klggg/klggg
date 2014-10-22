<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_cate`;");
E_C("CREATE TABLE `fanwe_deal_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `pid` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT '' COMMENT '分类icon',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_cate` values('1','信用认证标','','0','0','1','10','','');");
E_D("replace into `fanwe_deal_cate` values('2','实地认证标','','0','0','1','9','','./public/images/dealcate/sdrzb.png');");
E_D("replace into `fanwe_deal_cate` values('3','机构担保标','','0','0','1','3','','./public/images/dealcate/jgdbb.png');");
E_D("replace into `fanwe_deal_cate` values('4','智能理财标','','0','0','1','4','','./public/images/dealcate/zhibt.png');");

require("../../inc/footer.php");
?>