<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_tradelog`;");
E_C("CREATE TABLE `pre_forum_tradelog` (
  `tid` mediumint(8) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `orderid` varchar(32) NOT NULL,
  `tradeno` varchar(32) NOT NULL,
  `paytype` tinyint(1) unsigned NOT NULL default '0',
  `subject` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL default '0.00',
  `quality` tinyint(1) unsigned NOT NULL default '0',
  `itemtype` tinyint(1) NOT NULL default '0',
  `number` smallint(5) unsigned NOT NULL default '0',
  `tax` decimal(6,2) unsigned NOT NULL default '0.00',
  `locus` varchar(100) NOT NULL,
  `sellerid` mediumint(8) unsigned NOT NULL,
  `seller` varchar(15) NOT NULL,
  `selleraccount` varchar(50) NOT NULL,
  `tenpayaccount` varchar(20) NOT NULL default '0',
  `buyerid` mediumint(8) unsigned NOT NULL,
  `buyer` varchar(15) NOT NULL,
  `buyercontact` varchar(50) NOT NULL,
  `buyercredits` smallint(5) unsigned NOT NULL default '0',
  `buyermsg` varchar(200) default NULL,
  `status` tinyint(1) NOT NULL default '0',
  `lastupdate` int(10) unsigned NOT NULL default '0',
  `offline` tinyint(1) NOT NULL default '0',
  `buyername` varchar(50) NOT NULL,
  `buyerzip` varchar(10) NOT NULL,
  `buyerphone` varchar(20) NOT NULL,
  `buyermobile` varchar(20) NOT NULL,
  `transport` tinyint(1) NOT NULL default '0',
  `transportfee` smallint(6) unsigned NOT NULL default '0',
  `baseprice` decimal(8,2) NOT NULL,
  `discount` tinyint(1) NOT NULL default '0',
  `ratestatus` tinyint(1) NOT NULL default '0',
  `message` text NOT NULL,
  `credit` int(10) unsigned NOT NULL default '0',
  `basecredit` int(10) unsigned NOT NULL default '0',
  UNIQUE KEY `orderid` (`orderid`),
  KEY `sellerid` (`sellerid`),
  KEY `buyerid` (`buyerid`),
  KEY `status` (`status`),
  KEY `buyerlog` (`buyerid`,`status`,`lastupdate`),
  KEY `sellerlog` (`sellerid`,`status`,`lastupdate`),
  KEY `tid` (`tid`,`pid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>