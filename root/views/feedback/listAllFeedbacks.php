<?
//admin view

include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Feedback.php';
require_once '../../model/Product.php';
require_once '../../model/User.php';
session_start();

if($_SESSION['username']=="admin"){
$dbcon = Database::getDb();
$f = new Feedback();
$feedbacks =  $f->getAllFeedbacks($dbcon);

}else{
  header("Location: ../login-register/login.php");
}

?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<div class="container">
  <h2>FeedBacks for admin</h2>
   <a href="../login-register/adminProfile.php" class="btn btn-primary">Back To Your Profile</a>  
   <a href='logout.php' class='btn btn-danger'>logout</a>         
  <table class="table table-hover">

  
    <thead>
      <tr>
      	<th>Sr. No.</th>
        <th>Title</th>
        <th>User Name</th>
        <th>Product Name</th>
        <th>Action</th>
      </tr>
    </thead>
  	<?	$count = 0;
    	foreach($feedbacks as $feedback){
        $feedbackid = $feedback->id;
        $title = $feedback->title;
	  		$user_id = $feedback->user_id;
	  		$ud = new User();
	  		$user = $ud->getUserById($user_id, $dbcon);
	  		$username = $user->fname . " " . $user->lname;

	  		$product_id = $feedback->product_id;
	  		$p = new Product();
	  		$product = $p->getProductById($product_id, $dbcon);
	  		$productname = $product->name;
	  		++ $count;

 	 ?>
    <tbody>
      <tr>
      	<td><?= $count; ?></td>
        <td><a href="feedbackDetail.php?id=<?= $feedbackid ?>"><?= $title; ?></a></td>
        <td><a href="../login-register/userDetail.php?id=<?= $user_id ?>"><?= $username; ?></a></td>
        <td><a href="../CRUD-products/detailsProduct.php?id=<?= $product_id ?>"><?= $productname; ?></a></td>
        <td >
        		<a href="feedbackDetail.php?id=<?= $feedbackid?>" class="btn btn-info">Info</a>
        		<a href="deleteFeedback.php?id=<?= $feedbackid?>" class="btn btn-danger">Delete</a>
     	</td>
      </tr>
   
    </tbody>

	<?
		}
	?>
  </table>
</div>


<!-- FOOTER -->
<?php include "../footer.php"; ?>