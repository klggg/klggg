<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_examines`;");
E_C("CREATE TABLE `yyd_examines` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT '???????',
  `code` varchar(100) NOT NULL COMMENT '???',
  `type` varchar(200) NOT NULL COMMENT '????',
  `article_id` int(11) NOT NULL COMMENT '????id',
  `result` varchar(100) NOT NULL COMMENT '????',
  `verify_userid` int(11) NOT NULL COMMENT '??????',
  `remark` varchar(200) NOT NULL COMMENT '???',
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3453 DEFAULT CHARSET=gbk COMMENT='??????'");
E_D("replace into `yyd_examines` values('3394','1','approve','realname','1935','1','1','','1383793231','117.22.71.105');");
E_D("replace into `yyd_examines` values('3395','1935','approve','sms','1215','1','1','','1383794172','117.22.71.105');");
E_D("replace into `yyd_examines` values('3396','1','approve','realname','1934','1','1','OK','1383861975','60.55.40.6');");
E_D("replace into `yyd_examines` values('3397','1934','approve','sms','1216','1','0','用户手机认证通过','1383862019','60.55.40.6');");
E_D("replace into `yyd_examines` values('3398','1','approve','realname','1938','1','1','ok','1386144706','222.94.187.146');");
E_D("replace into `yyd_examines` values('3399','1938','approve','sms','1217','1','0','用户手机认证通过','1386144800','222.94.187.146');");
E_D("replace into `yyd_examines` values('3400','1','approve','realname','1938','1','1','ok','1386146613','222.94.187.146');");
E_D("replace into `yyd_examines` values('3401','1','approve','realname','1940','1','1','','1386223736','117.62.164.25');");
E_D("replace into `yyd_examines` values('3402','1','approve','realname','1938','2','1','ok','1386223768','117.62.164.25');");
E_D("replace into `yyd_examines` values('3403','1','approve','realname','1938','1','1','ok','1386224076','117.62.164.25');");
E_D("replace into `yyd_examines` values('3404','1','approve','realname','1938','2','1','n','1386225081','117.62.164.25');");
E_D("replace into `yyd_examines` values('3405','1','approve','realname','1938','1','1','n','1386228785','117.62.164.25');");
E_D("replace into `yyd_examines` values('3406','1938','approve','sms','1217','1','1','用户手机认证通过','1386228961','117.62.164.25');");
E_D("replace into `yyd_examines` values('3407','1','approve','realname','1942','1','1','','1387260464','171.216.224.45');");
E_D("replace into `yyd_examines` values('3408','1942','approve','sms','1218','1','1','','1387262453','171.216.224.45');");
E_D("replace into `yyd_examines` values('3409','1','approve','realname','1942','0','1','','1387529387','171.216.224.66');");
E_D("replace into `yyd_examines` values('3410','1','approve','realname','1942','1','1','','1387531273','171.216.224.66');");
E_D("replace into `yyd_examines` values('3411','0','attestations','attestation','1022','Array','1','Array','1387531465','171.216.224.66');");
E_D("replace into `yyd_examines` values('3412','0','attestations','attestation','1021','Array','1','Array','1387531476','171.216.224.66');");
E_D("replace into `yyd_examines` values('3413','0','attestations','attestation','1020','Array','1','Array','1387531481','171.216.224.66');");
E_D("replace into `yyd_examines` values('3414','0','attestations','attestation','1019','Array','1','Array','1387531490','171.216.224.66');");
E_D("replace into `yyd_examines` values('3415','0','attestations','attestation','1018','Array','1','Array','1387531497','171.216.224.66');");
E_D("replace into `yyd_examines` values('3416','0','attestations','attestation','1017','Array','1','Array','1387531503','171.216.224.66');");
E_D("replace into `yyd_examines` values('3417','1934','approve','flow','1934','1','1','ok','1390036645','124.156.66.241');");
E_D("replace into `yyd_examines` values('3418','0','attestations','attestation','1028','Array','1','Array','1390036798','124.156.66.241');");
E_D("replace into `yyd_examines` values('3419','0','attestations','attestation','1027','Array','1','Array','1390036803','124.156.66.241');");
E_D("replace into `yyd_examines` values('3420','0','attestations','attestation','1026','Array','1','Array','1390036807','124.156.66.241');");
E_D("replace into `yyd_examines` values('3421','0','attestations','attestation','1025','Array','1','Array','1390036811','124.156.66.241');");
E_D("replace into `yyd_examines` values('3422','0','attestations','attestation','1024','Array','1','Array','1390036814','124.156.66.241');");
E_D("replace into `yyd_examines` values('3423','0','attestations','attestation','1023','Array','1','Array','1390036818','124.156.66.241');");
E_D("replace into `yyd_examines` values('3424','0','attestations','attestation','1029','Array','1','Array','1392129202','113.87.124.251');");
E_D("replace into `yyd_examines` values('3425','1','approve','realname','1954','1','1','','1393225489','14.156.45.226');");
E_D("replace into `yyd_examines` values('3426','1','approve','realname','1950','1','1','','1393226150','14.156.45.226');");
E_D("replace into `yyd_examines` values('3427','1','approve','realname','1946','0','1','','1393343646','14.127.24.153');");
E_D("replace into `yyd_examines` values('3428','1','approve','realname','1946','1','1','','1393343667','14.127.24.153');");
E_D("replace into `yyd_examines` values('3429','1946','approve','sms','1222','1','1','','1393343734','14.127.24.153');");
E_D("replace into `yyd_examines` values('3430','1946','approve','video','1946','1','1','','1393343748','14.127.24.153');");
E_D("replace into `yyd_examines` values('3431','0','attestations','attestation','1034','Array','1','Array','1393345038','14.127.24.153');");
E_D("replace into `yyd_examines` values('3432','0','attestations','attestation','1033','Array','1','Array','1393345049','14.127.24.153');");
E_D("replace into `yyd_examines` values('3433','0','attestations','attestation','1032','Array','1','Array','1393345058','14.127.24.153');");
E_D("replace into `yyd_examines` values('3434','0','attestations','attestation','1031','Array','1','Array','1393345069','14.127.24.153');");
E_D("replace into `yyd_examines` values('3435','0','attestations','attestation','1030','Array','1','Array','1393345076','14.127.24.153');");
E_D("replace into `yyd_examines` values('3436','1','approve','realname','1956','1','1','','1393346483','14.127.24.153');");
E_D("replace into `yyd_examines` values('3437','1956','approve','sms','1223','1','1','','1393346564','14.127.24.153');");
E_D("replace into `yyd_examines` values('3438','1956','approve','video','1956','1','1','','1393346574','14.127.24.153');");
E_D("replace into `yyd_examines` values('3439','0','attestations','attestation','1035','Array','1','Array','1393346738','14.127.24.153');");
E_D("replace into `yyd_examines` values('3440','0','attestations','attestation','1040','Array','1','Array','1393346744','14.127.24.153');");
E_D("replace into `yyd_examines` values('3441','0','attestations','attestation','1039','Array','1','Array','1393346751','14.127.24.153');");
E_D("replace into `yyd_examines` values('3442','0','attestations','attestation','1038','Array','1','Array','1393346758','14.127.24.153');");
E_D("replace into `yyd_examines` values('3443','0','attestations','attestation','1037','Array','1','Array','1393346767','14.127.24.153');");
E_D("replace into `yyd_examines` values('3444','0','attestations','attestation','1036','Array','1','Array','1393346782','14.127.24.153');");
E_D("replace into `yyd_examines` values('3445','1950','approve','sms','1221','1','0','用户手机认证通过','1393465089','14.221.1.52');");
E_D("replace into `yyd_examines` values('3446','1962','approve','sms','1225','1','0','用户手机认证通过','1393565565','115.197.209.39');");
E_D("replace into `yyd_examines` values('3447','1963','approve','sms','1226','1','0','用户手机认证通过','1393576490','115.197.209.39');");
E_D("replace into `yyd_examines` values('3448','1966','approve','sms','1227','1','0','用户手机认证通过','1393668717','36.250.226.195');");
E_D("replace into `yyd_examines` values('3449','0','attestations','attestation','1040','Array','1','Array','1393723746','121.15.220.150');");
E_D("replace into `yyd_examines` values('3450','0','attestations','attestation','1040','Array','1','Array','1393723751','121.15.220.150');");
E_D("replace into `yyd_examines` values('3451','1968','approve','sms','1228','1','0','用户手机认证通过','1393769419','220.187.194.108');");
E_D("replace into `yyd_examines` values('3452','1968','approve','realname','1968','','0','','1393772068','220.187.194.108');");

require("../../inc/footer.php");
?>