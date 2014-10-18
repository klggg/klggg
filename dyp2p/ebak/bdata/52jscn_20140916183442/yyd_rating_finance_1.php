<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_rating_finance`;");
E_C("CREATE TABLE `yyd_rating_finance` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `type` int(11) NOT NULL,
  `use_type` int(2) NOT NULL COMMENT '1?????2????',
  `account` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `other` varchar(200) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=310 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_rating_finance` values('305','1942','1','1','1','3500','上班工资','没有','0','','','','');");
E_D("replace into `yyd_rating_finance` values('306','1942','1','2','1','100000000000000000000000000000','年终奖金','1215645464','0','','','','');");
E_D("replace into `yyd_rating_finance` values('307','1934','1','1','1','1000','工资','','0','','','','');");
E_D("replace into `yyd_rating_finance` values('308','1934','1','1','1','1000','工资','','0','','','','');");
E_D("replace into `yyd_rating_finance` values('309','1934','1','1','1','3200023','2332','3223','0','','','','');");

require("../../inc/footer.php");
?>