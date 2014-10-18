<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_field_forum`;");
E_C("CREATE TABLE `pre_common_member_field_forum` (
  `uid` mediumint(8) unsigned NOT NULL,
  `publishfeed` tinyint(3) NOT NULL default '0',
  `customshow` tinyint(1) unsigned NOT NULL default '26',
  `customstatus` varchar(30) NOT NULL default '',
  `medals` text NOT NULL,
  `sightml` text NOT NULL,
  `groupterms` text NOT NULL,
  `authstr` varchar(20) NOT NULL default '',
  `groups` mediumtext NOT NULL,
  `attentiongroup` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_member_field_forum` values('1','0','26','','','','','','','');");
E_D("replace into `pre_common_member_field_forum` values('53','0','26','','','','','','','');");
E_D("replace into `pre_common_member_field_forum` values('1302','0','26','','','','','','','');");
E_D("replace into `pre_common_member_field_forum` values('1301','0','26','','','','','','','');");
E_D("replace into `pre_common_member_field_forum` values('1288','0','26','','','','','','','');");
E_D("replace into `pre_common_member_field_forum` values('1279','0','26','','','','','','','');");
E_D("replace into `pre_common_member_field_forum` values('1020','0','26','','','','','','','');");

require("../../inc/footer.php");
?>