<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_security_failedlog`;");
E_C("CREATE TABLE `pre_security_failedlog` (
  `id` int(11) NOT NULL auto_increment,
  `reporttype` char(20) NOT NULL,
  `tid` int(10) unsigned NOT NULL default '0',
  `pid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `failcount` int(10) unsigned NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL default '0',
  `posttime` int(10) unsigned NOT NULL default '0',
  `delreason` char(255) NOT NULL,
  `scheduletime` int(10) unsigned NOT NULL default '0',
  `lastfailtime` int(10) unsigned NOT NULL default '0',
  `extra1` int(10) unsigned NOT NULL,
  `extra2` char(255) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>