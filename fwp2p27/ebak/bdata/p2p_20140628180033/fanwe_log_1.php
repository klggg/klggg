<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
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
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_log` values('39','fanwe更新成功','1378515325','1','127.0.0.1','1','User','update');");
E_D("replace into `fanwe_log` values('40','admin登录成功','1378530448','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('41','更新系统配置','1378530716','1','127.0.0.1','1','Conf','update');");
E_D("replace into `fanwe_log` values('42','admin登录成功','1380046490','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('43','更新系统配置','1380046516','1','125.46.90.1','1','Conf','update');");
E_D("replace into `fanwe_log` values('44','admin密码修改成功','1380047137','1','125.46.90.1','1','Index','do_change_password');");
E_D("replace into `fanwe_log` values('45','admin管理员密码错误','1380084204','0','58.215.254.124','0','Public','do_login');");
E_D("replace into `fanwe_log` values('46','admin管理员密码错误','1380084214','0','58.215.254.124','0','Public','do_login');");
E_D("replace into `fanwe_log` values('47','admin管理员密码错误','1380086135','0','58.215.254.124','0','Public','do_login');");
E_D("replace into `fanwe_log` values('48','admin管理员密码错误','1380086159','0','58.215.254.124','0','Public','do_login');");
E_D("replace into `fanwe_log` values('49','admin管理员密码错误','1381002704','0','27.212.192.179','0','Public','do_login');");
E_D("replace into `fanwe_log` values('50','admin管理员密码错误','1381033060','0','123.15.38.50','0','Public','do_login');");
E_D("replace into `fanwe_log` values('51','admin登录成功','1381033066','1','123.15.38.50','1','Public','do_login');");
E_D("replace into `fanwe_log` values('52','admin管理员密码错误','1381340995','0','119.176.175.181','0','Public','do_login');");
E_D("replace into `fanwe_log` values('53','admin管理员密码错误','1381341000','0','119.176.175.181','0','Public','do_login');");
E_D("replace into `fanwe_log` values('54','admin管理员密码错误','1381517827','0','125.46.90.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('55','admin登录成功','1381517834','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('56','admin登录成功','1381688032','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('57','admin登录成功','1381688202','1','116.1.81.254','1','Public','do_login');");
E_D("replace into `fanwe_log` values('58','admin登录成功','1381697729','1','220.160.158.69','1','Public','do_login');");
E_D("replace into `fanwe_log` values('59','管理员审核认证会员信息:yyyuuu 信用报告','1381697933','1','220.160.158.69','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('60','管理员审核认证会员信息:yyyuuu 工作认证','1381697941','1','220.160.158.69','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('61','管理员审核认证会员信息:yyyuuu 身份认证','1381697949','1','220.160.158.69','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('62','管理员审核认证会员信息:yyyuuu 收入认证','1381697955','1','220.160.158.69','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('63','资金周转更新成功','1381698271','1','220.160.158.69','1','Deal','update');");
E_D("replace into `fanwe_log` values('64','msld更新成功','1381698874','1','220.160.158.69','1','User','update');");
E_D("replace into `fanwe_log` values('65','资金周转更新成功','1381699073','1','220.160.158.69','1','Deal','update');");
E_D("replace into `fanwe_log` values('66','3_is_recommend启用成功','1381699120','1','220.160.158.69','1','Deal','toogle_status');");
E_D("replace into `fanwe_log` values('67','管理员编辑帐户','1381699256','1','220.160.158.69','1','User','modify_account');");
E_D("replace into `fanwe_log` values('68','admin登录成功','1381699527','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('69','77添加成功','1381699595','1','220.160.158.69','1','Link','insert');");
E_D("replace into `fanwe_log` values('70','编号为1的提现申请更新成功','1381704268','1','220.160.158.69','1','UserCarry','update');");
E_D("replace into `fanwe_log` values('71','admin管理员密码错误','1381708330','0','180.115.198.196','0','Public','do_login');");
E_D("replace into `fanwe_log` values('72','admin管理员密码错误','1381708341','0','180.115.198.196','0','Public','do_login');");
E_D("replace into `fanwe_log` values('73','admin登录成功','1381730349','1','116.1.81.254','1','Public','do_login');");
E_D("replace into `fanwe_log` values('74','买车更新成功','1381730588','1','116.1.81.254','1','Deal','update');");
E_D("replace into `fanwe_log` values('75','2_is_recommend启用成功','1381730769','1','116.1.81.254','1','Deal','toogle_status');");
E_D("replace into `fanwe_log` values('76','fanwe更新成功','1381730882','1','116.1.81.254','1','User','update');");
E_D("replace into `fanwe_log` values('77','admin登录成功','1381805946','1','124.72.64.57','1','Public','do_login');");
E_D("replace into `fanwe_log` values('78','yyyuuu删除成功','1381806152','1','124.72.64.57','1','User','delete');");
E_D("replace into `fanwe_log` values('79','admin管理员密码错误','1381839166','0','61.140.210.65','0','Public','do_login');");
E_D("replace into `fanwe_log` values('80','admin管理员密码错误','1381839174','0','61.140.210.65','0','Public','do_login');");
E_D("replace into `fanwe_log` values('81','admin登录成功','1381887582','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('82','admin登录成功','1381887605','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('83','admin登录成功','1381888951','1','61.140.210.65','1','Public','do_login');");
E_D("replace into `fanwe_log` values('84','12312312添加成功','1381889057','1','61.140.210.65','1','ArticleCate','insert');");
E_D("replace into `fanwe_log` values('85','admin管理员密码错误','1381908072','0','118.213.58.222','0','Public','do_login');");
E_D("replace into `fanwe_log` values('86','admin管理员密码错误','1381908092','0','118.213.58.222','0','Public','do_login');");
E_D("replace into `fanwe_log` values('87','admin管理员密码错误','1381908111','0','118.213.58.222','0','Public','do_login');");
E_D("replace into `fanwe_log` values('88','admin管理员密码错误','1381908138','0','118.213.58.222','0','Public','do_login');");
E_D("replace into `fanwe_log` values('89','admin登录成功','1381908179','1','118.213.58.222','1','Public','do_login');");
E_D("replace into `fanwe_log` values('90','企信通短信平台更新成功','1381908939','1','118.213.58.222','1','Sms','update');");
E_D("replace into `fanwe_log` values('91','admin登录成功','1381909088','1','125.40.22.109','1','Public','do_login');");
E_D("replace into `fanwe_log` values('92','admin登录成功','1381947426','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('93','管理员审核认证会员信息:codefly 工作认证','1381951306','1','125.46.90.1','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('94','admin登录成功','1381951751','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('95','admin登录成功','1381961870','1','117.89.55.165','1','Public','do_login');");
E_D("replace into `fanwe_log` values('96','国付宝支付安装成功','1381962128','1','117.89.55.165','1','Payment','insert');");
E_D("replace into `fanwe_log` values('97','国付宝支付更新成功','1381962662','1','117.89.55.165','1','Payment','update');");
E_D("replace into `fanwe_log` values('98','宝付支付安装成功','1381962838','1','117.89.55.165','1','Payment','insert');");
E_D("replace into `fanwe_log` values('99','网银在线安装成功','1381962897','1','117.89.55.165','1','Payment','insert');");
E_D("replace into `fanwe_log` values('100','admin管理员密码错误','1381963554','0','125.46.90.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('101','admin登录成功','1381963560','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('102','更新系统配置','1381965441','1','125.46.90.1','1','Conf','update');");
E_D("replace into `fanwe_log` values('103','admin管理员密码错误','1382051756','0','58.37.232.10','0','Public','do_login');");
E_D("replace into `fanwe_log` values('104','admin管理员密码错误','1382051765','0','58.37.232.10','0','Public','do_login');");
E_D("replace into `fanwe_log` values('105','admin管理员密码错误','1382051776','0','58.37.232.10','0','Public','do_login');");
E_D("replace into `fanwe_log` values('106','admin登录成功','1382058746','1','120.128.6.56','1','Public','do_login');");
E_D("replace into `fanwe_log` values('107','admin管理员密码错误','1382107745','0','117.63.159.23','0','Public','do_login');");
E_D("replace into `fanwe_log` values('108','admin管理员密码错误','1382107763','0','117.63.159.23','0','Public','do_login');");
E_D("replace into `fanwe_log` values('109','admin管理员密码错误','1382107779','0','117.63.159.23','0','Public','do_login');");
E_D("replace into `fanwe_log` values('110','admin管理员密码错误','1382107791','0','117.63.159.23','0','Public','do_login');");
E_D("replace into `fanwe_log` values('111','admin登录成功','1382164189','1','123.15.38.50','1','Public','do_login');");
E_D("replace into `fanwe_log` values('112','易宝支付安装成功','1382164227','1','123.15.38.50','1','Payment','insert');");
E_D("replace into `fanwe_log` values('113','易宝支付更新成功','1382164536','1','123.15.38.50','1','Payment','update');");
E_D("replace into `fanwe_log` values('114','admin登录成功','1382165245','1','120.128.6.33','1','Public','do_login');");
E_D("replace into `fanwe_log` values('115','如何借款顶部广告更新成功','1382175564','1','120.128.6.33','1','Adv','update');");
E_D("replace into `fanwe_log` values('116','admin登录成功','1382203417','1','120.128.6.33','1','Public','do_login');");
E_D("replace into `fanwe_log` values('117','公司简介更新成功','1382205342','1','120.128.6.33','1','Article','update');");
E_D("replace into `fanwe_log` values('118','admin登录成功','1382229116','1','123.15.38.50','1','Public','do_login');");
E_D("replace into `fanwe_log` values('119','关于我们更新成功','1382229222','1','123.15.38.50','1','Nav','update');");
E_D("replace into `fanwe_log` values('120','关于我们更新成功','1382229305','1','123.15.38.50','1','ArticleCate','update');");
E_D("replace into `fanwe_log` values('121','公司简介更新成功','1382229372','1','123.15.38.50','1','Article','update');");
E_D("replace into `fanwe_log` values('122','公司简介更新成功','1382229401','1','123.15.38.50','1','Article','update');");
E_D("replace into `fanwe_log` values('123','公司简介更新成功','1382229523','1','123.15.38.50','1','Article','update');");
E_D("replace into `fanwe_log` values('124','admin登录成功','1382290907','1','120.6.191.82','1','Public','do_login');");
E_D("replace into `fanwe_log` values('125','将的爽肤水添加成功','1382291289','1','120.6.191.82','1','Vote','insert');");
E_D("replace into `fanwe_log` values('126','admin登录成功','1382292750','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('127','管理员编辑帐户','1382295803','1','120.6.191.82','1','User','modify_account');");
E_D("replace into `fanwe_log` values('128','管理员编辑帐户','1382295975','1','120.6.191.82','1','User','modify_account');");
E_D("replace into `fanwe_log` values('129','admin登录成功','1382321020','1','125.46.90.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('130','admin管理员密码错误','1389501911','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('131','admin管理员密码错误','1389501922','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('132','admin管理员密码错误','1389501930','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('133','fanwe管理员帐号错误','1389501940','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('134','admin登录成功','1389502070','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('135','更新系统配置','1389511032','1','127.0.0.1','1','Conf','update');");
E_D("replace into `fanwe_log` values('136','阿莫借款更新成功','1389511602','1','127.0.0.1','1','Deal','update');");
E_D("replace into `fanwe_log` values('137','管理员审核认证会员信息:52jscn 身份认证','1389511635','1','127.0.0.1','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('138','管理员审核认证会员信息:52jscn 工作认证','1389511640','1','127.0.0.1','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('139','管理员审核认证会员信息:52jscn 信用报告','1389511645','1','127.0.0.1','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('140','管理员审核认证会员信息:52jscn 收入认证','1389511649','1','127.0.0.1','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('141','管理员审核认证会员信息:52jscn 房产认证','1389511744','1','127.0.0.1','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('142','管理员审核认证会员信息:52jscn 居住地证明','1389511755','1','127.0.0.1','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('143','阿莫借款更新成功','1389511769','1','127.0.0.1','1','Deal','update');");
E_D("replace into `fanwe_log` values('144','阿莫借款更新成功','1389511814','1','127.0.0.1','1','Deal','update');");
E_D("replace into `fanwe_log` values('145','admin登录成功','1403915479','1','114.105.220.11','1','Public','do_login');");
E_D("replace into `fanwe_log` values('146','admin登录成功','1403915617','1','106.37.11.22','1','Public','do_login');");
E_D("replace into `fanwe_log` values('147','龙胜网络科技测试添加成功','1403915790','1','114.105.220.11','1','Article','insert');");
E_D("replace into `fanwe_log` values('148','admin登录成功','1403916109','1','114.105.220.11','1','Public','do_login');");
E_D("replace into `fanwe_log` values('149','admin登录成功','1403916401','1','114.105.220.11','1','Public','do_login');");
E_D("replace into `fanwe_log` values('150','daiding更新成功','1403916433','1','114.105.220.11','1','Nav','update');");
E_D("replace into `fanwe_log` values('151','77彻底删除成功','1403916484','1','114.105.220.11','1','Link','foreverdelete');");
E_D("replace into `fanwe_log` values('152','12312312更新成功','1403916572','1','114.105.220.11','1','ArticleCate','update');");
E_D("replace into `fanwe_log` values('153','52jscn删除成功','1403916663','1','114.105.220.11','1','User','delete');");
E_D("replace into `fanwe_log` values('154','52076644更新成功','1403916682','1','114.105.220.11','1','User','update');");
E_D("replace into `fanwe_log` values('155','52076644更新成功','1403916872','1','114.105.220.11','1','User','update');");
E_D("replace into `fanwe_log` values('156','阿莫借款更新成功','1403916908','1','114.105.220.11','1','Deal','update');");
E_D("replace into `fanwe_log` values('157','资金周转更新成功','1403916929','1','114.105.220.11','1','Deal','update');");
E_D("replace into `fanwe_log` values('158','买车更新成功','1403916948','1','114.105.220.11','1','Deal','update');");
E_D("replace into `fanwe_log` values('159','52076644更新成功','1403917001','1','114.105.220.11','1','User','update');");
E_D("replace into `fanwe_log` values('160','管理员编辑会员工作信息','1403917041','1','114.105.220.11','1','User','modify_work');");
E_D("replace into `fanwe_log` values('161','管理员编辑帐户','1403917049','1','114.105.220.11','1','User','modify_account');");
E_D("replace into `fanwe_log` values('162','管理员审核认证会员信息:52076644 工作认证','1403917248','1','114.105.220.11','1','User','modify_passed');");
E_D("replace into `fanwe_log` values('163','管理员编辑帐户','1403917339','1','114.105.220.11','1','User','modify_account');");
E_D("replace into `fanwe_log` values('164','管理员编辑帐户','1403917377','1','114.105.220.11','1','User','modify_account');");
E_D("replace into `fanwe_log` values('165','龙胜网络贷款测试更新成功','1403917678','1','114.105.220.11','1','Deal','update');");
E_D("replace into `fanwe_log` values('166','qtwetehg更新成功','1403917701','1','114.105.220.11','1','Deal','update');");
E_D("replace into `fanwe_log` values('167','买车更新成功','1403917713','1','114.105.220.11','1','Deal','update');");
E_D("replace into `fanwe_log` values('168','资金周转更新成功','1403917731','1','114.105.220.11','1','Deal','update');");
E_D("replace into `fanwe_log` values('169','admin登录成功','1403920345','1','114.105.220.11','1','Public','do_login');");
E_D("replace into `fanwe_log` values('170','更新系统配置','1403920374','1','114.105.220.11','1','Conf','update');");
E_D("replace into `fanwe_log` values('171','fanwe更新成功','1403920448','1','114.105.220.11','1','User','update');");
E_D("replace into `fanwe_log` values('172','测试贷款更新成功','1403920698','1','114.105.220.11','1','Deal','update');");
E_D("replace into `fanwe_log` values('173','测试贷款更新成功','1403920736','1','114.105.220.11','1','Deal','update');");

require("../../inc/footer.php");
?>