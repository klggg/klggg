<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_friends`;");
E_C("CREATE TABLE `pre_ucenter_friends` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `friendid` mediumint(8) unsigned NOT NULL default '0',
  `direction` tinyint(1) NOT NULL default '0',
  `version` int(10) unsigned NOT NULL auto_increment,
  `delstatus` tinyint(1) NOT NULL default '0',
  `comment` char(255) NOT NULL default '',
  PRIMARY KEY  (`version`),
  KEY `uid` (`uid`),
  KEY `friendid` (`friendid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>