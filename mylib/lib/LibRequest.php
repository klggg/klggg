<?php
/**
 * LibRequest Method
 * 
 * @package util
 * @author ggg
 *
 */
class LibRequest
{
    /**
     * 获取URL 内容
     * 正常返回内容，出错返回错误信息
     * 
     * @param string $url	//url
     * @param array $options 
     * @param string $message 出错信息
     * @return mix $content
     */
    public static function getContent ($url, $options=array(), &$message  )
    {

        $header = array(
/*
"Accept:text/html,application/xhtml+xml,application/xml;",
"Accept-Charset:GBK,utf-8;",
"Accept-Encoding:gzip,deflate,sdch",
"Accept-Language:zh-CN,zh;",
*/

			"MIME-Version: 1.0",
			"Content-type: text/html;",
            //"Content-type: text/html; charset=" . $charset,
			"Content-transfer-encoding: text"
		);
        //  array("Host: {$url_info['host']}");   //绑定域名到此ip地址上


        $defaults = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_USERAGENT => 'MISE 6.0',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => FALSE, //https
        );

        $options = $options + $defaults;

        if(defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')){
            $options[CURLOPT_IPRESOLVE] = CURL_IPRESOLVE_V4; 
        }


        $content = self::curl($options, $message);
        
        return $content;

    }

	/**
	 * 
	 */
	static public function postContent($url, array $post = NULL, array $options = array())
	{
		$defaults = array(
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_URL => $url,
			CURLOPT_FRESH_CONNECT => 1,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_FORBID_REUSE => 1,
			CURLOPT_TIMEOUT => 4,
			CURLOPT_POSTFIELDS => http_build_query($post)
		);


        $options = $options + $defaults;
        
        if(defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')){ 
            $options[CURLOPT_IPRESOLVE] = CURL_IPRESOLVE_V4;
        }
        $message = '';
        $result = self::curl($options,$message,array(200,302));

        return $result;


/*
	//print_r($defaults);
		$ch = curl_init();
		curl_setopt_array($ch, ($options + $defaults));
		
		if(defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')){ 
			curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); 
		}
	//    if( ! $result = curl_exec($ch))
	//    {
	//        trigger_error(curl_error($ch));
	//    }
		$result = curl_exec($ch);
		//if (! $result = curl_exec($ch) || curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
		if (!$result || curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
				$message = curl_getinfo($ch);
                $errMsg   = "curl ERROR url {$url} message:".json_encode($message);
				Log::write(__METHOD__,$errMsg);

                //yii::log($errMsg,CLogger::LEVEL_ERROR,__METHOD__);
				curl_close($ch);
				return FALSE;
			}
		curl_close($ch);
		return $result;
        */
	}

    /**
     * curl 的基础封装
     * @param  array $options 项目
     * @param  string $message 错误引用变量
     * @return bool|string  成功返回内容   
     * @return array rightHttpCodes 认为正常的http码
     */
    public static function curl($options,&$message,$rightHttpCodes=null)
    {

        if(empty($rightHttpCodes))
            $rightHttpCodes = Array(200);
       $ch = curl_init();
        if(false == $ch)
        {
            $message = 'curl_init error';
            return false;
        }

        curl_setopt_array ($ch, $options);

        $content = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // var_dump($status_code);
        // print_r($options);

        if( !in_array($status_code, $rightHttpCodes))
        {
            $message = curl_getinfo($ch);
            //var_dump(curl_getinfo($ch, CURLINFO_HTTP_CODE));
            $errMsg   = "curl ERROR  message:".json_encode($message);
            yii::log($errMsg,CLogger::LEVEL_ERROR,__METHOD__);
            //Log::write(__METHOD__,$errMsg);

            curl_close($ch);
            return false;
        }
        curl_close($ch);
        return $content;
    }


    /**
     * 获取xml内容
     *
     * @param string $url
     * @param string $message 
     * @param string $protocol
     * @return SimpleXMLElement
     */
    public static function getXML ($url, &$message, $protocol = 'http', $timeout = 10)
    {
        $content = self::getContent($url, $message, $protocol, $timeout);
//         var_dump($content,$message);
        if ($content === FALSE) {
        	$message = $url . ' error:'.$message;
        	 
            return FALSE;
        }
        $xml = @simplexml_load_string(trim($content));
        if (! ($xml instanceof SimpleXMLElement)) {
            $message = $url . '<br />xml 结构错误';
            return FALSE;
        }
        return $xml;
    }


    //.使用curl绑定host方式请求网址
    public static function urlCheckByHost($url,$ip, &$message){

    //    $host_ip = '127.0.0.1';    //ip地址
         $host_ip = $ip;    //ip地址
         $url_info = parse_url($url);
         $url = str_replace($url_info['host'], $host_ip, $url);   // 将域名替换成ip地址，指定到此ip地址下运行

         $options = array(
            CURLOPT_HTTPHEADER => array("Host: {$url_info['host']}")  //绑定域名到此ip地址上
         );

         $result = Request::urlCheck ($url, $message, $options,array(200,302));
         return $result;
    }

    /**
     * 检测ＵＲＬ状态，如果非２００返回错误，并设置message
     * @param string $url   //url
     * @param string $message 出错信息
     * @return boolen          
     */
    public static function urlCheck($url,&$message,$options=array(),$rightHttpCodes=null)
    {

        
        $header = array(
            "MIME-Version: 1.0",
            "Content-type: text/html; charset=" . $charset,
            "Content-transfer-encoding: text"
        );

        $default_options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false, //获取http头信息
            CURLOPT_NOBODY => true, //不返回html的body信息
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,

            CURLOPT_HTTPHEADER => $header,
            CURLOPT_USERAGENT => 'MISE 6.0',
            CURLOPT_RETURNTRANSFER => 1,

        );

        if(0 ===strpos($url, 'https://')){
              $default_options[CURLOPT_SSL_VERIFYPEER] = FALSE; 
        }


        //合并参数
        foreach ($default_options as $key => $value) {
            //CURLOPT_HTTPHEADER => array('xxx')
            if(is_array($options[$key]) && is_array($value) )
            {   
                $options[$key] = array_merge($options[$key],$value);
            }   
            else
                $options[$key] = $value;

        }   


  
        $content = self::curl($options, $message,$rightHttpCodes);
        if(false === $content)
            return false;
        return true;

    }


}