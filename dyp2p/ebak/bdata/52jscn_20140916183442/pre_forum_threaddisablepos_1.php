<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_forum_threaddisablepos`;");
E_C("CREATE TABLE `pre_forum_threaddisablepos` (
  `tid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) ENGINE=MEMORY DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>