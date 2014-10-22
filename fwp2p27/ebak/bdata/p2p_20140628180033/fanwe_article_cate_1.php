<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_article_cate`;");
E_C("CREATE TABLE `fanwe_article_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `brief` varchar(255) NOT NULL COMMENT '描述',
  `pid` int(11) NOT NULL,
  `is_effect` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `type_id` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `type_id` (`type_id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_article_cate` values('1','使用帮助','','0','1','0','1','4');");
E_D("replace into `fanwe_article_cate` values('2','关于我们','<img src=\"http://t1.baidu.com/it/u=2493507175,1780027295&fm=23&gp=0.jpg\">','0','1','0','1','3');");
E_D("replace into `fanwe_article_cate` values('3','安全保护','','0','1','0','1','2');");
E_D("replace into `fanwe_article_cate` values('4','了解更多','','0','1','0','1','1');");
E_D("replace into `fanwe_article_cate` values('5','网站公告','网站公告','0','1','0','2','5');");
E_D("replace into `fanwe_article_cate` values('6','使用技巧','','0','1','0','3','6');");
E_D("replace into `fanwe_article_cate` values('7','关于理财','','0','1','0','3','7');");
E_D("replace into `fanwe_article_cate` values('8','本金保障','<img src=\"./public/attachment/201303/02/17/5131c1ed03587.jpg\"/>','12','1','0','3','8');");
E_D("replace into `fanwe_article_cate` values('9','交易安全保障','<img src=\"./public/attachment/201303/02/17/5131c20d5db34.jpg\"/>','12','1','0','3','9');");
E_D("replace into `fanwe_article_cate` values('10','贷款审核与保障','<img src=\"./public/attachment/201303/02/17/5131c2460b952.jpg\"/>\r\np2p信贷拥有一套科学有效的信用审核标准和方法，对借款用户进行信用风险分析及信用等级分级。同时p2p信贷建立了完整严谨的风险管理体系包括贷前审核、贷中审查和贷后管理以控制借款逾期违约的风险。从创立开始，p2p信贷借款逾期率一直保持在0.9%以内，为业内最优水平。','12','1','0','3','10');");
E_D("replace into `fanwe_article_cate` values('11','网上理财安全建议','<img src=\"./public/attachment/201303/02/17/5131c25681025.jpg\"/>','12','1','0','3','11');");
E_D("replace into `fanwe_article_cate` values('12','安全保障','','0','1','0','3','12');");
E_D("replace into `fanwe_article_cate` values('13','帮助中心','','0','1','0','3','13');");
E_D("replace into `fanwe_article_cate` values('14','基本介绍','','13','1','0','3','14');");
E_D("replace into `fanwe_article_cate` values('15','借款人常见问题','','13','1','0','3','15');");
E_D("replace into `fanwe_article_cate` values('16','理财人常见问题','','13','1','0','3','16');");
E_D("replace into `fanwe_article_cate` values('17','产品及计划介绍','','13','1','0','3','17');");
E_D("replace into `fanwe_article_cate` values('18','账户充值、提现','','13','1','0','3','18');");
E_D("replace into `fanwe_article_cate` values('19','其他','','13','1','0','3','19');");
E_D("replace into `fanwe_article_cate` values('21','网站公告','','5','1','0','2','20');");

require("../../inc/footer.php");
?>