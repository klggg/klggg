<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_ucenter_settings`;");
E_C("CREATE TABLE `pre_ucenter_settings` (
  `k` varchar(32) NOT NULL default '',
  `v` text NOT NULL,
  PRIMARY KEY  (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_ucenter_settings` values('accessemail','');");
E_D("replace into `pre_ucenter_settings` values('censoremail','');");
E_D("replace into `pre_ucenter_settings` values('censorusername','');");
E_D("replace into `pre_ucenter_settings` values('dateformat','y-n-j');");
E_D("replace into `pre_ucenter_settings` values('doublee','0');");
E_D("replace into `pre_ucenter_settings` values('nextnotetime','0');");
E_D("replace into `pre_ucenter_settings` values('timeoffset','28800');");
E_D("replace into `pre_ucenter_settings` values('privatepmthreadlimit','25');");
E_D("replace into `pre_ucenter_settings` values('chatpmthreadlimit','30');");
E_D("replace into `pre_ucenter_settings` values('chatpmmemberlimit','35');");
E_D("replace into `pre_ucenter_settings` values('pmfloodctrl','15');");
E_D("replace into `pre_ucenter_settings` values('pmcenter','1');");
E_D("replace into `pre_ucenter_settings` values('sendpmseccode','1');");
E_D("replace into `pre_ucenter_settings` values('pmsendregdays','0');");
E_D("replace into `pre_ucenter_settings` values('maildefault','username@21cn.com');");
E_D("replace into `pre_ucenter_settings` values('mailsend','1');");
E_D("replace into `pre_ucenter_settings` values('mailserver','smtp.21cn.com');");
E_D("replace into `pre_ucenter_settings` values('mailport','25');");
E_D("replace into `pre_ucenter_settings` values('mailauth','1');");
E_D("replace into `pre_ucenter_settings` values('mailfrom','UCenter <username@21cn.com>');");
E_D("replace into `pre_ucenter_settings` values('mailauth_username','username@21cn.com');");
E_D("replace into `pre_ucenter_settings` values('mailauth_password','password');");
E_D("replace into `pre_ucenter_settings` values('maildelimiter','0');");
E_D("replace into `pre_ucenter_settings` values('mailusername','1');");
E_D("replace into `pre_ucenter_settings` values('mailsilent','1');");
E_D("replace into `pre_ucenter_settings` values('version','1.6.0');");

require("../../inc/footer.php");
?>