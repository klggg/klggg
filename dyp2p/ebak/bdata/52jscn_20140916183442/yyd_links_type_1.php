<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_links_type`;");
E_C("CREATE TABLE `yyd_links_type` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `typename` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_links_type` values('1','—网贷综合平台—');");
E_D("replace into `yyd_links_type` values('2','—网贷工具—');");
E_D("replace into `yyd_links_type` values('3','—查询平台—');");
E_D("replace into `yyd_links_type` values('4','—其他友情连接—');");

require("../../inc/footer.php");
?>