<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_users_admin_type`;");
E_C("CREATE TABLE `yyd_users_admin_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `rank` text NOT NULL,
  `purview` text NOT NULL,
  `module` longtext NOT NULL,
  `remark` varchar(200) NOT NULL,
  `litpic` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  `update_time` varchar(50) NOT NULL,
  `update_ip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_users_admin_type` values('3','客服','kefu','','rating_educations,rating_job,rating_house,rating_company,rating_contact,rating_list,credit_list,users_vip','rating,users','我是客服我怕谁','','10','1376101802','127.0.0.1','1361692865','125.82.27.95');");
E_D("replace into `yyd_users_admin_type` values('1','超级管理员','all','','ucenter_user,links_list,comments_list,scrollpic_list,scrollpic_new,scrollpic_type,remind_list,rating_educations,rating_job,rating_company,rating_contact,rating_list,payment_list,approv_realname,approv_edu,approv_sms,approv_video,approv_flow,attestations_upload,attestations_uploads,vote_list,vote_type,credit_list,credit_log,credit_rank,credit_type,credit_class,account_list,account_log,account_bank,account_recharge,account_cash,account_recharge_new,account_web,account_users,borrow_all,borrow_shenqing,borrow_first,borrow_full,borrow_first_flow,borrow_repay,borrow_amount,borrow_change,borrow_fxc,borrow_tool,message_list,areas_list,system_clearcache,system_info,system_watermark,system_email,system_id5,system_upfiles,system_users_admin,system_users_admin_type,system_users_admin_log,site_list,site_new,site_menu,linkages_list,users_list,users_new,users_info,users_type,users_vip,users_examine,users_rebut,articles_list,articles_new,articles_type,articles_page_list,articles_page_new','ucenter,links,userinfo,comments,scrollpic,remind,rating,payment,approve,attestations,vote,credit,account,borrow,message,areas,system,site,linkages,users,articles','众和贷','','10','1376101802','127.0.0.1','1383793911','117.22.71.105');");
E_D("replace into `yyd_users_admin_type` values('10','认证审核人员','rz','','approv_realname,approv_edu,approv_sms,approv_video,attestations_list,attestations_upload,attestations_uploads,borrow_first,users_list,users_vip','approve,attestations,borrow,users','主要对实名认证和证明材料进行审核和管理','','10','1376101802','121.207.164.3','1344924176','58.221.237.50');");
E_D("replace into `yyd_users_admin_type` values('11','投资业务员','lc','','spread_tender','spread','','','10','1376101802','121.207.160.210','1340932710','119.129.75.51');");
E_D("replace into `yyd_users_admin_type` values('12','贷款业务员','dk','','spread_borrow','spread','','','10','1376101802','121.207.160.210','1340932685','119.129.75.51');");
E_D("replace into `yyd_users_admin_type` values('14','独立推广人','dl','','spread_other','spread','','','10','1376101802','27.154.208.44','1340932652','119.129.75.51');");
E_D("replace into `yyd_users_admin_type` values('16','财务人员','CW','','account_list,account_log,account_bank,account_recharge,account_cash,account_recharge_new,account_web,account_users,borrow_all,borrow_shenqing,borrow_first,borrow_full,borrow_first_flow,borrow_repay,borrow_amount,borrow_change,borrow_fxc,users_list,users_new,users_info,users_type,users_vip,users_examine,users_rebut','account,borrow,users','','','10','1376101802','119.129.55.16','1381804551','115.208.135.99');");
E_D("replace into `yyd_users_admin_type` values('17','技术人员','JS','','remind_list,rating_educations,rating_job,rating_house,rating_company,rating_contact,rating_list,group_list,group_type,group_member,group_articles,group_comments,approv_realname,approv_edu,approv_sms,approv_video,attestations_list,attestations_upload,attestations_uploads,vote_list,vote_type,credit_list,credit_log,credit_rank,credit_type,credit_class,message_list,areas_list,system_clearcache,system_info,system_watermark,system_email,system_id5,system_module,system_upfiles,site_list,site_new,site_menu,linkages_list,users_list,users_new,users_info,users_type,users_vip,users_examine,users_rebut,articles_list,articles_new,articles_type,articles_page_list,articles_page_new','remind,rating,group,approve,attestations,vote,credit,message,areas,system,site,linkages,users,articles','','','10','1376101802','119.129.55.16','1343727071','14.146.57.142');");
E_D("replace into `yyd_users_admin_type` values('20','超级客服','bk','','comments_list,remind_list,rating_educations,rating_job,rating_house,rating_company,rating_contact,rating_list,approv_realname,approv_edu,approv_sms,approv_video,attestations_upload,attestations_uploads,vote_list,vote_type,credit_list,credit_log,credit_rank,credit_type,credit_class,account_log,account_recharge,account_cash,borrow_all,borrow_shenqing,borrow_first,borrow_full,borrow_first_flow,borrow_repay,borrow_amount,borrow_change,message_list,areas_list,site_list,site_new,site_menu,linkages_list,users_list,users_new,users_info,users_type,users_vip,users_examine,users_rebut,articles_list,articles_new,articles_type,articles_page_list,articles_page_new','attestations,account,borrow','','','10','1376101802','122.80.19.141','1381482186','115.208.143.39');");

require("../../inc/footer.php");
?>