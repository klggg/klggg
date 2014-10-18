<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_black`;");
E_C("CREATE TABLE `yyd_users_black` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `blackuser` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>