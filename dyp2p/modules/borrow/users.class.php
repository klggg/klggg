<?

/******************************
 * $File: users.class.php
 * $Description: 用户基本信息操作
******************************/

//将语言给插进来
require_once("users.model.php");

require_once("users.function.php");

require_once("users.admin.php");

class usersClass  extends usersadminClass {
	
	function usersClass(){
		//连接数据库基本信息
		
        
	}
	
	/**
	 * 1,检查邮箱
	 *
	 * @param array $data
	 * @param string $data['user_id'],$data['email'];
	 * @return boolen(true,false)
	 */
	function CheckEmail($data = array()){
		global $mysql;
		//邮箱不能为空
        if (!IsExiest($data['email'])) {
            return false;
        }
        //判断是否是除了本身以外的邮箱
		$_sql = "";
		if (IsExiest($data['user_id'])!=false) {
			$_sql = " and user_id!= {$data['user_id']}";
		}
		$sql = "select 1 from `{users}` where  email = '{$data['email']}' $_sql";
		$result = $mysql->db_fetch_array($sql);
		//如果邮箱不存在的话则返回
		if (!$result) return false;
		return true;
	}
	
	
	/**
	 * 2,检查用户名
	 *
	 * @param array $data
	 * @param string $data['user_id'],$data['username'];
	 * @return boolen(true,false)
	 */
	function CheckUsername($data = array()){
		global $mysql;
		//用户名不能为空
        if (!IsExiest($data['username'])) {
            return false;
        }
        //判断是否是除了本身以外的邮箱
		$_sql = "";
		if (IsExiest($data['user_id'])!=false) {
			$_sql = " and user_id!= {$data['user_id']}";
		}
		$sql = "select 1 from `{users}` where  username = '{$data['username']}' $_sql";
		$result = $mysql->db_fetch_array($sql);
		//如果用户名不存在的话则返回
		if (!$result) return false;
		return true;
	}
	
	function CheckRealname($data = array()){
		global $mysql;
        if (!IsExiest($data['realname'])) {
            return false;
        }
		$_sql = "";
		if (IsExiest($data['user_id'])!=false) {
			$_sql = " and user_id!= {$data['user_id']}";
		}
		$sql = "select 1 from `{users_info}` where  realname = '{$data['realname']}' and realname_status=1 $_sql";
		$result = $mysql->db_fetch_array($sql);
		if (!$result) return false;
		return true;
	}
	
	function CheckPhone($data = array()){
		global $mysql;
        if (!IsExiest($data['phone'])){
            return false;
        }
		$_sql = "";
		if (IsExiest($data['user_id'])!=false) {
			$_sql = " and user_id!= {$data['user_id']}";
		}
		$sql = "select 1 from `{users_info}` where  phone = '{$data['phone']}' and phone_status=1 $_sql";
		$result = $mysql->db_fetch_array($sql);
		if (!$result) return false;
		return true;
	}
	
	
	/**
	 * 3，添加用户
	 *
	 * @param Array $index
     * @param $user_id 返回用户ID
	 * @return Boolen
	 */
	function AddUsers($data = array()){
		global $mysql,$_G,$MsgInfo;
		
        //判断用户名是否为空
        if (!IsExiest($data['username'])) {
            return "users_username_empty";
        }
        //判断用户名长度是否大于15位
		if (strlen($data['username'])>15){
			return "users_username_long15";
		}
		//判断密码是否为空
        if (!IsExiest($data['password'])) {
            return "users_password_empty";
        }
		//邮箱不能为空
        if (!IsExiest($data['email'])) {
            return "users_email_empty";
        }
        //判断邮箱长度是否大于32位
		if (strlen($data['email'])>32){
			return "users_email_long32";
		}
		//判断用户名是否存在
		if(self::CheckUsername(array("username"=>$data['username']))) {
			return "users_username_exist";
		}
		//判断邮箱是否已经存在
		if(self::CheckEmail(array("email"=>$data['email']))) {
			return "users_email_exist";
		}
		//MD5加密，用一个密码来防止被破译
		$data['password'] = md5($data['password']);
		
		//插入users表数据
		$sql = "insert into `{users}` set `reg_time` = '".time()."',`reg_ip` = '".ip_address()."',";
		$sql .= "`up_time` = '".time()."',`up_ip` = '".ip_address()."',`last_time` = '".time()."',`last_ip` = '".ip_address()."',";
		$sql .= "`username`='{$data['username']}',";
		$sql .= "`password`='{$data['password']}',";
		$sql .= "`email`='{$data['email']}'";
		$result = $mysql->db_query($sql);
		if(!$result){
			return "users_add_error";
		}else{
			$user_id = $mysql->db_insert_id();
			
			//用户信息表（users_info）初始化
			$sql = "insert into `{users_info}` set user_id='{$user_id}',type_id=1";
			$mysql->db_query($sql);
			
			return $user_id;
		}
	}

