<?php
session_start();
$page_title = "Payment Detail";
require_once '../../model/Database.php';
require_once '../../model/payment.php';

 include '../header.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $s = new Payment();
    $payment = $s->getPaymentById($id, $dbcon);
	

   // var_dump($payment);

}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_refer_detail_wrapper">
<?php
echo  "Payment Date: " . $payment->paymentdate . "<br />";
echo  "amountpaid : " . $payment->amountpaid . "<br />";
echo  "membership id : " . $payment->membership_id . "<br />";
echo  "client id : " . $payment->client_id . "<br />";




?>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php include "../footer.php"; ?>
 
