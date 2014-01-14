<?php
/*
 * 2012-02-09
 * author jackie.li
 * 全局配置文件 
 * 用于联运平台所有配置文件的最顶级配置
 * 某些参数如需更换可在私有配置文件下进行重载
 */

define('G_GLOBAL_PATH',dirname(__FILE__));

define('G_SITE_LIB',G_GLOBAL_PATH.'/mylib/lib');
define('G_COMMON_PATH',G_GLOBAL_PATH.'/mylib/common');
define('G_COMMON_CONFIG_PATH',G_COMMON_PATH.'/config');
define('G_SCRIPT_PATH',G_GLOBAL_PATH.'/script');
define('G_CACHE_PATH',G_GLOBAL_PATH.'/upload/cache');


date_default_timezone_set("Asia/Shanghai");
//环境判定
if (!defined('G_CODE_ENV'))
{
    $hostname = php_uname('n'); 
    
    if( 0 === strpos($hostname,'SH-')){
    	define('G_CODE_ENV', 'LOCAL');
		defined('YII_DEBUG') or define('YII_DEBUG',true);

    }
	else if ((
		in_array($hostname, array(
		'test-web-90', 'oa-dev-server','oa-dev','oa-dev-120','SH-WANGWEIJUN01','klggg-ubuntu'
		,'sh-panxinming.snda.root.corp'
		,'dev-app-ppsupport-web-85'
		)) )  || ( 0 === strpos($hostname,'dev-app-ppsupport-web') )) { 
		
        define('G_CODE_ENV', 'DEV');
		
		defined('YII_DEBUG') or define('YII_DEBUG',true);
		

    }else if (in_array($hostname, array('GplusTEST01' ))) {
        define('G_CODE_ENV', 'TEST01');
        defined('YII_DEBUG') or define('YII_DEBUG',true);
        
   }  
    else if (in_array($hostname, array('mobile.open.snda.com', 'C113479', 'C113464', 'C113480', 'fefe'
		,'test1752'
		,'test-app-ppsupport-web-db-86'
                ,'test-app-ppsupport-web-12','test-web'
		))) {
        define('G_CODE_ENV', 'TEST');
		defined('YII_DEBUG') or define('YII_DEBUG',true);
        
   } else if ( 0 === strpos($hostname,'pre-app-ppsupport-web')) {
       define('G_CODE_ENV', 'PRE');
 	   defined('YII_DEBUG') or define('YII_DEBUG',false);

   }
    else {
        define('G_CODE_ENV', 'RELEASE');
 		defined('YII_DEBUG') or define('YII_DEBUG',false);
 			
   }
}


//define('G_RUNTIME_PATH',G_LOG_PATH.'/runtime');
