<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_connect_feedlog`;");
E_C("CREATE TABLE `pre_connect_feedlog` (
  `flid` mediumint(8) unsigned NOT NULL auto_increment,
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `publishtimes` mediumint(8) unsigned NOT NULL default '0',
  `lastpublished` int(10) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`flid`),
  UNIQUE KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>