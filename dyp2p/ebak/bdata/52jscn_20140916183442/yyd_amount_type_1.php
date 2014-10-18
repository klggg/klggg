<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_amount_type`;");
E_C("CREATE TABLE `yyd_amount_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL COMMENT '????',
  `nid` varchar(50) NOT NULL COMMENT '?????',
  `remark` varchar(200) NOT NULL COMMENT '???',
  `order` int(11) NOT NULL COMMENT '????',
  `default` varchar(100) NOT NULL COMMENT '????',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>