<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_medal`;");
E_C("CREATE TABLE `pre_common_member_medal` (
  `uid` mediumint(8) unsigned NOT NULL,
  `medalid` smallint(6) unsigned NOT NULL,
  PRIMARY KEY  (`uid`,`medalid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>