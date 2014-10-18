<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_typeoptionvar`;");
E_C("CREATE TABLE `pre_forum_typeoptionvar` (
  `sortid` smallint(6) unsigned NOT NULL default '0',
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `optionid` smallint(6) unsigned NOT NULL default '0',
  `expiration` int(10) unsigned NOT NULL default '0',
  `value` mediumtext NOT NULL,
  KEY `sortid` (`sortid`),
  KEY `tid` (`tid`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>