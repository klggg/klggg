<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_count`;");
E_C("CREATE TABLE `pre_common_member_count` (
  `uid` mediumint(8) unsigned NOT NULL,
  `extcredits1` int(10) NOT NULL default '0',
  `extcredits2` int(10) NOT NULL default '0',
  `extcredits3` int(10) NOT NULL default '0',
  `extcredits4` int(10) NOT NULL default '0',
  `extcredits5` int(10) NOT NULL default '0',
  `extcredits6` int(10) NOT NULL default '0',
  `extcredits7` int(10) NOT NULL default '0',
  `extcredits8` int(10) NOT NULL default '0',
  `friends` smallint(6) unsigned NOT NULL default '0',
  `posts` mediumint(8) unsigned NOT NULL default '0',
  `threads` mediumint(8) unsigned NOT NULL default '0',
  `digestposts` smallint(6) unsigned NOT NULL default '0',
  `doings` smallint(6) unsigned NOT NULL default '0',
  `blogs` smallint(6) unsigned NOT NULL default '0',
  `albums` smallint(6) unsigned NOT NULL default '0',
  `sharings` smallint(6) unsigned NOT NULL default '0',
  `attachsize` int(10) unsigned NOT NULL default '0',
  `views` mediumint(8) unsigned NOT NULL default '0',
  `oltime` smallint(6) unsigned NOT NULL default '0',
  `todayattachs` smallint(6) unsigned NOT NULL default '0',
  `todayattachsize` int(10) unsigned NOT NULL default '0',
  `feeds` mediumint(8) unsigned NOT NULL default '0',
  `follower` mediumint(8) unsigned NOT NULL default '0',
  `following` mediumint(8) unsigned NOT NULL default '0',
  `newfollower` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  KEY `posts` (`posts`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_member_count` values('1','0','20','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','5','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_count` values('53','0','58','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','8','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_count` values('1302','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_count` values('1301','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_count` values('1288','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_count` values('1279','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_count` values('1020','0','4','0','0','0','0','0','0','0','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");

require("../../inc/footer.php");
?>