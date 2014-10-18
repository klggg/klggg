<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_connect_guest`;");
E_C("CREATE TABLE `pre_common_connect_guest` (
  `conopenid` char(32) NOT NULL default '',
  `conuin` char(40) NOT NULL default '',
  `conuinsecret` char(16) NOT NULL default '',
  `conqqnick` char(100) NOT NULL default '',
  PRIMARY KEY  (`conopenid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>