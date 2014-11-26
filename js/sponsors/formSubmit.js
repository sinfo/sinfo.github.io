$(document).ready(function() {

	$(".ink-button").click(function(form){

    form.preventDefault();

    var company = $("#required-company").val();
    var email = $("#required-email").val();

    var hasError = false;

    if($.trim(company) == ''){
      $(".company-control").addClass("validation error");
      $(".company-err").text("this is fill cannot be empty");
      alert("company");
      hasError = true;
    } 

    var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if($.trim(email) == ''){
      $(".email-control").addClass("validation error");
      $(".email-err").text("this is fill cannot be empty");
      alert("email1");
      hasError = true;
    }else if (!emailReg.test($.trim(email))) {
      $(".email-control").addClass("validation error");
      $(".email-err").text("email format invalid");
      alert("email2");
      hasError = true;
    }

    console.log(hasError);

    if(hasError == false) {
     var formInput = $(".ink-form").serialize();
        $.post($(".ink-form").attr('action'),formInput, function(data){
        alert("Thank you for your comment!");
      });
    }

    return false;

	});
});