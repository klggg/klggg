<?php
<<<<<<< HEAD
=======

class CommonHelper {

	static private $_instance=null;
	static public $errorMsg=null;


	/**
	 * ���Ψһʵ��
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
	//ת������
	static public function gbk2utf8($str)
	{
		// return iconv("gbk", "utf-8//IGNORE", $str);
        return mb_convert_encoding($str,"utf-8","gbk");
	}

	//ת������
	static public function utf82gbk($str)
	{
		// return iconv("utf-8", "gbk//IGNORE", $str);
        return mb_convert_encoding($str,"gbk","utf-8");
	}

	/*
		ȡ�ļ��� ��  aaa.txt ����  aaa
		ע�������  aaa.bbb.txt �������� aaa.bbb
	*/
	public static function subStrHead($fileName,$needle='.')//�����ļ�������
	{
		//�Ӻ���ǰ��
		$currPos=strrpos($fileName, $needle);
		if(!$currPos)
			$currPos=strlen($fileName);
		return(substr($fileName,0,$currPos));//�õ��ϴ��ļ�����
	}

	/*
		ȡ�ļ�����չ�� ��  aaa.txt ����  txt
		ע�������  aaa.bbb.txt �����ص�Ҳ�� txt
	*/
	public static function subStrEnd($fileName,$needle ='.')//�����ļ�����չ��
	{
		$fileExt='';
		if($currPos=strrpos($fileName, $needle))                //����ļ�û����չ��,�ļ�����Ϊȫ�ļ�,��չ����
		{
			//�ļ������� - �ҵ���λ�� - ���������
			$fileExt=substr($fileName,-(strlen($fileName) - $currPos - strlen($needle) ));
		}
		return($fileExt);                                 //������չ��
	}

    /**
     * ��csv��ʽ���ַ���תΪ��ά���顡����
     *  aaa1    bbb1    ccc1
     *  aaa2    bbb2    ccc2
     *  תΪ  Array(
     *      Array("aaa1",��bbb1"
     *  )
     * Enter description here ...
     * @param string $str  ��Ҫת�����ַ��ܡ�����һ
     * @param string $rowKeys  һ���������ÿ���ֶ�ӳ���keyֵ Array('gameid'=>123,....) ע��Ҫ����������һ��
     * @param string $rowSplit  һ��һ����¼�ĸ�����Ĭ���Իس���β
     * @param string $colSplit  һ������ֶηָ�����Ĭ���ö��ŷָ�
     */
    public static function csv2Array($str,$rowKeys=null,$rowSplit="\n",$colSplit=","){
    /* 
         $str	= <<<EOF
    gameid	game_area_id	sdid	game_member_name	game_team_name	cleartime
    1	1	8024	ggg	team	time
    1	2	8024	kl	team	time    
    EOF;
    
        
       $rowKeys    = Array('gameid','game_area_id','sdid','game_member_name','game_team_name','cleartime');
        $colSplit    = "\t";
     */
        $insert_array	= array();
        $str = trim($str);
        $tmp_array1	= explode($rowSplit,$str);
    //     var_dump($str);

        if(count($tmp_array1) < 1)
        {
            // $this->_errorMsg ="empty file ";
            return false;
        }


        
        $tmp_count	= 0;
        foreach ($tmp_array1 as $recode){
    
            $tmp_recode	= trim($recode);
    
            $tmp_count++;

    
            if(empty($tmp_recode))
                continue;

            $tmp_array2	= explode($colSplit,$tmp_recode);
    
            $tmp_array3	= Array();

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

   
            //����Ϸ�������ʺ�Ϊkey
            //$insert_array[$tmp_array3['gameid'].$tmp_array3['game_area_id'].$tmp_array3['sdid']]	= $tmp_array3;
            $insert_array[]	= $tmp_array3;
    
            //list($k,$v)	= explode("\t",$recode);
            //$a[$k]=$v;
        }
    
        // 		print_r($insert_array);
    
        return $insert_array;
    
    }
}





function _HTML_END($title,$msg,$alert_msg="")                       //�����˳�������,������ͨ�������ʾ
{
	printf("<html><head><link rel=stylesheet href=style.css></head><body>");
	printf("<script language=JavaScript>document.title='".$title."'</script>");
	printf("<table align=center height=300><tr align=left><td>");
	printf($msg."<a title=������һҳ href=javascript:history.back(-1)> <font color=#ff0000>��������</font></a>");
	printf("</td></tr>");
	printf("<tr><td align=center>");
	printf("<a title=������һҳ href=javascript:history.back(-1)><img src=".$GLOBALS[_BASE_PATH]."error.gif border=0></a>");
	printf("</td></tr></table>");
	$msg=eregi_replace("<[^\>]+>","",$msg);
	if($alert_msg!="")
	{
		printf("<script language=JavaScript>alert('".$alert_msg."');history.back(-1)</script>");
	}
	printf("</body></html>");
	exit();
	die();
}

