// JavaScript Document
var isExit = false; 
var objSelect=document.getElementById('server_list');
for(var i=0;i<objSelect.options.length;i++) 
{ 
 if(objSelect.options[i].value=="k19") 
 { 
	 objSelect.options[i].selected = true; 
	 isExit = true; 
	 break; 
 } 
}      
