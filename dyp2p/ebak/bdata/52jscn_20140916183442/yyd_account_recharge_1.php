<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_account_recharge`;");
E_C("CREATE TABLE `yyd_account_recharge` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `nid` varchar(32) default NULL COMMENT '??????',
  `user_id` int(11) default '0' COMMENT '???ID',
  `status` int(2) default '0' COMMENT '??',
  `money` decimal(10,2) default '0.00' COMMENT '????',
  `fee` decimal(11,2) NOT NULL COMMENT '????',
  `balance` decimal(11,2) NOT NULL COMMENT '??????????',
  `payment` varchar(100) default NULL COMMENT '????????',
  `return` text COMMENT '????????',
  `type` varchar(10) default '0' COMMENT '????',
  `remark` varchar(250) default '0' COMMENT '???',
  `verify_userid` int(11) default '0' COMMENT '??????',
  `verify_time` varchar(11) default NULL COMMENT '???????',
  `verify_remark` varchar(250) default '' COMMENT '??????',
  `addtime` varchar(11) default NULL,
  `addip` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nid_2` (`nid`),
  KEY `user_id` (`user_id`),
  KEY `verify_userid` (`verify_userid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=5971 DEFAULT CHARSET=gbk COMMENT='??????'");
E_D("replace into `yyd_account_recharge` values('5932','38470050419348785','1934','1','1000.00','2.00','1002.00','19',NULL,'2','5444444444444','1','1383811030','ok','1383810915','113.134.32.246');");
E_D("replace into `yyd_account_recharge` values('5933','29700050419349070','1934','1','50000.00','100.00','50100.00','19',NULL,'2','3222222232323223','1','1383811039','ok<br />\r\n','1383810982','113.134.32.246');");
E_D("replace into `yyd_account_recharge` values('5934','18530050419356874','1935','1','20000.00','40.00','20040.00','19',NULL,'2','555555555555555','1','1383812664','OK','1383812591','113.134.32.246');");
E_D("replace into `yyd_account_recharge` values('5935','94600050419348251','1934','1','2000.00','4.00','2004.00','19',NULL,'2','2111111111','1','1393771383','mnbmnb','1383922289','60.55.40.6');");
E_D("replace into `yyd_account_recharge` values('5936','19371386144597137','1937','1','100.00','0.00','100.00','0',NULL,'0','测试','1','1386146068','ok','1386144597','222.94.187.146');");
E_D("replace into `yyd_account_recharge` values('5937','19381386145281384','1938','1','100000.00','0.00','100000.00','0',NULL,'0','','1','1386145561','ceshi','1386145281','222.94.187.146');");
E_D("replace into `yyd_account_recharge` values('5938','19381386145502473','1938','2','10000.00','0.00','10000.00','0',NULL,'0','ok','1','1386145586','no','1386145502','222.94.187.146');");
E_D("replace into `yyd_account_recharge` values('5939','19401386148047870','1940','1','1000000.00','0.00','1000000.00','0',NULL,'0','ceshi','1','1386148068','ok','1386148047','222.94.187.146');");
E_D("replace into `yyd_account_recharge` values('5940','19401386161337166','1940','1','10000.00','0.00','10000.00','0',NULL,'0','','1','1386161367','ok','1386161337','121.229.137.228');");
E_D("replace into `yyd_account_recharge` values('5941','19381386206795723','1938','1','50.00','0.00','50.00','0',NULL,'0','','1','1386206823','ok','1386206795','180.110.188.178');");
E_D("replace into `yyd_account_recharge` values('5942','95680050419382891','1938','2','1000.00','0.00','1000.00','22',NULL,'1','在线充值','0',NULL,'','1386313122','121.225.224.138');");
E_D("replace into `yyd_account_recharge` values('5943','33040050419449474','1944','2','10000.00','0.00','10000.00','22',NULL,'1','在线充值','0',NULL,'','1387764475','124.65.129.102');");
E_D("replace into `yyd_account_recharge` values('5944','55210050419387007','1938','1','100000.00','200.00','100200.00','19',NULL,'2','2111111111111','1','1390072649','2','1390072632','124.156.66.241');");
E_D("replace into `yyd_account_recharge` values('5945','76060050419469183','1946','1','1.00','0.00','1.00','23','充值成功','1','在线充值','0','1392832229','成功充值','1392832099','14.153.26.101');");
E_D("replace into `yyd_account_recharge` values('5946','41080050419465896','1946','2','1.00','0.00','1.00','23',NULL,'1','在线充值','0',NULL,'','1392832735','14.153.26.101');");
E_D("replace into `yyd_account_recharge` values('5947','85970050419347281','1934','2','1.00','0.00','1.00','23',NULL,'1','在线充值','0',NULL,'','1392834055','183.92.240.250');");
E_D("replace into `yyd_account_recharge` values('5948','50490050419506932','1950','2','10.00','0.00','10.00','23',NULL,'1','在线充值','0',NULL,'','1392859702','14.156.41.252');");
E_D("replace into `yyd_account_recharge` values('5949','89010050419506139','1950','2','10.00','0.00','10.00','23',NULL,'1','在线充值','0',NULL,'','1392859884','14.156.41.252');");
E_D("replace into `yyd_account_recharge` values('5950','70570050419505558','1950','2','100.00','0.00','100.00','23',NULL,'1','在线充值','0',NULL,'','1392953156','14.221.2.37');");
E_D("replace into `yyd_account_recharge` values('5951','77680050419502599','1950','1','100.00','0.00','100.00','23','充值成功','1','在线充值','0','1392953705','成功充值','1392953640','14.221.2.37');");
E_D("replace into `yyd_account_recharge` values('5952','76280050419501785','1950','2','10000.00','0.00','10000.00','23',NULL,'1','在线充值','0',NULL,'','1393223671','14.156.45.226');");
E_D("replace into `yyd_account_recharge` values('5953','62230050419504104','1950','2','100.00','0.00','100.00','23',NULL,'1','在线充值','0',NULL,'','1393396614','121.13.249.10');");
E_D("replace into `yyd_account_recharge` values('5954','44610050419573274','1957','2','10000.00','0.00','10000.00','23',NULL,'1','在线充值','0',NULL,'','1393397263','121.13.249.10');");
E_D("replace into `yyd_account_recharge` values('5955','87480050419347153','1934','2','1.00','0.00','1.00','23',NULL,'1','在线充值','0',NULL,'','1393497431','110.114.125.242');");
E_D("replace into `yyd_account_recharge` values('5956','75390050419346148','1934','2','1.00','0.00','1.00','24',NULL,'1','在线充值','0',NULL,'','1393497651','110.114.125.242');");
E_D("replace into `yyd_account_recharge` values('5957','71120050419344906','1934','2','1.00','0.00','1.00','24',NULL,'1','在线充值','0',NULL,'','1393498140','110.114.125.242');");
E_D("replace into `yyd_account_recharge` values('5958','80020050419346279','1934','2','0.01','0.00','0.01','24',NULL,'1','在线充值','0',NULL,'','1393498285','110.114.125.242');");
E_D("replace into `yyd_account_recharge` values('5959','74140050419346679','1934','2','0.01','0.00','0.01','24',NULL,'1','在线充值','0',NULL,'','1393498392','110.114.125.242');");
E_D("replace into `yyd_account_recharge` values('5960','51400050419343140','1934','1','0.01','0.00','0.01','24','充值成功','1','在线充值','0','1393498815','成功充值','1393498750','110.114.125.242');");
E_D("replace into `yyd_account_recharge` values('5961','38670050419629815','1962','2','10.00','0.00','10.00','25',NULL,'1','在线充值','0',NULL,'','1393560483','115.197.209.39');");
E_D("replace into `yyd_account_recharge` values('5962','32860050419627558','1962','2','10.00','0.00','10.00','25',NULL,'1','在线充值','0',NULL,'','1393560521','115.197.209.39');");
E_D("replace into `yyd_account_recharge` values('5963','17150050419621689','1962','2','10.00','0.00','10.00','25',NULL,'1','在线充值','0',NULL,'','1393560560','115.197.209.39');");
E_D("replace into `yyd_account_recharge` values('5964','59360050419625133','1962','2','1000.00','0.00','1000.00','25',NULL,'1','在线充值','0',NULL,'','1393560702','115.197.209.39');");
E_D("replace into `yyd_account_recharge` values('5965','19500050419627398','1962','2','1000.00','0.00','1000.00','25',NULL,'1','在线充值','0',NULL,'','1393560751','115.197.209.39');");
E_D("replace into `yyd_account_recharge` values('5966','88200050419628417','1962','2','1000.00','0.00','1000.00','25',NULL,'1','在线充值','0',NULL,'','1393560772','115.197.209.39');");
E_D("replace into `yyd_account_recharge` values('5967','44950050419683048','1968','2','10000.00','0.00','10000.00','25',NULL,'1','在线充值','0',NULL,'','1393770106','220.187.194.108');");
E_D("replace into `yyd_account_recharge` values('5968','65910050419684283','1968','2','10000.00','0.00','10000.00','24',NULL,'1','在线充值','0',NULL,'','1393770155','220.187.194.108');");
E_D("replace into `yyd_account_recharge` values('5969','90760050419691785','1969','2','110.00','0.00','110.00','24',NULL,'1','在线充值','0',NULL,'','1393906683','115.199.58.216');");
E_D("replace into `yyd_account_recharge` values('5970','24580050419704905','1970','1','100000.00','200.00','100200.00','17',NULL,'2','123456','1','1393913856','test','1393913814','222.178.221.94');");

require("../../inc/footer.php");
?>