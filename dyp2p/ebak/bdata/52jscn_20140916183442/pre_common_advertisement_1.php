<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_advertisement`;");
E_C("CREATE TABLE `pre_common_advertisement` (
  `advid` mediumint(8) unsigned NOT NULL auto_increment,
  `available` tinyint(1) NOT NULL default '0',
  `type` varchar(50) NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `targets` text NOT NULL,
  `parameters` text NOT NULL,
  `code` text NOT NULL,
  `starttime` int(10) unsigned NOT NULL default '0',
  `endtime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`advid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>