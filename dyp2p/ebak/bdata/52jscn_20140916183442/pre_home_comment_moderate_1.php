<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_comment_moderate`;");
E_C("CREATE TABLE `pre_home_comment_moderate` (
  `id` int(10) unsigned NOT NULL default '0',
  `idtype` varchar(15) NOT NULL default '',
  `status` tinyint(3) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `idtype` (`idtype`,`status`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>