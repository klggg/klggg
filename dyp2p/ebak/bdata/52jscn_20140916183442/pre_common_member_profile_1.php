<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_profile`;");
E_C("CREATE TABLE `pre_common_member_profile` (
  `uid` mediumint(8) unsigned NOT NULL,
  `realname` varchar(255) NOT NULL default '',
  `gender` tinyint(1) NOT NULL default '0',
  `birthyear` smallint(6) unsigned NOT NULL default '0',
  `birthmonth` tinyint(3) unsigned NOT NULL default '0',
  `birthday` tinyint(3) unsigned NOT NULL default '0',
  `constellation` varchar(255) NOT NULL default '',
  `zodiac` varchar(255) NOT NULL default '',
  `telephone` varchar(255) NOT NULL default '',
  `mobile` varchar(255) NOT NULL default '',
  `idcardtype` varchar(255) NOT NULL default '',
  `idcard` varchar(255) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `zipcode` varchar(255) NOT NULL default '',
  `nationality` varchar(255) NOT NULL default '',
  `birthprovince` varchar(255) NOT NULL default '',
  `birthcity` varchar(255) NOT NULL default '',
  `birthdist` varchar(20) NOT NULL default '',
  `birthcommunity` varchar(255) NOT NULL default '',
  `resideprovince` varchar(255) NOT NULL default '',
  `residecity` varchar(255) NOT NULL default '',
  `residedist` varchar(20) NOT NULL default '',
  `residecommunity` varchar(255) NOT NULL default '',
  `residesuite` varchar(255) NOT NULL default '',
  `graduateschool` varchar(255) NOT NULL default '',
  `company` varchar(255) NOT NULL default '',
  `education` varchar(255) NOT NULL default '',
  `occupation` varchar(255) NOT NULL default '',
  `position` varchar(255) NOT NULL default '',
  `revenue` varchar(255) NOT NULL default '',
  `affectivestatus` varchar(255) NOT NULL default '',
  `lookingfor` varchar(255) NOT NULL default '',
  `bloodtype` varchar(255) NOT NULL default '',
  `height` varchar(255) NOT NULL default '',
  `weight` varchar(255) NOT NULL default '',
  `alipay` varchar(255) NOT NULL default '',
  `icq` varchar(255) NOT NULL default '',
  `qq` varchar(255) NOT NULL default '',
  `yahoo` varchar(255) NOT NULL default '',
  `msn` varchar(255) NOT NULL default '',
  `taobao` varchar(255) NOT NULL default '',
  `site` varchar(255) NOT NULL default '',
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  `field1` text NOT NULL,
  `field2` text NOT NULL,
  `field3` text NOT NULL,
  `field4` text NOT NULL,
  `field5` text NOT NULL,
  `field6` text NOT NULL,
  `field7` text NOT NULL,
  `field8` text NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_member_profile` values('1','','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');");
E_D("replace into `pre_common_member_profile` values('53','','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');");
E_D("replace into `pre_common_member_profile` values('1288','','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');");
E_D("replace into `pre_common_member_profile` values('1020','','0','0','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');");

require("../../inc/footer.php");
?>