jQuery(document).ready(function() {

	jQuery(".content").hide();

	//toggle the componenet with class msg_body
	jQuery(".heading").click(function(){
	 	jQuery(this).next(".content").slideToggle(500);
	 	jQuery(this).next(".item").next(".description").show();
	});

	jQuery(".item").click(function(){
	 	if (jQuery(this).next(".description").is(":hidden")) {
	 		jQuery(".description").hide();
	 		jQuery(this).next(".description").show();
	 	}else {
	 		jQuery(this).next(".description").hide();
	 	};               
	});

});