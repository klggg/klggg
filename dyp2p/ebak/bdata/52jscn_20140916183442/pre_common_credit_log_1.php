<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_credit_log`;");
E_C("CREATE TABLE `pre_common_credit_log` (
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `operation` char(3) NOT NULL default '',
  `relatedid` int(10) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  `extcredits1` int(10) NOT NULL,
  `extcredits2` int(10) NOT NULL,
  `extcredits3` int(10) NOT NULL,
  `extcredits4` int(10) NOT NULL,
  `extcredits5` int(10) NOT NULL,
  `extcredits6` int(10) NOT NULL,
  `extcredits7` int(10) NOT NULL,
  `extcredits8` int(10) NOT NULL,
  KEY `uid` (`uid`),
  KEY `operation` (`operation`),
  KEY `relatedid` (`relatedid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>