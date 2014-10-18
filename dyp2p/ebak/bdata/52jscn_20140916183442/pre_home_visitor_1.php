<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_visitor`;");
E_C("CREATE TABLE `pre_home_visitor` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `vuid` mediumint(8) unsigned NOT NULL default '0',
  `vusername` char(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`vuid`),
  KEY `vuid` (`vuid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>