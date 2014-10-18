<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_threadmod`;");
E_C("CREATE TABLE `pre_forum_threadmod` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  `action` char(5) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `magicid` smallint(6) unsigned NOT NULL,
  `stamp` tinyint(3) NOT NULL,
  `reason` char(40) NOT NULL default '',
  KEY `tid` (`tid`,`dateline`),
  KEY `expiration` (`expiration`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>