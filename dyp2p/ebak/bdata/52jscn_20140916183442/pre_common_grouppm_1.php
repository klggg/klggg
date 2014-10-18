<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_grouppm`;");
E_C("CREATE TABLE `pre_common_grouppm` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `authorid` mediumint(8) unsigned NOT NULL default '0',
  `author` varchar(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `message` text NOT NULL,
  `numbers` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>