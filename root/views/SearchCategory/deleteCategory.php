<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php
$page_title = "DeleteCategory";
session_start();
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

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $c = new Category();
    $count = $c->deleteCategory($id, $dbcon);
    if($count){
        header("Location: listcategoriesAdmin.php");
    }
}