<?php 
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://163u.taobao.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 龙胜网络科技(163u.taobao.com)
// +----------------------------------------------------------------------\
error_reporting(0);
if(!defined('APP_ROOT_PATH')) 
define('APP_ROOT_PATH', str_replace('verify.php', '', str_replace('\\', '/', __FILE__)));
require APP_ROOT_PATH."system/utils/es_session.php";
es_session::start();
require APP_ROOT_PATH."system/utils/es_image.php";
es_image::buildImageVerify(4,1);
?>