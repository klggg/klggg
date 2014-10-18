<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_vote`;");
E_C("CREATE TABLE `yyd_vote` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(2) NOT NULL COMMENT '??',
  `input` varchar(100) NOT NULL COMMENT '??????',
  `type_id` varchar(30) NOT NULL COMMENT '????????',
  `remark` varchar(200) NOT NULL,
  `order` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_vote` values('1','0','借款人需要满足的年龄？','1','radio','2','','10','0','1376101802','121.207.163.15');");
E_D("replace into `yyd_vote` values('2','0','借款有哪些类别？','0','checked','2','','10','0','1376101802','121.207.163.15');");
E_D("replace into `yyd_vote` values('3','0','根据国家法律，民间借贷的利率只要不超过银行同期贷款利率的几倍就受到法律保护？','1','radio','1','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('4','0','投资人在线的网络平台进行投资必须经过哪些环节？','1','checked','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('5','0','投资人分为哪几个等级？','1','checked','1','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('6','0','借款标主要有哪几类？','0','checked','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('7','0','在线的信用标和抵押借款标，只针对哪个等级的会员开放？','0','checked','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('8','0','投资人每次投标的最低额度是多少？','1','radio','1','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('9','0','是不是所有投资人的本金都享受本金保障计划？','0','radio','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('10','0','VIP级别或以上级别的投资人同普通投资人相比，享受哪些政策？','0','checked','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('11','0','普通投资人享受多少比例的本金保障？','0','radio','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('12','0','借款人当期借款逾期多少天后网站对会员进行相应比例的本金垫付？','0','radio','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('13','0','借款人的信用借款额度？','1','radio','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('14','0','借款的期限？','1','radio','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('15','0','借款的期限？的信用等级从高到低如何划分？','1','radio','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('16','0','较高的信用等级会有什么作用？','1','checked','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('17','0','如何提高信用等级？','1','checked','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('18','0','借款的服务收费有哪些？','0','checked','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('19','0','根据借款的期限，每月收取借款本金的多少作为管理费？','0','radio','2','','10','0','1376101802','27.154.84.209');");
E_D("replace into `yyd_vote` values('20','0','可以提前还贷吗？','1','radio','2','','10','0','1376101802','27.154.84.209');");

require("../../inc/footer.php");
?>