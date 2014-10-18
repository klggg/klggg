<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_vars`;");
E_C("CREATE TABLE `pre_ucenter_vars` (
  `name` char(32) NOT NULL default '',
  `value` char(255) NOT NULL default '',
  PRIMARY KEY  (`name`)
) ENGINE=MEMORY DEFAULT CHARSET=gbk");
E_D("replace into `pre_ucenter_vars` values('noteexists','0');");
E_D("replace into `pre_ucenter_vars` values('noteexists1','1');");
E_D("replace into `pre_ucenter_vars` values('noteexists2','1');");

require("../../inc/footer.php");
?>