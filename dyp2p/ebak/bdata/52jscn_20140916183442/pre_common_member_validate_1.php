<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_validate`;");
E_C("CREATE TABLE `pre_common_member_validate` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `submitdate` int(10) unsigned NOT NULL default '0',
  `moddate` int(10) unsigned NOT NULL default '0',
  `admin` varchar(15) NOT NULL default '',
  `submittimes` tinyint(3) unsigned NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `message` text NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY  (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>