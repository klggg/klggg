<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_groupfield`;");
E_C("CREATE TABLE `pre_forum_groupfield` (
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `privacy` tinyint(1) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `type` varchar(255) NOT NULL,
  `data` text NOT NULL,
  UNIQUE KEY `types` (`fid`,`type`),
  KEY `fid` (`fid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>