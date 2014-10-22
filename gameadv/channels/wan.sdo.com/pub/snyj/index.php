<?php
$url = '/index.php?r=gsite&gn=snyj';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();