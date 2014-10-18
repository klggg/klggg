<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_spread_user`;");
E_C("CREATE TABLE `yyd_spread_user` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT '?????',
  `spread_userid` int(11) NOT NULL COMMENT '??????',
  `type` int(2) NOT NULL COMMENT '1???2????',
  `style` int(2) NOT NULL COMMENT '1????2???',
  `alone_status` int(2) NOT NULL COMMENT '1??????????',
  `addtime` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `spread_userid` (`spread_userid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>