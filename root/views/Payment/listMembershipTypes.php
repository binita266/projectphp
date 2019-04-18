<?php
require_once '../../model/Database.php';
require_once '../../model/membership.php';

include '../header.php';


if(isset($_POST['submit'])){
// Fetching variables of the form which travels in URL
$title = $_POST['title'];
$price = $_POST['price'];

if($title !=''&& $price !='')
{
//  To redirect form on a particular page
header("Location:paypal.php");
}
else{
?><span><?php echo "Please fill all fields.....!!!!!!!!!!!!";?></span> <?php
}
}
?>
<?php

$dbcon = Database::getDb();
$s = new Member();
$mymember =  $s->getAllMembers(Database::getDb());

?>
<h1> Membership Levels </h1>
<?php
foreach($mymember as $member){?>
	<form action="" method = "get" id="ak_memberform" name="ak_member_form">         
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
                        <?php echo "$member->price"?>
						</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Personal use</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Unlimited projects</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>27/7 support</li>
                </ul>
                <div class="panel-footer">
   <?php echo
        "<form action='paypal.php' method='post'>" .
        "<input type='hidden' value='$member->id' name='id' />".
        "<input type='submit' value='Payment' name='Payment' />".
        "</form>" .
        
        "</li>";
}
?>
 </div>
            </div>
        </div>



<p> You'll be taken to Paypal to complete your payment.</p>


<?php include "../footer.php"; ?>



</body>

</html>