<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_tradecomment`;");
E_C("CREATE TABLE `pre_forum_tradecomment` (
  `id` mediumint(8) NOT NULL auto_increment,
  `orderid` char(32) NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL,
  `raterid` mediumint(8) unsigned NOT NULL,
  `rater` char(15) NOT NULL,
  `rateeid` mediumint(8) unsigned NOT NULL,
  `ratee` char(15) NOT NULL,
  `message` char(200) NOT NULL,
  `explanation` char(200) NOT NULL,
  `score` tinyint(1) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `raterid` (`raterid`,`type`,`dateline`),
  KEY `rateeid` (`rateeid`,`type`,`dateline`),
  KEY `orderid` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>