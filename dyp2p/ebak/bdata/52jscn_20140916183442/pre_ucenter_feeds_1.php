<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_feeds`;");
E_C("CREATE TABLE `pre_ucenter_feeds` (
  `feedid` mediumint(8) unsigned NOT NULL auto_increment,
  `appid` varchar(30) NOT NULL default '',
  `icon` varchar(30) NOT NULL default '',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `hash_template` varchar(32) NOT NULL default '',
  `hash_data` varchar(32) NOT NULL default '',
  `title_template` text NOT NULL,
  `title_data` text NOT NULL,
  `body_template` text NOT NULL,
  `body_data` text NOT NULL,
  `body_general` text NOT NULL,
  `image_1` varchar(255) NOT NULL default '',
  `image_1_link` varchar(255) NOT NULL default '',
  `image_2` varchar(255) NOT NULL default '',
  `image_2_link` varchar(255) NOT NULL default '',
  `image_3` varchar(255) NOT NULL default '',
  `image_3_link` varchar(255) NOT NULL default '',
  `image_4` varchar(255) NOT NULL default '',
  `image_4_link` varchar(255) NOT NULL default '',
  `target_ids` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`feedid`),
  KEY `uid` (`uid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>