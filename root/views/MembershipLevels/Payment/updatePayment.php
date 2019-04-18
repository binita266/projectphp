<?php
session_start();
$page_title = "Update Payment";
require_once '../../model/Database.php';
require_once '../../model/payment.php';

 include '../header.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $s = new Payment();
    $payment = $s->getPaymentById($id, $dbcon);
   // var_dump($payment);

}

if(isset($_POST['ak_updpay'])){
    $id= $_POST['ak_rid'];//not sure about the id
    $paymentdate = $_POST['paymentdate'];
    $amountpaid = $_POST['amountpaid'];
    
    $dbcon = Database::getDb();
    $s = new Payment();
    $count = $s->updatePayment($id, $paymentdate, $amountpaid, $dbcon);

    if($count){
        header("Location: listpayment.php");
    } else {
        echo  "problem updating";
    }


}



?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_refer_update_wrapper">
					<form action="" method = "post">
						<input type="hidden" name="ak_rid" value="<?= $payment->id; ?>" /> 
						
						Payment Date:<br/> <input type="text" class="ak_inputfield" name="paymentdate" value="<?= $payment->paymentdate; ?>" /><br/>
									
						Amount:<br/> <input type="text" class="ak_inputfield" name="amountpaid" value="<?= $payment->amountpaid; ?>" /><br /> 
												
														
						<input type="submit" name="ak_updpay" id="ak_updpay_but" value="Update Payment">
						 
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "../footer.php"; ?>	

