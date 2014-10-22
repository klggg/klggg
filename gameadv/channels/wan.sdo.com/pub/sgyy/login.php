<?php


if(isset($_GET['area_code']))
    $appArea	= $_GET['area_code'];

$appid = '757';
    
$url = "/index.php?r=site/Ingame&app_code={$appid}&area_code={$appArea}";
header('Location: ' . $url);
exit();