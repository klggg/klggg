<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_loan_type`;");
E_C("CREATE TABLE `fanwe_deal_loan_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `pid` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT '' COMMENT '分类icon',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_loan_type` values('1','短期周转','','0','0','1','10','','./public/images/dealtype/dqzz.png');");
E_D("replace into `fanwe_deal_loan_type` values('2','购房借款','','0','0','1','9','','./public/images/dealtype/gf.png');");
E_D("replace into `fanwe_deal_loan_type` values('3','装修借款','','0','0','1','8','','./public/images/dealtype/zx.png');");
E_D("replace into `fanwe_deal_loan_type` values('4','个人消费','','0','0','1','7','','./public/images/dealtype/grxf.png');");
E_D("replace into `fanwe_deal_loan_type` values('5','婚礼筹备','','0','0','1','6','','./public/images/dealtype/hlcb.png');");
E_D("replace into `fanwe_deal_loan_type` values('6','教育培训','','0','0','1','5','','./public/images/dealtype/jypx.png');");
E_D("replace into `fanwe_deal_loan_type` values('7','汽车消费','','0','0','1','4','','./public/images/dealtype/qcxf.png');");
E_D("replace into `fanwe_deal_loan_type` values('8','投资创业','','0','0','1','3','','./public/images/dealtype/tzcy.png');");
E_D("replace into `fanwe_deal_loan_type` values('9','医疗支出','','0','0','1','2','','./public/images/dealtype/ylzc.png');");
E_D("replace into `fanwe_deal_loan_type` values('10','其他借款','','0','0','1','1','','./public/images/dealtype/other.png');");

require("../../inc/footer.php");
?>