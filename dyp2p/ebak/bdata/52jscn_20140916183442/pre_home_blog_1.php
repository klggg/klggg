<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_blog`;");
E_C("CREATE TABLE `pre_home_blog` (
  `blogid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(15) NOT NULL default '',
  `subject` char(80) NOT NULL default '',
  `classid` smallint(6) unsigned NOT NULL default '0',
  `catid` smallint(6) unsigned NOT NULL default '0',
  `viewnum` mediumint(8) unsigned NOT NULL default '0',
  `replynum` mediumint(8) unsigned NOT NULL default '0',
  `hot` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `picflag` tinyint(1) NOT NULL default '0',
  `noreply` tinyint(1) NOT NULL default '0',
  `friend` tinyint(1) NOT NULL default '0',
  `password` char(10) NOT NULL default '',
  `favtimes` mediumint(8) unsigned NOT NULL default '0',
  `sharetimes` mediumint(8) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `click1` smallint(6) unsigned NOT NULL default '0',
  `click2` smallint(6) unsigned NOT NULL default '0',
  `click3` smallint(6) unsigned NOT NULL default '0',
  `click4` smallint(6) unsigned NOT NULL default '0',
  `click5` smallint(6) unsigned NOT NULL default '0',
  `click6` smallint(6) unsigned NOT NULL default '0',
  `click7` smallint(6) unsigned NOT NULL default '0',
  `click8` smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`blogid`),
  KEY `uid` (`uid`,`dateline`),
  KEY `hot` (`hot`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>