<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_payment_notice`;");
E_C("CREATE TABLE `fanwe_payment_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_sn` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  `money` double(20,4) NOT NULL,
  `outer_notice_sn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `notice_sn_unk` (`notice_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_payment_notice` values('129','2013101702255094','1381962350','0','1','0','13','3','','1010.0000','');");
E_D("replace into `fanwe_payment_notice` values('130','2013101702312619','1381962686','0','2','0','13','3','','1010.0000','');");
E_D("replace into `fanwe_payment_notice` values('131','2013101702341173','1381962851','0','3','0','13','4','','110.0000','');");
E_D("replace into `fanwe_payment_notice` values('132','2013101702350796','1381962907','0','4','0','13','5','','210.0000','');");
E_D("replace into `fanwe_payment_notice` values('133','2013101801151546','1382044515','0','5','0','14','4','','10010.0000','');");
E_D("replace into `fanwe_payment_notice` values('134','2013101902595537','1382137195','0','6','0','14','4','','110.0000','');");
E_D("replace into `fanwe_payment_notice` values('135','2013101910382911','1382164709','0','7','0','17','6','','0.1000','');");
E_D("replace into `fanwe_payment_notice` values('136','2013101911181165','1382167091','0','8','0','17','5','','10.1000','');");
E_D("replace into `fanwe_payment_notice` values('137','2013101911184969','1382167129','0','9','0','17','6','','0.1000','');");

require("../../inc/footer.php");
?>