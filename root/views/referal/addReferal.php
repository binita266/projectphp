<?php

session_start();


require_once '../../model/Database.php';
require_once '../../model/referal.php';

include '../header.php';

$pattern = "/^[a-zA-Z ]*$/";
$fname = $femail = $comment =  "";
$nameerr = $emailerr = $commenterr = "";


if(isset($_SESSION['id']))
{
	$client_id = $_SESSION['id'];
	$username = $_SESSION['username'];
	echo "Welcome" . " " .$username. "<br>";
	
	
	
	if (isset($_POST['friend_name']))
		
	{	
		
		$fname = $_POST['friend_name'];	
		$femail = $_POST['friend_email'];
		$comment = $_POST['comment'];	
		
		//validate name
		if (empty($fname)){
			$nameerr = "Please enter your friend's name<br />";
		}elseif (!preg_match($pattern,  $fname)) {
			$nameerr = "Please enter valid name<br/>";
		}else {
			$nameerr = "";
	   }
	   //validate email
	   if (empty($femail)){
			$emailerr = "Please enter email <br />";
		}elseif(!filter_input(INPUT_POST, 'friend_email', FILTER_VALIDATE_EMAIL)){
			$emailerr = "Please enter valid email format<br />";
		}else {
			$emailerr = "";
		}
		
		//check for entry in the comment field
		
		 if (empty($comment)){
		$commenterr = "Please enter your message";
		}else {
		 $commenterr = "";
		}
	  
		
	   
		if ($nameerr == "" && $emailerr == "" && $commenterr == "") {
			
		
		
			$db = Database::getDb();
			$m = new Referal();
			
			$c = $m->addReferal($client_id, $fname, $femail, $comment, $db);
			
			if($c) {
				echo "Referal added successfully ";
			}
		}else {
			echo "Please enter all required fields";
		}
	}

}else{
	//"<li><a href='referalDetail.php?id=$referal->id'>" .  $referal->friend_name  . "</a>".
	echo  "<a href='login.php'></a>";
	echo "<a href='../login-register/login.php'>Login</a>";
	 
	
	}

	
	
	
	
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_referal_wrapper">

					<form action="" method = "post" id="ak_referform" name="ak_refer_form">
						<h2> Recommend our site to a friend </h2>  
						
						Friend Name:<br/> <input type="text" class="ak_inputfield" name="friend_name" value="<?= $fname; ?>" class="textbox"/>
										<span style="color:red;">
										<?= $nameerr; ?>
										</span>
										<br />

						Friend Email:<br/> <input type="text" class="ak_inputfield" name="friend_email" value="<?= $femail; ?>" class="textbox"/>
										<span style="color:red;">
										<?php
											if(isset($emailerr)) {
												echo $emailerr;
											}
										?>
											</span>
										<br />
									
						Comment:<br/> <input type="text" id="ak-comment" class="ak_inputfield" name="comment" value="<?= $comment; ?>" class="textbox"/>
										<span style="color:red;">
										<?= $commenterr; ?>
										</span>
										<br />
						
						 <input type="submit" id="ak_add_refer_but" name="refer" value="Add Referal">
						 <div id="ak_refer_message">
						 </div>
						 
					</form>		
				</div>
			</div>
		</div>
	</div>

</div>



<?php include "../footer.php"; ?>
