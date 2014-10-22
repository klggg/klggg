<?php
//abcde
require dirname(__FILE__).'/../protected/ini.php';
Yii::createWebApplication(CONFIG_PATH_DEFAULT);

User::delAuthInfo();
?>
app_logout_API('9292wan.com');