<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_scrollpic`;");
E_C("CREATE TABLE `yyd_scrollpic` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `site_id` smallint(5) unsigned NOT NULL default '0',
  `status` smallint(2) unsigned NOT NULL default '0',
  `order` smallint(6) NOT NULL default '0',
  `flag` smallint(6) default NULL,
  `type_id` smallint(5) unsigned NOT NULL default '0',
  `url` char(60) NOT NULL default '',
  `name` char(100) NOT NULL default '',
  `pic` char(200) NOT NULL default '',
  `summary` char(250) NOT NULL default '',
  `hits` int(10) NOT NULL default '0',
  `addtime` int(10) NOT NULL default '0',
  `addip` char(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_scrollpic` values('11','0','1','10',NULL,'1','http://bbs.52jscn.com','野野','data/upfiles/images/2014-02/28/1_scrollpic_new_13936003325.jpg','','0','1393600332','115.197.209.39');");
E_D("replace into `yyd_scrollpic` values('7','0','1','10',NULL,'1','http://bbs.52jscn.com','','data/upfiles/images/2014-02/28/1_scrollpic_new_13936004095.jpg','','0','1393500717','114.221.188.247');");
E_D("replace into `yyd_scrollpic` values('9','0','1','10',NULL,'1','http://bbs.52jscn.com','野','data/upfiles/images/2014-02/28/1_scrollpic_new_13936008406.jpg','','0','1393518219','110.114.125.242');");
E_D("replace into `yyd_scrollpic` values('10','0','1','10',NULL,'1','http://bbs.52jscn.com','野野','data/upfiles/images/2014-02/28/1_scrollpic_new_13936005154.jpg','','0','1393518226','110.114.125.242');");

require("../../inc/footer.php");
?>