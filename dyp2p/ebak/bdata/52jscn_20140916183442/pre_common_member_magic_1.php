<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_magic`;");
E_C("CREATE TABLE `pre_common_member_magic` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `magicid` smallint(6) unsigned NOT NULL default '0',
  `num` smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`,`magicid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>