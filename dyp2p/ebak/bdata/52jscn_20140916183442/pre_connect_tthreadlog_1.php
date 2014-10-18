<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_connect_tthreadlog`;");
E_C("CREATE TABLE `pre_connect_tthreadlog` (
  `twid` char(16) NOT NULL,
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `conopenid` char(32) NOT NULL,
  `pagetime` int(10) unsigned default '0',
  `lasttwid` char(16) default NULL,
  `nexttime` int(10) unsigned default '0',
  `updatetime` int(10) unsigned default '0',
  `dateline` int(10) unsigned default '0',
  PRIMARY KEY  (`twid`),
  KEY `nexttime` (`tid`,`nexttime`),
  KEY `updatetime` (`tid`,`updatetime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>