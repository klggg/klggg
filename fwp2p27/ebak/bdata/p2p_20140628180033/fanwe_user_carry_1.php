<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_carry`;");
E_C("CREATE TABLE `fanwe_user_carry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `money` double NOT NULL,
  `fee` double NOT NULL,
  `bank_id` int(11) NOT NULL,
  `bankcard` varchar(30) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0未处理，1处理，2关闭',
  `update_time` int(11) NOT NULL,
  `msg` text NOT NULL,
  `desc` text NOT NULL,
  `real_name` varchar(30) NOT NULL,
  `region_lv1` int(11) NOT NULL,
  `region_lv2` int(11) NOT NULL,
  `region_lv3` int(11) NOT NULL,
  `region_lv4` int(11) NOT NULL,
  `bankzone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_carry` values('1','3','500','1','2','622848007007544231','1381704241','1','1381704268','','','123','1','26','329','2810','农业银行');");
E_D("replace into `fanwe_user_carry` values('2','3','100','1','1','622848007007544231','1381704388','0','0','','','123','1','23','300','2473','农业银行');");

require("../../inc/footer.php");
?>