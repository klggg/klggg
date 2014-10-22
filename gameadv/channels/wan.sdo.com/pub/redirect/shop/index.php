<?php 

//游戏中点充值，地址是flash中固定的，所以只能在这里跳转到真实充值页面
$url = '/?r=site/pay&app_code=991000209';
header('Location: ' . $url);
exit();

