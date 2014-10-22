<?php

	//用来测试md5

	require_once '../comm/UtilHelp.php';
	require_once '../comm/Query.php';
		
	$re = $_SERVER['QUERY_STRING'];
	
	$parArr = UtilHelp::queryStr2Array($re);
	$key = 'sPcCfBNM7qiF';
	
	$sign = UtilHelp::generateSign($parArr,$key);
	echo $sign;