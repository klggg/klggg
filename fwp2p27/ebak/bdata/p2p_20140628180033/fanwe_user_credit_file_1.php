<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_credit_file`;");
E_C("CREATE TABLE `fanwe_user_credit_file` (
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `file` text NOT NULL,
  `create_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_credit_file` values('1','credit_identificationscanning','a:1:{i:0;s:50:\"./public/attachment/201301/14/17/50f3ce845a18a.jpg\";}','0');");
E_D("replace into `fanwe_user_credit_file` values('1','credit_house','a:1:{i:0;s:50:\"./public/attachment/201301/14/17/50f3ce845a18a.jpg\";}','0');");
E_D("replace into `fanwe_user_credit_file` values('1','credit_contact','a:2:{i:0;s:50:\"./public/attachment/201301/15/09/50f4b1a92ccd5.jpg\";i:1;s:50:\"./public/attachment/201301/15/09/50f4b18e93f79.jpg\";}','0');");
E_D("replace into `fanwe_user_credit_file` values('1','credit_incomeduty','a:1:{i:0;s:50:\"./public/attachment/201301/15/11/50f4cfbbb09f3.jpg\";}','0');");
E_D("replace into `fanwe_user_credit_file` values('1','credit_credit','a:1:{i:0;s:50:\"./public/attachment/201301/15/11/50f4cfd10b869.jpg\";}','0');");
E_D("replace into `fanwe_user_credit_file` values('1','credit_car','a:3:{i:0;s:50:\"./public/attachment/201301/15/14/50f4f3769c76c.jpg\";i:1;s:50:\"./public/attachment/201301/15/14/50f4f3769c76c.jpg\";i:2;s:50:\"./public/attachment/201301/15/14/50f4f3769c76c.jpg\";}','0');");
E_D("replace into `fanwe_user_credit_file` values('1','credit_residence','a:2:{i:0;s:50:\"./public/attachment/201301/19/10/50fa070599761.jpg\";i:1;s:50:\"./public/attachment/201301/19/10/50fa0638d3575.jpg\";}','1358534280');");
E_D("replace into `fanwe_user_credit_file` values('1','credit_mobilereceipt','a:1:{i:0;s:50:\"./public/attachment/201301/19/11/50fa192493730.jpg\";}','1358538917');");
E_D("replace into `fanwe_user_credit_file` values('8','credit_identificationscanning','a:2:{i:0;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";i:1;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";}','1381697606');");
E_D("replace into `fanwe_user_credit_file` values('8','credit_contact','a:4:{i:0;s:66:\"http://http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";i:1;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";i:2;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";i:3;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";}','1381697650');");
E_D("replace into `fanwe_user_credit_file` values('8','credit_credit','a:2:{i:0;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";i:1;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";}','1381697666');");
E_D("replace into `fanwe_user_credit_file` values('8','credit_incomeduty','a:2:{i:0;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";i:1;s:59:\"http://p2p.xtidi.com/data/avatar/88_avatar_middle_85_90.jpg\";}','1381697683');");
E_D("replace into `fanwe_user_credit_file` values('12','credit_contact','a:1:{i:0;s:85:\"http://img2.bdstatic.com/img/image/96147472f082025aafa40f775448fea964034f78f01906.jpg\";}','1381951283');");
E_D("replace into `fanwe_user_credit_file` values('22','credit_house','a:4:{i:0;s:50:\"./public/attachment/201401/12/23/52d2b29b0d674.jpg\";i:1;s:50:\"./public/attachment/201401/12/23/52d2b2a3216e2.jpg\";i:2;s:50:\"./public/attachment/201401/12/23/52d2b2abc40bc.jpg\";i:3;s:50:\"./public/attachment/201401/12/23/52d2b2b6ce1bb.jpg\";}','1389511225');");
E_D("replace into `fanwe_user_credit_file` values('22','credit_identificationscanning','a:2:{i:0;s:50:\"./public/attachment/201401/12/23/52d2b2cbd953d.jpg\";i:1;s:50:\"./public/attachment/201401/12/23/52d2b2d4a4736.jpg\";}','1389511253');");
E_D("replace into `fanwe_user_credit_file` values('22','credit_contact','a:4:{i:0;s:50:\"./public/attachment/201401/12/23/52d2b2e39c679.jpg\";i:1;s:50:\"./public/attachment/201401/12/23/52d2b2f111dbb.jpg\";i:2;s:50:\"./public/attachment/201401/12/23/52d2b2ea5e7d0.jpg\";i:3;s:50:\"./public/attachment/201401/12/23/52d2b2f78c0cf.jpg\";}','1389511311');");
E_D("replace into `fanwe_user_credit_file` values('22','credit_credit','a:2:{i:0;s:50:\"./public/attachment/201401/12/23/52d2b320afd38.jpg\";i:1;s:50:\"./public/attachment/201401/12/23/52d2b3276e70c.png\";}','1389511336');");
E_D("replace into `fanwe_user_credit_file` values('22','credit_incomeduty','a:4:{i:0;s:50:\"./public/attachment/201401/12/23/52d2b33304361.jpg\";i:1;s:50:\"./public/attachment/201401/12/23/52d2b340d4edc.jpg\";i:2;s:50:\"./public/attachment/201401/12/23/52d2b34857ceb.jpg\";i:3;s:50:\"./public/attachment/201401/12/23/52d2b33a98c86.jpg\";}','1389511369');");
E_D("replace into `fanwe_user_credit_file` values('22','credit_residence','a:4:{i:0;s:50:\"./public/attachment/201401/12/23/52d2b3e2a6fea.jpg\";i:1;s:50:\"./public/attachment/201401/12/23/52d2b3f10aaa4.jpg\";i:2;s:50:\"./public/attachment/201401/12/23/52d2b3e9a6c31.jpg\";i:3;s:50:\"./public/attachment/201401/12/23/52d2b3f7bb133.jpg\";}','1389511559');");
E_D("replace into `fanwe_user_credit_file` values('21','credit_identificationscanning','a:1:{i:0;s:50:\"./public/attachment/201406/28/16/53ae83fdeb7fa.jpg\";}','1403917183');");
E_D("replace into `fanwe_user_credit_file` values('21','credit_contact','a:1:{i:0;s:50:\"./public/attachment/201406/28/16/53ae840fe733c.jpg\";}','1403917206');");

require("../../inc/footer.php");
?>