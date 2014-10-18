<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_vouch_repay`;");
E_C("CREATE TABLE `yyd_borrow_vouch_repay` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `status` int(2) default '0',
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `order` int(2) default NULL,
  `repay_time` varchar(50) default NULL COMMENT '??????????',
  `repay_yestime` varchar(50) default NULL COMMENT '??????????',
  `repay_account` varchar(50) default '0' COMMENT '???????',
  `repay_yesaccount` varchar(50) default '0' COMMENT '???????',
  `addtime` varchar(50) default NULL,
  `addip` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>