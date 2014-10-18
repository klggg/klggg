<?php
$url = "http://".$_SERVER['HTTP_HOST'].'/index.php?r=playgame';
foreach ($_GET as $key => $val){
	$url .= "&{$key}={$val}";
}
header('Location: ' . $url);
exit();