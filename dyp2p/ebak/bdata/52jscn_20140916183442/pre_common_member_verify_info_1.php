<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_verify_info`;");
E_C("CREATE TABLE `pre_common_member_verify_info` (
  `vid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `verifytype` tinyint(1) NOT NULL default '0',
  `flag` tinyint(1) NOT NULL default '0',
  `field` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`vid`),
  KEY `verifytype` (`verifytype`,`flag`),
  KEY `uid` (`uid`,`verifytype`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>