<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_rebut`;");
E_C("CREATE TABLE `yyd_users_rebut` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `contents` text NOT NULL,
  `type_id` int(2) NOT NULL,
  `rebut_userid` int(11) NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>