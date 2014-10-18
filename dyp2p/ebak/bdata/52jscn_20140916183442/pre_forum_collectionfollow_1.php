<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_collectionfollow`;");
E_C("CREATE TABLE `pre_forum_collectionfollow` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(15) NOT NULL default '',
  `ctid` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `lastvisit` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`ctid`),
  KEY `ctid` (`ctid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>