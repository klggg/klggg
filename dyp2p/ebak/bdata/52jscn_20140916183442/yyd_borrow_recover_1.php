<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_recover`;");
E_C("CREATE TABLE `yyd_borrow_recover` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `site_id` int(11) default '0' COMMENT '???????',
  `status` int(2) default '0',
  `user_id` int(11) default '0' COMMENT '???????',
  `borrow_nid` varchar(50) default '' COMMENT '????id',
  `borrow_userid` int(11) default '0' COMMENT '????id',
  `tender_id` int(11) default '0' COMMENT '???id',
  `recover_status` int(2) NOT NULL,
  `recover_period` int(2) default NULL COMMENT '????????',
  `recover_time` varchar(50) default NULL COMMENT '??????????',
  `recover_yestime` varchar(50) default NULL COMMENT '??????????',
  `recover_account` decimal(11,2) default '0.00' COMMENT '???????',
  `recover_interest` decimal(11,2) default '0.00' COMMENT '???????',
  `recover_capital` decimal(11,2) default '0.00' COMMENT '???????',
  `recover_account_yes` decimal(11,2) default '0.00' COMMENT '???????',
  `recover_interest_yes` decimal(11,2) default '0.00' COMMENT '???????',
  `recover_capital_yes` decimal(11,2) default '0.00' COMMENT '???????',
  `recover_web` int(2) default '0' COMMENT '???????',
  `recover_vouch` int(2) default '0' COMMENT '?????????',
  `advance_status` int(2) NOT NULL,
  `late_days` int(11) NOT NULL default '0' COMMENT '????????',
  `late_interest` decimal(11,2) NOT NULL default '0.00' COMMENT '???????',
  `late_forfeit` decimal(11,2) default '0.00' COMMENT '?????????',
  `late_reminder` decimal(11,2) default '0.00' COMMENT '????????',
  `addtime` varchar(50) default NULL,
  `addip` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5826 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_borrow_recover` values('5763','0','1','1934','20131100001','1935','5491','1','0','1386403594','1383811998','1530.10','45.00','1485.10','1530.10','45.00','1485.10','0','0','0','0','0.00','0.00','0.00','1383811594','113.134.32.246');");
