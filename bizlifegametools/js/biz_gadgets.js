/*
2010-7-25 8:40
封装杂项小工具
@version    $Id: $





*/


Tools.initNameSpace("biz.gadgets");

//秘书消息提取
biz.gadgets.officework= {


	//提取未讀的秘书提示
	getUnRead: function(){

		//http://k1.bizlife.com.cn/office/work_daily.php
		HttpRequest.Get(biz_current_server_url()+'/office/work_daily.php?page=1&state=0',function(xmlhttp){

			if(!xmlhttp || 'undefined' == typeof(xmlhttp.responseText))
				return false;
			var response_text	= xmlhttp.responseText;
			if('undefined' == typeof(response_text))
				return false;

			//解释得到消息内容
			var return_json	 = {};
			var myregexp = /work_daily_read\.php\?id=([0-9]+)[^>]+>([^<]+)<\/a>/g;
			var match = myregexp.exec(response_text);
			var tmp_html	= [];
			while (match != null) {

				if('undefined' == typeof(match[2]))
				{
					break;
				}

				//自动接补助金
				if(match[2].indexOf('收到政府扶助金') >= 0)
				{
					if($('#auto_get_fund').get(0).checked)
					{
						biz.gadgets.officework.getFund(match[1]);
					}
				}
				else if(match[2].indexOf('店铺宣传邀请') >= 0)
				{
					if($('#auto_street_promote').get(0).checked)
					{
						biz.gadgets.officework.getStreetPromote(match[1]);
					}
				}
				else
				{
	//for test
				//提取所有消息
	//			var response_html	= HttpRequest.Get(biz_current_server_url()+'/office/work_daily_read.php?id='+match[1]);

				}
	//			biz_show_process("<span style='color:red'>"+match[2]+"</span>");
				//收到新手物资补助
				tmp_html.push(' <a target="_blank" href="'+biz_current_server_url()+'/office/work_daily_read.php?id='+match[1]+'" >'+match[2]+'</a> ');

				match = myregexp.exec(response_text);

			}
			if(tmp_html.length > 0)
				biz_show_process('<span style="color:blue">[最新秘书消息]</span> '+tmp_html.join(' '));


		});
	},

	//从秘书消息里店铺宣传邀请
	//msgId 消息id
	getStreetPromote: function(msgId){
		//得到消息具体内容
		var response_html	= HttpRequest.Get(biz_current_server_url()+'/office/work_daily_read.php?id='+msgId);
		
		//解析得到其他内容
		var myregexp = /公司董事长[^>]+>[^>]+uid=([0-9]+)">([^<]+)<\/a>[^>]+>[^>]+>([^<]+)<[\s\S]+street_promote\(([0-9]+),([0-9]+),([0-9]+)/;

		var match = myregexp.exec(response_html);

		if(match == null)
		{
			return null;
		}

		var uid	= match[1];
		var name	= match[2];
		var shop_name	= match[3];
		var act_id	= match[4];
		var rec_id	= match[5];
		var shop_id	= match[6];

		var tmp_html	= [];
		tmp_html.push(' 邀请人：<a target="_blank" href="'+biz_current_server_url()+'/enterprise/shop-sigle-other.php?uid='+uid+'" >'+name+'</a> ');
		tmp_html.push(' 店铺： '+shop_name);
		tmp_html.push(' <a target="_blank" href="'+biz_current_server_url()+'/enterprise/inner-agree_send_staff.php?act_id='+act_id+'&rec_id='+rec_id+'&shop_id='+shop_id+'"> 点此查看合作 </a>');

		biz_show_process('<span style="color:blue">[店铺合作]</span> '+tmp_html.join(' '));

		biz.shop.teamwork.run(shop_id, act_id, rec_id);


/*
		var tmp_href = HttpRequest.Get(biz_current_server_url()+'enterprise/inner-agree_send_staff.php?act_id='+act_id+'&rec_id='+rec_id+'&shop_id='+shop_id;

//http://yaowanym1.yaowan.com/enterprise/inner-agree_send_staff.php?act_id=1&rec_id=14516&shop_id=53398
//street_promote(1,14516,53398);

		var response_html	= HttpRequest.Get(tmp_href);
*/

	},
	//从秘书消息里领政府补助金
	//msgId 消息id
	getFund: function(msgId){
		//得到消息具体内容
		var response_html	= HttpRequest.Get(biz_current_server_url()+'/office/work_daily_read.php?id='+msgId);
		
		//解析得到其他内容
		var myregexp = /get_fund\(([0-9]+),([0-9]+),\'([a-z]+)\',\'([^\']+)\',([0-9]+)\)/;
		var match = myregexp.exec(response_html);

		if(match == null)
		{
			return null;
		}

		var cid	= match[1];
		var type	= match[2];
		var area	= match[3];
		var name	= match[4];
		var uid	= match[5];

		myregexp = /wid\=([0-9]+)/;
		match = myregexp.exec(response_html);
		var wid	= match[1];


		var server_url	= biz_current_server_url()+'/official/ajax_get_fund.php';
		var post_data	= 'wid='+wid+'&cid='+cid+'&type='+type+'&area='+area+'&name='+name+'&uid='+uid;
		var response_html	= HttpRequest.Post(server_url,post_data);

		var r_arr = response_html.split('|||');
		if(parseInt(r_arr[0]) ==1){
			biz_show_process("<span style='color:blue'>收到政府扶助金</span>");
		}else{
			biz_show_process("<span style='color:red'>"+r_arr[1]+"</span>");
		}

	},

	//点击运行定时领取勋章功能
	runClick: function(){

		if(!biz_check())
			return false;

		//当前已在运行,停止掉
		if(g_interval['officework'])
		{
			this.stop();
			return true;
		}
		
		g_interval['officework']	 = true;

		biz_show_process("<span style='color:red'>秘书消息提取 </span>: START");
		$('#biz_gadgets_officework_click_button').val('秘书消息提取中,点击停止.'); 
		this.autoRun();

	},

	//依次自动运行
	autoRun: function(){

		this.getUnRead();
		var next_run_time	= 60*5;

		biz_show_process("<span style='color:blue'>秘书消息提取</span>:  【 "+Tools.seconds2timestr(next_run_time)+'   后再次启动】' );

		//每隔5分钟
		g_interval['officework']	 = window.setInterval(
			function(){
				//提取秘书提示
					biz.gadgets.officework.getUnRead();
			}
		, 1000*next_run_time);


	},

	/**
	 *  停止当前任务
	 */
	stop: function(){
		//当前已停止掉
		if(!g_interval['officework'])
		{
			return true;
		}
		//清除原来的定时器
		window.clearInterval(g_interval['officework']);
		g_interval['officework']	 = false;

		$('#biz_gadgets_officework_click_button').val('点击开始秘书消息提取.'); 
		biz_show_process("<span style='color:red'>秘书消息提取 </span>: STOP");
		return true;
	}



};


// ------------------------------------------------------ 

//勋章操作
biz.gadgets.medal= {

	//保存勋章信息
	m_medals : [],

	//当前运行勋章序号
	m_currIndex : 0,

	//下次运行时间
	m_nextTime : 0,

	//默认下次运行时间
	m_defaultNextTime : 7202,//7202

	//加载勋章列表
	load: function(){

		if(!biz_check())
			return false;

		var server_url	= biz_current_server_url()+'/official/company_medal_apply.php';
		var response_html	= HttpRequest.Get(server_url);
		if(!response_html || response_html == 'false' || response_html.length < 300)
		{
			return false;
		}

		
		//得到下一次可申请时间
		//<input type="hidden" name="hid_ctime_1" id="hid_ctime_1" value="2010-07-25 14:36:41">
		var myregexp = /id="hid_ctime_1"[\s]+value="([^"]+)"/;
		var match = myregexp.exec(response_html);
		var next_run_time	= this.m_defaultNextTime;
		//表示当前无勋章可申请
		if (match != null) {

			var datum = new Date();
			this.m_nextTime	= Tools.stringToTime(match[1]) - (datum.getTime()/1000);
		}


		this.m_medals	= [];
		 myregexp = /<td height="18" colspan="2" class="font-center_text">([^<]+)<[\s\S]+?勋章加成[\s\S]+?<td>([^<]+)<[\s\S]+?成 功 率[\s\S]+?<td>([^<]+)<[\s\S]+?申请费用[\s\S]+?<td>([^<]+)<[\s\S]+?申请条件[\s\S]+?<td>[^>]+>[^>]+>[^>]+>(.*?)<\/td>/g;
		 match = myregexp.exec(response_html);

		var tmp_str	 = '';
		var tmp_isok	 = false;
		var tmp_id	= 1;
		while (match != null) {
			
			tmp_str	= match[5];
			if (tmp_str && tmp_str.indexOf("条件不足") > 0)
			{
				tmp_str	= '条件不足';
				tmp_isok	= false;
			}
			else if (tmp_str && tmp_str.indexOf("已佩戴") > 0)
			{
				tmp_isok	= false;
				tmp_str	= '已佩戴';
			}
			else
			{
				tmp_isok	= true;
				tmp_str	= '可申请';
			}

			this.m_medals.push({
				"id":tmp_id++
				,"name":match[1]
				,"勋章加成":match[2]
				,"成功率":match[3]
				,"申请费用":match[4]
				,"申请条件":tmp_str
				,"可以申请":tmp_isok
						});
			match = myregexp.exec(response_html);
		}
		//显示任务列表
		this.show(this.m_medals);

	},


	//显示勋章
	show: function(missionArray){
		//得到之前选择过的任务
		var selected_array	= this.getSelected();

		var mission_count	= missionArray.length;
		var mission_show	= [];
		var mission_index	= 0;

		for(var i=0; i<mission_count; i++)
		{
			//mission_index	= missionArray[i]['id'];
			mission_index	= i;
			mission_show.push('<tr class="row"> ');
			mission_show.push('<td> '+missionArray[i]['name']+ '</td>');
			mission_show.push('<td> '+missionArray[i]['勋章加成']+ '</td>');
			mission_show.push('<td> '+missionArray[i]['成功率']+ '</td>');
			mission_show.push('<td> '+missionArray[i]['申请费用']+ ' </td>');
			mission_show.push('<td> ');
			if(!missionArray[i]['可以申请'])
			{
				mission_show.push(missionArray[i]['申请条件']);
			}
			else
			{
				mission_show.push('<INPUT TYPE="checkbox"  NAME="select_medals_array" id="gadgets_medal_'+mission_index+'"  value="'+mission_index+'"');
				//上次是否选中
				if(jQuery.inArray(mission_index, selected_array) >=0)
				{
					mission_show.push(' checked');
				}
				mission_show.push(' /> ');

			}
			mission_show.push('</td></tr> ');

		}
		$("#medals_list").html(mission_show.join(''));

	},


	//点击运行定时领取勋章功能
	runClick: function(){
 

		var selected_array	= this.getSelected();
		if (selected_array.length <1 )
		{
			this.load();
			Tools.setCheckbox(document.medals_list_form,'all');
		}

		//当前已在运行,停止掉
		if(g_interval['gadgets_medal'])
		{
			this.stop();
			return true;
		}
		
		g_interval['gadgets_medal']	 = true;

		biz_show_process("<span style='color:red'>勋章领取 </span>: START");
		$('#biz_gadgets_medal_click_button').val('自动勋章领取中,点击停止.'); 
		this.autoRun();

	},

	//依次自动运行
	autoRun: function(){

		var selected_array	= this.getSelected();

		//已全部执行完，停止掉。
		if(this.m_currIndex >= selected_array.length)
		{
			biz_show_process("<span style='color:blue'>勋章领取</span> 全部结束" );
			this.stop();
			return true;
		}

		//运行当前任务
		var run_result	= this.run(this.m_currIndex);
		var next_run_time	= this.m_defaultNextTime;
		
		//失败了,直接运行下一个
		if(!run_result)
		{
			if(this.m_nextTime > 0)
			{
				next_run_time = this.m_nextTime;
			}
		}

		biz_show_process("<span style='color:blue'>勋章领取</span>:  【 "+Tools.seconds2timestr(next_run_time)+'   后再次启动】' );

		//过指定的时间后再运行
		g_interval['gadgets_medal']	= window.setTimeout(function()
		{
			biz.gadgets.medal.autoRun();
			
		}, 1000 * next_run_time );
		//显示倒计时状态
		this.showRemainTime(next_run_time);



	},

	//显示倒计时状态
	showRemainTime: function(remainTime){

		window.clearInterval(g_interval['gadgets_medal_time_remain']);
		g_interval['gadgets_medal_time_remain']	 = window.setInterval(
			function(){
				$("#gadgets_medal_time_remain").html("离下次时间： "+Tools.seconds2timestr(remainTime--));

			}
		, 1000);

	},

	/**
	 *  停止当前任务
	 */
	stop: function(){
		//当前已停止掉
		if(!g_interval['gadgets_medal'])
		{
			return true;
		}
		//清除原来的定时器
		window.clearTimeout(g_interval['gadgets_medal']);
		window.clearInterval(g_interval['gadgets_medal_time_remain']);
		g_interval['gadgets_medal']	 = false;
		g_interval['gadgets_medal_time_remain']	 = false;

		//重新从第一个应用开始
		this.m_currIndex	= 0;
		$('#biz_gadgets_medal_click_button').val('点击开始自动勋章领取.'); 
		biz_show_process("<span style='color:red'>勋章领取 </span>: STOP");
		return true;
	},

	/**
	 *  得到选中记录
	 *  
	 */
	getSelected : function()
	{
		if(typeof(whereForm) == 'undefined')
			whereForm	= '#medals_list_form';

		var select_medals_array = Array();
		$(whereForm+"  input:checked[name$='select_medals_array']").each(function() {
			select_medals_array.push($(this).val());
		});
		
		return select_medals_array;

	},

    /**
     * 根据序号得到运行的勋章
	 * 
     * @param int index 第几个选中的任务, 如果不指定取当前要运行的任务
     * @return array  以app id为键名的数组
     */
	getMission: function(index){
		var selected_array	= this.getSelected();
		if (selected_array.length <1 )
		{
			return false;
		}

		if(typeof(index) == 'undefined')
			index	 = this.m_currIndex;
		return this.m_medals[selected_array[index]];
	},

	//领取指定勋章功能，检查返回状态，更新勋章列表
	//type 勋章id
	run: function(currIndex){

		//得到当前任务信息
		var curr_mission	= this.getMission(currIndex);
		if(!curr_mission)
		{
			biz_show_process( '<span style="color:red">请先选择要运行的任务</span>');
			return false;
		}
		var type	 = curr_mission['id'];

		/*
		http://k11.bizlife.com.cn/official/company_medal_apply.php?item_id=&type=1

		0|||董事长：<br><br>很遗憾！由于申请时间的限制，您暂时无法申请勋章，但是您可以使用《优先申请表》继续申请。
		2|||董事长：<br><br>很遗憾！由于本次运气不佳，您没能成功申请到勋章，相信下次一定能成功！|||18|||2010-07-25 14:36:41
		<input type="hidden" name="hid_ctime_6" id="hid_ctime_6" value="2010-07-25 14:36:41">
		0|||董事长：<br><br>很遗憾！由于申请时间的限制，您暂时无法申请勋章，但是您可以使用《优先申请表》继续申请。

		*/
		var server_url	= biz_current_server_url()+'/official/company_medal_apply.php';
		var post_data	= "type="+type+"&item_id=";
		var response_html	= HttpRequest.Post(server_url,post_data);
		var raw	= response_html.split("|||");
//		if(raw[0] == 0 || raw[0] == 2 || raw[0]==3){
		if('undefined' != typeof(raw) && (1 == raw[0])){
			//成功
			this.m_currIndex++;
			biz_show_process("<span style='color:blue'>勋章领取 </span>: "+curr_mission['name']+" 成功");
			return true;
		}
		else
		{
			if('undefined' != typeof(raw[1]) && raw[1].length > 10)
				biz_show_process("<span style='color:red'>勋章领取 </span>: "+curr_mission['name']+raw[1].replace(/<br>/gi,"  "));
			else
				biz_show_process("<span style='color:red'>勋章领取 </span>: "+curr_mission['name']+" 失败");
			return false;
		}

	}

};