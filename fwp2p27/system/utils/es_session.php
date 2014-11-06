<?php
// +----------------------------------------------------------------------
// | Fanwe 方维p2p借贷系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(88522820@qq.com)
// +----------------------------------------------------------------------

//引入数据库的系统配置及定义配置函数
require_once APP_ROOT_PATH."system/utils/es_cookie.php";
if(!function_exists("app_conf"))
{
	$sys_config = require APP_ROOT_PATH.'system/config.php';
	function app_conf($name)
	{
		return stripslashes($GLOBALS['sys_config'][$name]);
	}
}

class es_session 
{	
	static function id()
	{		
		return session_id();
	}
	static function start()
	{
		session_set_cookie_params(0,app_conf("COOKIE_PATH"),app_conf("DOMAIN_ROOT"));
<<<<<<< HEAD
<<<<<<< HEAD
		session_start();
=======
		@session_start();
>>>>>>> 88ff99af4a79ee6d3241fb6bc3a913083a079c5c
=======
		session_start();
>>>>>>> 7c9cd3801a626936bd1d6a85029b42aa3747ec4f
	}
	
    // 判断session是否存在
    static function is_set($name) {    	
        return isset($_SESSION[app_conf("AUTH_KEY").$name]);
    }

    // 获取某个session值
    static function get($name) {

        $value   = $_SESSION[app_conf("AUTH_KEY").$name];
        return $value;
    }

    // 设置某个session值
    static function set($name,$value) {   

        $_SESSION[app_conf("AUTH_KEY").$name]  =   $value;
    }

    // 删除某个session值
    static function delete($name) {

        unset($_SESSION[app_conf("AUTH_KEY").$name]);
    }

    // 清空session
    static function clear() {

        session_destroy();
    }
    
    //关闭session的读写
    static function close()
    {

<<<<<<< HEAD
<<<<<<< HEAD
    	session_write_close();
=======
    	@session_write_close();
>>>>>>> 88ff99af4a79ee6d3241fb6bc3a913083a079c5c
=======
    	session_write_close();
>>>>>>> 7c9cd3801a626936bd1d6a85029b42aa3747ec4f
    }
    
    static function  is_expired()
    {

        if (isset($_SESSION[app_conf("AUTH_KEY")."expire"]) && $_SESSION[app_conf("AUTH_KEY")."expire"] < get_gmtime()) {
            return true;
        } else {        	
        	$_SESSION[app_conf("AUTH_KEY")."expire"] = get_gmtime()+(intval(app_conf("EXPIRED_TIME"))*60);
            return false;
        }
    }
}
?>