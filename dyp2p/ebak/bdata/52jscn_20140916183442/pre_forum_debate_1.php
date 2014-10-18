<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_debate`;");
E_C("CREATE TABLE `pre_forum_debate` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `starttime` int(10) unsigned NOT NULL default '0',
  `endtime` int(10) unsigned NOT NULL default '0',
  `affirmdebaters` mediumint(8) unsigned NOT NULL default '0',
  `negadebaters` mediumint(8) unsigned NOT NULL default '0',
  `affirmvotes` mediumint(8) unsigned NOT NULL default '0',
  `negavotes` mediumint(8) unsigned NOT NULL default '0',
  `umpire` varchar(15) NOT NULL default '',
  `winner` tinyint(1) NOT NULL default '0',
  `bestdebater` varchar(50) NOT NULL default '',
  `affirmpoint` text NOT NULL,
  `negapoint` text NOT NULL,
  `umpirepoint` text NOT NULL,
  `affirmvoterids` text NOT NULL,
  `negavoterids` text NOT NULL,
  `affirmreplies` mediumint(8) unsigned NOT NULL,
  `negareplies` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY  (`tid`),
  KEY `uid` (`uid`,`starttime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>