<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_session`;");
E_C("CREATE TABLE `pre_common_session` (
  `sid` char(6) NOT NULL default '',
  `ip1` tinyint(3) unsigned NOT NULL default '0',
  `ip2` tinyint(3) unsigned NOT NULL default '0',
  `ip3` tinyint(3) unsigned NOT NULL default '0',
  `ip4` tinyint(3) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(15) NOT NULL default '',
  `groupid` smallint(6) unsigned NOT NULL default '0',
  `invisible` tinyint(1) NOT NULL default '0',
  `action` tinyint(1) unsigned NOT NULL default '0',
  `lastactivity` int(10) unsigned NOT NULL default '0',
  `lastolupdate` int(10) unsigned NOT NULL default '0',
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `tid` mediumint(8) unsigned NOT NULL default '0',
  UNIQUE KEY `sid` (`sid`),
  KEY `uid` (`uid`)
) ENGINE=MEMORY DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_session` values('LFulz2','127','0','0','1','53','admin','1','0','0','1410891529','1410891540','0','0');");

require("../../inc/footer.php");
?>