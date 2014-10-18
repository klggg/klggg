<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_show`;");
E_C("CREATE TABLE `pre_home_show` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(15) NOT NULL default '',
  `unitprice` int(10) unsigned NOT NULL default '1',
  `credit` int(10) unsigned NOT NULL default '0',
  `note` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`uid`),
  KEY `unitprice` (`unitprice`),
  KEY `credit` (`credit`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>