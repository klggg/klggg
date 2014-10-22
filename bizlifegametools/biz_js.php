<?php
/*
	2010-8-2 11:03 ggg
	实现论坛session 登录检查
	如登录直接echo出所有js内容
	否则显示登录论坛的窗口
*/


//session_start();

/*
		//之前已显示过
		if(isset($_COOKIE['showBulletin']))
		{
			return false;
		}
		else
		{
			setcookie("showBulletin", true, time() + 3600*12,'/'); 
		}

*/


show_all_js();

//给用户充值，即延长到期时间
function add_expire_date() {

	return true;

}


//得到用户到期时间
function get_expire_date() {

	return true;

}


//检查用户是否到期
function is_expire() {

	return true;

}

//检查用户是否登录
function is_login() {
	
	return true;

}

/*
	读取js文件列表，并直接输出
*/
function show_all_js() {

	$file_path	= dirname(__FILE__).'/js/';
	$js_file_list	= Array(
//		'biz.js'
		'tools.js'
		,'biz_mission.js'
		,'biz_company.js'
		,'biz_gadgets.js'
		,'biz_staff.js'
		);


	foreach($js_file_list as $tmp_file)
	{
		echo file_get_contents($file_path.$tmp_file);
	}
}