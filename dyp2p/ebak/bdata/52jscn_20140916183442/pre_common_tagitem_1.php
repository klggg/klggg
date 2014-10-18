<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_tagitem`;");
E_C("CREATE TABLE `pre_common_tagitem` (
  `tagid` smallint(6) unsigned NOT NULL default '0',
  `itemid` mediumint(8) unsigned NOT NULL default '0',
  `idtype` char(10) NOT NULL default '',
  UNIQUE KEY `item` (`tagid`,`itemid`,`idtype`),
  KEY `idtype` (`idtype`,`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>