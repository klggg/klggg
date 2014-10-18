<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_post_location`;");
E_C("CREATE TABLE `pre_forum_post_location` (
  `pid` int(10) unsigned NOT NULL default '0',
  `tid` mediumint(8) unsigned default '0',
  `uid` mediumint(8) unsigned default '0',
  `mapx` varchar(255) NOT NULL,
  `mapy` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY  (`pid`),
  KEY `tid` (`tid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>