// alert("jQuery is working!");





/*$("div").hide();

$("li").mouseover(function(){
	$(this).closest('li').find('div').Toggle("slide", direction: left);
});

$("li").mouseout(function(){
	$(this).closest('li').find('div').toggle("slide" direction: left);
});*/

$("ul").on("click", "li", function(){
	$(this).toggleClass("completed");
});

$("ul").on("click", "span", function(){
	$(this).parent().fadeOut(300, function(){
		$(this).remove();
	});

});

$("input[type='text']").keypress(function(event){

	if(event.which === 13) {
		var todoText = $(this).val();
		$(this).val("");
		$("ul").append("<li><span class='fa fa-trash'></span> " + todoText + "</li>");
	}
});
