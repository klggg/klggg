<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_threadpreview`;");
E_C("CREATE TABLE `pre_forum_threadpreview` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `relay` int(10) unsigned NOT NULL default '0',
  `content` text NOT NULL,
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>