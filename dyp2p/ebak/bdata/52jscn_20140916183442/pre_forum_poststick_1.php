<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_poststick`;");
E_C("CREATE TABLE `pre_forum_poststick` (
  `tid` mediumint(8) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`tid`,`pid`),
  KEY `dateline` (`tid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>