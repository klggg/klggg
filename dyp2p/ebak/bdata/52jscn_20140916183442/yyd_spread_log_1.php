<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_spread_log`;");
E_C("CREATE TABLE `yyd_spread_log` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `spread_userid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `style` int(2) NOT NULL,
  `start_time` varchar(30) NOT NULL,
  `end_time` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=gbk COMMENT='??????'");

require("../../inc/footer.php");
?>