E_D("replace into `yyd_borrow_recover` values('5764','0','1','1934','20131100001','1935','5491','1','1','1389081994','1383812541','1530.10','30.15','1499.95','1530.10','30.15','1499.95','0','0','0','0','0.00','0.00','0.00','1383811594','113.134.32.246');");
E_D("replace into `yyd_borrow_recover` values('5765','0','1','1934','20131100001','1935','5491','1','2','1391760394','1383812690','1530.10','15.15','1514.95','1530.10','15.15','1514.95','0','0','0','0','0.00','0.00','0.00','1383811594','113.134.32.246');");
E_D("replace into `yyd_borrow_recover` values('5766','0','1','1934','20131100001','1935','5490','1','0','1386403594','1383811998','170.01','5.00','165.01','170.01','5.00','165.01','0','0','0','0','0.00','0.00','0.00','1383811594','113.134.32.246');");
E_D("replace into `yyd_borrow_recover` values('5767','0','1','1934','20131100001','1935','5490','1','1','1389081994','1383812541','170.01','3.35','166.66','170.01','3.35','166.66','0','0','0','0','0.00','0.00','0.00','1383811594','113.134.32.246');");
E_D("replace into `yyd_borrow_recover` values('5768','0','1','1934','20131100001','1935','5490','1','2','1391760394','1383812690','170.01','1.68','168.33','170.01','1.68','168.33','0','0','0','0','0.00','0.00','0.00','1383811594','113.134.32.246');");
E_D("replace into `yyd_borrow_recover` values('5769','0','1','1940','20131200001','1938','5492','1','0','1388740182','1386148323','101.00','1.00','100.00','101.00','1.00','100.00','0','0','0','0','0.00','0.00','0.00','1386148182','222.94.187.146');");
E_D("replace into `yyd_borrow_recover` values('5770','0','1','1940','20131200002','1938','5493','1','0','1388740841','1386148978','1020.00','20.00','1000.00','1020.00','20.00','1000.00','0','0','0','0','0.00','0.00','0.00','1386148841','222.94.187.146');");
E_D("replace into `yyd_borrow_recover` values('5771','0','1','1937','20131200003','1938','5494','1','0','1388741918','1386149932','1020.00','20.00','1000.00','1020.00','20.00','1000.00','0','0','0','0','0.00','0.00','0.00','1386149918','222.94.187.146');");
E_D("replace into `yyd_borrow_recover` values('5772','0','1','1940','20131200004','1938','5495','1','0','1386236979','1390072672','1000.36','0.36','1000.00','1000.36','0.36','1000.00','0','0','0','45','0.00','0.00','0.00','1386150579','222.94.187.146');");
E_D("replace into `yyd_borrow_recover` values('5773','0','1','1937','20131200006','1938','5496','1','0','1388743992','1390072665','1019.17','19.17','1000.00','1019.17','19.17','1000.00','0','0','0','16','32.61','0.00','0.00','1386151992','222.94.187.146');");
E_D("replace into `yyd_borrow_recover` values('5774','0','1','1940','20131200011','1938','5498','1','0','1388750932','1386159308','506.25','6.25','500.00','506.25','6.25','500.00','0','0','0','0','0.00','0.00','0.00','1386158932','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5775','0','1','1940','20131200011','1938','5497','1','0','1388750932','1386159308','506.25','6.25','500.00','506.25','6.25','500.00','0','0','0','0','0.00','0.00','0.00','1386158932','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5776','0','1','1940','20131200013','1938','5499','1','0','1386247185','1386161095','200.07','0.07','200.00','200.07','0.07','200.00','0','0','0','0','0.00','0.00','0.00','1386160785','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5777','0','1','1940','20131200014','1938','5500','1','0','1388839833','1386161550','1025.07','33.33','991.74','1025.07','33.33','991.74','0','0','0','0','0.00','0.00','0.00','1386161433','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5778','0','1','1940','20131200014','1938','5500','1','1','1391518233','1386161607','1025.07','16.81','1008.26','1025.07','16.81','1008.26','0','0','0','0','0.00','0.00','0.00','1386161433','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5779','0','1','1940','20131200015','1938','5501','1','0','1388840385','1386162077','10.00','10.00','0.00','10.00','10.00','0.00','0','0','0','0','0.00','0.00','0.00','1386161985','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5780','0','1','1940','20131200015','1938','5501','1','1','1391518785','1386162094','10.00','10.00','0.00','10.00','10.00','0.00','0','0','0','0','0.00','0.00','0.00','1386161985','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5781','0','1','1940','20131200015','1938','5501','1','2','1393937985','1386162108','1010.00','10.00','1000.00','1010.00','10.00','1000.00','0','0','0','0','0.00','0.00','0.00','1386161985','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5782','0','1','1940','20131200016','1938','5502','1','0','1388840691','1386162408','20.00','20.00','0.00','20.00','20.00','0.00','0','0','0','0','0.00','0.00','0.00','1386162291','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5783','0','1','1940','20131200016','1938','5502','1','1','1391519091','1386162422','20.00','20.00','0.00','20.00','20.00','0.00','0','0','0','0','0.00','0.00','0.00','1386162291','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5784','0','1','1940','20131200016','1938','5502','1','2','1393938291','1386162429','1020.00','20.00','1000.00','1020.00','20.00','1000.00','0','0','0','0','0.00','0.00','0.00','1386162291','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5785','0','1','1940','20131200016','1938','5502','1','3','1396616691','1386162450','10.00','10.00','0.00','10.00','10.00','0.00','0','0','0','0','0.00','0.00','0.00','1386162291','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5786','0','1','1940','20131200016','1938','5502','1','4','1399208691','1386162457','10.00','10.00','0.00','10.00','10.00','0.00','0','0','0','0','0.00','0.00','0.00','1386162291','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5787','0','1','1940','20131200016','1938','5502','1','5','1401887091','1386162469','1010.00','10.00','1000.00','1010.00','10.00','1000.00','0','0','0','0','0.00','0.00','0.00','1386162291','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5788','0','1','1940','20131200017','1938','5503','1','0','1388841180','1386162881','120.00','120.00','0.00','120.00','120.00','0.00','0','0','0','0','0.00','0.00','0.00','1386162780','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5789','0','1','1940','20131200017','1938','5503','1','1','1391519580','1386162897','120.00','120.00','0.00','120.00','120.00','0.00','0','0','0','0','0.00','0.00','0.00','1386162780','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5790','0','1','1940','20131200017','1938','5503','1','2','1393938780','1386162911','3120.00','120.00','3000.00','3120.00','120.00','3000.00','0','0','0','0','0.00','0.00','0.00','1386162780','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5791','0','1','1940','20131200018','1938','5504','1','0','1391347470','1386163537','5518.33','18.33','5500.00','5518.33','18.33','5500.00','0','0','0','0','0.00','0.00','0.00','1386163470','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5792','0','1','1940','20131200019','1938','5505','1','0','1386596004','1386164165','500.07','0.07','500.00','500.07','0.07','500.00','0','0','0','0','0.00','0.00','0.00','1386164004','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5793','0','1','1940','20131200020','1938','5506','1','0','1388843378','1386165146','2002.50','3.33','1999.17','2002.50','3.33','1999.17','0','0','0','0','0.00','0.00','0.00','1386164978','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5794','0','1','1940','20131200020','1938','5506','1','1','1391521778','1386165167','2002.50','1.67','2000.83','2002.50','1.67','2000.83','0','0','0','0','0.00','0.00','0.00','1386164978','121.229.137.228');");
E_D("replace into `yyd_borrow_recover` values('5795','0','1','1940','20131200005','1938','5508','1','0','1387071613','1390072678','1003.33','3.33','1000.00','1003.33','3.33','1000.00','0','0','0','35','0.00','0.00','0.00','1386207613','180.110.188.178');");
E_D("replace into `yyd_borrow_recover` values('5796','0','1','1940','20131200009','1938','5507','1','0','1388886029','1390072598','21.25','21.25','0.00','21.25','21.25','0.00','0','0','0','14','0.60','0.00','0.00','1386207629','180.110.188.178');");
E_D("replace into `yyd_borrow_recover` values('5797','0','1','1940','20131200009','1938','5507','1','1','1391564429','1390072604','1721.25','21.25','1700.00','1721.25','21.25','1700.00','0','0','0','0','0.00','0.00','0.00','1386207629','180.110.188.178');");
E_D("replace into `yyd_borrow_recover` values('5798','0','1','1940','20131200022','1938','5509','1','0','1388886160','1386207760','1001.67','1.67','1000.00','1001.67','1.67','1000.00','0','0','0','0','0.00','0.00','0.00','1386207760','180.110.188.178');");
E_D("replace into `yyd_borrow_recover` values('5799','0','1','1940','20131200023','1938','5510','1','0','1388887134','1386208734','1001.67','1.67','1000.00','1001.67','1.67','1000.00','0','0','0','0','0.00','0.00','0.00','1386208734','180.110.188.178');");
E_D("replace into `yyd_borrow_recover` values('5800','0','1','1938','20140100001','1934','5512','1','0','1391800686','1392127034','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390072686','124.156.66.241');");
E_D("replace into `yyd_borrow_recover` values('5801','0','1','1938','20140100001','1934','5513','1','0','1391956577','1392127035','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390228577','112.80.125.126');");
E_D("replace into `yyd_borrow_recover` values('5802','0','1','1938','20140100001','1934','5514','1','0','1392222266','1392395617','7046.67','46.67','7000.00','7046.67','46.67','7000.00','0','0','0','0','0.00','0.00','0.00','1390494266','58.240.102.112');");
E_D("replace into `yyd_borrow_recover` values('5803','0','1','1938','20140100001','1934','5515','1','0','1392223757','1392395621','100.67','0.67','100.00','100.67','0.67','100.00','0','0','0','0','0.00','0.00','0.00','1390495757','58.240.102.112');");
E_D("replace into `yyd_borrow_recover` values('5804','0','1','1938','20140100001','1934','5516','1','0','1392252605','1392395621','25166.67','166.67','25000.00','25166.67','166.67','25000.00','0','0','0','0','0.00','0.00','0.00','1390524605','58.240.102.112');");
E_D("replace into `yyd_borrow_recover` values('5805','0','1','1938','20140100001','1934','5517','1','0','1392257544','1392395621','5033.33','33.33','5000.00','5033.33','33.33','5000.00','0','0','0','0','0.00','0.00','0.00','1390529544','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5806','0','1','1938','20140100001','1934','5518','1','0','1392258720','1392395621','100.67','0.67','100.00','100.67','0.67','100.00','0','0','0','0','0.00','0.00','0.00','1390530720','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5807','0','1','1938','20140100001','1934','5519','1','0','1392258721','1392395621','151.00','1.00','150.00','151.00','1.00','150.00','0','0','0','0','0.00','0.00','0.00','1390530721','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5808','0','1','1938','20140100001','1934','5520','1','0','1392259915','1392395621','100.67','0.67','100.00','100.67','0.67','100.00','0','0','0','0','0.00','0.00','0.00','1390531915','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5809','0','1','1938','20140100001','1934','5521','1','0','1392259916','1392395621','151.00','1.00','150.00','151.00','1.00','150.00','0','0','0','0','0.00','0.00','0.00','1390531916','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5810','0','1','1938','20140100001','1934','5522','1','0','1392260565','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532565','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5811','0','1','1938','20140100001','1934','5523','1','0','1392260567','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532567','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5812','0','1','1938','20140100001','1934','5524','1','0','1392260772','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532772','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5813','0','1','1938','20140100001','1934','5525','1','0','1392260773','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532773','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5814','0','1','1938','20140100001','1934','5526','1','0','1392260882','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532882','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5815','0','1','1938','20140100001','1934','5527','1','0','1392260883','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532883','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5816','0','1','1938','20140100001','1934','5528','1','0','1392260884','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532884','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5817','0','1','1938','20140100001','1934','5529','1','0','1392260970','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532970','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5818','0','1','1938','20140100001','1934','5530','1','0','1392260972','1392395621','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532972','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5819','0','1','1938','20140100001','1934','5531','1','0','1392260974','1392395622','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390532974','122.96.42.228');");
E_D("replace into `yyd_borrow_recover` values('5820','0','1','1938','20140100001','1934','5532','1','0','1392261222','1392395622','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390533222','122.96.42.214');");
E_D("replace into `yyd_borrow_recover` values('5821','0','1','1938','20140100001','1934','5533','1','0','1392261225','1392395622','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390533225','122.96.42.214');");
E_D("replace into `yyd_borrow_recover` values('5822','0','1','1938','20140100001','1934','5534','1','0','1392261228','1392395622','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390533228','122.96.42.214');");
E_D("replace into `yyd_borrow_recover` values('5823','0','1','1938','20140100001','1934','5535','1','0','1392261506','1392395622','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390533506','122.96.42.214');");
E_D("replace into `yyd_borrow_recover` values('5824','0','1','1938','20140100001','1934','5536','1','0','1392261507','1392395622','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390533507','122.96.42.214');");
E_D("replace into `yyd_borrow_recover` values('5825','0','1','1938','20140100001','1934','5537','1','0','1392261508','1392395622','50.33','0.33','50.00','50.33','0.33','50.00','0','0','0','0','0.00','0.00','0.00','1390533508','122.96.42.214');");

require("../../inc/footer.php");
?>