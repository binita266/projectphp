<?php
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/User.php';
session_start();
//waiting for delete button submit
if(isset($_POST['deleteUser'])){

    $id = isset($_SESSION['id']);
    $db = Database::getDb();
    $u = new User();
    $effectedRow = $u->deleteUser($id, $db);
    if($effectedRow){
        header("Location: login.php");
    }
}