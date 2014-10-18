<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_process`;");
E_C("CREATE TABLE `pre_common_process` (
  `processid` char(32) NOT NULL,
  `expiry` int(10) default NULL,
  `extra` int(10) default NULL,
  PRIMARY KEY  (`processid`),
  KEY `expiry` (`expiry`)
) ENGINE=MEMORY DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>