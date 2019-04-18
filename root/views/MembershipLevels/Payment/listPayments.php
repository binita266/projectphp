<?php
session_start();
$page_title = "Payment List";
require_once '../../model/Database.php';
require_once '../../model/payment.php';

 include '../header.php';

$dbcon = Database::getDb();
$s = new Payment();
$mypay =  $s->getAllPayments(Database::getDb());
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_refer_list_wrapper">
<?php
foreach($mypay as $payment){
	
    echo "<li><a href='paymentDetail.php?id=$payment->id'>" .  $payment->paymentdate  . "</a>".
        "<form action='updatePayment.php' method='post'>" .
        "<input type='hidden' value='$payment->id' name='id' />".
        "<input type='submit' value='Update' name='update' />".
        "</form>" .
        "<form action='deletePayment.php' method='post'>" .
        "<input type='hidden' value='$payment->id' name='id' />".
        "<input type='submit' value='Delete' name='delete' />".
        "</form>" .
        "</li>";
}
?>
				</div>
			</DIV>			
		</div>
	</div>
</div>
<?php include "../footer.php"; ?>
















