<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_friend_request`;");
E_C("CREATE TABLE `pre_home_friend_request` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `fuid` mediumint(8) unsigned NOT NULL default '0',
  `fusername` char(15) NOT NULL default '',
  `gid` smallint(6) unsigned NOT NULL default '0',
  `note` char(60) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`fuid`),
  KEY `fuid` (`fuid`),
  KEY `dateline` (`uid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>