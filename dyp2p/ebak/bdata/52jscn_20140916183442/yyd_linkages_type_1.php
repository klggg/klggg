<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_linkages_type`;");
E_C("CREATE TABLE `yyd_linkages_type` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL COMMENT '????????',
  `nid` varchar(50) default NULL COMMENT '????????',
  `code` varchar(50) NOT NULL COMMENT '???????',
  `order` int(11) NOT NULL COMMENT '????',
  PRIMARY KEY  (`id`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_linkages_type` values('1','充值类型','account_recharge_type','account','10');");
E_D("replace into `yyd_linkages_type` values('2','充值状态','account_recharge_status','account','10');");
E_D("replace into `yyd_linkages_type` values('3','资金类型','account_type','account','10');");
E_D("replace into `yyd_linkages_type` values('4','银行账户状态','account_bank_status','account','10');");
E_D("replace into `yyd_linkages_type` values('5','借款状态','borrow_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('6','借款类型','borrow_type','borrow','10');");
E_D("replace into `yyd_linkages_type` values('7','借款种类','borrow_flag','borrow','10');");
E_D("replace into `yyd_linkages_type` values('8','借款分类','borrow_query_type','borrow','10');");
E_D("replace into `yyd_linkages_type` values('9','还款方式','borrow_style','borrow','10');");
E_D("replace into `yyd_linkages_type` values('10','借款用途','borrow_use','borrow','10');");
E_D("replace into `yyd_linkages_type` values('11','借款期限','borrow_period','borrow','10');");
E_D("replace into `yyd_linkages_type` values('12','投资最低限额','borrow_tender_account_min','borrow','10');");
E_D("replace into `yyd_linkages_type` values('13','投资最高限额','borrow_tender_account_max','borrow','10');");
E_D("replace into `yyd_linkages_type` values('14','可提现标','borrow_cash_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('15','是否部分借款','borrow_part_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('16','显示类型','borrow_view_type','borrow','10');");
E_D("replace into `yyd_linkages_type` values('17','奖励类型','borrow_award_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('18','担保人担保状态','borrow_vouch_user_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('19','担保奖励状态','borrow_vouch_award_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('20','投资状态','borrow_tender_verify_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('21','是否自动投标','borrow_tender_auto_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('22','投资状态','borrow_tender_status','borrow','10');");
E_D("replace into `yyd_linkages_type` values('23','学校类型','rating_school','rating','10');");
E_D("replace into `yyd_linkages_type` values('24','学历类型','rating_education','rating','10');");
E_D("replace into `yyd_linkages_type` values('25','认证状态','rating_approve_status','rating','10');");
E_D("replace into `yyd_linkages_type` values('26','认证状态','approve_status','approve','10');");
E_D("replace into `yyd_linkages_type` values('27','短信发送状态','approve_sms_status','approve','10');");
E_D("replace into `yyd_linkages_type` values('28','短信发送类型','approve_sms_type','approve','10');");
E_D("replace into `yyd_linkages_type` values('29','婚姻状况','rating_marry','rating','10');");
E_D("replace into `yyd_linkages_type` values('30','性别','rating_sex','rating','10');");
E_D("replace into `yyd_linkages_type` values('31','孩子','rating_children','rating','10');");
E_D("replace into `yyd_linkages_type` values('32','月收入','rating_income','rating','10');");
E_D("replace into `yyd_linkages_type` values('33','身份','rating_dignity','rating','10');");
E_D("replace into `yyd_linkages_type` values('34','是否购车','rating_car','rating','10');");
E_D("replace into `yyd_linkages_type` values('35','关系','rating_relation','rating','10');");
E_D("replace into `yyd_linkages_type` values('36','工作年限','rating_workyear','rating','10');");
E_D("replace into `yyd_linkages_type` values('37','负债类型','rating_assetstype','rating','10');");
E_D("replace into `yyd_linkages_type` values('38','资金流向','rating_use_type','rating','10');");
E_D("replace into `yyd_linkages_type` values('39','支出类型','rating_payment','rating','10');");
E_D("replace into `yyd_linkages_type` values('40','住房条件','rating_house','rating','10');");
E_D("replace into `yyd_linkages_type` values('41','收入类型','rating_revenue','rating','10');");
E_D("replace into `yyd_linkages_type` values('42','财务类型','rating_finance','rating','10');");
E_D("replace into `yyd_linkages_type` values('43','有效时间','borrow_valid_time','borrow','10');");
E_D("replace into `yyd_linkages_type` values('44','银行','account_bank','account','10');");
E_D("replace into `yyd_linkages_type` values('45','留言类型','liuyan_type','system','10');");
E_D("replace into `yyd_linkages_type` values('46','id5认证状态','approve_cardid_status','approve','10');");
E_D("replace into `yyd_linkages_type` values('47','借款金额','borrow_account','system','10');");
E_D("replace into `yyd_linkages_type` values('48','举报类型','rebut_type','system','10');");
E_D("replace into `yyd_linkages_type` values('49','借款状态','borrow_type_nid','system','10');");
E_D("replace into `yyd_linkages_type` values('50','好友类型','friends_type','system','10');");
E_D("replace into `yyd_linkages_type` values('51','月份','spread_month','system','10');");
E_D("replace into `yyd_linkages_type` values('52','网站垫付金额类型','account_web_type','system','10');");
E_D("replace into `yyd_linkages_type` values('53','网站资金类型','account_web_fee','system','10');");
E_D("replace into `yyd_linkages_type` values('54','提现成功','cash_success','system','10');");
E_D("replace into `yyd_linkages_type` values('55','风险池类型','fengxianchi_type','system','10');");
E_D("replace into `yyd_linkages_type` values('56','秒标限额','second_limit_money','system','10');");
E_D("replace into `yyd_linkages_type` values('57','借款对象','borrow_object','system','10');");
E_D("replace into `yyd_linkages_type` values('58','众筹项目类别','raise_type','system','10');");

require("../../inc/footer.php");
?>