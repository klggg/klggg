<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_remind`;");
E_C("CREATE TABLE `yyd_remind` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `status` smallint(2) unsigned NOT NULL default '0' COMMENT '??',
  `order` smallint(6) NOT NULL default '0' COMMENT '????',
  `type_id` smallint(5) unsigned NOT NULL default '0' COMMENT '????',
  `message` smallint(2) unsigned NOT NULL default '0' COMMENT '?????',
  `email` smallint(2) unsigned NOT NULL default '0' COMMENT '????',
  `phone` smallint(2) unsigned NOT NULL default '0' COMMENT '???',
  `addtime` int(10) NOT NULL default '0',
  `addip` char(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>