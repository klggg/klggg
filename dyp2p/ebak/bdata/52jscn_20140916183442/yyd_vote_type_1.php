<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_vote_type`;");
E_C("CREATE TABLE `yyd_vote_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `order` int(11) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_vote_type` values('1','投资学习','tender_study','2','','10','1376101802','121.207.163.15');");
E_D("replace into `yyd_vote_type` values('2','借款学习','borrow_study','1','','10','1376101802','121.207.163.15');");

require("../../inc/footer.php");
?>