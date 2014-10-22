//提示框
function show_description(des, img_top, img_middle, img_bottom,desw) {
	if (!navigator.userAgent.match(/Firefox\/(\d+(?:\.\d+){0,})/)) {
		if (document.readyState != "complete")
			return;
	}
	
	if (!img_top)
		img_top = '../images/note-bg-top.gif';
	if (!img_middle)
		img_middle = '../images/note-bg-middle.gif';
	if (!img_bottom)
		img_bottom = '../images/note-bg-bottom.gif';
	
	var cWidth, cHeight;
	if (document.compatMode == "BackCompat") {
		cWidth = document.body.clientWidth;
		cHeight = document.body.clientHeight;
	}
	else {
		cWidth = document.documentElement.clientWidth;
		cHeight = document.documentElement.clientHeight;
	}
	
	var w = 212;
	if(typeof(desw)!='undefined' && parseInt(desw) > 0 ) w = desw ;
	
	
	var description = document.getElementById("description");
	if (description == null) {
		description = document.createElement("div");
		description.setAttribute("id", "description");
		description.style.width = w + "px";
		description.style.height = "auto";
		description.style.position = "absolute";
		description.style.fontSize = "13px";
		description.style.color = "#FFF";
		description.style.lineHeight = "18px";
		description.style.overflow = "hidden";
		description.style.zIndex = 9999;
		//mx=window.event.X;
		//my=window.event.Y;
		document.body.appendChild(description);
	}
	

	description.innerHTML='<div><img src="' + img_top + '" width="'+ (w) +'" height="6" /></div><div style="color:#ffffff; background-image:url(' + img_middle + '); background-repeat:repeat; padding:3px 9px 3px 9px; background-color:#0074e1">' +des+ '</div><div><img src="' + img_bottom + '" width="'+ (w) +'" height="6" /></div>';
	
	if( img_top=='empty' ){
		description.innerHTML= '<div style=" color:#ffffff; background-image:url(' + img_middle + '); padding:6px 9px 6px 9px;">' +des+ '</div>';
	}
	
	var h = description.offsetHeight;

	var e = getEvent();
	var x = e.clientX + 20;
	var y = e.clientY + 20;
	if (x + w > cWidth) {
		x = e.clientX - 20 - w;
	}
	if (y + h > cHeight) {
		y = e.clientY - 20 - h;
	}
	description.style.left = x + "px";
	description.style.top = y + "px";
	description.style.display = "";
}
function hide_description() {
	var description = document.getElementById("description");
	if (description)
		description.style.display = "none";
}