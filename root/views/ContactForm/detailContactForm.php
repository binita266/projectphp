<?php
$page_title = "CategoryDetail";
session_start();
include "../../views/header.php";
require_once '../../model/Database.php';
require_once '../../model/ContactForm.php';

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

    $t = new ContactForm();
    $cf = $t->getContactFormById($id, $dbcon);

}

echo "<div class='container'>";
echo "<br><br><br><h2>Admin</h2>";
echo  "First Name: " . $cf->f_name . "<br />";
echo  "Last Name: " . $cf->l_name . "<br />";
echo  "Phone Number: " . $cf->phone_number . "<br />";
echo  "Message : " . $cf->message . "<br />";
echo  "City : " . $cf->city . "<br />";
echo  "Gender : " . $cf-> gender ."<br />";
echo  "Category : " . $cf->category . "<br />";

echo '<a href="listContactForm.php" class="btn btn-default">Go Back</a>';
echo "</div>";