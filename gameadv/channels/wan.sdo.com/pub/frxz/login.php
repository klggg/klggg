<?php

//凡人修真2 800204200  8区混特游
if(isset($_GET['area_code']))
    $appArea	= $_GET['area_code'];

$appid = '800204200';
    
$url = "/index.php?r=site/Ingame&app_code={$appid}&area_code={$appArea}";
header('Location: ' . $url);
