<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_rsscache`;");
E_C("CREATE TABLE `pre_portal_rsscache` (
  `lastupdate` int(10) unsigned NOT NULL default '0',
  `catid` mediumint(8) unsigned NOT NULL default '0',
  `aid` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `catname` char(50) NOT NULL default '',
  `author` char(15) NOT NULL default '',
  `subject` char(80) NOT NULL default '',
  `description` char(255) NOT NULL default '',
  UNIQUE KEY `aid` (`aid`),
  KEY `catid` (`catid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>