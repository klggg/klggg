<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_log`;");
E_C("CREATE TABLE `fanwe_user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin_id` int(11) NOT NULL,
  `log_user_id` int(11) NOT NULL,
  `money` double(20,4) NOT NULL,
  `score` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `quota` double(20,0) NOT NULL,
  `lock_money` double(20,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_log` values('1','信用报告','1381697933','1','0','0.0000','0','10','0','0','8');");
E_D("replace into `fanwe_user_log` values('2','工作认证','1381697941','1','0','0.0000','0','10','0','0','8');");
E_D("replace into `fanwe_user_log` values('3','身份认证','1381697949','1','0','0.0000','0','10','0','0','8');");
E_D("replace into `fanwe_user_log` values('4','收入认证','1381697955','1','0','0.0000','0','10','0','0','8');");
E_D("replace into `fanwe_user_log` values('5','管理员编辑帐户','1381699256','1','0','1000.0000','0','10','10','0','3');");
E_D("replace into `fanwe_user_log` values('6','提现申请','1381704241','1','0','-501.0000','0','0','0','501','3');");
E_D("replace into `fanwe_user_log` values('7','提现成功','1381704268','1','0','0.0000','0','0','0','-501','3');");
E_D("replace into `fanwe_user_log` values('8','提现申请','1381704388','1','0','-101.0000','0','0','0','101','3');");
E_D("replace into `fanwe_user_log` values('9','工作认证','1381951306','1','0','0.0000','0','10','0','0','12');");
E_D("replace into `fanwe_user_log` values('10','管理员编辑帐户','1382295803','1','0','2000.0000','0','0','0','0','21');");
E_D("replace into `fanwe_user_log` values('11','管理员编辑帐户','1382295975','1','0','2000.0000','0','0','0','0','20');");
E_D("replace into `fanwe_user_log` values('12','身份认证','1389511635','1','0','0.0000','0','10','0','0','22');");
E_D("replace into `fanwe_user_log` values('13','工作认证','1389511640','1','0','0.0000','0','10','0','0','22');");
E_D("replace into `fanwe_user_log` values('14','信用报告','1389511645','1','0','0.0000','0','10','0','0','22');");
E_D("replace into `fanwe_user_log` values('15','收入认证','1389511649','1','0','0.0000','0','10','0','0','22');");
E_D("replace into `fanwe_user_log` values('16','房产认证','1389511744','1','0','0.0000','0','3','0','0','22');");
E_D("replace into `fanwe_user_log` values('17','居住地证明','1389511755','1','0','0.0000','0','2','0','0','22');");
E_D("replace into `fanwe_user_log` values('18','管理员编辑帐户','1403917049','1','0','2222.0000','0','222','222','0','21');");
E_D("replace into `fanwe_user_log` values('19','身份认证','1403917239','1','0','0.0000','0','10','0','0','21');");
E_D("replace into `fanwe_user_log` values('20','工作认证','1403917248','1','0','0.0000','0','10','0','0','21');");
E_D("replace into `fanwe_user_log` values('21','管理员编辑帐户','1403917339','1','0','0.0000','0','0','2222222222','0','20');");
E_D("replace into `fanwe_user_log` values('22','管理员编辑帐户','1403917377','1','0','2000000.0000','0','2000000','2000000','0','21');");

require("../../inc/footer.php");
?>