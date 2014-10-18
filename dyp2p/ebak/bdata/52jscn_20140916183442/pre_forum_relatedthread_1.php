<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_relatedthread`;");
E_C("CREATE TABLE `pre_forum_relatedthread` (
  `tid` mediumint(8) NOT NULL default '0',
  `type` enum('general','trade') NOT NULL default 'general',
  `expiration` int(10) NOT NULL default '0',
  `keywords` varchar(255) NOT NULL default '',
  `relatedthreads` text NOT NULL,
  PRIMARY KEY  (`tid`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>