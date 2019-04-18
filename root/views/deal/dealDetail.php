<?php
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Deal.php';
require_once '../../model/Product.php';
require_once '../../model/User.php';


session_start();
$userbuttons = $for = $userlink = $productlink ="";
//for simple user
if(isset($_GET['id'])) {
  $for = "simple user";
  $dealid = $_GET['id'];
  $db = Database::getDb();
  $d = new Deal();
  $deal =  $d->getDealById($dealid ,$db);
  $caption = $deal->caption;
  $start_date = $deal->start_date;
  $end_date = $deal->end_date;
  $product_id = $deal->product_id;

  $p = new Product();
  $product = $p->getProductById($product_id, $db);
  $productname = $product->name;
  $userid = $product->user_id;

  $productlink = "<a href='../CRUD-products/detailsProduct.php?id=$product_id'>Product : $productname</a>";

  }
  else{
   // header("Location : index.php")
  }

//for login user view
if(isset($_SESSION['id']) && $_SESSION['username'] != "admin" ) {
if($_SESSION['id'] != $userid){
      header("Location: ../login-register/userProfile.php");
    }
 $for = "login user";
 $userid = $_SESSION['id'];

$userbuttons = 
	"<a href='editDeal.php?id=$dealid' class='btn btn-info'>Edit</a>" . 
  "<a href='../login-register/userProfile.php' class='btn btn-primary'>Back To Profile</a> " . 
  "<a href='deleteDeal.php?id=$dealid' class='btn btn-danger'>Delete deal</a>"; 
	
}

//for admin view
//used id = 7 for admin only will be going to change
if($_SESSION['username'] == "admin") {
  $for = "login Admin";
  $userid = $product->user_id;
  $u = new User();
  $user = $u->getUserById($userid, $db);
  $userid = $user->id;
  $fullname = $user->fname . " " . $user->lname;
  $userlink ="<a href='../login-register/userDetail.php?id=$userid'>User : $fullname</a>";
 
  $userbuttons = 
  "<a href='listAllDeals.php' class='btn btn-primary'>Back To deal list</a> " . 
  "<a href='deleteDeal.php?id=$dealid' class='btn btn-danger'>Delete deal</a>"; 
}

?>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="container">
  <div class="jumbotron">
  	<h1>For <?= $for; ?></h1>
     
    <h1><?= "Title  : " . $caption . "<br/>";?></h1>
    <p><?= "Start date  : " . $start_date ;?></p>
    <p><?= "End date  : " . $end_date ;?></p>
    <p>
    	<?= $productlink;?>
    </p>
    <p>
    	<?= $userlink;?>
    </p> 
  </div> 
   <?= $userbuttons;?> 
</div>



<!-- FOOTER -->
<?php include "../footer.php"; ?>

