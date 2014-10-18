<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_attachment_2`;");
E_C("CREATE TABLE `pre_forum_attachment_2` (
  `aid` mediumint(8) unsigned NOT NULL,
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `pid` int(10) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `filename` varchar(255) NOT NULL default '',
  `filesize` int(10) unsigned NOT NULL default '0',
  `attachment` varchar(255) NOT NULL default '',
  `remote` tinyint(1) unsigned NOT NULL default '0',
  `description` varchar(255) NOT NULL,
  `readperm` tinyint(3) unsigned NOT NULL default '0',
  `price` smallint(6) unsigned NOT NULL default '0',
  `isimage` tinyint(1) NOT NULL default '0',
  `width` smallint(6) unsigned NOT NULL default '0',
  `thumb` tinyint(1) unsigned NOT NULL default '0',
  `picid` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`aid`),
  KEY `tid` (`tid`),
  KEY `pid` (`pid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>