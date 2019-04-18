<!--
Author:    Rohit Arora; n01269796;
-->

<!-- HEADER -->
<?php 
//login user view

include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Feedback.php';
require_once "function.php";



session_start();
//$_SESSION['productid'] = 33;
if(isset($_SESSION['id'])){
	$db = Database::getDb();
	$title = $message =  $msg = "";
	$titleerr = $messageerr = "";

 //waiting for user add button submit
	if(isset($_POST['feedAdd'])){
	   $title = $_POST['title'];
	   $message = $_POST['message'];  
	   $user_id = $_SESSION['id'];
	   $product_id = $_SESSION['productid'];

	   //checking validation
	   $valid = validateFeedback($titleerr, $messageerr, $title,$message);
	   if($valid){
	               $f = new Feedback();
	               $effectedRow = $f->addFeedback($title,$message,$product_id,$user_id, $db);
	               if($effectedRow){
	                   $msg = "Thanks!! your Feedback have been sucessfully added";
	                   //header("Location: index.php");
	               } else {
	                    //header("Location: customerr.php");
	                   $msg =  "Error Occured Please try again";
	               }

	    }
	}
}else{
  header("Location: ../login-register/login.php");
}

 ?>


 
	<div class="container-contact100">
	
		 <div><?= $msg?></div>
		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(../img/bg-01.jpg);">
				<span class="contact100-form-title-1">
					Feedback
				</span>

			</div>

			<form class="contact100-form validate-form" method="POST"  id="feedback-form">
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Title:</span>
					<input class="input100" type="text" name="title" value="<?= $title; ?>" placeholder="Enter a title"><span class="hidden" style="color: red"> <?= $titleerr;?></span>
					<span class="focus-input100"></span>
				</div>

			

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message:</span>
					<textarea class="input100" name="message" value="<?= $message; ?>" placeholder="Your Feedback"></textarea>
					<span class="hidden" style="color: red"> <?= $messageerr;?></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="feedAdd">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>





<!-- FOOTER -->
<?php include "../footer.php"; ?>
