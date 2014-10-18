<?php
/**
 * 2011-7-15 18:05 ggg
 * 用于常用助手类
 */
class CommonHelper
{
    static private $_instance=null;
    static public $errorMsg=null;


    /**
     * 获得唯一实例
     *
     * @param string $key
     * @return obj
     */
    static public function getInstance()
    {
        if(self::$_instance === null)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //转换编码
    static public function gbk2utf8($str)
    {
        // return iconv("gbk", "utf-8//IGNORE", $str);
        return mb_convert_encoding($str,"utf-8","gbk");
    }

    //转换编码
    static public function utf82gbk($str)
    {
        // return iconv("utf-8", "gbk//IGNORE", $str);
        return mb_convert_encoding($str,"gbk","utf-8");
    }


    /*
     * 得到指定环境下的配置db配置内容
     *
     * @param stirng  $evn G_CODE_ENV
     * @param stirng  $dbStr 如 statdb gameaddb之类
     * @return  Array
     *
     */
    static public function getDbConfig($evn,$dbStr)
    {
        $tmp_config = self::getEvnConfig($evn);
        $tmp_db =$tmp_config['components'][$dbStr];
        $tmp_dns    = self::parseDsn($tmp_db['connectionString']);
        $tmp_db['host'] =$tmp_dns['host'];
        $tmp_db['dbname'] =$tmp_dns['dbname'];
        return $tmp_db;
    }
    
    /*
     * 得到指定环境下的配置内容
     *
     * @param stirng  $evn G_CODE_ENV
     * @return  Array
     *
     */
    static public function getEvnConfig($evn)
    {
        $tmp_config = Array();
        //环境判定
        switch($evn)
        {
            case "LOCAL" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_local.php');
                break;
            case "DEV" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_dev.php');
                break;
            case "TEST" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_test.php');
                break;
            case "PRE" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_pre.php');
                break;                
            case "RELEASE" :
                $tmp_config=require(G_COMMON_CONFIG_PATH.'/main_release.php');
                break;

        }

        return $tmp_config; 

    }

    /*
     * 解释 mysql:host=10.241.12.120;dbname=oa_newchannel 返回 数组
     *
     * @param stirng  $dsnStr
     * @return  Array
     *
     */
    static public function parseDsn($dsnStr)
    {
        //$url='mysql:host=10.241.12.120;dbname=oa_newchannel';
        $url    =  $dsnStr;
        $tmp_dsn    = parse_url($url);

        $tmp_array   = explode(';',$tmp_dsn['path']);
        foreach($tmp_array as $tmp_recode)
        {
            $tmp_exp    = explode('=',$tmp_recode);
            $tmp_dsn[$tmp_exp[0]] = $tmp_exp[1];
        }
        return $tmp_dsn;
    }


    
    /**
     * 图片更新是,不被CDN cache 
     */
    public static function getCdnVersion()
    {
        return '2013012401';
    }

        //下载文件
    public static function down($content,$filename)
    {
        $len = strlen($content);
        @ob_end_clean();


        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=".$filename." ");
        header("Content-Transfer-Encoding: binary ");
        header('Content-Length: '.$len);
        echo  $content;
    }

  
    
    /**
     * 把csv格式的字符窜转为二维数组　　　
     *  aaa1    bbb1    ccc1
     *  aaa2    bbb2    ccc2
     *  转为  Array(
     *      Array("aaa1",“bbb1"
     *  )
     * Enter description here ...
     * @param string $str  需要转换的字符窜　　，一
     * @param string $rowKeys  一行里的数组每个字段映射的key值 Array('gameid'=>123,....) 注意要和列数保持一致
     * @param string $rowSplit  一行一条记录的隔符，默认以回车结尾
     * @param string $colSplit  一行里的字段分隔符　默认用逗号分隔
     */
    public function csv2Array($str,$rowKeys=null,$rowSplit="\n",$colSplit=","){
    /* 
         $str   = <<<EOF
    gameid  game_area_id    sdid    game_member_name    game_team_name  cleartime
    1   1   8024    ggg team    time
    1   2   8024    kl  team    time    
    EOF;
    
        
       $rowKeys    = Array('gameid','game_area_id','sdid','game_member_name','game_team_name','cleartime');
        $colSplit    = "\t";
     */
        $insert_array   = array();
        $str = trim($str);
        $tmp_array1 = explode($rowSplit,$str);
    //     var_dump($str);

        if(count($tmp_array1) < 1)
        {
            // $this->_errorMsg ="empty file ";
            return false;
        }


        
        $tmp_count  = 0;
        foreach ($tmp_array1 as $recode){
    
            $tmp_recode = trim($recode);
    
            $tmp_count++;

    
            if(empty($tmp_recode))
                continue;

            $tmp_array2 = explode($colSplit,$tmp_recode);
    
            $tmp_array3 = Array();

            if( !empty ($rowKeys) && (count($tmp_array2) != count($rowKeys)) ){
                return false;
            }
 
            foreach($tmp_array2 as $tmp_key => $tmp_val)
            {
                if(!empty($rowKeys))
                {
                    $tmp_array3[$rowKeys[$tmp_key]]    = $tmp_val;
                }
                else
                    $tmp_array3[]    = $tmp_val;
            }

//            if(!empty($addRows)){
//                $tmp_array3 = $tmp_array3 + $addRows;
//            }

   
            //以游戏、区、帐号为key
            //$insert_array[$tmp_array3['gameid'].$tmp_array3['game_area_id'].$tmp_array3['sdid']]  = $tmp_array3;
            $insert_array[] = $tmp_array3;
    
            //list($k,$v)   = explode("\t",$recode);
            //$a[$k]=$v;
        }
    
        //      print_r($insert_array);
    
        return $insert_array;
    
    }
   
   
        
        /*
         * signature  签名算法
         * $params  签名数组
         * $secret  签名secretKey
         * $secret  不同参数之间分隔符
         */
        static public function generateSign($params, $secret,$separator='')
        {
            $str_array = array();
            ksort($params);
            foreach ($params as $k => $v) {
                    $str_array[] = "{$k}={$v}";
            }

            $str = implode($separator, $str_array) . $secret;
            return md5($str);
        }



    static public function isdate($str,$format="Y-m-d"){  
        
        $strArr = explode("-",$str);  
        if(empty($strArr)){
            return false;
        }  
        
        foreach($strArr as $val){
            
            if(strlen($val)<2){
                $val="0".$val;}$newArr[]=$val;
            }  
        
            $str =implode("-",$newArr);   
            $unixTime=strtotime($str);   
            $checkDate= date($format,$unixTime);   
            
            if($checkDate==$str)   
                return true;   
            else   
                return false;
    }

    /**
     * 返回当前页面的URL
     */
    public static function getCurrRequestUrl()
    {
        $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        return $url;
    }

    
    
    
    //截取utf8字符串
    public static function utf8Substr($str, $from, $len)
    {
        return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                           '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                           '$1',$str);
    }



    /*
         http://txz.sdo.com/plugin/?pn=ma-1.2.0-zs067-0627-3.apk&m=UF1ZQU63vKurkpM=&key=100000005
         解密 m手机号码加密窜
         print_r(decodeMobile('UF1ZQU63vKurkpM'));
         15673379224
    */
    public static function decodeMobile ($strEncode) {

        $strEncode = base64_decode($strEncode);
        $strLen = strlen($strEncode);
        if ( $strLen <= 0 || $strLen >= 256)
            return false;

        $cCRB = 'a';
        $dst    = '';
        for ($i = 0; $i < $strLen; $i++)
        {
            $dst.= $strEncode[$i] ^ $cCRB;
            $cCRB = chr(ord($cCRB) + 7);
        }

        $strEncode = $dst;
        return $strEncode;

    }

    /*
        by ggg
         加密 手机号码
         print_r(encodeMobile('15673379224'));
         UF1ZQU63vKurkpM=
    */
    public static function encodeMobile ($mobile) {

        $strLen = strlen($mobile);
        if ( $strLen <= 0 || $strLen >= 256)
            return false;

        $cCRB = 'a';
        $dst    = '';
        for ($i = 0; $i < $strLen; $i++)
        {
            $dst.= $mobile[$i] ^ $cCRB;
            $cCRB = chr(ord($cCRB) + 7);
        }

        $strEncode = $dst;
        return base64_encode($strEncode);

    }

    /*
        取文件名 如  aaa.txt 返回  aaa
        注意如果是  aaa.bbb.txt ，返回是 aaa.bbb
    */
    public static function subStrHead($fileName,$needle='.')//返回文件的名字
    {
        //从后往前找
        $currPos=strrpos($fileName, $needle);
        if(!$currPos)
            $currPos=strlen($fileName);
        return(substr($fileName,0,$currPos));//得到上传文件名字
    }

    /*
        取文件名扩展名 如  aaa.txt 返回  txt
        注意如果是  aaa.bbb.txt ，返回的也是 txt
    */
    public static function subStrEnd($fileName,$needle ='.')//返回文件的扩展名
    {
        $fileExt='';
        if($currPos=strrpos($fileName, $needle))                //如果文件没有扩展名,文件名即为全文件,扩展名空
        {
            //文件名长度 - 找到的位置 - 间隔符长度
            $fileExt=substr($fileName,-(strlen($fileName) - $currPos - strlen($needle) ));
        }
        return($fileExt);                                 //返回扩展名
    }

   

    //返回 hps 格式的结果 json格式
    public static function getApiResult($resultCode,$resultMsg,$data) {

        $result = array();
        $result['resultCode'] = $resultCode;
        $result['resultMsg'] = $resultMsg;
        $result['data'] = $data;

        return json_encode($result);
    }


    /**
     * 得到访问者的平台号
     * @return string
     */
    public static function getOsType()
    {
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);  
        $is_pc = (strpos($agent, 'windows nt')) ? true : false;  
        $is_iphone = (strpos($agent, 'iphone')) ? true : false;  
        $is_ipad = (strpos($agent, 'ipad')) ? true : false;  
        $is_android = (strpos($agent, 'android')) ? true : false;  
      
        if($is_pc){  
            echo "这是PC(电脑)";  
        }  
        if($is_iphone){  
            echo "这是iPhone";  
        }  
        if($is_ipad){  
            echo "这是iPad";  
        }  
        if($is_android){  
            echo "这是Android";  
        }  

    }

