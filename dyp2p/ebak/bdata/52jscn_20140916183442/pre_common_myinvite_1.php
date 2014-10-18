<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_myinvite`;");
E_C("CREATE TABLE `pre_common_myinvite` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `typename` varchar(100) NOT NULL default '',
  `appid` mediumint(8) NOT NULL default '0',
  `type` tinyint(1) NOT NULL default '0',
  `fromuid` mediumint(8) unsigned NOT NULL default '0',
  `touid` mediumint(8) unsigned NOT NULL default '0',
  `myml` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL default '0',
  `hash` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `hash` (`hash`),
  KEY `uid` (`touid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>