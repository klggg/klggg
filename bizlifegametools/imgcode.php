<?php
/* 
 * ��֤���ƽ�
 * 2009-11-1 15:59  ggg
 * 
 * ������ɫΪ��ɫ����
 * ÿ����֤��Ĵ�С 50 * 19 
 * ÿ�����ֵĴ�С 8 * 10 
 * ƽ��ÿ������ռ 50 / 4 =  13���� ����
 *
 *
 *
 *  ʵ��˼·
 *  1. ���ɱ�׼ģ��ͼƬ ���ڶԱ�
 *   		ȡ��ÿ��ͼƬ�ı�׼ģ�� 0-9���ֱ����� 8 * 10 �Ķ�ά���� A[]
 *			
 *  2. ��ÿ����֤�����ȥ����
 *		 ��4��,��13 13 13 11���ؽ����и� ��ɫֵ�������ĸ���ά���� B[]
 *		 ͳ��ÿ�������зֱ���ɫֵ����������ֵ,�������ó�1,�����ľ�Ϊ0,������ĸ���ά���� C[] �����൱�ڰ�ͼƬ���кڰ׻�,ȥ�ӵ�
 * 
 *  4. �ҵ�ÿ�����ֵı߽�
 *  		Ҫ����ɨ��ȶ�,�����֤�벻�ǰ��ȿ�ֲ�,
 *  		��������һ����ֱ����ɨ�裬ɨ���߾�������ɫ����������(2������)�����ַ���ʼ����,�Ӹõ㿪ʼ����ȡ��8�����أ���A[]����
 *  		���бȽ�,�������г���(90%����),���û��,��ԭ��λ��������Ѱ��
 *  		 
 *  		ͬ����ϵ�����һ����ֱ����ɨ�� �õ�������ʼ���� +10�����غ�Ϊ��������
 *     �õ�8*10���򱣴浽�ĸ���ά���� D[]  
 *
 *  5. ������ D[]��10��ģ������һһ�Ա�,�ҳ������Ƶ�,����Ҳ���,˵���ÿ��ڵ�һ���и�ʱ����ȥһ��,�Ѹÿ����ڵ����������������ҵ���,�ظ����ϲ���.
 *  		�ظ�N�������Ҳ������»���ͼƬ
 *
 *        ��Ч�Լ�� 
 *				ȡ������С���鷢�ֺ�ĳ��ģ���������ƶ�>95 ����Ϊ�ҵ��������x->x+5 �� y->y+9 ����ȡ��Ȼ�����ƶ�����
 * */
//	http://blog.csdn.net/binger819623/archive/2009/05/28/4221615.aspx

/*
$result1	= str_split('001001');
$result2	= str_split('000000010100001');

print_r(array_intersect_assoc($result1,$result2));
 */


//������ֳ��ֵı߽�
function biz_check_borderline($color_array,$start_x,$start_y,$max_width,$back_color) {

	//����ͼƬ��С
	$img_width	 = 8;
	$img_height	 = 10;

	//��һ�����ߴ������ҳ��������ߵĵ�
	$start_x	 = biz_findContinuousPixelX($color_array,$start_x,$start_y,$max_width,$back_color);
	$start_y	 = biz_findContinuousPixelY($color_array,$start_x,$start_y,$max_width,$back_color);
	$color_array	= biz_arrayCopy($color_array,$start_x,$start_y,$img_width, $img_height);
	$max_color_count_array	= biz_maxcount_color($color_array,$back_color);

	$max_color	 = key($max_color_count_array);
	$max_color_count	 = $max_color_count_array[$max_color];

//var_dump($max_color_count_array);
	//����������ɫֵС���������,�϶�������
	if($max_color_count < 19)
	{
		return false;
	}
		return true;

}





//---------------------------------------------- 


class biz_imgcode{

	//ͼƬ��ַ
	private $_url = null;

	//ͼƬ���غ󱣴�Ŀ¼
	private $_savePath	= null;

	//ͼƬ�������Ϣ
	private $_imgInfoArray	= array();

	//
	public function __construct()
	{
		$this->_savePath	= './photo/';
		$this->_logPath	= './logs/';
	}


	//����ͼ���ָ������
	//����ͼƬ���
	public function imageCopy($imgObj,$src_x,$src_y,$img_width, $img_height)
	{
		$truecolor = imagecreatetruecolor($img_width, $img_height);
		if(imagecopy($truecolor, $imgObj, 0, 0, $src_x, $src_y, $img_width, $img_height))
			return $truecolor;
		else
			return false;
	}

	//���ݶ�ά������ɫֵ ��һ����Ƭ
	//����ͼƬ���
	public function creatImgFromArray($color_array)
	{

		//��������ɫֵ���1 �������0
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



	//�Ƚ�������ά����Ľ���
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



	//�õ�ͼƬÿ�����ص���ɫֵ,������ɫֵ��������
	public function getImgIndexColor($imgObj)
	{
		$img_width	 = imagesx($imgObj);
		$img_height	 = imagesy($imgObj);

		$color_array	= array();


		for($y=0; $y<$img_height; $y++)
		{
			for($x=0; $x<$img_width; $x++)
			{
				//�õ���ɫֵ
				$color_tran	= imagecolorsforindex($imgObj,ImageColorAt($imgObj,$x,$y));

				$color_array[$y][$x]	 = sprintf("%03d",$color_tran['red']).sprintf("%03d",$color_tran['green']).sprintf("%03d",$color_tran['blue']);

//echo sprintf("%s ",$color_array[$y][$x]	);
			}
//echo "\n";
		}
		return $color_array;
	}

	//�õ�ͼƬ�Ŀ�ߵ�����
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

	//����ԭʼͼ�� �½�һ��ͬ������ ����ͼ��������
	public function imageCreate()
	{
		$o_im	= null;
		$ermsg	= '';

		$file_path_url	 = $this->getUrl();

		$img_array	= $this->getImgSize($file_path_url); 
		$img_width	 = $img_array['width'];
		$img_height	 = $img_array['height'];

		//���ݲ�ͬ��ͼƬ���ʹ���ͼƬ

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


	//����ͼƬ������
	public function down($url,$save_file)
	{
		//����ļ��Ѵ��ھͲ�����
//		if(!file_exists($save_file))
//		{
			$fp = fopen ($save_file, "wb");
			$ch = curl_init ($url);
			curl_setopt ($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
			curl_setopt ($ch, CURLOPT_HEADER, false);	//�趨�Ƿ����ҳ������
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$ret	= curl_exec($ch); // execute the curl command

			curl_close ($ch);
			fclose($fp);
//		}
//		else
//		{
//			$ret	= true;
//		}

		//���ص��ļ��ǿ�
//		if($this->getFileSize() < 1)
//		{
//			$this->unlinkPhoto();
//			$ret	= false;
//		}
		//����ʧ�� ������־��¼ �����Ժ���������
		if(!$ret)
		{
		}

		return $ret;
	}


	//����ͼƬ�����ַ
	public function setSavePath($path)
	{
		$this->_savePath	= $path;
	}

	//���õ�ǰ������ͼƬ
	public function setUrl($url)
	{
		$this->_url = $url;
		//����ͼƬ��С��Ϣ
		$this->_imgInfoArray	= array();
	}
	//�õ���ǰ������ͼƬ
	public function getUrl()
	{
		return $this->_url;
	}

}