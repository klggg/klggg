<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_role_node`;");
E_C("CREATE TABLE `fanwe_role_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT '??????????????ID',
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=667 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_role_node` values('334','main','��ҳ','1','0','1','58');");
E_D("replace into `fanwe_role_node` values('11','index','����Ա�����б�','1','0','7','5');");
E_D("replace into `fanwe_role_node` values('13','trash','����Ա�������վ','1','0','7','5');");
E_D("replace into `fanwe_role_node` values('14','index','����Ա�б�','1','0','7','6');");
E_D("replace into `fanwe_role_node` values('15','trash','����Ա����վ','1','0','7','6');");
E_D("replace into `fanwe_role_node` values('16','index','ϵͳ����','1','0','5','12');");
E_D("replace into `fanwe_role_node` values('17','index','���ݿⱸ���б�','1','0','8','13');");
E_D("replace into `fanwe_role_node` values('18','sql','SQL����','1','0','8','13');");
E_D("replace into `fanwe_role_node` values('19','index','ϵͳ��־�б�','1','0','9','15');");
E_D("replace into `fanwe_role_node` values('24','do_upload','�༭��ͼƬ�ϴ�','1','0','0','19');");
E_D("replace into `fanwe_role_node` values('43','index','�����˵��б�','1','0','19','36');");
E_D("replace into `fanwe_role_node` values('57','index','�ʼ��������б�','1','0','28','47');");
E_D("replace into `fanwe_role_node` values('58','index','���Žӿ��б�','1','0','29','48');");
E_D("replace into `fanwe_role_node` values('63','index','����б�','1','0','31','53');");
E_D("replace into `fanwe_role_node` values('66','index','ҵ������б�','1','0','33','56');");
E_D("replace into `fanwe_role_node` values('68','add','���ҳ��','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('69','edit','�༭ҳ��','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('70','set_effect','������Ч','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('71','add','���ִ��','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('72','update','�༭ִ��','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('73','delete','ɾ��','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('74','restore','�ָ�','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('75','foreverdelete','����ɾ��','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('76','set_default','����Ĭ�Ϲ���Ա','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('77','add','���ҳ��','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('78','edit','�༭ҳ��','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('79','update','�༭ִ��','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('80','foreverdelete','����ɾ��','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('81','set_effect','������Ч','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('99','update','��������','1','0','0','12');");
E_D("replace into `fanwe_role_node` values('100','dump','��������','1','0','0','13');");
E_D("replace into `fanwe_role_node` values('101','delete','ɾ������','1','0','0','13');");
E_D("replace into `fanwe_role_node` values('102','restore','�ָ�����','1','0','0','13');");
E_D("replace into `fanwe_role_node` values('103','load_file','��ȡҳ��','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('104','load_adv_id','��ȡ���λ','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('105','execute','ִ��SQL���','1','0','0','13');");
E_D("replace into `fanwe_role_node` values('147','show_content','��ʾ����','1','0','0','56');");
E_D("replace into `fanwe_role_node` values('148','send','�ֶ�����','1','0','0','56');");
E_D("replace into `fanwe_role_node` values('149','foreverdelete','����ɾ��','1','0','0','56');");
E_D("replace into `fanwe_role_node` values('181','do_upload_img','ͼƬ�ؼ��ϴ�','1','0','0','19');");
E_D("replace into `fanwe_role_node` values('182','deleteImg','ɾ��ͼƬ','1','0','0','19');");
E_D("replace into `fanwe_role_node` values('198','foreverdelete','����ɾ��','1','0','0','15');");
E_D("replace into `fanwe_role_node` values('205','add','���ҳ��','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('206','insert','���ִ��','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('207','edit','�༭ҳ��','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('208','update','�༭ִ��','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('209','set_effect','������Ч','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('210','foreverdelete','����ɾ��','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('211','send_demo','���Ͳ����ʼ�','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('229','edit','�༭ҳ��','1','0','0','36');");
E_D("replace into `fanwe_role_node` values('230','update','�༭ִ��','1','0','0','36');");
E_D("replace into `fanwe_role_node` values('231','set_effect','������Ч','1','0','0','36');");
E_D("replace into `fanwe_role_node` values('232','set_sort','����','1','0','0','36');");
E_D("replace into `fanwe_role_node` values('257','add','���ҳ��','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('258','insert','���ִ��','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('259','edit','�༭ҳ��','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('260','update','�༭ִ��','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('261','set_effect','������Ч','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('262','delete','ɾ��','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('263','restore','�ָ�','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('264','foreverdelete','����ɾ��','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('265','insert','��װҳ��','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('266','insert','��װ����','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('267','edit','�༭ҳ��','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('268','update','�༭ִ��','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('269','uninstall','ж��','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('270','set_effect','������Ч','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('271','send_demo','���Ͳ��Զ���','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('474','index','���洦��','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('475','clear_parse_file','��սű���ʽ����','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('477','clear_data','������ݻ���','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('480','syn_data','ͬ������','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('481','clear_image','���ͼƬ����','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('482','clear_admin','��պ�̨����','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('605','index','��Ϣģ��','1','0','77','114');");
E_D("replace into `fanwe_role_node` values('606','update','����ģ��','1','0','0','114');");
E_D("replace into `fanwe_role_node` values('607','index','��Ա�б�','1','0','69','113');");
E_D("replace into `fanwe_role_node` values('608','add','��ӻ�Ա','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('609','insert','����ִ��','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('610','edit','�༭��Ա','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('611','update','�༭ִ��','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('612','delete','ɾ����Ա','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('613','modify_account','��Ա�ʽ���','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('614','account_detail','�ʻ���־','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('615','foreverdelete_account_detail','ɾ���ʻ���־','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('616','consignee','���͵�ַ','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('617','foreverdelete_consignee','ɾ�����͵�ַ','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('618','weibo','΢���б�','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('619','foreverdelete_weibo','ɾ��΢��','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('620','index','��Ա����','1','0','70','115');");
E_D("replace into `fanwe_role_node` values('621','save','ִ������','1','0','0','115');");
E_D("replace into `fanwe_role_node` values('622','uninstall','ж������','1','0','0','115');");
E_D("replace into `fanwe_role_node` values('623','index','ͬ����¼�ӿ�','1','0','71','116');");
E_D("replace into `fanwe_role_node` values('624','insert','��װ�ӿ�','1','0','0','116');");
E_D("replace into `fanwe_role_node` values('625','update','��������','1','0','0','116');");
E_D("replace into `fanwe_role_node` values('626','uninstall','ж�ؽӿ�','1','0','0','116');");
E_D("replace into `fanwe_role_node` values('627','index','�����б�','1','0','72','117');");
E_D("replace into `fanwe_role_node` values('628','insert','��ӷ���','1','0','0','117');");
E_D("replace into `fanwe_role_node` values('629','update','���·���','1','0','0','117');");
E_D("replace into `fanwe_role_node` values('630','foreverdelete','ɾ������','1','0','0','117');");
E_D("replace into `fanwe_role_node` values('631','online_index','������Ŀ�б�','1','0','72','118');");
E_D("replace into `fanwe_role_node` values('632','submit_index','δ�����Ŀ','1','0','72','118');");
E_D("replace into `fanwe_role_node` values('633','index','֧���ӿ��б�','1','0','75','119');");
E_D("replace into `fanwe_role_node` values('634','insert','��װ֧���ӿ�','1','0','0','119');");
E_D("replace into `fanwe_role_node` values('635','update','����֧���ӿ�','1','0','0','119');");
E_D("replace into `fanwe_role_node` values('636','uninstall','ж�ؽӿ�','1','0','0','119');");
E_D("replace into `fanwe_role_node` values('637','index','�ֲ��������','1','0','5','120');");
E_D("replace into `fanwe_role_node` values('638','insert','��ӹ��','1','0','0','120');");
E_D("replace into `fanwe_role_node` values('639','update','�޸Ĺ��','1','0','0','120');");
E_D("replace into `fanwe_role_node` values('640','foreverdelete','ɾ�����','1','0','0','120');");
E_D("replace into `fanwe_role_node` values('641','delete_index','����վ','1','0','72','118');");
E_D("replace into `fanwe_role_node` values('642','index','�����б�','1','0','5','121');");
E_D("replace into `fanwe_role_node` values('643','insert','��Ӱ���','1','0','0','121');");
E_D("replace into `fanwe_role_node` values('644','update','�޸İ���','1','0','0','121');");
E_D("replace into `fanwe_role_node` values('645','foreverdelete','ɾ������','1','0','0','121');");
E_D("replace into `fanwe_role_node` values('646','index','��������','1','0','5','122');");
E_D("replace into `fanwe_role_node` values('647','insert','�������','1','0','0','122');");
E_D("replace into `fanwe_role_node` values('648','update','��������','1','0','0','122');");
E_D("replace into `fanwe_role_node` values('649','foreverdelete','ɾ������','1','0','0','122');");
E_D("replace into `fanwe_role_node` values('650','pay_log','����','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('651','save_pay_log','����','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('652','del_pay_log','ɾ������','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('653','deal_log','��Ŀ��־','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('654','del_deal_log','ɾ����־','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('655','batch_refund','�����˿�','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('656','index','��Ŀ֧��','1','0','73','123');");
E_D("replace into `fanwe_role_node` values('657','view','�鿴����','1','0','0','123');");
E_D("replace into `fanwe_role_node` values('658','refund','��Ŀ�˿�','1','0','0','123');");
E_D("replace into `fanwe_role_node` values('659','delete','ɾ��֧��','1','0','0','123');");
E_D("replace into `fanwe_role_node` values('660','incharge','��Ŀ�տ�','1','0','0','123');");
E_D("replace into `fanwe_role_node` values('661','index','��Ŀ����','1','0','74','124');");
E_D("replace into `fanwe_role_node` values('662','index','�����¼','1','0','76','125');");
E_D("replace into `fanwe_role_node` values('663','delete','ɾ����¼','1','0','0','125');");
E_D("replace into `fanwe_role_node` values('664','index','���ּ�¼','1','0','78','126');");
E_D("replace into `fanwe_role_node` values('665','delete','ɾ����¼','1','0','0','126');");
E_D("replace into `fanwe_role_node` values('666','confirm','ȷ������','1','0','0','126');");

require("../../inc/footer.php");
?>