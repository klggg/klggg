<?php
$url = '/index.php?r=gsite&gn=xj2';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();