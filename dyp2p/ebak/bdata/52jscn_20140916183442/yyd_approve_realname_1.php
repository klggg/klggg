<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_approve_realname`;");
E_C("CREATE TABLE `yyd_approve_realname` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `realname` varchar(100) NOT NULL,
  `card_id` varchar(100) NOT NULL,
  `card_pic` varchar(100) NOT NULL,
  `card_pic1` varchar(200) NOT NULL,
  `card_pic2` varchar(200) NOT NULL,
  `id5_status` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `type` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_remark` varchar(200) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_id5_userid` int(11) NOT NULL,
  `verify_id5_time` varchar(50) NOT NULL,
  `verify_id5_remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1425 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_approve_realname` values('1398','1935','李国','370321197808032413','','3563','3564','0','1','','男','1','','1383793231','0','','','1383809515','113.134.32.246');");
E_D("replace into `yyd_approve_realname` values('1399','1934','汤天文','421022199004102417','','','','0','1','','男','1','OK','1383861975','0','','','1383861922','60.55.40.6');");
E_D("replace into `yyd_approve_realname` values('1400','1938','刘晓雪','321324199008201223','','','','0','1','','女','1','n','1386228785','0','','','1386144663','222.94.187.146');");
E_D("replace into `yyd_approve_realname` values('1401','1937','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1402','1940','','','','','','0','1','','','1','','1386223736','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1403','1939','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1404','1942','李玉成','500234198710108091','','3572','3573','0','1','','男','1','','1387531273','0','','','1387259979','171.216.224.45');");
E_D("replace into `yyd_approve_realname` values('1405','1943','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1406','1941','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1407','1944','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1408','1946','白斌','452226197610157518','','','','0','1','','男','1','','1393343667','0','','','1393343615','14.127.24.153');");
E_D("replace into `yyd_approve_realname` values('1409','1947','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1410','1950','沈正卿','420381198310116711','','3600','3601','0','1','','男','1','','1393226150','0','','','1393225960','14.156.45.226');");
E_D("replace into `yyd_approve_realname` values('1411','1952','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1412','1953','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1413','1954','文志光','430124197208017310','','','','0','1','','男','1','','1393225489','0','','','1392996017','59.36.84.249');");
E_D("replace into `yyd_approve_realname` values('1414','1956','功夫龙基金','152202197802212081 ','','','','0','1','','男','1','','1393346483','0','','','1393346454','14.127.24.153');");
E_D("replace into `yyd_approve_realname` values('1415','1957','莫友发','433024196512010052','','','','0','0','','男','0','','','0','','','1393401174','121.13.249.10');");
E_D("replace into `yyd_approve_realname` values('1416','1958','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1417','1960','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1418','1966','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1419','1968','','','','','','0','2','','','0','','','1','1393772068','jkjhkj','','');");
E_D("replace into `yyd_approve_realname` values('1420','1970','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1421','1969','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1422','1972','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1423','1971','','','','','','0','0','','','0','','','0','','','','');");
E_D("replace into `yyd_approve_realname` values('1424','1973','','','','','','0','0','','','0','','','0','','','','');");

require("../../inc/footer.php");
?>