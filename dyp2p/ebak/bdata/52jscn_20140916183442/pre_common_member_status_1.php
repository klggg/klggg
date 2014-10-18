<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_status`;");
E_C("CREATE TABLE `pre_common_member_status` (
  `uid` mediumint(8) unsigned NOT NULL,
  `regip` char(15) NOT NULL default '',
  `lastip` char(15) NOT NULL default '',
  `lastvisit` int(10) unsigned NOT NULL default '0',
  `lastactivity` int(10) unsigned NOT NULL default '0',
  `lastpost` int(10) unsigned NOT NULL default '0',
  `lastsendmail` int(10) unsigned NOT NULL default '0',
  `invisible` tinyint(1) NOT NULL default '0',
  `buyercredit` smallint(6) NOT NULL default '0',
  `sellercredit` smallint(6) NOT NULL default '0',
  `favtimes` mediumint(8) unsigned NOT NULL default '0',
  `sharetimes` mediumint(8) unsigned NOT NULL default '0',
  `profileprogress` tinyint(2) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  KEY `lastactivity` (`lastactivity`,`invisible`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_member_status` values('1','','111.174.89.114','1368863666','1368842289','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_status` values('53','111.174.89.114','127.0.0.1','1410891540','1410891540','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_status` values('1288','117.22.70.113','117.22.70.113','1383998254','1383998254','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_member_status` values('1020','183.142.213.251','183.142.213.251','1380414773','1380414773','1380414826','0','0','0','0','0','0','0');");

require("../../inc/footer.php");
?>