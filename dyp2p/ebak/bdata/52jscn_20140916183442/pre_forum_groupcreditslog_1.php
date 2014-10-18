<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_groupcreditslog`;");
E_C("CREATE TABLE `pre_forum_groupcreditslog` (
  `fid` mediumint(8) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL,
  `logdate` int(8) NOT NULL default '0',
  PRIMARY KEY  (`fid`,`uid`,`logdate`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>