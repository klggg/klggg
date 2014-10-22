$(document).ready(function(){
	$(".header ul li").hover(
		function(){
			 $(this).children(".sub").show();
			 
			 },
		function(){
			 $(this).children(".sub").hide();
			 
			 }	 
		)
	
	
	})