	/**
	 * 4，修改用户密码
	 *
	 * @param Array data
	 * @return Boolen
	 */
	function UpdatePassword($data = array()){
		global $mysql,$_G,$MsgInfo;
		//判断用户id是否已经存在
		if (!IsExiest($data['user_id'])) {
			return "users_userid_empty";
		}
		if (!IsExiest($data['password'])) {
			return "users_password_empty";
		}
		$user_id= $data['user_id'];
		//判断用户是否存在
		$sql = "select username from `{users}` where `user_id`='{$user_id}'";
		$result= $mysql->db_fetch_array($sql);
		if ($result==false){
			return "users_user_not_exiest";
		}else{
			$username = $result['username'];
		}
		
		//修改密码
		$sql = "update {users} set `password` = '".md5($data['password'])."' where `user_id` ={$user_id}";
		$result = $mysql->db_query($sql);
		if ($result==false){
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "password";
			$admin_log["operating"] = "update";
			$admin_log["article_id"] = $user_id;
			$admin_log["result"] = 0;
			$admin_log["content"] = str_replace(array( '#username#'), array($username), $MsgInfo["users_update_password_error_msg"]);
			$admin_log["data"] =  $data;
			self::AddAdminLog($admin_log);
		}else{
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "password";
			$admin_log["operating"] = "update";
			$admin_log["article_id"] = $user_id;
			$admin_log["result"] = 1;
			$admin_log["content"] = str_replace(array( '#username#'), array($username), $MsgInfo["users_update_password_success_msg"]);
			$admin_log["data"] =  $data;
			self::AddAdminLog($admin_log);
		}
		return $result;
	}
	
	/**
	 * 4，修改用户密码
	 *
	 * @param Array data
	 * @return Boolen
	 */
	function UpdatePayPassword($data = array()){
		global $mysql,$_G,$MsgInfo;
		//判断用户id是否已经存在
		if (!IsExiest($data['user_id'])) {
			return "users_userid_empty";
		}
		if (!IsExiest($data['paypassword'])) {
			return "users_paypassword_empty";
		}
		
		$user_id= $data['user_id'];
		
		//判断用户是否存在
		$sql = "select * from `{users}` where `user_id`='{$user_id}'";
		$result= $mysql->db_fetch_array($sql);
		if ($result==false){
			return "users_user_not_exiest";
		}else{
			$username = $result['username'];
		}
		
		//修改密码
		$sql = "update {users} set `paypassword` = '".md5($data['paypassword'])."' where `user_id` = '{$user_id}'";
		$result = $mysql->db_query($sql);
		
		return $data['user_id'];
	}

	/**
	 * 5，修改用户邮箱
	 *
	 * @param Array data
	 * @return Boolen
	 */
	function UpdateEmail($data = array()){
		global $mysql,$_G,$MsgInfo;
		//判断用户id是否已经存在
		if (!IsExiest($data['user_id'])) {
			return "users_userid_empty";
		}
		//判断邮箱是否为空
		if (!IsExiest($data['email'])) {
			return "users_email_empty";
		}
		//判断其他邮箱是否已经存在
		if(self::CheckEmail(array("email"=>$data['email'],"user_id"=>$data['user_id']))) {
			return "users_email_exist";
		}
		//修改密码
		$sql = "update {users} set `email` = '".$data['email']."' where `user_id` = '{$data[user_id]}'";
		$result = $mysql->db_query($sql);
		if ($result==false){
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "email";
			$admin_log["operating"] = "update";
			$admin_log["article_id"] = $user_id;
			$admin_log["result"] = 0;
			$admin_log["content"] = str_replace(array( '#username#'), array($username), $MsgInfo["users_update_email_error_msg"]);
			$admin_log["data"] =  $data;
			self::AddAdminLog($admin_log);
		}else{
			//加入管理员操作记录
			$admin_log["user_id"] = $_G['user_id'];
			$admin_log["code"] = "users";
			$admin_log["type"] = "email";
			$admin_log["operating"] = "update";
			$admin_log["article_id"] = $user_id;
			$admin_log["result"] = 1;
			$admin_log["content"] = str_replace(array( '#username#'), array($username), $MsgInfo["users_update_email_success_msg"]);
			$admin_log["data"] =  $data;
			self::AddAdminLog($admin_log);
		}
		return $result;
	}
	
