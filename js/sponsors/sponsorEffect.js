$(document).ready(function() {

	//toggle the componenet with class msg_body
	$(".heading").click(function(){
	 	$(this).next(".item").next(".description").show();

	 	if ($(this).next(".content").is(":hidden")) {
	 		$(this).closest('div').find(".toggleHead").text("-");
	 		$(this).next(".content").slideToggle(500);			
	 	}else{
	 		$(this).closest('div').find(".toggleHead").text("+");
	 		$(this).next(".content").slideToggle(500);
	 	};

	});

	$(".item").click(function(){
	 	if ($(this).next(".description").is(":hidden")) {
	 		$(".description").hide();
	 		$(this).next(".description").show();
	 		var offset = $( this ).offset().top - 50;
	 		$('body').scrollTo(offset);
	 		$(".toggle").text("+");
	 		$(this).first('div').find(".toggle").text("-");
	 		//jQuery(this).closest('div').find(".toggle").text("-");
	 	}else {
	 		$(this).next(".description").hide();
	 		$(this).first('div').find(".toggle").text("+");
	 	};

	});

	$(".redirectPub").click(function(){
		if ($( ".container" ).find( ".heading" ).next(".content").eq(2).is(":hidden")) {
			$( ".container" ).find( ".heading" ).next(".content").eq(2).slideToggle(500);
		};
		$('html, body').animate({
	        scrollTop: $("#Publicity").offset().top
	    }, 2000);
	});
});