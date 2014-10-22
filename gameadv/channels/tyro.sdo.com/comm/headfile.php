<?php

	require dirname(__FILE__).'/../protected/ini.php';
	Yii::createWebApplication(CONFIG_PATH_DEFAULT);
	
	include 'UtilHelp.php';
	include 'mysql_class.php';