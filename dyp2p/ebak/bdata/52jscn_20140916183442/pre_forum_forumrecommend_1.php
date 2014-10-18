<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_forumrecommend`;");
E_C("CREATE TABLE `pre_forum_forumrecommend` (
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `tid` mediumint(8) unsigned NOT NULL,
  `typeid` smallint(6) NOT NULL,
  `displayorder` tinyint(1) NOT NULL,
  `subject` char(80) NOT NULL,
  `author` char(15) NOT NULL,
  `authorid` mediumint(8) NOT NULL,
  `moderatorid` mediumint(8) NOT NULL,
  `expiration` int(10) unsigned NOT NULL,
  `position` tinyint(1) NOT NULL default '0',
  `highlight` tinyint(1) NOT NULL default '0',
  `aid` mediumint(8) unsigned NOT NULL default '0',
  `filename` char(100) NOT NULL default '',
  PRIMARY KEY  (`tid`),
  KEY `displayorder` (`fid`,`displayorder`),
  KEY `position` (`position`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>