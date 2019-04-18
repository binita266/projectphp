<?php
$page_title = "DeleteFAQ";
session_start();
require_once '../../model/Database.php';
require_once '../../model/Faq.php';


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
    $s = new Faq();
    $count = $s->deleteFaq($id, $dbcon);

    if($count){
        header("Location: listfaqs.php");
    }
}