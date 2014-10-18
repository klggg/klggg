<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_approve_flow`;");
E_C("CREATE TABLE `yyd_approve_flow` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `credit` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_remark` varchar(250) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=170 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_approve_flow` values('167','1942','0','0','','0','','','1387522635','171.216.224.66');");
E_D("replace into `yyd_approve_flow` values('168','1934','1','0','','1','1390036645','ok','1390036627','124.156.66.241');");
E_D("replace into `yyd_approve_flow` values('169','1950','0','0','','0','','','1393465020','14.221.1.52');");

require("../../inc/footer.php");
?>