function _MYSQL_END($title="Error",$msg)                    //�����˳�������,�������ݿ�������ʾ
{
	$errno = mysql_errno();                                  //�õ�������Ϣ����
	$error = mysql_error();                                  //�õ�������Ϣ,����һ�����Ŵ�����
	printf("<html><head><head><link rel=stylesheet href=style.css></head><title>".$title."</title></head><body><center>");
	printf($msg);
	printf("<br>Error: (".$errno.")".$error."<a title=������һҳ href=javascript:history.back(-1)> <font color=#ff0000>��������</font></a><br></center>");
	printf("</body></html>");
	exit();
	die();
}

//����������ݴ��ݵ���һҳ��ĺ��� ע�������ڱ�

function submit_to($To_url,$url_test,$pop_test="",$main_form="main_form")                    
{
	printf("<a href=javascript:document.".$main_form.".submit() OnMouseDown='document.".$main_form.".action=\"".$To_url."\"' title='".$pop_test."'>".$url_test."</a>");
}


//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\ͳ���ַ���ĳ��asc���ڵĸ���,����һ������\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function count_str($find_str,$start_ord,$end_ord="")				//�Զ����ͳ���ִ����ַ�����,��ʼasc��������asc
{
	$tmp_len=0;
	for($tmp_i=0;$tmp_i<strlen($find_str);$tmp_i++)
	{
		//������ݵĵڶ�������Ϊ��,ͳ�� start -> end asc����ַ�
		if($end_ord!="")
		{
			if(Ord($find_str[$tmp_i])>=$start_ord && Ord($find_str[$tmp_i])<=$end_ord)
			{
				$tmp_len++;
			}
		}
		else
		{
			if(Ord($find_str[$tmp_i])==$start_ord)
			{
				$tmp_len++;
			}
		}
	}
	return($tmp_len);	//���ҵ��ַ���������
}//count_str

function _SHOW_DEBUG($debug_msg,$att_msg="")                       //��ʾ������Ϣ
{
	if($GLOBALS[_DEBUG_SURE])
	{
		print("<font color=#2B2968><div align=center style='background-color: rgb(4,41,104); color: rgb(255,255,255);font-size: 10pt'>");
		print("<i>".$att_msg."</i> ".$debug_msg);
		print("</div></font>");
	}

}

/*
��ĳЩһ���ڹ������ִܽ��д���,��֤ÿ�е��ַ��� Len_of_row ����
ls_str 
	�ַ���,Ҳ��Ҫ����Ĵ�
Len_of_row 
	���е��ַ�����
$input_str
	���еķָ���
*/

function _MAKE_ROW_STR($tmp_str,$Len_of_row=100,$input_str="\n")                       //
{
	$tmp_str=str_replace("\r", "", $tmp_str);     //ȥlinux�µĻ��� 
	$tmp_str= explode("\n",$tmp_str);//�Իس����п�����
	$temp_str="";
	for($tmp_i=0;$tmp_i<count($tmp_str);$tmp_i++)
	{
		$tmp_str[$tmp_i]=trim($tmp_str[$tmp_i]);
		if(strlen($tmp_str[$tmp_i])>$Len_of_row ) //�ҵ������޶�����
		{
			if(strpos($tmp_str[$tmp_i],$input_str)<$Len_of_row && strpos($tmp_str[$tmp_i],$input_str)>0)
			{
				$temp_str=substr($tmp_str[$tmp_i],0,strpos($tmp_str[$tmp_i],$input_str));
				if($tmp_str[$tmp_i+1]!="")
				{
					$tmp_str[$tmp_i+1]=substr($tmp_str[$tmp_i],strpos($tmp_str[$tmp_i],$input_str)).$input_str.$tmp_str[$tmp_i+1];
				}
				else
				{
					$tmp_str[$tmp_i+1]=substr($tmp_str[$tmp_i],strpos($tmp_str[$tmp_i],$input_str));
				}
				$tmp_str[$tmp_i]=$temp_str;
			}
			else
			{
				$temp_str=substr($tmp_str[$tmp_i],0,$Len_of_row);
				if($tmp_str[$tmp_i+1]!="")
				{
					$tmp_str[$tmp_i+1]=substr($tmp_str[$tmp_i],$Len_of_row).$input_str.$tmp_str[$tmp_i+1];
				}
				else
				{
					$tmp_str[$tmp_i+1]=substr($tmp_str[$tmp_i],$Len_of_row);
				}
				$tmp_str[$tmp_i]=$temp_str;
			}
		}
//		print("<br>".$tmp_i.":".count($tmp_str).":?".$tmp_str[$tmp_i]."|".$tmp_str[$tmp_i+1]."*<br>");
	}
	return(implode($input_str, $tmp_str));
}


