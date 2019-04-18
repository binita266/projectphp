<?php

//admin  view

include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Feedback.php';
require_once '../../model/Product.php';
require_once '../../model/User.php';


session_start();

if($_SESSION['username'] == "admin") {

	if(isset($_GET['id'])) {
	$feedbackid = $_GET['id'];
	$dbcon = Database::getDb();
	$f = new Feedback();
	$feedback =  $f->getFeedbackById($feedbackid ,$dbcon);
	$title = $feedback->title;
	$message = $feedback->message;

	$product_id = $feedback->product_id;
	$p = new Product();
	//$product = $p->getProductById($product_id, $dbcon);
	$productname = $product->name;

	$user_id = $feedback->user_id;
	$ud = new User();
	$user = $ud->getUserById($user_id, $dbcon);
	$username = $user->fname . " " . $user->lname;

	}
	
}else{
  header("Location: ../login-register/login.php");
}

?>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<div class="container">
  <div class="jumbotron">
    <a href='../login-register/logout.php' class='btn btn-danger'>logout</a> 
  	<h1>For Admin</h1>
     
    <h1><?= "Title  : " . $title . "<br/>";?></h1>
    <p><?= "Message  : " . $message ."<br/>";?></p>
    <p>
    	<a href="detailsProduct.php?id=<?= $product_id ?>"><?= "productname  : " . $productname ."<br/>";?></a>
    </p>
    <p>
    	<a href="userDetail.php?id=<?= $user_id ?>"><?= "username  : " . $username ."<br/>";?></a>
    </p>
  </div>
   
  <a href="listAllFeedbacks.php" class="btn btn-primary">Back To Feedbacks List</a>
  <a href="deleteFeedback.php?id=<?= $feedbackid?>" class="btn btn-danger">Delete</a>    



<!-- FOOTER -->
<?php include "../footer.php"; ?>

