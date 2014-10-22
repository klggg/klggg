/*
2010-8-8 11:31
封装社交
@version    $Id: $

relation_master

*/


Tools.initNameSpace("biz.relation");


/*
2010-8-8 22:43 ggg
师傅
*/

biz.relation.master= {

	//保存项目信息
	m_datas : [],

	//当前运行序号
	m_currIndex : 0,

	//下次运行时间
	m_nextTime : 0,

	//师傅信息
	m_master_info : {},

	//加载
	load: function(){

		if(!biz_check())
			return false;
		var server_url	= biz_current_server_url()+'/relation/relation_master.php?type=1';
		var response_html	= HttpRequest.Get(server_url);
		if(!response_html || response_html == 'false' || response_html.length < 300)
		{
			return false;
		}

		
		//得到师傅信息
		var myregexp = /class="list_word"[\s\S]*?<span id="nickname([0-9]+)"[\s]*>([^<]+)<[\s\S]*?<a[^>]+>([^<]+)<[\s\S]*?<div[^>]+title="([^"]+)[\s\S]*?<span[^>]+>([^<]+)<\/span>([^td]+)<[\s\S]*?<span[^>]+>([^<]+)</m;
		var match = myregexp.exec(response_html);
		this.m_master_info	= {
			'id':match[1]
			,'姓名':$.trim(match[2])
			,'公司':$.trim(match[3])
			,'公司等级':match[4]
			,'关系加成有效期':match[5]
			,'是否过期':(match[6].length >7 ? true:false)
			,'经营指导加成':match[7]

		};

		//要接上次运行
		if(!this.m_master_info['是否过期'])
		{
			var datum = new Date();
			this.m_nextTime	= Tools.stringToTime(this.m_master_info['关系加成有效期']) - (datum.getTime()/1000)+2;
		}

		//得到维系关系选项信息
		this.m_datas	= [];
		match	= null;
		myregexp = /<span[\s]+class="font-center_text">([^<]+)<\/span>[\s]*([0-9]{1,3})小时需要使用([^<]+)<\/label>[\s]*\(拥有[\s]*([0-9]+)[^>]*张[\s\S]*?onclick="Buy\(([0-9]+)\)[\s\S]*?维系关系时间：[\s]*<span[^>]+>([^<]+)</;
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
				mission_show.push('<INPUT TYPE="checkbox"  NAME="select_relation_master_array" id="relation_master_'+mission_index+'"  value="'+mission_index+'"');
				//上次是否选中
				if(jQuery.inArray(mission_index, selected_array) >=0)
				{
					mission_show.push(' checked');
				}
				mission_show.push(' /> ');

			}
			mission_show.push('</td></tr> ');

		}
		$("#relation_master_list").html(mission_show.join(''));

		//显示师傅信息
		var mission_info_show	= [];
		mission_info_show.push('<tr class="row"> ');
		mission_info_show.push('<td> '+this.m_master_info['姓名']+ '</td>');
		mission_info_show.push('<td> '+this.m_master_info['公司']+ '</td>');
		mission_info_show.push('<td> '+this.m_master_info['公司等级']+ '</td>');
		mission_info_show.push('<td> '+this.m_master_info['关系加成有效期']+ ' </td>');
		mission_info_show.push('<td> '+(this.m_master_info['是否过期']?"已过期":"未过期")+ ' </td>');
		mission_info_show.push('<td> '+this.m_master_info['经营指导加成']+ ' </td>');
		mission_info_show.push('<td> ');
		mission_info_show.push('</td></tr> ');
		$("#relation_master_info").html(mission_info_show.join(''));


	},


	//点击运行定时领取勋章功能
	runClick: function(){
 

		var selected_array	= this.getSelected();
		if (selected_array.length <1 )
		{
			this.load();
			Tools.setCheckbox(document.relation_master_list_form,'all');
		}

		//当前已在运行,停止掉
		if(g_interval['relation_master'])
		{
			this.stop();
			return true;
		}
		
		g_interval['relation_master']	 = true;

		biz_show_process("<span style='color:red'>师傅 </span>: START");
		$('#biz_relation_master_click_button').val('自动师傅中,点击停止.'); 
		this.autoRun();

	},

	//依次自动运行
	autoRun: function(){

		var selected_array	= this.getSelected();

		//已全部执行完，停止掉。
		if(this.m_currIndex >= selected_array.length)
		{
			biz_show_process("<span style='color:blue'>师傅</span> 全部结束,重新开始" );
			this.m_currIndex	= 0;

		}

		//检查时间是否已到
		var datum = new Date();
		this.m_nextTime	= Tools.stringToTime(this.m_master_info['关系加成有效期']) - (datum.getTime()/1000);
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

		//this.m_nextTime	= 10;
		biz_show_process("<span style='color:blue'>师傅</span>:  【 "+Tools.seconds2timestr(this.m_nextTime)+'   后再次启动】' );

		//过指定的时间后再运行
		g_interval['relation_master']	= window.setTimeout(function()
		{
			biz.relation.master.autoRun(); 
			
		}, 1000 * this.m_nextTime );
		//显示倒计时状态
		this.showRemainTime(this.m_nextTime);



	},

	//显示倒计时状态
	showRemainTime: function(remainTime){

		window.clearInterval(g_interval['relation_master_time_remain']);
		g_interval['relation_master_time_remain']	 = window.setInterval(
			function(){
				$("#relation_master_time_remain").html("离下次时间： "+Tools.seconds2timestr(remainTime--));

			}
		, 1000);

	},

	/**
	 *  停止当前任务
	 */
	stop: function(){
		//当前已停止掉
		if(!g_interval['relation_master'])
		{
			return true;
		}
		//清除原来的定时器
		window.clearTimeout(g_interval['relation_master']);
		window.clearInterval(g_interval['relation_master_time_remain']);
		g_interval['relation_master']	 = false;
		g_interval['relation_master_time_remain']	 = false;

		//重新从第一个应用开始
		this.m_currIndex	= 0;
		$('#biz_relation_master_click_button').val('点击开始自动师傅.'); 
		biz_show_process("<span style='color:red'>师傅 </span>: STOP");
		return true;
	},

	/**
	 *  得到选中记录
	 *  
	 */
	getSelected : function()
	{
		
		whereForm	= '#relation_master_list_form';
		var elemName	 = 'select_relation_master_array';

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
			biz_show_process( '<span style="color:red">师傅</span>: 请先选择要运行的任务');
			return false;
		}
		var type	 = curr_mission['id'];

		/*
		http://k11.bizlife.com.cn/relation/relation_master.php?action=keep&item_id=454&master_id=503850
		0|||董事长:<br/><br/>您的加成时间还没过期，不能继续使用维系道具。

		*/
		var server_url	= biz_current_server_url()+'/relation/relation_master.php';
		var post_data	= "action=keep&item_id="+type+"&master_id="+(this.m_master_info['id']);
		var response_html	= HttpRequest.Post(server_url,post_data);
		var raw	= response_html.split("|||");

		if('undefined' != typeof(raw) && (1 == raw[0])){
			//成功
			biz_show_process("<span style='color:blue'>师傅 </span>: "+curr_mission['name']+" 成功,"+raw[1].replace(/<br\/>/gi,"  "));
			return true;
		}
		else
		{
			if('undefined' != typeof(raw[1]) && raw[1].length > 10)
				biz_show_process("<span style='color:red'>师傅 </span>: "+curr_mission['name']+' '+raw[1].replace(/<br\/>/gi,"  "));
			else
				biz_show_process("<span style='color:red'>师傅 </span>: "+curr_mission['name']+" 失败");
			return false;
		}

	}
};

