<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_email`;");
E_C("CREATE TABLE `yyd_users_email` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `send_email` varchar(50) NOT NULL,
  `status` int(2) default NULL,
  `title` varchar(250) default NULL,
  `type` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `msg` text,
  `addtime` varchar(50) default NULL,
  `addip` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>