<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_user_log`;");
E_C("CREATE TABLE `fanwe_user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin_id` int(11) NOT NULL,
  `money` double(20,4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_user_log` values('114','����Ա���Գ�ֵ','1352229203','1','1000.0000','18');");
E_D("replace into `fanwe_user_log` values('115','֧��ԭ��DIY������Ϸ�����򡷡��ƽ����롷�ڴ�����֧����Ŀ֧��','1352229388','1','-20.0000','18');");
E_D("replace into `fanwe_user_log` values('116','����Ա���Գ�ֵ','1352229989','1','2000.0000','17');");
E_D("replace into `fanwe_user_log` values('117','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230101','1','-500.0000','17');");
E_D("replace into `fanwe_user_log` values('118','test','1352230213','1','5000.0000','19');");
E_D("replace into `fanwe_user_log` values('119','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230228','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('120','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230232','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('121','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230237','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('122','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230240','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('123','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230243','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('124','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230247','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('125','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230268','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('126','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230270','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('127','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352230293','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('128','��������','1352231510','1','5000.0000','18');");
E_D("replace into `fanwe_user_log` values('129','֧������è�ļҡ�����ʹ���濧�ȹݵ��ؽ���Ҫ��ҵ���������Ŀ֧��','1352231539','1','-2000.0000','18');");
E_D("replace into `fanwe_user_log` values('130','֧������è�ļҡ�����ʹ���濧�ȹݵ��ؽ���Ҫ��ҵ���������Ŀ֧��','1352231631','1','-500.0000','19');");
E_D("replace into `fanwe_user_log` values('131','֧��ӵ���Լ��Ŀ��ȹ���Ŀ֧��','1352231671','1','-300.0000','17');");
E_D("replace into `fanwe_user_log` values('132','֧������è�ļҡ�����ʹ���濧�ȹݵ��ؽ���Ҫ��ҵ���������Ŀ֧��','1352231704','1','-3000.0000','18');");

require("../../inc/footer.php");
?>