<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_user_notify`;");
E_C("CREATE TABLE `fanwe_user_notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `url_route` varchar(255) NOT NULL,
  `url_param` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_user_notify` values('69','17','ӵ���Լ��Ŀ��ȹ� �� 2012-11-07 11:31:10 �ɹ��ﵽ ?5,000.00','1352230271','0','deal#show','id=56');");
E_D("replace into `fanwe_user_notify` values('70','19','ӵ���Լ��Ŀ��ȹ� �� 2012-11-07 11:31:10 �ɹ��ﵽ ?5,000.00','1352230271','0','deal#show','id=56');");
E_D("replace into `fanwe_user_notify` values('71','17','��֧�ֵ���Ŀӵ���Լ��Ŀ��ȹݻر��ѷ���','1352230424','0','account#view_order','id=66');");
E_D("replace into `fanwe_user_notify` values('72','18','����è�ļҡ�����ʹ���濧�ȹݵ��ؽ���Ҫ��ҵ������� �� 2012-11-07 11:55:04 �ɹ��ﵽ ?3,000.00','1352231704','0','deal#show','id=58');");

require("../../inc/footer.php");
?>