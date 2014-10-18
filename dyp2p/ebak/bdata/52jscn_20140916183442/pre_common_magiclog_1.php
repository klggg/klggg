<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_magiclog`;");
E_C("CREATE TABLE `pre_common_magiclog` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `magicid` smallint(6) unsigned NOT NULL default '0',
  `action` tinyint(1) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `amount` smallint(6) unsigned NOT NULL default '0',
  `credit` tinyint(1) unsigned NOT NULL default '0',
  `price` mediumint(8) unsigned NOT NULL default '0',
  `targetid` int(10) unsigned NOT NULL default '0',
  `idtype` char(6) default NULL,
  `targetuid` mediumint(8) unsigned NOT NULL default '0',
  KEY `uid` (`uid`,`dateline`),
  KEY `action` (`action`),
  KEY `targetuid` (`targetuid`,`dateline`),
  KEY `magicid` (`magicid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>