<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_rating_job`;");
E_C("CREATE TABLE `yyd_rating_job` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT '???????',
  `type` varchar(30) NOT NULL,
  `status` int(2) NOT NULL COMMENT '?????0????????У?1????????2???δ???',
  `name` varchar(100) NOT NULL COMMENT '???????',
  `industry` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL COMMENT '????',
  `office` varchar(200) NOT NULL COMMENT '?λ',
  `address` varchar(100) NOT NULL,
  `peoples` varchar(30) NOT NULL COMMENT '????',
  `worktime1` varchar(100) NOT NULL COMMENT '??????',
  `tel` varchar(30) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=gbk COMMENT='????????'");
E_D("replace into `yyd_rating_job` values('118','1956','民营','1','东莞市功夫龙影视传媒有限公司','影视业','','CEO','东莞市松山湖创意生活城B69','200','2010-02-05','0769-38832388','0','','');");

require("../../inc/footer.php");
?>