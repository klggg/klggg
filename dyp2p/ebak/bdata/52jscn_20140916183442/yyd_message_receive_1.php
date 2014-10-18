<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_message_receive`;");
E_C("CREATE TABLE `yyd_message_receive` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0' COMMENT '??????',
  `status` int(11) NOT NULL COMMENT '??',
  `send_id` int(11) NOT NULL,
  `send_userid` int(11) NOT NULL default '0' COMMENT '???????',
  `type` varchar(50) NOT NULL COMMENT '????',
  `receive_id` longtext NOT NULL COMMENT '?????????id',
  `receive_yes` longtext NOT NULL COMMENT '?????id',
  `receive_value` longtext NOT NULL,
  `name` varchar(255) NOT NULL default '' COMMENT '????',
  `contents` text NOT NULL COMMENT '????',
  `addtime` varchar(50) NOT NULL default '',
  `addip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>