<?php
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Deal.php';


session_start();

if(isset($_SESSION['id'])) {

	if(isset($_GET['id'])) {

	$dealid = $_GET['id'];
	$dbcon = Database::getDb();
	$d = new Deal();
	$product_id = $deal->product_id;

  	$p = new Product();
  	$product = $p->getProductById($product_id,$db);
  	$user_id = $product->user_id;
    if($_SESSION['id'] == $user_id || $_SESSION['username']=="admin" ){
      
		$effectedRow =  $d->deleteDeal($dealid ,$dbcon);
		if($effectedRow){
			if($_SESSION['username']=="admin"){
				header("Location: listAllDeals.php");
			}else{
				header("Location: ../login-register/userProfile.php");
			}
	       
	    }
   }else{header("Location: ../login-register/userProfile.php");}
	}
	
}else{
  header("Location: ../login-register/login.php");
}

