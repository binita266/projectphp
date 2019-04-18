<?php

if(isset($_POST['submit'])){
	//path of the file in temp directory
$file_temp = $_FILES['upfile']['tmp_name'];
//original path and file name of the uploaded file
$file_name = $_FILES['upfile']['name'];
//size of the uploaded file in bytes
$file_size = $_FILES['upfile']['size'];
//type of the file(if browser provides)
$file_type = $_FILES['upfile']['type'];
//error number
$file_error = $_FILES['upfile']['error'];

//folder to move the uploaded file
$target_path = "uploads/";
$target_path = $target_path .  $_FILES['upfile']['name'];
//
////move the uploaded file from tempe path to taget path
if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
    echo "The file ".  $_FILES['upfile']['name'] . " has been uploaded ";
    echo "<img src=" . $target_path  . ">";
} else{
    echo "There was an error uploading the file, please try again!";
}
//
//
}

?>

<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="" enctype="multipart/form-data" method="POST">
    Select file: <input type="file" name="upfile" id="upfile" >
    <input type="submit" name="submit" value="upload" >

</form>
</body>
</html>

