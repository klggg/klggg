<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_approve_id5`;");
E_C("CREATE TABLE `yyd_approve_id5` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `policeadd` varchar(100) NOT NULL,
  `checkphoto` text NOT NULL,
  `idname` varchar(50) NOT NULL,
  `value` varchar(200) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `message_status` int(2) NOT NULL,
  `identitycard` varchar(200) NOT NULL,
  `compstatus` int(2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `contents` text NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk COMMENT='id5???'");

require("../../inc/footer.php");
?>