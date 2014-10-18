<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_typeoption`;");
E_C("CREATE TABLE `pre_forum_typeoption` (
  `optionid` smallint(6) unsigned NOT NULL auto_increment,
  `classid` smallint(6) unsigned NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `expiration` tinyint(1) NOT NULL,
  `protect` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `identifier` varchar(255) NOT NULL default '',
  `type` varchar(255) NOT NULL default '',
  `unit` varchar(255) NOT NULL,
  `rules` mediumtext NOT NULL,
  `permprompt` mediumtext NOT NULL,
  PRIMARY KEY  (`optionid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_typeoption` values('1','0','0','0','','分类A','','','','','','');");
E_D("replace into `pre_forum_typeoption` values('2','0','0','0','','分类B','','','','','','');");
E_D("replace into `pre_forum_typeoption` values('3','0','0','0','','分类C','','','','','','');");
E_D("replace into `pre_forum_typeoption` values('4','0','0','0','','分类D','','','','','','');");
E_D("replace into `pre_forum_typeoption` values('5','0','0','0','','分类E','','','','','','');");
E_D("replace into `pre_forum_typeoption` values('6','0','0','0','','分类F','','','','','','');");

require("../../inc/footer.php");
?>