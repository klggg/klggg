<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_invite`;");
E_C("CREATE TABLE `pre_common_invite` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `code` char(20) NOT NULL default '',
  `fuid` mediumint(8) unsigned NOT NULL default '0',
  `fusername` char(20) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  `email` char(40) NOT NULL default '',
  `inviteip` char(15) NOT NULL default '',
  `appid` mediumint(8) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `endtime` int(10) unsigned NOT NULL default '0',
  `regdateline` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '1',
  `orderid` char(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>