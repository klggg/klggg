<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_security_evilpost`;");
E_C("CREATE TABLE `pre_security_evilpost` (
  `pid` int(10) unsigned NOT NULL,
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `type` tinyint(1) NOT NULL default '0',
  `evilcount` int(10) NOT NULL default '0',
  `eviltype` mediumint(8) unsigned NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL default '0',
  `operateresult` tinyint(1) unsigned NOT NULL default '0',
  `isreported` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`pid`),
  KEY `type` (`tid`,`type`),
  KEY `operateresult` (`operateresult`,`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>