<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_spread_setting`;");
E_C("CREATE TABLE `yyd_spread_setting` (
  `id` int(11) NOT NULL auto_increment,
  `admin_userid` int(11) NOT NULL COMMENT '?????????',
  `type` int(2) NOT NULL COMMENT '1???2????3????4???????5????????',
  `month` int(2) NOT NULL COMMENT '?กค?',
  `task` int(11) NOT NULL COMMENT '??????',
  `task_fee` float(11,2) NOT NULL COMMENT '????????',
  `task_first` int(11) NOT NULL COMMENT '??????',
  `task_last` int(11) NOT NULL COMMENT '?????????',
  `addtime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk COMMENT='???????????'");

require("../../inc/footer.php");
?>