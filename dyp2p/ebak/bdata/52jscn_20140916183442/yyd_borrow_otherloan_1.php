<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_otherloan`;");
E_C("CREATE TABLE `yyd_borrow_otherloan` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `agency` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `amount_credit` varchar(100) NOT NULL,
  `amount_vouch` varchar(100) NOT NULL,
  `repay_nouse` varchar(100) NOT NULL,
  `repay_month` varchar(100) NOT NULL,
  `remark` text NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>