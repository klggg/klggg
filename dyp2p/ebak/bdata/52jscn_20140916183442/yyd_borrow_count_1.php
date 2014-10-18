<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_count`;");
E_C("CREATE TABLE `yyd_borrow_count` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `tender_times` int(11) NOT NULL,
  `tender_success_times` int(11) NOT NULL,
  `tender_account` decimal(11,2) NOT NULL,
  `tender_success_account` decimal(11,2) NOT NULL,
  `tender_recover_account` decimal(11,2) NOT NULL,
  `tender_frost_account` decimal(11,2) NOT NULL,
  `tender_recover_yes` decimal(11,2) NOT NULL,
  `tender_recover_times` int(11) NOT NULL,
  `tender_recover_times_yes` int(11) NOT NULL,
  `tender_recover_times_wait` int(11) NOT NULL,
  `tender_recover_wait` decimal(11,2) NOT NULL,
  `tender_capital_account` decimal(11,2) NOT NULL,
  `tender_capital_yes` decimal(11,2) NOT NULL,
  `tender_capital_wait` decimal(11,2) NOT NULL,
  `tender_interest_account` decimal(11,2) NOT NULL,
  `tender_interest_yes` decimal(11,2) NOT NULL,
  `tender_interest_wait` decimal(11,2) NOT NULL,
  `interest_scale` decimal(11,2) NOT NULL COMMENT '?????????',
  `web_dianfu_acccount` decimal(11,2) NOT NULL,
  `late_add_account` decimal(11,2) NOT NULL,
  `interest_reduce_account` decimal(11,2) NOT NULL,
  `borrow_times` int(11) NOT NULL,
  `borrow_vouch_times` int(11) NOT NULL,
  `borrow_success_times` int(11) NOT NULL,
  `borrow_repay_times` int(11) NOT NULL,
  `borrow_repay_yes_times` int(11) NOT NULL,
  `borrow_repay_wait_times` int(11) NOT NULL,
  `borrow_account` decimal(11,2) NOT NULL,
  `borrow_repay_account` decimal(11,2) NOT NULL,
  `borrow_repay_yes` decimal(11,2) NOT NULL,
  `borrow_repay_wait` decimal(11,2) NOT NULL,
  `borrow_repay_interest` decimal(11,2) NOT NULL,
  `borrow_repay_interest_yes` decimal(11,2) NOT NULL,
  `borrow_repay_interest_wait` decimal(11,2) NOT NULL,
  `borrow_repay_capital` decimal(11,2) NOT NULL,
  `borrow_repay_capital_yes` decimal(11,2) NOT NULL,
  `borrow_repay_capital_wait` decimal(11,2) NOT NULL,
  `fee_account` decimal(11,2) NOT NULL,
  `fee_recharge_account` decimal(11,2) NOT NULL,
  `fee_cash_account` decimal(11,2) NOT NULL,
  `fee_borrow_account` decimal(11,2) NOT NULL,
  `fee_tender_account` decimal(11,2) NOT NULL,
  `bad_account` decimal(11,2) NOT NULL,
  `weiyue` decimal(11,2) NOT NULL COMMENT '¦´???',
  `advance_repay_times` int(11) NOT NULL COMMENT '???????????',
  `borrow_weiyue` decimal(11,2) NOT NULL,
  `borrow_repay_late_one` int(11) NOT NULL COMMENT '?????',
  `borrow_repay_late_two` int(11) NOT NULL COMMENT '???????',
  `borrow_repay_late_three` int(11) NOT NULL COMMENT '????????',
  `borrow_repay_late_four` int(11) NOT NULL COMMENT '????????',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=778 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_borrow_count` values('771','1935','0','0','0.00','0.00','0.00','0.00','0.00','0','0','0','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','1','0','1','3','3','0','5000.00','5100.33','5100.33','0.00','100.33','100.33','0.00','5000.00','5000.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0','0.00','0','0','0','0');");
E_D("replace into `yyd_borrow_count` values('772','1934','6','2','5400.00','5000.00','5100.33','400.00','5100.33','6','6','0','0.00','5000.00','5000.00','0.00','100.33','119.50','0.00','0.00','0.00','0.00','0.00','3','0','0','0','0','0','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0','0.00','0','0','0','0');");
E_D("replace into `yyd_borrow_count` values('773','1938','27','26','38550.00','38500.00','38756.62','0.00','38756.62','26','26','0','0.00','38500.00','38500.00','0.00','256.62','256.62','0.00','0.00','0.00','0.00','0.00','22','0','18','30','30','0','28000.00','28675.81','28675.81','0.00','675.81','675.81','0.00','28000.00','28000.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0','0.00','0','2','2','0');");
E_D("replace into `yyd_borrow_count` values('774','1940','18','17','27800.00','26000.00','26636.64','1800.00','26636.64','29','29','0','0.00','26000.00','26000.00','0.00','636.64','636.64','0.00','0.00','0.00','0.00','0.00','0','0','0','0','0','0','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0','0.00','0','0','0','0');");
E_D("replace into `yyd_borrow_count` values('775','1937','2','2','2000.00','2000.00','2039.17','0.00','1020.00','2','1','0','0.00','2000.00','1000.00','1000.00','39.17','20.00','19.17','0.00','0.00','0.00','0.00','0','0','0','0','0','0','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0','0.00','0','0','0','0');");
E_D("replace into `yyd_borrow_count` values('776','1942','0','0','0.00','0.00','0.00','0.00','0.00','0','0','0','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','2','0','0','0','0','0','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0','0.00','0','0','0','0');");
E_D("replace into `yyd_borrow_count` values('777','1956','0','0','0.00','0.00','0.00','0.00','0.00','0','0','0','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','5','0','0','0','0','0','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0','0.00','0','0','0','0');");

require("../../inc/footer.php");
?>