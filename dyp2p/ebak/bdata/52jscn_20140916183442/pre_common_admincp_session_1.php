<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_admincp_session`;");
E_C("CREATE TABLE `pre_common_admincp_session` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `adminid` smallint(6) unsigned NOT NULL default '0',
  `panel` tinyint(1) NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `errorcount` tinyint(1) NOT NULL default '0',
  `storage` mediumtext NOT NULL,
  PRIMARY KEY  (`uid`,`panel`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_admincp_session` values('53','1','1','127.0.0.1','1410891569','-1','');");

require("../../inc/footer.php");
?>