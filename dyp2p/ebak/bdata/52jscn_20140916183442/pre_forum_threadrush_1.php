<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_threadrush`;");
E_C("CREATE TABLE `pre_forum_threadrush` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  `stopfloor` mediumint(8) unsigned NOT NULL default '0',
  `starttimefrom` int(10) unsigned NOT NULL default '0',
  `starttimeto` int(10) unsigned NOT NULL default '0',
  `rewardfloor` text NOT NULL,
  `creditlimit` int(10) NOT NULL default '-996',
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>