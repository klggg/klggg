
{if $_A.query_type == "list"}

<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>Ucenter安装</strong>(请将discuz的文件放在根目录下面，并且改名为discuz)</div>
	

	<div class="module_border">
		<div class="w">是否开启Ucenter：</div>
		<div class="c">
			<input type="radio" name="uc_status" value="0" {if $_A.result.uc_status==0} checked="checked"{/if}/>否
			<input type="radio" name="uc_status" value="1" {if $_A.result.uc_status==1} checked="checked"{/if}/>是
		</div>
	</div>

	<div class="module_border">
		<div class="w">UCenter 数据库主机：</div>
		<div class="c">
			<input type="text" name="uc_dbhost"    value="{$_A.result.uc_dbhost}" class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter 数据库用户名：</div>
		<div class="c">
			<input type="text" name="uc_dbuser" value="{$_A.result.uc_dbuser}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter 数据库密码：</div>
		<div class="c">
			<input type="text" name="uc_dbpw" value="{$_A.result.uc_dbpw}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter 数据库名称：</div>
		<div class="c">
			<input type="text" name="uc_dbname" value="{$_A.result.uc_dbname}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter 数据库字符集：</div>
		<div class="c">
			<input type="text" name="uc_charset" value="{$_A.result.uc_charset}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">Discuz 数据库表前缀：</div>
		<div class="c">
			<input type="text" name="dz_dbtablepre" value="{$_A.result.dz_dbtablepre}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter 数据库表前缀：</div>
		<div class="c">
			<input type="text" name="uc_dbtablepre" value="{$_A.result.uc_dbtablepre}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter 通信密钥：</div>
		<div class="c">
			<input type="text" name="uc_key" value="{$_A.result.uc_key}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter 安装地址：</div>
		<div class="c">
			<input type="text" name="uc_api" value="{$_A.result.uc_api}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter IP：</div>
		<div class="c">
			<input type="text" name="uc_ip" value="{$_A.result.uc_ip}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_border">
		<div class="w">UCenter 当前应用的ID：</div>
		<div class="c">
			<input type="text" name="uc_appid" value="{$_A.result.uc_appid}"  class="input_border" size="30" /> 
		</div>
	</div>
	
	<div class="module_submit" >
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
	
	
</div>
{else}
<table width="100%" border="0"  cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td bgcolor="#ffffff" class="main_td">
			<div class="fl"><strong>Ucenter管理</strong></div>
		</td>
	</tr>
	<tr>
		<td width="25%" align="center" bgcolor="#ffffff"><br /><br />

您已成功安装了此模块，要修改请先 <a href="{$url}/unstall">卸载</a><br /><br />

<br />
</td>
	</tr>
	
</table>
{/if}