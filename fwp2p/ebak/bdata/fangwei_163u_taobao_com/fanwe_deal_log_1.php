<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_log`;");
E_C("CREATE TABLE `fanwe_deal_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `source_vedio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_log` values('26','����ͼ��˵����1','1352229555','17','fanwe','55','./public/attachment/201211/07/11/5d2a94ce2a3db73277fb04be463365a255.jpg','','');");
E_D("replace into `fanwe_deal_log` values('27','ÿ������̤���µ��ọ́����Ǵ����ڴ����˷�\r\n\r\n��ÿ��̤�Ϲ�̣�������ٶ��ỳ��һ˿��ʧ��\r\n\r\n��·�ϣ�����ӵ��һ�ļ��ϡ���̸����������\r\n\r\n��·�ϣ���������������Ȥ���ˣ���������˼�Ĺ���\r\n\r\n��·�ϣ����ǿ�������ʱ�䣬�������������κ�һ�������������ʳ�Ϳ���\r\n\r\n���ǹ����󣬹����������ֽ����Ƕ���ѹ���Ϳ����֮��\r\n\r\n������Ҫһ���ڳ����У�Ҳ����ʱ��������\r\n\r\n�����ѣ������룬�ҿ���\r\n\r\n \r\n\r\n���ǵ�С�Ѳ���ܴ󣬵������������е�������\r\n\r\n��������ȫ�����й����鼮����������ɢ�ġ��汾���μǡ���\r\n\r\n��������Ũ�Ŀ��ȺͺóԵ����\r\n\r\n������ͬ��ϲ�����У����ύ���ѵ�������\r\n\r\nÿһ�������ﵱ���ҵ��ˣ����������ǵĿ��ˣ��������������','1352230347','18','fzmatthew','56','./public/attachment/201211/07/11/714396a1e4416b0f7510d97e6966190459.jpg','','');");
E_D("replace into `fanwe_deal_log` values('28','�ڵ�Ӱ�￴��������Ȼ�ĳ����������ʱ����Ҫ�õƹ��ر�ӹ������ģ���Ϊ��Ӱ�����˶Թ�ĸ���������һ�����˵��۾�����˵����������õ���Ӱ������һĻŮ����վ�ڴ��߳��������������ǵķ�������ȥ�����Ե��ܵ����ձ������Ҿ�������Ӱ�졣','1352230864','17','fanwe','57','./public/attachment/201211/07/11/eab603d5c65ec25f88a7fdd8ec9a5c1095.jpg','','');");
E_D("replace into `fanwe_deal_log` values('29','лл�⼸������æ�������ǣ�����һȺ��ͬѧ���ô��������������Ȼ����ͦ�ҵ�ȴ�����˿����뻶��������ʹÿ�춼Ҫ��������������֡���лл�����ǣ���Ϊ����̫����ܻ�Ҫ����������ܿ�ҵ��ϣ������пյ����ѻ��ܹ�����æ����������������13400642022����ַ�Ļ��������Ĵ���¥�����м�ꡣлл��','1352231575','17','fanwe','58','./public/attachment/201211/07/11/85a7d1e781bfb8812271b6f6f1bee91d25.jpg','','');");

require("../../inc/footer.php");
?>