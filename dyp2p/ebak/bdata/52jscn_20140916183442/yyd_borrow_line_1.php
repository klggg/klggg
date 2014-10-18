<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_line`;");
E_C("CREATE TABLE `yyd_borrow_line` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `site_id` int(11) default '0' COMMENT '???????',
  `user_id` int(11) default '0' COMMENT '???????',
  `name` varchar(255) default NULL COMMENT '????',
  `status` int(2) default '0' COMMENT '??',
  `order` int(11) default '0' COMMENT '????',
  `hits` int(11) default '0' COMMENT '????????',
  `litpic` varchar(255) default NULL COMMENT '?????',
  `flag` varchar(50) default NULL COMMENT '????',
  `type` int(2) default '0' COMMENT '????????',
  `borrow_use` int(10) default '0' COMMENT '???????',
  `borrow_qixian` int(10) default '0' COMMENT '????????',
  `province` int(10) default '0' COMMENT '???',
  `city` int(10) default '0' COMMENT '????',
  `area` int(10) default '0' COMMENT '????',
  `account` varchar(11) default NULL COMMENT '????????',
  `content` text COMMENT '??????',
  `pawn` varchar(2) default NULL COMMENT '??????',
  `tel` varchar(15) default NULL COMMENT '?ดย',
  `sex` varchar(2) default NULL COMMENT '???',
  `xing` varchar(11) default NULL COMMENT '??',
  `verify_user` int(11) default NULL COMMENT '??????',
  `verify_time` varchar(50) default NULL COMMENT '???????',
  `verify_remark` varchar(255) default NULL,
  `addtime` varchar(50) default NULL,
  `addip` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>