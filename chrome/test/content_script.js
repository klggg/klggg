/*
chrome.browserAction.onClicked.addListener(function(tab) {

  console.log('ggg chrome.browserAction.onClicked.addListener');
  chrome.tabs.executeScript({code:"document.body.style.backgroundColor='#ff0000'"});
});
*/

alert("content_script");

/*
var insert_dom = document.createElement("div");
insert_dom.innerHTML = '<p onclick="alert(2);document.body.onselectstart=function(){return true;};">解锁</p>';
document.body.insertBefore(insert_dom);

*/
/*
function InsertFunc(tabId,changeInfo,tab)
{
	//让用户界面执行代码。
	chrome.tabs.executeScript(tabId,{code : "alert('看看这是那个页面弹出的！');"});
	//让用户界面执行一个文件的JS。
	chrome.tabs.executeScript(tabId,{file : "check.js"});

  console.log('InsertFunc init');
}
//注册事件的响应函数
chrome.tabs.onUpdated.addListener(InsertFunc);

*/



/*
$(function(){
//(function(){

  console.log('content init');
alert("content init");
//alert(document.getElementById("frame_content").contentWindow);

setTimeout(function(){
  console.log('contentWindow.document.body:'+document.getElementsByTagName("iframe")[0].contentWindow.document.body);


  console.log('contentWindow.document.body.onselectstart:'+document.getElementsByTagName("iframe")[0].contentWindow.document.body.onselectstart);


  console.log($(".liebiao"));
alert("settimeout");
},1000);


document.getElementsByTagName('iframe')[0].contentWindow.document.body.setAttribute("oncopy","return true;")
document.getElementsByTagName('iframe')[0].contentWindow.document.body.setAttribute("oncut","return true;")
document.getElementsByTagName('iframe')[0].contentWindow.document.body.setAttribute("onselectstart","return true;")


document.getElementsByTagName("iframe")[0].contentWindow.onselectstart=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.onmousedown=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.oncontextmenu=function(e){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.onclick=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.onmouseup=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.oncopy=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.oncut=function(){return true;}

document.getElementsByTagName('iframe')[0].contentWindow.document.body.oncopy=function(){return true;};
document.getElementsByTagName('iframe')[0].contentWindow.document.body.oncut=function(){return true;};
document.getElementsByTagName("iframe")[0].contentWindow.document.body.onselectstart=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.onmousedown=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.oncontextmenu=function(e){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.onclick=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.onmouseup=function(){return true;}


document.getElementsByTagName('iframe')[0].contentWindow.document.oncopy=function(){return true;};
document.getElementsByTagName('iframe')[0].contentWindow.document.oncut=function(){return true;};
document.getElementsByTagName("iframe")[0].contentWindow.document.onselectstart=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.onmousedown=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.oncontextmenu=function(e){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.onclick=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.onmouseup=function(){return true;}


document.onselectstart

*/

//document.getElementsByTagName("iframe")


//document.body.onselectstart=function(){return true;}
//document.body.onmousedown=function(){return true;}
//document.body.oncontextmenu=function(e){return true;}
//document.body.onclick=function(){return true;}
//document.body.onmouseup=function(){return true;}


/*
var iframes = document.getElementsByTagName("iframe");
for(var i=0; i<iframes.length; i++)
{
	if(iframes[i].name == "")
	continue;

	make_ok(iframes[i].contentWindow);
	make_ok(iframes[i].contentWindow.document.body);



}

make_ok(iframes[i].contentWindow);
*/
//document.body.onselectstart=function(){return true;}
//document.body.onmousedown=function(){return true;}
//document.body.oncontextmenu=function(e){return true;}
//document.body.onclick=function(){return true;}
//document.body.onmouseup=function(){return true;}


//document.onselectstart=function(){return true;}
//document.onmousedown=function(){return true;}
//document.oncontextmenu=function(e){return true;}
//document.onclick=function(){return true;}
//document.onmouseup=function(){return true;}




//document.onselectstart=function(){return true;}
//document.onmousedown=function(){return true;}
//document.oncontextmenu=function(e){return true;}
//document.onclick=function(){return true;}
//document.onmouseup=function(){return true;}

//alert("柯女王，都已准备好啦");

  //$(document).bind("dblclick", function() { self.location.reload(); } );
});
//})();

/*
function make_ok(dom){
	dom.onselectstart=function(){return true;}
	dom.onmousedown=function(){return true;}
	dom.oncontextmenu=function(e){return true;}
	dom.onclick=function(){return true;}
	dom.onmouseup=function(){return true;}
}
 */

/*
﻿var postInfo = $("div.postDesc");
if(postInfo.length!=1){
	chrome.runtime.sendMessage({type:"cnblog-article-information", error:"获取文章信息失败."});
}
else{
	var msg = {
		type: "cnblog-article-information",
		title : $("#cb_post_title_url").text(),
		postDate : postInfo.find("#post-date").text(),
		author : postInfo.find("a").first().text(),
		url: document.URL
	};
	chrome.runtime.sendMessage(msg);
}
*/
