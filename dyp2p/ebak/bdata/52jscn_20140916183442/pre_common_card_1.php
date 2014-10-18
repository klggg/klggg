<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_card`;");
E_C("CREATE TABLE `pre_common_card` (
  `id` char(255) NOT NULL default '',
  `typeid` smallint(6) unsigned NOT NULL default '1',
  `maketype` tinyint(1) NOT NULL default '0',
  `makeruid` mediumint(8) unsigned NOT NULL default '0',
  `price` mediumint(8) unsigned NOT NULL default '0',
  `extcreditskey` tinyint(1) NOT NULL default '0',
  `extcreditsval` int(10) NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '1',
  `dateline` int(10) unsigned NOT NULL default '0',
  `cleardateline` int(10) unsigned NOT NULL default '0',
  `useddateline` int(10) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>