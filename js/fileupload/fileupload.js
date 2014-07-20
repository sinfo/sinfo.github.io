$(function () {
  "use strict";

  var url = "http://resumes.bananamarket.eu/resume";

  $("#fileupload").fileupload({
    url: url,
    dataType: "multipart/form-data",
    progressall: function (e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      $("#upload").text("Uploading: " + progress + "%");
    },
    add: function (e, data) {
      $("#upload").removeClass("red");
      $("#upload").addClass("green");
      $("#upload").text("Upload " + data.files[0].name);
      $("#upload").click(function() {
        $("#upload").removeClass("green");
        $("#upload").addClass("red");

        $("#upload").text("Upload failed.");
      });
      $("#upload").show();
    },
    always: function (e, data) {
      if (data.jqXHR && data.jqXHR.responseText && JSON.parse(data.jqXHR.responseText).success) {
        $("#upload").text("Upload complete.");
      }
      else {
        $("#upload").removeClass("green");
        $("#upload").addClass("red");

        $("#upload").text("Upload failed.");
      }
    }
  });
});

/*$(document).ready(function () {
  $("#uploadbutton").click(function () {
    var filename = $("#file").val();

    $.ajax({
      type: "POST",
      url: "addFile.do",
      enctype: 'multipart/form-data',
      data: {
        file: filename
      },
      success: function () {
        alert("Data Uploaded: ");
      }
    });
  });
});*/
