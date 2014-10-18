<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_type`;");
E_C("CREATE TABLE `yyd_users_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `litpic` varchar(100) NOT NULL,
  `checked` int(2) NOT NULL COMMENT '??????????',
  `order` int(11) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_users_type` values('1','普通用户','common','普通用户','','0','10','1376101802','127.0.0.1');");
E_D("replace into `yyd_users_type` values('2','中级用户','middle','中级用户','','1','10','1376101802','127.0.0.1');");

require("../../inc/footer.php");
?>