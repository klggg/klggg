<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_rating_houses`;");
E_C("CREATE TABLE `yyd_rating_houses` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT '???????',
  `status` int(2) NOT NULL COMMENT '?????0????????งต?1????????2???ฆฤ???',
  `name` varchar(100) NOT NULL COMMENT '???????',
  `address` varchar(250) NOT NULL COMMENT '?????',
  `areas` varchar(200) NOT NULL COMMENT '????????',
  `in_year` varchar(100) NOT NULL COMMENT '????????',
  `repay` varchar(100) NOT NULL COMMENT '???????',
  `holder1` varchar(100) NOT NULL COMMENT '?????1',
  `right1` varchar(100) NOT NULL COMMENT '???1',
  `holder2` varchar(100) NOT NULL COMMENT '?????2',
  `right2` varchar(100) NOT NULL COMMENT '???2',
  `load_year` varchar(100) NOT NULL COMMENT '????????',
  `repay_month` varchar(100) NOT NULL COMMENT '??????',
  `balance` varchar(100) NOT NULL COMMENT '????????',
  `bank` varchar(100) NOT NULL COMMENT '????',
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id_3` (`user_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=gbk COMMENT='????????'");
E_D("replace into `yyd_rating_houses` values('236','1935','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('237','1934','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('238','1940','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('239','1942','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('240','1941','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('241','1946','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('242','1954','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('243','1956','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('244','1960','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('245','1938','0','','','','','','','','','','','','','','0','','');");
E_D("replace into `yyd_rating_houses` values('246','1970','0','','','','','','','','','','','','','','0','','');");

require("../../inc/footer.php");
?>