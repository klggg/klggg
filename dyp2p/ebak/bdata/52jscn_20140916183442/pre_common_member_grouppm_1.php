<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_grouppm`;");
E_C("CREATE TABLE `pre_common_member_grouppm` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `gpmid` smallint(6) unsigned NOT NULL auto_increment,
  `status` tinyint(1) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`gpmid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>