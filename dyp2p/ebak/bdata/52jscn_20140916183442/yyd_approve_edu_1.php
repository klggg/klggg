<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_approve_edu`;");
E_C("CREATE TABLE `yyd_approve_edu` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `id5_status` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `graduate` varchar(10) NOT NULL COMMENT '????งต',
  `speciality` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `enrol_date` varchar(50) NOT NULL,
  `graduate_date` varchar(50) NOT NULL,
  `edu_pic` int(11) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_id5_userid` int(11) NOT NULL,
  `verify_id5_time` varchar(50) NOT NULL,
  `verify_id5_remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=583 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_approve_edu` values('579','1935','0','0','','','','','','0','0','','','0','','','','');");
E_D("replace into `yyd_approve_edu` values('580','1934','0','0','','','','','','0','0','','','0','','','','');");
E_D("replace into `yyd_approve_edu` values('581','1938','0','0','','','','','','0','0','','','0','','','','');");
E_D("replace into `yyd_approve_edu` values('582','1942','0','0','','','','','','0','0','','','0','','','','');");

require("../../inc/footer.php");
?>