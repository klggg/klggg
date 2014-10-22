//document.body.style.backgroundColor="blue";

console.log('document.body.onselectstart:'+document.body.onselectstart);
document.body.onselectstart=function(){return true;}
console.log('document.body.onselectstart:'+document.body.onselectstart);
//console.log(document.getElementById("test_id").innerHTML);



setTimeout(function(){

var insert_dom = document.createElement("div");

//document.getElementsByTagName("iframe")[0].insertBefore(insert_dom);

document.getElementById("append_parent").innerHTML = '<p style="font-size: x-large;color: red;" onclick="\
console.log(document.getElementsByTagName(\'iframe\')[0].contentWindow.document.body.onselectstart);\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.body.onselectstart=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.body.onmousedown=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.body.oncontextmenu=function(e){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.body.onclick=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.body.onmouseup=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.body.oncut=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.body.oncopy=function(){return true;};\
\
document.getElementsByTagName(\'iframe\')[0].contentWindow.onselectstart=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.onmousedown=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.oncontextmenu=function(e){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.onclick=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.onmouseup=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.oncut=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.oncopy=function(){return true;};\
\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.onselectstart=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.onmousedown=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.oncontextmenu=function(e){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.onclick=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.onmouseup=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.oncut=function(){return true;};\
document.getElementsByTagName(\'iframe\')[0].contentWindow.document.oncopy=function(){return true;};\
alert(\'柯大侠，解锁ok，祝您取得好成绩\');\
">解锁</p> ';


document.body.insertBefore(insert_dom);

//document.getElementsByTagName("iframe")[0].appendChild(insert_dom);
//document.getElementById("test_id").innerHTML = '<p onclick="alert(2);document.body.onselectstart=function(){return true;};">解锁</p> ';

},1000);


/*

console.log('contentWindow.document.body:'+document.getElementsByTagName("iframe")[0].contentWindow.document.body);
console.log('document.getElementsByTagName("iframe")[0].contentWindow.document.body.onselectstart:'+document.getElementsByTagName("iframe")[0].contentWindow.document.body.onselectstart);



document.getElementsByTagName("iframe")[0].contentWindow.document.body.onselectstart=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.onmousedown=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.oncontextmenu=function(e){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.onclick=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.onmouseup=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.oncut=function(){return true;}





document.getElementsByTagName("iframe")[0].contentWindow.onselectstart=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.onmousedown=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.oncontextmenu=function(e){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.onclick=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.onmouseup=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.oncopy=function(){return true;}
document.getElementsByTagName("iframe")[0].contentWindow.document.body.oncut=function(){return true;}

*/
