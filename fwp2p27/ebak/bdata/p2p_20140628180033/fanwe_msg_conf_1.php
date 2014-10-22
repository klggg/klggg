<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_msg_conf`;");
E_C("CREATE TABLE `fanwe_msg_conf` (
  `user_id` int(11) NOT NULL,
  `mail_asked` tinyint(1) NOT NULL COMMENT '有人对我的借款列表提问（邮件）',
  `sms_asked` tinyint(1) NOT NULL COMMENT '有人对我的借款列表提问（邮件）',
  `mail_bid` tinyint(1) NOT NULL COMMENT '有人向我的借款列表投标（邮件）',
  `sms_bid` tinyint(1) NOT NULL COMMENT '有人向我的借款列表投标（短信）',
  `mail_myfail` tinyint(1) NOT NULL COMMENT '我的借款列表流标（邮件）',
  `sms_myfail` tinyint(1) NOT NULL COMMENT '我的借款列表流标（短信）',
  `mail_half` tinyint(1) NOT NULL COMMENT '我的借款列表完成度超过50%',
  `sms_half` tinyint(1) NOT NULL COMMENT '我的借款列表完成度超过50%',
  `mail_bidsuccess` tinyint(1) NOT NULL COMMENT '我的投标成功',
  `sms_bidsuccess` tinyint(1) NOT NULL COMMENT '我的投标成功',
  `mail_fail` tinyint(1) NOT NULL COMMENT '我的投标流标',
  `sms_fail` tinyint(1) NOT NULL COMMENT '我的投标流标',
  `mail_bidrepaid` tinyint(1) NOT NULL COMMENT '我收到一笔还款',
  `sms_bidrepaid` tinyint(1) NOT NULL COMMENT '我收到一笔还款',
  `mail_answer` tinyint(1) NOT NULL COMMENT '借入者回答了我对借款列表的提问',
  `sms_answer` tinyint(1) NOT NULL COMMENT '借入者回答了我对借款列表的提问',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

require("../../inc/footer.php");
?>