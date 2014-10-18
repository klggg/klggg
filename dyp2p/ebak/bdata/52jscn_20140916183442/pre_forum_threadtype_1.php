<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_threadtype`;");
E_C("CREATE TABLE `pre_forum_threadtype` (
  `typeid` smallint(6) unsigned NOT NULL auto_increment,
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `displayorder` smallint(6) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `icon` varchar(255) NOT NULL default '',
  `special` smallint(6) NOT NULL default '0',
  `modelid` smallint(6) unsigned NOT NULL default '0',
  `expiration` tinyint(1) NOT NULL default '0',
  `template` text NOT NULL,
  `stemplate` text NOT NULL,
  `ptemplate` text NOT NULL,
  `btemplate` text NOT NULL,
  PRIMARY KEY  (`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>