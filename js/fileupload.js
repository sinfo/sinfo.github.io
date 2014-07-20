$(function () {
  "use strict";

  var url = "http://resumes.bananamarket.eu/resume";

  var file;

  $("#file").change(function () {
    //console.log(arguments);

    file = $("#file").val();

    $("#upload").removeClass("red");
    $("#upload").addClass("green");

    $("#upload").text("Upload " + file);

    $("#upload").click(uploadFile);

    $("#upload").show();
  });

  function uploadFile() {
    $.ajax({
      type: "POST",
      url: url,
      enctype: "multipart/form-data",
      data: {
        file: file
      },
      complete: function (response, status) {
        //console.log(arguments);

        if (status !== "success") {
          $("#upload").removeClass("green");
          $("#upload").addClass("red");

          $("#upload").text("Upload failed.");
        }
        else {
          $("#upload").removeClass("red");
          $("#upload").addClass("green");

          $("#upload").text("Upload complete.");
        }
      }
    });
  }
});
