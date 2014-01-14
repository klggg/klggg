/*
2010-8-14 11:31
城市->慈善会
@version    $Id: $


一、
	http://k11.bizlife.com.cn/charity/charity_endow.php
	1.得到捐款金额    单位可为千G
	2.输入金额，间隔时间
	3.提交循环

0|||董事长：<br/><br/>请输入正确的捐款金额。
0|||董事长:<br/><br/>很抱歉，捐赠慈善会的金额不能小于2,500,000G。
1|||董事长:<br/><br/>您成功捐赠2,500,000G币给慈善会，获得了12点贡献度，慈善会感谢您的大力支持！|||1015

慈善会
http://k11.bizlife.com.cn/charity/index.php
http://k11.bizlife.com.cn/charity/charity_endow.php



*/


Tools.initNameSpace("biz.city");

//慈善操作
biz.city.charity= {

	//下次运行时间
	m_nextTime : 0,

	//捐赠最小得金额
	m_min_cash : 0,
	
	//公司现金
	m_company_cash : 0,

	//运行次数统计
	m_run_count : 0,

	//加载
	load: function(){

		if(!biz_check())
			return false;

		var server_url	= biz_current_server_url()+'/charity/charity_endow.php';
		var response_html	= HttpRequest.Get(server_url);
		if(!response_html || response_html == 'false' || response_html.length < 300)
		{
			return false;
		}

		/*
			var cfg_min_cash=2500000;//捐赠最小得金额
			var company_cash=113478550;//公司现金
		*/
		var myregexp = /var[\s]+cfg_min_cash=([0-9]+);[\s\S]+?var[\s]+company_cash=([0-9]+);/g;

		var match = myregexp.exec(response_html);
		if (match == null) {
			return false;
		}

		//捐赠最小得金额
		this.m_min_cash	 = parseInt(match[1]);
		
		//公司现金
		this.m_company_cash		= parseInt(match[2]);
		
		$("#city_charity_remark").html('捐赠最小得金额: '+this.m_min_cash + ' 公司现金: '+this.m_company_cash);
		$("#city_charity_endow_cash").val(this.m_min_cash)
	},

	//点击运行
	runClick: function(){

		if(this.m_min_cash < 1)
			this.load();

		//当前已在运行,停止掉
		if(g_interval['city_charity_time'])
		{
			this.stop();
			return true;
		}

		//> 捐赠最小得金额   <公司现金
		var city_charity_endow_cash	= parseInt($("#city_charity_endow_cash").val());
		if((city_charity_endow_cash < this.m_min_cash) || (city_charity_endow_cash > this.m_company_cash))
		{
			biz_show_process("<span style='color:red'>慈善会捐赠 </span>: 捐赠金额请在 "+this.m_min_cash+" 到 "+this.m_company_cash+" 之间");
			alert("捐赠金额请在 "+this.m_min_cash+" 到 "+this.m_company_cash+" 之间");
			return false;

		}
		
		biz_show_process("<span style='color:red'>慈善会捐赠 </span>: START");
		$('#biz_city_charity_click_button').val('自动慈善会捐赠中,点击停止.'); 
		g_interval['city_charity_time']	 = true;
		this.autoRun();

	},

	//依次自动运行
	autoRun: function(){


		//先得到参数 捐赠金额：  G币 重复次数:  间隔时间:  分
		var city_charity_endow_cash	= parseInt($("#city_charity_endow_cash").val());
		var repeats	= parseInt($("#city_charity_repeats").val());
		var next_run_time	= parseInt($("#city_charity_interval_time").val()) ;

		//已全部执行完，停止掉。
		if(this.m_run_count >= repeats)
		{
			biz_show_process("<span style='color:blue'>慈善会捐赠</span> 结束,共运行"+this.m_run_count+"次" );
			this.stop();
			return true;
		}

		//运行当前任务
		var run_result	= this.run(city_charity_endow_cash);

		//失败了,直接运行下一个
		if(!run_result)
		{
			next_run_time = 30;
		}
		else
		{
			//运行次数++
			this.m_run_count++;
		}

		biz_show_process("<span style='color:blue'>慈善会捐赠</span>:  【 "+Tools.seconds2timestr(next_run_time)+'   后再次启动】' );

		//过指定的时间后再运行
		g_interval['city_charity_time']	= window.setTimeout(function()
		{
			biz.city.charity.autoRun(); 
			
		}, 1000 * next_run_time );
		//显示倒计时状态
		this.showRemainTime(next_run_time);



	},

	//显示倒计时状态
	showRemainTime: function(remainTime){

		window.clearInterval(g_interval['city_charity_time_remain']);
		g_interval['city_charity_time_remain']	 = window.setInterval(
			function(){
				$("#city_charity_time_remain").html("离下次时间： "+Tools.seconds2timestr(remainTime--));

			}
		, 1000);

	},

	/**
	 *  停止当前任务
	 */
	stop: function(){
		//当前已停止掉
		if(!g_interval['city_charity_time'])
		{
			return true;
		}
		//清除原来的定时器
		window.clearTimeout(g_interval['city_charity_time']);
		window.clearInterval(g_interval['city_charity_time_remain']);
		g_interval['city_charity_time']	 = false;
		g_interval['city_charity_time_remain']	 = false;

		//重新从第一个应用开始
		this.m_run_count	= 0;
		$('#biz_city_charity_click_button').val('点击开始自动慈善会捐赠.'); 
		biz_show_process("<span style='color:red'>慈善会捐赠 </span>: STOP");
		return true;
	},



	//领取指定勋章功能，检查返回状态，更新勋章列表
	//cash 费用 
	run: function(cash){

		/*
		http://k11.bizlife.com.cn/charity/charity_endow.php?action=endow&cash=1

		0|||董事长：<br/><br/>请输入正确的捐款金额。
		0|||董事长:<br/><br/>很抱歉，捐赠慈善会的金额不能小于2,500,000G。
		1|||董事长:<br/><br/>您成功捐赠2,500,000G币给慈善会，获得了12点贡献度，慈善会感谢您的大力支持！|||1015

		*/
		var server_url	= biz_current_server_url()+'/charity/charity_endow.php';
		var post_data	= "action=endow&cash="+cash;
		var response_html	= HttpRequest.Post(server_url,post_data);
		if(!response_html)
			return false;

		var raw	= response_html.split("|||");
		if(raw[0]==0){
			biz_show_process("<span style='color:red'>慈善会捐赠 </span>"+this.m_run_count+":失败 "+raw[1].replace(/<br>/gi,"  "));

		}else if(raw[0]==1){
			biz_show_process("<span style='color:blue'>慈善会捐赠 </span>"+this.m_run_count+": 成功 " +raw[1].replace(/<br>/gi,"  "));
			return true;

		}

		return false;


	}

};