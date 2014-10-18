<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_remind_type`;");
E_C("CREATE TABLE `yyd_remind_type` (
  `id` int(11) NOT NULL auto_increment,
  `order` smallint(6) NOT NULL default '0',
  `name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `addtime` int(10) NOT NULL default '0',
  `addip` char(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_remind_type` values('1','10','资金站内信设置','account','0','');");
E_D("replace into `yyd_remind_type` values('2','10','贷款者站内信设置','borrow','0','');");
E_D("replace into `yyd_remind_type` values('3','10','投资者站内信设置','invest','0','');");

require("../../inc/footer.php");
?>