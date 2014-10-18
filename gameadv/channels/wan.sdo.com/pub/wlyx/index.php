<?php
$url = '/index.php?r=gsite&gn=wlyx';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();