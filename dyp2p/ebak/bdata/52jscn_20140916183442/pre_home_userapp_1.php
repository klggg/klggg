<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_userapp`;");
E_C("CREATE TABLE `pre_home_userapp` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `appid` mediumint(8) unsigned NOT NULL default '0',
  `appname` varchar(60) NOT NULL default '',
  `privacy` tinyint(1) NOT NULL default '0',
  `allowsidenav` tinyint(1) NOT NULL default '0',
  `allowfeed` tinyint(1) NOT NULL default '0',
  `allowprofilelink` tinyint(1) NOT NULL default '0',
  `narrow` tinyint(1) NOT NULL default '0',
  `menuorder` smallint(6) NOT NULL default '0',
  `displayorder` smallint(6) NOT NULL default '0',
  KEY `uid` (`uid`,`appid`),
  KEY `menuorder` (`uid`,`menuorder`),
  KEY `displayorder` (`uid`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>