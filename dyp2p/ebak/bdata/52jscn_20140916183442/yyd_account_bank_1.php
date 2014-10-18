<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_account_bank`;");
E_C("CREATE TABLE `yyd_account_bank` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `status` int(2) NOT NULL,
  `name` varchar(100) default NULL COMMENT '????????',
  `nid` varchar(50) NOT NULL,
  `litpic` varchar(255) default NULL COMMENT '????????',
  `cash_money` varchar(100) default NULL COMMENT '???????????',
  `reach_day` int(11) NOT NULL COMMENT '????????',
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk COMMENT='???????'");
E_D("replace into `yyd_account_bank` values('1','1','中信银行','中信','','20000000','1','1365428017','112.230.73.39');");
E_D("replace into `yyd_account_bank` values('2','1','建设银行','建设','','2000000','1','1369234854','110.115.216.37');");
E_D("replace into `yyd_account_bank` values('3','1','工商银行','工商','','200000','1','1369234878','110.115.216.37');");
E_D("replace into `yyd_account_bank` values('4','1','农业银行','农业','','200000','1','1369234904','110.115.216.37');");
E_D("replace into `yyd_account_bank` values('5','1','招商银行','招商','','200000','1','1369234963','110.115.216.37');");
E_D("replace into `yyd_account_bank` values('6','1','交通银行','交通','','200000','1','1369234983','110.115.216.37');");
E_D("replace into `yyd_account_bank` values('7','1','中国银行','中国','','200000','1','1369235011','110.115.216.37');");
E_D("replace into `yyd_account_bank` values('8','1','兴业银行','兴业','','200000','1','1369235074','110.115.216.37');");
E_D("replace into `yyd_account_bank` values('9','1','上海浦东发展银行','浦发','','200000','1','1369235212','110.115.216.37');");
E_D("replace into `yyd_account_bank` values('10','1','民生银行','民生','','200000','0','1369239911','123.233.230.75');");
E_D("replace into `yyd_account_bank` values('11','1','其他银行','其他银行','','','0','1369318955','123.233.221.209');");

require("../../inc/footer.php");
?>