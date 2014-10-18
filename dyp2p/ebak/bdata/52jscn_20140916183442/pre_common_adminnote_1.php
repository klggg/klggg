<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_adminnote`;");
E_C("CREATE TABLE `pre_common_adminnote` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `admin` varchar(15) NOT NULL default '',
  `access` tinyint(3) NOT NULL default '0',
  `adminid` tinyint(3) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  `message` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>