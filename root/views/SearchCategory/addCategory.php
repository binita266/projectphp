<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php
$page_title = "AddCategory";

session_start();
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

// Only admin will be able to make some changes!
if(isset($_SESSION['username'] )){
    if ($_SESSION['username'] !== 'admin' ) {
        header("Location: ../login-register/login.php");
        die();
    } 
}else{
    header("Location: ../login-register/login.php");
    die();
}

if(isset($_POST['addcat'])){
    echo "<h2>Add new category</h2>";
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img_path = $_POST['img_path'];
    
    $db = Database::getDb();
    $c = new Category();
    $my_data = $c->addCategory($title, $description, $img_path, $db);


    //image upload--------------------------------------
    // $file_temp = $_FILES['upfile']['tmp_name'];
    // //original path and file name of the uploaded file
    // $file_name = $_FILES['upfile']['name'];
    // //size of the uploaded file in bytes
    // $file_size = $_FILES['upfile']['size'];
    // //type of the file(if browser provides)
    // $file_type = $_FILES['upfile']['type'];
    // //error number
    // $file_error = $_FILES['upfile']['error'];
    
    // //folder to move the uploaded file
    // $target_path = "uploads/";
    // $target_path = $target_path .  $_FILES['upfile']['name'];
    // ////move the uploaded file from tempe path to taget path
    // if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
    //     echo "The file ".  $_FILES['upfile']['name'] . " has been uploaded ";
    // } else{
    //     echo "There was an error uploading the file, please try again!";
    // }
}
?>
<div class="container">
    <!-- <div class="row"> -->
    <h2>Admin</h2>
    <h3>Add new Search Category</h3>
    <form action="" method="post">
        <label for="category_title">Title:</label>
        <input type="text" name="title" id="category_title" required /><br />
        <label for="category_desc">Description:</label>
        <input type="text" name="description" id="category_desc" required/><br />
        <label for="img_path">Image URL:</label>
        <input type="text" name="img_path" id="img_path"/><br />
        <!--         <label for="cupfile">Select Image</label>
        <input type="file" name="upfile" id="cupfile" ><br /> -->
        <input type="submit" name="addcat" value="Add Category" />
    </form>
    <a href="listcategoriesAdmin.php">Go to the list</a>
    <!-- </div> -->
</div>

