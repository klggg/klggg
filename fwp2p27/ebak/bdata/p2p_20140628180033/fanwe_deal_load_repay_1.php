<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_load_repay`;");
E_C("CREATE TABLE `fanwe_deal_load_repay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `self_money` double(20,4) NOT NULL COMMENT '本金',
  `repay_money` double(20,4) NOT NULL,
  `manage_money` double(20,4) NOT NULL,
  `impose_money` double(20,4) NOT NULL,
  `repay_time` int(11) NOT NULL,
  `true_repay_time` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0提前，1准时，2逾期，3严重逾期',
  `is_site_repay` tinyint(1) NOT NULL COMMENT '是否垫付',
  `l_key` int(11) NOT NULL DEFAULT '0',
  `u_key` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_0` (`deal_id`,`user_id`,`l_key`,`u_key`),
  KEY `idx_1` (`user_id`,`status`),
  KEY `idx_2` (`deal_id`,`user_id`,`repay_time`,`l_key`,`u_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>