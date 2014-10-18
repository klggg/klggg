<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_activity`;");
E_C("CREATE TABLE `pre_forum_activity` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `aid` mediumint(8) unsigned NOT NULL default '0',
  `cost` mediumint(8) unsigned NOT NULL default '0',
  `starttimefrom` int(10) unsigned NOT NULL default '0',
  `starttimeto` int(10) unsigned NOT NULL default '0',
  `place` varchar(255) NOT NULL default '',
  `class` varchar(255) NOT NULL default '',
  `gender` tinyint(1) NOT NULL default '0',
  `number` smallint(5) unsigned NOT NULL default '0',
  `applynumber` smallint(5) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  `ufield` text NOT NULL,
  `credit` smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `uid` (`uid`,`starttimefrom`),
  KEY `starttimefrom` (`starttimefrom`),
  KEY `expiration` (`expiration`),
  KEY `applynumber` (`applynumber`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>