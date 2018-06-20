
$(".nav-right li > a").on("mouseover",function(){
	if ($(".sub-nav:visible").size() > 0) {
		$(".sub-nav").hide()
		$(this).next(".sub-nav").stop().show().removeClass("header-sub-show").addClass("header-sub-show"); 
	}else{
		$(this).next(".sub-nav").stop().slideDown(500).removeClass("header-sub-show").addClass("header-sub-show");    
	}
})


$(".btn-appmenu").on("click",function(){
	$(".appnavs").slideToggle();
})

var w = $(window).width();
if (w < 480) {
	if ($('*').hasClass('wow')) {
		$('*').removeClass('wow')
	}
}
