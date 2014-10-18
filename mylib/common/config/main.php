<?php


// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.


require_once(dirname(__FILE__).'/../global.php');


//业务相关
Yii::setPathOfAlias('mycommon',G_COMMON_PATH);
//业务无关
Yii::setPathOfAlias('mylib',G_SITE_LIB);

//业务无关
Yii::setPathOfAlias('script',G_SCRIPT_PATH);

//环境判定
switch(G_CODE_ENV)
{
    case "LOCAL" :
		$config=require(dirname(__FILE__).'/main_local.php');
        break;
    case "DEV" :
		$config=require(dirname(__FILE__).'/main_dev.php');
        break;
    case "TEST" :
        $config=require(dirname(__FILE__).'/main_test.php');
        break;        
    case "TEST01" :
        $config=require(dirname(__FILE__).'/main_test01.php');
        break;        
    case "PRE" :
        $config=require(dirname(__FILE__).'/main_pre.php');
        break;
    case "RELEASE" :
        $config=require(dirname(__FILE__).'/main_release.php');
        break;

}

require_once(G_COMMON_PATH . '/lib/LibRpcLog.php');
require_once(G_COMMON_PATH . '/lib/LibLogUdpOb.php');

LibRpcLog::setMask(LOG_PRI_RPC_DEBUG);
$udplog_ob = new LibLogUdpOb(UDPLOG_IP, UDPLOG_PORT);
$udplog_ob->setRate(UDPLOG_RATE, UDPLOG_TIME);
$udplog_ob->setMask(LOG_PRI_RPC_DEBUG);
LibRpcLog::attach($udplog_ob);

return CMap::mergeArray( array(

	'language'=>'zh_cn',
	'name'=>'SDO平台产品支撑系统', //wan.sdo.com 使用
	'extensionPath'=>G_COMMON_PATH.DIRECTORY_SEPARATOR.'extensions',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'mycommon.components.*',
		'mycommon.models.*',
		'mycommon.lib.*',
// 		'mycommon.service.*',
	    'mycommon.hps.*',
		'mycommon.game.*',		
		'mycommon.*',
		'mylib.http.*',
		'mylib.excel.*',
		'mylib.*',
		'script.commands.*',

	),


	// application components
	'components'=>array(


		// uncomment the following to enable URLs in path-format

//		'urlManager'=>array(
//			'urlFormat'=>'path',
//			'rules'=>array(
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//			),
//		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
             //       'errorAction'=>'site/error',
                ),


//		'log'=>array(
//        	'class'=>'CLogRouter',
//        	'routes'=>array(
//                  array(
//                    'class'=>'CFileLogRoute',
//                    'levels'=>'error, warning, info',
//                    //'logPath' =>G_LOG_PATH.'/9292wan/',
//                    'logFile' =>'warning.log',
//                    'maxFileSize' =>'1024',
//                ),
//                
//
//         	),
//
//     	)

	),

	'modules'=>array(

	//权限验证模块 默认配置
      'srbac' => array(
        'debug'=>false,	//true表示调试状态，即不进行权限限制		
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
			
			//默认采用开发环境配置
			//统一授权地址前辍
			'authUrlPre' => 'http://10.240.248.33:9530',

			//UAM测试地址前辍
			'uamUrlPre' => 'http://10.240.248.33:9554',
			//SDO运营支撑平台 的编号
			'appId' => '1107',


	        //非无锡机房错误日志上报url
	        'errorMonitorUrl'=>"http://api.monitor.sdo.com/error_report.php",

	        // //无锡机房错误日志上报url
	        // 'monitor_url'=>"http://10.150.9.13/error_report.php",

	        'hps' => array(
	        	'hpsHostname' => 'http://hps.sdo.com'
	        	,'hpsMerchantName' => '991000322_1631'
	        	,'hpsSecret' => '515f007c5179f2b60000001007528ba0'
	        	,'hpsSignatureMethod' => 'MD5'
	        	),
	        'hps_event' => array(
	        	'hpsHostname' => 'http://hps.sdo.com'
	        	,'hpsMerchantName' => '991000391_587'
	        	,'hpsSecret' => '08edbdab51c801e10000003006c79ba0'
	        	,'hpsSignatureMethod' => 'MD5'
	        	,'appId' => '991000391'
	        	),

	        	        
        ),

)
,$config);

