<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_attachment`;");
E_C("CREATE TABLE `pre_portal_attachment` (
  `attachid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `filename` varchar(255) NOT NULL default '',
  `filetype` varchar(255) NOT NULL default '',
  `filesize` int(10) unsigned NOT NULL default '0',
  `attachment` varchar(255) NOT NULL default '',
  `isimage` tinyint(1) NOT NULL default '0',
  `thumb` tinyint(1) unsigned NOT NULL default '0',
  `remote` tinyint(1) unsigned NOT NULL default '0',
  `aid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`attachid`),
  KEY `aid` (`aid`,`attachid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>