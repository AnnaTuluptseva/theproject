alert("Me here!");
$(document).ready(function(){
	$(document).on('click','option', function(){
		var meaning = $("#l_i").html();
		alert(meaning);
	});

	$(document).on('click','#ch_language', function(){
		alert("Hello!");
	});


}));
