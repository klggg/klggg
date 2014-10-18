<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_grouplevel`;");
E_C("CREATE TABLE `pre_forum_grouplevel` (
  `levelid` smallint(6) unsigned NOT NULL auto_increment,
  `type` enum('special','default') NOT NULL default 'default',
  `leveltitle` varchar(255) NOT NULL default '',
  `creditshigher` int(10) NOT NULL default '0',
  `creditslower` int(10) NOT NULL default '0',
  `icon` varchar(255) NOT NULL default '',
  `creditspolicy` text NOT NULL,
  `postpolicy` text NOT NULL,
  `specialswitch` text NOT NULL,
  PRIMARY KEY  (`levelid`),
  KEY `creditsrange` (`creditshigher`,`creditslower`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_grouplevel` values('1','default','普通级','-999999999','500','','a:1:{s:4:\"post\";s:1:\"1\";s:5:\"reply\";s:1:\"1\";}','a:11:{s:13:\"alloweditpost\";s:1:\"1\";s:10:\"recyclebin\";s:1:\"1\";s:12:\"allowsmilies\";s:1:\"1\";s:9:\"allowhtml\";i:0;s:11:\"allowbbcode\";s:1:\"1\";s:14:\"allowanonymous\";i:0;s:6:\"jammer\";i:0;s:12:\"allowimgcode\";s:1:\"1\";s:14:\"allowmediacode\";s:1:\"1\";s:16:\"allowpostspecial\";i:31;s:16:\"attachextensions\";s:7:\"jpg,gif\";}','a:5:{s:15:\"allowchangename\";s:1:\"1\";s:15:\"allowchangetype\";s:1:\"1\";s:15:\"allowclosegroup\";s:1:\"1\";s:15:\"allowthreadtype\";s:1:\"1\";s:13:\"membermaximum\";s:0:\"\";}');");
E_D("replace into `pre_forum_grouplevel` values('2','default','中级','500','3000','','a:2:{s:4:\"post\";s:1:\"1\";s:5:\"reply\";s:1:\"1\";}','a:11:{s:13:\"alloweditpost\";s:1:\"1\";s:10:\"recyclebin\";s:1:\"1\";s:12:\"allowsmilies\";s:1:\"1\";s:9:\"allowhtml\";i:0;s:11:\"allowbbcode\";s:1:\"1\";s:14:\"allowanonymous\";i:0;s:6:\"jammer\";i:0;s:12:\"allowimgcode\";s:1:\"1\";s:14:\"allowmediacode\";s:1:\"1\";s:16:\"allowpostspecial\";i:31;s:16:\"attachextensions\";s:11:\"jpg,gif,rar\";}','');");
E_D("replace into `pre_forum_grouplevel` values('3','default','高级','3000','999999999','','a:2:{s:4:\"post\";s:1:\"1\";s:5:\"reply\";s:1:\"1\";}','a:11:{s:13:\"alloweditpost\";s:1:\"1\";s:10:\"recyclebin\";s:1:\"1\";s:12:\"allowsmilies\";s:1:\"1\";s:9:\"allowhtml\";s:1:\"0\";s:11:\"allowbbcode\";s:1:\"1\";s:14:\"allowanonymous\";s:1:\"0\";s:6:\"jammer\";s:1:\"1\";s:12:\"allowimgcode\";s:1:\"1\";s:14:\"allowmediacode\";s:1:\"1\";s:16:\"allowpostspecial\";i:31;s:16:\"attachextensions\";s:31:\"jpg,gif,png,bmp,rar,doc,txt,zip\";}','');");

require("../../inc/footer.php");
?>