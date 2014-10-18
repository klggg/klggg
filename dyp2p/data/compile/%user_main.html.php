<? $this->magic_include(array('file' => "header_user_main.html", 'vars' => array()));?>
<? $this->magic_vars['query_type']='GetEmailActiveOne';$data = array('user_id'=>$this->magic_vars['_G']['user_id']);$default = '';  include_once(ROOT_PATH.'modules/users/users.class.php');$this->magic_vars['magic_result'] = usersClass::GetEmailActiveOne($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_result = $this->magic_vars['magic_result']; if (!is_array($_result) && !is_object($_result)) {$_result =array(); } if (count($_result)>0):
;$this->magic_vars['var']=$_result;?>
<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']!=1): ?><script>alert("您还没有激活邮箱，不能发布借款信息！");location.href='/index.php?user&q=reg&type=email';</script><? endif; ?>
<? else:echo $default; endif; unset($_result);unset($this->magic_vars['']);unset($_magic_vars); ?>

  
  
  <div class="bodyer clearfix">
            	<div class="vipcenter box1000">
                <? $this->magic_include(array('file' => "user_menu.html", 'vars' => array()));?>
                	
                    <dl class="vipcenter_right">
					<dt class="hh_top">
						 <? $data = array('var'=>'var','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['var'] = accountClass::GetOne($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
						 可用余额：<font color="#ff6600">￥<? if (!isset($this->magic_vars['var']['balance'])) $this->magic_vars['var']['balance'] = '';$_tmp = $this->magic_vars['var']['balance'];$_tmp = $this->magic_modifier("round",$_tmp,"2,3");$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></font>
						&nbsp;&nbsp;&nbsp; <a href="/?user&q=code/account/recharge_new"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/vipcenter_10.jpg" alt="充值" /></a>&nbsp; <a href="/?user&q=code/account/cash_new" ><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/vipcenter_12.jpg" alt="提现" /></a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 最近代收款金额：<font color="#ff6600">￥<? if (!isset($this->magic_vars['var']['await'])) $this->magic_vars['var']['await'] = '';$_tmp = $this->magic_vars['var']['await'];$_tmp = $this->magic_modifier("round",$_tmp,"2,3");$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></font><? unset($_magic_vars);unset($data); ?>
						</dt>
                    	<dt><span><a href="/?user&q=code/rating/basic">修改个人信息</a></span>我的个人信息 
						
						</dt>
                        <dd>
                        	<div class="Personal">
                            	<div class="Personal_mg"><a href="/?user&q=code/users/avatar" title="点击修改头像"><img src="<? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id'] = '';$_tmp = $this->magic_vars['_G']['user_id'];$_tmp = $this->magic_modifier("avatar",$_tmp,"");echo $_tmp;unset($_tmp); ?>" width="100" height="100" /></a></div>
                  				<div class="Personal_tl">
                                	<p><b><? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?></b>，欢迎您! <? $data = array('var'=>'Cvar','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['Cvar'] = borrowClass::GetBorrowCredit($data);if(!is_array($this->magic_vars['Cvar'])){ $this->magic_vars['Cvar']=array();}?>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>信用等级：</strong><? if (!isset($this->magic_vars['Cvar']['approve_credit'])) $this->magic_vars['Cvar']['approve_credit'] = '';$_tmp = $this->magic_vars['Cvar']['approve_credit'];$_tmp = $this->magic_modifier("credit",$_tmp,"credit");echo $_tmp;unset($_tmp); ?>
                     <? unset($_magic_vars);unset($data); ?></p>
                              <p><strong>用户类型：</strong><? $data = array('var'=>'Vvar','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/users/users.class.php');$this->magic_vars['Vvar'] = usersClass::GetUsersVip($data);if(!is_array($this->magic_vars['Vvar'])){ $this->magic_vars['Vvar']=array();}?>
				<? if (!isset($this->magic_vars['Vvar']['status'])) $this->magic_vars['Vvar']['status']=''; ;if (  $this->magic_vars['Vvar']['status']==1): ?>
					<? if (!isset($this->magic_vars['Vvar']['vip_type'])) $this->magic_vars['Vvar']['vip_type']=''; ;if (  $this->magic_vars['Vvar']['vip_type']==1): ?>
						<strong style="color:blue">Vip会员</strong>
					<? else: ?>
						<strong style="color:blue">高级Vip会员</strong>
					<? endif; ?>
				<? else: ?>
					普通会员&nbsp;<a href="/vip/index.html" style="color:#0000ff;">申请VIP</a>
				<? endif; ?>
			<? unset($_magic_vars);unset($data); ?></p>
            				  <p><strong>注册时间：</strong><? if (!isset($this->magic_vars['_G']['user_result']['reg_time'])) $this->magic_vars['_G']['user_result']['reg_time'] = '';$_tmp = $this->magic_vars['_G']['user_result']['reg_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>&nbsp;&nbsp;&nbsp;&nbsp;<strong>最后登录时间：</strong><? if (!isset($this->magic_vars['_G']['user_result']['last_time'])) $this->magic_vars['_G']['user_result']['last_time'] = '';$_tmp = $this->magic_vars['_G']['user_result']['last_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></p>
                                 <? $data = array('var'=>'var','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetUserCount($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
                              <p><strong>个人统计：</strong><b class="red"><? if (!isset($this->magic_vars['var']['borrow_times'])) $this->magic_vars['var']['borrow_times'] = '';$_tmp = $this->magic_vars['var']['borrow_times'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></b> 条借款记录&nbsp;&nbsp;&nbsp;&nbsp;<b class="red"><? if (!isset($this->magic_vars['var']['tender_times'])) $this->magic_vars['var']['tender_times'] = '';$_tmp = $this->magic_vars['var']['tender_times'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></b> 条投标记录</p><? unset($_magic_vars);unset($data); ?>
                            </div>
<div class="Personal_link">
                                	<p><strong>快捷通道</strong></p>
                      <p><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_17.jpg" width="24" height="20" style="margin-bottom:-4px;" /> <a href="/?user&q=code/account/recharge_new">账号充值</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_19.jpg" width="24" height="20" style="margin-bottom:-4px;" /> <a href="/?user&q=code/account/cash_new">申请提现</a></p>
                      <p><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_26.jpg" width="24" height="19" style="margin-bottom:-4px;" /> <a href="/?user&q=code/account/tender_count">投资记录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_25.jpg" width="24" height="21" style="margin-bottom:-4px;" /> <a href="/?user&q=code/borrow/repaylog">借款统计</a></p>
                    </div>
                          </div>
                            <dl class="mation">
                            	<dt><strong></strong>安全中心</dt>
                                <dd>
                                	<ul>
      
                                    	<li><strong>邮箱认证：</strong>  <? if (!isset($this->magic_vars['_G']['user_info']['email_status'])) $this->magic_vars['_G']['user_info']['email_status']=''; ;if (  $this->magic_vars['_G']['user_info']['email_status']==1): ?><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_35.gif" width="36" height="25" style="margin-bottom:-8px;" /> <? if (!isset($this->magic_vars['_G']['user_result']['email'])) $this->magic_vars['_G']['user_result']['email'] = ''; echo $this->magic_vars['_G']['user_result']['email']; ?><? else: ?><a href="/?user&q=code/approve/email_status"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_34.gif" width="36" height="25" style="margin-bottom:-8px;" /></a> 您还未进行邮箱认证<? endif; ?></li>
                                        <li><strong>手机认证：</strong>  <? if (!isset($this->magic_vars['_G']['user_info']['phone_status'])) $this->magic_vars['_G']['user_info']['phone_status']=''; ;if (  $this->magic_vars['_G']['user_info']['phone_status']==1): ?><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_33.gif" width="33" height="31" style="margin-bottom:-12px;" /> <? if (!isset($this->magic_vars['_G']['user_info']['phone'])) $this->magic_vars['_G']['user_info']['phone'] = ''; echo $this->magic_vars['_G']['user_info']['phone']; ?><? else: ?><a href="/borrow_phone/index.html"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_32.gif" width="33" height="31" style="margin-bottom:-12px;" /></a> 您还未进行手机认证<? endif; ?></li>
                                        <li><strong>身份认证：</strong> <? if (!isset($this->magic_vars['_G']['user_info']['realname_status'])) $this->magic_vars['_G']['user_info']['realname_status']=''; ;if (  $this->magic_vars['_G']['user_info']['realname_status']==1): ?><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_43.gif" width="36" height="26" style="margin-bottom:-8px;" /> <? if (!isset($this->magic_vars['_G']['user_info']['realname'])) $this->magic_vars['_G']['user_info']['realname'] = ''; echo $this->magic_vars['_G']['user_info']['realname']; ?><? else: ?><a href="/borrow_app/index.html"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_42.gif" width="36" height="26" style="margin-bottom:-8px;" /> </a>您还未进行身份认证<? endif; ?></li>
                                        <li><strong>视频认证：</strong>  <? if (!isset($this->magic_vars['_G']['user_info']['video_status'])) $this->magic_vars['_G']['user_info']['video_status']=''; ;if (  $this->magic_vars['_G']['user_info']['video_status']==1): ?><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_41.gif" width="33" height="29" style="margin-bottom:-10px;" /> 您已经进行视频认证<? else: ?><a href="/borrow_video/index.html"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/zhuliu/images/center_40.gif" width="33" height="29" style="margin-bottom:-10px;" /> </a>您还未进行视频认证<? endif; ?></li>
                                    </ul>
                                </dd>
                            </dl>
                            <dl class="mation">
                            	<dt><strong></strong>账户概况</dt>
                                <dd>
                                
                                <? $data = array('var'=>'var','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['var'] = accountClass::GetOne($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
									<p><span>账户总额: <strong>￥<? if (!isset($this->magic_vars['var']['total'])) $this->magic_vars['var']['total'] = '';$_tmp = $this->magic_vars['var']['total'];$_tmp = $this->magic_modifier("round",$_tmp,"2,3");$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></strong></span><span>可用余额: <strong>￥<? if (!isset($this->magic_vars['var']['balance'])) $this->magic_vars['var']['balance'] = '';$_tmp = $this->magic_vars['var']['balance'];$_tmp = $this->magic_modifier("round",$_tmp,"2,3");$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></strong></span><span>冻结余额: <strong>￥<? if (!isset($this->magic_vars['var']['frost'])) $this->magic_vars['var']['frost'] = '';$_tmp = $this->magic_vars['var']['frost'];$_tmp = $this->magic_modifier("round",$_tmp,"2,3");$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></strong></span></p>
                                    <p><span>待收金额: <strong>￥<? if (!isset($this->magic_vars['var']['await'])) $this->magic_vars['var']['await'] = '';$_tmp = $this->magic_vars['var']['await'];$_tmp = $this->magic_modifier("round",$_tmp,"2,3");$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></strong></span>
                                    <span>提现成功总额: <strong>￥<? if (!isset($this->magic_vars['var']['account_log']['cash_success']['account'])) $this->magic_vars['var']['account_log']['cash_success']['account'] = '';$_tmp = $this->magic_vars['var']['account_log']['cash_success']['account'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>(<? if (!isset($this->magic_vars['var']['account_log']['cash_success']['num'])) $this->magic_vars['var']['account_log']['cash_success']['num'] = '';$_tmp = $this->magic_vars['var']['account_log']['cash_success']['num'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>笔)</strong></span>
                                     <? unset($_magic_vars);unset($data); ?>
                                     <? $data = array('user_id'=>$this->magic_vars['_G']['user_id'],'var'=>'var');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetRechargeCount_log($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
                                    <span>充值成功总额: <strong>￥<? if (!isset($this->magic_vars['var']['recharge_all'])) $this->magic_vars['var']['recharge_all'] = '';$_tmp = $this->magic_vars['var']['recharge_all'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></strong></span></p>
                                   
                                    <p><span>在线充值总额: <strong>￥<? if (!isset($this->magic_vars['var']['recharge_all_up'])) $this->magic_vars['var']['recharge_all_up'] = '';$_tmp = $this->magic_vars['var']['recharge_all_up'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></strong></span><span>线下充值总额: <strong>￥<? if (!isset($this->magic_vars['var']['recharge_all_down'])) $this->magic_vars['var']['recharge_all_down'] = '';$_tmp = $this->magic_vars['var']['recharge_all_down'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></strong></span><span>手动充值总额: <strong>￥<? if (!isset($this->magic_vars['var']['recharge_all_other'])) $this->magic_vars['var']['recharge_all_other'] = '';$_tmp = $this->magic_vars['var']['recharge_all_other'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?></strong></span></p> 
                                    
                                    <? unset($_magic_vars);unset($data); ?>
                                    
                                   <? $data = array('var'=>'Cvar','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['Cvar'] = borrowClass::GetBorrowCredit($data);if(!is_array($this->magic_vars['Cvar'])){ $this->magic_vars['Cvar']=array();}?>
				                   <? $data = array('user_id'=>$this->magic_vars['_G']['user_id'],'var'=>'var');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetAmountUsers($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?> 
                                    <p><span>信用额度: <strong><? if (!isset($this->magic_vars['var']['borrow_amount'])) $this->magic_vars['var']['borrow_amount']=''; ;if (  $this->magic_vars['var']['borrow_amount']< 0): ?>0<? else: ?><? if (!isset($this->magic_vars['var']['borrow_amount'])) $this->magic_vars['var']['borrow_amount'] = ''; echo $this->magic_vars['var']['borrow_amount']; ?><? endif; ?></strong></span><span>可用额度: <strong><? if (!isset($this->magic_vars['var']['borrow_amount_use'])) $this->magic_vars['var']['borrow_amount_use']=''; ;if (  $this->magic_vars['var']['borrow_amount_use']< 0): ?>0<? else: ?><? if (!isset($this->magic_vars['var']['borrow_amount_use'])) $this->magic_vars['var']['borrow_amount_use'] = ''; echo $this->magic_vars['var']['borrow_amount_use']; ?><? endif; ?></strong></span></p>
                                    <? unset($_magic_vars);unset($data); ?>
				                    <? unset($_magic_vars);unset($data); ?>
                                    
                                
                                
                                </dd>
                            </dl>
                            
                            <? $data = array('user_id'=>$this->magic_vars['_G']['user_id'],'var'=>'item');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['item'] = borrowClass::GetUserCount($data);if(!is_array($this->magic_vars['item'])){ $this->magic_vars['item']=array();}?>
                            <dl class="mation">
                            	<dt><strong></strong><span><a href="/?user&q=code/account/tender_count">投资统计</a></span>收益详情</dt>
                                <dd>
									<p><span>已赚利息: <strong><? if (!isset($this->magic_vars['item']['tender_interest_yes'])) $this->magic_vars['item']['tender_interest_yes'] = '';$_tmp = $this->magic_vars['item']['tender_interest_yes'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span><span>已赚罚息: <strong><? if (!isset($this->magic_vars['item']['all_late_interest'])) $this->magic_vars['item']['all_late_interest'] = '';$_tmp = $this->magic_vars['item']['all_late_interest'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span><span>已赚违约金

: <strong><? if (!isset($this->magic_vars['item']['weiyue'])) $this->magic_vars['item']['weiyue'] = '';$_tmp = $this->magic_vars['item']['weiyue'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span></p>
                                    <p><span>已赚奖励: <strong><? if (!isset($this->magic_vars['item']['award_add'])) $this->magic_vars['item']['award_add'] = '';$_tmp = $this->magic_vars['item']['award_add'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span><span>待回收本息: <strong><? if (!isset($this->magic_vars['item']['tender_recover_wait'])) $this->magic_vars['item']['tender_recover_wait'] = '';$_tmp = $this->magic_vars['item']['tender_recover_wait'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span><span>已回收本息: <strong><? if (!isset($this->magic_vars['item']['tender_recover_yes'])) $this->magic_vars['item']['tender_recover_yes'] = '';$_tmp = $this->magic_vars['item']['tender_recover_yes'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span></p>
                                    
                                </dd>
                            </dl>
                            <? unset($_magic_vars);unset($data); ?>
                            <? $data = array('user_id'=>$this->magic_vars['_G']['user_id'],'var'=>'item');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['item'] = borrowClass::GetUserCount($data);if(!is_array($this->magic_vars['item'])){ $this->magic_vars['item']=array();}?>
                            <dl class="mation">
                            	<dt><strong></strong><span><a href="/?user&q=code/borrow/repaylog">借款统计</a></span>借款详情</dt>
                                <dd>
									<p><span>借款总额: <strong><? if (!isset($this->magic_vars['item']['borrow_account'])) $this->magic_vars['item']['borrow_account'] = '';$_tmp = $this->magic_vars['item']['borrow_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span><span>发布借款笔数: <strong><? if (!isset($this->magic_vars['item']['borrow_times'])) $this->magic_vars['item']['borrow_times'] = '';$_tmp = $this->magic_vars['item']['borrow_times'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?> 笔</strong></span><span>已还本息: <strong><? if (!isset($this->magic_vars['item']['borrow_repay_yes'])) $this->magic_vars['item']['borrow_repay_yes'] = '';$_tmp = $this->magic_vars['item']['borrow_repay_yes'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span><span>待还本息: <strong><? if (!isset($this->magic_vars['item']['borrow_repay_wait'])) $this->magic_vars['item']['borrow_repay_wait'] = '';$_tmp = $this->magic_vars['item']['borrow_repay_wait'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?>元</strong></span></p>
                                   
                                
                                    
                                </dd>
                            </dl>
                             <? unset($_magic_vars);unset($data); ?>
                        </dd>
                  </dl>
                </div>
            </div>
<? $this->magic_include(array('file' => "user_footer.html", 'vars' => array()));?>
