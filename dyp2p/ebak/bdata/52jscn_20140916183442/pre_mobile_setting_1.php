<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_mobile_setting`;");
E_C("CREATE TABLE `pre_mobile_setting` (
  `skey` varchar(255) NOT NULL default '',
  `svalue` text NOT NULL,
  PRIMARY KEY  (`skey`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_mobile_setting` values('extend_used','1');");
E_D("replace into `pre_mobile_setting` values('extend_lastupdate','1343182299');");

require("../../inc/footer.php");
?>