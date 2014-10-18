<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_userappfield`;");
E_C("CREATE TABLE `pre_home_userappfield` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `appid` mediumint(8) unsigned NOT NULL default '0',
  `profilelink` text NOT NULL,
  `myml` text NOT NULL,
  KEY `uid` (`uid`,`appid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>