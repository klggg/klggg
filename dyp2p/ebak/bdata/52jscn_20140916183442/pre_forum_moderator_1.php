<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_moderator`;");
E_C("CREATE TABLE `pre_forum_moderator` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `fid` mediumint(8) unsigned NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `inherited` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`uid`,`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>