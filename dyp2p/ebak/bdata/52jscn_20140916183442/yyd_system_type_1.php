<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_system_type`;");
E_C("CREATE TABLE `yyd_system_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `nid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_system_type` values('1','vip','vip费用','borrow','1','','');");
E_D("replace into `yyd_system_type` values('2','borrow','借款费用','borrow','1','','');");
E_D("replace into `yyd_system_type` values('3','account','资金费用','links','1','','');");
E_D("replace into `yyd_system_type` values('4','fengxianjin','风险金收费','borrow','1','','');");
E_D("replace into `yyd_system_type` values('5','spread','推广参数','account','1','','');");
E_D("replace into `yyd_system_type` values('6','other','其他','spread','1','','');");

require("../../inc/footer.php");
?>