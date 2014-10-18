<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_creditslog`;");
E_C("CREATE TABLE `pre_forum_creditslog` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `fromto` char(15) NOT NULL default '',
  `sendcredits` tinyint(1) NOT NULL default '0',
  `receivecredits` tinyint(1) NOT NULL default '0',
  `send` int(10) unsigned NOT NULL default '0',
  `receive` int(10) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `operation` char(3) NOT NULL default '',
  KEY `uid` (`uid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>