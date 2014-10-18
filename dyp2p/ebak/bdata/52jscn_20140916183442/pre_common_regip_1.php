<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_regip`;");
E_C("CREATE TABLE `pre_common_regip` (
  `ip` char(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `count` smallint(6) NOT NULL default '0',
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>