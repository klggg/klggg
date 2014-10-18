<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_portal_article_related`;");
E_C("CREATE TABLE `pre_portal_article_related` (
  `aid` mediumint(8) unsigned NOT NULL auto_increment,
  `raid` mediumint(8) unsigned NOT NULL default '0',
  `displayorder` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`aid`,`raid`),
  KEY `aid` (`aid`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>