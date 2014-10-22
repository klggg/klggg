<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_extend`;");
E_C("CREATE TABLE `fanwe_user_extend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_extend` values('85','1','1','大专');");
E_D("replace into `fanwe_user_extend` values('86','2','1','2004');");
E_D("replace into `fanwe_user_extend` values('87','3','1','');");
E_D("replace into `fanwe_user_extend` values('88','1','2','zhuwenji');");
E_D("replace into `fanwe_user_extend` values('89','1','3','');");
E_D("replace into `fanwe_user_extend` values('90','1','4','wodeweibo');");
E_D("replace into `fanwe_user_extend` values('91','1','5','');");
E_D("replace into `fanwe_user_extend` values('92','1','6','');");
E_D("replace into `fanwe_user_extend` values('93','1','7','');");
E_D("replace into `fanwe_user_extend` values('94','1','8','');");
E_D("replace into `fanwe_user_extend` values('95','1','9','');");
E_D("replace into `fanwe_user_extend` values('96','1','10','');");
E_D("replace into `fanwe_user_extend` values('97','1','11','');");
E_D("replace into `fanwe_user_extend` values('98','1','12','');");
E_D("replace into `fanwe_user_extend` values('99','1','13','');");
E_D("replace into `fanwe_user_extend` values('100','1','14','');");
E_D("replace into `fanwe_user_extend` values('101','1','15','');");
E_D("replace into `fanwe_user_extend` values('102','1','16','');");
E_D("replace into `fanwe_user_extend` values('103','1','17','');");
E_D("replace into `fanwe_user_extend` values('104','1','18','');");
E_D("replace into `fanwe_user_extend` values('105','1','19','');");
E_D("replace into `fanwe_user_extend` values('106','1','20','');");
E_D("replace into `fanwe_user_extend` values('107','1','21','52076644');");
E_D("replace into `fanwe_user_extend` values('108','1','22','');");

require("../../inc/footer.php");
?>