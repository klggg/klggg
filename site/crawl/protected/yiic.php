<?php

require_once dirname(__FILE__).'/../../../global.php';


// change the following paths if necessary
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


$yiic=dirname(__FILE__).'/../../../vendor/yiisoft/yii/framework/yiic.php';
$config=dirname(__FILE__).'/config/console.php';

require_once($yiic);
