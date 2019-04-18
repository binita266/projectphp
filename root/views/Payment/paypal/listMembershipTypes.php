

<?php
session_start();

require_once '../../../model/Database.php';
require_once '../../../model/membership.php';

//include '../header.php';

if(isset($_SESSION['id']))
{
	$client_id = $_SESSION['id'];
	$username = $_SESSION['username'];
	echo "Welcome" . " " .$username. "<br>";
	
	

	$dbcon = Database::getDb();
	$s = new Member();
	$mymember =  $s->getAllMembers(Database::getDb());

}else{
	
	echo  "<a href='login.php'></a>";
	echo "<a href='../login-register/login.php'>Login</a>";
	 
	
	}
	
if(isset($_POST['submit']))
{
	//$title = $_POST['$member->title'];
	$clientid = $_POST['$client_id'];
	print_r($_POST);
	
	echo "Your membership level is" . " " .$clientid. "the price is". $clientid."<br>";
	
}

?>
<h1> Membership Levels </h1>
<?php
foreach($mymember as $member){?>
	<!--<form action="" method = "get" id="ak_memberform" name="ak_member_form">    -->     
<div class="container">
    <div class="row">
       
        <div class="col-md-4">
            <div class="panel panel-primary">
				
                <div class="panel-heading">
                    <h4 class="text-center">
                        <?php echo "$member->title" ?>
					 </h4>
                </div>
                <div class="panel-body text-center">
                    <p class="ak_lead">
                        <?php echo "$member->price   /Month "?>
						</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Personal use</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Unlimited projects</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>27/7 support</li>
                </ul>
                <div class="panel-footer">
   <?php echo
        "<form action='listmembershiptypes.php' method='post'>" .
        "<input type='hidden' value='$client_id' name='client_id' />".
        "<input type='submit' value='Pay' name='Join' />".
        "</form>" .
        
        "</li>";
}
?>
 </div>
            </div>
        </div>



<p> You'll be taken to Paypal to complete your payment.</p>
<?php 
//<?php include "../footer.php"; ?>



</body>

</html>