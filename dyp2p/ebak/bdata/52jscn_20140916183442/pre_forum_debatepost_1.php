<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_debatepost`;");
E_C("CREATE TABLE `pre_forum_debatepost` (
  `pid` int(10) unsigned NOT NULL default '0',
  `stand` tinyint(1) NOT NULL default '0',
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `voters` mediumint(10) unsigned NOT NULL default '0',
  `voterids` text NOT NULL,
  PRIMARY KEY  (`pid`),
  KEY `pid` (`pid`,`stand`),
  KEY `tid` (`tid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>