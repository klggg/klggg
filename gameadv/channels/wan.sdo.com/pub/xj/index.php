<?php
$url = '/index.php?r=gsite&gn=xj';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();