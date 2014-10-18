<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_admins`;");
E_C("CREATE TABLE `pre_ucenter_admins` (
  `uid` mediumint(8) unsigned NOT NULL auto_increment,
  `username` char(15) NOT NULL default '',
  `allowadminsetting` tinyint(1) NOT NULL default '0',
  `allowadminapp` tinyint(1) NOT NULL default '0',
  `allowadminuser` tinyint(1) NOT NULL default '0',
  `allowadminbadword` tinyint(1) NOT NULL default '0',
  `allowadmintag` tinyint(1) NOT NULL default '0',
  `allowadminpm` tinyint(1) NOT NULL default '0',
  `allowadmincredits` tinyint(1) NOT NULL default '0',
  `allowadmindomain` tinyint(1) NOT NULL default '0',
  `allowadmindb` tinyint(1) NOT NULL default '0',
  `allowadminnote` tinyint(1) NOT NULL default '0',
  `allowadmincache` tinyint(1) NOT NULL default '0',
  `allowadminlog` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=gbk");
E_D("replace into `pre_ucenter_admins` values('1','admin','1','1','1','1','1','1','1','1','1','1','1','1');");
E_D("replace into `pre_ucenter_admins` values('54','ttw123','0','0','0','0','0','0','0','0','0','0','0','0');");

require("../../inc/footer.php");
?>