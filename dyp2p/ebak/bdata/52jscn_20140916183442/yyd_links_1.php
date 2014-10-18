<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_links`;");
E_C("CREATE TABLE `yyd_links` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `site_id` smallint(5) unsigned NOT NULL default '0',
  `status` smallint(2) unsigned NOT NULL default '0',
  `order` smallint(6) NOT NULL default '0',
  `flag` smallint(6) default NULL,
  `type_id` smallint(5) unsigned NOT NULL default '0',
  `url` char(60) NOT NULL default '',
  `webname` char(30) NOT NULL default '',
  `summary` char(200) NOT NULL default '',
  `linkman` char(50) NOT NULL default '',
  `email` char(50) NOT NULL default '',
  `logo` char(100) NOT NULL default '',
  `logoimg` char(100) NOT NULL default '',
  `province` char(10) NOT NULL default '',
  `city` char(10) NOT NULL default '',
  `area` char(10) NOT NULL default '',
  `hits` int(10) NOT NULL default '0',
  `addtime` int(10) NOT NULL default '0',
  `addip` char(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_links` values('3','0','1','10',NULL,'1','http://123.668zg.com','中国农业银行','','','','','3621','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('2','0','1','10',NULL,'1','http://123.668zg.com/','中国银行','','','','','3622','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('4','0','1','10',NULL,'1','http://123.668zg.com/','财付通','','','','','3623','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('5','0','1','10',NULL,'1','http://123.668zg.com/','支付宝','','','','','3626','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('6','0','1','10',NULL,'1','http://123.668zg.com/','平安银行','','','','','3627','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('7','0','1','10',NULL,'1','http://123.668zg.com/','建设银行','','','','','3628','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('8','0','1','10',NULL,'2','http://123.668zg.com/','工商银行','','','','','3629','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('9','0','1','10',NULL,'2','http://bbs.52jscn.com','下载本站源码','','','','','3630','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('10','0','1','10',NULL,'3','https://ipcrs.pbccrc.org.cn/','人民银行征信中心','','','','','','','','','0','1376101802','123.145.29.175');");
E_D("replace into `yyd_links` values('13','0','1','10',NULL,'3','http://bbs.52jscn.com','源码论坛','','','','','','','','','0','1376101802','123.145.29.175');");

require("../../inc/footer.php");
?>