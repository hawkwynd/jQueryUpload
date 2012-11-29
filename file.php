<?php
/**
 * Author: sfleming
 * file.php
 * Date: 11/28/12
 */
    $upload_directory = "./Files/";



if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_directory . $_FILES["myfile"]["name"])) {

    print "File Uploaded Successfully";
    print "<br>";
    print "File: {$_FILES["myfile"]["name"]} size : {$_FILES["myfile"]["size"]} bytes. Type: {$_FILES["myfile"]["type"]}";

    // Now delete the file immediately - comment out for real use
    unlink($upload_directory. $_FILES["myfile"]["name"]);

} else {
    $errno = $_FILES["myfile"]["error"];

    switch($errno)
    {
        case "1":
            echo " Your file is too large. Please upload a smaller file.";
            break;
        default:
            echo $errno;
            break;

    }
}

