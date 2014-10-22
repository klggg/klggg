<?php 

//放沉迷
$url = 'http://login.sdo.com/sdo/Login/LoginSDO.php?appArea=0&appId=210&areaId=0&service=http%3A%2F%2Fpwd.sdo.com%2FPTInfo%2FPTInfo%2FFillAdultInfo.aspx&type=sso';
header('Location: ' . $url);
exit();

