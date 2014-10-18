<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `yyd_credit_log`;");
E_C("CREATE TABLE `yyd_credit_log` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `article_id` int(11) NOT NULL,
  `nid` varchar(200) NOT NULL,
  `value` int(11) default NULL,
  `credit` int(11) default NULL,
  `remark` longtext NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `update_time` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9935 DEFAULT CHARSET=gbk");
E_D("replace into `yyd_credit_log` values('9800','1934','payment','reg','1934','reg','30','30','注册获得金币','1383789450','');");
E_D("replace into `yyd_credit_log` values('9801','1935','payment','reg','1935','reg','30','30','注册获得金币','1383793018','');");
E_D("replace into `yyd_credit_log` values('9802','1935','approve','realname','1935','realname','5','5','实名认证通过所得积分','1383793231','');");
E_D("replace into `yyd_credit_log` values('9803','1935','approve','phone','1935','phone','2','2','手机认证通过所得积分','1383794172','');");
E_D("replace into `yyd_credit_log` values('9804','1935','borrow','repay_all','496','borrow_repay_all','50','50','借款[<a href=/invest/a20131100001.html target=_blank>我要借款</a>]全部还完所得积分','1383812689','');");
E_D("replace into `yyd_credit_log` values('9805','1934','approve','realname','1934','realname','5','5','实名认证通过所得积分','1383861975','');");
E_D("replace into `yyd_credit_log` values('9806','1934','approve','phone','1934','phone','2','2','手机认证通过所得积分','1383862019','');");
E_D("replace into `yyd_credit_log` values('9807','1934','approve','work_credit','1934','work_credit','3','3','填写工作信息获得的积分','1383923595','');");
E_D("replace into `yyd_credit_log` values('9808','1936','payment','reg','1936','reg','30','30','注册获得金币','1384134876','');");
E_D("replace into `yyd_credit_log` values('9809','1937','payment','reg','1937','reg','30','30','注册获得金币','1386143914','');");
E_D("replace into `yyd_credit_log` values('9810','1938','payment','reg','1938','reg','30','30','注册获得金币','1386144461','');");
E_D("replace into `yyd_credit_log` values('9811','1938','approve','realname','1938','realname','5','5','实名认证通过所得积分','1386144706','');");
E_D("replace into `yyd_credit_log` values('9812','1938','approve','phone','1938','phone','2','2','手机认证通过所得积分','1386144800','');");
E_D("replace into `yyd_credit_log` values('9813','1938','approve','info_credit','1938','info_credit','2','2','填写个人详情获得的积分','1386145037','');");
E_D("replace into `yyd_credit_log` values('9814','1939','payment','reg','1939','reg','30','30','注册获得金币','1386147748','');");
E_D("replace into `yyd_credit_log` values('9815','1940','payment','reg','1940','reg','30','30','注册获得金币','1386147825','');");
E_D("replace into `yyd_credit_log` values('9816','1938','borrow','repay_all','497','borrow_repay_all','1','1','借款[<a href=/invest/a20131200001.html target=_blank>信用标1</a>]全部还完所得积分','1386148323','');");
E_D("replace into `yyd_credit_log` values('9817','1940','borrow','tender','497','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200001.html target=_blank>信用标1</a>]完整本息还款积分','1386148323','');");
E_D("replace into `yyd_credit_log` values('9818','1938','borrow','repay_all','498','borrow_repay_all','10','10','借款[<a href=/invest/a20131200002.html target=_blank>信用标2</a>]全部还完所得积分','1386148978','');");
E_D("replace into `yyd_credit_log` values('9819','1940','borrow','tender','498','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200002.html target=_blank>信用标2</a>]完整本息还款积分','1386148978','');");
E_D("replace into `yyd_credit_log` values('9820','1938','borrow','repay_all','499','borrow_repay_all','10','10','借款[<a href=/invest/a20131200003.html target=_blank>信用标3</a>]全部还完所得积分','1386149932','');");
E_D("replace into `yyd_credit_log` values('9821','1937','borrow','tender','499','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200003.html target=_blank>信用标3</a>]完整本息还款积分','1386149932','');");
E_D("replace into `yyd_credit_log` values('9822','1938','borrow','repay_all','502','borrow_repay_all','10','10','借款[<a href=/invest/a20131200011.html target=_blank>信1奖</a>]全部还完所得积分','1386159308','');");
E_D("replace into `yyd_credit_log` values('9823','1940','borrow','tender','502','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200011.html target=_blank>信1奖</a>]完整本息还款积分','1386159308','');");
E_D("replace into `yyd_credit_log` values('9824','1940','borrow','tender','502','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200011.html target=_blank>信1奖</a>]完整本息还款积分','1386159308','');");
E_D("replace into `yyd_credit_log` values('9825','1938','borrow','repay_all','503','borrow_repay_all','2','2','借款[<a href=/invest/a20131200013.html target=_blank>净1</a>]全部还完所得积分','1386161095','');");
E_D("replace into `yyd_credit_log` values('9826','1940','borrow','tender','503','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200013.html target=_blank>净1</a>]完整本息还款积分','1386161095','');");
E_D("replace into `yyd_credit_log` values('9827','1938','borrow','repay_all','505','borrow_repay_all','20','20','借款[<a href=/invest/a20131200014.html target=_blank>信月等额</a>]全部还完所得积分','1386161607','');");
E_D("replace into `yyd_credit_log` values('9828','1938','borrow','repay_all','508','borrow_repay_all','10','10','借款[<a href=/invest/a20131200015.html target=_blank>信季还款</a>]全部还完所得积分','1386162108','');");
E_D("replace into `yyd_credit_log` values('9829','1938','borrow','repay_all','514','borrow_repay_all','20','20','借款[<a href=/invest/a20131200016.html target=_blank>信季还款2</a>]全部还完所得积分','1386162469','');");
E_D("replace into `yyd_credit_log` values('9830','1938','borrow','repay_all','517','borrow_repay_all','30','30','借款[<a href=/invest/a20131200017.html target=_blank>信月还息到期还本</a>]全部还完所得积分','1386162911','');");
E_D("replace into `yyd_credit_log` values('9831','1938','borrow','repay_all','518','borrow_repay_all','55','55','借款[<a href=/invest/a20131200018.html target=_blank>信到期还本还息</a>]全部还完所得积分','1386163537','');");
E_D("replace into `yyd_credit_log` values('9832','1940','borrow','tender','518','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200018.html target=_blank>信到期还本还息</a>]完整本息还款积分','1386163537','');");
E_D("replace into `yyd_credit_log` values('9833','1938','borrow','repay_all','519','borrow_repay_all','5','5','借款[<a href=/invest/a20131200019.html target=_blank>信按天到期还本还息</a>]全部还完所得积分','1386164165','');");
E_D("replace into `yyd_credit_log` values('9834','1940','borrow','tender','519','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200019.html target=_blank>信按天到期还本还息</a>]完整本息还款积分','1386164165','');");
E_D("replace into `yyd_credit_log` values('9835','1938','borrow','repay_all','521','borrow_repay_all','40','40','借款[<a href=/invest/a20131200020.html target=_blank>担保标</a>]全部还完所得积分','1386165167','');");
E_D("replace into `yyd_credit_log` values('9836','1938','borrow','repay_all','525','borrow_repay_all','10','10','借款[<a href=/invest/a20131200022.html target=_blank>秒标</a>]全部还完所得积分','1386207760','');");
E_D("replace into `yyd_credit_log` values('9837','1940','borrow','tender','525','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200022.html target=_blank>秒标</a>]完整本息还款积分','1386207760','');");
E_D("replace into `yyd_credit_log` values('9838','1938','borrow','repay_all','526','borrow_repay_all','10','10','借款[<a href=/invest/a20131200023.html target=_blank>秒标2</a>]全部还完所得积分','1386208734','');");
E_D("replace into `yyd_credit_log` values('9839','1940','borrow','tender','526','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200023.html target=_blank>秒标2</a>]完整本息还款积分','1386208734','');");
E_D("replace into `yyd_credit_log` values('9840','1940','approve','realname','1940','realname','5','5','实名认证通过所得积分','1386223736','');");
E_D("replace into `yyd_credit_log` values('9841','1938','approve','phone','1938','phone','2','2','手机认证通过所得积分','1386228961','');");
E_D("replace into `yyd_credit_log` values('9842','1941','payment','reg','1941','reg','30','30','注册获得金币','1386779083','');");
E_D("replace into `yyd_credit_log` values('9843','1942','payment','reg','1942','reg','30','30','注册获得金币','1387173382','');");
E_D("replace into `yyd_credit_log` values('9844','1942','approve','realname','1942','realname','5','5','实名认证通过所得积分','1387260464','');");
E_D("replace into `yyd_credit_log` values('9845','1942','approve','finance_credit','1942','finance_credit','5','5','填写财务信息获得的积分','1387262308','');");
E_D("replace into `yyd_credit_log` values('9846','1942','approve','phone','1942','phone','2','2','手机认证通过所得积分','1387262453','');");
E_D("replace into `yyd_credit_log` values('9847','1934','approve','finance_credit','1934','finance_credit','5','5','填写财务信息获得的积分','1387286476','');");
E_D("replace into `yyd_credit_log` values('9848','1943','payment','reg','1943','reg','30','30','注册获得金币','1387530176','');");
E_D("replace into `yyd_credit_log` values('9849','1942','approve','work_credit','1942','work_credit','3','3','填写工作信息获得的积分','1387531875','');");
E_D("replace into `yyd_credit_log` values('9850','1944','payment','reg','1944','reg','30','30','注册获得金币','1387764020','');");
E_D("replace into `yyd_credit_log` values('9851','1945','payment','reg','1945','reg','30','30','注册获得金币','1387765843','');");
E_D("replace into `yyd_credit_log` values('9852','1946','payment','reg','1946','reg','30','30','注册获得金币','1389110480','');");
E_D("replace into `yyd_credit_log` values('9853','1947','payment','reg','1947','reg','30','30','注册获得金币','1389933784','');");
E_D("replace into `yyd_credit_log` values('9854','1934','approve','info_credit','1934','info_credit','2','2','填写个人详情获得的积分','1390036931','');");
E_D("replace into `yyd_credit_log` values('9855','1938','borrow','repay','523','borrow_repay_late_common','-200','-200','还款[<a href=/invest/a20131200009.html target=_blank>05</a>]第0期积分','1390072599','');");
E_D("replace into `yyd_credit_log` values('9856','1938','borrow','repay_all','524','borrow_repay_all','17','17','借款[<a href=/invest/a20131200009.html target=_blank>05</a>]全部还完所得积分','1390072604','');");
E_D("replace into `yyd_credit_log` values('9857','1938','borrow','repay_all','501','borrow_repay_all','10','10','借款[<a href=/invest/a20131200006.html target=_blank>01</a>]全部还完所得积分','1390072665','');");
E_D("replace into `yyd_credit_log` values('9858','1934','borrow','tender','501','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200006.html target=_blank>01</a>]完整本息还款积分','1390072665','');");
E_D("replace into `yyd_credit_log` values('9859','1938','borrow','repay','501','borrow_repay_late_common','-200','-200','还款[<a href=/invest/a20131200006.html target=_blank>01</a>]第0期积分','1390072665','');");
E_D("replace into `yyd_credit_log` values('9860','1938','borrow','repay_all','500','borrow_repay_all','10','10','借款[<a href=/invest/a20131200004.html target=_blank>4</a>]全部还完所得积分','1390072672','');");
E_D("replace into `yyd_credit_log` values('9861','1940','borrow','tender','500','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200004.html target=_blank>4</a>]完整本息还款积分','1390072672','');");
E_D("replace into `yyd_credit_log` values('9862','1938','borrow','repay','500','borrow_repay_late_serious','-300','-300','还款[<a href=/invest/a20131200004.html target=_blank>4</a>]第0期积分','1390072672','');");
E_D("replace into `yyd_credit_log` values('9863','1938','borrow','repay_all','522','borrow_repay_all','10','10','借款[<a href=/invest/a20131200005.html target=_blank>00</a>]全部还完所得积分','1390072678','');");
E_D("replace into `yyd_credit_log` values('9864','1940','borrow','tender','522','tender_repay_time','0','0','收到借款[<a href=/invest/a20131200005.html target=_blank>00</a>]完整本息还款积分','1390072678','');");
E_D("replace into `yyd_credit_log` values('9865','1938','borrow','repay','522','borrow_repay_late_serious','-300','-300','还款[<a href=/invest/a20131200005.html target=_blank>00</a>]第0期积分','1390072678','');");
E_D("replace into `yyd_credit_log` values('9866','1948','payment','reg','1948','reg','30','30','注册获得金币','1390333657','');");
E_D("replace into `yyd_credit_log` values('9867','1949','payment','reg','1949','reg','30','30','注册获得金币','1390490631','');");
E_D("replace into `yyd_credit_log` values('9868','1938','borrow','tender','5800','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392127034','');");
E_D("replace into `yyd_credit_log` values('9869','1938','borrow','tender','5801','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392127035','');");
E_D("replace into `yyd_credit_log` values('9870','1938','borrow','tender','5802','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395620','');");
E_D("replace into `yyd_credit_log` values('9871','1938','borrow','tender','5803','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9872','1938','borrow','tender','5804','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9873','1938','borrow','tender','5805','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9874','1938','borrow','tender','5806','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9875','1938','borrow','tender','5807','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9876','1938','borrow','tender','5808','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9877','1938','borrow','tender','5809','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9878','1938','borrow','tender','5810','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9879','1938','borrow','tender','5811','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9880','1938','borrow','tender','5812','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9881','1938','borrow','tender','5813','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9882','1938','borrow','tender','5814','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9883','1938','borrow','tender','5815','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9884','1938','borrow','tender','5816','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9885','1938','borrow','tender','5817','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395621','');");
E_D("replace into `yyd_credit_log` values('9886','1938','borrow','tender','5818','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395622','');");
E_D("replace into `yyd_credit_log` values('9887','1938','borrow','tender','5819','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395622','');");
E_D("replace into `yyd_credit_log` values('9888','1938','borrow','tender','5820','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395622','');");
E_D("replace into `yyd_credit_log` values('9889','1938','borrow','tender','5821','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395622','');");
E_D("replace into `yyd_credit_log` values('9890','1938','borrow','tender','5822','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395622','');");
E_D("replace into `yyd_credit_log` values('9891','1938','borrow','tender','5823','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395622','');");
E_D("replace into `yyd_credit_log` values('9892','1938','borrow','tender','5824','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395622','');");
E_D("replace into `yyd_credit_log` values('9893','1938','borrow','tender','5825','tender_repay_time','0','0','收到借款[<a href=/invest/a20140100001.html target=_blank>流转标手机端测试（001）</a>]完整本息还款积分','1392395622','');");
E_D("replace into `yyd_credit_log` values('9894','1950','payment','reg','1950','reg','30','30','注册获得金币','1392859430','');");
E_D("replace into `yyd_credit_log` values('9895','1951','payment','reg','1951','reg','30','30','注册获得金币','1392892777','');");
E_D("replace into `yyd_credit_log` values('9896','1952','payment','reg','1952','reg','30','30','注册获得金币','1392965955','');");
E_D("replace into `yyd_credit_log` values('9897','1953','payment','reg','1953','reg','30','30','注册获得金币','1392965979','');");
E_D("replace into `yyd_credit_log` values('9898','1954','payment','reg','1954','reg','30','30','注册获得金币','1392995790','');");
E_D("replace into `yyd_credit_log` values('9899','1954','approve','realname','1954','realname','5','5','实名认证通过所得积分','1393225489','');");
E_D("replace into `yyd_credit_log` values('9900','1950','approve','realname','1950','realname','5','5','实名认证通过所得积分','1393226150','');");
E_D("replace into `yyd_credit_log` values('9901','1955','payment','reg','1955','reg','30','30','注册获得金币','1393292426','');");
E_D("replace into `yyd_credit_log` values('9902','1946','approve','realname','1946','realname','5','5','实名认证通过所得积分','1393343646','');");
E_D("replace into `yyd_credit_log` values('9903','1946','approve','phone','1946','phone','2','2','手机认证通过所得积分','1393343734','');");
E_D("replace into `yyd_credit_log` values('9904','1946','approve','video','1946','video','3','3','视频认证通过所得积分','1393343748','');");
E_D("replace into `yyd_credit_log` values('9905','1956','payment','reg','1956','reg','30','30','注册获得金币','1393345721','');");
E_D("replace into `yyd_credit_log` values('9906','1956','approve','realname','1956','realname','5','5','实名认证通过所得积分','1393346483','');");
E_D("replace into `yyd_credit_log` values('9907','1956','approve','phone','1956','phone','2','2','手机认证通过所得积分','1393346564','');");
E_D("replace into `yyd_credit_log` values('9908','1956','approve','video','1956','video','3','3','视频认证通过所得积分','1393346574','');");
E_D("replace into `yyd_credit_log` values('9909','1956','approve','work_credit','1956','work_credit','3','3','填写工作信息获得的积分','1393347451','');");
E_D("replace into `yyd_credit_log` values('9910','1956','approve','contact_credit','1956','contact_credit','5','5','填写主要联系人获得的积分','1393347648','');");
E_D("replace into `yyd_credit_log` values('9911','1957','payment','reg','1957','reg','30','30','注册获得金币','1393397133','');");
E_D("replace into `yyd_credit_log` values('9912','1958','payment','reg','1958','reg','30','30','注册获得金币','1393401433','');");
E_D("replace into `yyd_credit_log` values('9913','1950','approve','phone','1950','phone','2','2','手机认证通过所得积分','1393465089','');");
E_D("replace into `yyd_credit_log` values('9914','1959','payment','reg','1959','reg','30','30','注册获得金币','1393550665','');");
E_D("replace into `yyd_credit_log` values('9915','1960','payment','reg','1960','reg','30','30','注册获得金币','1393551822','');");
E_D("replace into `yyd_credit_log` values('9916','1961','payment','reg','1961','reg','30','30','注册获得金币','1393557439','');");
E_D("replace into `yyd_credit_log` values('9917','1962','payment','reg','1962','reg','30','30','注册获得金币','1393560295','');");
E_D("replace into `yyd_credit_log` values('9918','1962','approve','phone','1962','phone','2','2','手机认证通过所得积分','1393565565','');");
E_D("replace into `yyd_credit_log` values('9919','1963','payment','reg','1963','reg','30','30','注册获得金币','1393573394','');");
E_D("replace into `yyd_credit_log` values('9920','1964','payment','reg','1964','reg','30','30','注册获得金币','1393574599','');");
E_D("replace into `yyd_credit_log` values('9921','1963','approve','phone','1963','phone','2','2','手机认证通过所得积分','1393576490','');");
E_D("replace into `yyd_credit_log` values('9922','1965','payment','reg','1965','reg','30','30','注册获得金币','1393594893','');");
E_D("replace into `yyd_credit_log` values('9923','1966','payment','reg','1966','reg','30','30','注册获得金币','1393668614','');");
E_D("replace into `yyd_credit_log` values('9924','1966','approve','phone','1966','phone','2','2','手机认证通过所得积分','1393668717','');");
E_D("replace into `yyd_credit_log` values('9925','1967','payment','reg','1967','reg','30','30','注册获得金币','1393685963','');");
E_D("replace into `yyd_credit_log` values('9926','1968','payment','reg','1968','reg','30','30','注册获得金币','1393769312','');");
E_D("replace into `yyd_credit_log` values('9927','1968','approve','phone','1968','phone','2','2','手机认证通过所得积分','1393769419','');");
E_D("replace into `yyd_credit_log` values('9928','1968','approve','realname','1968','realname','5','5','实名认证通过所得积分','1393772068','');");
E_D("replace into `yyd_credit_log` values('9929','1969','payment','reg','1969','reg','30','30','注册获得金币','1393906619','');");
E_D("replace into `yyd_credit_log` values('9930','1970','payment','reg','1970','reg','30','30','注册获得金币','1393912363','');");
E_D("replace into `yyd_credit_log` values('9931','1971','payment','reg','1971','reg','30','30','注册获得金币','1393985371','');");
E_D("replace into `yyd_credit_log` values('9932','1972','payment','reg','1972','reg','30','30','注册获得金币','1393985744','');");
E_D("replace into `yyd_credit_log` values('9933','1973','payment','reg','1973','reg','30','30','注册获得金币','1393987418','');");
E_D("replace into `yyd_credit_log` values('9934','1974','payment','reg','1974','reg','30','30','注册获得金币','1410891645','');");

require("../../inc/footer.php");
?>