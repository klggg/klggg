<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_groupuser`;");
E_C("CREATE TABLE `pre_forum_groupuser` (
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(15) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL default '0',
  `threads` mediumint(8) unsigned NOT NULL default '0',
  `replies` mediumint(8) unsigned NOT NULL default '0',
  `joindateline` int(10) unsigned NOT NULL default '0',
  `lastupdate` int(10) unsigned NOT NULL default '0',
  `privacy` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`fid`,`uid`),
  KEY `uid_lastupdate` (`uid`,`lastupdate`),
  KEY `userlist` (`fid`,`level`,`lastupdate`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>