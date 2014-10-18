<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_autolog`;");
E_C("CREATE TABLE `yyd_borrow_autolog` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `account` decimal(11,2) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  `remark` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2199 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>