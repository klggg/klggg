<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_approve_sms`;");
E_C("CREATE TABLE `yyd_approve_sms` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `type` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `credit` int(11) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_remark` varchar(250) NOT NULL,
  `check_time` varchar(30) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1229 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_approve_sms` values('1215','1935','1','','13772038721','0','1','1383794172','','','1383793245','117.22.71.105');");
E_D("replace into `yyd_approve_sms` values('1216','1934','0','','13971684432','0','0','1383862019','用户手机认证通过','','1383861986','60.55.40.6');");
E_D("replace into `yyd_approve_sms` values('1217','1938','1','','15911111111','0','1','1386228961','用户手机认证通过','','1386144766','222.94.187.146');");
E_D("replace into `yyd_approve_sms` values('1218','1942','1','','18723396401','0','1','1387262453','','','1387174761','171.216.224.45');");
E_D("replace into `yyd_approve_sms` values('1219','1944','0','','13910089448','0','0','','','','1387764097','124.65.129.102');");
E_D("replace into `yyd_approve_sms` values('1220','1954','0','','13922956587','0','0','','','','1392995901','59.36.84.249');");
E_D("replace into `yyd_approve_sms` values('1221','1950','1','','13751388765','0','0','1393465089','用户手机认证通过','','1393225976','14.156.45.226');");
E_D("replace into `yyd_approve_sms` values('1222','1946','1','','13725566965','0','1','1393343734','','','1393343707','14.127.24.153');");
E_D("replace into `yyd_approve_sms` values('1223','1956','1','','13888888888','0','1','1393346564','','','1393346535','14.127.24.153');");
E_D("replace into `yyd_approve_sms` values('1224','1962','0','','15990015920','0','0','','','','1393562686','115.197.209.39');");
E_D("replace into `yyd_approve_sms` values('1225','1962','0','','15990015920','0','0','1393565565','用户手机认证通过','','1393564975','115.197.209.39');");
E_D("replace into `yyd_approve_sms` values('1226','1963','1','','15990015920','0','0','1393576490','用户手机认证通过','','1393573414','115.197.209.39');");
E_D("replace into `yyd_approve_sms` values('1227','1966','1','','13588143077','0','0','1393668717','用户手机认证通过','','1393668695','36.250.226.195');");
E_D("replace into `yyd_approve_sms` values('1228','1968','1','','13185559966','0','0','1393769419','用户手机认证通过','','1393769396','220.187.194.108');");

require("../../inc/footer.php");
?>