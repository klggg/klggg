<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_article_title`;");
E_C("CREATE TABLE `pre_portal_article_title` (
  `aid` mediumint(8) unsigned NOT NULL auto_increment,
  `catid` mediumint(8) unsigned NOT NULL default '0',
  `bid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `highlight` varchar(255) NOT NULL default '',
  `author` varchar(255) NOT NULL default '',
  `from` varchar(255) NOT NULL default '',
  `fromurl` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `summary` varchar(255) NOT NULL default '',
  `pic` varchar(255) NOT NULL default '',
  `thumb` tinyint(1) NOT NULL default '0',
  `remote` tinyint(1) NOT NULL default '0',
  `id` int(10) unsigned NOT NULL default '0',
  `idtype` varchar(255) NOT NULL default '',
  `contents` smallint(6) NOT NULL default '0',
  `allowcomment` tinyint(1) NOT NULL default '0',
  `owncomment` tinyint(1) NOT NULL default '0',
  `click1` smallint(6) unsigned NOT NULL default '0',
  `click2` smallint(6) unsigned NOT NULL default '0',
  `click3` smallint(6) unsigned NOT NULL default '0',
  `click4` smallint(6) unsigned NOT NULL default '0',
  `click5` smallint(6) unsigned NOT NULL default '0',
  `click6` smallint(6) unsigned NOT NULL default '0',
  `click7` smallint(6) unsigned NOT NULL default '0',
  `click8` smallint(6) unsigned NOT NULL default '0',
  `tag` tinyint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `showinnernav` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`aid`),
  KEY `catid` (`catid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>