<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_member_profile_setting`;");
E_C("CREATE TABLE `pre_common_member_profile_setting` (
  `fieldid` varchar(255) NOT NULL default '',
  `available` tinyint(1) NOT NULL default '0',
  `invisible` tinyint(1) NOT NULL default '0',
  `needverify` tinyint(1) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `displayorder` smallint(6) unsigned NOT NULL default '0',
  `required` tinyint(1) NOT NULL default '0',
  `unchangeable` tinyint(1) NOT NULL default '0',
  `showincard` tinyint(1) NOT NULL default '0',
  `showinthread` tinyint(1) NOT NULL default '0',
  `showinregister` tinyint(1) NOT NULL default '0',
  `allowsearch` tinyint(1) NOT NULL default '0',
  `formtype` varchar(255) NOT NULL,
  `size` smallint(6) unsigned NOT NULL default '0',
  `choices` text NOT NULL,
  `validate` text NOT NULL,
  PRIMARY KEY  (`fieldid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_member_profile_setting` values('realname','1','0','0','真实姓名','','0','0','0','0','0','0','1','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('gender','1','0','0','性别','','0','0','0','0','0','0','1','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('birthyear','1','0','0','出生年份','','0','0','0','0','0','0','1','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('birthmonth','1','0','0','出生月份','','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('birthday','1','0','0','生日','','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('constellation','1','1','0','星座','星座(根据生日自动计算)','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('zodiac','1','1','0','生肖','生肖(根据生日自动计算)','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('telephone','1','1','0','固定电话','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('mobile','1','1','0','手机','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('idcardtype','1','1','0','证件类型','身份证 护照 驾驶证等','0','0','0','0','0','0','0','select','0','身份证\n护照\n驾驶证','');");
E_D("replace into `pre_common_member_profile_setting` values('idcard','1','1','0','证件号','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('address','1','1','0','邮寄地址','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('zipcode','1','1','0','邮编','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('nationality','0','0','0','国籍','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('birthprovince','1','0','0','出生省份','','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('birthcity','1','0','0','出生地','','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('birthdist','1','0','0','出生县','出生行政区/县','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('birthcommunity','1','0','0','出生小区','','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('resideprovince','1','0','0','居住省份','','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('residecity','1','0','0','居住地','','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('residedist','1','0','0','居住县','居住行政区/县','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('residecommunity','1','0','0','居住小区','','0','0','0','0','0','0','0','select','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('residesuite','0','0','0','房间','小区、写字楼门牌号','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('graduateschool','1','0','0','毕业学校','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('education','1','0','0','学历','','0','0','0','0','0','0','0','select','0','博士\n硕士\n本科\n专科\n中学\n小学\n其它','');");
E_D("replace into `pre_common_member_profile_setting` values('company','1','0','0','公司','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('occupation','1','0','0','职业','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('position','1','0','0','职位','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('revenue','1','1','0','年收入','单位 元','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('affectivestatus','1','1','0','情感状态','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('lookingfor','1','0','0','交友目的','希望在网站找到什么样的朋友','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('bloodtype','1','1','0','血型','','0','0','0','0','0','0','0','select','0','A\nB\nAB\nO\n其它','');");
E_D("replace into `pre_common_member_profile_setting` values('height','0','1','0','身高','单位 cm','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('weight','0','1','0','体重','单位 kg','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('alipay','1','1','0','支付宝','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('icq','0','1','0','ICQ','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('qq','1','1','0','QQ','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('yahoo','0','1','0','YAHOO帐号','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('msn','1','1','0','MSN','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('taobao','1','1','0','阿里旺旺','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('site','1','0','0','个人主页','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('bio','1','1','0','自我介绍','','0','0','0','0','0','0','0','textarea','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('interest','1','0','0','兴趣爱好','','0','0','0','0','0','0','0','textarea','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('field1','0','1','0','自定义字段1','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('field2','0','1','0','自定义字段2','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('field3','0','1','0','自定义字段3','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('field4','0','1','0','自定义字段4','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('field5','0','1','0','自定义字段5','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('field6','0','1','0','自定义字段6','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('field7','0','1','0','自定义字段7','','0','0','0','0','0','0','0','text','0','','');");
E_D("replace into `pre_common_member_profile_setting` values('field8','0','1','0','自定义字段8','','0','0','0','0','0','0','0','text','0','','');");

require("../../inc/footer.php");
?>