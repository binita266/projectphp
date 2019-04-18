
<?
//simple user view
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Feedback.php';
require_once '../../model/User.php';
session_start();
//$_SESSION['productid'] = 3;
if(isset($_GET['productid'])) {
  $dbcon = Database::getDb();
  $f = new Feedback();
  $product_id = $_GET['productid'];
  $feedbacks =  $f->getFeedbackByProductId($product_id,$dbcon);
  }else{
  header("Location: index.php");
}

?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<div class="container">
  <h2>Feedback for a product for a simple user</h2>            
  <table class="table table-striped">
  <?foreach($feedbacks as $feedback){
  		$user_id = $feedback->user_id;
  		$ud = new User();
  		$user = $ud->getUserById($user_id, $dbcon);
  		$username = $user->fname . " " . $user->lname;

  ?>
<tr>
	<th><?= $feedback->title; ?></th>
	<tr>
		<td style="width: 15%"><?= $username; ?></td>
		<td><?= $feedback->message; ?></td>
	</tr>

</tr>
	<?
		}
	?>
  </table>
</div>




<!-- FOOTER -->
<?php include "../footer.php"; ?>