<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_magic`;");
E_C("CREATE TABLE `pre_common_magic` (
  `magicid` smallint(6) unsigned NOT NULL auto_increment,
  `available` tinyint(1) NOT NULL default '0',
  `name` varchar(50) NOT NULL,
  `identifier` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `displayorder` tinyint(3) NOT NULL default '0',
  `credit` tinyint(1) NOT NULL default '0',
  `price` mediumint(8) unsigned NOT NULL default '0',
  `num` smallint(6) unsigned NOT NULL default '0',
  `salevolume` smallint(6) unsigned NOT NULL default '0',
  `supplytype` tinyint(1) NOT NULL default '0',
  `supplynum` smallint(6) unsigned NOT NULL default '0',
  `useperoid` tinyint(1) NOT NULL default '0',
  `usenum` smallint(6) unsigned NOT NULL default '0',
  `weight` tinyint(3) unsigned NOT NULL default '1',
  `magicperm` text NOT NULL,
  `useevent` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`magicid`),
  UNIQUE KEY `identifier` (`identifier`),
  KEY `displayorder` (`available`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>