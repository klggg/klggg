<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_banned`;");
E_C("CREATE TABLE `pre_common_banned` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `ip1` smallint(3) NOT NULL default '0',
  `ip2` smallint(3) NOT NULL default '0',
  `ip3` smallint(3) NOT NULL default '0',
  `ip4` smallint(3) NOT NULL default '0',
  `admin` varchar(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>