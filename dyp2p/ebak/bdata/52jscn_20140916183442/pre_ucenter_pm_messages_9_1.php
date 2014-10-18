<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_pm_messages_9`;");
E_C("CREATE TABLE `pre_ucenter_pm_messages_9` (
  `pmid` mediumint(8) unsigned NOT NULL default '0',
  `plid` mediumint(8) unsigned NOT NULL default '0',
  `authorid` mediumint(8) unsigned NOT NULL default '0',
  `message` text NOT NULL,
  `delstatus` tinyint(1) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`pmid`),
  KEY `plid` (`plid`,`delstatus`,`dateline`),
  KEY `dateline` (`plid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>