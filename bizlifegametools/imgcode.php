<?php
/* 
 * 验证码破解
 * 2009-11-1 15:59  ggg
 * 
 * 背景颜色为白色不变
 * 每张验证码的大小 50 * 19 
 * 每个数字的大小 8 * 10 
 * 平均每个数字占 50 / 4 =  13像素 左右
 *
 *
 *
 *  实现思路
 *  1. 生成标准模板图片 用于对比
 *   		取到每张图片的标准模板 0-9数字保存在 8 * 10 的二维数组 A[]
 *			
 *  2. 对每块验证码进行去干扰
 *		 按4块,按13 13 13 11像素进行切割 颜色值保存在四个二维数组 B[]
 *		 统计每个数组中分别颜色值出次数最多的值,把其设置成1,其他的均为0,存成另四个二维数组 C[] 这样相当于把图片进行黑白化,去杂点
 * 
 *  4. 找到每个数字的边界
 *  		要反复扫描比对,如果验证码不是按等宽分布,
 *  		从左到右用一条竖直的线扫描，扫描线经过的颜色性连续区域(2个像素)就是字符开始区域,从该点开始向右取足8个像素，在A[]数组
 *  		按行比较,看在哪行出现(90%相似),如果没有,从原来位置再往下寻找
 *  		 
 *  		同理从上到下用一条横直的线扫描 得到顶部开始区域 +10个像素后即为结束区域
 *     得到8*10区域保存到四个二维数组 D[]  
 *
 *  5. 拿数组 D[]和10个模板数组一一对比,找出最相似的,如果找不到,说明该块在第一步切割时被切去一半,把该块所在的区域重新向左向右调整,重复以上步聚.
 *  		重复N边依旧找不到重新换张图片
 *
 *        有效性检测 
 *				取出来的小方块发现和某个模板数字相似度>95 即算为找到，否则从x->x+5 到 y->y+9 依次取，然后按相似度排序
 * */
//	http://blog.csdn.net/binger819623/archive/2009/05/28/4221615.aspx

/*
$result1	= str_split('001001');
$result2	= str_split('000000010100001');

print_r(array_intersect_assoc($result1,$result2));
 */


//检测数字出现的边界
function biz_check_borderline($color_array,$start_x,$start_y,$max_width,$back_color) {

	//数字图片大小
	$img_width	 = 8;
	$img_height	 = 10;

	//以一条竖线从左到右找出连续出线的点
	$start_x	 = biz_findContinuousPixelX($color_array,$start_x,$start_y,$max_width,$back_color);
	$start_y	 = biz_findContinuousPixelY($color_array,$start_x,$start_y,$max_width,$back_color);
	$color_array	= biz_arrayCopy($color_array,$start_x,$start_y,$img_width, $img_height);
	$max_color_count_array	= biz_maxcount_color($color_array,$back_color);

	$max_color	 = key($max_color_count_array);
	$max_color_count	 = $max_color_count_array[$max_color];

//var_dump($max_color_count_array);
	//出现最多的颜色值小于这个数字,肯定不对了
	if($max_color_count < 19)
	{
		return false;
	}
		return true;

}





//---------------------------------------------- 


class biz_imgcode{

	//图片地址
	private $_url = null;

	//图片下载后保存目录
	private $_savePath	= null;

	//图片长宽等信息
	private $_imgInfoArray	= array();

	//
	public function __construct()
	{
		$this->_savePath	= './photo/';
		$this->_logPath	= './logs/';
	}


	//复制图像得指定部份
	//返回图片句柄
	public function imageCopy($imgObj,$src_x,$src_y,$img_width, $img_height)
	{
		$truecolor = imagecreatetruecolor($img_width, $img_height);
		if(imagecopy($truecolor, $imgObj, 0, 0, $src_x, $src_y, $img_width, $img_height))
			return $truecolor;
		else
			return false;
	}

	//根据二维数组颜色值 画一张照片
	//返回图片句柄
	public function creatImgFromArray($color_array)
	{

		//把最多的颜色值设成1 其余设成0
		$img_width	= count($color_array[0]);
		$img_height	= count($color_array);

		$img_obj	= imagecreate($img_width,$img_height);

//print_r($color_array);

//		$img_obj	= $this->imageCopy($img_obj,0,0,$img_width,$img_height);

		$colorsforindex	= array();
		for($x=0; $x<$img_width;$x++ )
		{

			for($y=0; $y<$img_height;$y++ )
			{

				if($color_array[$y][$x]	 == 1)
					imagesetpixel($img_obj,$x,$y,imagecolorallocate($img_obj, 0, 0, 0));
				else if($color_array[$y][$x]	 == 0)
					imagesetpixel($img_obj,$x,$y,imagecolorallocate($img_obj, 255, 255, 255));
				else
				{

$colorsforindex['red'] = intval(substr($color_array[$y][$x],0,3));
$colorsforindex['green'] = intval(substr($color_array[$y][$x],3,3));
$colorsforindex['blue'] = intval(substr($color_array[$y][$x],6,3));
imagesetpixel($img_obj,$x,$y,imagecolorallocate($img_obj, $colorsforindex['red'], $colorsforindex['green'], $colorsforindex['blue']));
//imagesetpixel($img_obj,$x,$y,imagecolorallocate($img_obj,255,255, 255));

				}
			}
		}

		return $img_obj;
	}



