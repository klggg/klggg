<?php
/* 
 * ��֤���ƽ� ����
 * 2009-11-5 20:08
 * �õ�ģ���ִ�
 * 
 *
 *
 * */

include('imgcode_array.php');
include('imagecreatefrombmp.php');
include('imgcode.php');
//ģ��ͼƬ��ַ
$img_tpl_path	 = './imgcode_tpl/';


$biz_imgcode_obj	= new biz_imgcode();
$biz_imgcode_array_obj	= new biz_imgcode_array();

//����ɫ ��ɫ
$back_color	= '255255255';

$all_tpl_array	= array();
echo '$imgcode_tpl_array	= array();',"\n";
//��������ͼƬ
for($i=0; $i<2;$i++)
{

	$curr_img_path	= $img_tpl_path.$i.".bmp";
//	$curr_img_path	= $img_tpl_path."xxx_0.bmp";

	$biz_imgcode_obj->setUrl($curr_img_path);
	$img_obj	= $biz_imgcode_obj->imageCreate();

//ȡ��ͼƬ�е�һ����


//�õ�ͼƬÿ�����ص���ɫֵ,������ɫֵ��������
	$color_array	= $biz_imgcode_obj->getImgIndexColor($img_obj);
//print_r($color_array);
	$color_array	= $biz_imgcode_array_obj->biz_removeNoise($color_array,$back_color);

	$tmp_array	 = array();
	foreach($color_array as $tmp_i => $rows)
	{
		$tmp_array[$tmp_i]	 = implode('',$rows);
	}

	$all_tpl_array[$i]	 = implode(' ',$tmp_array);

echo '$imgcode_tpl_array[',$i,']=\'',$all_tpl_array[$i],"';\n";
//break;
}


//	echo serialize($all_tpl_array);

//print_r($color_array);
//$img_obj	= $biz_imgcode_obj->creatImgFromArray($color_array);

// ���ͼ��
//header("Content-type: " . image_type_to_mime_type(IMAGETYPE_PNG));
//imagepng($img_obj);
//imagedestroy($img_obj);



