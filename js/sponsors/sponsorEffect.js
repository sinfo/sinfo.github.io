jQuery(document).ready(function() {

	jQuery(".content").hide();

	//toggle the componenet with class msg_body
	jQuery(".heading").click(function(){
	 	jQuery(this).next(".item").next(".description").show();

	 	if (jQuery(this).next(".content").is(":hidden")) {
	 		jQuery(this).closest('div').find(".toggle").text("-");
	 		jQuery(this).next(".content").slideToggle(500);	 		
	 	}else{
	 		jQuery(this).closest('div').find(".toggle").text("+");
	 		jQuery(this).next(".content").slideToggle(500);	 
	 	};

	});

	jQuery(".item").click(function(){
	 	if (jQuery(this).next(".description").is(":hidden")) {
	 		jQuery(".description").hide();
	 		jQuery(this).next(".description").show();
	 		jQuery(this).closest('div').find(".toggle").text("-");
	 	}else {
	 		jQuery(this).next(".description").hide();
	 		jQuery(this).closest('div').find(".toggle").text("+");
	 	};               
	});

});