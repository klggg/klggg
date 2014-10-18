<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_connect`;");
E_C("CREATE TABLE `pre_common_member_connect` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `conuin` char(40) NOT NULL default '',
  `conuinsecret` char(16) NOT NULL default '',
  `conopenid` char(32) NOT NULL default '',
  `conisfeed` tinyint(1) unsigned NOT NULL default '0',
  `conispublishfeed` tinyint(1) unsigned NOT NULL default '0',
  `conispublisht` tinyint(1) unsigned NOT NULL default '0',
  `conisregister` tinyint(1) unsigned NOT NULL default '0',
  `conisqzoneavatar` tinyint(1) unsigned NOT NULL default '0',
  `conisqqshow` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  KEY `conuin` (`conuin`),
  KEY `conopenid` (`conopenid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>