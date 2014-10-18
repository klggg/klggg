<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_share`;");
E_C("CREATE TABLE `pre_home_share` (
  `sid` mediumint(8) unsigned NOT NULL auto_increment,
  `itemid` mediumint(8) unsigned NOT NULL,
  `type` varchar(30) NOT NULL default '',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(15) NOT NULL default '',
  `fromuid` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `title_template` text NOT NULL,
  `body_template` text NOT NULL,
  `body_data` text NOT NULL,
  `body_general` text NOT NULL,
  `image` varchar(255) NOT NULL default '',
  `image_link` varchar(255) NOT NULL default '',
  `hot` mediumint(8) unsigned NOT NULL default '0',
  `hotuser` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`sid`),
  KEY `uid` (`uid`,`dateline`),
  KEY `hot` (`hot`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>