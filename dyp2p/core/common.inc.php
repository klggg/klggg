<?php
/******************************
 * $File: common.inc.php
 * $Description: ͨ�õ����ݿ��ļ�
******************************/

if (!defined('ROOT_PATH'))  /*die('���ܷ���')*/echo "<script>window.location.href='/404.htm';</script>";//��ֱֹ�ӷ���

$db_config['host']     = 'localhost';      //���ݿ�����	
$db_config['user']     = 'ggg';      //���ݿ��û���	
$db_config['pwd']      = 'uiodSDF!sdUjkl';  //���ݿ��û�����	
$db_config['name']     = '52jscn';      //���ݿ���
$db_config['port']     = '';      //�˿�		
$db_config['prefix']   = 'yyd_'; //CMS����ǰ׺	
$db_config['language'] = 'gbk'; //���ݿ��ַ��� gbk,latin1,utf8,utf8..

//����excel��ʽ��
function exportData($filename,$title,$data){
	header("Content-type: application/vnd.ms-excel");
	header("Content-disposition: attachment; filename="  . $filename . ".xls");
	if (is_array($title)){
		foreach ($title as $key => $value){
			echo $value."\t";
		}
	}
	echo "\n";
	if (is_array($data)){
		foreach ($data as $key => $value){
			foreach ($value as $_key => $_value){
				echo $_value."\t";
			}
			echo "\n";
		}
	}
}


function modifier($fun,$value,$arr=""){
	global $_G;
	require_once(ROOT_PATH."plugins/magic/modifier.".$fun.".php");
	$_fun = "magic_modifier_".$fun;
	return $_fun($value,$arr,array("_G"=>$_G));
}	
?>