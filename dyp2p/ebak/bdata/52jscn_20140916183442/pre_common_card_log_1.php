<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_card_log`;");
E_C("CREATE TABLE `pre_common_card_log` (
  `id` smallint(6) NOT NULL auto_increment,
  `uid` mediumint(8) NOT NULL default '0',
  `username` varchar(20) NOT NULL default '',
  `cardrule` varchar(255) NOT NULL default '',
  `info` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL default '0',
  `description` mediumtext NOT NULL,
  `operation` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `dateline` (`dateline`),
  KEY `operation_dateline` (`operation`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>