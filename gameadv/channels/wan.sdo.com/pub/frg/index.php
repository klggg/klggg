<?php
$url = '/index.php?r=gsite&gn=frg';

foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";	
}
header('Location: ' . $url);
exit();