<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_order`;");
E_C("CREATE TABLE `fanwe_deal_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `pay_status` tinyint(1) NOT NULL,
  `total_price` double(20,4) NOT NULL,
  `pay_amount` double(20,4) NOT NULL,
  `delivery_status` tinyint(1) NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `return_total_score` int(11) NOT NULL,
  `refund_amount` double(20,4) NOT NULL,
  `admin_memo` text NOT NULL,
  `memo` text NOT NULL,
  `region_lv1` int(11) NOT NULL,
  `region_lv2` int(11) NOT NULL,
  `region_lv3` int(11) NOT NULL,
  `region_lv4` int(11) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `deal_total_price` double(20,4) NOT NULL,
  `discount_price` double(20,4) NOT NULL,
  `delivery_fee` double(20,4) NOT NULL,
  `ecv_money` double(20,4) NOT NULL,
  `account_money` double(20,4) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_fee` double(20,4) NOT NULL,
  `return_total_money` double(20,4) NOT NULL,
  `extra_status` tinyint(1) NOT NULL,
  `after_sale` tinyint(1) NOT NULL,
  `refund_money` double(20,4) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `deal_ids` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `refund_status` tinyint(1) NOT NULL COMMENT '0:不需退款 1:有退款申请 2:已处理',
  `retake_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_sn` (`order_sn`),
  FULLTEXT KEY `deal_ids` (`deal_ids`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_order` values('1','20131017022550492','1','13','1381962350','0','0','1010.0000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','1000.0000','0.0000','0.0000','0.0000','0.0000','0','3','10.0000','0.0000','0','0','0.0000','CMB','','','','0','0');");
E_D("replace into `fanwe_deal_order` values('2','20131017023126246','1','13','1381962686','0','0','1010.0000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','1000.0000','0.0000','0.0000','0.0000','0.0000','0','3','10.0000','0.0000','0','0','0.0000','CMB','','','','0','0');");
E_D("replace into `fanwe_deal_order` values('3','20131017023411370','1','13','1381962851','0','0','110.0000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','100.0000','0.0000','0.0000','0.0000','0.0000','0','4','10.0000','0.0000','0','0','0.0000','1000','','','','0','0');");
E_D("replace into `fanwe_deal_order` values('4','20131017023507130','1','13','1381962907','0','0','210.0000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','200.0000','0.0000','0.0000','0.0000','0.0000','0','5','10.0000','0.0000','0','0','0.0000','','','','','0','0');");
E_D("replace into `fanwe_deal_order` values('5','20131018011515899','1','14','1382044515','0','0','10010.0000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','10000.0000','0.0000','0.0000','0.0000','0.0000','0','4','10.0000','0.0000','0','0','0.0000','1000','','','','0','0');");
E_D("replace into `fanwe_deal_order` values('6','20131019025955918','1','14','1382137195','0','0','110.0000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','100.0000','0.0000','0.0000','0.0000','0.0000','0','4','10.0000','0.0000','0','0','0.0000','1000','','','','0','0');");
E_D("replace into `fanwe_deal_order` values('7','20131019103829214','1','17','1382164709','0','0','0.1000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','0.1000','0.0000','0.0000','0.0000','0.0000','0','6','0.0000','0.0000','0','0','0.0000','','','','','0','0');");
E_D("replace into `fanwe_deal_order` values('8','20131019111811998','1','17','1382167091','0','0','10.1000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','0.1000','0.0000','0.0000','0.0000','0.0000','0','5','10.0000','0.0000','0','0','0.0000','ICBC','','','','0','0');");
E_D("replace into `fanwe_deal_order` values('9','20131019111849869','1','17','1382167129','0','0','0.1000','0.0000','5','0','0','0','0.0000','','','0','0','0','0','','','','','0.1000','0.0000','0.0000','0.0000','0.0000','0','6','0.0000','0.0000','0','0','0.0000','ICBC','','','','0','0');");

require("../../inc/footer.php");
?>