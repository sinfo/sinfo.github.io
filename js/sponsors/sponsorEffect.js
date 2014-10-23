jQuery(document).ready(function() {

	jQuery(".content").hide();
	jQuery(".heading").next("item").next("description").show();

	//toggle the componenet with class msg_body
	jQuery(".heading").click(function(){
	 	jQuery(this).next(".content").slideToggle(500);
	 	jQuery(this).next(".item").next("description").show();
	});

	jQuery(".item").click(function(){
	 	jQuery(".description").hide();
	 	jQuery(this).next(".description").show();                  
	});

});