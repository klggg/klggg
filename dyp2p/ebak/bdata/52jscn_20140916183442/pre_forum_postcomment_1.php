<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_postcomment`;");
E_C("CREATE TABLE `pre_forum_postcomment` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `pid` int(10) unsigned NOT NULL default '0',
  `author` varchar(15) NOT NULL default '',
  `authorid` mediumint(8) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `comment` varchar(255) NOT NULL default '',
  `score` tinyint(1) NOT NULL default '0',
  `useip` varchar(15) NOT NULL default '',
  `rpid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `tid` (`tid`),
  KEY `authorid` (`authorid`),
  KEY `score` (`score`),
  KEY `rpid` (`rpid`),
  KEY `pid` (`pid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>