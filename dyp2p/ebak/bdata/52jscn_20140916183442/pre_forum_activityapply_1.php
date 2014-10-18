<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_activityapply`;");
E_C("CREATE TABLE `pre_forum_activityapply` (
  `applyid` int(10) unsigned NOT NULL auto_increment,
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `message` varchar(255) NOT NULL default '',
  `verified` tinyint(1) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `payment` mediumint(8) NOT NULL default '0',
  `ufielddata` text NOT NULL,
  PRIMARY KEY  (`applyid`),
  KEY `uid` (`uid`),
  KEY `tid` (`tid`),
  KEY `dateline` (`tid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>