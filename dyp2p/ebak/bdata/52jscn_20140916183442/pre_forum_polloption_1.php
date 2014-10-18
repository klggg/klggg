<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_polloption`;");
E_C("CREATE TABLE `pre_forum_polloption` (
  `polloptionid` int(10) unsigned NOT NULL auto_increment,
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `votes` mediumint(8) unsigned NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `polloption` varchar(80) NOT NULL default '',
  `voterids` mediumtext NOT NULL,
  PRIMARY KEY  (`polloptionid`),
  KEY `tid` (`tid`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>