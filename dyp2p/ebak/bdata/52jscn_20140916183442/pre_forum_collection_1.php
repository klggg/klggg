<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_collection`;");
E_C("CREATE TABLE `pre_forum_collection` (
  `ctid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(15) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `follownum` mediumint(8) unsigned NOT NULL default '0',
  `threadnum` mediumint(8) unsigned NOT NULL default '0',
  `commentnum` mediumint(8) unsigned NOT NULL default '0',
  `desc` varchar(255) NOT NULL default '',
  `lastupdate` int(10) unsigned NOT NULL default '0',
  `rate` float NOT NULL default '0',
  `ratenum` mediumint(8) unsigned NOT NULL default '0',
  `lastpost` mediumint(8) unsigned NOT NULL default '0',
  `lastsubject` varchar(80) NOT NULL default '',
  `lastposttime` int(10) unsigned NOT NULL default '0',
  `lastposter` varchar(15) NOT NULL default '',
  `lastvisit` int(10) unsigned NOT NULL default '0',
  `keyword` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ctid`),
  KEY `dateline` (`dateline`),
  KEY `hotcollection` (`threadnum`,`lastupdate`),
  KEY `follownum` (`follownum`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>