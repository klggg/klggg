<?php 

if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>"; 
function ip_address() { 
if(!empty($_SERVER["HTTP_CLIENT_IP"])) { 
$ip_address = $_SERVER["HTTP_CLIENT_IP"]; 
}else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){ 
$ip_address = array_pop(explode(',',$_SERVER['HTTP_X_FORWARDED_FOR'])); 
}else if(!empty($_SERVER["REMOTE_ADDR"])){ 
$ip_address = $_SERVER["REMOTE_ADDR"]; 
}else{ 
$ip_address = ''; 
} 
return $ip_address; 
} 
function IsExiest($val){ 
if (isset($val) &&($val!=""||$val==0)){ 
return $val; 
}else{ 
return false; 
} 
} 
function authcode($string,$operation = 'DECODE',$key = '',$expiry = 0) { 
$ckey_length = 4; 
$key = md5($key ?$key : "dw10c20m05w18"); 
$keya = md5(substr($key,0,16)); 
$keyb = md5(substr($key,16,16)); 
$keyc = $ckey_length ?($operation == 'DECODE'?substr($string,0,$ckey_length): substr(md5(microtime()),-$ckey_length)) : '';
 $cryptkey = $keya.md5($keya.$keyc); 
$key_length = strlen($cryptkey); 
$string = $operation == 'DECODE'?base64_decode(substr($string,$ckey_length)) : sprintf('%010d',$expiry ?$expiry +time() : 0).substr(md5($string.$keyb),0,16).$string;
 $string_length = strlen($string); 
$result = ''; 
$box = range(0,255); 
$rndkey = array(); 
for($i = 0;$i <= 255;$i++) { 
$rndkey[$i] = ord($cryptkey[$i %$key_length]); 
} 
for($j = $i = 0;$i <256;$i++) { 
$j = ($j +$box[$i] +$rndkey[$i]) %256; 
$tmp = $box[$i]; 
$box[$i] = $box[$j]; 
$box[$j] = $tmp; 
} 
for($a = $j = $i = 0;$i <$string_length;$i++) { 
$a = ($a +1) %256; 
$j = ($j +$box[$a]) %256; 
$tmp = $box[$a]; 
$box[$a] = $box[$j]; 
$box[$j] = $tmp; 
$result .= chr(ord($string[$i]) ^($box[($box[$a] +$box[$j]) %256])); 
} 
if($operation == 'DECODE') { 
if((substr($result,0,10) == 0 ||substr($result,0,10) -time() >0) &&substr($result,10,16) == substr(md5(substr($result,26).$keyb),0,16)) {
 return substr($result,26); 
}else { 
return ''; 
} 
}else { 
return $keyc.str_replace('=','',base64_encode($result)); 
} 
} 
function SetCookies($data = array()){ 
global $_G; 
$_session_id = !IsExiest($data['session_id'])?md5("dwcms_userid"):md5($data['session_id']);
 $_time = !IsExiest($data['time'])?60*60:$data['time']; 
if (IsExiest($data['cookie_status'])!=false &&$data['cookie_status'] == 1){ 
setcookie($_session_id,authcode($data['user_id'].",".time(),"ENCODE"),time()+$_time);
 }else{ 
$_SESSION[$_session_id] = authcode($data['user_id'].",".time(),"ENCODE"); 
$_SESSION['login_endtime'] = time()+60*60; 
} 
} 
function GetCookies($data = array()){ 
$_session_id = !IsExiest($data['session_id'])?md5("dwcms_userid"):md5($data['session_id']);
 $_time = !IsExiest($data['time'])?60*60:$data['time']; 
$_user_id = array(0); 
if (IsExiest($data['cookie_status'])!=false &&$data['cookie_status'] == 1){ 
$_user_id = explode(",",authcode(isset($_COOKIE[$_session_id])?$_COOKIE[$_session_id]:"","DECODE"));
 }else{ 
$_user_id = explode(",",authcode(isset($_SESSION[$_session_id])?$_SESSION[$_session_id]:"","DECODE"));
 } 
return $_user_id[0]; 
} 
function DelCookies($data = array()){ 
$_session_id = !IsExiest($data['session_id'])?md5("dwcms_userid"):md5($data['session_id']);
 if (IsExiest($data['cookie_status'])!=false &&$data['cookie_status'] == 1){ 
setcookie($_session_id,"",time()); 
}else{ 
$_SESSION[$_session_id] = ""; 
$_SESSION['login_endtime'] = ""; 
} 
} 
function DelFile($dir) { 
if (is_dir($dir)) { 
$dh=opendir($dir); 
while (false !== ( $file = readdir ($dh))) { 
if($file!="."&&$file!="..") { 
$fullpath=$dir."/".$file; 
if(!is_dir($fullpath)) { 
unlink($fullpath); 
}else { 
del_file($fullpath); 
} 
} 
} 
closedir($dh); 
} 
} 
function post_var($var,$type=""){ 
if (is_array($var)){ 
foreach ($var as $key =>$val){ 
$_val = (isset($_POST[$val]) &&$_POST[$val]!="")?$_POST[$val]:""; 
if ($_val==""){ 
$_val=NULL; 
}elseif (!is_array($_val) ){ 
if ($val!="content"){ 
$_val = nl2br($_val); 
} 
}else{ 
$_val = join(",",$_val); 
} 
$result[$val] = $_val; 
if($val=="area"){ 
$result[$val] = post_area(); 
}elseif($val=="flag"){ 
$result[$val] = !isset($_POST["flag"])?NULL:join(",",$_POST["flag"]); 
}elseif ($val=="clearlitpic"){ 
if ($result["clearlitpic"]!=""&&$result["clearlitpic"]==1){ 
$result['litpic'] = NULL; 
} 
unset($result["clearlitpic"]); 
}elseif($val=="updatetime"){ 
$result[$val] = time(); 
}elseif($val=="updateip"){ 
$result[$val] = ip_address(); 
}elseif($_val == "content"){ 
$result[$val] = htmlspecialchars($result[$val]); 
} 
} 
return $result; 
}else{ 
return (!isset($_POST[$var]) ||$_POST[$var]=="")?NULL:$_POST[$var]; 
} 
} 
function post_area($nid = ""){ 
$pname = $nid."procvince"; 
$cname = $nid."city"; 
$aname = $nid."area"; 
if (isset($_POST[$aname]) &&$_POST[$aname]!=""){ 
if ($_POST[$cname]==""){ 
$area = $_POST[$pname]; 
}else{ 
$area = $_POST[$aname]; 
} 
}else{ 
if (isset($_POST[$cname]) &&$_POST[$cname]!=""){ 
$area = $_POST[$cname]; 
}else{ 
$area = isset($_POST[$pname])?$_POST[$pname]:""; 
} 
} 
return  $area; 
} 
function get_file($dir,$type='dir'){ 
$result = ""; 
if (is_dir($dir)) { 
if ($dh = opendir($dir)){ 
while (($file = readdir($dh)) !== false){ 
$_file = $dir."/".$file; 
if ($file !="."&&$file != ".."&&filetype($_file)==$type ){ 
$result[] = $file; 
} 
} 
closedir($dh); 
} 
} 
return $result; 
} 
function read_file($filename) { 
if ( file_exists($filename) &&is_readable($filename) &&($fd = @fopen($filename,'rb')) ) {
 $contents = ''; 
while (!feof($fd)) { 
$contents .= fread($fd,8192); 
} 
fclose($fd); 
return $contents; 
}else { 
return false; 
} 
} 
function create_dir($dir,$dir_perms=0775){ 
if (DIRECTORY_SEPARATOR!='/') { 
$dir = str_replace('\\','/',$dir); 
} 
if (is_dir($dir)){ 
return true; 
} 
if (@ mkdir($dir,$dir_perms)){ 
return true; 
} 
if (!create_dir(dirname($dir))){ 
return false; 
} 
return mkdir($dir,$dir_perms); 
} 
function create_file($dir,$contents=""){ 
$dirs = explode('/',$dir); 
if($dirs[0]==""){ 
$dir = substr($dir,1); 
} 
create_dir(dirname($dir)); 
@chmod($dir,0777); 
if (!($fd = @fopen($dir,'wb'))) { 
$_tmp_file = $dir .DIRECTORY_SEPARATOR .uniqid('wrt'); 
if (!($fd = @fopen($_tmp_file,'wb'))) { 
trigger_error("系统无法写入文件'$_tmp_file'"); 
return false; 
} 
} 
fwrite($fd,$contents); 
fclose($fd); 
@chmod($dir,0777); 
return true; 
} 
function check_valicode(){ 
$msg = ""; 
if($_SESSION['valicode']!=$_POST['valicode']){ 
$msg = array("验证码不正确"); 
}else{ 
$_SESSION['valicode'] = ""; 
} 
return $msg; 
} 
function struct_to_array($item) { 
if(!is_string($item)) { 
$item = (array)$item; 
foreach ($item as $key=>$val){ 
$item[$key]  =  struct_to_array($val); 
} 
} 
return $item; 
} 
function xml_to_array( $xml )  
{ 
$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/"; 
if(preg_match_all($reg,$xml,$matches))  
{ 
$count = count($matches[0]); 
for($i = 0;$i <$count;$i++)  
{ 
$subxml= $matches[2][$i]; 
$key = $matches[1][$i]; 
if(preg_match( $reg,$subxml ))  
{ 
$arr[$key] = xml_to_array( $subxml ); 
}else{ 
$arr[$key] = $subxml; 
} 
} 
} 
return $arr; 
} 
function xmltoarray( $xml )  
{ 
$arr = xml_to_array($xml); 
$key = array_keys($arr); 
return $arr[$key[0]]; 
} 
function Url2Key($key,$type) { 
$key = base64_decode ( urldecode ( $key ) ); 
return explode ($type,$key ); 
} 
function check_rank($purview){ 
global $_G,$_A; 
$admin_purview = explode(",",$_A['admin_result']['purview']); 
if (in_array("other_all",$admin_purview) ||$_A['admin_result']['type_id']==1){ 
return true; 
}else if (!in_array($purview,$admin_purview)){ 
echo "<script>alert('你没有权限');history.go(-1);</script>";exit; 
} 
} 
function url_format($url,$format = ''){ 
if ($url=="") return "?"; 
$_url =  explode("?",$url); 
$_url_for = ""; 
if (isset($_url[1]) &&$_url[1]!=""){ 
$request = $_url[1]; 
if ($request != ""){ 
$_request = explode("&",$request); 
foreach ($_request as $key =>$value){ 
$_value = explode("=",$value); 
if (trim($_value[0])!=$format){ 
$_url_for ="&".$value; 
} 
} 
} 
$_url_for = substr($_url_for,1,strlen($_url_for)); 
} 
return "?".$_url_for; 
} 

