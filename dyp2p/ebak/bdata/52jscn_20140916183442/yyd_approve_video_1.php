<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_approve_video`;");
E_C("CREATE TABLE `yyd_approve_video` (
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
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_approve_video` values('171','1946','1','0','','1','1393343748','','1392128132','113.87.124.251');");
E_D("replace into `yyd_approve_video` values('172','1950','0','0','','0','','','1393225995','14.156.45.226');");
E_D("replace into `yyd_approve_video` values('173','1956','1','0','','1','1393346574','','1393346547','14.127.24.153');");

require("../../inc/footer.php");
?>