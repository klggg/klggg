<?php
$url = '/index.php?r=gsite&gn=xcs';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();