<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php
$page_title = "UpdateCategory";
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

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $dbcon = Database::getDb();
    $s = new Category();
    $category = $s->getCategoryById($id, $dbcon);
}
if(isset($_POST['updcat'])){
    $id= $_POST['cid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dbcon = Database::getDb();
    $s = new Category();
    $count = $s->updateCategory($id, $title, $description, $dbcon);
    if($count){
        header("Location: listcategoriesAdmin.php");
    } else {
        echo "problem updating";
    }
}
?>
<div class="container">
    <br><br><br>
    <h2>Admin</h2>
    <form action="" method="post" class="col-md-6">
        <input type="hidden" name="cid" value="<?= $category->id; ?>" />
        Title: <input type="text" name="title" value="<?= $category->title; ?>" class="form-control" /><br/>
        Description: <input type="text" name="description" value="<?= $category->description; ?>" class="form-control" /><br />
        <input type="submit" name="updcat" value="Save" class="btn btn-default">
        <a href="listcategoriesAdmin.php" class="btn btn-default">Go Back</a>
    </form>
</div>