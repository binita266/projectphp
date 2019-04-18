<?php
require_once '../../model/Database.php';
require_once '../../model/Product.php';

if(isset($_POST['deleteProduct'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $p = new Product();
    $count = $p->deleteProduct($id, $dbcon);

    if($count){
        header("Location: listProducts.php");
    }
}