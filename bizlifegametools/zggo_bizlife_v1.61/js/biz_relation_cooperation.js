/*
2010-8-14 16:14
合作伙伴
@version    $Id: $

relation_cooperation.js

*/
Tools.initNameSpace("biz.relation");


biz.relation.cooperation= {

	//保存项目信息
	m_datas : [],

	//当前运行序号
	m_currIndex : 0,

	//下次运行时间
	m_nextTime : 0,

	//合作信息
	m_cooperation_info : {},

	//加载
	load: function(){

		if(!biz_check())
			return false;

		var server_url	= biz_current_server_url()+'/relation/relation_cooperation.php?type=3';
		var response_html	= HttpRequest.Get(server_url);
		if(!response_html || response_html == 'false' || response_html.length < 300)
		{
			return false;
		}

		
		//得到状态信息
		var myregexp = /合作伙伴总数[^>]+>[^>]+>([^<]+)<[\s\S]+?当前合作加成[^>]+>[^>]+>([^<]+)<[\s\S]+?可获最大加成[^>]+>[^>]+>([^<]+)<[\s\S]+?合作加成时间[^>]+>[^>]+>([^<]+)</m;

		var match = myregexp.exec(response_html);
		if(match != null)
		{

			this.m_cooperation_info	= {
				'合作伙伴总数':$.trim(match[1])
				,'当前合作加成':$.trim(match[2])
				,'可获最大加成':match[3]
				,'加成时间':match[4]
				,'是否过期':true

			};
			// 	合作加成时间:  	2010-08-14 21:23:09后结束
			if (match[4].indexOf("后结束") != 0)
			{
				this.m_cooperation_info['加成时间']	=match[4].substr(0,match[4].indexOf("后结束"));
				this.m_cooperation_info['是否过期']	=false;
			}

			//要接上次运行
			if(!this.m_cooperation_info['是否过期'])
			{
				var datum = new Date();
				this.m_nextTime	= Tools.stringToTime(this.m_cooperation_info['加成时间']) - (datum.getTime()/1000)+2;
			}
		}

		//得到维系关系选项信息
		this.m_datas	= [];
		//myregexp = /<span[\s]+class="font-center_text">([^<]+)<\/span>[^《]+《([^》]+)》[\s]*<\/label>[\s]*\(拥有[\s]*([0-9]+)[^>]*张[\s\S]*?onclick="Buy\(([0-9]+)\)"[\s\S]*?延长合作加成时间至:([^<]+)</g;
		/*

  进行<span class="font-center_text">短期合作</span>24小时,需要使用《短期合作协议》        

		*/
		server_url	= biz_current_server_url()+'/relation/relation_cooperation_keep.php?type=4';
		response_html	= HttpRequest.Get(server_url);


		match	= null;
		myregexp = /<span[\s]+class="font-center_text">([^<]+)<\/span>[\s]*([0-9]{1,3})小时,需要使用([^<]+)<\/label>[\s]*\([\s]*拥有[\s]*([0-9]+)[^>]*张[\s\S]*?onclick="Buy\(([0-9]+)\)[\s\S]*?延长合作加成时间至:([^<]+)</mg;

		match = myregexp.exec(response_html);

		var tmp_str	 = '';
		var tmp_isok	 = false;
		while (match != null) {
			
			tmp_isok	 = false;
			if (parseInt(match[4]) > 0)
			{
				tmp_isok	= true;
			}

			this.m_datas.push({
				"name":match[1]
				,"花费时间":match[2]
				,"id":match[5]
				,"道具名":match[3]
				,"数量":parseInt(match[4])
				,"可以申请":tmp_isok
				,"维系关系时间":match[6]
						});
			match = myregexp.exec(response_html);
			break;
		}
		//显示任务列表
		this.show(this.m_datas);

	},


	//显示项目数据
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
			mission_show.push('<td> '+missionArray[i]['花费时间']+ '小时</td>');
			mission_show.push('<td> '+missionArray[i]['道具名']+ '</td>');
			mission_show.push('<td> '+missionArray[i]['数量']+ '张 <a target="_blank" href="'+biz_current_server_url()+'/mall/item_inner.php?reload=1&id='+missionArray[i]['id']+' ">购买</a></td>');
			mission_show.push('<td> '+missionArray[i]['维系关系时间']+ ' </td>');
			mission_show.push('<td> ');
			if(!missionArray[i]['可以申请'])
			{
				mission_show.push('no');
			}
			else
			{
				mission_show.push('<INPUT TYPE="checkbox"  NAME="select_relation_cooperation_array" id="relation_cooperation_'+mission_index+'"  value="'+mission_index+'"');
				//上次是否选中
				if(jQuery.inArray(mission_index, selected_array) >=0)
				{
					mission_show.push(' checked');
				}
				mission_show.push(' /> ');

			}
			mission_show.push('</td></tr> ');

		}
		$("#relation_cooperation_list").html(mission_show.join(''));

		//显示合作信息
		var mission_info_show	= [];
		mission_info_show.push('<tr  > ');
		mission_info_show.push('<td width="13%" height="24">合作伙伴总数：</td>');
		mission_info_show.push('<td width="27%">'+this.m_cooperation_info['合作伙伴总数']+ '</td>');
		mission_info_show.push('<td width="13%" height="20">当前合作加成：</td>');
		mission_info_show.push('<td width="47%">'+this.m_cooperation_info['当前合作加成']+ '</td>');
		mission_info_show.push('</tr>');

		mission_info_show.push('<tr  > ');
		mission_info_show.push('<td height="24">可获最大加成：</td>');
		mission_info_show.push('<td>'+this.m_cooperation_info['可获最大加成']+ '</td>');
		mission_info_show.push('<td height="20">合作加成结束时间:</td>');
		mission_info_show.push('<td >'+this.m_cooperation_info['加成时间']+ '</td>');
		mission_info_show.push('</tr>');

		$("#relation_cooperation_info").html(mission_info_show.join(''));


	},


	//点击运行定时领取勋章功能
	runClick: function(){
 

		var selected_array	= this.getSelected();
		if (selected_array.length <1 )
		{
			this.load();
			Tools.setCheckbox(document.relation_cooperation_list_form,'all');
		}

		//当前已在运行,停止掉
		if(g_interval['relation_cooperation'])
		{
			this.stop();
			return true;
		}
		
		g_interval['relation_cooperation']	 = true;

		biz_show_process("<span style='color:red'>合作 </span>: START");
		$('#biz_relation_cooperation_click_button').val('自动合作中,点击停止.'); 
		this.autoRun();

	},

	//依次自动运行
	autoRun: function(){

		var selected_array	= this.getSelected();

		//已全部执行完，停止掉。
		if(this.m_currIndex >= selected_array.length)
		{
			biz_show_process("<span style='color:blue'>合作</span> 全部结束,重新开始" );
			this.m_currIndex	= 0;

		}

		//检查时间是否已到
		var datum = new Date();
		this.m_nextTime	= Tools.stringToTime(this.m_cooperation_info['加成时间']) - (datum.getTime()/1000)+2;
		//过期,再次运行
		if(this.m_nextTime < 0)
		{
			this.load();
			//运行当前任务
			var run_result	= this.run(this.m_currIndex);
			//失败了,直接运行下一个
			if(!run_result)
			{
				this.m_nextTime = 30;
			}
			else
			{
				//移到下一个
				if(this.m_currIndex < (selected_array.length-1))
				{
					this.m_currIndex++;
				}

				//得到当前任务信息
				var curr_mission	= this.getMission(this.m_currIndex);

				this.m_nextTime	= parseInt(curr_mission['花费时间']) * 3600+2;

			}
		}


		biz_show_process("<span style='color:blue'>合作</span>:  【 "+Tools.seconds2timestr(this.m_nextTime)+'   后再次启动】' );

		//过指定的时间后再运行
		g_interval['relation_cooperation']	= window.setTimeout(function()
		{
			biz.relation.cooperation.autoRun(); 
			
		}, 1000 * this.m_nextTime );
		//显示倒计时状态
		this.showRemainTime(this.m_nextTime);



	},

	//显示倒计时状态
	showRemainTime: function(remainTime){

		window.clearInterval(g_interval['relation_cooperation_time_remain']);
		g_interval['relation_cooperation_time_remain']	 = window.setInterval(
			function(){
				$("#relation_cooperation_time_remain").html("离下次时间： "+Tools.seconds2timestr(remainTime--));

			}
		, 1000);

	},

	/**
	 *  停止当前任务
	 */
	stop: function(){
		//当前已停止掉
		if(!g_interval['relation_cooperation'])
		{
			return true;
		}
		//清除原来的定时器
		window.clearTimeout(g_interval['relation_cooperation']);
		window.clearInterval(g_interval['relation_cooperation_time_remain']);
		g_interval['relation_cooperation']	 = false;
		g_interval['relation_cooperation_time_remain']	 = false;

		//重新从第一个应用开始
		this.m_currIndex	= 0;
		$('#biz_relation_cooperation_click_button').val('点击开始自动合作.'); 
		biz_show_process("<span style='color:red'>合作 </span>: STOP");
		return true;
	},

	/**
	 *  得到选中记录
	 *  
	 */
	getSelected : function()
	{
		
		whereForm	= '#relation_cooperation_list_form';
		var elemName	 = 'select_relation_cooperation_array';

		var select_array = Array();
		$(whereForm+"  input:checked[name$='"+elemName+"']").each(function() {
			select_array.push(parseInt($(this).val()));
		});
		
		return select_array;

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
		return this.m_datas[selected_array[index]];
	},

	//领取指定勋章功能，检查返回状态，更新勋章列表
	//type 勋章id
	run: function(currIndex){

		//得到当前任务信息
		var curr_mission	= this.getMission(currIndex);
		if(!curr_mission)
		{
			biz_show_process( '<span style="color:red">合作</span>: 请先选择要运行的任务');
			return false;
		}
		var type	 = curr_mission['id'];

		/*
		1|||董事长:<br/><br/>您成功使用了一张《临时合作协议》，如果您的合作伙伴在有效时间也使用合作协议， 公司所有店铺便可获得相应的合作加成。

		*/
		var server_url	= biz_current_server_url()+'/relation/relation_cooperation_keep.php?type=4';
		var post_data	= "action=keep&item_id="+(curr_mission['id']);
		var response_html	= HttpRequest.Post(server_url,post_data);
		var raw	= response_html.split("|||");

		if('undefined' != typeof(raw) && (1 == raw[0])){
			//成功
			biz_show_process("<span style='color:blue'>合作 </span>: "+curr_mission['name']+" 成功,"+raw[1].replace(/<br\/>/gi,"  "));
			return true;
		}
		else
		{
			if('undefined' != typeof(raw[1]) && raw[1].length > 10)
				biz_show_process("<span style='color:red'>合作 </span>: "+curr_mission['name']+' '+raw[1].replace(/<br\/>/gi,"  "));
			else
				biz_show_process("<span style='color:red'>合作 </span>: "+curr_mission['name']+" 失败");
			return false;
		}

	}
};

