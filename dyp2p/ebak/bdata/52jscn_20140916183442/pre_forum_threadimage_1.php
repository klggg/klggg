<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_threadimage`;");
E_C("CREATE TABLE `pre_forum_threadimage` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `attachment` varchar(255) NOT NULL default '',
  `remote` tinyint(1) unsigned NOT NULL default '0',
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>