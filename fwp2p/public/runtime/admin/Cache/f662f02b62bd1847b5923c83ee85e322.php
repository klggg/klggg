<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<script type="text/javascript">
 	var VAR_MODULE = "<?php echo conf("VAR_MODULE");?>";
	var VAR_ACTION = "<?php echo conf("VAR_ACTION");?>";
	var MODULE_NAME	=	'<?php echo MODULE_NAME; ?>';
	var ACTION_NAME	=	'<?php echo ACTION_NAME; ?>';
	var ROOT = '__APP__';
	var ROOT_PATH = '<?php echo APP_ROOT; ?>';
	var CURRENT_URL = '<?php echo trim($_SERVER['REQUEST_URI']);?>';
	var INPUT_KEY_PLEASE = "<?php echo L("INPUT_KEY_PLEASE");?>";
	var TMPL = '__TMPL__';
	var APP_ROOT = '<?php echo APP_ROOT; ?>';
</script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/script.js"></script>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/kindeditor.js'></script>
</head>
<body>
<div id="info"></div>

<script type="text/javascript" src="__ROOT__/system/region.js"></script>	
<script type="text/javascript" src="__TMPL__Common/js/user_edit.js"></script>
<div class="main">
<div class="main_title"><?php echo L("EDIT");?> <a href="<?php echo u("User/index");?>" class="back_list"><?php echo L("BACK_LIST");?></a></div>
<div class="blank5"></div>
<form name="edit" action="__APP__" method="post" enctype="multipart/form-data">
<table class="form conf_tab" cellpadding=0 cellspacing=0 >
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title"><?php echo L("USER_NAME");?>:</td>
		<td class="item_input"><?php echo ($vo["user_name"]); ?><input type="hidden" name="user_name" value="<?php echo ($vo["user_name"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title"><?php echo L("USER_EMAIL");?>:</td>
		<td class="item_input"><?php echo ($vo["email"]); ?><input type="hidden" name="email" value="<?php echo ($vo["email"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title"><?php echo L("USER_MOBILE");?>:</td>
		<td class="item_input"><input type="text" value="<?php echo ($vo["mobile"]); ?>" class="textbox" name="mobile" /></td>
	</tr>
	<tr>
		<td class="item_title"><?php echo L("USER_PASSWORD");?>:</td>
		<td class="item_input"><input type="password" class="textbox" name="user_pwd" /></td>
	</tr>
	<tr>
		<td class="item_title"><?php echo L("USER_CONFIRM_PASSWORD");?>:</td>
		<td class="item_input"><input type="password" class="textbox" name="user_confirm_pwd" /></td>
	</tr>
	
	<tr>
		<td class="item_title">所属地区:</td>
		<td class="item_input">
			<select name="province">				
			<option value="" rel="0">请选择省份</option>
			<?php if(is_array($region_lv2)): foreach($region_lv2 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>" <?php if($region['selected']): ?>selected="selected"<?php endif; ?>><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
			</select>
			
			<select name="city">				
			<option value="" rel="0">请选择城市</option>
			<?php if(is_array($region_lv3)): foreach($region_lv3 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>" <?php if($region['selected']): ?>selected="selected"<?php endif; ?>><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
			</select>

		</td>
	</tr>
	
	<tr>
		<td class="item_title">性别:</td>
		<td class="item_input">
			
			<label>女<input type="radio" name="sex" value="0" <?php if($vo['sex'] == 0): ?>checked="checked"<?php endif; ?> /></label>
			<label>男<input type="radio" name="sex" value="1" <?php if($vo['sex'] == 1): ?>checked="checked"<?php endif; ?>/></label>
			<label>未知<input type="radio" name="sex" value="-1" <?php if($vo['sex'] == -1): ?>checked="checked"<?php endif; ?> /></label>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">简介:</td>
		<td class="item_input">
			<textarea name="intro" class="textarea"><?php echo ($vo["intro"]); ?></textarea>
		</td>
	</tr>
	

	
	<tr>
		<td class="item_title"><?php echo L("IS_EFFECT");?>:</td>
		<td class="item_input">
			<label><?php echo L("IS_EFFECT_1");?><input type="radio" name="is_effect" value="1" <?php if($vo['is_effect'] == 1): ?>checked="checked"<?php endif; ?>  /></label>
			<label><?php echo L("IS_EFFECT_0");?><input type="radio" name="is_effect" value="0" <?php if($vo['is_effect'] == 0): ?>checked="checked"<?php endif; ?> /></label>
		</td>
	</tr>
	<tr>
		<td colspan=2 class="bottomTd"></td>
	</tr>
</table>
<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title">真实姓名</td>
			<td class="item_input">
			<input type="text" value="<?php echo ($vo["ex_real_name"]); ?>" name="ex_real_name" class="textbox" />
			</td>
		</tr>
		
		<tr>
			<td class="item_title">银行帐户信息</td>
			<td class="item_input">
			<input type="text" value="<?php echo ($vo["ex_account_info"]); ?>" name="ex_account_info" class="textbox" style="width:500px;" />
			</td>
		</tr>
		
		<tr>
			<td class="item_title">联系方式</td>
			<td class="item_input">
			<input type="text" value="<?php echo ($vo["ex_contact"]); ?>" name="ex_contact" class="textbox" style="width:500px;" />
			</td>
		</tr>
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table> 
<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title"></td>
			<td class="item_input">
			<!--隐藏元素-->
			<input type="hidden" name="<?php echo conf("VAR_MODULE");?>" value="User" />
			<input type="hidden" name="<?php echo conf("VAR_ACTION");?>" value="update" />
			<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
			<!--隐藏元素-->
			<input type="submit" class="button" value="<?php echo L("EDIT");?>" />
			<input type="reset" class="button" value="<?php echo L("RESET");?>" />
			</td>
		</tr>
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table> 		 
</form>
</div>
</body>
</html>