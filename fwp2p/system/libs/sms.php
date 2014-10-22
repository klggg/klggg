<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://163u.taobao.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 龙胜网络科技(163u.taobao.com)
// +----------------------------------------------------------------------

interface sms{
	
	/**
	 * 发送短信
	 * @param array $mobile_number		手机号
	 * @param string $content		短信内容
	 * return array(status='',msg='')
	*/
	function sendSMS($mobile_number,$content);
	
	/*获取该短信接口的相关数据*/
	function getSmsInfo();
	
	function check_fee();
}
?>