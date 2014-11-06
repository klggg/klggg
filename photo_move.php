<?php
/*
	2014/4/1 17:27 ggg 照片按拍照日期整理
	依赖 php_exif 扩展
	 win下可用
	   extension=php_exif.dll      ; Must be after mbstring as it depends on it
	打开

	用到了 pear的 log模块，可采用
	composer.bat install
	来安装
*/
date_default_timezone_set('PRC');
//require dirname(__FILE__).'/vendor/autoload.php';

$curr_dir_path = dirname(__FILE__); 
$config =  array(
	'fileExtension' => array(
		//图片的扩展名
		'pic' => array('jpg','png','gif','bmp'),
		//视频的扩展名
		'movies' => array('mov','3gp','mp4','avi')
	),
	'path'  => array(
		//所有新目录产生的根目录,* 注意修改成自己的路径
		'root' => $curr_dir_path.'/../../pic_new_month'
		)
);

$config['path']['pic'] = $config['path']['root'].'/pic';	//照片移到哪个目录
$config['path']['movies'] = $config['path']['root'].'/movies';	//视频移到哪个目录
$config['path']['unkown'] = $config['path']['root'].'/unkown';	//非照片文件移到哪个目录

//要处理的照片来源路径  * 需要针对自己的情况做下修改
//$photo_source_path = 'H:/kuaipan/ggg/pic_new_month/pic/1970-01';
//$photo_source_path = 'H:/kuaipan/ggg/pic_new_month/unkown';

//初始化log相关
$log_path = $config['path']['root'].'/log/';
if(!is_dir($log_path))
        mkdir($log_path, 0755, true); 
$log_file = $log_path.'/'.date('Y-m-d').'.log';

$log_category = 'PhotoMove';


$log =null;
$log_config = array('locking' => 1,'buffering' => true, 'lineFormat' =>'%1$s %2$s [%3$s] %8$s->%7$s  %6$s  %4$s');
if(!defined('PEAR_LOG_DEBUG'))
{
	define('PEAR_LOG_EMERG',    0);     /* System is unusable */
	define('PEAR_LOG_ALERT',    1);     /* Immediate action required */
	define('PEAR_LOG_CRIT',     2);     /* Critical conditions */
	define('PEAR_LOG_ERR',      3);     /* Error conditions */
	define('PEAR_LOG_WARNING',  4);     /* Warning conditions */
	define('PEAR_LOG_NOTICE',   5);     /* Normal but significant */
	define('PEAR_LOG_INFO',     6);     /* Informational */
	define('PEAR_LOG_DEBUG',    7);     /* Debug-level messages */

	$log = DefaultLog::singleton("file" 
			, $log_file,$log_category
			, $log_config
			,PEAR_LOG_DEBUG);
}
else
{
	$log = Log::singleton("file" 
			, $log_file,$log_category
			, $log_config
			,PEAR_LOG_DEBUG);
}


$PhotoMove_obj=  new PhotoMove($config,$log);
$PhotoMove_obj->run( 'D:/kuaipan/[MobileBackup]');
$PhotoMove_obj->run('D:/kuaipan/[Pictures]');
$PhotoMove_obj->run('D:/kuaipan/[Videos]');
//$PhotoMove_obj->run('D:/kuaipan/ggg/pic_new_month/unkown');


echo "done";

class PhotoMove {

	private $mRootPath= './tmp';

	private $logger= null;

	private $mConfig= Array();


	public function  __construct($config,$logger) {

		$this->mConfig = $config;
		$this->mRootPath = $config['path']['root'];

		foreach($config['path'] as $tmp_path)
		{
			if(!is_dir($tmp_path))
				mkdir($tmp_path, 0755, true); 
		}

		$this->logger = $logger;
	}

	/**
	 * 运行脚本入口
	 * @param string $srcPath 照片来源目录
	 *
	 */
	public function  run($srcPath) {

		$it = new RecursiveDirectoryIterator($srcPath);

		foreach (new RecursiveIteratorIterator($it, 2) as $file_path) {

			if ($file_path->isDir()) 
				continue;

			$file_path_name = $file_path->__toString();
			$this->logger->info('file_path_name: '.$file_path_name);
			$file_info =	pathinfo($file_path_name);
			if('thumbs.db' == strtolower($file_info['basename']))
				continue;

			if(!isset($file_info['extension']))
			{
				$this->logger->notice('no extension : '.$file_path_name);
				$file_info['extension'] = '';
			}
			$file_info['extension'] = strtolower($file_info['extension']);
			//找到图片
			if(in_array($file_info['extension'],$this->mConfig['fileExtension']['pic']))
			{
				$tmp_timestamp = $this->getDateTimeOriginal($file_path_name);

				//移到新目录
				$new_dir = $this->mConfig['path']['pic'].'/'.date('Y-m',$tmp_timestamp);
				if(!is_dir($new_dir))
					mkdir($new_dir, 0755, true); 
				$tmp_new_file_path = $new_dir.'/'.$file_info['basename'];

				$this->move($file_path_name,$tmp_new_file_path);

			}
			else if(in_array($file_info['extension'],$this->mConfig['fileExtension']['movies']))
			{
				$tmp_new_file_path = $this->mConfig['path']['movies'].'/'.$file_info['basename'];
				$this->move($file_path_name,$tmp_new_file_path);
			}
			else
			{
				//非图片文件处理
				$this->logger->notice('not image file : '.$file_path_name);
				$tmp_new_file_path = $this->mConfig['path']['unkown'].'/'.$file_info['basename'];
				$this->move($file_path_name, $tmp_new_file_path);
			}
		}

	}

