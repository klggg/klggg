<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_usergroup_field`;");
E_C("CREATE TABLE `pre_common_usergroup_field` (
  `groupid` smallint(6) unsigned NOT NULL,
  `readaccess` tinyint(3) unsigned NOT NULL default '0',
  `allowpost` tinyint(1) NOT NULL default '0',
  `allowreply` tinyint(1) NOT NULL default '0',
  `allowpostpoll` tinyint(1) NOT NULL default '0',
  `allowpostreward` tinyint(1) NOT NULL default '0',
  `allowposttrade` tinyint(1) NOT NULL default '0',
  `allowpostactivity` tinyint(1) NOT NULL default '0',
  `allowdirectpost` tinyint(1) NOT NULL default '0',
  `allowgetattach` tinyint(1) NOT NULL default '0',
  `allowgetimage` tinyint(1) NOT NULL default '0',
  `allowpostattach` tinyint(1) NOT NULL default '0',
  `allowpostimage` tinyint(1) NOT NULL default '0',
  `allowvote` tinyint(1) NOT NULL default '0',
  `allowsearch` tinyint(1) NOT NULL default '0',
  `allowcstatus` tinyint(1) NOT NULL default '0',
  `allowinvisible` tinyint(1) NOT NULL default '0',
  `allowtransfer` tinyint(1) NOT NULL default '0',
  `allowsetreadperm` tinyint(1) NOT NULL default '0',
  `allowsetattachperm` tinyint(1) NOT NULL default '0',
  `allowposttag` tinyint(1) NOT NULL default '0',
  `allowhidecode` tinyint(1) NOT NULL default '0',
  `allowhtml` tinyint(1) NOT NULL default '0',
  `allowanonymous` tinyint(1) NOT NULL default '0',
  `allowsigbbcode` tinyint(1) NOT NULL default '0',
  `allowsigimgcode` tinyint(1) NOT NULL default '0',
  `allowmagics` tinyint(1) unsigned NOT NULL,
  `disableperiodctrl` tinyint(1) NOT NULL default '0',
  `reasonpm` tinyint(1) NOT NULL default '0',
  `maxprice` smallint(6) unsigned NOT NULL default '0',
  `maxsigsize` smallint(6) unsigned NOT NULL default '0',
  `maxattachsize` int(10) unsigned NOT NULL default '0',
  `maxsizeperday` int(10) unsigned NOT NULL default '0',
  `maxthreadsperhour` tinyint(3) unsigned NOT NULL default '0',
  `maxpostsperhour` tinyint(3) unsigned NOT NULL default '0',
  `attachextensions` char(100) NOT NULL default '',
  `raterange` char(150) NOT NULL default '',
  `mintradeprice` smallint(6) unsigned NOT NULL default '1',
  `maxtradeprice` smallint(6) unsigned NOT NULL default '0',
  `minrewardprice` smallint(6) unsigned NOT NULL default '1',
  `maxrewardprice` smallint(6) unsigned NOT NULL default '0',
  `magicsdiscount` tinyint(1) NOT NULL,
  `maxmagicsweight` smallint(6) unsigned NOT NULL,
  `allowpostdebate` tinyint(1) NOT NULL default '0',
  `tradestick` tinyint(1) unsigned NOT NULL,
  `exempt` tinyint(1) unsigned NOT NULL,
  `maxattachnum` smallint(6) NOT NULL default '0',
  `allowposturl` tinyint(1) NOT NULL default '3',
  `allowrecommend` tinyint(1) unsigned NOT NULL default '1',
  `allowpostrushreply` tinyint(1) NOT NULL default '0',
  `maxfriendnum` smallint(6) unsigned NOT NULL default '0',
  `maxspacesize` int(10) unsigned NOT NULL default '0',
  `allowcomment` tinyint(1) NOT NULL default '0',
  `allowcommentarticle` smallint(6) NOT NULL default '0',
  `searchinterval` smallint(6) unsigned NOT NULL default '0',
  `searchignore` tinyint(1) NOT NULL default '0',
  `allowblog` tinyint(1) NOT NULL default '0',
  `allowdoing` tinyint(1) NOT NULL default '0',
  `allowupload` tinyint(1) NOT NULL default '0',
  `allowshare` tinyint(1) NOT NULL default '0',
  `allowblogmod` tinyint(1) unsigned NOT NULL default '0',
  `allowdoingmod` tinyint(1) unsigned NOT NULL default '0',
  `allowuploadmod` tinyint(1) unsigned NOT NULL default '0',
  `allowsharemod` tinyint(1) unsigned NOT NULL default '0',
  `allowcss` tinyint(1) NOT NULL default '0',
  `allowpoke` tinyint(1) NOT NULL default '0',
  `allowfriend` tinyint(1) NOT NULL default '0',
  `allowclick` tinyint(1) NOT NULL default '0',
  `allowmagic` tinyint(1) NOT NULL default '0',
  `allowstat` tinyint(1) NOT NULL default '0',
  `allowstatdata` tinyint(1) NOT NULL default '0',
  `videophotoignore` tinyint(1) NOT NULL default '0',
  `allowviewvideophoto` tinyint(1) NOT NULL default '0',
  `allowmyop` tinyint(1) NOT NULL default '0',
  `magicdiscount` tinyint(1) NOT NULL default '0',
  `domainlength` smallint(6) unsigned NOT NULL default '0',
  `seccode` tinyint(1) NOT NULL default '1',
  `disablepostctrl` tinyint(1) NOT NULL default '0',
  `allowbuildgroup` tinyint(1) unsigned NOT NULL default '0',
  `allowgroupdirectpost` tinyint(1) unsigned NOT NULL default '0',
  `allowgroupposturl` tinyint(1) unsigned NOT NULL default '0',
  `edittimelimit` smallint(6) unsigned NOT NULL default '0',
  `allowpostarticle` tinyint(1) NOT NULL default '0',
  `allowdownlocalimg` tinyint(1) NOT NULL default '0',
  `allowdownremoteimg` tinyint(1) NOT NULL default '0',
  `allowpostarticlemod` tinyint(1) unsigned NOT NULL default '0',
  `allowspacediyhtml` tinyint(1) NOT NULL default '0',
  `allowspacediybbcode` tinyint(1) NOT NULL default '0',
  `allowspacediyimgcode` tinyint(1) NOT NULL default '0',
  `allowcommentpost` tinyint(1) NOT NULL default '2',
  `allowcommentitem` tinyint(1) NOT NULL default '0',
  `allowcommentreply` tinyint(1) NOT NULL default '0',
  `allowreplycredit` tinyint(1) NOT NULL default '0',
  `ignorecensor` tinyint(1) unsigned NOT NULL default '0',
  `allowsendallpm` tinyint(1) unsigned NOT NULL default '0',
  `allowsendpmmaxnum` smallint(6) unsigned NOT NULL default '0',
  `maximagesize` mediumint(8) unsigned NOT NULL default '0',
  `allowmediacode` tinyint(1) NOT NULL default '0',
  `allowat` smallint(6) unsigned NOT NULL default '0',
  `allowsetpublishdate` tinyint(1) unsigned NOT NULL default '0',
  `allowfollowcollection` tinyint(1) unsigned NOT NULL default '0',
  `allowcommentcollection` tinyint(1) unsigned NOT NULL default '0',
  `allowcreatecollection` smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_usergroup_field` values('1','200','1','1','1','1','1','1','3','1','1','1','1','1','127','1','1','1','1','1','1','1','1','1','1','1','2','1','0','30','500','2048000','0','0','0','','','1','0','1','0','0','200','1','5','255','0','3','1','1','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','1','1','1','1','1','0','5','1','1','30','3','3','0','1','1','1','0','1','1','1','3','1','0','1','1','1','0','0','1','50','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('2','150','1','1','1','1','1','1','3','1','1','1','1','1','95','1','1','1','1','1','0','1','0','1','1','1','2','1','0','20','300','2048000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','180','1','5','255','0','3','1','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','1','20','3','0','0','0','0','0','0','0','1','1','2','1','0','1','1','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('3','100','1','1','1','1','1','1','1','1','1','1','1','1','95','1','0','1','1','1','0','1','0','0','1','1','2','1','0','10','200','2048000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','160','1','5','224','0','3','1','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','1','15','3','0','0','0','0','0','0','0','1','1','2','1','0','1','1','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('4','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','1','0','1','0','0','0','0','5','0','0','3','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','3','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_usergroup_field` values('5','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','1','0','1','0','0','0','0','5','0','0','3','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','3','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_usergroup_field` values('6','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','1','0','1','0','0','0','0','5','0','0','3','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','3','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_usergroup_field` values('7','1','0','0','0','0','0','0','0','0','0','0','0','0','19','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','gif, jpg, jpeg, png','','1','0','1','0','0','0','0','5','0','0','3','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','1','0','0','3','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_usergroup_field` values('8','0','0','0','0','0','0','0','0','0','0','0','0','0','2','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','50','0','0','0','0','','','1','0','1','0','0','0','0','5','0','0','3','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','3','0','0','0','0','0','0','0','0','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_usergroup_field` values('9','0','0','0','0','0','0','0','0','0','0','0','0','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','chm,pdf,zip,rar,tar,gz,bzip2,gif,jpg,jpeg,png','','1','0','1','0','1','0','0','5','0','0','3','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','3','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_usergroup_field` values('10','10','1','1','1','1','1','1','0','1','1','1','1','1','95','0','0','0','0','0','0','0','0','0','1','0','1','0','0','0','80','1024000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','40','1','5','0','0','3','1','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','0','5','3','0','0','0','0','0','0','0','1','1','2','1','0','0','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('11','20','1','1','1','1','1','1','0','1','1','1','1','1','95','0','0','0','0','0','0','0','0','0','1','0','1','0','0','0','100','1024000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','60','1','5','0','0','3','1','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','0','5','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('12','30','1','1','1','1','1','1','0','1','1','1','1','1','95','0','0','0','0','0','0','0','0','0','1','0','1','0','0','0','150','1024000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','80','1','5','0','0','3','1','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','0','5','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('13','50','1','1','1','1','1','1','0','1','1','1','1','1','95','1','0','0','0','0','0','0','0','0','1','0','2','0','0','0','200','2048000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','100','1','5','0','0','3','1','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','0','1','0','10','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('14','70','1','1','1','1','1','1','0','1','1','1','1','1','95','1','0','0','1','1','0','0','0','0','1','1','2','0','0','0','300','2048000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','120','1','5','0','0','3','1','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','0','10','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('15','90','1','1','1','1','1','1','0','1','1','1','1','1','95','1','1','0','1','1','0','0','0','1','1','1','2','0','0','0','500','2048000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','140','1','5','0','0','3','1','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','0','10','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('16','100','1','1','1','1','1','1','1','1','1','1','1','1','95','1','0','1','1','1','0','1','0','0','1','1','2','1','0','10','200','2048000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','160','1','5','188','0','3','0','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','0','15','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('17','150','1','1','1','1','1','1','3','1','1','1','1','1','95','1','1','1','1','1','0','1','0','0','1','1','2','1','0','20','300','2048000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','180','1','5','255','0','3','0','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','1','15','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('18','200','1','1','1','1','1','1','3','1','1','1','1','1','95','0','1','1','1','1','0','1','1','1','1','1','2','0','0','30','500','0','0','0','1','','','1','0','1','0','0','200','1','5','255','0','3','3','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','15','1','1','5','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('19','100','1','1','1','1','1','1','1','1','1','1','1','1','95','1','0','1','1','1','0','1','0','0','1','1','2','1','0','10','200','2048000','0','0','0','chm, pdf, zip, rar, tar, gz, bzip2, gif, jpg, jpeg, png','','1','0','1','0','0','160','1','5','188','0','3','0','0','0','0','1','1000','0','0','1','1','1','1','0','0','0','0','0','1','1','1','0','0','0','0','0','1','0','5','1','1','15','3','0','0','0','0','0','0','0','1','1','2','1','0','1','0','0','0','0','0','0','0','30','1','5');");
E_D("replace into `pre_common_usergroup_field` values('20','1','0','0','0','0','0','0','0','1','1','0','0','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','1','0','1','0','0','0','0','0','0','0','3','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','2','0','0','0','0','0','0','0','0','0','0','0','0','0');");

require("../../inc/footer.php");
?>