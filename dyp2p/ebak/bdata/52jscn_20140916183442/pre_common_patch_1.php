<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `pre_common_patch`;");
E_C("CREATE TABLE `pre_common_patch` (
  `serial` varchar(10) NOT NULL default '',
  `rule` text NOT NULL,
  `note` text NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `pre_common_patch` values('25000003','a:1:{i:0;a:5:{s:8:\"filename\";s:39:\"source/class/discuz/discuz_database.php\";s:6:\"search\";s:108:\"CQkkY2xlYW4gPSBwcmVnX3JlcGxhY2UoIi9bXmEtejAtOV9cLVwoXCkjXCpcL1wiXSsvaXMiLCAiIiwgc3RydG9sb3dlcigkY2xlYW4pKTs=\";s:7:\"replace\";s:196:\"CQlpZihzdHJwb3MoJGNsZWFuLCAnQCcpICE9PSBmYWxzZSkgew0KCQkJcmV0dXJuICctMyc7DQoJCX0NCgkJDQoJCSRjbGVhbiA9IHByZWdfcmVwbGFjZSgiL1teYS16MC05X1wtXChcKSNcKlwvXCJdKy9pcyIsICIiLCBzdHJ0b2xvd2VyKCRjbGVhbikpOw==\";s:5:\"count\";s:1:\"1\";s:4:\"nums\";a:1:{i:0;s:1:\"1\";}}}','&#x589e;&#x5f3a;SQL&#x7684;&#x5b89;&#x5168;&#x9632;&#x5fa1;&#xff0c;&#x8bf7;&#x53ca;&#x65f6;&#x4fee;&#x590d;','1','1364195325');");
E_D("replace into `pre_common_patch` values('25000004','a:2:{i:0;a:5:{s:8:\"filename\";s:39:\"source/class/discuz/discuz_database.php\";s:6:\"search\";s:132:\"aWYgKHN0cnBvcygkc3FsLCAnLycpID09PSBmYWxzZSAmJiBzdHJwb3MoJHNxbCwgJyMnKSA9PT0gZmFsc2UgJiYgc3RycG9zKCRzcWwsICctLSAnKSA9PT0gZmFsc2UpIHs=\";s:7:\"replace\";s:216:\"aWYgKHN0cnBvcygkc3FsLCAnLycpID09PSBmYWxzZSAmJiBzdHJwb3MoJHNxbCwgJyMnKSA9PT0gZmFsc2UgJiYgc3RycG9zKCRzcWwsICctLSAnKSA9PT0gZmFsc2UgJiYgc3RycG9zKCRzcWwsICdAJykgPT09IGZhbHNlICYmIHN0cnBvcygkc3FsLCAnYCcpID09PSBmYWxzZSkgew==\";s:5:\"count\";s:1:\"1\";s:4:\"nums\";a:1:{i:0;s:1:\"1\";}}i:1;a:5:{s:8:\"filename\";s:39:\"source/class/discuz/discuz_database.php\";s:6:\"search\";s:212:\"CQkJCQljYXNlICdcJyc6DQoJCQkJCQlpZiAoISRtYXJrKSB7DQoJCQkJCQkJJG1hcmsgPSAnXCcnOw0KCQkJCQkJCSRjbGVhbiAuPSAkc3RyOw0KCQkJCQkJfSBlbHNlaWYgKCRtYXJrID09ICdcJycpIHsNCgkJCQkJCQkkbWFyayA9ICcnOw0KCQkJCQkJfQ0KCQkJCQkJYnJlYWs7\";s:7:\"replace\";s:424:\"CQkJCQljYXNlICdgJzoNCgkJCQkJCWlmKCEkbWFyaykgew0KCQkJCQkJCSRtYXJrID0gJ2AnOw0KCQkJCQkJCSRjbGVhbiAuPSAkc3RyOw0KCQkJCQkJfSBlbHNlaWYgKCRtYXJrID09ICdgJykgew0KCQkJCQkJCSRtYXJrID0gJyc7DQoJCQkJCQl9DQoJCQkJCQlicmVhazsNCgkJCQkJY2FzZSAnXCcnOg0KCQkJCQkJaWYgKCEkbWFyaykgew0KCQkJCQkJCSRtYXJrID0gJ1wnJzsNCgkJCQkJCQkkY2xlYW4gLj0gJHN0cjsNCgkJCQkJCX0gZWxzZWlmICgkbWFyayA9PSAnXCcnKSB7DQoJCQkJCQkJJG1hcmsgPSAnJzsNCgkJCQkJCX0NCgkJCQkJCWJyZWFrOw==\";s:5:\"count\";s:1:\"1\";s:4:\"nums\";a:1:{i:0;s:1:\"1\";}}}','&#x589e;&#x5f3a;SQL&#x7684;&#x5b89;&#x5168;&#x9632;&#x5fa1;&#xff0c;&#x8bf7;&#x53ca;&#x65f6;&#x4fee;&#x590d;','1','1364875654');");

require("../../inc/footer.php");
?>