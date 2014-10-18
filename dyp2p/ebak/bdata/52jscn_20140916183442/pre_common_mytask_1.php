<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_mytask`;");
E_C("CREATE TABLE `pre_common_mytask` (
  `uid` mediumint(8) unsigned NOT NULL,
  `username` char(15) NOT NULL default '',
  `taskid` smallint(6) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `csc` char(255) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`taskid`),
  KEY `parter` (`taskid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>