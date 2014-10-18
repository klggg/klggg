/*
2010-7-24 22:14
封装公司信息相关
@version    $Id: $


*/


Tools.initNameSpace("biz");

biz.company= {

	/**
	 *  得到公司信息
	 *  
	 *  String whereForm
	 *  
	 */
	getInfo : function()
	{
		/* 
			http://k19.bizlife.com.cn/ajax_update_company.php

			var test_xxx	 = {"id":"63662","uid":"746528","name":"\u674f\u5440\u53f6\u5438\u5440\u5438","logo":"images\/init\/gs_logo1.jpg","time_created":"1278079344","image":"0","public_support":"50","cash":"724082","deposit":"0","debt":"0","system_assets":"0","available_assets":"0","level":"1","upgrade_use":"0","state":"0","time_start":"0","time_finish":"0","update_time":"1279074061","listing":"0","stock_time":"0","day_earn":0,"stock_assets":"0","investment":"0","time_invested":"1280066848","land_price":"0","time_land":"1280066848","score":"0","asset_cache":"0"};
		*/
		var server_url	= biz_current_server_url()+'/ajax_update_company.php';
		var tmp_data	= HttpRequest.Get(server_url);
		if(!tmp_data || tmp_data == 'false' || tmp_data.length < 300)
		{
			return false;
		}
		var tmp_str	 = "var company_info	 = "+tmp_data;
		eval(tmp_str); 
		return company_info;

	},


	/**
	 *  显示公司信息
	 *  
	 *  String whereForm
	 *  
	 */
	showInfo : function(info)
	{
		if('undefined' == typeof(info))
		{
			info	= this.getInfo();
			if(!info)
			{
				biz_show_process( '<span style="color:red">请先正确登录官网后再执行！</span>');
				return false;
			}
		}

		var tmp_html	= [];

		tmp_html.push(' <b>公司名称:</b> '+info.name);
		tmp_html.push(' <b>成立时间:</b>  '+Tools.getLocTime(info.time_created));
		tmp_html.push(' <b>现金:</b>  '+Tools.numberFormat(info.cash));
		tmp_html.push(' <b>等级:</b>  '+info.level);
		tmp_html.push(' <b>今日:</b>  '+Tools.numberFormat(info.day_earn));
		tmp_html.push(' <b>存款:</b>  '+Tools.numberFormat(info.deposit));
		tmp_html.push(' <b>债务:</b>  '+Tools.numberFormat(info.debt));
		tmp_html.push(' <b>公众支持:</b>  '+info.public_support);
		tmp_html.push(' <a target="_blank" href="'+biz_current_server_url()+'/enterprise/company_info.php" >更多</a> ');
		$("#biz_company_info").html(tmp_html.join('  '));

	}
};


//员工反省
biz.company.staffReflection= {


	//运行员工反省
	run: function(whereObj,staffId){

		if(!biz_check())
			return false;


		this.autoRun(0,staffId);

		$(whereObj).html('已反省');
	},

	autoRun: function(totalCount,staffId){

		//自动运行指定次数后停止
		if(totalCount >= 10)
		{
			biz_show_process("<span style='color:blue'>反省</span>:"+g_staff_array[staffId]["姓名"]+" 结束");
			return false;
		}

		//检查是否可执行
		if(!this.checkStatus(staffId))
			return false;

		var server_url	= biz_current_server_url()+"/company/staff_further_education_reflection.php?staff_id="+staffId+"&use_item=0&pay=money&return=";

		var r	= HttpRequest.Get(server_url);
		if(!r || r.length < 100)
		{
			biz_show_process("<span style='color:red'>反省</span>:"+g_staff_array[staffId]["姓名"]+"失败,有可能当天反省次数小于1了");
			return false;
		}
		else
		{
			totalCount++;
			biz_show_process('<span style="color:blue">反省</span>:<a target="staff_"'+staffId+' href="'+biz_current_server_url()+'/company/staff_info-2.php?staff_id='+staffId+'">'+g_staff_array[staffId]["姓名"]+"</a>:"+totalCount+"次");
		}



/*
<script>

				var datas={"sid":1455523};
				try{
					window.parent.update_sth(datas);
					window.parent.open_progress(74937469,"反省中");
				}catch(e1){  
					window.location.href=" ../progress_inner.php?pid=74937469&update_cash=1&return= " ;
				}
				</script>

*/

		 window.setTimeout(function()
		{
			biz.company.staffReflection.autoRun(totalCount,staffId);

		}, 1000 * 60 );


	},


	//检查可否反省状态
	checkStatus: function(staffId){

		var server_url	= biz_current_server_url()+"/company/staff_list.php"+"?take=jobtype&sid="+staffId+"&n="+Math.random();
		//0|||吕大|||0|||4
		//1|||秦舞玉|||400|||4

		var r	= HttpRequest.Get(server_url);
		if(!r || r == 'false')
		{
			return false;
		}
		var s=r.split("|||");
		var arr_rep_span=new Array();
		arr_rep_span["[name]"]=s[1];
		arr_rep_span["[name2]"]=s[2];

		if (s[0]!=0 ){
			biz_show_process("<span style='color:red'>常务</span>:董事长:<br/><br/>只有空闲状态的员工才能执行反省事件。");
			return false;
		}
		else if(parseInt(s[3])<4 ){
			biz_show_process("<span style='color:red'>常务</span>:"+Tools.strtr("董事长:<br/><br/>员工[name]的等级尚未达到4级，暂时无法反省。",arr_rep_span));
			return false;
		}
		else if(parseInt(s[2])>0 ){
			biz_show_process("<span style='color:red'>常务</span>:"+Tools.strtr("董事长:<br/><br/>员工[name]的经验、能力和忠诚必须都达到[name2]才能进行反省。",arr_rep_span));
			return false;
		}

		//2|||0|||董事长：<br/><br/>吕大正在培训中...|||培训中
		 r	= HttpRequest.Post(biz_current_server_url()+"/company/staff_event.ajax.php",'staff_id='+staffId+'&pi=1');
		r=r.split('|||');
		if(r[0]==1){
			//可以正常运行
			return true;
		}else if(r[0]==0){
			biz_show_process("<span style='color:red'>常务</span>:"+r[1]);
			return false;
		}else if(r[0]==2){
			if(r[1]>0){
				biz_show_process("<span style='color:red'>常务</span>: <a target='_blank' href='"+biz_current_server_url()+"/progress_inner.php?pid="+r[1]+"'>查看进程 "+r[3]+"</a>");


			}else{
				biz_show_process("<span style='color:red'>常务</span>:"+r[2]);
			}
			return false;
		}else if(r[0]==3||r[0]==4){
			if(r[1]>0){
				biz_show_process("<span style='color:red'>常务</span>:使用"+r[2]);
			}else{

				biz_show_process("<span style='color:red'>常务</span>: <a   target='_blank'  href='"+biz_current_server_url()+"/mall/item_inner.php?number=1&id=240'>购买葡萄糖 "+r[2]+"</a>");

			}	
			return false;
		}

	}


/*
http://k11.bizlife.com.cn/company/staff_list.php?take=jobtype&sid=1455523&n=0.5783223738270089
http://k11.bizlife.com.cn/company/staff_event.ajax.php?pi=1&staff_id=1455523
1|||   

http://k11.bizlife.com.cn/company/staff_further_education_reflection_confirm-2.php?staff_id=1455523


http://k11.bizlife.com.cn/company/staff_list.php?take=jobtype&sid=2222858&n=0.13757129289625536
forward_page(1,'staff_further_education_reflection_confirm-2.php?staff_id='+current,'反省',600,400)
2|||吴忠亚|||400|||4

	//检查
	function forward_page(pi,page,title,pw,ph){


		
	}
	

*/

};


