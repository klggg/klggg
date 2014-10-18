<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_comment`;");
E_C("CREATE TABLE `pre_portal_comment` (
  `cid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `id` mediumint(8) unsigned NOT NULL default '0',
  `idtype` varchar(20) NOT NULL default '',
  `postip` varchar(255) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `message` text NOT NULL,
  PRIMARY KEY  (`cid`),
  KEY `idtype` (`id`,`idtype`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>