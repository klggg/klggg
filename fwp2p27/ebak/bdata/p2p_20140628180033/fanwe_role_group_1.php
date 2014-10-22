<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_role_group`;");
E_C("CREATE TABLE `fanwe_role_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nav_id` int(11) NOT NULL COMMENT '后台导航分组ID',
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_role_group` values('1','首页','1','0','1','1');");
E_D("replace into `fanwe_role_group` values('34','贷款分类','6','0','1','11');");
E_D("replace into `fanwe_role_group` values('5','系统设置','3','0','1','1');");
E_D("replace into `fanwe_role_group` values('7','管理员','3','0','1','2');");
E_D("replace into `fanwe_role_group` values('8','数据库操作','3','0','1','6');");
E_D("replace into `fanwe_role_group` values('9','系统日志','3','0','1','7');");
E_D("replace into `fanwe_role_group` values('10','文章管理','5','0','1','8');");
E_D("replace into `fanwe_role_group` values('11','文章分类管理','5','0','1','9');");
E_D("replace into `fanwe_role_group` values('12','贷款管理','6','0','1','10');");
E_D("replace into `fanwe_role_group` values('70','借款类型','6','0','1','12');");
E_D("replace into `fanwe_role_group` values('16','支付接口','8','0','1','14');");
E_D("replace into `fanwe_role_group` values('18','会员管理','7','0','1','16');");
E_D("replace into `fanwe_role_group` values('19','前端设置','5','0','1','17');");
E_D("replace into `fanwe_role_group` values('21','消息模板管理','10','0','1','19');");
E_D("replace into `fanwe_role_group` values('71','提现申请管理','7','0','1','18');");
E_D("replace into `fanwe_role_group` values('24','充值订单','8','0','1','13');");
E_D("replace into `fanwe_role_group` values('35','会员配置','7','0','1','19');");
E_D("replace into `fanwe_role_group` values('26','消息留言分组','7','0','0','24');");
E_D("replace into `fanwe_role_group` values('27','消息留言管理','7','0','1','25');");
E_D("replace into `fanwe_role_group` values('28','邮件管理','10','0','1','26');");
E_D("replace into `fanwe_role_group` values('29','短信管理','10','0','1','27');");
E_D("replace into `fanwe_role_group` values('31','广告设置','5','0','1','29');");
E_D("replace into `fanwe_role_group` values('32','会员整合','7','0','1','30');");
E_D("replace into `fanwe_role_group` values('33','队列管理','10','0','1','31');");
E_D("replace into `fanwe_role_group` values('36','友情链接','5','0','1','32');");
E_D("replace into `fanwe_role_group` values('55','API登录','7','0','1','33');");
E_D("replace into `fanwe_role_group` values('66','站内消息','7','0','1','20');");
E_D("replace into `fanwe_role_group` values('72','会员举报管理','7','0','1','18');");
E_D("replace into `fanwe_role_group` values('73','机构管理','6','0','1','13');");

require("../../inc/footer.php");
?>