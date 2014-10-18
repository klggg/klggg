<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_stat_field`;");
E_C("CREATE TABLE `pre_common_member_stat_field` (
  `optionid` mediumint(8) unsigned NOT NULL auto_increment,
  `fieldid` varchar(255) NOT NULL default '',
  `fieldvalue` varchar(255) NOT NULL default '',
  `hash` varchar(255) NOT NULL default '',
  `users` mediumint(8) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`optionid`),
  KEY `fieldid` (`fieldid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>