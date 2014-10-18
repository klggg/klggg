<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_ucenter_set`;");
E_C("CREATE TABLE `yyd_ucenter_set` (
  `id` int(11) NOT NULL auto_increment,
  `key` varchar(50) NOT NULL,
  `value` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_ucenter_set` values('1','uc_status','1');");
E_D("replace into `yyd_ucenter_set` values('2','uc_dbhost','localhost');");
E_D("replace into `yyd_ucenter_set` values('3','uc_dbuser','root');");
E_D("replace into `yyd_ucenter_set` values('4','uc_dbpw','52jscn');");
E_D("replace into `yyd_ucenter_set` values('5','uc_dbname','52jscn');");
E_D("replace into `yyd_ucenter_set` values('6','uc_charset','gbk');");
E_D("replace into `yyd_ucenter_set` values('7','uc_dbtablepre','pre_ucenter_');");
E_D("replace into `yyd_ucenter_set` values('8','dz_dbtablepre','pre_');");
E_D("replace into `yyd_ucenter_set` values('9','uc_key','D6z1F8ReQ8j141d8G6jev4t0rac2K8b6C2Y7h3bdZeNdr5K2h65cLdI3EaX4cc71');");
E_D("replace into `yyd_ucenter_set` values('10','uc_api','http://demo.52jscn.com/modules/ucenter');");
E_D("replace into `yyd_ucenter_set` values('11','uc_ip','');");
E_D("replace into `yyd_ucenter_set` values('12','uc_appid','2');");

require("../../inc/footer.php");
?>