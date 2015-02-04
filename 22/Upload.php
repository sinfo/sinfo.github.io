<?php
	$fileName = $_FILES["upload"]["name"]; // The file name
	$fileTmpLoc = $_FILES["upload"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["upload"]["type"]; // The type of file it is
	$fileSize = $_FILES["upload"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["upload"]["error"]; // 0 for false... and 1 for true
	if (!$fileTmpLoc) { // if file not chosen
	    echo "ERROR: Please browse for a file before clicking the upload button.";
	    exit();
	}

	if (!file_exists('CV/')) {
	    mkdir('CV/', 0777, true);
	}

	$fileName = date("jMhis") . '.pdf';
	if(copy($fileTmpLoc,"CV/$fileName")){

	    //"$fileName upload is complete";
	} else {
	    echo "move_uploaded_file function failed";
	}
?>