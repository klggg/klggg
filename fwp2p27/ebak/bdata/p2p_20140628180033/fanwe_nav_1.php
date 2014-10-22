<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_nav`;");
E_C("CREATE TABLE `fanwe_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `blank` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `u_module` varchar(255) NOT NULL,
  `u_action` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_param` varchar(255) NOT NULL,
  `is_shop` tinyint(1) NOT NULL,
  `app_index` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_nav` values('1','首页','','0','5','1','index','','0','','0','index','0');");
E_D("replace into `fanwe_nav` values('2','我要理财','','0','0','1','deals','index','0','','0','index','0');");
E_D("replace into `fanwe_nav` values('3','我要贷款','','0','0','1','borrow','','0','','0','index','0');");
E_D("replace into `fanwe_nav` values('4','我的p2p信贷','','0','0','1','uc_center','','0','','0','index','0');");
E_D("replace into `fanwe_nav` values('5','安全保障','','0','0','1','guarantee','index','0','','0','index','0');");
E_D("replace into `fanwe_nav` values('6','龙胜网络','http://163u.taobao.com','0','0','1','','','0','','0','store','0');");
E_D("replace into `fanwe_nav` values('7','平台原理','','0','0','1','aboutp2p','','0','','0','index','1');");
E_D("replace into `fanwe_nav` values('8','政策法规','','0','0','1','aboutlaws','','0','','0','index','1');");
E_D("replace into `fanwe_nav` values('9','费用','','0','0','1','aboutfee','','0','','0','index','1');");
E_D("replace into `fanwe_nav` values('10','关于我们','','0','0','1','article','','0','id=1','0','index','1');");
E_D("replace into `fanwe_nav` values('11','个人贷款','','0','0','1','deals','index','0','','0','index','2');");
E_D("replace into `fanwe_nav` values('12','工具箱','','0','0','1','tool','','0','','0','index','2');");
E_D("replace into `fanwe_nav` values('13','关于理财','','0','0','1','deals','about','0','','0','index','2');");
E_D("replace into `fanwe_nav` values('14','成为理财人','','0','0','1','belender','','0','','0','index','2');");
E_D("replace into `fanwe_nav` values('15','贷款说明','','0','0','1','borrow','aboutborrow','0','','0','index','3');");
E_D("replace into `fanwe_nav` values('16','信用认证','','0','0','1','borrow','creditswitch','0','','0','index','3');");
E_D("replace into `fanwe_nav` values('17','申请贷款','','0','0','1','borrow','index','0','','0','index','3');");
E_D("replace into `fanwe_nav` values('18','我的主页','','0','0','1','uc_center','','0','','0','index','4');");
E_D("replace into `fanwe_nav` values('19','贷款管理','','0','0','1','uc_deal','refund','0','','0','index','4');");
E_D("replace into `fanwe_nav` values('20','投标管理','','0','0','1','uc_invest','','0','','0','index','4');");
E_D("replace into `fanwe_nav` values('21','个人设置','','0','0','1','uc_account','','0','','0','index','4');");
E_D("replace into `fanwe_nav` values('22','本金保障','','0','0','1','guarantee','detail','0','id=8','0','index','5');");
E_D("replace into `fanwe_nav` values('23','交易安全保障','','0','0','1','guarantee','detail','0','id=9','0','index','5');");
E_D("replace into `fanwe_nav` values('24','贷款审核与保障','','0','0','1','guarantee','detail','0','id=10','0','index','5');");
E_D("replace into `fanwe_nav` values('25','网上理财安全建议','','0','0','1','guarantee','detail','0','id=11','0','index','5');");

require("../../inc/footer.php");
?>