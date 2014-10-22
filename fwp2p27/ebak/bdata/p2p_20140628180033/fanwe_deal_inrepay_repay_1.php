<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_inrepay_repay`;");
E_C("CREATE TABLE `fanwe_deal_inrepay_repay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `repay_money` double NOT NULL,
  `manage_money` double(20,4) NOT NULL,
  `impose` double(20,4) NOT NULL,
  `repay_time` int(11) NOT NULL,
  `true_repay_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>