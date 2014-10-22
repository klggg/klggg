<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_payment`;");
E_C("CREATE TABLE `fanwe_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `online_pay` tinyint(1) NOT NULL,
  `fee_amount` double(20,4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `total_amount` double(20,4) NOT NULL,
  `config` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `fee_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_payment` values('1','Account','1','1','0.0000','余额支付','','0.0000','N;','','1','0');");
E_D("replace into `fanwe_payment` values('2','Voucher','1','1','0.0000','代金券支付','','0.0000','N;','','4','0');");
E_D("replace into `fanwe_payment` values('3','Guofubao','1','1','0.0100','国付宝支付','过度包方法地方','0.0000','a:4:{s:11:\"merchant_id\";s:10:\"0000046367\";s:11:\"virCardNoIn\";s:19:\"0000000002000114828\";s:15:\"VerficationCode\";s:11:\"chensiyi001\";s:16:\"guofubao_gateway\";a:15:{s:3:\"CCB\";s:1:\"1\";s:3:\"CMB\";s:1:\"1\";s:4:\"ICBC\";s:1:\"1\";s:3:\"BOC\";s:1:\"1\";s:3:\"ABC\";s:1:\"1\";s:5:\"BOCOM\";s:1:\"1\";s:4:\"CMBC\";s:1:\"1\";s:4:\"HXBC\";s:1:\"1\";s:3:\"CIB\";s:1:\"1\";s:4:\"SPDB\";s:1:\"1\";s:3:\"GDB\";s:1:\"1\";s:5:\"CITIC\";s:1:\"1\";s:3:\"CEB\";s:1:\"1\";s:4:\"PSBC\";s:1:\"1\";s:3:\"SDB\";s:1:\"1\";}}','','5','1');");
E_D("replace into `fanwe_payment` values('4','Baofoo','1','1','10.0000','宝付支付','各家各户就','0.0000','a:3:{s:14:\"baofoo_account\";s:6:\"110015\";s:10:\"baofoo_key\";s:16:\"84ueipnwooba0hre\";s:14:\"baofoo_gateway\";a:1:{i:1000;s:1:\"1\";}}','','6','0');");
E_D("replace into `fanwe_payment` values('5','Chinabank','1','1','10.0000','网银在线','','0.0000','a:2:{s:17:\"chinabank_account\";s:8:\"22240516\";s:13:\"chinabank_key\";s:16:\"luoyong+chensiyi\";}','','7','0');");
E_D("replace into `fanwe_payment` values('6','Yeepay','1','1','0.0000','易宝支付','','0.0000','a:2:{s:14:\"yeepay_account\";s:11:\"10012156400\";s:10:\"yeepay_key\";s:60:\"Le38216Y8i8V49247gc3SM214vC01342gIQz4GnNqv29IE9Z8498S7wZk4so\";}','','8','0');");

require("../../inc/footer.php");
?>