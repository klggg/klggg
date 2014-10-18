<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_shenqing`;");
E_C("CREATE TABLE `yyd_borrow_shenqing` (
  `s_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `borrow_period` double(10,2) NOT NULL default '0.00',
  `borrow_style` varchar(100) NOT NULL,
  `account` varchar(50) default '',
  `borrow_type` varchar(100) NOT NULL,
  `borrow_use` varchar(100) NOT NULL,
  `addtime` varchar(50) default NULL,
  `addip` varchar(50) default NULL,
  `status` tinyint(2) unsigned NOT NULL default '0',
  `verify_time` varchar(50) default NULL,
  `verify_remark` varchar(255) default NULL,
  `verify_userid` int(10) unsigned NOT NULL default '0',
  `b_enterprise` varchar(50) default NULL,
  `b_regist` varchar(50) default NULL,
  `b_legal` varchar(50) default NULL,
  `b_card` varchar(50) default NULL,
  `b_tel` varchar(50) default NULL,
  `b_phone` varchar(50) default NULL,
  `b_agent` varchar(50) default NULL,
  `b_address` varchar(50) default NULL,
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>