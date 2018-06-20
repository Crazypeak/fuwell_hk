$(function(){
	$(".child .pointer").mouseover(function(){
		var imageSrc=$(this).attr("src");
		if(imageSrc.indexOf("On.png")>0){}else{
			imageSrc=imageSrc.replace(".png","On.png");
			$(this).attr("src",imageSrc);
		}
	}).mouseleave(function(){
		var imageSrc=$(this).attr("src");
		if(imageSrc.indexOf("On.png")>0){
			imageSrc=imageSrc.replace("On.png",".png");
			$(this).attr("src",imageSrc);
		}
	});
	
	$("#closeBtn").click(function(){
		$(".alert").hide();
		$("#showImg").hide();
	});
});

function pointerClick(e,url){
	$(".alert").show();
	$("#showImg").attr("src",url).fadeIn(500);
}