<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_change`;");
E_C("CREATE TABLE `yyd_borrow_change` (
  `id` int(11) NOT NULL auto_increment,
  `tender_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account` decimal(11,2) NOT NULL,
  `valid_day` int(10) NOT NULL COMMENT '??งน??',
  `remark` varchar(200) NOT NULL,
  `change_nid` varchar(30) NOT NULL COMMENT '????????',
  `change_time` varchar(50) NOT NULL COMMENT '??????',
  `cancel_remark` varchar(200) NOT NULL,
  `cancel_time` varchar(50) NOT NULL,
  `cancel_status` int(2) NOT NULL,
  `web_account` decimal(11,2) NOT NULL,
  `web_time` varchar(50) NOT NULL,
  `web_status` varchar(2) NOT NULL,
  `buy_userid` int(11) NOT NULL,
  `buy_time` varchar(50) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_borrow_change` values('7','5496','1','1937','1000.00','0','าชวฎ','20131200001','','','','0','0.00','','','1934','1387352792','1387352092','124.156.66.130');");

require("../../inc/footer.php");
?>