function get_times_jh($data=array()){ 

 //借款的月数
	if (isset($data['num']) && $data['num']>0){
		$period = $data['num'];
		if ($period == 0.03){
		 $period = 1;
		}
		else if($period == 0.06){
		 $period = 2;
		}
	else if($period == 0.10){
		 $period = 3;
		}
	else if($period == 0.13){
		 $period = 4;
		}
	else if($period == 0.16){
		 $period = 5;
		}
	else if($period == 0.20){
		 $period = 6;
		}
	else if($period == 0.23){
		 $period = 7;
		}
	else if($period == 0.26){
		 $period = 8;
		}
	else if($period == 0.30){
		 $period = 9;
		}
	else if($period == 0.33){
		 $period = 10;
		}
	else if($period == 0.36){
		 $period = 11;
		}
	else if($period == 0.40){
		 $period = 12;
		}
	else if($period == 0.43){
		 $period = 13;
		}
	else if($period == 0.46){
		 $period = 14;
		}
	else if($period == 0.50){
		 $period = 15;
		}
	else if($period == 0.53){
		 $period = 16;
		}
	else if($period == 0.56){
		 $period = 17;
		}
	else if($period == 0.60){
		 $period = 18;
		}
	else if($period == 0.63){
		 $period = 19;
		}
	else if($period == 0.66){
		 $period = 20;
		}
	else if($period == 0.70){
		 $period = 21;
		}
	else if($period == 0.73){
		 $period = 22;
		}
	else if($period == 0.76){
		 $period = 23;
		}
	else if($period == 0.80){
		 $period = 24;
		}
	else if($period == 0.83){
		 $period = 25;
		}
	else if($period == 0.86){
		 $period = 26;
		}
	else if($period == 0.90){
		 $period = 27;
		}
	else if($period == 0.93){
		 $period = 28;
		}
	else if($period == 0.96){
		 $period = 29;
		}else{
		$period=$period*30;	
		}
	}
	
	
	$_result=$data['time']+$period*24*60*60;
	return $_result; 
}

