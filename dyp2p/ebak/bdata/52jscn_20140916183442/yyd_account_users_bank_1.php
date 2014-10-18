<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_account_users_bank`;");
E_C("CREATE TABLE `yyd_account_users_bank` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) default '0' COMMENT '???ID',
  `status` int(2) NOT NULL,
  `account` varchar(100) default NULL COMMENT '???',
  `bank` varchar(50) default NULL COMMENT '????????',
  `branch` varchar(100) default NULL COMMENT '???',
  `province` int(5) default '0' COMMENT '???',
  `city` int(5) default '0' COMMENT '????',
  `area` int(5) default '0' COMMENT '??',
  `addtime` varchar(11) default NULL,
  `addip` varchar(15) default NULL,
  `update_time` varchar(50) NOT NULL,
  `update_ip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=728 DEFAULT CHARSET=gbk COMMENT='???????'");
E_D("replace into `yyd_account_users_bank` values('711','1','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('712','1937','0','','1','','1905','1906','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('713','1938','0','111111','11','','924','925','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('714','1934','0','323434344343434312','4','农业银行','297','353','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('715','1942','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('716','1943','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('717','1941','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('718','1946','0','6225887825339027','5','深圳分行深南中路支行','2184','2211','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('719','1947','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('720','1950','0','6222082010002721912','3','中国工商银行东莞元美支行','2184','2325','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('721','1952','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('722','1958','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('723','1960','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('724','1968','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('725','1970','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('726','1972','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");
E_D("replace into `yyd_account_users_bank` values('727','1973','0',NULL,NULL,NULL,'0','0','0',NULL,NULL,'','');");

require("../../inc/footer.php");
?>