	/**
	 * 取拍照日期
	 * @param string $filePathName 照片完整路径
	 * @param string $defaultDateTime 取不到拍照时间时的默认时间
	 * @return  int 返回时间戳
	 *
	 */
	public function  getDateTimeOriginal($filePathName,$defaultDateTime='1970:01:01 01:01:01') {

		$exif = exif_read_data($filePathName, 0, true);
		$date_time_original = $defaultDateTime;
		if(empty($exif['EXIF']) || empty($exif['EXIF']['DateTimeOriginal']))
		{
			$this->logger->warning("empty DateTimeOriginal");
		}
		else
			$date_time_original = $exif['EXIF']['DateTimeOriginal']; 	   //string(19) "2011:03:13 10:23:09"

		$this->logger->info('DateTimeOriginal: '.$date_time_original);

		$tmp_timestamp  = strtotime($date_time_original);
		return $tmp_timestamp;
	}

	/**
	 * 移动文件
	 * @param string $oldFilePath 原文件完整路径
	 * @param string $newFilePath 目标文件完整路径
	 * @return  bool
	 *
	 */
	public function  move($oldFilePath,$newFilePath) {

		//针对已存在的文件
		if(file_exists($newFilePath))
		{
			$this->logger->notice("file_exists ".$newFilePath);
			return false;
		}
		$result = false;
//		if($result == copy($oldFilePath, $newFilePath))
		if($result == rename($oldFilePath, $newFilePath))
			$this->logger->err("rename false, to  ".$newFilePath );
		else
			$this->logger->info('[ok] move  '.$oldFilePath.' to '.$newFilePath);

		return $result;


	}

}



class DefaultLog {
    var $_formatMap = array('%{timestamp}'  => '%1$s',
                            '%{ident}'      => '%2$s',
                            '%{priority}'   => '%3$s',
                            '%{message}'    => '%4$s',
                            '%{file}'       => '%5$s',
                            '%{line}'       => '%6$s',
                            '%{function}'   => '%7$s',
                            '%{class}'      => '%8$s',
                            '%\{'           => '%%{');

    var $_lineFormat = '%1$s %2$s [%3$s] %4$s';

    var $_timeFormat = '%b %d %H:%M:%S';

    var $_eol = "\n";
    var $_dirmode = 0755;


	private $_filename= './tmp';
    var $_backtrace_depth = 0;

	public function  __construct($name, $ident, $conf, $level='') {

        $this->_filename = $name;
        $this->_ident = $ident;

        if (!empty($conf['lineFormat'])) {
            $this->_lineFormat = str_replace(array_keys($this->_formatMap),
                                             array_values($this->_formatMap),
                                             $conf['lineFormat']);
        }
		
		if (!is_dir(dirname($this->_filename))) {
			mkdir(dirname($this->_filename, $this->_dirmode,true));
		}

	}
    public static function singleton($handler, $name = '', $ident = '',
                                     $conf = array(), $level = PEAR_LOG_DEBUG)
    {
        static $instances;
        if (!isset($instances)) $instances = array();

        $signature = serialize(array($handler, $name, $ident, $conf, $level));
        if (!isset($instances[$signature])) {
			 $instances[$signature] =  new self($name, $ident, $conf, $level);

        }

        return $instances[$signature];
    }

    function log($message, $priority = null)
    {


		/* Extract the string representation of the message. */
        $message = $this->_extractMessage($message);

        /* Build the string containing the complete log line. */
        $line = $this->_format($this->_lineFormat,
                               strftime($this->_timeFormat),
                               $priority, $message) . $this->_eol;

		error_log($line, 3,$this->_filename);
echo $line;
    }

    function emerg($message)
    {
        return $this->log($message, PEAR_LOG_EMERG);
    }

    function alert($message)
    {
        return $this->log($message, PEAR_LOG_ALERT);
    }

    function crit($message)
    {
        return $this->log($message, PEAR_LOG_CRIT);
    }

    function err($message)
    {
        return $this->log($message, PEAR_LOG_ERR);
    }

    function warning($message)
    {
        return $this->log($message, PEAR_LOG_WARNING);
    }

    function notice($message)
    {
        return $this->log($message, PEAR_LOG_NOTICE);
    }

