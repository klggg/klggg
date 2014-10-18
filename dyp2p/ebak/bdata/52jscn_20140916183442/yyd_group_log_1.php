<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_group_log`;");
E_C("CREATE TABLE `yyd_group_log` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `result` varchar(100) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>