<!--
var obj = document.getElementById("jiax");
var pages = document.getElementById("pages");

var Prv= 1;
var Next= 2;
var thispage=1;
window.onload = function(){
var allpages = Math.ceil(parseInt(obj.scrollHeight)/parseInt(obj.offsetHeight));
document.getElementById("page1").innerHTML=Prv;
document.getElementById("Pagecount1").innerHTML=allpages;
pages.innerHTML = "&nbsp;";
for (var i=1;i<=allpages;i++){
pages.innerHTML += "<a href=" + "javascript:showpart('"+i+"');" + ">ตฺ" + i + "าณ</a> &nbsp;";

}
}
function showpart(x){
 thispage=x;
 document.getElementById("page1").innerHTML=x;
 
 var allpages = Math.ceil(parseInt(obj.scrollHeight)/parseInt(obj.offsetHeight));
 var PCount = allpages;
 if(x==null || x== 1)
 {
 x=x
 Prv=1
 Next=x+1
 }
 else if(x >= PCount){
  x=PCount;
  Prv=x-1;
  Next=x;
 } 
 else
 {
 Prv=x-1;
 Next=x+1;
 }
 obj.scrollTop=(x-1)*parseInt(obj.offsetHeight);
 
 }
function returnthispage()
{
 document.write(thispage);
}
//-->