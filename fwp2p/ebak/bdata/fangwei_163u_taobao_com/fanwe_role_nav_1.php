<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_role_nav`;");
E_C("CREATE TABLE `fanwe_role_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_role_nav` values('1','��ҳ','0','1','1');");
E_D("replace into `fanwe_role_nav` values('3','ϵͳ����','0','1','10');");
E_D("replace into `fanwe_role_nav` values('5','��Ա����','0','1','3');");
E_D("replace into `fanwe_role_nav` values('10','�����ʼ�','0','1','7');");
E_D("replace into `fanwe_role_nav` values('13','��Ŀ����','0','1','4');");
E_D("replace into `fanwe_role_nav` values('14','֧������','0','1','5');");

require("../../inc/footer.php");
?>