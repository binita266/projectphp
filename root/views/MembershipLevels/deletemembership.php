<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/membership.php';



if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $s = new Member();
    $count = $s->deleteMember($id, $dbcon);

    if($count){
        header("Location: listmembers.php");
    }
}




?>