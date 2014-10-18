<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_threadlog`;");
E_C("CREATE TABLE `pre_forum_threadlog` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `fid` smallint(6) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `otherid` smallint(6) unsigned NOT NULL default '0',
  `action` char(10) NOT NULL,
  `expiry` int(10) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tid`,`fid`,`uid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>