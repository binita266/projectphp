<?php
session_start();
$page_title = "Delete Payment";
require_once '../../model/Database.php';
require_once '../../model/payment.php';

 include '../header.php';

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $s = new Payment();
    $count = $s->deleteReferal($id, $dbcon);

    if($count){
        header("Location: listPayment.php");
    }
}
?>
<?php include "../footer.php"; ?>