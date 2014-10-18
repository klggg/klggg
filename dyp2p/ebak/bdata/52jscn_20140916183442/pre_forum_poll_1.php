<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_poll`;");
E_C("CREATE TABLE `pre_forum_poll` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `overt` tinyint(1) NOT NULL default '0',
  `multiple` tinyint(1) NOT NULL default '0',
  `visible` tinyint(1) NOT NULL default '0',
  `maxchoices` tinyint(3) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  `pollpreview` varchar(255) NOT NULL default '',
  `voters` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>