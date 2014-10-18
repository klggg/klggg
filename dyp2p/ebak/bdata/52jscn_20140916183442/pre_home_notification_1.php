<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_home_notification`;");
E_C("CREATE TABLE `pre_home_notification` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `type` varchar(20) NOT NULL default '',
  `new` tinyint(1) NOT NULL default '0',
  `authorid` mediumint(8) unsigned NOT NULL default '0',
  `author` varchar(15) NOT NULL default '',
  `note` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL default '0',
  `from_id` mediumint(8) unsigned NOT NULL default '0',
  `from_idtype` varchar(20) NOT NULL default '',
  `from_num` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`,`new`,`dateline`),
  KEY `from_id` (`from_id`,`from_idtype`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>