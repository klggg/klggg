<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_pm_indexes`;");
E_C("CREATE TABLE `pre_ucenter_pm_indexes` (
  `pmid` mediumint(8) unsigned NOT NULL auto_increment,
  `plid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`pmid`),
  KEY `plid` (`plid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>