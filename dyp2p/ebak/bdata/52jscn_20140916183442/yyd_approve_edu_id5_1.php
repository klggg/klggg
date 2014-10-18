<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_approve_edu_id5`;");
E_C("CREATE TABLE `yyd_approve_edu_id5` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `graduate` varchar(100) NOT NULL COMMENT '????งต',
  `speciality` varchar(100) NOT NULL COMMENT '??',
  `degree` varchar(50) NOT NULL COMMENT '???',
  `enrol_date` varchar(50) NOT NULL COMMENT '???????',
  `graduate_date` int(50) NOT NULL COMMENT '???????',
  `result` varchar(100) NOT NULL COMMENT '???????',
  `style` varchar(50) NOT NULL COMMENT '???????',
  `value` varchar(200) NOT NULL,
  `message_status` int(2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `photo` text NOT NULL COMMENT '???',
  `realname` varchar(50) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `contents` text NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='id5???'");

require("../../inc/footer.php");
?>