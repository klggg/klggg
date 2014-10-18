<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_site_menu`;");
E_C("CREATE TABLE `yyd_site_menu` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL COMMENT '???????',
  `nid` varchar(100) NOT NULL COMMENT '?????',
  `contents` varchar(250) NOT NULL COMMENT '????',
  `order` int(11) NOT NULL COMMENT '????',
  `checked` int(2) NOT NULL COMMENT '??????',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_site_menu` values('2','ฒหตฅ2','p2p2','ฒหตฅ2','10','0');");
E_D("replace into `yyd_site_menu` values('1','ฒหตฅ1','2p1','','10','1');");

require("../../inc/footer.php");
?>