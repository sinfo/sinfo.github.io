jQuery(document).ready(function() {

	//toggle the componenet with class msg_body
	jQuery(".heading").click(function(){
	 	jQuery(this).next(".item").next(".description").show();

	 	if (jQuery(this).next(".content").is(":hidden")) {
	 		jQuery(this).closest('div').find(".toggleHead").text("-");
	 		jQuery(this).next(".content").slideToggle(500);			
	 	}else{
	 		jQuery(this).closest('div').find(".toggleHead").text("+");
	 		jQuery(this).next(".content").slideToggle(500);
	 	};

	});

	jQuery(".item").click(function(){
	 	if (jQuery(this).next(".description").is(":hidden")) {
	 		jQuery(".description").hide();
	 		jQuery(this).next(".description").show();
	 		jQuery(".toggle").text("+");
	 		jQuery(this).first('div').find(".toggle").text("-");
	 		//jQuery(this).closest('div').find(".toggle").text("-");
	 	}else {
	 		jQuery(this).next(".description").hide();
	 		jQuery(this).first('div').find(".toggle").text("+");
	 	};

	});

	jQuery(".redirectPub").click(function(){
		if ($( ".container" ).find( ".heading" ).next(".content").eq(2).is(":hidden")) {
			$( ".container" ).find( ".heading" ).next(".content").eq(2).slideToggle(500);
		};
		$('html, body').animate({
	        scrollTop: $("#Publicity").offset().top
	    }, 2000);
	});
});