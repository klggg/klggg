<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_vouch`;");
E_C("CREATE TABLE `yyd_borrow_vouch` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `status` int(2) NOT NULL default '0',
  `account` varchar(20) NOT NULL,
  `account_vouch` decimal(11,2) NOT NULL,
  `contents` text NOT NULL,
  `award_scale` varchar(10) NOT NULL,
  `award_account` decimal(11,2) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>