//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\ȡ�ö����ִ�,����������\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/*
$gb_str
	Ҫȡ�ö������ִ�
$str_len
	Ҫȡ���ִܵĳ���
$sub_str
	���غ���ִ�
$ngb_len
	ͳ�Ƴ����ķǺ����ַ��ĸ���
$asc_gb_start
	���ֿ�ʼ��ASC��
$asc_gb_end
	���ֽ�����ASC��

Ϊʲô���ְ������? 
ԭ��1:������ص��ִ�����1���ַ����Ǻ���(a),Ҳ����˵.�Ǻ����ַ�.�л������� 
ԭ��2:�������ص��ִܳ�����4,��ż�����ַ� 

������һ��,������ص��ִ���Ǻ����ַ�(�� a b 1 2  ������)��������,�����ǽ�ȡ����ż�����ַ�, 
�ǲ��Ǻ����׳��ְ������,��ʱ����ֻҪ������������ٶ��һ���ַ��Ϳɽ�������� 


������ֻ�����ִ���ĺ��ֶ���������.Ҳ���ǲ����ڰ�����ֵ����.���������������ֵĿ����Ժ���:)
��ʵֻҪ��������������  
�����ַ��ĳ���  ��  ��ȡ���ַ��� �����Ǻ����ַ��ĳ��Ȳ�Ϊͬ ��ż 
�ͱ�ʾ�д��ڰ�����ֵĿ���,��ʱ���ǾͰ����ص��ִܳ��ȼ���1���ַ�,�Ϳ��Ա�����������. 
��ȻҪע��һ�� �Ǻ����ַ��ĳ��� Ϊ 1  ��������� 
*/
function get_gb_str($gb_str,$str_len,$asc_gb_start=160,$asc_gb_end=255)                 //�Զ����ͳ���ִ����ַ�����,��ʼasc��������asc
{
	$sub_str=substr($gb_str,0,$str_len);//ȡ��$str_len���ȵ��ִ�
	$ngb_len=strlen($sub_str)-count_str($sub_str,$asc_gb_start,$asc_gb_end);//�õ��ִ����м����Ǻ����ַ�
//���Ϊͬ��ż,��1,����$ngb_len +2��Ϊ�˳�ȥ$ngb_len Ϊ  1  ��������� 
	if($ngb_len%2!=$str_len%2)
	{
		$str_len++;
	}
//	print($str_len);
//	print("<br>");
	return(substr($gb_str,0,$str_len));//������ȡ���ִܷ���
}

