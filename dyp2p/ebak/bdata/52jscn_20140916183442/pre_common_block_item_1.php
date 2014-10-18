<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_block_item`;");
E_C("CREATE TABLE `pre_common_block_item` (
  `itemid` int(10) unsigned NOT NULL auto_increment,
  `bid` mediumint(8) unsigned NOT NULL default '0',
  `id` int(10) unsigned NOT NULL default '0',
  `idtype` varchar(255) NOT NULL default '',
  `itemtype` tinyint(1) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `pic` varchar(255) NOT NULL default '',
  `picflag` tinyint(1) NOT NULL default '0',
  `makethumb` tinyint(1) NOT NULL default '0',
  `thumbpath` varchar(255) NOT NULL default '',
  `summary` text NOT NULL,
  `showstyle` text NOT NULL,
  `related` text NOT NULL,
  `fields` text NOT NULL,
  `displayorder` smallint(6) NOT NULL default '0',
  `startdate` int(10) unsigned NOT NULL default '0',
  `enddate` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`itemid`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>