<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_threadclass`;");
E_C("CREATE TABLE `pre_forum_threadclass` (
  `typeid` mediumint(8) unsigned NOT NULL auto_increment,
  `fid` mediumint(8) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `displayorder` mediumint(9) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `moderators` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`typeid`),
  KEY `fid` (`fid`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>