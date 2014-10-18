<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_pic`;");
E_C("CREATE TABLE `pre_home_pic` (
  `picid` mediumint(8) NOT NULL auto_increment,
  `albumid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `postip` varchar(255) NOT NULL default '',
  `filename` varchar(255) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `type` varchar(255) NOT NULL default '',
  `size` int(10) unsigned NOT NULL default '0',
  `filepath` varchar(255) NOT NULL default '',
  `thumb` tinyint(1) NOT NULL default '0',
  `remote` tinyint(1) NOT NULL default '0',
  `hot` mediumint(8) unsigned NOT NULL default '0',
  `sharetimes` mediumint(8) unsigned NOT NULL default '0',
  `click1` smallint(6) unsigned NOT NULL default '0',
  `click2` smallint(6) unsigned NOT NULL default '0',
  `click3` smallint(6) unsigned NOT NULL default '0',
  `click4` smallint(6) unsigned NOT NULL default '0',
  `click5` smallint(6) unsigned NOT NULL default '0',
  `click6` smallint(6) unsigned NOT NULL default '0',
  `click7` smallint(6) unsigned NOT NULL default '0',
  `click8` smallint(6) unsigned NOT NULL default '0',
  `magicframe` tinyint(6) NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`picid`),
  KEY `uid` (`uid`),
  KEY `albumid` (`albumid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>