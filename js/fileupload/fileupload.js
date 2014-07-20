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
        data.submit();
      });
      $("#upload").show();
    },
    always: function (e, data) {
      console.log(e, data);

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
