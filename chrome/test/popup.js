// Copyright (c) 2011 The Chromium Authors. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

var incognito;
var url;

console.log('popup init');
var clear_button = document.getElementById("clear_all");


//打开插件时的事件
document.addEventListener('DOMContentLoaded', function () {
  chrome.tabs.query({active: true, currentWindow: true}, function(tabs) {
      
      console.log('document.addEventListener');


   //document.body.style.backgroundColor='red';
    chrome.tabs.executeScript(null,{code:"alert(document.body.style.backgroundColor);"});
  });

});



clear_button.addEventListener("click",function(){

	console.log('clear_button.addEventListener');
	//alert(document.getElementById('frame_content'));

	//chrome.tabs.executeScript(null,{code:"alert(document.getElementById('frame_content'));"});
	chrome.tabs.executeScript(null,{file:"clear_copy.js"});

},false);

//chrome.tabs.executeScript(null, {file: "content_script.js"});




function getDomainFromUrl(url){
	var host = "null";
	if(typeof url == "undefined" || null == url)
		url = window.location.href;
	var regex = /.*\:\/\/([^\/]*).*/;
	var match = url.match(regex);
	if(typeof match != "undefined" && null != match)
		host = match[1];
	return host;
}

function checkForValidUrl(tabId, changeInfo, tab) {
//	if(getDomainFromUrl(tab.url).toLowerCase()=="www.cnblogs.com"){
//		chrome.pageAction.show(tabId);
	//}
	//alert(getDomainFromUrl(tab.url));
	console.log('checkForValidUrl:'+getDomainFromUrl(tab.url));
};

chrome.tabs.onUpdated.addListener(checkForValidUrl);




