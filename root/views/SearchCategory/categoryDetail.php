<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php
$page_title = "CategoryDetail";
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

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();
    $c = new Category();
    $category = $c->getCategoryById($id, $dbcon);
}
echo "<div class='container'>";
echo "<br><br><br><h2>Admin</h2>";
echo  "Title: " . $category->title . "<br />";
echo  "Description: " . $category->description . "<br />";

echo '<a href="listcategoriesAdmin.php" class="btn btn-default">Go Back</a>';
echo "</div>";