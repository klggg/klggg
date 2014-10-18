<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_promotion`;");
E_C("CREATE TABLE `pre_forum_promotion` (
  `ip` char(15) NOT NULL default '',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(15) NOT NULL default '',
  PRIMARY KEY  (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>