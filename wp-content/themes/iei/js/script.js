$(document).ready(function(){
	$("body").addClass("loaded");
	
	$(window).on("resize",function(){
		$(".home iframe.video").height($(".home .carousel").height());
		var height = $(".home .image").height();
		if(height<200){
			height = 488
		}
		$(".home .carousel").height(height);
	}).trigger("resize");
});