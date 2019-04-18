<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/referal.php';



if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $s = new Referal();
    $count = $s->deleteReferal($id, $dbcon);

    if($count){
        header("Location: listreferals.php");
    }
}
?>
