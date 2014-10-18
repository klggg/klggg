<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_auto`;");
E_C("CREATE TABLE `yyd_borrow_auto` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `tender_type` int(2) NOT NULL COMMENT '???????',
  `tender_account` int(50) NOT NULL,
  `tender_scale` int(50) NOT NULL,
  `order` int(11) NOT NULL,
  `account_min` decimal(11,2) NOT NULL,
  `first_date` int(50) NOT NULL,
  `last_date` int(50) NOT NULL,
  `account_min_status` int(2) NOT NULL,
  `date_status` int(2) NOT NULL,
  `account_use_status` int(2) NOT NULL,
  `account_use` decimal(11,2) NOT NULL,
  `video_status` int(10) NOT NULL,
  `realname_status` int(10) NOT NULL,
  `phone_status` int(10) NOT NULL,
  `my_friend` int(10) NOT NULL,
  `not_black` int(10) NOT NULL,
  `late_status` int(10) NOT NULL,
  `late_times` int(10) NOT NULL,
  `dianfu_status` int(10) NOT NULL,
  `dianfu_times` int(10) NOT NULL,
  `black_status` int(10) NOT NULL,
  `black_user` int(10) NOT NULL,
  `black_times` int(10) NOT NULL,
  `not_late_black` int(10) NOT NULL,
  `borrow_credit_status` int(10) NOT NULL,
  `borrow_credit_first` int(10) NOT NULL,
  `borrow_credit_last` int(10) NOT NULL,
  `tender_credit_status` int(10) NOT NULL,
  `tender_credit_first` int(10) NOT NULL,
  `tender_credit_last` int(10) NOT NULL,
  `user_rank` int(10) NOT NULL,
  `first_credit` int(10) NOT NULL,
  `last_credit` int(10) NOT NULL,
  `webpay_statis` int(10) NOT NULL,
  `webpay_times` int(10) NOT NULL,
  `borrow_style` int(10) NOT NULL,
  `timelimit_status` int(10) NOT NULL,
  `timelimit_month_first` int(10) NOT NULL,
  `timelimit_month_last` int(10) NOT NULL,
  `timelimit_day_first` int(10) NOT NULL,
  `timelimit_day_last` int(10) NOT NULL,
  `apr_status` int(10) NOT NULL,
  `apr_first` int(10) NOT NULL,
  `apr_last` int(10) NOT NULL,
  `award_status` int(10) NOT NULL,
  `award_first` int(10) NOT NULL,
  `award_last` int(10) NOT NULL,
  `vouch_status` int(10) NOT NULL,
  `tuijian_status` int(10) NOT NULL,
  `updatetime` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=460 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>