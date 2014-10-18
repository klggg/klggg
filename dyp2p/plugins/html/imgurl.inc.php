<?php 

$nowtime=time(); 
$ExpDate = gmdate ("D, d M Y H:i:s",$nowtime +3600 * 24 * 15 ); 
header("Expires: $ExpDate GMT"); 
header("Last-Modified: ".gmdate ("D, d M Y H:i:s",$nowtime) ." GMT"); 
header("Cache-Control: public"); 
header("Pragma: Pragma"); 
$url = $_REQUEST['url']; 
$picurl =  Url2Key($url,"@imgurl@"); 
$pic = $picurl[1]; 
if (!file_exists(ROOT_PATH.$pic)){ 
echo 1;exit; 
} 
$fp = fopen(ROOT_PATH.$pic,"r"); 
$size = filesize(ROOT_PATH.$pic); 
$image = fread($fp,$size); 
header("Content-type: image/JPEG",true); 
echo $image; 
;echo ' '; 
?> 