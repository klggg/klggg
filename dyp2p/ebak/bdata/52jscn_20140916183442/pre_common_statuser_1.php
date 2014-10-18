<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_statuser`;");
E_C("CREATE TABLE `pre_common_statuser` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `daytime` int(10) unsigned NOT NULL default '0',
  `type` char(20) NOT NULL default '',
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_statuser` values('53','20151107','login');");

require("../../inc/footer.php");
?>