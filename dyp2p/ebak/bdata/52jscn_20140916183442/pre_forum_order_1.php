<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_order`;");
E_C("CREATE TABLE `pre_forum_order` (
  `orderid` char(32) NOT NULL default '',
  `status` char(3) NOT NULL default '',
  `buyer` char(50) NOT NULL default '',
  `admin` char(15) NOT NULL default '',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `amount` int(10) unsigned NOT NULL default '0',
  `price` float(7,2) unsigned NOT NULL default '0.00',
  `submitdate` int(10) unsigned NOT NULL default '0',
  `confirmdate` int(10) unsigned NOT NULL default '0',
  `email` char(40) NOT NULL default '',
  `ip` char(15) NOT NULL default '',
  UNIQUE KEY `orderid` (`orderid`),
  KEY `submitdate` (`submitdate`),
  KEY `uid` (`uid`,`submitdate`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>