	/**
     * 6，获取用户基本表的信息（users）
     * @param $param array('user_id' => '会员ID')
	 * @return Array（'list'=>"列表",page=>'当前页面','epage'=>'页数','total_page'=>'总页面'）
     */
	function GetUsersList($data){
		global $mysql;
		$_sql = " where 1=1 ";
		
		//判断用户id
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and `user_id`  = '{$data['user_id']}'";
		}
		
		//判断是否搜索用户名
		if (IsExiest($data['username']) != false){
			$_sql .= " and `username` like '%{$data['username']}%'";
		}
		
		//判断是否搜索邮箱
		if (IsExiest($data['email']) != false){
			$_sql .= " and `email` like '%{$data['email']}%'";
		}
		
		$_select = "*";
		$_order = " order by user_id desc";
		$sql = "select SELECT from `{users}` SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}
	
	
	
	/**
	 * 10，用户登录
	 *
	 * @param array $data
	 * @return array
	 */
	function Login($data = array()){
		global $mysql,$MsgInfo;
		
		$user_id = isset($data['user_id'])?$data['user_id']:"";
		$username = isset($data['username'])?$data['username']:"";
		$password = isset($data['password'])?$data['password']:"";
		$email = isset($data['email'])?$data['email']:"";
		
		//如果密码为空
		if ($password == "")	return "users_password_empty";
		
		//检查邮箱，用户名，用户id和密码是否一致
		$sql = "select user_id from `{users}` as p1 where p1.`password` = '".md5($password)."' and (p1.email = '{$email}' or p1.user_id = '{$user_id}' or p1.username = '{$username}')";
		
		$result = $mysql->db_fetch_array($sql);
		
		if ($result == false){
			
			//加入用户操作记录
			$user_log["user_id"] = 0;
			$user_log["code"] = "users";
			$user_log["type"] = "action";
			$user_log["operating"] = "login";
			$user_log["article_id"] = 0;
			$user_log["result"] = 0;
			$user_log["content"] =  str_replace(array('#keywords#'), array($data['username']), $MsgInfo["users_login_error_msg"]);;
			usersClass::AddUsersLog($user_log);	
			
			return "users_login_error";
		}else{
			$user_id = $result['user_id'];
			
			//更新用户的登录信息
			$sql = "update `{users}` set logintime = logintime + 1,up_time=last_time,up_ip=last_ip,last_time='".time()."',last_ip='".ip_address()."' where username='$username'";
			$mysql->db_query($sql);
			
			//加入用户操作记录
			$user_log["user_id"] = $user_id;
			$user_log["code"] = "users";
			$user_log["type"] = "action";
			$user_log["operating"] = "login";
			$user_log["article_id"] = $user_id;
			$user_log["result"] = 1;
			$user_log["content"] =  $MsgInfo["users_login_success_msg"];
			usersClass::AddUsersLog($user_log);	
					
			return $user_id;
		}
	}
	
