<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_visit`;");
E_C("CREATE TABLE `yyd_users_visit` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `visit_userid` int(11) default NULL,
  `addip` varchar(30) default NULL,
  `addtime` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>