	//比较两个二维数组的交集
	public function arrayIntersect($array1,$array2)
	{
		$same_count	= 0;
		foreach($array1 as $i => $result1)
		{
			$result2	= $array2[$i];
			$same_count+=count(array_intersect_assoc($result1,$result2));
		}

//		$result1	= str_split($v);
//		$result2	= str_split($arrar2[$i]);
//		print_r(array_intersect_assoc($array1,$array2));
//		return count(array_intersect_assoc($array1,$array2));
		return $same_count;
	}



	//得到图片每个像素的颜色值,返回颜色值二组数组
	public function getImgIndexColor($imgObj)
	{
		$img_width	 = imagesx($imgObj);
		$img_height	 = imagesy($imgObj);

		$color_array	= array();


		for($y=0; $y<$img_height; $y++)
		{
			for($x=0; $x<$img_width; $x++)
			{
				//得到颜色值
				$color_tran	= imagecolorsforindex($imgObj,ImageColorAt($imgObj,$x,$y));

				$color_array[$y][$x]	 = sprintf("%03d",$color_tran['red']).sprintf("%03d",$color_tran['green']).sprintf("%03d",$color_tran['blue']);

//echo sprintf("%s ",$color_array[$y][$x]	);
			}
//echo "\n";
		}
		return $color_array;
	}

	//得到图片的宽高等属性
	public function getImgSize()
	{
		if(empty($this->_imgInfoArray['width']))
		{
			$file_path_url	 = $this->getUrl();
			$tmp_array	 = getimagesize($file_path_url); 
			if(empty($tmp_array[0]))	$tmp_array[0]	= 0;
			if(empty($tmp_array[1]))	$tmp_array[1]	= 0;
			if(empty($tmp_array[2]))	$tmp_array[2]	= 0;
			$this->_imgInfoArray['width']	= $tmp_array[0];
			$this->_imgInfoArray['height']	= $tmp_array[1];
			$this->_imgInfoArray['type']	= $tmp_array[2];
			$this->_imgInfoArray['mime']	= $tmp_array['mime'];
			
		}
		return $this->_imgInfoArray;
	}

	//根据原始图像 新建一张同等类型 返回图像操作句柄
	public function imageCreate()
	{
		$o_im	= null;
		$ermsg	= '';

		$file_path_url	 = $this->getUrl();

		$img_array	= $this->getImgSize($file_path_url); 
		$img_width	 = $img_array['width'];
		$img_height	 = $img_array['height'];

		//根据不同的图片类型创建图片

		switch($img_array['mime'])
		{
			case 'image/gif':
				if (imagetypes() & IMG_GIF)  { // not the same as IMAGETYPE
					$o_im = imageCreateFromGIF($file_path_url) ;
				} else {
					$ermsg = 'GIF images are not supported<br />';
				}
				break;
			case 'image/jpeg':
				if (imagetypes() & IMG_JPG)  {
					$o_im = @imageCreateFromJPEG($file_path_url) ;
				} else {
					$ermsg = 'JPEG images are not supported<br />';
				}
				break;
			case 'image/png':
				if (imagetypes() & IMG_PNG)  {
					$o_im = imageCreateFromPNG($file_path_url) ;
				} else {
					$ermsg = 'PNG images are not supported<br />';
				}
				break;
			case 'image/bmp':
					$o_im = imagecreatefrombmp($file_path_url) ;
				break;
			case 'image/wbmp':
				if (imagetypes() & IMG_WBMP)  {
					$o_im = imageCreateFromWBMP($file_path_url) ;
				} else {
					$ermsg = 'WBMP images are not supported<br />';
				}
				break;

			default:
				$ermsg = $image_info['mime'].' images are not supported<br />';
				$o_im	= false;
				break;

		}
		return $o_im;
	}


	//下载图片到本地
	public function down($url,$save_file)
	{
		//如果文件已存在就不下载
//		if(!file_exists($save_file))
//		{
			$fp = fopen ($save_file, "wb");
			$ch = curl_init ($url);
			curl_setopt ($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
			curl_setopt ($ch, CURLOPT_HEADER, false);	//设定是否输出页面内容
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$ret	= curl_exec($ch); // execute the curl command

			curl_close ($ch);
			fclose($fp);
//		}
//		else
//		{
//			$ret	= true;
//		}

		//下载的文件是空
//		if($this->getFileSize() < 1)
//		{
//			$this->unlinkPhoto();
//			$ret	= false;
//		}
		//下载失败 进行日志记录 方便以后重新下载
		if(!$ret)
		{
		}

		return $ret;
	}


	//设置图片保存地址
	public function setSavePath($path)
	{
		$this->_savePath	= $path;
	}

	//设置当前操作的图片
	public function setUrl($url)
	{
		$this->_url = $url;
		//重置图片大小信息
		$this->_imgInfoArray	= array();
	}
	//得到当前操作的图片
	public function getUrl()
	{
		return $this->_url;
	}

}