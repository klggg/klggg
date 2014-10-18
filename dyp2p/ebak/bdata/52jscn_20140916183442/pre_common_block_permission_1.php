<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_block_permission`;");
E_C("CREATE TABLE `pre_common_block_permission` (
  `bid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `allowmanage` tinyint(1) NOT NULL default '0',
  `allowrecommend` tinyint(1) NOT NULL default '0',
  `needverify` tinyint(1) NOT NULL default '0',
  `inheritedtplname` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`bid`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>