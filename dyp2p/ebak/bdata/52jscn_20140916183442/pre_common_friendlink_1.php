<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_friendlink`;");
E_C("CREATE TABLE `pre_common_friendlink` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `displayorder` tinyint(3) NOT NULL default '0',
  `name` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` mediumtext NOT NULL,
  `logo` varchar(255) NOT NULL default '',
  `type` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_friendlink` values('1','0','官方论坛','http://www.discuz.net','提供最新 Discuz! 产品新闻、软件下载与技术交流','static/image/common/logo_88_31.gif','2');");
E_D("replace into `pre_common_friendlink` values('2','4','我的领地','http://www.5d6d.com/','','','2');");
E_D("replace into `pre_common_friendlink` values('3','2','漫游平台','http://www.manyou.com/','','','2');");
E_D("replace into `pre_common_friendlink` values('4','3','Yeswan','http://www.yeswan.com','','','2');");
E_D("replace into `pre_common_friendlink` values('5','1','Comsenz','http://www.comsenz.com','','','2');");

require("../../inc/footer.php");
?>