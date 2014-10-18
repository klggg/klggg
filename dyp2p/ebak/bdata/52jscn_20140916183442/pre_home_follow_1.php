<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_follow`;");
E_C("CREATE TABLE `pre_home_follow` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(15) NOT NULL default '',
  `followuid` mediumint(8) unsigned NOT NULL default '0',
  `fusername` char(15) NOT NULL default '',
  `bkname` varchar(255) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `mutual` tinyint(1) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`followuid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>