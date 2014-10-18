<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_scrollpic_type`;");
E_C("CREATE TABLE `yyd_scrollpic_type` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `typename` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_scrollpic_type` values('1','遍匈flash夕頭');");
E_D("replace into `yyd_scrollpic_type` values('2','返字極banner夕頭');");

require("../../inc/footer.php");
?>