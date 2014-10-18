<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_imagetype`;");
E_C("CREATE TABLE `pre_forum_imagetype` (
  `typeid` smallint(6) unsigned NOT NULL auto_increment,
  `available` tinyint(1) NOT NULL default '0',
  `name` char(20) NOT NULL,
  `type` enum('smiley','icon','avatar') NOT NULL default 'smiley',
  `displayorder` tinyint(3) NOT NULL default '0',
  `directory` char(100) NOT NULL,
  PRIMARY KEY  (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk");
E_D("replace into `pre_forum_imagetype` values('1','1','д╛хо','smiley','1','default');");
E_D("replace into `pre_forum_imagetype` values('2','1','©А╨О','smiley','2','coolmonkey');");
E_D("replace into `pre_forum_imagetype` values('3','1','╢Т╢Тдп','smiley','3','grapeman');");

require("../../inc/footer.php");
?>