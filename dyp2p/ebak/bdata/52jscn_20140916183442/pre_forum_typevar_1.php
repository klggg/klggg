<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_typevar`;");
E_C("CREATE TABLE `pre_forum_typevar` (
  `sortid` smallint(6) NOT NULL default '0',
  `optionid` smallint(6) NOT NULL default '0',
  `available` tinyint(1) NOT NULL default '0',
  `required` tinyint(1) NOT NULL default '0',
  `unchangeable` tinyint(1) NOT NULL default '0',
  `search` tinyint(1) NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `subjectshow` tinyint(1) NOT NULL default '0',
  UNIQUE KEY `optionid` (`sortid`,`optionid`),
  KEY `sortid` (`sortid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>