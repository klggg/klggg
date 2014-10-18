<?
# ÅÐ¶ÏÊÇ·ñUcenter
		if ($_G['module']['ucenter_status']==1){
			$sql = "select * from `{ucenter}` where user_id='{$_G['user_id']}'";
			$result = $mysql->db_fetch_array($sql);
			$ucenter_logout = ucenterClass::UcenterLogout($result['uc_user_id']);
			
		}
		
		DelCookies();
		echo '<script language="javascript">window.location.href="/index.php?user&q=login";</script>';
		exit();
?>