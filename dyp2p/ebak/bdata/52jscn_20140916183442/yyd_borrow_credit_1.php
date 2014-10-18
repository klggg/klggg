<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_credit`;");
E_C("CREATE TABLE `yyd_borrow_credit` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL,
  `nid` varchar(30) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `repay_period` int(2) NOT NULL,
  `borrow_apr` decimal(11,2) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>