<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_admincp_perm`;");
E_C("CREATE TABLE `pre_common_admincp_perm` (
  `cpgroupid` smallint(6) unsigned NOT NULL,
  `perm` varchar(255) NOT NULL,
  UNIQUE KEY `cpgroupperm` (`cpgroupid`,`perm`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_admincp_perm` values('1','albumcategory');");
E_D("replace into `pre_common_admincp_perm` values('1','article');");
E_D("replace into `pre_common_admincp_perm` values('1','block');");
E_D("replace into `pre_common_admincp_perm` values('1','blockstyle');");
E_D("replace into `pre_common_admincp_perm` values('1','blogcategory');");
E_D("replace into `pre_common_admincp_perm` values('1','diytemplate');");
E_D("replace into `pre_common_admincp_perm` values('1','portalcategory');");
E_D("replace into `pre_common_admincp_perm` values('1','topic');");
E_D("replace into `pre_common_admincp_perm` values('1','_allowpost');");
E_D("replace into `pre_common_admincp_perm` values('2','attach');");
E_D("replace into `pre_common_admincp_perm` values('2','forums');");
E_D("replace into `pre_common_admincp_perm` values('2','forums_merge');");
E_D("replace into `pre_common_admincp_perm` values('2','misc_attachtype');");
E_D("replace into `pre_common_admincp_perm` values('2','misc_censor');");
E_D("replace into `pre_common_admincp_perm` values('2','moderate_replies');");
E_D("replace into `pre_common_admincp_perm` values('2','moderate_threads');");
E_D("replace into `pre_common_admincp_perm` values('2','prune');");
E_D("replace into `pre_common_admincp_perm` values('2','recyclebin');");
E_D("replace into `pre_common_admincp_perm` values('2','report');");
E_D("replace into `pre_common_admincp_perm` values('2','threads');");
E_D("replace into `pre_common_admincp_perm` values('2','threads_forumstick');");
E_D("replace into `pre_common_admincp_perm` values('2','threads_postposition');");
E_D("replace into `pre_common_admincp_perm` values('2','threadtypes');");
E_D("replace into `pre_common_admincp_perm` values('2','_allowpost');");
E_D("replace into `pre_common_admincp_perm` values('3','attach_group');");
E_D("replace into `pre_common_admincp_perm` values('3','group_deletegroup');");
E_D("replace into `pre_common_admincp_perm` values('3','group_editgroup');");
E_D("replace into `pre_common_admincp_perm` values('3','group_level');");
E_D("replace into `pre_common_admincp_perm` values('3','group_manage');");
E_D("replace into `pre_common_admincp_perm` values('3','group_setting');");
E_D("replace into `pre_common_admincp_perm` values('3','group_type');");
E_D("replace into `pre_common_admincp_perm` values('3','group_userperm');");
E_D("replace into `pre_common_admincp_perm` values('3','prune_group');");
E_D("replace into `pre_common_admincp_perm` values('3','threads_group');");
E_D("replace into `pre_common_admincp_perm` values('3','_allowpost');");
E_D("replace into `pre_common_admincp_perm` values('4','album');");
E_D("replace into `pre_common_admincp_perm` values('4','blog');");
E_D("replace into `pre_common_admincp_perm` values('4','click');");
E_D("replace into `pre_common_admincp_perm` values('4','comment');");
E_D("replace into `pre_common_admincp_perm` values('4','doing');");
E_D("replace into `pre_common_admincp_perm` values('4','feed');");
E_D("replace into `pre_common_admincp_perm` values('4','pic');");
E_D("replace into `pre_common_admincp_perm` values('4','setting_home');");
E_D("replace into `pre_common_admincp_perm` values('4','share');");
E_D("replace into `pre_common_admincp_perm` values('4','_allowpost');");
E_D("replace into `pre_common_admincp_perm` values('5','admingroup');");
E_D("replace into `pre_common_admincp_perm` values('5','members_access');");
E_D("replace into `pre_common_admincp_perm` values('5','members_add');");
E_D("replace into `pre_common_admincp_perm` values('5','members_ban');");
E_D("replace into `pre_common_admincp_perm` values('5','members_clean');");
E_D("replace into `pre_common_admincp_perm` values('5','members_credit');");
E_D("replace into `pre_common_admincp_perm` values('5','members_edit');");
E_D("replace into `pre_common_admincp_perm` values('5','members_group');");
E_D("replace into `pre_common_admincp_perm` values('5','members_ipban');");
E_D("replace into `pre_common_admincp_perm` values('5','members_medal');");
E_D("replace into `pre_common_admincp_perm` values('5','members_newsletter');");
E_D("replace into `pre_common_admincp_perm` values('5','members_profile');");
E_D("replace into `pre_common_admincp_perm` values('5','members_repeat');");
E_D("replace into `pre_common_admincp_perm` values('5','members_reward');");
E_D("replace into `pre_common_admincp_perm` values('5','members_search');");
E_D("replace into `pre_common_admincp_perm` values('5','members_verify');");
E_D("replace into `pre_common_admincp_perm` values('5','moderate_members');");
E_D("replace into `pre_common_admincp_perm` values('5','specialuser_defaultuser');");
E_D("replace into `pre_common_admincp_perm` values('5','specialuser_follow');");
E_D("replace into `pre_common_admincp_perm` values('5','usergroups');");
E_D("replace into `pre_common_admincp_perm` values('5','verify_verify');");
E_D("replace into `pre_common_admincp_perm` values('5','_allowpost');");

require("../../inc/footer.php");
?>