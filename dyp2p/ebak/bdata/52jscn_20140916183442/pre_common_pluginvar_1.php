<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_pluginvar`;");
E_C("CREATE TABLE `pre_common_pluginvar` (
  `pluginvarid` mediumint(8) unsigned NOT NULL auto_increment,
  `pluginid` smallint(6) unsigned NOT NULL default '0',
  `displayorder` tinyint(3) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `variable` varchar(40) NOT NULL default '',
  `type` varchar(20) NOT NULL default 'text',
  `value` text NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY  (`pluginvarid`),
  KEY `pluginid` (`pluginid`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_pluginvar` values('80','14','25','上一文字颜色','','textcolor1','color','#FFFF00','');");
E_D("replace into `pre_common_pluginvar` values('81','14','26','下一文字颜色','','textcolor2','color','#FF0000','');");
E_D("replace into `pre_common_pluginvar` values('82','14','27','滚动方向','','direction','select','3','1=向上滚动\r\n2=向下滚动\r\n3=向左滚动\r\n4=向右滚动');");
E_D("replace into `pre_common_pluginvar` values('83','14','28','滚动速度','数值越大,速度越慢,必须正整数\r\nIE不支持','speed','text','5','');");
E_D("replace into `pre_common_pluginvar` values('84','14','29','是否显示天气预报','','isweater','radio','0','');");
E_D("replace into `pre_common_pluginvar` values('85','14','30','天气预报显示位置','当选择右侧显示时,且LED屏高度小于天气预报高度时,LED屏会被撑高','weaterposition','select','2','1=LED屏右侧(当天)\r\n2=LED屏下方(七天)');");
E_D("replace into `pre_common_pluginvar` values('78','14','23','摘要和主题间距','数值越小间距越大','spacing','number','8','');");
E_D("replace into `pre_common_pluginvar` values('79','14','24','摘要长度是标题的几倍','数字越大字串越长.尽量用整数,小数也可,但最后一个字符可能是乱码','messagelen','number','2','');");
E_D("replace into `pre_common_pluginvar` values('77','14','22','是否显示简要内容','仅对帖子,开启后,将显示帖子部分内容,内容长度为标题的三倍.','ismessage','radio','1','');");
E_D("replace into `pre_common_pluginvar` values('75','14','20','文字字体','默认为 微软雅黑','typeface','text','华文琥珀','');");
E_D("replace into `pre_common_pluginvar` values('76','14','21','文字显示位置','仅上下滚动时有效','position','select','center','left=居左\r\ncenter=居中\r\nright=居右');");
E_D("replace into `pre_common_pluginvar` values('74','14','20','文字大小','','fontsize','number','30','');");
E_D("replace into `pre_common_pluginvar` values('73','14','19','LED屏边框宽度','','ledwidth','number','0','');");
E_D("replace into `pre_common_pluginvar` values('72','14','18','LED屏边框颜色','','ledcolor','color','#CCCCCC','');");
E_D("replace into `pre_common_pluginvar` values('70','14','16','LED屏高度','','ledheight','number','58','');");
E_D("replace into `pre_common_pluginvar` values('71','14','17','LED屏边框样式','','ledstyle','select','none','none=无\r\nsolid=实线\r\ndashed=虚线\r\ndotted=点线\r\ndouble=双实线\r\ngroove=浅灰实线\r\ninset=凹陷实线\r\noutset=凸起实线\r\nridge=隆起实线');");
E_D("replace into `pre_common_pluginvar` values('68','14','14','时钟选择','','clocks','select','2','1=卡片式\r\n2=LED灯');");
E_D("replace into `pre_common_pluginvar` values('69','14','15','LED背景图','绝对路径、相对路径均可,为空则自动调用默认图片\r\n有说背景难看、有说圆点太大、有说要红圆点……美化界面工作对我来说太难了，干脆加个图片链接，站长们自己作图吧^_^','ledimg','text','./source/plugin/drk_ledadv/image/drk_led.png','');");
E_D("replace into `pre_common_pluginvar` values('67','14','13','是否显示时钟','','showclock','radio','1','');");
E_D("replace into `pre_common_pluginvar` values('66','14','12','时钟显示宽度','','clockwidth','number','170','');");
E_D("replace into `pre_common_pluginvar` values('65','14','12','是否在文章页显示','','isview','radio','1','');");
E_D("replace into `pre_common_pluginvar` values('64','14','11','是否在频道列表页显示','','islist','radio','1','');");
E_D("replace into `pre_common_pluginvar` values('62','14','9','在投放版块帖子页头部显示','','istopictop','radio','1','');");
E_D("replace into `pre_common_pluginvar` values('63','14','10','是否在门户页面显示','如果选否,则下面的频道和文章选项无用','isportal','radio','0','');");
E_D("replace into `pre_common_pluginvar` values('60','14','7','投放版块','当上面选择了全局时,此处选择投放版块木用','forumss','forums','a:2:{i:0;s:2:\"54\";i:1;s:2:\"53\";}','');");
E_D("replace into `pre_common_pluginvar` values('61','14','8','在投放版块所在版区显示','是否在上面投放版块所在的版区显示LED屏','isfup','radio','1','');");
E_D("replace into `pre_common_pluginvar` values('58','14','6','是否全局','当选择全局时,下面所有投放选项都木用','isall','radio','1','');");
E_D("replace into `pre_common_pluginvar` values('59','14','7','是否在论坛首页显示','','isforum','radio','0','');");
E_D("replace into `pre_common_pluginvar` values('57','14','5','自定义广告语','一行一条广告语,书写规则   http://www.4dkj.net|四度空间   每行广告的链接地址和广告语用 | 隔离开','myadv','textarea','a|自定义广告1\r\nb|自定义广告2','');");
E_D("replace into `pre_common_pluginvar` values('55','14','3','各版块调用帖子数量','选择多版块时，调用数量不易太多，总量尽量控制最少，否则会增加服务器负担。','threadnum','number','2','');");
E_D("replace into `pre_common_pluginvar` values('56','14','4','帖子类型','','threadtype','select','1','1=最新主题\r\n2=关注最多\r\n3=回帖最多');");
E_D("replace into `pre_common_pluginvar` values('53','14','1','类型选择','按住 CTRL 多选','selecttype','select','1','1=仅显示帖子主题\r\n2=仅显示自定义广告语\r\n3=显示帖子主题+广告语');");
E_D("replace into `pre_common_pluginvar` values('54','14','2','版块选择','','forums','forums','a:2:{i:0;s:2:\"54\";i:1;s:2:\"53\";}','');");
E_D("replace into `pre_common_pluginvar` values('51','13','1','插件开关','','offset','radio','0','');");
E_D("replace into `pre_common_pluginvar` values('52','14','0','是否启用','','isopen','radio','1','');");
E_D("replace into `pre_common_pluginvar` values('50','13','5','会员列表开关','开启/关闭虚拟在线会员列表','offset_ml','radio','0','');");
E_D("replace into `pre_common_pluginvar` values('49','13','7','最高记录和时间','历史最高访问记录。格式：最高记录数（数值）|时间（2011-12-23）','onlineinfo','text','1529|2011-12-23','');");
E_D("replace into `pre_common_pluginvar` values('47','13','4','当前在线会员数','1、数值格式，例如：100，则当前在线会员数=实际在线会员数+100\r\n2、仅当会员列表开关关闭时有效','membercount','text','5','');");
E_D("replace into `pre_common_pluginvar` values('48','13','2','虚拟条件','小于此数时虚拟，填写数值。例如：286，即表示当前在线人数小于286时虚拟所有数据','minmember','text','5','');");
E_D("replace into `pre_common_pluginvar` values('46','13','3','当前在线人数','1、数值格式，例如：1000，则当前在线人数=实际在线人数+1000\r\n2、如果此数小于虚拟条件中的数值，则当前在线人数=虚拟条件','onlinenum','text','529','');");
E_D("replace into `pre_common_pluginvar` values('45','13','6','会员UID列表','在线会员列表数据，格式：会员uid|会员uid|会员uid|会员uid，例如：10|12|24|32|36|48','onlinelist','textarea','1|2|3|4|5','');");

require("../../inc/footer.php");
?>