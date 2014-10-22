<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_region_conf`;");
E_C("CREATE TABLE `fanwe_region_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '地区名称',
  `region_level` tinyint(4) NOT NULL COMMENT '1:国 2:省 3:市(县) 4:区(镇)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3401 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_region_conf` values('3','1','安徽','2');");
E_D("replace into `fanwe_region_conf` values('4','1','福建','2');");
E_D("replace into `fanwe_region_conf` values('5','1','甘肃','2');");
E_D("replace into `fanwe_region_conf` values('6','1','广东','2');");
E_D("replace into `fanwe_region_conf` values('7','1','广西','2');");
E_D("replace into `fanwe_region_conf` values('8','1','贵州','2');");
E_D("replace into `fanwe_region_conf` values('9','1','海南','2');");
E_D("replace into `fanwe_region_conf` values('10','1','河北','2');");
E_D("replace into `fanwe_region_conf` values('11','1','河南','2');");
E_D("replace into `fanwe_region_conf` values('12','1','黑龙江','2');");
E_D("replace into `fanwe_region_conf` values('13','1','湖北','2');");
E_D("replace into `fanwe_region_conf` values('14','1','湖南','2');");
E_D("replace into `fanwe_region_conf` values('15','1','吉林','2');");
E_D("replace into `fanwe_region_conf` values('16','1','江苏','2');");
E_D("replace into `fanwe_region_conf` values('17','1','江西','2');");
E_D("replace into `fanwe_region_conf` values('18','1','辽宁','2');");
E_D("replace into `fanwe_region_conf` values('19','1','内蒙古','2');");
E_D("replace into `fanwe_region_conf` values('20','1','宁夏','2');");
E_D("replace into `fanwe_region_conf` values('21','1','青海','2');");
E_D("replace into `fanwe_region_conf` values('22','1','山东','2');");
E_D("replace into `fanwe_region_conf` values('23','1','山西','2');");
E_D("replace into `fanwe_region_conf` values('24','1','陕西','2');");
E_D("replace into `fanwe_region_conf` values('26','1','四川','2');");
E_D("replace into `fanwe_region_conf` values('28','1','西藏','2');");
E_D("replace into `fanwe_region_conf` values('29','1','新疆','2');");
E_D("replace into `fanwe_region_conf` values('30','1','云南','2');");
E_D("replace into `fanwe_region_conf` values('31','1','浙江','2');");
E_D("replace into `fanwe_region_conf` values('36','3','安庆','3');");
E_D("replace into `fanwe_region_conf` values('37','3','蚌埠','3');");
E_D("replace into `fanwe_region_conf` values('38','3','巢湖','3');");
E_D("replace into `fanwe_region_conf` values('39','3','池州','3');");
E_D("replace into `fanwe_region_conf` values('40','3','滁州','3');");
E_D("replace into `fanwe_region_conf` values('41','3','阜阳','3');");
E_D("replace into `fanwe_region_conf` values('42','3','淮北','3');");
E_D("replace into `fanwe_region_conf` values('43','3','淮南','3');");
E_D("replace into `fanwe_region_conf` values('44','3','黄山','3');");
E_D("replace into `fanwe_region_conf` values('45','3','六安','3');");
E_D("replace into `fanwe_region_conf` values('46','3','马鞍山','3');");
E_D("replace into `fanwe_region_conf` values('47','3','宿州','3');");
E_D("replace into `fanwe_region_conf` values('48','3','铜陵','3');");
E_D("replace into `fanwe_region_conf` values('49','3','芜湖','3');");
E_D("replace into `fanwe_region_conf` values('50','3','宣城','3');");
E_D("replace into `fanwe_region_conf` values('51','3','亳州','3');");
E_D("replace into `fanwe_region_conf` values('52','2','北京','2');");
E_D("replace into `fanwe_region_conf` values('53','4','福州','3');");
E_D("replace into `fanwe_region_conf` values('54','4','龙岩','3');");
E_D("replace into `fanwe_region_conf` values('55','4','南平','3');");
E_D("replace into `fanwe_region_conf` values('56','4','宁德','3');");
E_D("replace into `fanwe_region_conf` values('57','4','莆田','3');");
E_D("replace into `fanwe_region_conf` values('58','4','泉州','3');");
E_D("replace into `fanwe_region_conf` values('59','4','三明','3');");
E_D("replace into `fanwe_region_conf` values('60','4','厦门','3');");
E_D("replace into `fanwe_region_conf` values('61','4','漳州','3');");
E_D("replace into `fanwe_region_conf` values('62','5','兰州','3');");
E_D("replace into `fanwe_region_conf` values('63','5','白银','3');");
E_D("replace into `fanwe_region_conf` values('64','5','定西','3');");
E_D("replace into `fanwe_region_conf` values('65','5','甘南','3');");
E_D("replace into `fanwe_region_conf` values('66','5','嘉峪关','3');");
E_D("replace into `fanwe_region_conf` values('67','5','金昌','3');");
E_D("replace into `fanwe_region_conf` values('68','5','酒泉','3');");
E_D("replace into `fanwe_region_conf` values('69','5','临夏','3');");
E_D("replace into `fanwe_region_conf` values('70','5','陇南','3');");
E_D("replace into `fanwe_region_conf` values('71','5','平凉','3');");
E_D("replace into `fanwe_region_conf` values('72','5','庆阳','3');");
E_D("replace into `fanwe_region_conf` values('73','5','天水','3');");
E_D("replace into `fanwe_region_conf` values('74','5','武威','3');");
E_D("replace into `fanwe_region_conf` values('75','5','张掖','3');");
E_D("replace into `fanwe_region_conf` values('76','6','广州','3');");
E_D("replace into `fanwe_region_conf` values('77','6','深圳','3');");
E_D("replace into `fanwe_region_conf` values('78','6','潮州','3');");
E_D("replace into `fanwe_region_conf` values('79','6','东莞','3');");
E_D("replace into `fanwe_region_conf` values('80','6','佛山','3');");
E_D("replace into `fanwe_region_conf` values('81','6','河源','3');");
E_D("replace into `fanwe_region_conf` values('82','6','惠州','3');");
E_D("replace into `fanwe_region_conf` values('83','6','江门','3');");
E_D("replace into `fanwe_region_conf` values('84','6','揭阳','3');");
E_D("replace into `fanwe_region_conf` values('85','6','茂名','3');");
E_D("replace into `fanwe_region_conf` values('86','6','梅州','3');");
E_D("replace into `fanwe_region_conf` values('87','6','清远','3');");
E_D("replace into `fanwe_region_conf` values('88','6','汕头','3');");
E_D("replace into `fanwe_region_conf` values('89','6','汕尾','3');");
E_D("replace into `fanwe_region_conf` values('90','6','韶关','3');");
E_D("replace into `fanwe_region_conf` values('91','6','阳江','3');");
E_D("replace into `fanwe_region_conf` values('92','6','云浮','3');");
E_D("replace into `fanwe_region_conf` values('93','6','湛江','3');");
E_D("replace into `fanwe_region_conf` values('94','6','肇庆','3');");
E_D("replace into `fanwe_region_conf` values('95','6','中山','3');");
E_D("replace into `fanwe_region_conf` values('96','6','珠海','3');");
E_D("replace into `fanwe_region_conf` values('97','7','南宁','3');");
E_D("replace into `fanwe_region_conf` values('98','7','桂林','3');");
E_D("replace into `fanwe_region_conf` values('99','7','百色','3');");
E_D("replace into `fanwe_region_conf` values('100','7','北海','3');");
E_D("replace into `fanwe_region_conf` values('101','7','崇左','3');");
E_D("replace into `fanwe_region_conf` values('102','7','防城港','3');");
E_D("replace into `fanwe_region_conf` values('103','7','贵港','3');");
E_D("replace into `fanwe_region_conf` values('104','7','河池','3');");
E_D("replace into `fanwe_region_conf` values('105','7','贺州','3');");
E_D("replace into `fanwe_region_conf` values('106','7','来宾','3');");
E_D("replace into `fanwe_region_conf` values('107','7','柳州','3');");
E_D("replace into `fanwe_region_conf` values('108','7','钦州','3');");
E_D("replace into `fanwe_region_conf` values('109','7','梧州','3');");
E_D("replace into `fanwe_region_conf` values('110','7','玉林','3');");
E_D("replace into `fanwe_region_conf` values('111','8','贵阳','3');");
E_D("replace into `fanwe_region_conf` values('112','8','安顺','3');");
E_D("replace into `fanwe_region_conf` values('113','8','毕节','3');");
E_D("replace into `fanwe_region_conf` values('114','8','六盘水','3');");
E_D("replace into `fanwe_region_conf` values('115','8','黔东南','3');");
E_D("replace into `fanwe_region_conf` values('116','8','黔南','3');");
E_D("replace into `fanwe_region_conf` values('117','8','黔西南','3');");
E_D("replace into `fanwe_region_conf` values('118','8','铜仁','3');");
E_D("replace into `fanwe_region_conf` values('119','8','遵义','3');");
E_D("replace into `fanwe_region_conf` values('120','9','海口','3');");
E_D("replace into `fanwe_region_conf` values('121','9','三亚','3');");
E_D("replace into `fanwe_region_conf` values('122','9','白沙','3');");
E_D("replace into `fanwe_region_conf` values('123','9','保亭','3');");
E_D("replace into `fanwe_region_conf` values('124','9','昌江','3');");
E_D("replace into `fanwe_region_conf` values('125','9','澄迈县','3');");
E_D("replace into `fanwe_region_conf` values('126','9','定安县','3');");
E_D("replace into `fanwe_region_conf` values('127','9','东方','3');");
E_D("replace into `fanwe_region_conf` values('128','9','乐东','3');");
E_D("replace into `fanwe_region_conf` values('129','9','临高县','3');");
E_D("replace into `fanwe_region_conf` values('130','9','陵水','3');");
E_D("replace into `fanwe_region_conf` values('131','9','琼海','3');");
E_D("replace into `fanwe_region_conf` values('132','9','琼中','3');");
E_D("replace into `fanwe_region_conf` values('133','9','屯昌县','3');");
E_D("replace into `fanwe_region_conf` values('134','9','万宁','3');");
E_D("replace into `fanwe_region_conf` values('135','9','文昌','3');");
E_D("replace into `fanwe_region_conf` values('136','9','五指山','3');");
E_D("replace into `fanwe_region_conf` values('137','9','儋州','3');");
E_D("replace into `fanwe_region_conf` values('138','10','石家庄','3');");
E_D("replace into `fanwe_region_conf` values('139','10','保定','3');");
E_D("replace into `fanwe_region_conf` values('140','10','沧州','3');");
E_D("replace into `fanwe_region_conf` values('141','10','承德','3');");
E_D("replace into `fanwe_region_conf` values('142','10','邯郸','3');");
E_D("replace into `fanwe_region_conf` values('143','10','衡水','3');");
E_D("replace into `fanwe_region_conf` values('144','10','廊坊','3');");
E_D("replace into `fanwe_region_conf` values('145','10','秦皇岛','3');");
E_D("replace into `fanwe_region_conf` values('146','10','唐山','3');");
E_D("replace into `fanwe_region_conf` values('147','10','邢台','3');");
E_D("replace into `fanwe_region_conf` values('148','10','张家口','3');");
E_D("replace into `fanwe_region_conf` values('149','11','郑州','3');");
E_D("replace into `fanwe_region_conf` values('150','11','洛阳','3');");
E_D("replace into `fanwe_region_conf` values('151','11','开封','3');");
E_D("replace into `fanwe_region_conf` values('152','11','安阳','3');");
E_D("replace into `fanwe_region_conf` values('153','11','鹤壁','3');");
E_D("replace into `fanwe_region_conf` values('154','11','济源','3');");
E_D("replace into `fanwe_region_conf` values('155','11','焦作','3');");
E_D("replace into `fanwe_region_conf` values('156','11','南阳','3');");
E_D("replace into `fanwe_region_conf` values('157','11','平顶山','3');");
E_D("replace into `fanwe_region_conf` values('158','11','三门峡','3');");
E_D("replace into `fanwe_region_conf` values('159','11','商丘','3');");
E_D("replace into `fanwe_region_conf` values('160','11','新乡','3');");
E_D("replace into `fanwe_region_conf` values('161','11','信阳','3');");
E_D("replace into `fanwe_region_conf` values('162','11','许昌','3');");
E_D("replace into `fanwe_region_conf` values('163','11','周口','3');");
E_D("replace into `fanwe_region_conf` values('164','11','驻马店','3');");
E_D("replace into `fanwe_region_conf` values('165','11','漯河','3');");
E_D("replace into `fanwe_region_conf` values('166','11','濮阳','3');");
E_D("replace into `fanwe_region_conf` values('167','12','哈尔滨','3');");
E_D("replace into `fanwe_region_conf` values('168','12','大庆','3');");
E_D("replace into `fanwe_region_conf` values('169','12','大兴安岭','3');");
E_D("replace into `fanwe_region_conf` values('170','12','鹤岗','3');");
E_D("replace into `fanwe_region_conf` values('171','12','黑河','3');");
E_D("replace into `fanwe_region_conf` values('172','12','鸡西','3');");
E_D("replace into `fanwe_region_conf` values('173','12','佳木斯','3');");
E_D("replace into `fanwe_region_conf` values('174','12','牡丹江','3');");
E_D("replace into `fanwe_region_conf` values('175','12','七台河','3');");
E_D("replace into `fanwe_region_conf` values('176','12','齐齐哈尔','3');");
E_D("replace into `fanwe_region_conf` values('177','12','双鸭山','3');");
E_D("replace into `fanwe_region_conf` values('178','12','绥化','3');");
E_D("replace into `fanwe_region_conf` values('179','12','伊春','3');");
E_D("replace into `fanwe_region_conf` values('180','13','武汉','3');");
E_D("replace into `fanwe_region_conf` values('181','13','仙桃','3');");
E_D("replace into `fanwe_region_conf` values('182','13','鄂州','3');");
E_D("replace into `fanwe_region_conf` values('183','13','黄冈','3');");
E_D("replace into `fanwe_region_conf` values('184','13','黄石','3');");
E_D("replace into `fanwe_region_conf` values('185','13','荆门','3');");
E_D("replace into `fanwe_region_conf` values('186','13','荆州','3');");
E_D("replace into `fanwe_region_conf` values('187','13','潜江','3');");
E_D("replace into `fanwe_region_conf` values('188','13','神农架林区','3');");
E_D("replace into `fanwe_region_conf` values('189','13','十堰','3');");
E_D("replace into `fanwe_region_conf` values('190','13','随州','3');");
E_D("replace into `fanwe_region_conf` values('191','13','天门','3');");
E_D("replace into `fanwe_region_conf` values('192','13','咸宁','3');");
E_D("replace into `fanwe_region_conf` values('193','13','襄樊','3');");
E_D("replace into `fanwe_region_conf` values('194','13','孝感','3');");
E_D("replace into `fanwe_region_conf` values('195','13','宜昌','3');");
E_D("replace into `fanwe_region_conf` values('196','13','恩施','3');");
E_D("replace into `fanwe_region_conf` values('197','14','长沙','3');");
E_D("replace into `fanwe_region_conf` values('198','14','张家界','3');");
E_D("replace into `fanwe_region_conf` values('199','14','常德','3');");
E_D("replace into `fanwe_region_conf` values('200','14','郴州','3');");
E_D("replace into `fanwe_region_conf` values('201','14','衡阳','3');");
E_D("replace into `fanwe_region_conf` values('202','14','怀化','3');");
E_D("replace into `fanwe_region_conf` values('203','14','娄底','3');");
E_D("replace into `fanwe_region_conf` values('204','14','邵阳','3');");
E_D("replace into `fanwe_region_conf` values('205','14','湘潭','3');");
E_D("replace into `fanwe_region_conf` values('206','14','湘西','3');");
E_D("replace into `fanwe_region_conf` values('207','14','益阳','3');");
E_D("replace into `fanwe_region_conf` values('208','14','永州','3');");
E_D("replace into `fanwe_region_conf` values('209','14','岳阳','3');");
E_D("replace into `fanwe_region_conf` values('210','14','株洲','3');");
E_D("replace into `fanwe_region_conf` values('211','15','长春','3');");
E_D("replace into `fanwe_region_conf` values('212','15','吉林','3');");
E_D("replace into `fanwe_region_conf` values('213','15','白城','3');");
E_D("replace into `fanwe_region_conf` values('214','15','白山','3');");
E_D("replace into `fanwe_region_conf` values('215','15','辽源','3');");
E_D("replace into `fanwe_region_conf` values('216','15','四平','3');");
E_D("replace into `fanwe_region_conf` values('217','15','松原','3');");
E_D("replace into `fanwe_region_conf` values('218','15','通化','3');");
E_D("replace into `fanwe_region_conf` values('219','15','延边','3');");
E_D("replace into `fanwe_region_conf` values('220','16','南京','3');");
E_D("replace into `fanwe_region_conf` values('221','16','苏州','3');");
E_D("replace into `fanwe_region_conf` values('222','16','无锡','3');");
E_D("replace into `fanwe_region_conf` values('223','16','常州','3');");
E_D("replace into `fanwe_region_conf` values('224','16','淮安','3');");
E_D("replace into `fanwe_region_conf` values('225','16','连云港','3');");
E_D("replace into `fanwe_region_conf` values('226','16','南通','3');");
E_D("replace into `fanwe_region_conf` values('227','16','宿迁','3');");
E_D("replace into `fanwe_region_conf` values('228','16','泰州','3');");
E_D("replace into `fanwe_region_conf` values('229','16','徐州','3');");
E_D("replace into `fanwe_region_conf` values('230','16','盐城','3');");
E_D("replace into `fanwe_region_conf` values('231','16','扬州','3');");
E_D("replace into `fanwe_region_conf` values('232','16','镇江','3');");
E_D("replace into `fanwe_region_conf` values('233','17','南昌','3');");
E_D("replace into `fanwe_region_conf` values('234','17','抚州','3');");
E_D("replace into `fanwe_region_conf` values('235','17','赣州','3');");
E_D("replace into `fanwe_region_conf` values('236','17','吉安','3');");
E_D("replace into `fanwe_region_conf` values('237','17','景德镇','3');");
E_D("replace into `fanwe_region_conf` values('238','17','九江','3');");
E_D("replace into `fanwe_region_conf` values('239','17','萍乡','3');");
E_D("replace into `fanwe_region_conf` values('240','17','上饶','3');");
E_D("replace into `fanwe_region_conf` values('241','17','新余','3');");
E_D("replace into `fanwe_region_conf` values('242','17','宜春','3');");
E_D("replace into `fanwe_region_conf` values('243','17','鹰潭','3');");
E_D("replace into `fanwe_region_conf` values('244','18','沈阳','3');");
E_D("replace into `fanwe_region_conf` values('245','18','大连','3');");
E_D("replace into `fanwe_region_conf` values('246','18','鞍山','3');");
E_D("replace into `fanwe_region_conf` values('247','18','本溪','3');");
E_D("replace into `fanwe_region_conf` values('248','18','朝阳','3');");
E_D("replace into `fanwe_region_conf` values('249','18','丹东','3');");
E_D("replace into `fanwe_region_conf` values('250','18','抚顺','3');");
E_D("replace into `fanwe_region_conf` values('251','18','阜新','3');");
E_D("replace into `fanwe_region_conf` values('252','18','葫芦岛','3');");
E_D("replace into `fanwe_region_conf` values('253','18','锦州','3');");
E_D("replace into `fanwe_region_conf` values('254','18','辽阳','3');");
E_D("replace into `fanwe_region_conf` values('255','18','盘锦','3');");
E_D("replace into `fanwe_region_conf` values('256','18','铁岭','3');");
E_D("replace into `fanwe_region_conf` values('257','18','营口','3');");
E_D("replace into `fanwe_region_conf` values('258','19','呼和浩特','3');");
E_D("replace into `fanwe_region_conf` values('259','19','阿拉善盟','3');");
E_D("replace into `fanwe_region_conf` values('260','19','巴彦淖尔盟','3');");
E_D("replace into `fanwe_region_conf` values('261','19','包头','3');");
E_D("replace into `fanwe_region_conf` values('262','19','赤峰','3');");
E_D("replace into `fanwe_region_conf` values('263','19','鄂尔多斯','3');");
E_D("replace into `fanwe_region_conf` values('264','19','呼伦贝尔','3');");
E_D("replace into `fanwe_region_conf` values('265','19','通辽','3');");
E_D("replace into `fanwe_region_conf` values('266','19','乌海','3');");
E_D("replace into `fanwe_region_conf` values('267','19','乌兰察布市','3');");
E_D("replace into `fanwe_region_conf` values('268','19','锡林郭勒盟','3');");
E_D("replace into `fanwe_region_conf` values('269','19','兴安盟','3');");
E_D("replace into `fanwe_region_conf` values('270','20','银川','3');");
E_D("replace into `fanwe_region_conf` values('271','20','固原','3');");
E_D("replace into `fanwe_region_conf` values('272','20','石嘴山','3');");
E_D("replace into `fanwe_region_conf` values('273','20','吴忠','3');");
E_D("replace into `fanwe_region_conf` values('274','20','中卫','3');");
E_D("replace into `fanwe_region_conf` values('275','21','西宁','3');");
E_D("replace into `fanwe_region_conf` values('276','21','果洛','3');");
E_D("replace into `fanwe_region_conf` values('277','21','海北','3');");
E_D("replace into `fanwe_region_conf` values('278','21','海东','3');");
E_D("replace into `fanwe_region_conf` values('279','21','海南','3');");
E_D("replace into `fanwe_region_conf` values('280','21','海西','3');");
E_D("replace into `fanwe_region_conf` values('281','21','黄南','3');");
E_D("replace into `fanwe_region_conf` values('282','21','玉树','3');");
E_D("replace into `fanwe_region_conf` values('283','22','济南','3');");
E_D("replace into `fanwe_region_conf` values('284','22','青岛','3');");
E_D("replace into `fanwe_region_conf` values('285','22','滨州','3');");
E_D("replace into `fanwe_region_conf` values('286','22','德州','3');");
E_D("replace into `fanwe_region_conf` values('287','22','东营','3');");
E_D("replace into `fanwe_region_conf` values('288','22','菏泽','3');");
E_D("replace into `fanwe_region_conf` values('289','22','济宁','3');");
E_D("replace into `fanwe_region_conf` values('290','22','莱芜','3');");
E_D("replace into `fanwe_region_conf` values('291','22','聊城','3');");
E_D("replace into `fanwe_region_conf` values('292','22','临沂','3');");
E_D("replace into `fanwe_region_conf` values('293','22','日照','3');");
E_D("replace into `fanwe_region_conf` values('294','22','泰安','3');");
E_D("replace into `fanwe_region_conf` values('295','22','威海','3');");
E_D("replace into `fanwe_region_conf` values('296','22','潍坊','3');");
E_D("replace into `fanwe_region_conf` values('297','22','烟台','3');");
E_D("replace into `fanwe_region_conf` values('298','22','枣庄','3');");
E_D("replace into `fanwe_region_conf` values('299','22','淄博','3');");
E_D("replace into `fanwe_region_conf` values('300','23','太原','3');");
E_D("replace into `fanwe_region_conf` values('301','23','长治','3');");
E_D("replace into `fanwe_region_conf` values('302','23','大同','3');");
E_D("replace into `fanwe_region_conf` values('303','23','晋城','3');");
E_D("replace into `fanwe_region_conf` values('304','23','晋中','3');");
E_D("replace into `fanwe_region_conf` values('305','23','临汾','3');");
E_D("replace into `fanwe_region_conf` values('306','23','吕梁','3');");
E_D("replace into `fanwe_region_conf` values('307','23','朔州','3');");
E_D("replace into `fanwe_region_conf` values('308','23','忻州','3');");
E_D("replace into `fanwe_region_conf` values('309','23','阳泉','3');");
E_D("replace into `fanwe_region_conf` values('310','23','运城','3');");
E_D("replace into `fanwe_region_conf` values('311','24','西安','3');");
E_D("replace into `fanwe_region_conf` values('312','24','安康','3');");
E_D("replace into `fanwe_region_conf` values('313','24','宝鸡','3');");
E_D("replace into `fanwe_region_conf` values('314','24','汉中','3');");
E_D("replace into `fanwe_region_conf` values('315','24','商洛','3');");
E_D("replace into `fanwe_region_conf` values('316','24','铜川','3');");
E_D("replace into `fanwe_region_conf` values('317','24','渭南','3');");
E_D("replace into `fanwe_region_conf` values('318','24','咸阳','3');");
E_D("replace into `fanwe_region_conf` values('319','24','延安','3');");
E_D("replace into `fanwe_region_conf` values('320','24','榆林','3');");
E_D("replace into `fanwe_region_conf` values('321','25','上海','2');");
E_D("replace into `fanwe_region_conf` values('322','26','成都','3');");
E_D("replace into `fanwe_region_conf` values('323','26','绵阳','3');");
E_D("replace into `fanwe_region_conf` values('324','26','阿坝','3');");
E_D("replace into `fanwe_region_conf` values('325','26','巴中','3');");
E_D("replace into `fanwe_region_conf` values('326','26','达州','3');");
E_D("replace into `fanwe_region_conf` values('327','26','德阳','3');");
E_D("replace into `fanwe_region_conf` values('328','26','甘孜','3');");
E_D("replace into `fanwe_region_conf` values('329','26','广安','3');");
E_D("replace into `fanwe_region_conf` values('330','26','广元','3');");
E_D("replace into `fanwe_region_conf` values('331','26','乐山','3');");
E_D("replace into `fanwe_region_conf` values('332','26','凉山','3');");
E_D("replace into `fanwe_region_conf` values('333','26','眉山','3');");
E_D("replace into `fanwe_region_conf` values('334','26','南充','3');");
E_D("replace into `fanwe_region_conf` values('335','26','内江','3');");
E_D("replace into `fanwe_region_conf` values('336','26','攀枝花','3');");
E_D("replace into `fanwe_region_conf` values('337','26','遂宁','3');");
E_D("replace into `fanwe_region_conf` values('338','26','雅安','3');");
E_D("replace into `fanwe_region_conf` values('339','26','宜宾','3');");
E_D("replace into `fanwe_region_conf` values('340','26','资阳','3');");
E_D("replace into `fanwe_region_conf` values('341','26','自贡','3');");
E_D("replace into `fanwe_region_conf` values('342','26','泸州','3');");
E_D("replace into `fanwe_region_conf` values('343','27','天津','2');");
E_D("replace into `fanwe_region_conf` values('344','28','拉萨','3');");
E_D("replace into `fanwe_region_conf` values('345','28','阿里','3');");
E_D("replace into `fanwe_region_conf` values('346','28','昌都','3');");
E_D("replace into `fanwe_region_conf` values('347','28','林芝','3');");
E_D("replace into `fanwe_region_conf` values('348','28','那曲','3');");
E_D("replace into `fanwe_region_conf` values('349','28','日喀则','3');");
E_D("replace into `fanwe_region_conf` values('350','28','山南','3');");
E_D("replace into `fanwe_region_conf` values('351','29','乌鲁木齐','3');");
E_D("replace into `fanwe_region_conf` values('352','29','阿克苏','3');");
E_D("replace into `fanwe_region_conf` values('353','29','阿拉尔','3');");
E_D("replace into `fanwe_region_conf` values('354','29','巴音郭楞','3');");
E_D("replace into `fanwe_region_conf` values('355','29','博尔塔拉','3');");
E_D("replace into `fanwe_region_conf` values('356','29','昌吉','3');");
E_D("replace into `fanwe_region_conf` values('357','29','哈密','3');");
E_D("replace into `fanwe_region_conf` values('358','29','和田','3');");
E_D("replace into `fanwe_region_conf` values('359','29','喀什','3');");
E_D("replace into `fanwe_region_conf` values('360','29','克拉玛依','3');");
E_D("replace into `fanwe_region_conf` values('361','29','克孜勒苏','3');");
E_D("replace into `fanwe_region_conf` values('362','29','石河子','3');");
E_D("replace into `fanwe_region_conf` values('363','29','图木舒克','3');");
E_D("replace into `fanwe_region_conf` values('364','29','吐鲁番','3');");
E_D("replace into `fanwe_region_conf` values('365','29','五家渠','3');");
E_D("replace into `fanwe_region_conf` values('366','29','伊犁','3');");
E_D("replace into `fanwe_region_conf` values('367','30','昆明','3');");
E_D("replace into `fanwe_region_conf` values('368','30','怒江','3');");
E_D("replace into `fanwe_region_conf` values('369','30','普洱','3');");
E_D("replace into `fanwe_region_conf` values('370','30','丽江','3');");
E_D("replace into `fanwe_region_conf` values('371','30','保山','3');");
E_D("replace into `fanwe_region_conf` values('372','30','楚雄','3');");
E_D("replace into `fanwe_region_conf` values('373','30','大理','3');");
E_D("replace into `fanwe_region_conf` values('374','30','德宏','3');");
E_D("replace into `fanwe_region_conf` values('375','30','迪庆','3');");
E_D("replace into `fanwe_region_conf` values('376','30','红河','3');");
E_D("replace into `fanwe_region_conf` values('377','30','临沧','3');");
E_D("replace into `fanwe_region_conf` values('378','30','曲靖','3');");
E_D("replace into `fanwe_region_conf` values('379','30','文山','3');");
E_D("replace into `fanwe_region_conf` values('380','30','西双版纳','3');");
E_D("replace into `fanwe_region_conf` values('381','30','玉溪','3');");
E_D("replace into `fanwe_region_conf` values('382','30','昭通','3');");
E_D("replace into `fanwe_region_conf` values('383','31','杭州','3');");
E_D("replace into `fanwe_region_conf` values('384','31','湖州','3');");
E_D("replace into `fanwe_region_conf` values('385','31','嘉兴','3');");
E_D("replace into `fanwe_region_conf` values('386','31','金华','3');");
E_D("replace into `fanwe_region_conf` values('387','31','丽水','3');");
E_D("replace into `fanwe_region_conf` values('388','31','宁波','3');");
E_D("replace into `fanwe_region_conf` values('389','31','绍兴','3');");
E_D("replace into `fanwe_region_conf` values('390','31','台州','3');");
E_D("replace into `fanwe_region_conf` values('391','31','温州','3');");
E_D("replace into `fanwe_region_conf` values('392','31','舟山','3');");
E_D("replace into `fanwe_region_conf` values('393','31','衢州','3');");
E_D("replace into `fanwe_region_conf` values('394','32','重庆','2');");
E_D("replace into `fanwe_region_conf` values('395','33','香港','2');");
E_D("replace into `fanwe_region_conf` values('396','34','澳门','2');");
E_D("replace into `fanwe_region_conf` values('397','35','台湾','2');");
E_D("replace into `fanwe_region_conf` values('500','52','东城区','3');");
E_D("replace into `fanwe_region_conf` values('501','52','西城区','3');");
E_D("replace into `fanwe_region_conf` values('502','52','海淀区','3');");
E_D("replace into `fanwe_region_conf` values('503','52','朝阳区','3');");
E_D("replace into `fanwe_region_conf` values('504','52','崇文区','3');");
E_D("replace into `fanwe_region_conf` values('505','52','宣武区','3');");
E_D("replace into `fanwe_region_conf` values('506','52','丰台区','3');");
E_D("replace into `fanwe_region_conf` values('507','52','石景山区','3');");
E_D("replace into `fanwe_region_conf` values('508','52','房山区','3');");
E_D("replace into `fanwe_region_conf` values('509','52','门头沟区','3');");
E_D("replace into `fanwe_region_conf` values('510','52','通州区','3');");
E_D("replace into `fanwe_region_conf` values('511','52','顺义区','3');");
E_D("replace into `fanwe_region_conf` values('512','52','昌平区','3');");
E_D("replace into `fanwe_region_conf` values('513','52','怀柔区','3');");
E_D("replace into `fanwe_region_conf` values('514','52','平谷区','3');");
E_D("replace into `fanwe_region_conf` values('515','52','大兴区','3');");
E_D("replace into `fanwe_region_conf` values('516','52','密云县','3');");
E_D("replace into `fanwe_region_conf` values('517','52','延庆县','3');");
E_D("replace into `fanwe_region_conf` values('2703','321','长宁区','3');");
E_D("replace into `fanwe_region_conf` values('2704','321','闸北区','3');");
E_D("replace into `fanwe_region_conf` values('2705','321','闵行区','3');");
E_D("replace into `fanwe_region_conf` values('2706','321','徐汇区','3');");
E_D("replace into `fanwe_region_conf` values('2707','321','浦东新区','3');");
E_D("replace into `fanwe_region_conf` values('2708','321','杨浦区','3');");
E_D("replace into `fanwe_region_conf` values('2709','321','普陀区','3');");
E_D("replace into `fanwe_region_conf` values('2710','321','静安区','3');");
E_D("replace into `fanwe_region_conf` values('2711','321','卢湾区','3');");
E_D("replace into `fanwe_region_conf` values('2712','321','虹口区','3');");
E_D("replace into `fanwe_region_conf` values('2713','321','黄浦区','3');");
E_D("replace into `fanwe_region_conf` values('2714','321','南汇区','3');");
E_D("replace into `fanwe_region_conf` values('2715','321','松江区','3');");
E_D("replace into `fanwe_region_conf` values('2716','321','嘉定区','3');");
E_D("replace into `fanwe_region_conf` values('2717','321','宝山区','3');");
E_D("replace into `fanwe_region_conf` values('2718','321','青浦区','3');");
E_D("replace into `fanwe_region_conf` values('2719','321','金山区','3');");
E_D("replace into `fanwe_region_conf` values('2720','321','奉贤区','3');");
E_D("replace into `fanwe_region_conf` values('2721','321','崇明县','3');");
E_D("replace into `fanwe_region_conf` values('2912','343','和平区','3');");
E_D("replace into `fanwe_region_conf` values('2913','343','河西区','3');");
E_D("replace into `fanwe_region_conf` values('2914','343','南开区','3');");
E_D("replace into `fanwe_region_conf` values('2915','343','河北区','3');");
E_D("replace into `fanwe_region_conf` values('2916','343','河东区','3');");
E_D("replace into `fanwe_region_conf` values('2917','343','红桥区','3');");
E_D("replace into `fanwe_region_conf` values('2918','343','东丽区','3');");
E_D("replace into `fanwe_region_conf` values('2919','343','津南区','3');");
E_D("replace into `fanwe_region_conf` values('2920','343','西青区','3');");
E_D("replace into `fanwe_region_conf` values('2921','343','北辰区','3');");
E_D("replace into `fanwe_region_conf` values('2922','343','塘沽区','3');");
E_D("replace into `fanwe_region_conf` values('2923','343','汉沽区','3');");
E_D("replace into `fanwe_region_conf` values('2924','343','大港区','3');");
E_D("replace into `fanwe_region_conf` values('2925','343','武清区','3');");
E_D("replace into `fanwe_region_conf` values('2926','343','宝坻区','3');");
E_D("replace into `fanwe_region_conf` values('2927','343','经济开发区','3');");
E_D("replace into `fanwe_region_conf` values('2928','343','宁河县','3');");
E_D("replace into `fanwe_region_conf` values('2929','343','静海县','3');");
E_D("replace into `fanwe_region_conf` values('2930','343','蓟县','3');");
E_D("replace into `fanwe_region_conf` values('3325','394','合川区','3');");
E_D("replace into `fanwe_region_conf` values('3326','394','江津区','3');");
E_D("replace into `fanwe_region_conf` values('3327','394','南川区','3');");
E_D("replace into `fanwe_region_conf` values('3328','394','永川区','3');");
E_D("replace into `fanwe_region_conf` values('3329','394','南岸区','3');");
E_D("replace into `fanwe_region_conf` values('3330','394','渝北区','3');");
E_D("replace into `fanwe_region_conf` values('3331','394','万盛区','3');");
E_D("replace into `fanwe_region_conf` values('3332','394','大渡口区','3');");
E_D("replace into `fanwe_region_conf` values('3333','394','万州区','3');");
E_D("replace into `fanwe_region_conf` values('3334','394','北碚区','3');");
E_D("replace into `fanwe_region_conf` values('3335','394','沙坪坝区','3');");
E_D("replace into `fanwe_region_conf` values('3336','394','巴南区','3');");
E_D("replace into `fanwe_region_conf` values('3337','394','涪陵区','3');");
E_D("replace into `fanwe_region_conf` values('3338','394','江北区','3');");
E_D("replace into `fanwe_region_conf` values('3339','394','九龙坡区','3');");
E_D("replace into `fanwe_region_conf` values('3340','394','渝中区','3');");
E_D("replace into `fanwe_region_conf` values('3341','394','黔江开发区','3');");
E_D("replace into `fanwe_region_conf` values('3342','394','长寿区','3');");
E_D("replace into `fanwe_region_conf` values('3343','394','双桥区','3');");
E_D("replace into `fanwe_region_conf` values('3344','394','綦江县','3');");
E_D("replace into `fanwe_region_conf` values('3345','394','潼南县','3');");
E_D("replace into `fanwe_region_conf` values('3346','394','铜梁县','3');");
E_D("replace into `fanwe_region_conf` values('3347','394','大足县','3');");
E_D("replace into `fanwe_region_conf` values('3348','394','荣昌县','3');");
E_D("replace into `fanwe_region_conf` values('3349','394','璧山县','3');");
E_D("replace into `fanwe_region_conf` values('3350','394','垫江县','3');");
E_D("replace into `fanwe_region_conf` values('3351','394','武隆县','3');");
E_D("replace into `fanwe_region_conf` values('3352','394','丰都县','3');");
E_D("replace into `fanwe_region_conf` values('3353','394','城口县','3');");
E_D("replace into `fanwe_region_conf` values('3354','394','梁平县','3');");
E_D("replace into `fanwe_region_conf` values('3355','394','开县','3');");
E_D("replace into `fanwe_region_conf` values('3356','394','巫溪县','3');");
E_D("replace into `fanwe_region_conf` values('3357','394','巫山县','3');");
E_D("replace into `fanwe_region_conf` values('3358','394','奉节县','3');");
E_D("replace into `fanwe_region_conf` values('3359','394','云阳县','3');");
E_D("replace into `fanwe_region_conf` values('3360','394','忠县','3');");
E_D("replace into `fanwe_region_conf` values('3361','394','石柱','3');");
E_D("replace into `fanwe_region_conf` values('3362','394','彭水','3');");
E_D("replace into `fanwe_region_conf` values('3363','394','酉阳','3');");
E_D("replace into `fanwe_region_conf` values('3364','394','秀山','3');");
E_D("replace into `fanwe_region_conf` values('3365','395','沙田区','3');");
E_D("replace into `fanwe_region_conf` values('3366','395','东区','3');");
E_D("replace into `fanwe_region_conf` values('3367','395','观塘区','3');");
E_D("replace into `fanwe_region_conf` values('3368','395','黄大仙区','3');");
E_D("replace into `fanwe_region_conf` values('3369','395','九龙城区','3');");
E_D("replace into `fanwe_region_conf` values('3370','395','屯门区','3');");
E_D("replace into `fanwe_region_conf` values('3371','395','葵青区','3');");
E_D("replace into `fanwe_region_conf` values('3372','395','元朗区','3');");
E_D("replace into `fanwe_region_conf` values('3373','395','深水埗区','3');");
E_D("replace into `fanwe_region_conf` values('3374','395','西贡区','3');");
E_D("replace into `fanwe_region_conf` values('3375','395','大埔区','3');");
E_D("replace into `fanwe_region_conf` values('3376','395','湾仔区','3');");
E_D("replace into `fanwe_region_conf` values('3377','395','油尖旺区','3');");
E_D("replace into `fanwe_region_conf` values('3378','395','北区','3');");
E_D("replace into `fanwe_region_conf` values('3379','395','南区','3');");
E_D("replace into `fanwe_region_conf` values('3380','395','荃湾区','3');");
E_D("replace into `fanwe_region_conf` values('3381','395','中西区','3');");
E_D("replace into `fanwe_region_conf` values('3382','395','离岛区','3');");
E_D("replace into `fanwe_region_conf` values('3383','396','澳门','3');");
E_D("replace into `fanwe_region_conf` values('3384','397','台北','3');");
E_D("replace into `fanwe_region_conf` values('3385','397','高雄','3');");
E_D("replace into `fanwe_region_conf` values('3386','397','基隆','3');");
E_D("replace into `fanwe_region_conf` values('3387','397','台中','3');");
E_D("replace into `fanwe_region_conf` values('3388','397','台南','3');");
E_D("replace into `fanwe_region_conf` values('3389','397','新竹','3');");
E_D("replace into `fanwe_region_conf` values('3390','397','嘉义','3');");
E_D("replace into `fanwe_region_conf` values('3391','397','宜兰县','3');");
E_D("replace into `fanwe_region_conf` values('3392','397','桃园县','3');");
E_D("replace into `fanwe_region_conf` values('3393','397','苗栗县','3');");
E_D("replace into `fanwe_region_conf` values('3394','397','彰化县','3');");
E_D("replace into `fanwe_region_conf` values('3395','397','南投县','3');");
E_D("replace into `fanwe_region_conf` values('3396','397','云林县','3');");
E_D("replace into `fanwe_region_conf` values('3397','397','屏东县','3');");
E_D("replace into `fanwe_region_conf` values('3398','397','台东县','3');");
E_D("replace into `fanwe_region_conf` values('3399','397','花莲县','3');");
E_D("replace into `fanwe_region_conf` values('3400','397','澎湖县','3');");

require("../../inc/footer.php");
?>