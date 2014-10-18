<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_report`;");
E_C("CREATE TABLE `pre_common_report` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `urlkey` char(32) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `message` text NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `num` smallint(6) unsigned NOT NULL default '1',
  `opuid` mediumint(8) unsigned NOT NULL default '0',
  `opname` varchar(15) NOT NULL default '',
  `optime` int(10) unsigned NOT NULL default '0',
  `opresult` varchar(255) NOT NULL default '',
  `fid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `urlkey` (`urlkey`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>