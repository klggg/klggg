<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_crime`;");
E_C("CREATE TABLE `pre_common_member_crime` (
  `cid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `operatorid` mediumint(8) unsigned NOT NULL default '0',
  `operator` varchar(15) NOT NULL,
  `action` tinyint(5) NOT NULL,
  `reason` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `uid` (`uid`,`action`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>