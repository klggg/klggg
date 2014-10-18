<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_admin`;");
E_C("CREATE TABLE `yyd_users_admin` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `adminname` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `purview` longtext NOT NULL,
  `province` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  `update_time` varchar(50) NOT NULL,
  `update_ip` varchar(50) NOT NULL,
  `logintimes` int(50) NOT NULL default '0',
  `login_time` varchar(50) NOT NULL,
  `login_ip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_users_admin` values('1','admin','1','21232f297a57a5a743894a0e4a801fc3','1','众和贷','','439','451','','','1376101802','127.0.0.1','1393825998','115.199.53.74','2438','1405829277','106.4.196.124');");
E_D("replace into `yyd_users_admin` values('47','客服1','1934','dc483e80a7a0bd9ef71d8cf973673924','3','我是客服我怕谁','','2892','2938','123456789','13989479359','1383813609','113.134.32.246','1393600689','115.197.209.39','0','','');");

require("../../inc/footer.php");
?>