<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_vote_answer`;");
E_C("CREATE TABLE `yyd_vote_answer` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `vote_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `status` int(2) NOT NULL COMMENT '??',
  `answer_status` int(2) NOT NULL COMMENT '????????',
  `order` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_vote_answer` values('9','3','两倍','A','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('10','3','三倍','B','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('11','3','四倍','C','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('12','3','五倍','D','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('13','4','注册','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('14','4','手机绑定','B','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('15','4','账户充值','C','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('16','4','投标','D','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('17','5','普通会员','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('18','5','VIP会员','B','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('19','5','高级VIP会员','C','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('20','5','白金会员','D','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('21','6','信用借款标','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('22','6','网站担保标','B','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('23','6','快速借款标','C','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('24','6','债权转让标','D','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('25','7','普通会员','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('26','7','VIP会员','B','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('27','7','高级VIP会员','C','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('28','7','白金会员','D','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('29','8','20元','A','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('30','8','50元','B','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('31','8','80元','C','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('32','8','100元','D','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('33','9','是','A','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('34','9','否','B','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('35','10','免费充值','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('36','10','风险金优先垫付','B','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('37','10','本金保障或本息保障','C','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('38','10','金币兑换礼品','D','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('39','11','50%','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('40','11','70%','B','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('41','11','80%','C','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('42','11','100%','D','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('43','12','30-33天','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('44','12','30-35天','B','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('45','12','30-38天','C','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('46','12','30-40天','D','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('47','1','18周岁以上具备完全民事行为能力','A','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('48','1','18-65岁','B','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('49','1','20-60岁','C','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('50','1','20-65岁','D','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('51','2','信用借款','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('52','2','网站担保借款','B','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('53','2','快速借款','C','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('54','2','抵押借款','D','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('55','13','人民币3,000-500,000','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('56','13','人民币2,000-300,000','B','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('57','13','人民币3,000-300,000','C','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('58','13','人民币2,000-500,000','D','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('59','14','1-12个月','A','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('60','14','1-15个月','B','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('61','14','1-18个月','C','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('62','14','1-24个月','D','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('63','15','AA-HR 7级','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('64','15','A-E 5级','B','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('65','15','A-F 6级','C','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('66','15','A-D 4级','D','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('67','16','以更低的成本获得借款','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('68','16','获得更高额度','B','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('69','16','增加投资人的信任','C','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('70','16','更容易获得借款','D','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('71','17','上传更多的证明材料','A','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('72','17','确保上传材料的真实性','B','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('73','17','按时还款','C','1','1','10','','','');");
E_D("replace into `yyd_vote_answer` values('74','17','升级收费会员','D','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('75','18','成交佣金','A','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('76','18','按信用等级收取的风险金','B','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('77','18','账户管理费','C','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('78','18','VIP会员费','D','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('79','19','0.2%','A','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('80','19','0.3%','B','1','1','0','','','');");
E_D("replace into `yyd_vote_answer` values('81','19','0.4%','C','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('82','19','0.5%','D','1','0','0','','','');");
E_D("replace into `yyd_vote_answer` values('83','20','不可以','A','1','0','10','','','');");
E_D("replace into `yyd_vote_answer` values('84','20','可以，但至少正常还款超过借款期限的1/2，且收取剩余本金1%的罚息','B','1','1','10','','','');");

require("../../inc/footer.php");
?>