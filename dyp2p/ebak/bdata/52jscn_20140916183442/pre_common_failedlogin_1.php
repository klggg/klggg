<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_failedlogin`;");
E_C("CREATE TABLE `pre_common_failedlogin` (
  `ip` char(15) NOT NULL default '',
  `username` char(32) NOT NULL default '',
  `count` tinyint(1) unsigned NOT NULL default '0',
  `lastupdate` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ip`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_failedlogin` values('127.0.0.1','','0','1410891540');");

require("../../inc/footer.php");
?>