    public static function getTcpServer($key = 'memcache_sess') {

        $sessionServer = Yii::app()->params[$key];

        $session = array();
        foreach ($sessionServer as $value) {
            $session[] = 'tcp://' . $value['ip'] . ':' . $value['port'];
        }
        return join(';', $session);
    }
    
    

    /**
     * 生成一个随机字符串
     * @param  integer $len 字符串长度
     * @return string
     */
    public static function getRandomString($len = 10) {
        $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
            'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
            'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
            'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
            'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2',
            '3', '4', '5', '6', '7', '8', '9',
        );
        $charsLen = count($chars) - 1;
        shuffle($chars);

        $output = "";
        for ($i=0; $i<$len; $i++)
        {
            $output .= $chars[mt_rand(0, $charsLen)];
        }

        return $output;
    }


    /**
     * 获取服务器ip
     * @return string
     */
    static public function getServerIp(){

        if(!empty($_SERVER["SERVER_ADDR"]))
        {
            return $_SERVER["SERVER_ADDR"];
        }
         // cli方式下获取服务器ip
        $ss = exec('/sbin/ifconfig eth0 | sed -n \'s/^ *.*addr:\\([0-9.]\\{7,\\}\\) .*$/\\1/p\'',$arr);   
        $ret = $arr[0];
        return $ret;
    }




    /**
     * json转array
     * @param  [type] $jsonStr [json格式]
     * @return [type]      [array数组]
     */
    function json_to_array($jsonStr){
        $arr=array();
        foreach($jsonStr as $k=>$w){
            if(is_object($w)) $arr[$k]=json_to_array($w);  //判断类型是不是object
            else $arr[$k]=$w;
        }
        return $arr;
    }


    /**
     * 检查变量是否包含中文
     * @param  [type] $str [description]
     * @return [boolean]      [description]
     */
    function checkGB($str){
        if (preg_match("/[\x7f-\xff]/", $str)) { 
            return true ;
        }else{ 
            return false;
        } 
    }
    //解析 key 没有被双引号引起来的Json 数据。
    public static function exJsonDecode($s, $mode=false) {
      if(preg_match('/\w:/', $s))
        $s = preg_replace('/(\w+):/is', '"$1":', $s);
      return json_decode($s, $mode);
    } 


}
