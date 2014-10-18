<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: member_register.php 23897 2011-08-15 09:21:07Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
showmessage("正在为您跳转到会员注册页面..."," /index.php?user&q=reg");
define('NOROBOT', TRUE);

$ctl_obj = new register_ctl();
$ctl_obj->setting = $_G['setting'];
$ctl_obj->template = 'member/register';
$ctl_obj->on_register();

?>