<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_blogfield`;");
E_C("CREATE TABLE `pre_home_blogfield` (
  `blogid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `pic` varchar(255) NOT NULL default '',
  `tag` varchar(255) NOT NULL default '',
  `message` mediumtext NOT NULL,
  `postip` varchar(255) NOT NULL default '',
  `related` text NOT NULL,
  `relatedtime` int(10) unsigned NOT NULL default '0',
  `target_ids` text NOT NULL,
  `hotuser` text NOT NULL,
  `magiccolor` tinyint(6) NOT NULL default '0',
  `magicpaper` tinyint(6) NOT NULL default '0',
  `pushedaid` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`blogid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>