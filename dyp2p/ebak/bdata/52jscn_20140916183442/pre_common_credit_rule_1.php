<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_credit_rule`;");
E_C("CREATE TABLE `pre_common_credit_rule` (
  `rid` mediumint(8) unsigned NOT NULL auto_increment,
  `rulename` varchar(20) NOT NULL default '',
  `action` varchar(20) NOT NULL default '',
  `cycletype` tinyint(1) NOT NULL default '0',
  `cycletime` int(10) NOT NULL default '0',
  `rewardnum` tinyint(2) NOT NULL default '1',
  `norepeat` tinyint(1) NOT NULL default '0',
  `extcredits1` int(10) NOT NULL default '0',
  `extcredits2` int(10) NOT NULL default '0',
  `extcredits3` int(10) NOT NULL default '0',
  `extcredits4` int(10) NOT NULL default '0',
  `extcredits5` int(10) NOT NULL default '0',
  `extcredits6` int(10) NOT NULL default '0',
  `extcredits7` int(10) NOT NULL default '0',
  `extcredits8` int(10) NOT NULL default '0',
  `fids` text NOT NULL,
  PRIMARY KEY  (`rid`),
  UNIQUE KEY `action` (`action`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_credit_rule` values('1','发表主题','post','4','0','0','0','0','2','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('2','发表回复','reply','4','0','0','0','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('3','加精华','digest','4','0','0','0','0','5','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('4','上传附件','postattach','4','0','0','0','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('5','下载附件','getattach','4','0','0','0','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('6','发短消息','sendpm','4','0','0','0','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('7','搜索','search','4','0','0','0','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('8','访问推广','promotion_visit','4','0','0','0','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('9','注册推广','promotion_register','4','0','0','0','0','2','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('10','成功交易','tradefinished','4','0','0','0','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('11','邮箱认证','realemail','0','0','1','0','0','10','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('12','设置头像','setavatar','0','0','1','0','0','5','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('13','视频认证','videophoto','0','0','1','0','0','10','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('14','热点信息','hotinfo','4','0','0','0','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('15','每天登录','daylogin','1','0','1','0','0','2','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('16','访问别人空间','visit','1','0','10','2','0','2','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('17','打招呼','poke','1','0','10','2','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('18','留言','guestbook','1','0','20','2','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('19','被留言','getguestbook','1','0','5','2','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('20','发表记录','doing','1','0','5','0','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('21','发表日志','publishblog','1','0','3','0','0','2','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('22','参与投票','joinpoll','1','0','10','1','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('23','发起分享','createshare','1','0','3','0','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('24','评论','comment','1','0','40','1','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('25','被评论','getcomment','1','0','20','1','0','2','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('26','安装应用','installapp','4','0','0','3','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('27','使用应用','useapp','1','0','10','3','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('28','信息表态','click','1','0','10','1','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('29','修改域名','modifydomain','0','0','1','0','0','0','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('30','文章评论','portalcomment','1','0','40','1','0','1','0','0','0','0','0','0','');");
E_D("replace into `pre_common_credit_rule` values('31','淘专辑被订阅','followedcollection','1','0','3','0','0','1','0','0','0','0','0','0','');");

require("../../inc/footer.php");
?>