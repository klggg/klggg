

  console.log('clear init');

  console.log('body.onselectstart:'+ document.getElementsByTagName("iframe")[0].contentWindow.document.body.onselectstart);


document.getElementsByTagName("iframe")[0].contentWindow.document.body.onselectstart=function(){return true;};


var iframes = document.getElementsByTagName("iframe");
for(var i=0; i<iframes.length; i++)
{
	if(iframes[i].name == "")
	continue;

	  console.log(iframes[i].name);
	  console.log("contentWindow:" + iframes[i].contentWindow);
	  console.log("document.body:" + iframes[i].contentWindow.document.body);
	  console.log("document.body.onselectstart:" + iframes[i].contentWindow.document.body.onselectstart);

	clear_all(iframes[i].contentWindow);
	clear_all(iframes[i].contentWindow.document.body);
}


function clear_all(dom){
	if(!dom){
		alert("empty dom");
		return ;
	}
	  console.log("dom.onselectstart:"+ dom.onselectstart);

	dom.onselectstart=function(){return true;}
	dom.onmousedown=function(){return true;}
	dom.oncontextmenu=function(e){return true;}
	dom.onclick=function(){return true;}
	dom.onmouseup=function(){return true;}
}


