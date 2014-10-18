<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_post`;");
E_C("CREATE TABLE `pre_forum_post` (
  `pid` int(10) unsigned NOT NULL,
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `first` tinyint(1) NOT NULL default '0',
  `author` varchar(15) NOT NULL default '',
  `authorid` mediumint(8) unsigned NOT NULL default '0',
  `subject` varchar(80) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `message` mediumtext NOT NULL,
  `useip` varchar(15) NOT NULL default '',
  `invisible` tinyint(1) NOT NULL default '0',
  `anonymous` tinyint(1) NOT NULL default '0',
  `usesig` tinyint(1) NOT NULL default '0',
  `htmlon` tinyint(1) NOT NULL default '0',
  `bbcodeoff` tinyint(1) NOT NULL default '0',
  `smileyoff` tinyint(1) NOT NULL default '0',
  `parseurloff` tinyint(1) NOT NULL default '0',
  `attachment` tinyint(1) NOT NULL default '0',
  `rate` smallint(6) NOT NULL default '0',
  `ratetimes` tinyint(3) unsigned NOT NULL default '0',
  `status` int(10) NOT NULL default '0',
  `tags` varchar(255) NOT NULL default '0',
  `comment` tinyint(1) NOT NULL default '0',
  `replycredit` int(10) NOT NULL default '0',
  `position` int(8) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`tid`,`position`),
  UNIQUE KEY `pid` (`pid`),
  KEY `fid` (`fid`),
  KEY `authorid` (`authorid`,`invisible`),
  KEY `dateline` (`dateline`),
  KEY `invisible` (`invisible`),
  KEY `displayorder` (`tid`,`invisible`,`dateline`),
  KEY `first` (`tid`,`first`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_post` values('21','37','19','1','tianjin','1020','新系统上线了！赶快来体验一下吧！','1380414826','新系统上线了！赶快来体验一下吧！\r\n','183.142.213.251','0','0','1','0','-1','-1','0','0','0','0','0','','0','0','1');");

require("../../inc/footer.php");
?>