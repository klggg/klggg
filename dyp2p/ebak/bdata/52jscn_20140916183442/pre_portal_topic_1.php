<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_topic`;");
E_C("CREATE TABLE `pre_portal_topic` (
  `topicid` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `domain` varchar(255) NOT NULL default '',
  `summary` text NOT NULL,
  `keyword` text NOT NULL,
  `cover` varchar(255) NOT NULL default '',
  `picflag` tinyint(1) NOT NULL default '0',
  `primaltplname` varchar(255) NOT NULL default '',
  `useheader` tinyint(1) NOT NULL default '0',
  `usefooter` tinyint(1) NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `viewnum` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `closed` tinyint(1) NOT NULL default '0',
  `allowcomment` tinyint(1) NOT NULL default '0',
  `commentnum` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`topicid`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>