<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_remind_user`;");
E_C("CREATE TABLE `yyd_remind_user` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `user_id` smallint(11) unsigned NOT NULL,
  `remind` varchar(200) NOT NULL,
  `remind_id` smallint(5) unsigned NOT NULL,
  `message` smallint(2) unsigned NOT NULL default '0' COMMENT '?????',
  `email` smallint(2) unsigned NOT NULL default '0' COMMENT '????',
  `phone` smallint(2) unsigned NOT NULL default '0' COMMENT '???',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>