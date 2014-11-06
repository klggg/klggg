<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_order`;");
E_C("CREATE TABLE `fanwe_deal_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `deal_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `total_price` double(20,4) NOT NULL COMMENT '???',
  `delivery_fee` double(20,4) NOT NULL COMMENT '???',
  `deal_price` double(20,4) NOT NULL COMMENT '???????',
  `support_memo` text NOT NULL,
  `payment_id` int(11) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `credit_pay` double(20,4) NOT NULL,
  `online_pay` double(20,4) NOT NULL,
  `deal_name` varchar(255) NOT NULL,
  `order_status` tinyint(1) NOT NULL COMMENT '0:????? 1:?????(????) 2:?????(?????) 3:???',
  `create_time` int(11) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `repay_time` int(11) NOT NULL COMMENT '??????????',
  `repay_memo` text NOT NULL COMMENT '??????????????????',
  `is_refund` tinyint(1) NOT NULL COMMENT '????? 0:?? 1:??',
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `deal_item_id` (`deal_item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_order` values('65','55','18','18','fzmatthew','1352229388','20.0000','5.0000','15.0000','�����ϰ�ʱ�����͡�','0','COMM','20.0000','0.0000','ԭ��DIY������Ϸ�����򡷡��ƽ����롷�ڴ�����֧��','3','1352229388','��ά','350000','13333333333','����','����','��������̨������ҵ·����ʫ��','0','0','','0');");
E_D("replace into `fanwe_deal_order` values('66','56','24','17','fanwe','1352230101','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230101','��ά','22222','14444444444','����','����','��ά��ά��ά��ά��ά','1','1352230424','�ر��Ѿ���������������123456, ����������ϵ�ҡ�','0');");
E_D("replace into `fanwe_deal_order` values('67','56','24','19','test','1352230180','500.0000','0.0000','500.0000','','24','ICBCB2C','0.0000','500.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230157','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('68','56','24','19','test','1352230228','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230228','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('69','56','24','19','test','1352230232','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230232','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('70','56','24','19','test','1352230237','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230237','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('71','56','24','19','test','1352230240','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230240','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('72','56','24','19','test','1352230243','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230243','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('73','56','24','19','test','1352230247','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230247','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('74','56','24','19','test','1352230268','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230268','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('75','56','24','19','test','1352230270','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230270','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('76','56','24','19','test','1352230293','500.0000','0.0000','500.0000','','0','','500.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','3','1352230293','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('77','58','31','18','fzmatthew','1352231539','2000.0000','0.0000','2000.0000','test','0','','2000.0000','0.0000','����è�ļҡ�����ʹ���濧�ȹݵ��ؽ���Ҫ��ҵ�������','3','1352231539','��ά','350000','13333333333','����','����','��������̨������ҵ·����ʫ��','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('78','58','30','19','test','0','1000.0000','0.0000','1000.0000','ttt','24','CCB','500.0000','0.0000','����è�ļҡ�����ʹ���濧�ȹݵ��ؽ���Ҫ��ҵ�������','0','1352231631','test','test','13344455555','����','�差','test','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('79','56','24','17','fanwe','0','500.0000','0.0000','500.0000','����֧��','24','ICBCB2C','300.0000','0.0000','ӵ���Լ��Ŀ��ȹ�','0','1352231671','��ά','22222','14444444444','����','����','��ά��ά��ά��ά��ά','1','0','','0');");
E_D("replace into `fanwe_deal_order` values('80','58','32','18','fzmatthew','1352231704','3000.0000','0.0000','3000.0000','','0','','3000.0000','0.0000','����è�ļҡ�����ʹ���濧�ȹݵ��ؽ���Ҫ��ҵ�������','3','1352231704','��ά','350000','13333333333','����','����','��������̨������ҵ·����ʫ��','1','0','','0');");

require("../../inc/footer.php");
?>