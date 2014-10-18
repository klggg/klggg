<?php
include_once('nusoap/lib/nusoap.php');
	$client = new soapclient('http://117.79.237.3:8060/webservice.asmx?wsdl',true); 
		$client->soap_defencoding = 'GB2312';
		$client->decode_utf8 = false; 
		$argv = array("sn","pwd","mobile","content","ext","rrid","stime");
		$argv['sn'] = "SDK-WSS-010-04890";
		$argv['pwd'] = strtoupper(md5('SDK-WSS-010-04890'.'794d-396'));
		$argv['mobile'] = '15162755432';
		$argv['content'] = '您的验证码为1111';
		$argv['ext'] = '';
		$argv['rrid'] = '';
		$argv['stime'] = '';
		$str=$client->call('mt',array('parameters' =>$argv), '', '', false, true,'document','encoded');
		if (!$err=$client->getError()) {
    	echo " 成功发送 :";
    	print_r($str);
	} else { 
    	echo " 错误 :",$err;
	}
?>
