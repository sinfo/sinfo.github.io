$(document).ready(function() {

	$(".ink-button").click(function(){

    var hasError = false;

    if($.trim($("#required-company").val()) == ''){
      $(".company-control").addClass("validation error");
      $(".company-err").text("this is fill cannot be empty");
      hasError = true;
    } 

    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if($.trim($("#required-email").val()) == ''){
      $(".email-control").addClass("validation error");
      $(".email-err").text("this is fill cannot be empty");
      hasError = true;
    }else if (!emailReg.test($.trim($("#required-email").val()))) {
      $(".email-control").addClass("validation error");
      $(".email-err").text("email format invalid");
      hasError = true;
    }

    if(!hasError) {
      /*$('#myForm').ajaxForm(function() { 
          alert("Thank you for your comment!"); 
      }); */
     var formInput = $(".ink-form").serialize();
        $.post($(".ink-form").attr('action'),formInput, function(data){
        alert("Thank you for your comment!");
      });
    } 

    return false;

	});
});