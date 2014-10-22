<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_work`;");
E_C("CREATE TABLE `fanwe_user_work` (
  `user_id` int(11) NOT NULL,
  `office` varchar(100) NOT NULL,
  `jobtype` varchar(50) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `officetype` varchar(50) NOT NULL,
  `officedomain` varchar(50) NOT NULL,
  `officecale` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `workyears` varchar(50) NOT NULL,
  `workphone` varchar(20) NOT NULL,
  `workemail` varchar(50) NOT NULL,
  `officeaddress` varchar(100) NOT NULL,
  `urgentcontact` varchar(20) NOT NULL,
  `urgentrelation` varchar(20) NOT NULL,
  `urgentmobile` varchar(20) NOT NULL,
  `urgentcontact2` varchar(20) NOT NULL,
  `urgentrelation2` varchar(20) NOT NULL,
  `urgentmobile2` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_work` values('3','rhahnnd','工薪阶层','52','502','央企（包括下级单位）','能源业','100-500人','srhwh','5000-10000元','1-3年（含）','010-2642646','sdtgeghwe','hgwehgw','jhdhf','dshgjh','74747356','egsegb','xdgs','643646');");
E_D("replace into `fanwe_user_work` values('6','sss','工薪阶层','52','517','国家机关','体育/艺术','10-100人','sssss','2000-5000元','3-5年（含）','0623-7777777','515930028@qq.com','wuxi','zeng','好','13665116666','在','钱钱钱','135555555555');");
E_D("replace into `fanwe_user_work` values('8','上海市','工薪阶层','26','3383','国家机关','公益组织','10人以下','经理','20000-50000元','1年（含）以下','021-222111','swdhweg@@126.com','上海舒','李四','朋友','1365576555','王五','朋友','13456454665');");
E_D("replace into `fanwe_user_work` values('12','士大夫似的','私营企业主','4','53','事业单位','娱乐服务业','10-100人','水电费','2000-5000元','1-3年（含）','0321-1212121','cn-dos@163.com','士大夫似的','士大夫似的','水电费','15831211111','士大夫','水电费','15832323232');");
E_D("replace into `fanwe_user_work` values('13','会尽快会尽快','私营企业主','7','99','事业单位','IT','10-100人','客户即可','1001-2000元','1年（含）以下','025-32231214','53453@qq.com','地方sd敢达发个','车车','哥哥','13699855542','大范甘迪','官方店','13855665412');");
E_D("replace into `fanwe_user_work` values('22','阿莫源码社区','工薪阶层','4','53','国家机关','制造业','10人以下','阿莫源码社区','1000元以下','1年（含）以下','0632-5878778','123456@qq.com','123456123456','123456','123456','123456','123456','123456','123456');");
E_D("replace into `fanwe_user_work` values('21','龙胜网络测试','工薪阶层','396','345','事业单位','体育/艺术','10人以下','龙胜网络测试','5000-10000元','3-5年（含）','222-22','222222222@qq.com','龙胜网络测试','龙胜网络测试','龙胜网络测试','222222222','龙胜网络测试','龙胜网络测试','2222222222');");
E_D("replace into `fanwe_user_work` values('1','测试贷款','网络商家','5','64','国家机关','政府机关','500人以上','测试贷款','20000-50000元','3-5年（含）','222-2222','2222@qq.com','测试贷款','测试贷款','测试贷款','22222','测试贷款','测试贷款','222');");

require("../../inc/footer.php");
?>