<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_role_group`;");
E_C("CREATE TABLE `fanwe_role_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nav_id` int(11) NOT NULL COMMENT '???????????ID',
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_role_group` values('1','��ҳ','1','0','1','1');");
E_D("replace into `fanwe_role_group` values('5','ϵͳ����','3','0','1','1');");
E_D("replace into `fanwe_role_group` values('7','����Ա','3','0','1','2');");
E_D("replace into `fanwe_role_group` values('8','���ݿ����','3','0','1','6');");
E_D("replace into `fanwe_role_group` values('9','ϵͳ��־','3','0','1','7');");
E_D("replace into `fanwe_role_group` values('19','�˵�����','3','0','1','17');");
E_D("replace into `fanwe_role_group` values('28','�ʼ�����','10','0','1','26');");
E_D("replace into `fanwe_role_group` values('29','���Ź���','10','0','1','27');");
E_D("replace into `fanwe_role_group` values('31','�������','3','0','1','29');");
E_D("replace into `fanwe_role_group` values('33','���й���','10','0','1','31');");
E_D("replace into `fanwe_role_group` values('69','��Ա����','5','0','1','31');");
E_D("replace into `fanwe_role_group` values('70','��Ա����','5','0','1','32');");
E_D("replace into `fanwe_role_group` values('71','ͬ����¼','5','0','1','33');");
E_D("replace into `fanwe_role_group` values('72','��Ŀ����','13','0','1','33');");
E_D("replace into `fanwe_role_group` values('73','��Ŀ֧��','13','0','1','34');");
E_D("replace into `fanwe_role_group` values('74','��Ŀ����','13','0','1','35');");
E_D("replace into `fanwe_role_group` values('75','֧���ӿ�','14','0','1','1');");
E_D("replace into `fanwe_role_group` values('76','�����¼','14','0','1','2');");
E_D("replace into `fanwe_role_group` values('77','��Ϣģ��','10','0','1','1');");
E_D("replace into `fanwe_role_group` values('78','���ּ�¼','14','0','1','3');");

require("../../inc/footer.php");
?>