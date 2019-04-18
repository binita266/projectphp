<?php
session_start();

require_once '../model/Database.php';
require_once '../model/membership.php';
require_once '../model/payment.php';



//include 'header.php';
if(isset($_SESSION['id']))
{
	$client_id = $_SESSION['id'];
	$username = $_SESSION['username'];
	echo "Welcome" . " " .$username. "<br>";
	//echo $client_id;
	
var_dump($_POST);
	
	
	
	
	

}else{
	
	echo  "<a href='login.php'></a>";
	echo "<a href='../login-register/login.php'>Login</a>";
	 
	
	}




//get membership data from database
$dbcon = Database::getDb();
$s = new Member();
$mymember =  $s->getAllMembers(Database::getDb());

?>
<h1> Select Membership Type </h1>
<?php
foreach($mymember as $member){?>
	<form action="paypal/checkout.php" method = "POST" id="ak_memberform" name="ak_member_form">         
<div class="container">
    <div class="row">
       
        <div class="col-md-4">
            <div class="panel panel-primary">
						
                <div class="panel-heading">
                    <h4 class="text-center">
					
                        <?php echo "$member->title"?>
						
					 </h4>
                </div>
                <div class="panel-body text-center">
                    <p class="ak_lead">
                        <?php echo "$member->price". " " . "/MONTH"?> 
						</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "$member->benefitdesc1"?> </li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "$member->benefitdesc2"?></li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "$member->benefitdesc3"?></li>
                </ul>
                <div class="panel-footer">
			</div>
			

		</div>
    </div>
</div>
<input type="hidden" name="id" value='<?php echo $client_id;?>' />
<input type="hidden" name="title" value='<?php echo $member->title;?>' />
<input type="hidden" name="price" value='<?php echo $member->price;?>' />

 <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
 </form

<?php
}
?>
<p> You'll be taken to Paypal to complete your payment.</p>