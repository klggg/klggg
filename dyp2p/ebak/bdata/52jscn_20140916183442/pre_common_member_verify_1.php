<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_verify`;");
E_C("CREATE TABLE `pre_common_member_verify` (
  `uid` mediumint(8) unsigned NOT NULL,
  `verify1` tinyint(1) NOT NULL default '0',
  `verify2` tinyint(1) NOT NULL default '0',
  `verify3` tinyint(1) NOT NULL default '0',
  `verify4` tinyint(1) NOT NULL default '0',
  `verify5` tinyint(1) NOT NULL default '0',
  `verify6` tinyint(1) NOT NULL default '0',
  `verify7` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  KEY `verify1` (`verify1`),
  KEY `verify2` (`verify2`),
  KEY `verify3` (`verify3`),
  KEY `verify4` (`verify4`),
  KEY `verify5` (`verify5`),
  KEY `verify6` (`verify6`),
  KEY `verify7` (`verify7`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>