$(function(){

    //$(" #nav ul ").css({display: "none"}); // Opera Fix
	$(" #nav li").hover(function(){
	$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(200);
	},function(){
	$(this).find('ul:first').css({visibility: "hidden"});
	});

});