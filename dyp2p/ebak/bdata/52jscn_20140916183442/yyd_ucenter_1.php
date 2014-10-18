<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_ucenter`;");
E_C("CREATE TABLE `yyd_ucenter` (
  `user_id` int(11) NOT NULL,
  `uc_user_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `yyd_ucenter` values('1948','1301');");
E_D("replace into `yyd_ucenter` values('1949','1302');");

require("../../inc/footer.php");
?>