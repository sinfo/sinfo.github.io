function UploadFile() {

  var file = document.getElementById('upload').files[0];

  if (file) {
  	//Cheack File extention:
		var FileName = file.name;
	 	var FileExt = FileName.split('.')[FileName.split('.').length - 1].toLowerCase();

	 	if( FileExt != 'pdf'){
	 			alert('Please upload your CV in PDF!');
	 			return;
	 	}

	 //Upload File:

	 	var form = new FormData(file);

	 	form.append("upload", file);

	 	var ajax = new XMLHttpRequest();

		ajax.upload.addEventListener("progress", progressHandler, false);
		ajax.addEventListener("load", completeHandler, false);
		ajax.addEventListener("error", errorHandler, false);
		ajax.addEventListener("abort", abortHandler, false);
		ajax.open("POST", "Upload.php");
		ajax.send(form);
  }
}

function progressHandler(evt) {
  if (evt.lengthComputable) {
    document.getElementById('UploadCV').innerHTML = "Uploading ...";
  }
}

function completeHandler(evt) {
  document.getElementById('UploadCV').innerHTML = "Uploaded!";
}

function errorHandler(evt) {
	$(".ButtonUp").show();
  alert("There was an error attempting to upload the file.");
}

function abortHandler(evt) {
	$(".ButtonUp").show();
  alert("The upload has been canceled by the user or the browser dropped the connection.");
}