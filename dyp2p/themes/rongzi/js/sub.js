$(document).ready(function(){
	$("#sub").click(function(){
		$("form").submit()
	});
	$("#reg").click(function(){window.location.href='/index.php?user&q=reg'});
	$("#valchange").click(function(){$("#valicode").click()});
	$("ul.subnav").parent().append("<span></span>"); 
	$("ul.topnav li.topli").mouseover(function() {
		$(this).find("div").show(); 
		$(this).find("ul").show(); 
		$(this).hover(function() {
			
		}, function(){	
			$(this).find("div").hide();
			$(this).find("ul").hide();
		});		
	}).hover(function() { 
		$(this).addClass("on1"); //On hover over, add class "subhover"
	}, function(){	//On Hover Out
		$(this).removeClass("on1"); //On hover out, remove class "subhover"
	});

	$(".main_menu li").mouseover(function(){
		$(".child_menu div").each(function(){$(this).css("display","none");});			
		var x=$(this).attr("id");
		$("."+x).css("display","block");
	});
	
	$(".mcr_xuanxiangka li").mouseover(function(){
		$(".cont .did").each(function(){$(this).css("display","none");});			
		var x=$(this).attr("id");
		$("."+x).css("display","block");
	}).hover(function() {
		$(".mcr_xuanxiangka li").removeClass("onn");		
		$(this).addClass("onn"); //On hover over, add class "subhover"
	});
	
	if(parseInt($("#borrow_period").val())== 0){
		$("#borrow_style").val(2);
		//$("#borrow_style").attr("disabled","true");
	}
	
	$("#borrow_period").change(function(){
	var s_value = $("#borrow_period").val();
	s_value = parseInt(s_value);	
	if(s_value == 0){
		$("#borrow_style option[value='2']").remove();
		$("#borrow_style").append("<option value='2'>按天到期还本还息</option>");  
		$("#borrow_style").val(2);
		//$("#borrow_style").attr("disabled","true");
		$("#rel_borrow_style").val(2);
	}
	else{
		//$("#borrow_style").attr("disabled",false);
		$("#borrow_style option[value='2']").remove();
		$("#borrow_style").append("<option value='2'>到期还本还息</option>");  
		//$("#borrow_style").val(2);
		$("#rel_borrow_style").val(0);
	}
		
	});
	
	$("#borrow_style").change(function(){
		$("#rel_borrow_style").val($("#borrow_style").val());
		
	});
});

// 兼容IE FF的ByName方法
var getElementsByName = function(tag, name){
    var returns = document.getElementsByName(name);
    if(returns.length > 0) return returns;
    returns = new Array();
    var e = document.getElementsByTagName(tag);
    for(var i = 0; i < e.length; i++){
        if(e[i].getAttribute("name") == name){
            returns[returns.length] = e[i];
        }
    }
    return returns;
}
//alert(getElementsByName("div","odiv").length); // IE:4 FF:4

$(document).ready(function(){
	if(getElementsByName("span","endtime")){
		var objAll=getElementsByName("span","endtime");
		for(var i=0;i<objAll.length;i++){
			RemainTime(i,objAll[i].innerHTML);
		}
	}
});
function RemainTime(obj,iTime){
	var iDay,iHour,iMinute,iSecond;
	var sDay="",sTime="";
    if (iTime >= 0){
        iDay = parseInt(iTime/24/3600);
        iHour = parseInt((iTime/3600)%24);
        iMinute = parseInt((iTime/60)%60);
        iSecond = parseInt(iTime%60);

		if (iDay > 0){ 
			sDay = iDay + "天"; 
		}
		sTime =sDay + iHour + "时" + iMinute + "分" + iSecond + "秒";
	  
		if(iTime==0){
			clearTimeout(Account);
			sTime="<span style='color:green'>时间到了！</span>";
		}else{
			sTime=""+sTime;
			Account = setTimeout(function(){ RemainTime(obj,iTime)},1000);
		}
		iTime=iTime-1;
    }else{
		sTime="<span style='color:red'>此标已过期！</span>";
    }
	getElementsByName("span","endtime")[obj].innerHTML = sTime;
}

/*
var iTime1;
var iTime2;
var iTime3;
var iTime4;
var iTime5;
var iTime6;
var obj1;
var obj2;
var obj3;
var obj4;
var obj5;
var obj6;
$(document).ready(function(){
	var Account1;
	var Account2;
	var Account3;
	var Account4;
	var Account5;
	var Account6;
	obj1=$("[name=endtime]:eq(0)");
	obj2=$("[name=endtime]:eq(1)");
	obj3=$("[name=endtime]:eq(2)");
	obj4=$("[name=endtime]:eq(3)");
	obj5=$("[name=endtime]:eq(4)");
	obj6=$("[name=endtime]:eq(5)");
	iTime1=obj1.html();
	iTime2=obj2.html();
	iTime3=obj3.html();
	iTime4=obj4.html();
	iTime5=obj5.html();
	iTime6=obj6.html();
	RemainTime1();
});
function RemainTime1(){
	var iDay,iHour,iMinute,iSecond;
	var sDay="",sTime="";
	if (iTime1 >= 0){
		iDay = parseInt(iTime1/24/3600);
		iHour = parseInt((iTime1/3600)%24);
		iMinute = parseInt((iTime1/60)%60);
		iSecond = parseInt(iTime1%60);

		if (iDay > 0){ 
			sDay = iDay + "天"; 
		}
		sTime =sDay + iHour + "小时" + iMinute + "分钟" + iSecond + "秒";
		if(iTime1==0){
			clearInterval(Account1);
			sTime="<span style='color:green'>时间到了！</span>";
		}else{
			Account1 = setInterval("RemainTime1()",1000);
		}
		iTime1=iTime1-1;
	}else{
		sTime="<span style='color:red'>此标已过期！</span>";
	}
	obj1.html(sTime);
}*/