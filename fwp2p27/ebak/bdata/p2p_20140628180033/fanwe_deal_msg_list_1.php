<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_msg_list`;");
E_C("CREATE TABLE `fanwe_deal_msg_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dest` varchar(255) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `title` text NOT NULL,
  `is_youhui` tinyint(1) NOT NULL,
  `youhui_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_msg_list` values('1','13988877211','0','你的手机号为13988877211,验证码为4354','1381696731','1','1381696731','8','密码错误','0','0','你的手机号为13988877211,验证码为4354','0','0');");
E_D("replace into `fanwe_deal_msg_list` values('2','18602141978','0','你的手机号为18602141978,验证码为9541','1381698953','1','1381698953','3','密码错误','0','0','你的手机号为18602141978,验证码为9541','0','0');");
E_D("replace into `fanwe_deal_msg_list` values('3','13316400389','0','你的手机号为13316400389,验证码为8308','1382044147','1','1382044147','14','密码错误','0','0','你的手机号为13316400389,验证码为8308','0','0');");
E_D("replace into `fanwe_deal_msg_list` values('4','13316400389','0','你的手机号为13316400389,验证码为2957','1382044214','1','1382044212','14','密码错误','0','0','你的手机号为13316400389,验证码为2957','0','0');");

require("../../inc/footer.php");
?>