<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_role_module`;");
E_C("CREATE TABLE `fanwe_role_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_role_module` values('5','Role','Ȩ�����','1','0');");
E_D("replace into `fanwe_role_module` values('6','Admin','����Ա','1','0');");
E_D("replace into `fanwe_role_module` values('12','Conf','ϵͳ����','1','0');");
E_D("replace into `fanwe_role_module` values('13','Database','���ݿ�','1','0');");
E_D("replace into `fanwe_role_module` values('15','Log','ϵͳ��־','1','0');");
E_D("replace into `fanwe_role_module` values('19','File','�ļ�����','1','0');");
E_D("replace into `fanwe_role_module` values('58','Index','��ҳ','1','0');");
E_D("replace into `fanwe_role_module` values('36','Nav','�����˵�','1','0');");
E_D("replace into `fanwe_role_module` values('47','MailServer','�ʼ�������','1','0');");
E_D("replace into `fanwe_role_module` values('48','Sms','���Žӿ�','1','0');");
E_D("replace into `fanwe_role_module` values('53','Adv','���ģ��','1','0');");
E_D("replace into `fanwe_role_module` values('56','DealMsgList','ҵ��Ⱥ������','1','0');");
E_D("replace into `fanwe_role_module` values('92','Cache','���洦��','1','0');");
E_D("replace into `fanwe_role_module` values('113','User','��Ա����','1','0');");
E_D("replace into `fanwe_role_module` values('114','MsgTemplate','��Ϣģ�����','1','0');");
E_D("replace into `fanwe_role_module` values('115','Integrate','��Ա����','1','0');");
E_D("replace into `fanwe_role_module` values('116','ApiLogin','ͬ����¼','1','0');");
E_D("replace into `fanwe_role_module` values('117','DealCate','��Ŀ����','1','0');");
E_D("replace into `fanwe_role_module` values('118','Deal','��Ŀ����','1','0');");
E_D("replace into `fanwe_role_module` values('119','Payment','֧���ӿ�','1','0');");
E_D("replace into `fanwe_role_module` values('120','IndexImage','�ֲ����ͼ','1','0');");
E_D("replace into `fanwe_role_module` values('121','Help','վ�����','1','0');");
E_D("replace into `fanwe_role_module` values('122','Faq','��������','1','0');");
E_D("replace into `fanwe_role_module` values('123','DealOrder','��Ŀ֧��','1','0');");
E_D("replace into `fanwe_role_module` values('124','DealComment','��Ŀ����','1','0');");
E_D("replace into `fanwe_role_module` values('125','PaymentNotice','�����¼','1','0');");
E_D("replace into `fanwe_role_module` values('126','UserRefund','�û�����','1','0');");

require("../../inc/footer.php");
?>