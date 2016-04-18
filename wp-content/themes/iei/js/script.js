$(document).ready(function(){
	$("body").addClass("loaded");
	
	$(window).on("resize",function(){
		$(".home iframe.video").height($(".home .image").height());
	}).trigger("resize");
});