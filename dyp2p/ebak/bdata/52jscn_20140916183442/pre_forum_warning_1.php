<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_warning`;");
E_C("CREATE TABLE `pre_forum_warning` (
  `wid` smallint(6) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL,
  `operatorid` mediumint(8) unsigned NOT NULL,
  `operator` char(15) NOT NULL,
  `authorid` mediumint(8) unsigned NOT NULL,
  `author` char(15) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `reason` char(40) NOT NULL,
  PRIMARY KEY  (`wid`),
  UNIQUE KEY `pid` (`pid`),
  KEY `authorid` (`authorid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>