<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_domain`;");
E_C("CREATE TABLE `pre_common_domain` (
  `domain` char(30) NOT NULL default '',
  `domainroot` char(60) NOT NULL default '',
  `id` mediumint(8) unsigned NOT NULL default '0',
  `idtype` char(15) NOT NULL default '',
  PRIMARY KEY  (`id`,`idtype`),
  KEY `domain` (`domain`,`domainroot`),
  KEY `idtype` (`idtype`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>