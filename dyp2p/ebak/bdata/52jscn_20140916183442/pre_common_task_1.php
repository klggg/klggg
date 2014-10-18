<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_task`;");
E_C("CREATE TABLE `pre_common_task` (
  `taskid` smallint(6) unsigned NOT NULL auto_increment,
  `relatedtaskid` smallint(6) unsigned NOT NULL default '0',
  `available` tinyint(1) NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `description` text NOT NULL,
  `icon` varchar(150) NOT NULL default '',
  `applicants` mediumint(8) unsigned NOT NULL default '0',
  `achievers` mediumint(8) unsigned NOT NULL default '0',
  `tasklimits` mediumint(8) unsigned NOT NULL default '0',
  `applyperm` text NOT NULL,
  `scriptname` varchar(50) NOT NULL default '',
  `starttime` int(10) unsigned NOT NULL default '0',
  `endtime` int(10) unsigned NOT NULL default '0',
  `period` int(10) unsigned NOT NULL default '0',
  `periodtype` tinyint(1) NOT NULL default '0',
  `reward` enum('credit','magic','medal','invite','group') NOT NULL default 'credit',
  `prize` varchar(15) NOT NULL default '',
  `bonus` int(10) NOT NULL default '0',
  `displayorder` smallint(6) unsigned NOT NULL default '0',
  `version` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`taskid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>