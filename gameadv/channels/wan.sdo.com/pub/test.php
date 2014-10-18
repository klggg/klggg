<?php

    $rh = fopen('E:\ka.csv', 'r');
    $wh = fopen('E:\ka.json', 'wb');
    
 	while(!feof($rh)){
 		$_s = fread($rh, 1024);
 		$_js = UtilHelper::csv2Array($_s);
 		if (fwrite($wh, $_js) === FALSE) {
          return true;
      	} 
 	}
 	fclose($rh);
    fclose($wh);
 	