    function info($message)
    {
        return $this->log($message, PEAR_LOG_INFO);
    }

    function debug($message)
    {
        return $this->log($message, PEAR_LOG_DEBUG);
    }



    function _extractMessage($message)
    {
        /*
         * If we've been given an object, attempt to extract the message using
         * a known method.  If we can't find such a method, default to the
         * "human-readable" version of the object.
         *
         * We also use the human-readable format for arrays.
         */
        if (is_object($message)) {
            if (method_exists($message, 'getmessage')) {
                $message = $message->getMessage();
            } else if (method_exists($message, 'tostring')) {
                $message = $message->toString();
            } else if (method_exists($message, '__tostring')) {
                $message = (string)$message;
            } else {
                $message = var_export($message, true);
            }
        } else if (is_array($message)) {
            if (isset($message['message'])) {
                if (is_scalar($message['message'])) {
                    $message = $message['message'];
                } else {
                    $message = var_export($message['message'], true);
                }
            } else {
                $message = var_export($message, true);
            }
        } else if (is_bool($message) || $message === NULL) {
            $message = var_export($message, true);
        }

        /* Otherwise, we assume the message is a string. */
        return $message;
    }


    function _format($format, $timestamp, $priority, $message)
    {
        /*
         * If the format string references any of the backtrace-driven
         * variables (%5 %6,%7,%8), generate the backtrace and fetch them.
         */
        if (preg_match('/%[5678]/', $format)) {
            /* Plus 2 to account for our internal function calls. */
            $d = $this->_backtrace_depth + 2;
            list($file, $line, $func, $class) = $this->_getBacktraceVars($d);
        }

        /*
         * Build the formatted string.  We use the sprintf() function's
         * "argument swapping" capability to dynamically select and position
         * the variables which will ultimately appear in the log string.
         */
        return sprintf($format,
                       $timestamp,
                       $this->_ident,
                       $this->priorityToString($priority),
                       $message,
                       isset($file) ? $file : '',
                       isset($line) ? $line : '',
                       isset($func) ? $func : '',
                       isset($class) ? $class : '');
    }

    function priorityToString($priority)
    {
        $levels = array(
            PEAR_LOG_EMERG   => 'emergency',
            PEAR_LOG_ALERT   => 'alert',
            PEAR_LOG_CRIT    => 'critical',
            PEAR_LOG_ERR     => 'error',
            PEAR_LOG_WARNING => 'warning',
            PEAR_LOG_NOTICE  => 'notice',
            PEAR_LOG_INFO    => 'info',
            PEAR_LOG_DEBUG   => 'debug'
        );

        return $levels[$priority];
    }

    function _getBacktraceVars($depth)
    {
        /* Start by generating a backtrace from the current call (here). */
        $bt = debug_backtrace();

        /* Store some handy shortcuts to our previous frames. */
        $bt0 = isset($bt[$depth]) ? $bt[$depth] : null;
        $bt1 = isset($bt[$depth + 1]) ? $bt[$depth + 1] : null;

        /*
         * If we were ultimately invoked by the composite handler, we need to
         * increase our depth one additional level to compensate.
         */
        $class = isset($bt1['class']) ? $bt1['class'] : null;
        if ($class !== null && strcasecmp($class, 'Log_composite') == 0) {
            $depth++;
            $bt0 = isset($bt[$depth]) ? $bt[$depth] : null;
            $bt1 = isset($bt[$depth + 1]) ? $bt[$depth + 1] : null;
            $class = isset($bt1['class']) ? $bt1['class'] : null;
        }

        /*
         * We're interested in the frame which invoked the log() function, so
         * we need to walk back some number of frames into the backtrace.  The
         * $depth parameter tells us where to start looking.   We go one step
         * further back to find the name of the encapsulating function from
         * which log() was called.
         */
        $file = isset($bt0) ? $bt0['file'] : null;
        $line = isset($bt0) ? $bt0['line'] : 0;
        $func = isset($bt1) ? $bt1['function'] : null;

        /*
         * However, if log() was called from one of our "shortcut" functions,
         * we're going to need to go back an additional step.
         */
        if (in_array($func, array('emerg', 'alert', 'crit', 'err', 'warning',
                                  'notice', 'info', 'debug'))) {
            $bt2 = isset($bt[$depth + 2]) ? $bt[$depth + 2] : null;

            $file = is_array($bt1) ? $bt1['file'] : null;
            $line = is_array($bt1) ? $bt1['line'] : 0;
            $func = is_array($bt2) ? $bt2['function'] : null;
            $class = isset($bt2['class']) ? $bt2['class'] : null;
        }

        /*
         * If we couldn't extract a function name (perhaps because we were
         * executed from the "main" context), provide a default value.
         */
        if ($func === null) {
            $func = '(none)';
        }

        /* Return a 4-tuple containing (file, line, function, class). */
        return array($file, $line, $func, $class);
    }
	
}
