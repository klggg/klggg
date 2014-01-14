/*
2010-8-22 21:37
封装店铺相关
@version    $Id: $



*/


Tools.initNameSpace("biz");

//全局变量,取自官网 eval后得到的变量
var shop_list={};


//设置自动排序功能
$("#shop_cg_tb").tablesorter(); 

biz.shop= {

	//当前加载时间,用于次日刷新店铺
	m_loadTime : new Date(),


	//当前运行选中任务中的第几个任务
	m_currIndex : 0,

	//保存天气情况, 今天：多云 以下店铺的采购成本下降4％：
	m_weather : {},

	//配置
	m_config : {
			//天气和销售量关系
			'天气销售':{'晴天':1.15,'多云':1.05,'阴天':1,'小雨':0.9,'中雨':0.85,'大雨':0.8,'暴雨':0.7}

			//等级和库存关系 
			,'最大库存':{1:3000,2:4500,3:9000,4:13500,5:18000}
			,'采购速度':{
					1:{'title':'慢速运输12小时','time':12*3600}
					,2:{'title':'中速运输6小时','time':6*3600}
					,3:{'title':'快速运输3小时','time':3*3600}
					,4:{'title':'金币即时采购','time':0}
			}

			,'采购量':{'10000':' 微量(100件)','50000':' 小量(500件)','300000':' 中量(3000件)','1000000':' 大量(10000件)','4000000':'巨量(40000件)','10000000':' 海量(100000件)'}
	},

	//店铺信息
	m_shop : {},

	//商店过滤筛选
	selectedFilter : function(filterCall,value){

		var curr_record	= null;
		for(var record in this.m_shop)
		{
			curr_record	= this.m_shop[record];	//指向当前记录
			//满足条件
			if(filterCall(curr_record,value))
			{
				$("#shop_"+record).attr('checked','checked');

			}
			else
			{
				//$("#shop_"+record).attr('checked','');
			}


		}

	},

	//过滤筛选出当前库存小于指定数量
	//currShop为当前商店
	filterKcNow : function(currShop,value){
		return (currShop['当前库存'] <= (value * 100));
	},

	//选中采购成本下跌超过
	//currShop为当前商店
	filterBuyprice : function(currShop,value){
		return (currShop['采购成本'] <= (value * -1));
	},

	//得到天气信息,分析每种店铺采购价格的波动
	loadWeather : function(){

		var curr_url = biz_current_server_url()+'/office/newspaper_page1.php?show_weather=1';
		var response_html= HttpRequest.Get(curr_url);
		if(!response_html || response_html.length < 300)
		{
			return false;
		}
		var myregexp = /div_page\('shownews.php\?id=(\d+)',/;
		var match = myregexp.exec(response_html); 
		if (match == null) 
			return false;

		//得到当前天气
		curr_url= biz_current_server_url()+'/office/shownews.php?id='+match[1];
		response_html= HttpRequest.Get(curr_url);
		myregexp=/今天：([^ <]+)/;
		match = myregexp.exec(response_html); 
		if (match == null)
			return false;

		this.m_weather['天气']	 = match[1];


		//得到每种商店的采购成本
		this.m_weather['采购成本']	 = {};
		myregexp = /以下店铺的采购成本(下降|上升)([0-9]+)％[^>]+>[^>]+>([^<]+)。/g;
		//myregexp = /以下店铺的采购成本下降([0-9]+)％[^>]+>[^>]+>([^<]+)。/g;
		match = myregexp.exec(response_html);
		var tmp_shop_array	 = [];
		var tmp_price	 = 0;
		while (match != null) {

			tmp_price	 = parseInt(match[2]) ;
			if('下降' == match[1])
				tmp_price	 = tmp_price * (-1) ;
			
			//便利店、快餐厅
			tmp_shop_array	= match[3].split("、");
			for (var record in tmp_shop_array)
			{
				//便利店 => 20 %
				this.m_weather['采购成本'][tmp_shop_array[record]]	= tmp_price;
			}

			match = myregexp.exec(response_html);
		}

	},

	//加载选中店铺指定页数
	loadPages : function(thisObj){

		if(!biz_check())
			return false;

		var page		= parseInt($("#shop_cg_load_page").val());
		var page_max		= parseInt($("#shop_cg_load_page_total").val()) + page;

		var old_value		= $(thisObj).val();
		$(thisObj).attr("disabled","disabled"); 
		for(var i=page; i<page_max; i++)
		{
			$(thisObj).val('正在加载第'+i+'页...');
			this.load();
			$("#shop_cg_load_page").val(i);
		}

		$(thisObj).attr("disabled","").val(old_value);
		
	},

	//加载选中店铺
	load : function(){

		if(!biz_check())
			return false;


		var area_select_array	= this.getSelectAreas();
		if(area_select_array.length <1)
		{
			var show_html="没有区域被选中。";
			biz_show_process(show_html);
			return;
		}

		this.loadWeather();

		var areaCount_purchase=0;
		var page		= parseInt($("#shop_cg_load_page").val());

		for (var record in area_select_array)
		{
			//得到每个区的店铺信息
			this.getList(area_select_array[record],page);
		}
		//显示店铺
		this.show(shop_list);
	},


	//得到指定区的店铺列表,返回店铺数组信息
	getList: function(area,page){


		var curr_url = biz_current_server_url()+'/enterprise/shop.php?page='+page+'&area='+area;
		var response_html= HttpRequest.Get(curr_url);
		if(!response_html || response_html.length < 300)
		{
			return false;
		}

		var staff_list_html	= [];
		var tmp_i	= 0;
		var department_numb	= 0;
		
		var L=response_html.length;
		var st=response_html.indexOf("var shop_list=new Array();", 0);
		var et=response_html.indexOf("/*显视加成页面的方法", st+1);
		var show_html;
		show_html=response_html.substring(st+26,et-1)
		eval(show_html); 
		return shop_list;

	},


	//得到店铺的采购成本
	getPrice: function(shopName){
	
		var buy_price = 0;
		var buy_prices = this.m_weather['采购成本'];
		for (var tmp_record in buy_prices)
		{
			
			if(shopName.indexOf(tmp_record)!=-1) {
				buy_price	= buy_prices[tmp_record];
			break;

			}
		}
		return buy_price;
	},
	//显示店铺信息 shop_list 保存店铺的参数信息
	show: function(shop_list){
		var curr_url	 = biz_current_server_url()+'/company/inspection_select.php?type=shop&t='+Math.random();
		var response_html	= HttpRequest.Get(curr_url);
		if(!response_html || response_html.length < 300)
		{
			return false;
		}

		//得到之前选择过的任务
		var selected_array	= this.getSelected();

		var staff_list_html	= [];
		var tmp_i	= 0;
		var department_numb	= 0;

		//根据巡视页面得到公司、部门列表
		var myregexp = /class="list_word">[\s\S]+?<table[\s\S]+?<a[^>]+>([^<]+)<[\s\S]+?<td[\s\S]+?<a[^>]+>([^<>]+)<[\s\S]+?<td[\s\S]+?<td[^>]+[\s\S]+?<td[\s\S]+?<table[^>]+title="([0-9]+)级[\s\S]+?士气[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?能力[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?忠诚[\s\S]+?<td[^<]+<div[^>]+title="([^"]+)"[\s\S]+?inspection\(([0-9]+),([\s0-9]+)\)/g;
		var match = myregexp.exec(response_html);
		var d=new Date();
		var kc_max=0;
		var shop_pople,shop_add,kc_now,kc_phours;
		var buy_price	= 0;
		var tmp_record	= 0;

		var shop_Weather	= this.m_config['天气销售'][this.m_weather['天气']];
		//var shop_index	= 0;
		while (match != null) {
		//只有店铺才进行采购动作
			department_numb	= parseInt(match[8]);

			if (parseInt(match[7])==1 && (typeof(shop_list[department_numb])!= "undefined")) {
				//找到对应的id号 inspection.php?g_department_list_ids=1
				kc_max	 = this.m_config['最大库存'][shop_list[department_numb]['level']];

				if (shop_list[department_numb]['scale']==2){kc_max=kc_max/3;}
				if (shop_list[department_numb]['scale']==1){kc_max=kc_max/6;}
				shop_pople=parseInt(shop_list[department_numb]['pople']);
				shop_add=shop_list[department_numb]['add'];
				kc_now=parseInt(shop_list[department_numb]['inventory']);
				kc_phours=parseInt(shop_pople/100*shop_Weather*(shop_add/100+1)/24);
				

				buy_price	= this.getPrice(match[1]);


				this.m_shop[department_numb]	={
					"名称":match[1]
					,"人流量":shop_pople
					,"当前库存":kc_now
					,"最大库存":kc_max
					,"今日消耗":0
					,"加成":shop_add
					,"采购结束时间":d
					,"采购成本":buy_price
					,"每小时消耗量":kc_phours
					};
		
				tmp_i++;
				staff_list_html.push('<tr  onmouseout="this.className=\'out\';" onmouseover="this.className=\'over\';" >');
				staff_list_html.push('<td align="center" width="40">'+tmp_i+'</td>');
				staff_list_html.push('<td ><a target="shop_'+department_numb+'" href="'+biz_current_server_url()+'/enterprise/inner-shop_info2.php?shop_id='+department_numb+'">'+this.m_shop[department_numb]['名称']+'</a></td>');
				staff_list_html.push('<td >'+shop_pople+'</td>');
				staff_list_html.push('<td id="td_shop_add_' +department_numb+ '">'+shop_add+'%</td>');
				staff_list_html.push('<td id="td_kc_now_' +department_numb+ '">'+parseInt(kc_now/100)+'</td>');
				//staff_list_html.push('<td id="td_kc_now_' +department_numb+ '">'+0+'</td>');
				staff_list_html.push('<td id="td_kc_max_' +department_numb+ '">'+kc_max+'</td>');
//				staff_list_html.push('<td id="td_kc_today_' +department_numb+ '">'+ 0 +'</td>');
				staff_list_html.push('<td id="td_kc_hours_' +department_numb+ '">'+kc_phours+'</td>');
				staff_list_html.push('<td id="td_end_time_' +department_numb+ '">----/----</td>');
				staff_list_html.push('<td >');
				if(0 == this.m_shop[department_numb]['采购成本'] )
				{
					staff_list_html.push('正常');
				}
				else 
				{
					staff_list_html.push(this.m_shop[department_numb]['采购成本']+'%');
					if(this.m_shop[department_numb]['采购成本'] < 0)
						staff_list_html.push('[<span style="color:blue">下跌</span>]');
					else
						staff_list_html.push('[<span style="color:red">上涨</span>]');
				}
				staff_list_html.push('<a target="shop_'+department_numb+'" href="'+biz_current_server_url()+'/enterprise/shop_purchase.php?id='+department_numb+'">采购</a> ');
				staff_list_html.push("</td>");

				staff_list_html.push('<td><INPUT TYPE="checkbox"  NAME="select_shop_cg_array" id="shop_'+department_numb+'"  value="'+department_numb+'"');

				//上次是否选中
				if(jQuery.inArray(department_numb, selected_array) >=0)
				{
					staff_list_html.push(' checked');
				}
				staff_list_html.push(' />  </td>');

				staff_list_html.push("</tr>");
				//shop_index++;
			}
			match = myregexp.exec(response_html);
		}
	//alert(tmp_i);
		//显示新加载的店铺
		$("#shop_list").html(staff_list_html.join(''));

		//排序
		$("#shop_cg_tb").trigger("update"); 
		var sorting = [[4,0],[7,0]]; 
		$("#shop_cg_tb").trigger("sorton",[sorting]); 


	},

	/**
	 *  得到选中区
	 *  
	 *  String whereForm
	 *  
	 */
	getSelectAreas : function()
	{
		var whereForm	= '';
		var elemName	 = 'select_shop_area_array';

		var select_array = Array();
		$(whereForm+"  input:checked[name$='"+elemName+"']").each(function() {
			select_array.push($(this).val());
		});
		
		return select_array;

	},


	/**
	 * 得到当前选择任务
	 * 返回数组, 每个任务编号
	 */
	getSelected: function(){

		var select_array = Array();
		$("#shop_cg_form  input:checked[name$='select_shop_cg_array']").each(function() {
			select_array.push(parseInt($(this).val()));
		});

		return select_array;
	},
	/**
	 *  点击开始运行
	 * 
	 *  成功返回 下次任务开始的时间
	 */
	runClick: function(){

		//当前已在运行,停止掉
		if(g_interval['shop_cg'])
		{
			this.stop();
			return true;
		}
		

		if(this.getSelected().length < 1)
		{
			biz_show_process("<span style='color:red'>店铺采购 </span>: 请先选择要采购的店铺。");
			return false;

		}
		g_interval['shop_cg']	 = true;


		biz_show_process("<span style='color:red'>店铺采购 </span>: START");
		$('#biz_shop_cg_click_button').val('自动店铺采购中,点击停止.'); 
		this.autoRun();


	},

	//检查是否第二天
	isNextDay: function(){
		var d	= new Date();
		//初次加载时间 小
		return (biz.shop.m_loadTime.getDate() != d.getDate());
	},
	//依次自动运行
	autoRun: function(){
		
		//第二天运行
		if(this.isNextDay())
		{
			//不需要第二天自动运行
			if(!$('#auto_load_shop_cg').get(0).checked)
			{
				this.stop();
				return false;
			}
			this.load();
		}

		var selected_array	= this.getSelected();

		//得到采购参数设置
		//采 购 量
		var day = 1;
		var days = document.getElementsByName("shop_cg_days");
		for (var i = 0; i < days.length; i++) {
			if (days[i].checked) {
				day = days[i].value;
				break;
			}
		}
		//采购速度
		var speed = 1;
		var speeds = document.getElementsByName("shop_cg_speed");
		for (var i = 0; i < speeds.length; i++) {
			if (speeds[i].checked) {
				speed = speeds[i].value;
				break;
			}
		}

		//执行每一个店铺的采购
		for (var i=0;i<selected_array.length ;i++ )
		{
			//运行指定店铺的采购
			this.run(selected_array[i], day, speed);
		}
		biz_show_process("<span style='color:blue'>店铺采购</span> 全部结束" );

		
		var next_run_time	= this.m_config['采购速度'][speed]['time'];
		//即时采购
		if(next_run_time < 1)
		{
			return false;
		}


		next_run_time+=15;


		biz_show_process("<span style='color:blue'>店铺采购</span>:  【 "+Tools.seconds2timestr(next_run_time)+'   后再次启动】' );

		//过指定的时间后再运行
		g_interval['shop_cg']	= window.setTimeout(function()
		{
			biz.shop.autoRun();
			
		}, 1000 * next_run_time );

		//显示倒计时状态
		this.showRemainTime(next_run_time);

	},

	//显示倒计时状态
	showRemainTime: function(remainTime){

		window.clearInterval(g_interval['shop_cg_time_remain']);
		g_interval['shop_cg_time_remain']	 = window.setInterval(
			function(){
				$("#shop_cg_time_remain").html("离下次时间： "+Tools.seconds2timestr(remainTime--));

			}
		, 1000);

	},

	/**
	 *  运行指定店铺的采购
	 *  shopId 店铺id
	 *  day 采 购 量
	 *  speed 采 购 速度
	 */
	run: function(shopId,day,speed){


		var r=HttpRequest.Post(biz_current_server_url()+"/enterprise/shop_purchase.php","id=" + shopId + "&days=" + day + "&speed=" + speed);

		var end_time=new Date();
		var d=new Date();


		//-1|||董事长：<br/><br/>您所选择的店铺当前正在采购中。需要等待本次采购完毕，才能执行下次货物采购。|||73524928
		//1|||73530073|||100|||10800
		var arr=new Array();
		arr = r.split("|||");
		if (arr[0] == 1) {
			biz_show_process('<span style="color:blue">店铺采购 </span>:'+speed+' '+this.m_shop[shopId]["名称"]+' 成功 '+(day/100)+'件 <a target="shop_'+shopId+'" href="'+biz_current_server_url()+'/progress_inner.php?pid='+arr[1]+'">查看状态</a>');

			end_time = Tools.DateAdd("s",this.m_config['采购速度'][speed]['time'],d);

			this.m_shop[shopId]["采购结束时间"]	= end_time;
			$('#td_end_time_'+shopId).html(end_time.toLocaleTimeString());

			return true;
		}
		//正在采购
		else if (-1 == arr[0] ) {

			//正在采购
			curr_url=biz_current_server_url() + "/progress_inner.php?pid="+arr[2];
			r= HttpRequest.Get(curr_url);
			var myregexp = /autoExeTime[^\d]*(\d+)/;
			var match = myregexp.exec(r);
			if(match!=null)
			{
				var time_to=parseInt(match[1])-5;
				end_time = Tools.DateAdd("s",time_to,d);
				this.m_shop[shopId]["采购结束时间"]	= end_time;

				$('#td_end_time_'+shopId).html(end_time.toLocaleTimeString());
				
			}
			biz_show_process('<span style="color:red">店铺采购 </span>: '+this.m_shop[shopId]["名称"]+' '+arr[1].replace(/<br\/>/gi,"  ")+'('+end_time.toLocaleTimeString()+')<a target="shop_'+shopId+'" href="'+biz_current_server_url()+'/progress_inner.php?pid='+arr[2]+'">查看状态</a>');
		}
		else {
			biz_show_process("<span style='color:red'>店铺采购 </span>:"+this.m_shop[shopId]["名称"]+" "+r.replace(/<br\/>/gi,"  "));
		}
		return false;

	},

	/**
	 *  停止当前任务
	 */
	stop: function(){
		//当前已停止掉
		if(!g_interval['shop_cg'])
		{
			return true;
		}
		//清除原来的定时器
		window.clearTimeout(g_interval['shop_cg']);
		window.clearInterval(g_interval['shop_cg_time_remain']);
		g_interval['shop_cg']	 = false;
		g_interval['shop_cg_time_remain']	 = false;
		$("#shop_cg_time_remain").html("");

		//重新从第一个应用开始
		this.m_currIndex	= 0;
		$('#biz_shop_cg_click_button').val('点击开始自动店铺采购.'); 
		$("#shop_cg_status").html("任务已停止，请重新选择需要执行的任务");
		biz_show_process("<span style='color:red'>店铺采购 </span>: STOP");
		return true;
	}



};


/*
	促销 2010-9-18 19:25
*/
biz.shop.promotions= {


	//选中店铺促销
	runClick: function(){

		//得到之前选择过的任务
		var selected_array	= biz.shop.getSelected();
		if(selected_array.length <1)
		{
			alert('请先加载并选中店铺');
			return false;
		}

		for (var record in selected_array)
		{
			this.run(selected_array[record]);
		}

	},

	/**
	 *  得到当前促销状态
	 *  shopId 店铺id
	 *  如果还可促销，返回可促销的天
	 */
	getStatus: function(shopId){

		//今天的促销活动开展得十分顺利，请您放心。另外，明天的促销活动已筹备完毕，以应对即将到来的雨天。
		var curr_url = biz_current_server_url()+'/enterprise/promotions_inner.php?sid='+shopId;
		var response_html= HttpRequest.Get(curr_url);
		if(!response_html || response_html.length < 300)
		{
			return false;
		}

/*
	<input name="rads" id="rad_today" class="radio_align" type="checkbox" onclick="sel_type();"/>
                    <label for="rad_today" style="cursor: pointer;">今天（小雨）</label>
                    	                    	                    <input name="rads" id="rad_tomro" class="radio_align" type="checkbox" onclick="sel_type();" />

                    <label for="rad_tomro" style="cursor: pointer;">明天（大雨）</label>

*/

		var witch_day	= 'all';
		var rad_count	= 0;

		if(response_html.indexOf('id="rad_today"')!=-1) {
			witch_day	= 'rad_today';
			rad_count ++;
		}

		if(response_html.indexOf('id="rad_tomro"')!=-1) {
			witch_day	= 'rad_tomro';
			rad_count ++;
		}
		
		//已促销过
		if(0 == rad_count)
			return false;

		return witch_day;

	},
	/**
	 *  运行指定店铺的促销
	 *  shopId 店铺id
	 *  witch_day 促销哪一天 rad_today rad_tomro all
	 */
	run: function(shopId){

		var witch_day	=	 this.getStatus(shopId);

		if(!witch_day)
		{
			biz_show_process('<span style="color:red">店铺促销 </span>: '+biz.shop.m_shop[shopId]['名称']+" 正在促销");
			return false;
		}
		var r=HttpRequest.Post(biz_current_server_url()+"/enterprise/promotions_inner.php","ajax=ajax&sid=" + shopId + "&witch_day=" + witch_day);
/*
董事长：<br/><br/>恭喜您，今天的促销活动开展得十分顺利，店铺E-20-1挽回了因受天气影响而造成收入损失的80%。
董事长：<br/><br/>明日的促销活动已筹备完毕，如果开展顺利的话，店铺E-20-1将挽回因受天气影响而造成收入损失的80%。
*/
		if(r == 'fail')
		{
			biz_show_process('<span style="color:red">店铺促销 </span>: 公司资金周转不灵，已经没有足够的现金来支付此次的促销活动。');
		}

		biz_show_process('<span style="color:blue">店铺促销 </span>: '+r.replace(/<br\/>/gi,"  "));

	}

};



/*
	店铺合作邀请 2011-4-25 18:48
*/
biz.shop.teamwork= {
	
	//设定区号
	areas	 :['a','b','c','d','e','f','g','z'],
//	areas	 :['c','d','e','f','g','z'],

	/**
	 *  得到某区的合作邀请,返回店id
	 *  @param area	  所在区号
	 */
	getShopId: function(area){
		
		var curr_url = biz_current_server_url()+'/enterprise/shop.php?area='+area;
		var response_html= HttpRequest.Get(curr_url);
		if(!response_html || response_html.length < 300)
		{
			return false;
		}
		
		//提取邀请
		var myregexp = /show_operation\(([0-9]+),[^<]+<img[^>]+xico_lhxc3.gif"/;
		var match = myregexp.exec(response_html);
		var tmp_shop_array	 = [];
		while (match != null) {

			tmp_shop_array.push(parseInt(match[1]));

			match = myregexp.exec(response_html);
		}

		return tmp_shop_array;
	},

	/**
	 *  得到具体邀请列表
	 *  @param area	  所在区号
	 */
	getUserId: function(shopId){

		var curr_url = biz_current_server_url()+'/enterprise/inner-shop_promote_2.php?shop_id='+shopId+'&n='+Math.round(Math.random()*10000);
		var response_html= HttpRequest.Get(curr_url);
		if(!response_html || response_html.length < 300)
		{
			return false;
		}

/*
		提取参与的用户
<td width="78">
	<input type="button" class="button_f2" value="参与" onClick="do_partici(2,14423);" />			</td>


*/
		var myregexp = /do_partici\(([0-9]+),([0-9]+)/g;
		var match = myregexp.exec(response_html);
		var tmp_array	 = [];
		var tmp_uid	= 0;
		while (match != null) {
			
		//	tmp_uid	 = parseInt(match[1]);
			tmp_array.push({
				'act_id':parseInt(match[1])
				,'rec_id':parseInt(match[2])
				});

			match = myregexp.exec(response_html);
		}

		return tmp_array;

	},

	/**
	 *  执行
	 *  @param area	  所在区号
	 */
	runAll: function(){
		
		var area	 = '';
		var shops	= [];
		var shop	= 0;
		var users	= [];
		var curr_record	= null;
		for(var i=0; i<this.areas.length; i++)
		{
			shops	= this.getShopId(this.areas[i]);
			for(var j=0; i<shops.length; j++)
			{
				shop	= shops[j];
				if(typeof(shop) == "undefined" || 0 == shop  )
				{
					continue;
				}
				//得到具体邀请列表
				users	= this.getUserId(shop);
				for(var k=0; k<users.length; k++)
				{
					curr_record	= users[k];	//指向当前记录
					//执行
					this.run(shop, curr_record.act_id,  curr_record.rec_id);

				}

			}


		}
	

	},

	/**
	 *  执行
	 *  @param area	  所在区号
	 */
	run: function(shopId, act_id, rec_id){


		//点击参与
		//http://yaowanym1.yaowan.com/enterprise/inner-agree_send_staff.php?shop_id=51856&act_id=2&rec_id=14430
		var curr_url = biz_current_server_url()+'/enterprise/inner-agree_send_staff.php?shop_id='+shopId+'&act_id='+act_id+'&rec_id='+rec_id;
		var response_html= HttpRequest.Get(curr_url);
		if(!response_html || response_html.length < 300)
		{
			return false;
		}

		//得到选中的员工 
		var myregexp = /<input type="radio" name="sel_staff" value="([0-9]+)" \/>/;
		var match = myregexp.exec(response_html);
		var staff_id	 = 0;
		if (match != null) {
			staff_id = match[1];
		}

		//得到宣传合约
		//<input type="radio" name="hy_lis" value="446" id="rad_446" checked="checked" onclick="onchange_imgc(446)"/>
		myregexp = /<input type="radio" name="hy_lis" value="446" id="rad_446" checked="checked" onclick="onchange_imgc\(([0-9]+)\)"\/>/;
		match = myregexp.exec(response_html);
		var heyue	 = 0;
		if (match != null) {
			heyue = match[1];
		}

		if(heyue==0){
			biz_show_process('<span style="color:blue">店铺合作 </span>: 董事长：我们没有任何合约，请您先购买合约再进行联合宣传吧！。');
			return false;
		}
		

		//检查玩家执行次数
		var r = HttpRequest.Post(HttpRequest.Post(biz_current_server_url()+"/enterprise/glucose_ajax.php","act=check"));
		if($.trim(r)==""){
			
			//提交参与
			var yzm = '';
			r=HttpRequest.Post(biz_current_server_url()+"/enterprise/inner-agree_send_staff.php",'shop_id='+shopId+'&act_id='+act_id+'&rec_id='+rec_id+'&ajax=ajax&staff_id='+staff_id+'&yzm='+yzm+'&heyue='+heyue);

			if(r == 'true'){
				biz_show_process('<span style="color:blue">店铺合作 </span>: 董事长：您成功参与了店铺宣传活动。');
			}
			else
			{
			}

		}

/*
	r=r.split("|||");
	if(r[0]==240){	
		ralert(r[1],"确定",'',"购买葡萄糖","../mall/item.php?id=240&return=%2Fenterprise%2Finner-agree_send_staff.php%3Fshop_id%3D51203%26act_id%3D2%26rec_id%3D14429" );
	}else if(r[0]==2401){
		ralert(r[1],"使用","js:sendPost('../company/management_item_detail.php?id="+r[2]+"','ajax=use_props');invite(); ","不使用","");
	}
*/



	}
};
