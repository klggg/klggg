<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_devicetoken`;");
E_C("CREATE TABLE `pre_common_devicetoken` (
  `uid` mediumint(8) unsigned NOT NULL,
  `token` char(50) NOT NULL,
  PRIMARY KEY  (`uid`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>