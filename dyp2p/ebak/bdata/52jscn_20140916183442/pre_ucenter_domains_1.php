<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_domains`;");
E_C("CREATE TABLE `pre_ucenter_domains` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `domain` char(40) NOT NULL default '',
  `ip` char(15) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>