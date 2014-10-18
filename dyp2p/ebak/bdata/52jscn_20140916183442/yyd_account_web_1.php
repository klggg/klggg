<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_account_web`;");
E_C("CREATE TABLE `yyd_account_web` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `money` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `remark` text NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4899 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_account_web` values('4885','1934','6','web_recharge_fee','web_recharge_fee_1934_1383811030','用户充值1000.00，网站垫付6','1383811030','113.134.32.246');");
E_D("replace into `yyd_account_web` values('4886','1934','300','web_recharge_fee','web_recharge_fee_1934_1383811039','用户充值50000.00，网站垫付300','1383811039','113.134.32.246');");
E_D("replace into `yyd_account_web` values('4887','1935','120','web_recharge_fee','web_recharge_fee_1935_1383812664','用户充值20000.00，网站垫付120','1383812664','113.134.32.246');");
E_D("replace into `yyd_account_web` values('4888','1938','600','web_recharge_fee','web_recharge_fee_1938_1386145561','用户充值100000.00，网站垫付600','1386145561','222.94.187.146');");
E_D("replace into `yyd_account_web` values('4889','1937','0.6','web_recharge_fee','web_recharge_fee_1937_1386146068','用户充值100.00，网站垫付0.6','1386146068','222.94.187.146');");
E_D("replace into `yyd_account_web` values('4890','1940','6000','web_recharge_fee','web_recharge_fee_1940_1386148068','用户充值1000000.00，网站垫付6000','1386148068','222.94.187.146');");
E_D("replace into `yyd_account_web` values('4891','1940','60','web_recharge_fee','web_recharge_fee_1940_1386161367','用户充值10000.00，网站垫付60','1386161367','121.229.137.228');");
E_D("replace into `yyd_account_web` values('4892','1938','0','web_cash_fee','web_cash_fee_1938_1386205925','用户提现50000，网站垫付0','1386205925','180.110.188.178');");
E_D("replace into `yyd_account_web` values('4893','1938','0','web_cash_fee','web_cash_fee_1938_1386206294','用户提现50000，网站垫付0','1386206294','180.110.188.178');");
E_D("replace into `yyd_account_web` values('4894','1938','0','web_cash_fee','web_cash_fee_1938_1386206495','用户提现623.89，网站垫付0','1386206495','180.110.188.178');");
E_D("replace into `yyd_account_web` values('4895','1938','0.3','web_recharge_fee','web_recharge_fee_1938_1386206823','用户充值50.00，网站垫付0.3','1386206823','180.110.188.178');");
E_D("replace into `yyd_account_web` values('4896','1938','600','web_recharge_fee','web_recharge_fee_1938_1390072649','用户充值100000.00，网站垫付600','1390072649','124.156.66.241');");
E_D("replace into `yyd_account_web` values('4897','1934','12','web_recharge_fee','web_recharge_fee_1934_1393771383','用户充值2000.00，网站垫付12','1393771383','220.187.194.108');");
E_D("replace into `yyd_account_web` values('4898','1970','600','web_recharge_fee','web_recharge_fee_1970_1393913856','用户充值100000.00，网站垫付600','1393913856','222.178.221.94');");

require("../../inc/footer.php");
?>