<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_borrow_amount_log`;");
E_C("CREATE TABLE `yyd_borrow_amount_log` (
  `id` int(11) NOT NULL auto_increment COMMENT 'id',
  `user_id` int(11) NOT NULL COMMENT '???',
  `amount_type` varchar(100) NOT NULL COMMENT '????????',
  `oprate` varchar(50) NOT NULL COMMENT '????',
  `type` varchar(100) NOT NULL COMMENT '????????',
  `nid` varchar(100) NOT NULL COMMENT '???????????Ψ?',
  `account` decimal(11,2) NOT NULL COMMENT '???????',
  `remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nid` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=728 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_borrow_amount_log` values('671','1935','borrow','add','apply','apply138381033792','10000.00','申请额度审核通过','1383810369','113.134.32.246');");
E_D("replace into `yyd_borrow_amount_log` values('672','1935','borrow','reduce','borrow_success','borrow_success_credit_1935_20131100001','5000.00','借款标[<a href=/invest/a20131100001.html target=_blank style=color:blue>我要借款</a>]满标审核通过，借款信用额度减少','1383811594','113.134.32.246');");
E_D("replace into `yyd_borrow_amount_log` values('673','1935','borrow','add','borrrow_repay','borrrow_repay_1935_20131100001494','1650.11','借款标[<a href=/invest/a20131100001.html target=_blank>我要借款</a>]成功还款，额度增加','1383811998','113.134.32.246');");
E_D("replace into `yyd_borrow_amount_log` values('674','1935','borrow','add','borrrow_repay','borrrow_repay_1935_20131100001495','1666.61','借款标[<a href=/invest/a20131100001.html target=_blank>我要借款</a>]成功还款，额度增加','1383812542','113.134.32.246');");
E_D("replace into `yyd_borrow_amount_log` values('675','1935','borrow','add','borrrow_repay','borrrow_repay_1935_20131100001496','1683.28','借款标[<a href=/invest/a20131100001.html target=_blank>我要借款</a>]成功还款，额度增加','1383812690','113.134.32.246');");
E_D("replace into `yyd_borrow_amount_log` values('676','1934','borrow','add','apply','apply138386360516','100000.00','申请额度审核通过','1383864765','60.55.40.6');");
E_D("replace into `yyd_borrow_amount_log` values('677','1938','borrow','add','apply','apply138614575477','1000000.00','申请额度审核通过','1386147518','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('678','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200001','100.00','借款标[<a href=/invest/a20131200001.html target=_blank style=color:blue>信用标1</a>]满标审核通过，借款信用额度减少','1386148182','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('679','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200001497','0.10','借款标[<a href=/invest/a20131200001.html target=_blank>信用标1</a>]成功还款，额度增加','1386148323','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('680','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200002','1000.00','借款标[<a href=/invest/a20131200002.html target=_blank style=color:blue>信用标2</a>]满标审核通过，借款信用额度减少','1386148841','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('681','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200002498','1.00','借款标[<a href=/invest/a20131200002.html target=_blank>信用标2</a>]成功还款，额度增加','1386148978','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('682','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200003','1000.00','借款标[<a href=/invest/a20131200003.html target=_blank style=color:blue>信用标3</a>]满标审核通过，借款信用额度减少','1386149918','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('683','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200003499','1.00','借款标[<a href=/invest/a20131200003.html target=_blank>信用标3</a>]成功还款，额度增加','1386149932','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('684','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200004','1000.00','借款标[<a href=/invest/a20131200004.html target=_blank style=color:blue>4</a>]满标审核通过，借款信用额度减少','1386150579','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('685','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200006','1000.00','借款标[<a href=/invest/a20131200006.html target=_blank style=color:blue>01</a>]满标审核通过，借款信用额度减少','1386151992','222.94.187.146');");
E_D("replace into `yyd_borrow_amount_log` values('686','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200011','1000.00','借款标[<a href=/invest/a20131200011.html target=_blank style=color:blue>信1奖</a>]满标审核通过，借款信用额度减少','1386158932','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('687','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200011502','1.00','借款标[<a href=/invest/a20131200011.html target=_blank>信1奖</a>]成功还款，额度增加','1386159308','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('688','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200013','200.00','借款标[<a href=/invest/a20131200013.html target=_blank style=color:blue>净1</a>]满标审核通过，借款信用额度减少','1386160785','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('689','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200013503','0.20','借款标[<a href=/invest/a20131200013.html target=_blank>净1</a>]成功还款，额度增加','1386161095','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('690','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200014','2000.00','借款标[<a href=/invest/a20131200014.html target=_blank style=color:blue>信月等额</a>]满标审核通过，借款信用额度减少','1386161433','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('691','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200014504','0.99','借款标[<a href=/invest/a20131200014.html target=_blank>信月等额</a>]成功还款，额度增加','1386161550','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('692','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200014505','1.01','借款标[<a href=/invest/a20131200014.html target=_blank>信月等额</a>]成功还款，额度增加','1386161607','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('693','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200015','1000.00','借款标[<a href=/invest/a20131200015.html target=_blank style=color:blue>信季还款</a>]满标审核通过，借款信用额度减少','1386161986','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('694','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200015506','0.00','借款标[<a href=/invest/a20131200015.html target=_blank>信季还款</a>]成功还款，额度增加','1386162077','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('695','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200015507','0.00','借款标[<a href=/invest/a20131200015.html target=_blank>信季还款</a>]成功还款，额度增加','1386162094','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('696','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200015508','1.00','借款标[<a href=/invest/a20131200015.html target=_blank>信季还款</a>]成功还款，额度增加','1386162108','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('697','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200016','2000.00','借款标[<a href=/invest/a20131200016.html target=_blank style=color:blue>信季还款2</a>]满标审核通过，借款信用额度减少','1386162291','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('698','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200016509','0.00','借款标[<a href=/invest/a20131200016.html target=_blank>信季还款2</a>]成功还款，额度增加','1386162408','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('699','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200016510','0.00','借款标[<a href=/invest/a20131200016.html target=_blank>信季还款2</a>]成功还款，额度增加','1386162422','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('700','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200016511','1.00','借款标[<a href=/invest/a20131200016.html target=_blank>信季还款2</a>]成功还款，额度增加','1386162429','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('701','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200016512','0.00','借款标[<a href=/invest/a20131200016.html target=_blank>信季还款2</a>]成功还款，额度增加','1386162450','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('702','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200016513','0.00','借款标[<a href=/invest/a20131200016.html target=_blank>信季还款2</a>]成功还款，额度增加','1386162457','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('703','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200016514','1.00','借款标[<a href=/invest/a20131200016.html target=_blank>信季还款2</a>]成功还款，额度增加','1386162469','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('704','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200017','3000.00','借款标[<a href=/invest/a20131200017.html target=_blank style=color:blue>信月还息到期还本</a>]满标审核通过，借款信用额度减少','1386162780','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('705','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200017515','0.00','借款标[<a href=/invest/a20131200017.html target=_blank>信月还息到期还本</a>]成功还款，额度增加','1386162881','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('706','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200017516','0.00','借款标[<a href=/invest/a20131200017.html target=_blank>信月还息到期还本</a>]成功还款，额度增加','1386162897','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('707','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200017517','3.00','借款标[<a href=/invest/a20131200017.html target=_blank>信月还息到期还本</a>]成功还款，额度增加','1386162911','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('708','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200018','5500.00','借款标[<a href=/invest/a20131200018.html target=_blank style=color:blue>信到期还本还息</a>]满标审核通过，借款信用额度减少','1386163471','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('709','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200018518','5.50','借款标[<a href=/invest/a20131200018.html target=_blank>信到期还本还息</a>]成功还款，额度增加','1386163537','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('710','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200019','500.00','借款标[<a href=/invest/a20131200019.html target=_blank style=color:blue>信按天到期还本还息</a>]满标审核通过，借款信用额度减少','1386164004','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('711','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200019519','0.50','借款标[<a href=/invest/a20131200019.html target=_blank>信按天到期还本还息</a>]成功还款，额度增加','1386164165','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('712','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200020','4000.00','借款标[<a href=/invest/a20131200020.html target=_blank style=color:blue>担保标</a>]满标审核通过，借款信用额度减少','1386164978','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('713','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200020520','2.00','借款标[<a href=/invest/a20131200020.html target=_blank>担保标</a>]成功还款，额度增加','1386165147','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('714','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200020521','2.00','借款标[<a href=/invest/a20131200020.html target=_blank>担保标</a>]成功还款，额度增加','1386165167','121.229.137.228');");
E_D("replace into `yyd_borrow_amount_log` values('715','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200005','1000.00','借款标[<a href=/invest/a20131200005.html target=_blank style=color:blue>00</a>]满标审核通过，借款信用额度减少','1386207613','180.110.188.178');");
E_D("replace into `yyd_borrow_amount_log` values('716','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200009','1700.00','借款标[<a href=/invest/a20131200009.html target=_blank style=color:blue>05</a>]满标审核通过，借款信用额度减少','1386207629','180.110.188.178');");
E_D("replace into `yyd_borrow_amount_log` values('717','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200022','1000.00','借款标[<a href=/invest/a20131200022.html target=_blank style=color:blue>秒标</a>]满标审核通过，借款信用额度减少','1386207760','180.110.188.178');");
E_D("replace into `yyd_borrow_amount_log` values('718','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200022525','1.00','借款标[<a href=/invest/a20131200022.html target=_blank>秒标</a>]成功还款，额度增加','1386207760','180.110.188.178');");
E_D("replace into `yyd_borrow_amount_log` values('719','1938','borrow','reduce','borrow_success','borrow_success_credit_1938_20131200023','1000.00','借款标[<a href=/invest/a20131200023.html target=_blank style=color:blue>秒标2</a>]满标审核通过，借款信用额度减少','1386208734','180.110.188.178');");
E_D("replace into `yyd_borrow_amount_log` values('720','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200023526','1.00','借款标[<a href=/invest/a20131200023.html target=_blank>秒标2</a>]成功还款，额度增加','1386208734','180.110.188.178');");
E_D("replace into `yyd_borrow_amount_log` values('721','1942','borrow','add','apply','apply138753154332','10000.00','申请额度审核通过','1387531680','171.216.224.66');");
E_D("replace into `yyd_borrow_amount_log` values('722','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200009523','0.00','借款标[<a href=/invest/a20131200009.html target=_blank>05</a>]成功还款，额度增加','1390072600','124.156.66.241');");
E_D("replace into `yyd_borrow_amount_log` values('723','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200009524','1.70','借款标[<a href=/invest/a20131200009.html target=_blank>05</a>]成功还款，额度增加','1390072604','124.156.66.241');");
E_D("replace into `yyd_borrow_amount_log` values('724','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200006501','1.00','借款标[<a href=/invest/a20131200006.html target=_blank>01</a>]成功还款，额度增加','1390072665','124.156.66.241');");
E_D("replace into `yyd_borrow_amount_log` values('725','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200004500','1.00','借款标[<a href=/invest/a20131200004.html target=_blank>4</a>]成功还款，额度增加','1390072672','124.156.66.241');");
E_D("replace into `yyd_borrow_amount_log` values('726','1938','borrow','add','borrrow_repay','borrrow_repay_1938_20131200005522','1.00','借款标[<a href=/invest/a20131200005.html target=_blank>00</a>]成功还款，额度增加','1390072678','124.156.66.241');");
E_D("replace into `yyd_borrow_amount_log` values('727','1956','borrow','add','apply','apply139334837772','10000000.00','申请额度审核通过','1393348588','14.127.24.153');");

require("../../inc/footer.php");
?>