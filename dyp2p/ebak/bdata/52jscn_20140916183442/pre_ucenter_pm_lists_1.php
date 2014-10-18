<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_pm_lists`;");
E_C("CREATE TABLE `pre_ucenter_pm_lists` (
  `plid` mediumint(8) unsigned NOT NULL auto_increment,
  `authorid` mediumint(8) unsigned NOT NULL default '0',
  `pmtype` tinyint(1) unsigned NOT NULL default '0',
  `subject` varchar(80) NOT NULL,
  `members` smallint(5) unsigned NOT NULL default '0',
  `min_max` varchar(17) NOT NULL,
  `dateline` int(10) unsigned NOT NULL default '0',
  `lastmessage` text NOT NULL,
  PRIMARY KEY  (`plid`),
  KEY `pmtype` (`pmtype`),
  KEY `min_max` (`min_max`),
  KEY `authorid` (`authorid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>