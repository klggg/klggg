<?php

	// 开发环境配置文件 

defined('YII_DEBUG') or define('YII_DEBUG',true);

//error_reporting(E_ALL);
error_reporting(E_ALL ^ E_NOTICE);

// defined('YII_DEBUG') or define('YII_DEBUG',false);
// error_reporting(E_ALL ^ E_NOTICE);

defined('UDPLOG_IP') or define('UDPLOG_IP', '10.152.24.11');
defined('UDPLOG_PORT') or define('UDPLOG_PORT', 19002);
defined('UDPLOG_RATE') or define('UDPLOG_RATE', 1);
defined('UDPLOG_TIME') or define('UDPLOG_TIME', 0.0001);

defined('G_SITE_DOMAIN') or define('G_SITE_DOMAIN', 'default');



return array(
	'components'=>array(

		'db'=>array(
		    'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_app_promotion',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'schemaCachingDuration' => 3600,//number of seconds that table metadata can remain valid in cache.	
			'tablePrefix' => 'app_',

		),

		'db_write'=>array(
		    'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_app_promotion',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'schemaCachingDuration' => 3600,
			'tablePrefix' => 'app_',

		),

		'db_read'=>array(

			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_app_promotion',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'schemaCachingDuration' => 3600,			
			'tablePrefix' => 'app_',

		),

		'db_report'=>array(
		    'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=app_report',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			// 'tablePrefix' => 'app_',

		),


		'db_open'=>array(
		    'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_app_open_etl',
			'username' => 'fk_app',
			'password' => 'fk_app@ipcdbserver',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => 'open_',

		),
		'db_doc'=>array(
		    'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_app_open_doc',
			'username' => 'fk_app',
			'password' => 'fk_app@ipcdbserver',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
		),
		'db_keysoftdown'=>array(
			'class'            => 'CDbConnection' ,		        
//			'connectionString' => 'mysql:host=10.152.24.12;dbname=fk_sd_key_plugin',
			'connectionString' => 'mysql:host=10.152.24.12;dbname=fk_key_softdown_log',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
//			'username' => 'app_pro',
//			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'latin1',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => '',

		),

		
        //插件工具数据库连接字符串
		'db_sdkeyplugin'=>array(
			'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=fk_sd_key_plugin',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => '',
		),
		//VersionUpdate
		'db_txz_login'=>array(
			'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=db_txz_login',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'latin1',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => '',
		),		
		'db_sdkeyplugin_read'=>array(
			'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=fk_sd_key_plugin',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'latin1',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => '',
		),		
		'db_sdkey_gph'=>array(
			'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=jipinhui',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'latin1',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => '',
		),
		'db_sdkey_gph_read'=>array(
			'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=jipinhui',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'latin1',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => '',
		),

        //插件工具日志数据库连接字符串
		'db_appplugin'=>array(
            'class'            => 'CDbConnection' ,		        
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_app_plugin',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => '',

		),        

		'db_operation'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_operation_platform',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'schemaCachingDuration'=>86400, // time in seconds 
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => 'app_',
		),
		'db_softdown_log'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=10.152.24.12;dbname=fk_key_softdown_log',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'latin1',
			// 'initSQLs'=>array('SET NAMES latin1'),
          ),

		'db_event'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_event',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => 'tbl_',
		),

		'db_event_new'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_event_new',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => 'tbl_',
		),

		'db_ghome_cms'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=10.152.24.12;dbname=ghome_cms',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => 'tbl_',
		),
		'db_remote_log'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=10.152.24.12;dbname=remote_log',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'tablePrefix' => 't_',
		),		
		'db_login3days'=>array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=10.152.24.12;dbname=d_login3days',
			'username' => 'app_pro',
			'password' => 'app_ASDFasdf123',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
			'schemaCachingDuration' => 3600,			
			'tablePrefix' => 'app_',

		),
		'log'=>array(
        	'class'=>'CLogRouter',
        	'routes'=>array(
            	array(
            	        'class'=>'MulFileLogRoute',
            	        // 'class'=>'CFileLogRoute',
            	        // 'class'=>'CProfileLogRoute',
            	        
            	        // 'class'=>'CDbLogRoute',
            	        'levels'=>'trace,info,warning,error',
            	        'logPath' =>G_LOG_PATH.'/runtime/',
            	        'logFile' =>'web.log',
            	        'maxFileSize' =>'502400', //502400
            	        'maxLogFiles' =>'10',
            	        // 'logTableName'=>'stat_script_log',
            	        // 'connectionID'=>'statdb',
            	        // 'levels'=>'info,error,warning',
            	),
            	array(
            	        'class'=>'RpcLogRoute',
            	        'levels'=>'trace,info,warning,error',
            	),
 /*                array(
                    'class'=>'CWebLogRoute',
                     //'class'=>'CProfileLogRoute',
                    //'levels'=>'trace,error, warning, info',
                    //'logPath' =>G_LOG_PATH.'/runtime/',
                ),
                 
                array(
                    'class'=>'CProfileLogRoute',
                    'levels'=>'profile',
                ),
*/
				// array('class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute', 
				// 	'ipFilters' => array('127.0.0.1','10.241.34.93','*')
				// 	),
         	),
     	)
		//memcache
        ,'cache'=>array(
             'class'=>'CMemCache',
             'servers'=>array(
                 array(
                     'host'=>'10.152.24.11',
                     'port'=>11211,
                     'weight'=>60,
                 ),
                 array(
                     'host'=>'10.152.24.12',
                     'port'=>11211,
                     'weight'=>40,
                 ),
             ),
         )

		,'errorHandler'=>array(
			// use 'site/error' action to display errors
					'errorAction'=>'site/error',
                ),

	),

	'modules'=>array(

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','*'),
		),
		//权限验证模块 默认配置
      'srbac' => array(
        'debug'=>true,	//true表示调试状态，即不进行权限限制		
        ),	
		

	),

	// using Yii::app()->params['paramName']
	'params'=>array(
			

		//开发环境
		//'uploadpath_msgpush' => G_UPLOAD_PATH.'/msgpush',
		'uploadpath_msgpush' => G_UPLOAD_PATH.'/msgpush',
		'picpath_msgpush' => 'http://dev.ppsupport.sdo.com/upload/msgpush/',

		'prevUploadUrl' => 'http://dev.ppsupport.sdo.com/upload',
		'uploadUrl' => 'http://dev.ppsupport.sdo.com/upload',


            	//'picpath_msgpush' => 'http://local.cdn.t.sdo.com:8099/msgpush/',
            
            //apk上传目录 
            'uploadpath_apk' => G_UPLOAD_PATH.'/apk',
            
						
			//统一授权地址前辍
			// 'authUrlPre' => 'http://10.240.248.33:9530',
			'authUrlPre' => 'http://10.241.37.61:9530', //吴懿昕做的代理

			//UAM测试地址前辍
			// 'uamUrlPre' => 'http://10.240.248.33:9554',
			'uamUrlPre' => 'http://10.241.37.61:9554', //吴懿昕做的代理
			//SDO运营支撑平台 的编号
			'appId' => '1107',
			'uamAppId' => '1107',


			/*//线上环境
			//统一授权地址前辍
			'authUrlPre' => 'http://auth.corp.snda.com',
			//UAM地址前辍
			'uamUrlPre' => 'http://uam.corp.snda.com',
			//SDO运营支撑平台 的编号
			'appId' => '2525',*/
            //打包接口URL
            'PackUrl' => 'http://10.132.17.23:808/fk/yaoshi/package/packageWithBatchNo',
            //发布接口URL
            'ReleaseUrl' => 'http://10.132.17.23:808/fk/yaoshi/Package/Release',


            'redis' => Array(

				'servers' => array(
			       array(
		               // 'host'     => '127.0.0.1',
		               'host'     => '10.152.24.11',
		               'port'     => 6379,
		               'database' => 15,
		               // 'alias'    => 'master',
		                // 'password' => 'secret', 
		            ),
/*		            array(
		               // 'host'     => '127.0.0.1',
		               'host'     => '10.152.24.12',
		                'port'     => 6379,
		               'database' => 15,
		               'alias'    => 'slave',
		               // 'prefix'    => 'xxx_',
		                // 'password' => 'secret', 
		            ),*/
		            // array(
		            //    'host'     => '127.0.0.1',
		            //    // 'host'     => '10.152.24.12',
		            //     'port'     => 6380,
		            //    'database' => 15,
		            //    'alias'    => 'slave',
		            //    // 'prefix'    => 'xxx_',
		            //     // 'password' => 'secret', 
		            // ), 
		        ),
		        // 'options' =>Array('replication' => true),
		        // 'options' =>Array(),
			)
			,'redis_bak' => Array(
				'servers' => array(
		               // 'host'     => '127.0.0.1',
		               'host'     => '10.152.24.12',
		               'port'     => 6379,
		               'database' => 15,
		               // 'prefix'    => 'xxx_',
		        ),

			)
			,'redis_lottery' => Array(
				'servers' => array(
		               'host'     => '10.152.24.11',
		               'port'     => 6379,
		               'database' => 15,
		               // 'prefix'    => 'xxx_',
		        ),

			)
			,'redis_event' => Array(
				'servers' => array(
		               'host'     => '10.152.24.11',
		               'port'     => 6379,
		               'database' => 10,
		               // 'prefix'    => 'xxx_',
		        ),

			)

	   ,'memcache_addrs' => array(
	        1 => array(
	            'ip' => '10.152.24.11',
	            'port' => '11211',
	        ),
	        2 => array(
	            'ip' => '10.152.24.12',
	            'port' => '11211',
	        ),
	    ),

	   'memcache_sess' => array(
	        array(
	            'ip' => '10.152.24.11',
	            'port' => '11212',
	        ),
	        array(
	            'ip' => '10.152.24.12',
	            'port' => '11212',
	        ),
	    ),
	   'memcache_g_sdo_com' => array(
	        array(
	            'ip' => '10.152.24.11',
	            'port' => '11211',
	        ),
	        array(
	            'ip' => '10.152.24.12',
	            'port' => '11211',
	        ),
	   	),
	   'memcache_act_g_sdo_com' => array(
	        array(
	            'ip' => '10.152.24.11',
	            'port' => '11214',
	        ),
	        array(
	            'ip' => '10.152.24.12',
	            'port' => '11214',
	        ),
	   	),


	   //用于自检 by wwj 
	   'self_check' => array(
	   		 //检查指定服务器对某url的响应是否为２００
	   		'webserver' => Array(
             'http://pp.t.sdo.com/index.php' => Array(
                '10.152.24.11',
                '10.152.24.12',
                )
             )

	   	)
	    //针对游戏相关配置
	    ,'game' => array(
	    	'url_itemgate'  => 'http://116.211.10.177:7778/itemgateweb/itemgatews?wsdl'
	  	  )	  	   
	//消息中心接口配置 
	,'msgcentersetting' => array(		
		'server_appid_set'=>'http://101.227.1.63:5779/fk/yaoshi/msgcentersetting/server_appid_set' ,
		'server_typeid_set'=>'http://101.227.1.63:5779/fk/yaoshi/msgcentersetting/server_typeid_set' 
	)

        ),



	);
