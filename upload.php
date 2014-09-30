<?php

$uploadDirectory = dirname(__FILE__) . "/../../private/upload/";

 // The allmighty sysadmin teaches how it's done. Learn
 
  header('Content-Type: text/html; charset=utf-8');

  //
  // STEP 0: Сheck that we have a file. If we don't, take the dumb user away.
  //
  if((empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
    header("Location: http://www.sinfo.org");
    exit();
  }


  //
  // STEP 1: We can't trust the file extension. Making sure it's .pdf
  //
  $filename = basename($_FILES['uploaded_file']['name']);
  if(!preg_match('/^([A-Za-z-_]+)(\.pdf)$/i', $filename, $matches)) {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('The name of the file is invalid. It can only contain, uppercase and lowercase letters as well as - and _. The extension must be .pdf. Please try again.')
        window.location.href='http://www.sinfo.org'
        </SCRIPT>");
  }

  //
  // STEP 2: split the name from the extension and build a name such as name00.ext
  //
  $file_name = $matches[1];
  $file_ext  = $matches[2];
  $counter = 0;

  do {
    $filename = $file_name . sprintf("%02d", $counter) . $file_ext;   
    $newname = $uploadDirectory . $filename;
    $counter++;
  } while(file_exists($newname));

  //
  // STEP 3: move the file or tell the user you couldn't
  //
  if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('CV submitted successfully.')
        window.location.href='http://www.sinfo.org'
        </SCRIPT>");
  } else {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('There was a problem during the submission of the CV. Please contact us at <a href=\"mailto:geral@sinfo.org\">geral@sinfo.org</a>!')
        window.location.href='http://www.sinfo.org'
        </SCRIPT>");
  }

  //
  // STEP 4: profit
  //
?>
