<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_user_consignee`;");
E_C("CREATE TABLE `fanwe_user_consignee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_user_consignee` values('18','18','����','����','��������̨������ҵ·����ʫ��','13333333333','350000','��ά');");
E_D("replace into `fanwe_user_consignee` values('19','17','����','����','��ά��ά��ά��ά��ά','14444444444','22222','��ά');");
E_D("replace into `fanwe_user_consignee` values('20','19','����','�差','test','13344455555','test','test');");

require("../../inc/footer.php");
?>