	/**
     * 11，添加用户的操作记录（users_log）
     * @param $param array('user_id' => '用户id','code' => '模块名称','type' => '所属分类,'operating' => '操作类型','article_id' => '操作id','result' => '操作结果','content' => '操作内容')
	 * @return Null
     */
	function AddUsersLog($data){
		global $mysql;
		$sql = "insert into `{users_log}` set  addtime='".time()."',addip='".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$mysql->db_query($sql);
	}
	
	
	/**
	 * 12，发送邮件
	 *
	 * @param string $data = array("user_id"=>"用户id，0表示系统发送","send_email"=>"发送的邮箱","title"=>"标题","email"=>"接收邮箱","msg"=>"内容","type"=>"邮件类型","status"=>"发送类型，0表示未发送，1表示已发送，2表示发送失败");
	 * @return boolen(true,false)
	 */
	function SendEmail($data = array()){
        global $mysql,$_G;
		
		require_once (ROOT_PATH . 'plugins/mail/mail.php');
		$user_id = 0;
		$email = "";
		if ($data['user_id']>0){
			$sql = "select email from `{users}` where user_id='{$data['user_id']}'";
			$result = $mysql->db_fetch_array($sql);
			$email = $result['email'];
			$user_id = $data['user_id']	;	
		}
		$title = isset($data['title'])?$data['title']:'系统信息';//邮件发送的标题
		$msg   = isset($data['msg'])?$data['msg']:'系统信息';//邮件发送的内容
		$type = isset($data['type'])?$data['type']:'system';//邮件发送的类型
		if ($data['email_info']==""){
			$var = array("con_email_host","con_email_url","con_email_auth","con_email_from","con_email_from_name","con_email_password","con_email_port","con_email_now");
			foreach ($var as $key => $value){
				$data['email_info'][$value] = $_G['system'][$value];	
			}
			$send_email = $data['email_info']['con_email_from'];
		}
		$email_info = isset($data['email_info'])?$data['email_info']:'';//邮件设置信息
		if ($_G['system']['con_email_now']==1 || $type=="set"){
			$result = Mail::Send($title,$msg, array($email),$email_info);
			$status = $result?1:2;
		}else{
			$status=0;
		}
        if ($email_info==""){
			$send_email = $_G['system']['con_email_from'];
		}else{
			$send_email = $email;
		}
		
		$mysql->db_query("insert into `{users_email_log}` set email='{$email}',send_email='{$send_email}',user_id='{$user_id}',title='{$title}',msg='{$msg}',type='{$type}',status='{$status}',addtime='".time()."',addip='".ip_address()."'");
		
		if ($status==1) return true;
		return false;
	}
	
	
	
	
	/**
     * 13,获取邮箱激活记录的信息（users_emali_active）
     * @param $param array('user_id' => '会员ID')
	 * @return Array（'list'=>"列表",page=>'当前页面','epage'=>'页数','total_page'=>'总页面'）
     */
	function GetEmailActiveList($data){
		global $mysql;
		$_sql = " where 1=1 ";
		
		//判断是否搜索用户名
		if (IsExiest($data['username']) != false){
			$_sql .= " and p2.`username` like '%{$data['username']}%'";
		}
		
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and p1.`user_id` = '{$data['user_id']}'";
		}
		
		//判断是否搜索邮箱
		if (IsExiest($data['email']) != false){
			$_sql .= " and p1.`email` like '%{$data['email']}%'";
		}
		
