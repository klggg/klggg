<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_forum_threadtable`;");
E_C("CREATE TABLE `pre_forum_forum_threadtable` (
  `fid` smallint(6) unsigned NOT NULL,
  `threadtableid` smallint(6) unsigned NOT NULL,
  `threads` int(11) unsigned NOT NULL default '0',
  `posts` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`fid`,`threadtableid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>