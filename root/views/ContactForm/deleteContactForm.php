<?php
require_once '../../model/Database.php';
require_once '../../model/ContactForm.php';

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $s = new ContactForm();
    $count = $s->deleteContactForm($id, $dbcon);

    if($count){
        header("Location: listContactForm.php");
    }
}