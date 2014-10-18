<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_amount_type`;");
E_C("CREATE TABLE `yyd_borrow_amount_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `amount_type` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `default` decimal(11,2) NOT NULL,
  `credit_nid` varchar(100) NOT NULL,
  `multiples` varchar(10) NOT NULL COMMENT '????',
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  `updatetime` varchar(50) NOT NULL,
  `updateip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>