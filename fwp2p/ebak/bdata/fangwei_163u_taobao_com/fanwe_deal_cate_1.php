<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_cate`;");
E_C("CREATE TABLE `fanwe_deal_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_cate` values('1','���','1');");
E_D("replace into `fanwe_deal_cate` values('2','�Ƽ�','2');");
E_D("replace into `fanwe_deal_cate` values('3','Ӱ��','3');");
E_D("replace into `fanwe_deal_cate` values('4','��Ӱ','4');");
E_D("replace into `fanwe_deal_cate` values('5','����','5');");
E_D("replace into `fanwe_deal_cate` values('6','����','6');");
E_D("replace into `fanwe_deal_cate` values('7','�','7');");
E_D("replace into `fanwe_deal_cate` values('8','��Ϸ','8');");
E_D("replace into `fanwe_deal_cate` values('9','����','9');");
E_D("replace into `fanwe_deal_cate` values('10','����','10');");

require("../../inc/footer.php");
?>