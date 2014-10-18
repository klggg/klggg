<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_announcement`;");
E_C("CREATE TABLE `pre_forum_announcement` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `author` varchar(15) NOT NULL default '',
  `subject` varchar(255) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `starttime` int(10) unsigned NOT NULL default '0',
  `endtime` int(10) unsigned NOT NULL default '0',
  `message` text NOT NULL,
  `groups` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `timespan` (`starttime`,`endtime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>