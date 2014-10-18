<?php 
session_cache_limiter('private,must-revalidate'); 
session_start(); 
define('ROOT_PATH',dirname(__FILE__) .'/../'); 
header('Content-Type:text/html;charset=GB2312'); 
@ini_set('memory_limit','128M'); 
@ini_set('session.cache_expire',180); 
@ini_set('session.use_trans_sid',0); 
@ini_set('session.use_cookies',1); 
@ini_set('session.auto_start',0); 
@ini_set('display_errors',1); 
if (DIRECTORY_SEPARATOR == '\\'){ 
@ini_set('include_path','.;'.ROOT_PATH); 
}else{ 
@ini_set('include_path','.:'.ROOT_PATH); 
} 
date_default_timezone_set('Asia/Shanghai'); 
require_once(ROOT_PATH.'core/common.inc.php'); 
require_once(ROOT_PATH.'core/function.inc.php'); 
require_once(ROOT_PATH.'core/safe.inc.php'); 
require_once(ROOT_PATH.'core/mysql.class.php'); 
$mysql = new Mysql($db_config); 
require_once('magic.class.php'); 
$magic = new Magic(); 
require_once("upload.class.php"); 
$upload = new uploadClass(); 
require_once(ROOT_PATH.'core/waf.php');

 /* <!--流转标2-->*/
 require_once('zidongRepay.php');
?>