$(document).ready(function(){

	//hover style function
	$("#s1").mouseenter(function(){
		$(this).attr("src","pictures/ystar.png");
	});
	$("#s2").mouseenter(function(){
		$(this).attr("src","pictures/ystar.png");
		$("#s1").attr("src","pictures/ystar.png");
	});
	$("#s3").mouseenter(function(){
		$(this).attr("src","pictures/ystar.png");
		$("#s2").attr("src","pictures/ystar.png");
		$("#s1").attr("src","pictures/ystar.png");
	});
	$("#s4").mouseenter(function(){
		$(this).attr("src","pictures/ystar.png");
		$("#s3").attr("src","pictures/ystar.png");
		$("#s2").attr("src","pictures/ystar.png");
		$("#s1").attr("src","pictures/ystar.png");
	});
	$("#s5").mouseenter(function(){
		$(this).attr("src","pictures/ystar.png");
		$("#s4").attr("src","pictures/ystar.png");
		$("#s3").attr("src","pictures/ystar.png");
		$("#s2").attr("src","pictures/ystar.png");
		$("#s1").attr("src","pictures/ystar.png");
	});
	//mouseleave
	$("#s1").mouseleave(function(){
		$(this).attr("src","pictures/gstar.png");
	});
	$("#s2").mouseleave(function(){
		$(this).attr("src","pictures/gstar.png");
		$("#s1").attr("src","pictures/gstar.png");
	});
	$("#s3").mouseleave(function(){
		$(this).attr("src","pictures/gstar.png");
		$("#s2").attr("src","pictures/gstar.png");
		$("#s1").attr("src","pictures/gstar.png");
	});
	$("#s4").mouseleave(function(){
		$(this).attr("src","pictures/gstar.png");
		$("#s3").attr("src","pictures/gstar.png");
		$("#s2").attr("src","pictures/gstar.png");
		$("#s1").attr("src","pictures/gstar.png");
	});
	$("#s5").mouseleave(function(){
		$(this).attr("src","pictures/gstar.png");
		$("#s4").attr("src","pictures/gstar.png");
		$("#s3").attr("src","pictures/gstar.png");
		$("#s2").attr("src","pictures/gstar.png");
		$("#s1").attr("src","pictures/gstar.png");
	});
});