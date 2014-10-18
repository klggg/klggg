<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_pokearchive`;");
E_C("CREATE TABLE `pre_home_pokearchive` (
  `pid` mediumint(8) NOT NULL auto_increment,
  `pokeuid` int(10) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `fromuid` mediumint(8) unsigned NOT NULL default '0',
  `note` varchar(255) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `iconid` smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`pid`),
  KEY `pokeuid` (`pokeuid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>