		$_select = "p1.*,p2.username";
		$_order = " order by id desc";
		$sql = "select SELECT from `{users_email_active}` as p1 left join `{users}` as p2 on p1.user_id=p2.user_id SQL ORDER LIMIT";
		
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}
	
	
	/**
     * 14,获邮箱操作记录的信息（users_email_log）
     * @param $param array('username' => '用户名'，'email' => '邮箱')
	 * @return Array（'list'=>"列表",page=>'当前页面','epage'=>'页数','total_page'=>'总页面'）
     */
	function GetEmailLogList($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		
		//判断是否搜索用户名
		if (IsExiest($data['username']) != false){
			$_sql .= " and p2.`username` like '%{$data['username']}%'";
		}
		
		//判断是否搜索邮箱
		if (IsExiest($data['email']) != false){
			$_sql .= " and p1.`email` like '%{$data['email']}%'";
		}
		
		$_select = "p1.*,p2.username";
		$_order = " order by id desc";
		$sql = "select SELECT from `{users_email_log}` as p1 left join `{users}` as p2 on p1.user_id=p2.user_id SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}
	
	function GetFriendsList($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and p1.`user_id` = '{$data['user_id']}'";
		}
		
		if (IsExiest($data['friends_userid']) != false){
			$_sql .= " and p1.`friends_userid` = '{$data['friends_userid']}'";
		}
		
		$_select = "p1.*,p2.username,p3.username as friendname";
		$_order = " order by p1.id desc";
		$sql = "select SELECT from `{users_friends}` as p1 left join `{users}` as p2 on p1.user_id=p2.user_id left join `{users}` as p3 on p1.friends_userid = p3.user_id SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}
	/**
	 * 15，查看用户
	 *
	 * @param Array $data = array("user_id"=>"用户id","username"=>"用户名","email"=>"邮箱")
	 * @return Array
	 */
	static function GetUsers($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		//判断用户id
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and p1.`user_id`  = '{$data['user_id']}'";
		}
		
		//判断是否搜索用户名
		elseif (IsExiest($data['username']) != false){
			$_sql .= " and p1.`username` like '{$data['username']}'";
		}
		
		//判断是否搜索邮箱
		elseif (IsExiest($data['email']) != false){
			$_sql .= " and p1.`email` like '{$data['email']}'";
		}
		
		$_select = "*";
		$sql = "select SELECT  from `{users}` as p1 SQL";
		return $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL'), array($_select, $_sql), $sql));
		return $result;
	}
	
	
	
	function GetLoginLog($data = array()){
		global $mysql;

		if (!IsExiest($data['user_id'])) return "false";
		
		$_select = "*";
		$sql = "select SELECT from `{users_log}` where user_id={$data['user_id']} ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array($_select, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'ORDER', 'LIMIT'), array('count(1) as num','', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}
	
	/**
	 * 16，查看邮箱记录的单独一条记录
	 *
	 * @param Array $data['id']
	 * @return Array
	 */
	function GetUsersEmailLog($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		//判断id
		if (IsExiest($data['id']) != false){
			$_sql .= " and p1.`id`  = '{$data['id']}'";
		}
		
		$_select = "*";
		$sql = "select SELECT  from `{users_email_log}` as p1 SQL";
		return $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL'), array($_select, $_sql), $sql));
		return $result;
	}
	
	/**
     * 17,激活邮箱
     * @param $param array('user_id' => '会员ID')
	 * @return bool true/false
     */
     function ActiveUsersEmail ($data = array()) {
        global $mysql;
		$user_id = isset($data['user_id'])?$data['user_id']:'';
        if (empty($user_id)) return "users_active_error";
		//搜索用户的邮箱
		$sql = "select * from `{users}` where user_id='{$data['user_id']}'";
		$result = $mysql->db_fetch_array($sql);
		$email = $result['email'];
		
		//判断是否已经激活
		$sql = "select * from `{users_email_active}` where user_id='{$data['user_id']}' and email='{$email}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$sql = "insert into `{users_email_active}` set email='{$email}',user_id='{$user_id}',status=1,addtime='".time()."',addip='".ip_address()."'";
			$mysql->db_query($sql);
			return "users_active_success";
		}else{
			return "users_active_yes";
		}
    }
	
	/**
     * 18，获取管理员管理的信息（users_adminlog）
     * @param $param array('user_id' => '会员ID')
	 * @return Array（'list'=>"列表",page=>'当前页面','epage'=>'页数','total_page'=>'总页面'）
     */
	function GetUserslogList($data){
		global $mysql;
		$_sql = " where 1=1 ";
		
		//判断用户id
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and p1.`user_id`  in('{$data['user_id']}')";
		}
		
		//判断是否搜索用户名
		if (IsExiest($data['username']) != false){
			$_sql .= " and p2.`username` like '%{$data['username']}%'";
		}
		
		//判断是否搜索邮箱
		if (IsExiest($data['email']) != false){
			$_sql .= " and p2.`email` like '%{$data['email']}%'";
		}
		
		$_select = "p1.*,p2.username";
		$_order = " order by id desc";
		$sql = "select SELECT from `{users_log}` as p1 left join `{users}` as p2 on p1.user_id=p2.user_id SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}
	

	
	/**
	 * 5,获得用户用户类型列表
	 *
	 * @return Array
	 */
	function GetUserid($data = array()){
		global $mysql;
		
		
		$_sql = " where 1=1 ";
		
		//搜索用户id
        if (IsExiest($data['user_id'])!=false) {
            $_sql .= " and p2.user_id ='{$data['user_id']}'";
        }
		
		//搜索用户名
		elseif (IsExiest($data['username'])!=false) {
            $_sql .= " and p2.username = '{$data['username']}'";
        }
		
		//搜索用户名
		elseif (IsExiest($data['email'])!=false) {
            $_sql .= " and p2.email = '{$data['email']}'";
        }
		
		$sql = "select p2.user_id from `{users}` as p2 {$_sql}";
		$result = $mysql -> db_fetch_array($sql);
		if ($result == false  || (!IsExiest($data['username']) && !IsExiest($data['user_id']) && !IsExiest($data['email']))){
			return "users_empty";
		}
		return $result['user_id'];
	}
	
	/**
	 * 添加审核	
	 *
	 * @param array $data =array("user_id"=>"用户id","code"=>"模块","type"=>"类型","article_id"=>"文章id","verify_userid"=>"审核人","remark"=>"备注");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function AddExamine($data = array()){
		global $mysql;
		
		$sql = "insert into `{examines}` set addtime='".time()."',addip='".ip_address()."',";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql));
    	return $mysql->db_insert_id();
	}
	
	
	/**
	 * 获得审核列表
	 *
	 * @return Array
	 */
	function GetExamineList($data = array()){
		global $mysql;
		
		
		$_sql = " where 1=1 ";
		
		if (IsExiest($data['username'])!=false) {
            $_sql .= " and p2.username like '%{$data['username']}%'";
        }
		
		$_select = " p1.*,p2.username ";
		$_order = " order by p1.id desc";
		$sql = "select SELECT from `{examines}` as p1 left join `{users}` as p2 on p2.user_id=p1.verify_userid SQL ORDER ";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	
	/**
	 * 1,添加用户类型
	 *
	 * @param array $data =array("name"=>"用户类型名称","status"=>"状态","degree"=>"学历","in_year"=>"入学时间","professional"=>"专业");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function AddUsersType($data = array()){
		global $mysql;
		 //判断名称是否存在
        if (!IsExiest($data['name'])) {
            return "users_type_name_empty";
        }
		 //判断标识名是否存在
        if (!IsExiest($data['nid'])) {
            return "users_type_nid_empty";
        }
		if ($data['checked']==1){
			$sql = "update `{users_type}` set `checked`=0";
			$mysql->db_query($sql);
		}
		//判断标识名是否存在
		$sql = "select 1 from `{users_type}` where nid='{$data['nid']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=false) return "users_type_nid_exiest";
		
		$sql = "insert into `{users_type}` set addtime='".time()."',addip='".ip_address()."',";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql));
    	return $mysql->db_insert_id();
	}
	
	/**
	 * 2,修改用户类型
	 *
	 * @param array $data =array("id"=>"id","name"=>"名称","status"=>"状态");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function UpdateUsersType($data = array()){
		global $mysql;
		
		 //判断名称是否存在
        if (!IsExiest($data['name'])) {
            return "users_type_name_empty";
        }
		 //判断标识名是否存在
        if (!IsExiest($data['nid'])) {
            return "users_type_nid_empty";
		}
		
		//判断标识名是否存在
		$sql = "select 1 from `{users_type}` where nid='{$data['nid']}' and id!={$data['id']}";
		$result = $mysql->db_fetch_array($sql);
		if ($result!=false) return "users_type_nid_exiest";
		
		if ($data['checked']==1){
			$sql = "update `{users_type}` set `checked`=0";
			$mysql->db_query($sql);
		}
		
		$sql = "update `{users_type}` set ";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql)." where id='{$data['id']}' ");
		return $data['id'];
	}
	
	/**
	 * 3,删除用户类型
	 *
	 * @param Array $data = array("id"=>"ID")
	 * @return Boolen
	 */
	function DelUsersType($data = array()){
		global $mysql;
		
		if (!IsExiest($data['id'])) return "users_type_id_empty";
		
		$sql = "select 1 from `{users_info}` where type_id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result != false) return "users_type_upfiles_exiest";
		
		$sql = "delete from `{users_type}`  where id='{$data['id']}'";
    	$mysql -> db_query($sql);
		
		return $data['id'];
	}
	
	function DelFriends($data = array()){
		global $mysql;
		
		$sql = "delete from `{users_friends}`  where user_id={$data['user_id']} and friends_userid={$data['friends_userid']}";
    	
		return $mysql -> db_query($sql);
		
	}
	
	
	/**
	 * 3,修改用户的默认值
	 *
	 * @param Array $data = array("id"=>"ID")
	 * @return Boolen
	 */
	function UpdateUsersTypeChecked($data = array()){
		global $mysql;
		
		if (!IsExiest($data['id'])) return "users_type_id_empty";
		
		$sql = "update `{users_type}` set `checked`=0 ";
		$result = $mysql->db_query($sql);
		
		$sql = "update`{users_type}` set `checked`=1  where id='{$data['id']}'";
    	$mysql -> db_query($sql);
		return $data['id'];
	}
	
	
	
	/**
	 * 5,获得用户类型列表
	 *
	 * @return Array
	 */
	function GetUsersTypeList($data = array()){
		global $mysql;
		
		$_sql = " where 1=1 ";
		$_select = " p1.*";
		$_order = " order by p1.checked desc ,p1.`order` desc,p1.id desc";
		$sql = "select SELECT from `{users_type}` as p1  SQL ORDER ";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data["epage"] * ($data["page"] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	
	
	/**
	 * 6,获得用户类型的单条记录
	 *
	 * @param Array $data = array("id"=>"");
	 * @return Array
	 */
	 function GetUsersTypeOne($data = array()){
		global $mysql;
		
		if (!IsExiest($data['id'])) return "users_type_id_empty";
		
		$sql = "select p1.* from `{users_type}` as p1   where p1.id='{$data['id']}'";
		$result = $mysql->db_fetch_array($sql);
		
		if ($result==false) return "users_type_empty";
		return $data['user_id'];
	}
	
	function GetEmailActiveOne($data = array()){
		global $mysql;
		
		if (!IsExiest($data['user_id'])) return "users_user_id_empty";
		
		$sql = "select p1.* from `{users_email_active}` as p1   where p1.user_id='{$data['user_id']}'";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false) return false;
		return $result;
	}
	
	
	/**
	 * 7,获得默认用户类型
	 *
	 * @param Array $data = array("id"=>"");
	 * @return Array
	 */
	 function GetUsersTypeCheck(){
		global $mysql;
		$sql = "select p1.* from `{users_type}` as p1   where p1.checked=1";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false) return "users_type_empty";
		return $result;
	}
	
	
	
	
	/**
	 * 1,修改用户基本信息
	 *
	 * @param array $data =array("id"=>"id","name"=>"名称","status"=>"状态");
	 * @param string $data;
	 * @return boolen(true,false)
	 */
	function UpdateUsersInfo($data = array()){
		global $mysql;
		
		 //判断名称是否存在
        if (!IsExiest($data['user_id'])) {
            return "users_info_userid_empty";
        }
		
		//判断标识名是否存在
		$sql = "select 1 from `{users_info}` where user_id='{$data['user_id']}' ";
		$result = $mysql->db_fetch_array($sql);
		if ($result==false){
			$sql = "insert into `{users_info}` set user_id={$data['user_id']}";
			$mysql->db_query($sql);
		}
		
		$sql = "update `{users_info}` set ";
		foreach($data as $key => $value){
			$_sql[] = "`$key` = '$value'";
		}
        $mysql->db_query($sql.join(",",$_sql)." where user_id='{$data['user_id']}' ");
		return $data['user_id'];
	}
	
	
	/**
	 * 5,获得用户类型列表
	 *
	 * @return Array
	 */
	function GetUsersInfoList($data = array()){
		global $mysql;
		
		$_sql = " where 1=1 ";
		$_select = " p1.*,p2.username,p3.`name` as type_name,p4.status as vip_status";
		$_order = " order by p1.id desc";
		$sql = "select SELECT from `{users_info}` as p1  left join `{users}` as p2 on p1.user_id=p2.user_id 
		left join `{users_type}` as p3 on p1.type_id=p3.id
		left join `{users_vip}` as p4 on p1.user_id=p4.user_id
		SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data["epage"] * ($data["page"] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	
	/**
	 * 5,获得用户信息
	 *
	 * @return Array
	 */
	static function GetUsersInfo($data = array()){
		global $mysql;
		 //判断用户ID是否存在
        if (!IsExiest($data['user_id'])) {
            return "users_info_userid_empty";
        }
		$sql = "select p1.*,p2.username from `{users_info}` as p1 left join `{users}` as p2 on p1.user_id=p2.user_id  where p1.user_id='{$data['user_id']}'";
		return $mysql->db_fetch_array($sql);
		
	}
	
	/**
     * 获得好友的动态
     * @param $param array('user_id' => '会员ID')
	 * @return bool true/false
     */
	public static function GetUsersFriendsLog($data = array()){
		global $mysql;
		
		$sql = "select friends_userid  from `{users_friends}` where user_id={$data['user_id']} and status=1";
		$result = $mysql->db_fetch_arrays($sql);
			
		$_friend_userid = "";
		if ($result!=false){
			foreach ($result as $key => $value){
				$_friend_userid[] = $value['friends_userid'];
			}
		
			if ($_friend_userid!=""){
				$friend_userid = join(",",$_friend_userid);
			}
			$result =  self::GetUserslogList(array("user_id"=>$friend_userid));
			return $result;
		}
		
		return "";
	}
	
	//增加举报
	function AddRebut($data){
		global $mysql;
		if (!IsExiest($data['user_id'])) {
            return false;
        }
		$sql = "insert into `{users_rebut}` set  addtime='".time()."',addip='".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$mysql->db_query($sql);
	}
	
	function AddCare($data){
		global $mysql;
		$sql = "insert into `{users_care}` set  addtime='".time()."',addip='".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$mysql->db_query($sql);
	}
	
	function AddBlack($data){
		global $mysql;
		$result = $mysql->db_fetch_arrays("select * from `{users_black}` where user_id = {$data['user_id']} and blackuser = {$data['blackuser']}");
		if ($result) return -2;
		$sql = "insert into `{users_black}` set  addtime='".time()."',addip='".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$mysql->db_query($sql);
	}
	
	function GetFriendsInvite($data){
		global $mysql;
		$_sql = " where 1=1 ";
		
		//判断用户id
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and p1.`user_id`  = '{$data['user_id']}'";
		}
		
		if (IsExiest($data['friends_userid']) != false){
			$_sql .= " and p1.`friends_userid`  = '{$data['friends_userid']}'";
		}
		
		if (IsExiest($data['status']) != false){
			$_sql .= " and p1.`status`  = '{$data['status']}'";
		}
		
		if (IsExiest($data['type']) != false){
			$_sql .= " and p1.`type`  = '{$data['type']}'";
		}
		
		$_select = "p1.*,p2.username,p3.username as friend_username,p3.reg_time as friend_reg_time";
		$sql = "select SELECT from `{users_friends_invite}` as p1
				left join `{users}` as p2 on p1.user_id = p2.user_id
				left join `{users}` as p3 on p1.friends_userid = p3.user_id
				SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		return $result;
	}
	
	function AddFriends($data){
		global $mysql;
		$result = $mysql->db_fetch_array("select * from `{users_friends}` where user_id = {$data['user_id']} and friends_userid = {$data['friends_userid']}");
		if($result==true) return -2;
		$sql = "insert into `{users_friends}` set  addtime='".time()."',addip='".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		return $mysql->db_query($sql);
	}
	
	function GetCareList($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		
		//判断用户id
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and p1.`user_id`  = '{$data['user_id']}'";
		}
		
		//判断是否搜索用户名
		if (IsExiest($data['article_id']) != false){
			$_sql .= " and p1.`article_id` = '{$data['article_id']}'";
		}
		//判断是否搜索邮箱
		if (IsExiest($data['code']) != false){
			$_sql .= " and p1.`code` like '%{$data['code']}%'";
		}
		
		$_select = "p1.*,p2.*,p3.username";
		$sql = "select SELECT from `{users_care}` as p1
				left join `{borrow}` as p2 on p1.article_id = p2.borrow_nid
				left join `{users}` as p3 on p1.user_id = p3.user_id
				SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}
	
	function GetBlackList($data = array()){
		global $mysql;
		$_sql = " where 1=1 ";
		
		//判断用户id
		if (IsExiest($data['user_id']) != false){
			$_sql .= " and p1.`user_id`  = '{$data['user_id']}'";
		}
		
		//判断是否搜索用户名
		if (IsExiest($data['blackuser']) != false){
			$_sql .= " and p1.`blackuser` = '{$data['blackuser']}'";
		}
		//判断是否搜索邮箱
		if (IsExiest($data['code']) != false){
			$_sql .= " and p1.`code` like '%{$data['code']}%'";
		}
		
		$_select = "p1.*,p2.username,p3.username as blackuser,p3.user_id as blackuser_id";
		$sql = "select SELECT from `{users_black}` as p1
				left join `{users}` as p2 on p1.user_id = p2.user_id
				left join `{users}` as p3 on p1.blackuser = p3.user_id
				SQL ORDER LIMIT";
		
		//是否显示全部的信息
		if (IsExiest($data['limit'])!=false){
			if ($data['limit'] != "all"){ $_limit = "  limit ".$data['limit']; }
			return $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array($_select, $_sql, $_order, $_limit), $sql));
		}			 
		
		//判断总的条数
		$row = $mysql->db_fetch_array(str_replace(array('SELECT', 'SQL', 'ORDER', 'LIMIT'), array('count(1) as num', $_sql,'', ''), $sql));
		$total = intval($row['num']);
		
		//分页返回结果
		$data['page'] = !IsExiest($data['page'])?1:$data['page'];
		$data['epage'] = !IsExiest($data['epage'])?10:$data['epage'];
		$total_page = ceil($total / $data['epage']);
		$_limit = " limit ".($data['epage'] * ($data['page'] - 1)).", {$data['epage']}";
		$list = $mysql->db_fetch_arrays(str_replace(array('SELECT', 'SQL','ORDER', 'LIMIT'), array($_select,$_sql,$_order, $_limit), $sql));
		
		//返回最终的结果
		$result = array('list' => $list?$list:array(),'total' => $total,'page' => $data['page'],'epage' => $data['epage'],'total_page' => $total_page);
		
		return $result;
	}

	
}
?>