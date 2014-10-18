<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_mailcron`;");
E_C("CREATE TABLE `pre_common_mailcron` (
  `cid` mediumint(8) unsigned NOT NULL auto_increment,
  `touid` mediumint(8) unsigned NOT NULL default '0',
  `email` varchar(100) NOT NULL default '',
  `sendtime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `sendtime` (`sendtime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>