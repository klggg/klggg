<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_role_nav`;");
E_C("CREATE TABLE `fanwe_role_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_role_nav` values('1','首页','0','1','1');");
E_D("replace into `fanwe_role_nav` values('3','系统设置','0','1','10');");
E_D("replace into `fanwe_role_nav` values('5','前端设置','0','1','4');");
E_D("replace into `fanwe_role_nav` values('6','贷款管理','0','1','2');");
E_D("replace into `fanwe_role_nav` values('7','会员与留言','0','1','5');");
E_D("replace into `fanwe_role_nav` values('8','订单管理','0','1','5');");
E_D("replace into `fanwe_role_nav` values('10','短信邮件','0','1','7');");

require("../../inc/footer.php");
?>