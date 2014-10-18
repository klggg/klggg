<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_docomment`;");
E_C("CREATE TABLE `pre_home_docomment` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `upid` int(10) unsigned NOT NULL default '0',
  `doid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `message` text NOT NULL,
  `ip` varchar(20) NOT NULL default '',
  `grade` smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `doid` (`doid`,`dateline`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>