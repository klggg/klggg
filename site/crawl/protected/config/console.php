<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.


//ҵ�����
Yii::setPathOfAlias('mycommon',G_COMMON_PATH);
//ҵ���޹�
Yii::setPathOfAlias('mylib',G_SITE_LIB);



return array(
//        'modulePath'=>CURR_SCRIPT_PATH.'/modules',

	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'mylib.*',
	),


	// application components
	'components'=>array(
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=crawl',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'ggg123',
			'charset' => 'utf8',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'trace,info,error,warning',
                    'logFile' =>'script.log',
                    'maxFileSize' =>'502400', //502400
                    'maxLogFiles' =>'10',   					
/*                       'logPath' =>G_LOG_PATH.'/script/',
                       'logFile' =>'status.log',
                       'maxFileSize' =>'502400', //502400
                       'maxLogFiles' =>'10',                        
*/
				),
			),
		),
	),
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'zk8' => array(
		 'login_email' =>'gggxin@126.com',
		 'login_pass' =>'xinghong123',		 
//		 'login_email' =>'76458857@qq.com',
//		 'login_pass' =>'970406',		 
		)
	),	
);