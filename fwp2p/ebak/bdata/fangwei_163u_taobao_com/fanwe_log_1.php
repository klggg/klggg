<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_log`;");
E_C("CREATE TABLE `fanwe_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin` int(11) NOT NULL,
  `log_ip` varchar(255) NOT NULL,
  `log_status` tinyint(1) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2425 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_log` values('2359','��ά�ڳ���ӳɹ�','1352227067','1','127.0.0.1','1','IndexImage','insert');");
E_D("replace into `fanwe_log` values('2360','��ά�ڳ���ӳɹ�','1352227077','1','127.0.0.1','1','IndexImage','insert');");
E_D("replace into `fanwe_log` values('2361','ԭ��DIY������Ϸ�����򡷡��ƽ����롷�ڴ�����֧�ָ��³ɹ�','1352229024','1','127.0.0.1','1','Deal','update');");
E_D("replace into `fanwe_log` values('2362','ԭ��DIY������Ϸ�����򡷡��ƽ����롷�ڴ�����֧�ָ��³ɹ�','1352229031','1','127.0.0.1','1','Deal','update');");
E_D("replace into `fanwe_log` values('2363','55_is_recommend���óɹ�','1352229046','1','127.0.0.1','1','Deal','toogle_status');");
E_D("replace into `fanwe_log` values('2394','admin��¼�ɹ�','1364014964','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2395','admin����Ա�������','1380612230','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2396','admin����Ա�������','1380612242','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2397','admin����Ա�������','1380612266','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2398','admin����Ա�������','1380612295','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2399','admin����Ա�������','1380612429','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2400','admin��¼�ɹ�','1380612437','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2401','�ѻ���Ʒ��������ɾ���ɹ�','1380612460','1','127.0.0.1','1','Nav','foreverdelete');");
E_D("replace into `fanwe_log` values('2402','admin���³ɹ�','1380612524','1','127.0.0.1','1','Admin','update');");
E_D("replace into `fanwe_log` values('2403','admin�����޸ĳɹ�','1380612579','1','127.0.0.1','1','Index','do_change_password');");
E_D("replace into `fanwe_log` values('2404','admin��¼�ɹ�','1380612594','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2405','��Ʒ��ҵԴ�볹��ɾ���ɹ�','1380617731','1','127.0.0.1','1','Help','foreverdelete');");
E_D("replace into `fanwe_log` values('2406','�ٷ�������̳����ɾ���ɹ�','1380617733','1','127.0.0.1','1','Help','foreverdelete');");
E_D("replace into `fanwe_log` values('2407','�������Ǹ��³ɹ�','1380617750','1','127.0.0.1','1','Help','update');");
E_D("replace into `fanwe_log` values('2408','����ϵͳ����','1380617821','1','127.0.0.1','1','Conf','update');");
E_D("replace into `fanwe_log` values('2409','admin��¼�ɹ�','1400706021','1','115.207.7.32','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2423','admin��¼�ɹ�','1402542177','1','114.105.234.105','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2422','����ϵͳ����','1402541818','1','114.105.234.105','1','Conf','update');");
E_D("replace into `fanwe_log` values('2421','admin��¼�ɹ�','1402541505','1','114.105.234.105','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2420','վ�����ݸ��³ɹ�','1402541464','1','114.105.234.105','1','IndexImage','update');");
E_D("replace into `fanwe_log` values('2419','�����й����³ɹ�','1402541445','1','114.105.234.105','1','IndexImage','update');");
E_D("replace into `fanwe_log` values('2415','����ϵͳ����','1402216524','1','127.0.0.1','1','Conf','update');");
E_D("replace into `fanwe_log` values('2416','admin��¼�ɹ�','1402540920','1','114.105.234.105','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2417','52jscn����ɾ���ɹ�','1402540940','1','114.105.234.105','1','User','delete');");
E_D("replace into `fanwe_log` values('2418','����ϵͳ����','1402541004','1','114.105.234.105','1','Conf','update');");
E_D("replace into `fanwe_log` values('2424','maomao���³ɹ�','1402542200','1','114.105.234.105','1','User','update');");

require("../../inc/footer.php");
?>