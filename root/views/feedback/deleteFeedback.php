<?php
//admin delete
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Feedback.php';
require_once '../../model/Product.php';
require_once '../../model/User.php';

session_start();

if($_SESSION['username']=="admin") {

	if(isset($_GET['id'])) {
		$feedbackid = $_GET['id'];
		$dbcon = Database::getDb();
		$f = new Feedback();
		$effectedRow =  $f->deleteFeedback($feedbackid ,$dbcon);
		if($effectedRow){
				header("Location: listAllFeedbacks.php");
	    }
	}
	
}else{
  header("Location: ../login-register/login.php");
}