//策划
biz.company.plan = {


	//点击运行酝酿策划
	prepareClick : function()
	{

		var count_time=0;
		//开始运行
		if (!g_interval['biz_prepare_plan'])
		{
			if(!biz_check())
				return false;

			var server_url	= biz_current_server_url()+'/company/plan.php';
			var r=HttpRequest.Get(server_url);
			if(!r || r == 'false' || r.length < 300)
			{
				return false;
			}

			var myregexp =/var count_time=(\d*)/g;
			var match = myregexp.exec(r);
			if(match==null)
			{
				if(this.prepareRun(0))
				{
					$("#biz_prepare_plan_button").val('酝酿策划中,点击停止 ');
				}
				else
					$("#biz_prepare_plan_button").val('点击开始酝酿策划');
			}
			else
			{
				count_time	 = parseInt(match[1]) +1;
				g_interval['biz_prepare_plan']	= window.setTimeout(function()
				{
					biz.company.plan.prepareRun(0);
				},count_time*1000);
				biz_show_process('<span style="color:red">[酝酿策划]</span> 正在酝酿中，等待：'+Tools.seconds2timestr(count_time)+'后执行。 <a target="_blank" href="'+server_url+'">查看</a>');
				$("#biz_prepare_plan_button").val('正在酝酿中,点击停止');
			}
		}
		else
		{
			biz_show_process('<span style="color:red">[酝酿策划]</span> 已停止。');
			window.clearTimeout(g_interval['biz_prepare_plan']);
			g_interval['biz_prepare_plan']	= false;
			$("#biz_prepare_plan_button").val("点击开始酝酿策划");
		}
	},
	/**
	 *  运行酝酿策划
	 *  
	 *  
	 */
	prepareRun : function(total_count)
	{
		
		//只运行指定的次数
		if(total_count >= parseInt($("#biz_prepare_plan_total").val()))
			return false;

		total_count++;

		var server_url	= biz_current_server_url()+'/company/plan.php';
		var r=HttpRequest.Post(server_url,"action=prepare");
		if(r){
			var r_arr=r.split("|||");
			if(r_arr[0]==0){
				biz_show_process('<span style="color:red">[酝酿策划]</span> 失败。'+r_arr[1].replace(/<br\/>/gi,"  "));
				return false;
			}else if(r_arr[0]==1){
				//window.top.update_income();
				//ralert(r_arr[1],"确定","js:UpdateLocation();");
				biz_show_process('<span style="color:blue">[酝酿策划]</span> 成功。'+r_arr[1].replace(/<br\/>/gi,"  ")+' <a target="_blank" href="'+server_url+'">查看</a>');
				
				g_interval['biz_prepare_plan']	= window.setTimeout(function(){
					biz.company.plan.prepareRun(total_count)},605*1000);
				return true;
			}
		}
		return false;

	}

};