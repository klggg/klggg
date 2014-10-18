<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_category`;");
E_C("CREATE TABLE `pre_portal_category` (
  `catid` mediumint(8) unsigned NOT NULL auto_increment,
  `upid` mediumint(8) unsigned NOT NULL default '0',
  `catname` varchar(255) NOT NULL default '',
  `articles` mediumint(8) unsigned NOT NULL default '0',
  `allowcomment` tinyint(1) NOT NULL default '1',
  `displayorder` smallint(6) NOT NULL default '0',
  `notinheritedarticle` tinyint(1) NOT NULL default '0',
  `notinheritedblock` tinyint(1) NOT NULL default '0',
  `domain` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `closed` tinyint(1) NOT NULL default '0',
  `shownav` tinyint(1) NOT NULL default '0',
  `description` text NOT NULL,
  `seotitle` text NOT NULL,
  `keyword` text NOT NULL,
  `primaltplname` varchar(255) NOT NULL default '',
  `articleprimaltplname` varchar(255) NOT NULL default '',
  `disallowpublish` tinyint(1) NOT NULL default '0',
  `foldername` varchar(255) NOT NULL default '',
  `notshowarticlesummay` varchar(255) NOT NULL default '',
  `perpage` smallint(6) NOT NULL default '0',
  `maxpages` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>