<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_searchindex`;");
E_C("CREATE TABLE `pre_common_searchindex` (
  `searchid` int(10) unsigned NOT NULL auto_increment,
  `srchmod` tinyint(3) unsigned NOT NULL,
  `keywords` varchar(255) NOT NULL default '',
  `searchstring` text NOT NULL,
  `useip` varchar(15) NOT NULL default '',
  `uid` mediumint(10) unsigned NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  `threadsortid` smallint(6) unsigned NOT NULL default '0',
  `num` smallint(6) unsigned NOT NULL default '0',
  `ids` text NOT NULL,
  PRIMARY KEY  (`searchid`),
  KEY `srchmod` (`srchmod`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>