function get_times($data=array()){ 
if (isset($data['time']) &&$data['time']!=""){ 
$time = $data['time']; 
}elseif (isset($data['date']) &&$data['date']!=""){ 
$time = strtotime($data['date']); 
}else{ 
$time = time(); 
} 
if (isset($data['type']) &&$data['type']!=""){ 
$type = $data['type']; 
}else{ 
$type = "month"; 
} 
if (isset($data['num']) &&$data['num']!=""){ 
$num = $data['num']; 
}else{ 
$num = 1; 
} 
if ($type=="month"){ 
$month = date("m",$time); 
$year = date("Y",$time); 
$_result = strtotime("$num month",$time); 
$_month = (int)date("m",$_result); 
if ($month+$num>12){ 
$_num = $month+$num-12; 
$year = $year+1; 
}else{ 
$_num = $month+$num; 
} 
if ($_num!=$_month){ 
$_result = strtotime("-1 day",strtotime("{$year}-{$_month}-01")); 
} 
}else{ 
$_result = strtotime("$num $type",$time); 
} 
if (isset($data['format']) &&$data['format']!=""){ 
return date($data['format'],$_result); 
}else{ 
return $_result; 
} 
} 
function get_mktime($mktime){ 
if ($mktime=="") return ""; 
$dtime = trim(ereg_replace("[ ]{1,}"," ",$mktime)); 
$ds = explode(" ",$dtime); 
$ymd = explode("-",$ds[0]); 
if (isset($ds[1]) &&$ds[1]!=""){ 
$hms = explode(":",$ds[1]); 
$mt = mktime(empty($hms[0])?0:$hms[0],!isset($hms[1])?0:$hms[1],!isset($hms[2])?0:$hms[2],!isset($ymd[1])?0:$ymd[1],!isset($ymd[2])?0:$ymd[2],!isset($ymd[0])?0:$ymd[0]);
 }else{ 
$mt = mktime(0,0,0,!isset($ymd[1])?0:$ymd[1],!isset($ymd[2])?0:$ymd[2],!isset($ymd[0])?0:$ymd[0]);
 } 
return $mt; 
} 
function Key2Url($key,$type) { 
return  base64_encode ($type .$key ) ; 
} 

?>