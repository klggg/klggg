<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_template_block`;");
E_C("CREATE TABLE `pre_common_template_block` (
  `targettplname` varchar(100) NOT NULL default '',
  `tpldirectory` varchar(80) NOT NULL default '',
  `bid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`targettplname`,`tpldirectory`,`bid`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_template_block` values('group/index','./template/default','1');");
E_D("replace into `pre_common_template_block` values('group/index','./template/default','2');");

require("../../inc/footer.php");
?>