<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_myapp`;");
E_C("CREATE TABLE `pre_common_myapp` (
  `appid` mediumint(8) unsigned NOT NULL default '0',
  `appname` varchar(60) NOT NULL default '',
  `narrow` tinyint(1) NOT NULL default '0',
  `flag` tinyint(1) NOT NULL default '0',
  `version` mediumint(8) unsigned NOT NULL default '0',
  `userpanelarea` tinyint(1) NOT NULL default '0',
  `canvastitle` varchar(60) NOT NULL default '',
  `fullscreen` tinyint(1) NOT NULL default '0',
  `displayuserpanel` tinyint(1) NOT NULL default '0',
  `displaymethod` tinyint(1) NOT NULL default '0',
  `displayorder` smallint(6) unsigned NOT NULL default '0',
  `appstatus` tinyint(2) NOT NULL default '0',
  `iconstatus` tinyint(2) NOT NULL default '0',
  `icondowntime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`appid`),
  KEY `flag` (`flag`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>