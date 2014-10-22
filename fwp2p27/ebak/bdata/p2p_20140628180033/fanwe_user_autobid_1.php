<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_autobid`;");
E_C("CREATE TABLE `fanwe_user_autobid` (
  `user_id` int(11) NOT NULL,
  `fixed_amount` double NOT NULL,
  `min_rate` double NOT NULL,
  `max_rate` double NOT NULL,
  `min_period` int(11) NOT NULL,
  `max_period` int(11) NOT NULL,
  `min_level` int(11) NOT NULL,
  `max_level` int(11) NOT NULL,
  `retain_amount` double NOT NULL,
  `is_effect` tinyint(4) NOT NULL,
  `last_bid_time` int(11) NOT NULL COMMENT '最后一次投标时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_autobid` values('1','1100','15','25','3','36','5','7','0','1','1362944420');");
E_D("replace into `fanwe_user_autobid` values('20','2000','10','24','3','36','1','7','200','1','0');");

require("../../inc/footer.php");
?>