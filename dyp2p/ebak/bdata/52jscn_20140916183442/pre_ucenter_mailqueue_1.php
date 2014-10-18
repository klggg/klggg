<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_mailqueue`;");
E_C("CREATE TABLE `pre_ucenter_mailqueue` (
  `mailid` int(10) unsigned NOT NULL auto_increment,
  `touid` mediumint(8) unsigned NOT NULL default '0',
  `tomail` varchar(32) NOT NULL,
  `frommail` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `charset` varchar(15) NOT NULL,
  `htmlon` tinyint(1) NOT NULL default '0',
  `level` tinyint(1) NOT NULL default '1',
  `dateline` int(10) unsigned NOT NULL default '0',
  `failures` tinyint(3) unsigned NOT NULL default '0',
  `appid` smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`mailid`),
  KEY `appid` (`appid`),
  KEY `level` (`level`,`failures`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>