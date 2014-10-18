<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_friendlog`;");
E_C("CREATE TABLE `pre_home_friendlog` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `fuid` mediumint(8) unsigned NOT NULL default '0',
  `action` varchar(10) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`fuid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>