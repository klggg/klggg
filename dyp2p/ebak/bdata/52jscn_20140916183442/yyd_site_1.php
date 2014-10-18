<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_site`;");
E_C("CREATE TABLE `yyd_site` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT 'id',
  `menu_id` int(11) default NULL COMMENT '???id',
  `status` int(2) NOT NULL COMMENT '??',
  `name` varchar(255) default NULL COMMENT '???????',
  `nid` varchar(50) default NULL COMMENT '???????',
  `pid` int(2) default '0' COMMENT '????',
  `type` varchar(100) NOT NULL COMMENT '???????',
  `order` int(11) NOT NULL,
  `value` varchar(255) default NULL COMMENT '?',
  `remark` varchar(250) NOT NULL COMMENT '???',
  `litpic` varchar(50) default NULL,
  `index_tpl` varchar(250) default NULL,
  `list_tpl` varchar(250) default NULL,
  `content_tpl` varchar(250) default NULL,
  `keywords` varchar(250) default NULL,
  `description` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_site` values('1','1','1','首页','index','0','article','10','1','',NULL,'index.html','','','','');");
E_D("replace into `yyd_site` values('2','1','1','我要借出','invest','0','code','9','','',NULL,'tender.html','tender.html','tender_content.html','','');");
E_D("replace into `yyd_site` values('3','1','1','我要借入','borrow','0','code','8','','',NULL,'borrow.html','borrow_list.html','borrow_list.html','','');");
E_D("replace into `yyd_site` values('4','1','1','我的账户','user','0','url','7','/?user','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('35','1','0','如何借出','lend_principle','2','page','9','9','',NULL,'how_lend.html','how_lend.html','how_lend.html','','');");
E_D("replace into `yyd_site` values('5','1','0','我的圈子','group','0','article','6','1','',NULL,'group.html','group_list.html','group_content.html','','');");
E_D("replace into `yyd_site` values('36','1','0','我关注的列表','watchlist','2','page','8','5','',NULL,'watch_list.html','watch_list.html','watch_list.html','','');");
E_D("replace into `yyd_site` values('37','1','0','借出工具箱','tools','2','page','10','10','',NULL,'tools_lixi.html','tools_lixi.html','tools_lixi.html','','');");
E_D("replace into `yyd_site` values('131','1','1','申请借款','borrower','3','url','19','/borrow/index.html','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('20','1','0','帮助中心','help','0','article','3','11','',NULL,'help.html','help.html','help_content.html','','');");
E_D("replace into `yyd_site` values('54','1','1','借款列表','invest_1','2','url','15','/invest/index.html','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('28','1','1','工作原理','how_it_works','1','page','20','5','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('184','1','1','法律文本','hetong','1','article','17','38','',NULL,'list_index.html','list_index.html','list_content.html','','');");
E_D("replace into `yyd_site` values('30','1','1','费用说明','fees','1','page','18','7','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('129','1','0','关于我们','aboutus','0','article','8','16','',NULL,'about.html','about.html','about_content.html','','');");
E_D("replace into `yyd_site` values('41','1','0','信用借款','borrow_list','3','article','10','1','',NULL,'borrow_list.html','borrow_list.html','borrow_list.html','','');");
E_D("replace into `yyd_site` values('84','1','0','借款协议书','protocol','2','page','10','20','',NULL,'xieyi.html','xieyi.html','xieyi.html','','');");
E_D("replace into `yyd_site` values('86','1','0','借款学习','borrow_study','3','article','19','11','',NULL,'borrow_study.html','borrow_study.html','borrow_study.html','','');");
E_D("replace into `yyd_site` values('49','1','1','客服中心','help_serv','20','page','10','13','',NULL,'help_serv.html','help_serv.html','help_serv.html','','');");
E_D("replace into `yyd_site` values('50','1','0','工具箱','tool_lixi','3','page','12','14','',NULL,'tools_lixi.html','tools_lixi.html','tools_lixi.html','','');");
E_D("replace into `yyd_site` values('125','1','1','借款认证','att_center','3','article','18','1','',NULL,'att_center.html','att_center.html','att_center.html','','');");
E_D("replace into `yyd_site` values('55','1','1','逾期黑名单','blacklist','2','page','12','18','',NULL,'black.html','black.html','black.html','','');");
E_D("replace into `yyd_site` values('57','1','1','帮助中心','help_1','20','url','11','/help/index.html','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('63','1','0','新手上路','jczs','20','article','10','12','',NULL,'help_list.html','help_list.html','help_content.html','','');");
E_D("replace into `yyd_site` values('64','1','0','账户相关','zhxg','20','article','10','13','',NULL,'help_list.html','help_list.html','help_content.html','','');");
E_D("replace into `yyd_site` values('65','1','0','投资相关','tzxg','20','article','10','14','',NULL,'help_list.html','help_list.html','help_content.html','','');");
E_D("replace into `yyd_site` values('66','1','0','借款相关','jcxg','20','article','10','15','',NULL,'help_list.html','help_list.html','help_content.html','','');");
E_D("replace into `yyd_site` values('67','1','0','审核认证','shxg','20','article','10','22','',NULL,'help_list.html','help_list.html','help_content.html','','');");
E_D("replace into `yyd_site` values('68','1','0','协议文本','xywb','20','article','10','21','',NULL,'help_list.html','help_list.html','help_content.html','','');");
E_D("replace into `yyd_site` values('126','1','0','充值提现','qztx','20','article','10','11','',NULL,'help_list.html','help_list.html','help_content.html','','');");
E_D("replace into `yyd_site` values('71','1','1','我的主页','use','4','url','10','/?user','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('72','1','1','借出管理','bid','4','url','10','/?user&q=code/borrow/bid','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('73','1','1','借入管理','publish','4','url','10','/?user&q=code/borrow/publish','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('155','1','0','债权转让协议书','debt_protocol','2','page','10','26','',NULL,'xieyi.html','xieyi.html','xieyi.html','','');");
E_D("replace into `yyd_site` values('75','1','1','个人设置','rating','4','url','10','/?user&q=code/rating/basic','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('82','1','0','担保中的借款','vouch','2','code','14','payment','',NULL,'tender.html','tender.html','tender_content.html','','');");
E_D("replace into `yyd_site` values('80','1','0','复审中的借款','full_check','2','code','13','payment','',NULL,'tender.html','tender.html','tender_content.html','','');");
E_D("replace into `yyd_site` values('81','1','0','成功的借款','full_success','2','code','11','payment','',NULL,'tender.html','tender.html','tender_content.html','','');");
E_D("replace into `yyd_site` values('87','1','0','投资学习','tender_study','2','article','10','11','',NULL,'tender_study.html','tender_study.html','tender_study.html','','');");
E_D("replace into `yyd_site` values('88','1','0','担保学习测试','vouch_study','20','article','10','11','',NULL,'study.html','study.html','study.html','','');");
E_D("replace into `yyd_site` values('89','1','0','个人详情','borrow_info','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('90','1','0','增加支出','addpayment','3','article','10','1','',NULL,'addass.html','addass.html','addass.html','','');");
E_D("replace into `yyd_site` values('91','1','0','增加收入','addrevenue','3','article','10','1','',NULL,'addass.html','addass.html','addass.html','','');");
E_D("replace into `yyd_site` values('92','1','0','借款认证','borrow_att','3','article','10','1','',NULL,'borrow_att.html','borrow_att.html','borrow_att.html','','');");
E_D("replace into `yyd_site` values('93','1','0','工作单位信息','borrow_job','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('94','1','0','私营业主信息','borrow_company','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('95','1','0','财务状况','borrow_finance','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('96','1','0','主要联系人','borrow_contact','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('97','1','0','借款资料上传','addatt','3','article','10','1','',NULL,'addatt.html','addatt.html','addatt.html','','');");
E_D("replace into `yyd_site` values('98','1','0','借款基本认证','borrow_app','3','article','10','1','',NULL,'borrow_app.html','borrow_app.html','borrow_app.html','','');");
E_D("replace into `yyd_site` values('99','1','0','借款手机认证','borrow_phone','3','article','10','1','',NULL,'borrow_app.html','borrow_app.html','borrow_app.html','','');");
E_D("replace into `yyd_site` values('100','1','0','借款学历认证','borrow_edu','3','article','10','1','',NULL,'borrow_app.html','borrow_app.html','borrow_app.html','','');");
E_D("replace into `yyd_site` values('101','1','0','借款视频认证','borrow_video','3','article','10','1','',NULL,'borrow_app.html','borrow_app.html','borrow_app.html','','');");
E_D("replace into `yyd_site` values('104','1','1','债权转让列表','debt','2','code','14','payment','',NULL,'debt.html','debt.html','debt.html','','');");
E_D("replace into `yyd_site` values('183','1','1','成为投资者','tender_info','2','code','19','','',NULL,'tender_info.html','tender_info.html','tender_info.html','','');");
E_D("replace into `yyd_site` values('187','1','1','常见问题','jrcs','164','article','10','34','',NULL,'list_jrcs.html','list_jrcs.html','list_content.html','','');");
E_D("replace into `yyd_site` values('188','1','1','关于我们','about','1','url','14','/gsjj/index.html','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('190','1','0','vip','vip','0','code','10','','',NULL,'vip.html','vip.html','vip.html','','');");
E_D("replace into `yyd_site` values('191','1','0','额度工作详情','amount_job','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('114','1','0','如何借款','borrow_caption','3','article','20','16','',NULL,'caption.html','caption.html','caption.html','','');");
E_D("replace into `yyd_site` values('115','1','0','如何借出','tender_caption','2','article','20','16','',NULL,'caption.html','caption.html','caption.html','','');");
E_D("replace into `yyd_site` values('116','1','0','额度详情信息','amount_info','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('118','1','0','额度公司详情','amount_company','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('119','1','0','额度财务详情','amount_finance','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('120','1','0','额度联系方式','amount_contact','3','article','10','1','',NULL,'borrow_info.html','borrow_info.html','borrow_info.html','','');");
E_D("replace into `yyd_site` values('121','1','0','额度资料上传','amount_att','3','article','10','1','',NULL,'borrow_att.html','borrow_att.html','borrow_att.html','','');");
E_D("replace into `yyd_site` values('122','1','0','获得额度','amount','3','article','10','1','',NULL,'amount.html','amount.html','amount.html','','');");
E_D("replace into `yyd_site` values('123','1','0','马上借出','tender_finsh','2','article','19','1','',NULL,'tender_finsh.html','tender_finsh.html','tender_finsh.html','','');");
E_D("replace into `yyd_site` values('124','1','0','成功转让的债权','debt_success','2','article','10','1','',NULL,'debt_success.html','debt_success.html','debt_success.html','','');");
E_D("replace into `yyd_site` values('156','1','0','安全保障','aqbz','20','article','10','26','',NULL,'help_list.html','help_list.html','help_content.html','','');");
E_D("replace into `yyd_site` values('158','1','1','利息计算器','lxjsq','20','url','10','/tool_lixi/index.html','',NULL,'','','','','');");
E_D("replace into `yyd_site` values('164','1','0','新闻中心','news','1','code','16','','新闻中心',NULL,'news.html','news.html','news_content.html','新闻中心','新闻中心');");
E_D("replace into `yyd_site` values('165','1','1','最新公告','notice','164','article','10','6','最新公告',NULL,'list_notice.html','list_notice.html','list_content.html','最新公告','最新公告');");
E_D("replace into `yyd_site` values('166','1','1','媒体报道','reports','164','article','9','30','媒体报道',NULL,'list_report.html','list_report.html','list_content.html','媒体报道','媒体报道');");
E_D("replace into `yyd_site` values('172','1','1','客服中心','kefu','0','article','10','35','产品服务',NULL,'kefu.html','kefu_list.html','kefu_content.html','产品服务','产品服务');");
E_D("replace into `yyd_site` values('175','1','1','公司简介','gsjj','129','page','10','32','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('176','1','1','网站理念','wzln','129','page','10','52','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('177','1','1','公司执照','zxns','129','page','10','34','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('178','1','1','联系我们','contact','129','page','10','35','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('179','1','1','风险管控','fxgk','1','page','19','36','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('186','1','1','合作伙伴','hzhb','129','page','10','38','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('189','1','0','管理团队','friend_links','129','page','9','5','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('192','1','1','VIP协议书','vip_xieyi','190','page','10','27','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('193','1','1','高级VIP协议书','hvip_xieyi','190','page','10','28','',NULL,'index_content.html','','','','');");
E_D("replace into `yyd_site` values('196','1','1','网站地图','sitemap','129','article','10','11','',NULL,'sitemap.html','','','','');");
E_D("replace into `yyd_site` values('197','1','1','流转借款','flow','2','code','10','','流转借款',NULL,'flow.html','flow.html','tender_content.html','流转借款','流转借款');");
E_D("replace into `yyd_site` values('198','1','0','众筹项目','zhongchou','0','code','10','borrow','',NULL,'zhongchou.html','zhongchou.html','zhongchou_content.html','众筹 创业 项目 投资 支持','获得投资支持，实现你的创业梦想');");

require("../../inc/footer.php");
?>