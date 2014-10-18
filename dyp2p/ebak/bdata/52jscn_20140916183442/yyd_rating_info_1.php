<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_rating_info`;");
E_C("CREATE TABLE `yyd_rating_info` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `realname` varchar(30) NOT NULL,
  `code` int(11) NOT NULL,
  `card_id` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `phone_num` varchar(30) NOT NULL COMMENT '?????',
  `sex` int(2) NOT NULL,
  `marry` int(2) NOT NULL,
  `children` int(2) NOT NULL,
  `income` int(2) NOT NULL,
  `dignity` int(2) NOT NULL COMMENT '????',
  `birthday` varchar(30) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `school` varchar(100) NOT NULL,
  `edu` int(11) NOT NULL,
  `house` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `is_car` int(2) NOT NULL,
  `address` varchar(200) NOT NULL COMMENT '???????',
  `phone` varchar(30) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_rating_info` values('198','1938','1','','0','','','15911111111','2','1','1','0','0','20001010','20090901','南京','4','1','0','0','0','1','南京','','0','','','','');");
E_D("replace into `yyd_rating_info` values('199','1934','1','','0','','','13971684432','1','1','1','0','0','1988-09-27','2009-01-06','武汉大学','3','1','61','62','62','1','武汉光谷国际企业中心','13971684432','0','','','','');");

require("../../inc/footer.php");
?>