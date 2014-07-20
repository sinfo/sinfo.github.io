$(function () {
  "use strict";

  var url = "http://resumes.bananamarket.eu/resume";

  var file;

  $("#file").change(function () {
    file = $("#file").val();

    $("#upload").removeClass("red");
    $("#upload").addClass("green");

    $("#upload").val("Upload " + file);

    $("#upload-form").ajaxForm({
      beforeSubmit: function () {
        $("#upload").val("Uploading " + file + "...");
      },
      success: function (data) {
        $("#upload").removeClass("red");
        $("#upload").addClass("green");

        $("#upload").val("Upload complete.");
      },
      error: function (data) {
        $("#upload").removeClass("green");
        $("#upload").addClass("red");

        $("#upload").val("Upload failed.");
      },
    });

    $("#upload").show();
  });
});
