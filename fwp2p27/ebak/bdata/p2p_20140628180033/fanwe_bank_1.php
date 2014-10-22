<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_bank`;");
E_C("CREATE TABLE `fanwe_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_rec` tinyint(1) NOT NULL,
  `day` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_bank` values('1','中国工商银行','1','3','0');");
E_D("replace into `fanwe_bank` values('2','中国农业银行','1','3','0');");
E_D("replace into `fanwe_bank` values('3','中国建设银行','1','3','0');");
E_D("replace into `fanwe_bank` values('4','招商银行','1','3','0');");
E_D("replace into `fanwe_bank` values('5','中国光大银行','1','3','0');");
E_D("replace into `fanwe_bank` values('6','中国邮政储蓄银行','1','3','0');");
E_D("replace into `fanwe_bank` values('7','兴业银行','1','3','0');");
E_D("replace into `fanwe_bank` values('8','中国银行','0','3','0');");
E_D("replace into `fanwe_bank` values('9','交通银行','0','3','0');");
E_D("replace into `fanwe_bank` values('10','中信银行','0','3','0');");
E_D("replace into `fanwe_bank` values('11','华夏银行','0','3','0');");
E_D("replace into `fanwe_bank` values('12','上海浦东发展银行','0','3','0');");
E_D("replace into `fanwe_bank` values('13','城市信用社','0','3','0');");
E_D("replace into `fanwe_bank` values('14','恒丰银行','0','3','0');");
E_D("replace into `fanwe_bank` values('15','广东发展银行','0','3','0');");
E_D("replace into `fanwe_bank` values('16','深圳发展银行','0','3','0');");
E_D("replace into `fanwe_bank` values('17','中国民生银行','0','3','0');");
E_D("replace into `fanwe_bank` values('18','中国农业发展银行','0','3','0');");
E_D("replace into `fanwe_bank` values('19','农村商业银行','0','3','0');");
E_D("replace into `fanwe_bank` values('20','农村信用社','0','3','0');");
E_D("replace into `fanwe_bank` values('21','城市商业银行','0','3','0');");
E_D("replace into `fanwe_bank` values('22','农村合作银行','0','3','0');");
E_D("replace into `fanwe_bank` values('23','浙商银行','0','3','0');");
E_D("replace into `fanwe_bank` values('24','上海农商银行','0','3','0');");
E_D("replace into `fanwe_bank` values('25','中国进出口银行','0','3','0');");
E_D("replace into `fanwe_bank` values('26','渤海银行','0','3','0');");
E_D("replace into `fanwe_bank` values('27','国家开发银行','0','3','0');");
E_D("replace into `fanwe_bank` values('28','村镇银行','0','3','0');");
E_D("replace into `fanwe_bank` values('29','徽商银行股份有限公司','0','3','0');");
E_D("replace into `fanwe_bank` values('30','南洋商业银行','0','3','0');");
E_D("replace into `fanwe_bank` values('31','韩亚银行','0','3','0');");
E_D("replace into `fanwe_bank` values('32','花旗银行','0','3','0');");
E_D("replace into `fanwe_bank` values('33','渣打银行','0','3','0');");
E_D("replace into `fanwe_bank` values('34','华一银行','0','3','0');");
E_D("replace into `fanwe_bank` values('35','东亚银行','0','3','0');");
E_D("replace into `fanwe_bank` values('36','苏格兰皇家银行','0','3','0');");

require("../../inc/footer.php");
?>