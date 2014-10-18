<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_admincp_member`;");
E_C("CREATE TABLE `pre_common_admincp_member` (
  `uid` int(10) unsigned NOT NULL,
  `cpgroupid` int(10) unsigned NOT NULL,
  `customperm` text NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_admincp_member` values('53','0','');");

require("../../inc/footer.php");
?>