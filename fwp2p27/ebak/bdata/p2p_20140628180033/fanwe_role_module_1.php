<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_role_module`;");
E_C("CREATE TABLE `fanwe_role_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_role_module` values('5','Role','权限组别','1','0');");
E_D("replace into `fanwe_role_module` values('6','Admin','管理员','1','0');");
E_D("replace into `fanwe_role_module` values('12','Conf','系统配置','1','0');");
E_D("replace into `fanwe_role_module` values('13','Database','数据库','1','0');");
E_D("replace into `fanwe_role_module` values('15','Log','系统日志','1','0');");
E_D("replace into `fanwe_role_module` values('17','Article','文章模块','1','0');");
E_D("replace into `fanwe_role_module` values('18','ArticleCate','文章分类','1','0');");
E_D("replace into `fanwe_role_module` values('19','File','文件管理','1','0');");
E_D("replace into `fanwe_role_module` values('118','Reportguy','举报管理','1','0');");
E_D("replace into `fanwe_role_module` values('58','Index','首页','1','0');");
E_D("replace into `fanwe_role_module` values('116','DealLoanType','借款类型','1','0');");
E_D("replace into `fanwe_role_module` values('28','DealCate','贷款分类','1','0');");
E_D("replace into `fanwe_role_module` values('29','Deal','贷款管理','1','0');");
E_D("replace into `fanwe_role_module` values('117','UserCarry','提现申请','1','0');");
E_D("replace into `fanwe_role_module` values('32','UserField','会员字段','1','0');");
E_D("replace into `fanwe_role_module` values('33','UserGroup','会员组别','1','0');");
E_D("replace into `fanwe_role_module` values('34','User','会员','1','0');");
E_D("replace into `fanwe_role_module` values('35','Delivery','配送方式','1','0');");
E_D("replace into `fanwe_role_module` values('36','Nav','导航菜单','1','0');");
E_D("replace into `fanwe_role_module` values('37','Payment','支付方式','1','0');");
E_D("replace into `fanwe_role_module` values('39','MsgTemplate','消息模板','1','0');");
E_D("replace into `fanwe_role_module` values('41','DealOrder','订单模块','1','0');");
E_D("replace into `fanwe_role_module` values('42','PaymentNotice','收款单','1','0');");
E_D("replace into `fanwe_role_module` values('44','MessageType','消息留言分组','1','0');");
E_D("replace into `fanwe_role_module` values('45','Message','消息留言','1','0');");
E_D("replace into `fanwe_role_module` values('46','MailList','邮件订阅','1','0');");
E_D("replace into `fanwe_role_module` values('47','MailServer','邮件服务器','1','0');");
E_D("replace into `fanwe_role_module` values('48','Sms','短信接口','1','0');");
E_D("replace into `fanwe_role_module` values('51','MobileList','短信订阅列表','1','0');");
E_D("replace into `fanwe_role_module` values('52','PromoteMsg','推广邮件短信','1','0');");
E_D("replace into `fanwe_role_module` values('53','Adv','广告模块','1','0');");
E_D("replace into `fanwe_role_module` values('54','Vote','投票调查','1','0');");
E_D("replace into `fanwe_role_module` values('55','Integrate','会员整合','1','0');");
E_D("replace into `fanwe_role_module` values('56','DealMsgList','业务群发队列','1','0');");
E_D("replace into `fanwe_role_module` values('57','PromoteMsgList','推广群发队列','1','0');");
E_D("replace into `fanwe_role_module` values('59','DeliveryRegion','配送地区','1','0');");
E_D("replace into `fanwe_role_module` values('60','LinkGroup','友情链接分组','1','0');");
E_D("replace into `fanwe_role_module` values('61','Link','友情链接','1','0');");
E_D("replace into `fanwe_role_module` values('77','ApiLogin','API登录','1','0');");
E_D("replace into `fanwe_role_module` values('92','Cache','缓存处理','1','0');");
E_D("replace into `fanwe_role_module` values('100','MsgSystem','站内消息群发','1','0');");
E_D("replace into `fanwe_role_module` values('101','MsgBox','消息记录','1','0');");
E_D("replace into `fanwe_role_module` values('108','Medal','勋章系统','1','0');");
E_D("replace into `fanwe_role_module` values('107','UserLevel','会员等级','1','0');");
E_D("replace into `fanwe_role_module` values('110','DarenSubmit','达人申请','1','0');");
E_D("replace into `fanwe_role_module` values('119','DealAgency','机构管理','1','0');");
E_D("replace into `fanwe_role_module` values('120','Statistics','借贷统计','1','0');");

require("../../inc/footer.php");
?>