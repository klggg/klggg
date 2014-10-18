<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyt_account_check`;");
E_C("CREATE TABLE `yyt_account_check` (
  `addtime` int(10) unsigned NOT NULL default '0',
  `sp_billno` varchar(100) default NULL,
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>