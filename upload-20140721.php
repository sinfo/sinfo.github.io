<?php
//Сheck that we have a fil
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
  //I should check for extentions and size. No time. As an alternative, create a folder outside the tree.
  $filename = basename($_FILES['uploaded_file']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
  /* if (($ext == "SOMETHING LIKE PDF") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && 
    ($_FILES["uploaded_file"]["size"] < 10000000 OR SOMETHING LIKE THIS)) { */
 
    //Not sure about the path yet, but it should be something like this
      $newname = dirname(__FILE__).'/upload/'.$filename;
      //Check if the file with the same name is already exists on the server
      if (!file_exists($newname)) {
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
           echo "It's done! The file has been saved as: ".$newname;
        } else {
           echo "Error: A problem occurred during file upload!";
        }
      } else {
         echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists.<br> If you want to replace your previous cv, please send us an email at <a href=\"mailto:geral@sinfo.org\">geral@sinfo.org</a>";
      }
  /*} else {
     echo "Error: Only files with <these> formats, smaller than <size> are accepted for upload ";
  }*/
} else {
 echo "Error: No file uploaded";
}
?>
