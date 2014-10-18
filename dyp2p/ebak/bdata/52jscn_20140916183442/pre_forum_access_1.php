<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_access`;");
E_C("CREATE TABLE `pre_forum_access` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `allowview` tinyint(1) NOT NULL default '0',
  `allowpost` tinyint(1) NOT NULL default '0',
  `allowreply` tinyint(1) NOT NULL default '0',
  `allowgetattach` tinyint(1) NOT NULL default '0',
  `allowgetimage` tinyint(1) NOT NULL default '0',
  `allowpostattach` tinyint(1) NOT NULL default '0',
  `allowpostimage` tinyint(1) NOT NULL default '0',
  `adminuser` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`fid`),
  KEY `listorder` (`fid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>