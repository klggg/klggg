<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.


//业务相关
Yii::setPathOfAlias('mycommon',G_COMMON_PATH);
//业务无关
Yii::setPathOfAlias('mylib',G_SITE_LIB);



return array(
//        'modulePath'=>CURR_SCRIPT_PATH.'/modules',

	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	'import'=>array(
//		'application.models.*',
//		'application.components.*',
		'mylib.*',
	),


	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
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
);