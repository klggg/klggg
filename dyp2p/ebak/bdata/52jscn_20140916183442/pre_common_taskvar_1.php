<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_taskvar`;");
E_C("CREATE TABLE `pre_common_taskvar` (
  `taskvarid` mediumint(8) unsigned NOT NULL auto_increment,
  `taskid` smallint(6) unsigned NOT NULL default '0',
  `sort` enum('apply','complete') NOT NULL default 'complete',
  `name` varchar(100) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `variable` varchar(40) NOT NULL default '',
  `type` varchar(20) NOT NULL default 'text',
  `value` text NOT NULL,
  PRIMARY KEY  (`taskvarid`),
  KEY `taskid` (`taskid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>