<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_category_permission`;");
E_C("CREATE TABLE `pre_portal_category_permission` (
  `catid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `allowpublish` tinyint(1) NOT NULL default '0',
  `allowmanage` tinyint(1) NOT NULL default '0',
  `inheritedcatid` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`catid`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>