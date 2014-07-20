$(function () {
  "use strict";

  var url = "http://resumes.bananamarket.eu/resume";

  $("#fileupload").fileupload({
    url: url,
    dataType: "multipart/form-data",
    progressall: function (e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      $("#upload").text("Uploading: " + progress + "%");

      if (progress === 100) {
        $("#upload").text("Upload complete.");
      }
    },
    add: function (e, data) {
      $("#upload").text("Upload " + data.files[0].name);
      $("#upload").click(function() {
        data.submit();
      });
      $("#upload").show();
    },
    always: function (e, data) {
      console.log(e, data);
    }
  });
});
