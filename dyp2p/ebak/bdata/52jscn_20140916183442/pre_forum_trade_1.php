<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_trade`;");
E_C("CREATE TABLE `pre_forum_trade` (
  `tid` mediumint(8) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `typeid` smallint(6) unsigned NOT NULL,
  `sellerid` mediumint(8) unsigned NOT NULL,
  `seller` char(15) NOT NULL,
  `account` char(50) NOT NULL,
  `tenpayaccount` char(20) NOT NULL default '',
  `subject` char(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `amount` smallint(6) unsigned NOT NULL default '1',
  `quality` tinyint(1) unsigned NOT NULL default '0',
  `locus` char(20) NOT NULL,
  `transport` tinyint(1) NOT NULL default '0',
  `ordinaryfee` smallint(4) unsigned NOT NULL default '0',
  `expressfee` smallint(4) unsigned NOT NULL default '0',
  `emsfee` smallint(4) unsigned NOT NULL default '0',
  `itemtype` tinyint(1) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  `lastbuyer` char(15) NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL default '0',
  `totalitems` smallint(5) unsigned NOT NULL default '0',
  `tradesum` decimal(8,2) NOT NULL default '0.00',
  `closed` tinyint(1) NOT NULL default '0',
  `aid` mediumint(8) unsigned NOT NULL,
  `displayorder` tinyint(1) NOT NULL,
  `costprice` decimal(8,2) NOT NULL,
  `credit` int(10) unsigned NOT NULL default '0',
  `costcredit` int(10) unsigned NOT NULL default '0',
  `credittradesum` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tid`,`pid`),
  KEY `pid` (`pid`),
  KEY `sellerid` (`sellerid`),
  KEY `totalitems` (`totalitems`),
  KEY `tradesum` (`tradesum`),
  KEY `displayorder` (`tid`,`displayorder`),
  KEY `sellertrades` (`sellerid`,`tradesum`,`totalitems`),
  KEY `typeid` (`typeid`),
  KEY `credittradesum` (`credittradesum`),
  KEY `expiration` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>