//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\��ת��ָ��ҳ��\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function jumpto($jump_url,$intor="")
{
	if(trim($jump_url)=="")
	{
		return(-1);
	}

	print("
<table width='100%' border='0' cellspacing='0' cellpadding='0' height='95%' align='center'>
  <tr align='center' valign='middle'>
	<td>
	<table border='0' cellspacing='1' cellpadding='10' bgcolor='#555576' width='70%'>
	<tr>
		<td bgcolor='#FFFFFF' align='center'>
		<p> <font face='����, verdana, arial, helvetica' style='FONT-SIZE: 9pt' > ".$intor." <br><br> </font>
		
		<font face='����, verdana,arial,helvetica' style='FONT-SIZE: 9pt' >ҳ����ת��... <a href='".$jump_url."'>����㲻��ȴ�������<br>
		(���������������û���Զ�����)</a> </font> </p></td>
	</tr>
	</table>
	</td>
</tr>
</table>
");

/*
		print("<span align=center style='background-color: rgb(4,41,104); color: rgb(255,255,255);font-size: 10pt'>");
		print("ҳ��������,���Ե�...");
		print("</span><br>");
		print("����㲻Ը�ȴ�,Ҳ�ɰ���ֱ�ӽ���:<a href=".$jump_url.">".$jump_url.">>></a>");
*/
//		header("Location: {$url}");

	print("<script language=javascript>");
	print("location.replace('".$jump_url."')");
	print("</script>");
}
//$back_page��ʾ���˼�ҳ
function alert_js($alert_msg,$back=0,$back_page=1)
{
	print("<a title=������һҳ href=javascript:history.back(-1) >��һҳ[Back]</a>");
	print("<script language=JavaScript>");
	if($alert_msg!=""){	print("alert('".$alert_msg."');");}
	if($back==1)print("history.back(-".$back_page.")");//����ǰһǰ
	else if($back==2)
	{
		print("window.close();");//�رմ���
	}
	print("</script>");
}

/*
�����ɫ�ַ�
fcolor
	ǰ��ɫ
bcolor
	����ɫ


		print("<font color=#2B2968><div align=center style='background-color: rgb(4,41,104); color: rgb(255,255,255);font-size: 10pt'>");
		print("<i>".$att_msg."</i> ".$debug_msg);
		print("</div></font>");

*/
function cprint($string,$fcolor,$bcolor="")
{
	$string=trim($string);
	if($string=="")
	{
		return(0);
	}
	if($fcolor!="")
	{
		print("<font color=#".$fcolor.">");
	}
	if($bcolor!="")
	{
		print("<span style='background-color: #".$bcolor."'>"); 
	}


	print($string);

	if($bcolor!="")
	{
		print("</span>");; 
	}

	if($fcolor!="")
	{
		print("</font>");
	}

}

/*  �õ�����key��� index ��value������,
 *  Exp:                $tf['user']="user|�û���|c"; 
 *  ������һ��һά����
 * ��һά��������������
 * $field_range
 * �ֶα�ʶ,�������ȡ��ָ���ֶν�����ʾ
 * $need_sure
 * 	Ϊ0��ʾֻȡ���ֶα�ʶ��һ��
 * ��
 * 	$tf['user']="user|�û���";
 * ��ɡ�����ȫ�ֱ�������
 * 	$Table_Field['user']="user";      //�����ֶα���
 * 	$Table_Field_c['user']="�û���";    //�����ֶζ�Ӧ��������Ϣ
 * �������һ������

 */


function GetArrayKey($tf,$index=0,$field_range="",$need_sure=0)
{
	reset($tf);//ָ������ͷ
	$Table_Field="";                         //�����ֶ�,�Ǹ�һά����,�������Ҫ��ѯ�ľ����ֶ�
	$Table_Field_c="";                       //���������ֶ�,�Ǹ�һά����,�������Ҫ��ѯ�ľ����ֶ�
	for($tmp_i=0;$tmp_i<count($tf);$tmp_i++)
	{
		$current_key=key($tf);//�õ����������
		$Field_tf=explode("|",$tf[$current_key]);
		if($field_range=="")
		{
			if($Field_tf[2]=="")                   //�Թ���Ҫ��ʾ���ֶ�
			{
				$Table_Field[$current_key]=$Field_tf[$index];      //�����ֶα���
			}
		}
		else if($field_range=="all")
		{
				$Table_Field[$current_key]=$Field_tf[$index];      //�����ֶα���
		}
		else
		{
			if($need_sure==0)
			{
				if(!strstr($Field_tf[2],$field_range))                   //�Թ���Ҫ��ʾ���ֶ�
				{
					$Table_Field[$current_key]=$Field_tf[$index];      //�����ֶα���
				}
			}
			else
			{
				if(strstr($Field_tf[2],$field_range))                   //ȡ��Ҫ��ʾ���ֶ�
				{
					$Table_Field[$current_key]=$Field_tf[$index];      //�����ֶα���
				}
			}
		}
		next($tf);//�ƶ�����ָ��
	}
	unset($Field_tf);
	unset($tf);
	return($Table_Field);//���ذ���key������
}

/*
��һά��������������
$field_range
	�ֶα�ʶ,�������ȡ��ָ���ֶν�����ʾ
$need_sure
	Ϊ0��ʾֻȡ���ֶα�ʶ��һ��
��
	$tf['user']="user|�û���";
��ɡ�����ȫ�ֱ�������
	$Table_Field['user']="user";      //�����ֶα���
	$Table_Field_c['user']="�û���";    //�����ֶζ�Ӧ��������Ϣ
�������һ������
*/
function CutArray($tf,$field_range="",$need_sure=0)
{
	global $Table_Field;
	global $Table_Field_c;
	reset($tf);//ָ������ͷ
	$Table_Field="";                         //�����ֶ�,�Ǹ�һά����,�������Ҫ��ѯ�ľ����ֶ�
	$Table_Field_c="";                       //���������ֶ�,�Ǹ�һά����,�������Ҫ��ѯ�ľ����ֶ�
	for($tmp_i=0;$tmp_i<count($tf);$tmp_i++)
	{
		$current_key=key($tf);//�õ����������
		$Field_tf=explode("|",$tf[$current_key]);
		if($field_range=="")
		{
			if($Field_tf[2]=="")                   //�Թ���Ҫ��ʾ���ֶ�
			{
				$Table_Field[$current_key]=$Field_tf[0];      //�����ֶα���
				$Table_Field_c[$current_key]=$Field_tf[1];    //�����ֶζ�Ӧ��������Ϣ
			}
		}
		else if($field_range=="all")
		{
				$Table_Field[$current_key]=$Field_tf[0];      //�����ֶα���
				$Table_Field_c[$current_key]=$Field_tf[1];    //�����ֶζ�Ӧ��������Ϣ
		}
		else
		{
			if($need_sure==0)
			{
				if(!strstr($Field_tf[2],$field_range))                   //�Թ���Ҫ��ʾ���ֶ�
				{
					$Table_Field[$current_key]=$Field_tf[0];      //�����ֶα���
					$Table_Field_c[$current_key]=$Field_tf[1];    //�����ֶζ�Ӧ��������Ϣ
				}
			}
			else
			{
				if(strstr($Field_tf[2],$field_range))                   //ȡ��Ҫ��ʾ���ֶ�
				{
					$Table_Field[$current_key]=$Field_tf[0];      //�����ֶα���
					$Table_Field_c[$current_key]=$Field_tf[1];    //�����ֶζ�Ӧ��������Ϣ
				}
			}

		}
		next($tf);//�ƶ�����ָ��
	}
	unset($Field_tf);
	unset($tf);
}

    


/***********����GETFILE******
����:�õ�Զ���ļ������γɻ����ļ�
ʱ��:2002-5-11
����:����ֵ
$local_file
	�����ļ�,���ڱ���Զ����ҳ������
$remote_file
	Զ�̵��ļ���
$update_time
	//���»����ļ��ļ��ʱ����.
$base_path
	ԭ�ļ���Ŀ¼
***********************************************/

function getfile($remote_file,$local_file,$base_path,$upata_time=3600)
{
//	_SHOW_DEBUG(filesize($local_file));
//$upata_time=1;
	print("aaaaaaaaaaa<br>");
	$current_time=time();//��ǰʱ��
	if(file_exists($local_file))//���ڻ����ļ�
	{
		$local_filesize=filesize($local_file);
		if($local_filesize<100)
		{
			_SHOW_DEBUG("local_filesize<100");
			unlink($local_file);
			return(false);
		}
		$file_time=filemtime($local_file);//�õ��ļ�������޸�ʱ��
		if(($current_time-$file_time)<$upata_time)//�ļ�δ����
		{
			if($local_filesize<10)//������ʵ��Ϊ�˷�ֹ��ѭ��.���ڶ����������,�ݹ�
			{
				_SHOW_DEBUG("local_filesize<10");
				return(false);
			}
			else
			{
				_SHOW_DEBUG("���ļ�����Ҫ����!".($current_time-filemtime($local_file)));
				return(true);
			}
		}
	}
	$timeout=10;                                     //�趨����ִ��$timeout����˳�,��ֹ��ѭ��

	if(!$remote_fp=fopen($remote_file,"r")) //!file_exists($remote_file) ||
	{
		_SHOW_DEBUG("��Զ���ļ�".$remote_file."ʧ��!");
		return(false);
	}

	if(!$local_fp=fopen($local_file,"w"))
	{
		_SHOW_DEBUG("�򿪱����ļ�".$local_file."ʧ��!");
		fclose($remote_fp);
		return(false);
	}

//$remote_file="http://www.xh88.com/ggg/user_template/main.php?user=slp11";
//$remote_file="http://192.168.1.253/user_template/main.php?user=ye88";


//	print($remote_file);
//	die();

/*
	while(!feof($remote_fp))
	{
		print(fread($remote_fp,1000));
	}

*/

	fputs($local_fp,"<base href='".$base_path."'> ");//д���ַ
/*	print($remote_file);


	if(!feof($remote_fp))
	{
		print("??");
		die();
	}
*/
	while(!feof($remote_fp))
	{
		if((time()-$current_time)>$timeout)                    //�����ʱ��ǿ���˳�
		{
			_SHOW_DEBUG("���� PHP ��ʽִ��ʱ��:".$timeout."��,�����ж�!");
			if(file_exists($local_file))
			{
				unlink($local_file);
			}
			fclose($local_fp);
			fclose($remote_fp);
			return(false);
		}

		fputs($local_fp,fread($remote_fp,1000));
	}
	fclose($local_fp);
	fclose($remote_fp);
	_SHOW_DEBUG("��ʱ".(time()-$current_time));
	return(true);
}




/*
 *    lang_translate
 *    ����:
 *           �����ݿ�����ҵ���Ӧ�������Եķ���. ��  "�й�"  ��Ӧ���� "china"
 *    $lang_former
 *           Ҫ������ַ���
 *    
 *    $lang_type
 *           ����ɵ�����                ��  en ��ʾ��ӦӢ�ĵķ���.
 *    
 *    $order
 *           ����ɵ�˳��                ��� order=1 :"�й�"  ����� "china"  ��� "china"  ����� "�й�"
 *    
 *    ����
 *           ����õ��ַ���,����Ҳ�������ԭ��
 *    ��ʼ������ ���� ,�� ���ķ��������������
 *    
*/
function lang_translate($lang_former,$lang_type,$order=1)
{
	if($order==1)
	{
		$Query="select lang_final as return_lan from chinatoolnet.lang_translate where lang_former='".$lang_former."' and lang_type='".$lang_type."'";
	}
	else
	{
		$Query="select lang_former as return_lan from chinatoolnet.lang_translate where and lang_final='".$lang_former."' and lang_type='".$lang_type."'";
	}
	$Query.=" and flag_deleted='N'";
	$result_lang= mysql_query($Query);
	if(!$result_lang)
	{
		_MYSQL_END("?","?");
	}
	$record_lang=mysql_fetch_array($result_lang);
	if($record_lang)
	{
		return(trim($record_lang[return_lan]));
	}
	else
	{
		return(trim($lang_former));
	}
}

/*  ���ط���ɵ��ִ�
 *   �� ����,�紸,���� �ᱻ�����  aaa,bbb,ccc ����ʽ,�����Ҳ����Ĳ�����
 *   ����õ����ݷ����� lang_former Ϊ �ؼ���(key) ��ȫ��������
 *
 *   lang_array  ��һ������ָ��,
 *
 *   ���÷�ʽ ***��ס�����ǵ�����ָ��****
 *      get_lang(&$lang_array,"�й�","en")
 *
 */

function get_lang($tmp_lang_array,$lang_former,$lang_type,$order=1)
{
	$tmp_array=split("[�� ,��]",trim($lang_former));
	$tmp_string="";
	for($tmp_i=0;$tmp_i<count($tmp_array);$tmp_i++)
	{
		$tmp_array[$tmp_i]=trim($tmp_array[$tmp_i]);
		if($tmp_array[$tmp_i]=="")
			continue;


		if($tmp_lang_array[$tmp_array[$tmp_i]]=="")//û�����
		{
			$tmp_lang_array[$tmp_array[$tmp_i]]=lang_translate($tmp_array[$tmp_i],$lang_type,$order);
		}
		$tmp_string.=$tmp_lang_array[$tmp_array[$tmp_i]];

		if($tmp_i!=count($tmp_array)-1)
		{
			$tmp_string.=",";
		}

//		print($tmp_array[$tmp_i]);
//		print("<br>");
	}

	return($tmp_string);
}


//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\����select ���ĺ���\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/*
����:2002-5-16
����:ʵ�����¼������������

$select_data
	��ά����,��Ų���select���ڵ�����.

����ֵ
	û�з���ֵ

��������:
MakeSelectHtml($select_data);

javascript����
	V
	V
	V
ParentSelect
	�ؼ����е�ֵΪ�����Select�ĵ�JavaScript�ű�

SubSelect
	�ؼ����е�ֵΪ�����Select�Ķ����JavaScript�ű�


html����:
	<select size="1" name="province"  onChange="javascript:select_option(document.personpro,document.personpro.province,document.personpro.city)"> 


*/


function MakeSelectHtml($select_data)
{
$select_var="<script language=javascript>";
$select_var.="function select_option(form_name,ParentSelect,SubSelect){";

for($tmp_i=0;$tmp_i<(count($select_data));$tmp_i++)
{
	$select_var.="var st".$tmp_i."_id=new Array(".((count($select_data[$tmp_i])-2)/2).");";
	$select_var.="var st".$tmp_i."_name=new Array(".((count($select_data[$tmp_i])-2)/2).");";
	for($tmp_ii=2,$count=0;$tmp_ii<(count($select_data[$tmp_i]));$tmp_ii+=2,$count++)
	{
	$select_var.="st".$tmp_i."_name[".$count."]='".$select_data[$tmp_i][$tmp_ii]."';";
//		print("\n");
	$select_var.="st".$tmp_i."_id[".$count."]='".$select_data[$tmp_i][$tmp_ii+1]."';";
//		print("\n");
		}
	}
$select_var.="
	var selected_id,name_arry,id_array;
	selected_id=ParentSelect.selectedIndex;
	if (selected_id==0)
	{
		SubSelect.length=0;
		SubSelect.options[0]=new Option('��ѡ��','');
		return false;
	}
	else
	{
		selected_id--;
		name_array='st' + selected_id + '_name';
		id_array='st' + selected_id + '_id';
		var array_length=eval(name_array).length;
		SubSelect.length=0;

		if (array_length==0)
		{
			SubSelect.options[0]=new Option('====','');
		}
		else
		{
			SubSelect.options[0]=new Option('��ѡ��','');
			for (var i=0; i < array_length ; i++)
			{
				SubSelect.options[i+1]=new Option(eval(name_array)[i],eval(id_array)[i]);
			} 
		}
		SubSelect.selectedIndex = 0;
	}
";
$select_var.="}</script>";
return($select_var);
}

/***********����countdate******
����:�õ�����ʱ��������������
ʱ��:2003-9-6
ʵ�� $date1��$date2���
$date2 ��ʽ
2003-9-6
***********************************************/

function countdata($date1,$date2)
{
	$date1_elements = explode("-" ,$date1); 
	$udate1=mktime (0, 0,0 ,$date1_elements [1], $date1_elements[ 2],$date1_elements [0]); ;	//�õ���ʱ���1

	$date2_elements = explode("-" ,$date2);
	$udate2=mktime (0, 0,0 ,$date2_elements [1], $date2_elements[ 2],$date2_elements [0]); //�õ������ڵ�ʱ���
	$pass_data=($udate1-$udate2)/(3600*24);		//�õ��˴�ע�Ὺʼ�����ھ���������
	return($pass_data);
}



function DateAdd ($interval, $number, $date)
{ 
/*
	yyyy year�� 
	q Quarter���� 
	m Month�� 
	y Day of yearһ����� 
	d Day�� 
	w Weekdayһ�ܵ����� 
	ww Week of year�� 
	h HourСʱ 
	n Minute�� 
	s Second�� 
	w��y��d����������ȫһ���ģ�����Ŀǰ�������ϼ�һ�죬q��3���£�ww��7�졣 

	$currenttime = time(); 
	echo "Current time: ". strftime("%Hh%M %A %d %b" ,$currenttime)."br"; 
	echo "<br>"; 
	$newtime = DateAdd ("n",50 ,$currenttime); 
	echo "Time plus 50 minutes: ". strftime("%Hh%M %A %d %b" ,$newtime)."br"; 
	echo "<br>"; 
	$temptime = DateDiff ("n",$currenttime ,$newtime); 
	echo "Interval between two times: ".$temptime; 
	echo "<br>"; 
*/
	$date_time_array = getdate($date); 
	$hours = $date_time_array["hours"]; 
	$minutes = $date_time_array["minutes"]; 
	$seconds = $date_time_array["seconds"]; 
	$month = $date_time_array["mon"]; 
	$day = $date_time_array["mday"]; 
	$year = $date_time_array["year"]; 
	switch ($interval) 
	{ 
		case "yyyy": $year +=$number; break; 
		case "q": $month +=($number*3); break; 
		case "m": $month +=$number; break; 
		case "y": 
		case "d": 
		case "w": $day+=$number; break; 
		case "ww": $day+=($number*7); break; 
		case "h": $hours+=$number; break; 
		case "n": $minutes+=$number; break; 
		case "s": $seconds+=$number; break; 
	} 
	$timestamp = mktime($hours ,$minutes, $seconds,$month ,$day, $year); 
	return $timestamp;
} 

Function DateDiff ($interval, $date1,$date2)
{ 
// �õ�������֮���������� 
	$timedifference = $date2 - $date1; 
	switch ($interval) { 
/*
	case "w": $retval = bcdiv($timedifference ,604800); break; 
	case "d": $retval = bcdiv( $timedifference,86400); break; 
	case "h": $retval = bcdiv ($timedifference,3600); break; 
	case "n": $retval = bcdiv( $timedifference,60); break; 
	case "s": $retval = $timedifference; break; 
	*/
	case "w": $retval = $timedifference/604800; break; 
	case "d": $retval = $timedifference/86400; break; 
	case "h": $retval = $timedifference/3600; break; 
	case "n": $retval = $timedifference/60; break; 
	case "s": $retval = $timedifference; break; 
	} 
	return $retval;
} 
/*	�õ���ǰ����ߵ�IP��ַ
 *
 *
 */

function get_ip()
{
	$ip="";
	if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR")) $ip = getenv("REMOTE_ADDR");
	else $ip = "UNKNOWN";
	return $ip;
	//REMOTE_ADDR
}

//************* �õ���ǰʱ�� ΢��
function getmicrotime()
{
	list($usec, $sec) = explode(" ",microtime()); 
	return ((float)$usec + (float)$sec); 
}

/**+-----------------------------------------------
	�� �� ��: setstatus
	��������: �����ļ��� msg �� ~msg ����ͬ1��0  
	����˵��: ���ļ����� msg ~msg ����ʾ��ǰ�� true �� false ״̬
	���ú���: setstatus($statusid,$istrue,$_DATA_STATUS_PATH)
	����:
		statusid
			��ǩ��
		istrue
			��ǩ״̬ true or false
		_DATA_STATUS_PATH
			��ǩ��ŵ�Ŀ¼ *Ҫ�ɶ�д
	�� �� ��: ggg			    ����: 2004-9-27 13:35
	�� �� ��: ggg			    ����: 2004-9-27 13:35
	��    ��: 1.0
**+-----------------------------------------------
*/
function setstatus($statusid,$istrue,$_DATA_STATUS_PATH)
{
	if(!file_exists($_DATA_STATUS_PATH.$statusid))	//������״̬��ǩ
	{
		if(!file_exists($_DATA_STATUS_PATH."~".$statusid))	//msg �� ~msg ����ͬ1��0
		{
			if($istrue)//��״̬��������
			{
				$fp=fopen($_DATA_STATUS_PATH.$statusid,"w");fclose($fp);
			}
			else
			{
				$fp=fopen($_DATA_STATUS_PATH."~".$statusid,"w");fclose($fp);
			}
		}
		else	//���ڼ��ļ���
		{
			if($istrue)//��״̬��������
			{
				rename($_DATA_STATUS_PATH."~".$statusid,$_DATA_STATUS_PATH.$statusid);
				//move_uploaded_file($_DATA_STATUS_PATH."~".$statusid,$_DATA_STATUS_PATH.$statusid);
			}
		}
	}
	else	//�������ļ���
	{
		if(!$istrue)//��״̬�����ɼ�
		{
			rename($_DATA_STATUS_PATH.$statusid,$_DATA_STATUS_PATH."~".$statusid);
			//move_uploaded_file($_DATA_STATUS_PATH.$statusid,$_DATA_STATUS_PATH."~".$statusid);
		}
	}
}

//*** �õ�״̬���
	function getstatus($statusid,$_DATA_STATUS_PATH)
	{
		$istrue=false;
		if(file_exists($_DATA_STATUS_PATH.$statusid))	//����״̬��ǩ
		{
			$istrue=true;
		}
		else
		{
			$istrue=false;
		}
		return ($istrue);
	}
//!!! �õ�״̬���



/**+-----------------------------------------------
	�� �� ��: GggMkjsArray
	��������: ����js�������
	����˵��: 
	���ú���: GggMkjsArray()
	����:
		$tmpCatagoryArray
			����������������
			tmpCatagoryArray �ĵ�һ�����������Ǳ������,������С��
			$tmpCatagoryArray[0]["computer"]="��������";
			$tmpCatagoryArray[0]["xxx"]="xxx";
			$tmpCatagoryArray[1]["aaa"]="aaa";
	��	��: ��
	�� �� ��: ggg				����: 2005-3-17 18:27
	�� �� ��: ggg				����: 2005-3-17 18:27
	��	��: 1.0
**+-----------------------------------------------
*/


	function GggMkjsArray(&$tmpCatagoryArray,$tmpCatagoryName)
	{
		if( empty($tmpCatagoryArray))
			return false;
		$ParentCount=count($tmpCatagoryArray);	//ͳ�Ƴ��м�������
		if($ParentCount<1)						//��������������û�����ݣ�ֱ�ӷ���
			return false;
		$javaColumnName=$tmpCatagoryName."Array";	//�������ɵ� javascript ���� ���������Ϣ
		$htmlString="\n var ".$javaColumnName."=new Array();";//������������javascript���롣������������򱣴����ļ�
		for($icnt=0;$icnt<$ParentCount;$icnt++)
		{
			if(count($tmpCatagoryArray[$icnt])<1)
				continue;
			$htmlString.="\n ".$javaColumnName."[".$icnt."]=new Array();";
			$jcnt=0;
			foreach ($tmpCatagoryArray[$icnt] as $key => $value) 
			{
				$htmlString.="\n ".$javaColumnName."[".$icnt."][".$jcnt."]=new Array(\"".$key."\",\"".$value."\");";
				$jcnt++;
			}
		}
		return $htmlString;
	}//END GggMkjsArray


>>>>>>> 4fd51768c245e633e7beb027832badef9cbbe720
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
