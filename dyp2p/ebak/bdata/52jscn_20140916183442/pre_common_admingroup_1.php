<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_admingroup`;");
E_C("CREATE TABLE `pre_common_admingroup` (
  `admingid` smallint(6) unsigned NOT NULL default '0',
  `alloweditpost` tinyint(1) NOT NULL default '0',
  `alloweditpoll` tinyint(1) NOT NULL default '0',
  `allowstickthread` tinyint(1) NOT NULL default '0',
  `allowmodpost` tinyint(1) NOT NULL default '0',
  `allowdelpost` tinyint(1) NOT NULL default '0',
  `allowmassprune` tinyint(1) NOT NULL default '0',
  `allowrefund` tinyint(1) NOT NULL default '0',
  `allowcensorword` tinyint(1) NOT NULL default '0',
  `allowviewip` tinyint(1) NOT NULL default '0',
  `allowbanip` tinyint(1) NOT NULL default '0',
  `allowedituser` tinyint(1) NOT NULL default '0',
  `allowmoduser` tinyint(1) NOT NULL default '0',
  `allowbanuser` tinyint(1) NOT NULL default '0',
  `allowbanvisituser` tinyint(1) NOT NULL default '0',
  `allowpostannounce` tinyint(1) NOT NULL default '0',
  `allowviewlog` tinyint(1) NOT NULL default '0',
  `allowbanpost` tinyint(1) NOT NULL default '0',
  `supe_allowpushthread` tinyint(1) NOT NULL default '0',
  `allowhighlightthread` tinyint(1) NOT NULL default '0',
  `allowdigestthread` tinyint(1) NOT NULL default '0',
  `allowrecommendthread` tinyint(1) NOT NULL default '0',
  `allowbumpthread` tinyint(1) NOT NULL default '0',
  `allowclosethread` tinyint(1) NOT NULL default '0',
  `allowmovethread` tinyint(1) NOT NULL default '0',
  `allowedittypethread` tinyint(1) NOT NULL default '0',
  `allowstampthread` tinyint(1) NOT NULL default '0',
  `allowstamplist` tinyint(1) NOT NULL default '0',
  `allowcopythread` tinyint(1) NOT NULL default '0',
  `allowmergethread` tinyint(1) NOT NULL default '0',
  `allowsplitthread` tinyint(1) NOT NULL default '0',
  `allowrepairthread` tinyint(1) NOT NULL default '0',
  `allowwarnpost` tinyint(1) NOT NULL default '0',
  `allowviewreport` tinyint(1) NOT NULL default '0',
  `alloweditforum` tinyint(1) NOT NULL default '0',
  `allowremovereward` tinyint(1) NOT NULL default '0',
  `allowedittrade` tinyint(1) NOT NULL default '0',
  `alloweditactivity` tinyint(1) NOT NULL default '0',
  `allowstickreply` tinyint(1) NOT NULL default '0',
  `allowmanagearticle` tinyint(1) NOT NULL default '0',
  `allowaddtopic` tinyint(1) NOT NULL default '0',
  `allowmanagetopic` tinyint(1) NOT NULL default '0',
  `allowdiy` tinyint(1) NOT NULL default '0',
  `allowclearrecycle` tinyint(1) NOT NULL default '0',
  `allowmanagetag` tinyint(1) NOT NULL default '0',
  `alloweditusertag` tinyint(1) NOT NULL default '0',
  `managefeed` tinyint(1) NOT NULL default '0',
  `managedoing` tinyint(1) NOT NULL default '0',
  `manageshare` tinyint(1) NOT NULL default '0',
  `manageblog` tinyint(1) NOT NULL default '0',
  `managealbum` tinyint(1) NOT NULL default '0',
  `managecomment` tinyint(1) NOT NULL default '0',
  `managemagiclog` tinyint(1) NOT NULL default '0',
  `managereport` tinyint(1) NOT NULL default '0',
  `managehotuser` tinyint(1) NOT NULL default '0',
  `managedefaultuser` tinyint(1) NOT NULL default '0',
  `managevideophoto` tinyint(1) NOT NULL default '0',
  `managemagic` tinyint(1) NOT NULL default '0',
  `manageclick` tinyint(1) NOT NULL default '0',
  `allowmanagecollection` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`admingid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_admingroup` values('1','1','1','3','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','3','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','1','1','1','1','1','1','1','1','1','1','1','1','1');");
E_D("replace into `pre_common_admingroup` values('2','1','0','2','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','3','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1');");
E_D("replace into `pre_common_admingroup` values('3','1','0','1','1','1','0','0','0','1','0','0','1','1','0','0','1','1','0','1','3','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_admingroup` values('16','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','1','1','1','1','1','0','0','1','0','0','0','0','0','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_admingroup` values('17','1','0','2','1','0','0','1','0','1','0','0','0','0','0','1','1','1','0','1','3','1','1','1','1','1','1','0','1','1','1','1','1','1','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_admingroup` values('18','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `pre_common_admingroup` values('19','0','0','0','1','0','0','0','0','1','1','0','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");

require("../../inc/footer.php");
?>