<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_friends_type`;");
E_C("CREATE TABLE `yyd_users_friends_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `order` int(11) NOT NULL default '10' COMMENT '????',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_users_friends_type` values('1','╨цся','1','','','0');");
E_D("replace into `yyd_users_friends_type` values('2','еСся','1','','','0');");

require("../../inc/footer.php");
?>