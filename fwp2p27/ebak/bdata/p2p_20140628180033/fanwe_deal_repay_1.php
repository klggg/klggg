<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_repay`;");
E_C("CREATE TABLE `fanwe_deal_repay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `repay_money` double(20,4) NOT NULL,
  `manage_money` double(20,4) NOT NULL,
  `impose_money` double(20,4) NOT NULL,
  `repay_time` int(11) NOT NULL,
  `true_repay_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0提前,1准时还款，2逾期还款 3严重逾期  前台在这基础上+1',
  PRIMARY KEY (`id`),
  KEY `idx_0` (`user_id`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>