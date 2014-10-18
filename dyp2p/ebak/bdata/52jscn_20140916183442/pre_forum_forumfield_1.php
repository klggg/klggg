<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_forumfield`;");
E_C("CREATE TABLE `pre_forum_forumfield` (
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `password` varchar(12) NOT NULL default '',
  `icon` varchar(255) NOT NULL default '',
  `redirect` varchar(255) NOT NULL default '',
  `attachextensions` varchar(255) NOT NULL default '',
  `creditspolicy` mediumtext NOT NULL,
  `formulaperm` text NOT NULL,
  `moderators` text NOT NULL,
  `rules` text NOT NULL,
  `threadtypes` text NOT NULL,
  `threadsorts` text NOT NULL,
  `viewperm` text NOT NULL,
  `postperm` text NOT NULL,
  `replyperm` text NOT NULL,
  `getattachperm` text NOT NULL,
  `postattachperm` text NOT NULL,
  `postimageperm` text NOT NULL,
  `spviewperm` text NOT NULL,
  `seotitle` text NOT NULL,
  `keywords` text NOT NULL,
  `seodescription` text NOT NULL,
  `supe_pushsetting` text NOT NULL,
  `modrecommend` text NOT NULL,
  `threadplugin` text NOT NULL,
  `extra` text NOT NULL,
  `jointype` tinyint(1) NOT NULL default '0',
  `gviewperm` tinyint(1) unsigned NOT NULL default '0',
  `membernum` smallint(6) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `lastupdate` int(10) unsigned NOT NULL default '0',
  `activity` int(10) unsigned NOT NULL default '0',
  `founderuid` mediumint(8) unsigned NOT NULL default '0',
  `foundername` varchar(255) NOT NULL default '',
  `banner` varchar(255) NOT NULL default '',
  `groupnum` smallint(6) unsigned NOT NULL default '0',
  `commentitem` text NOT NULL,
  `relatedgroup` text NOT NULL,
  `picstyle` tinyint(1) NOT NULL default '0',
  `widthauto` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`fid`),
  KEY `membernum` (`membernum`),
  KEY `dateline` (`dateline`),
  KEY `lastupdate` (`lastupdate`),
  KEY `activity` (`activity`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_forumfield` values('1','','','','','','','','','','','','','','','','','','','','','','','','','a:1:{s:9:\"namecolor\";s:0:\"\";}','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('2','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('3','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('4','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('5','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('6','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('7','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('8','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('9','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('10','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('11','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('12','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('13','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('14','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('15','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('16','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('17','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('18','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('19','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('20','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('21','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('22','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('23','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('24','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('25','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('26','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('27','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('28','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('29','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('30','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('31','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('32','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('33','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('34','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('35','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('36','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('37','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('38','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('39','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('41','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('42','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('43','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('44','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");
E_D("replace into `pre_forum_forumfield` values('45','','','','','','','','','','','','','','','','','','','','','','','','','','0','0','0','0','0','0','0','','','0','','','0','0');");

require("../../inc/footer.php");
?>