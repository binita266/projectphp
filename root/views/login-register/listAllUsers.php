<?
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/User.php';
session_start();

if($_SESSION['username']=="admin"){
$db = Database::getDb();
$u = new User();
$users =  $u->getAllUsers($db);

}else{
  header("Location: login.php");
}
?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



<div class="container">
  <h2>All Users for admin</h2>
   <a href="../login-register/adminProfile.php" class="btn btn-primary">Back To Your Profile</a> 
   <a href='logout.php' class='btn btn-danger'>logout</a>          
  <table class="table table-hover">

  
    <thead>
      <tr>
      	<th>Sr. No.</th>
        <th>Name</th>
        <th>User Account Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
  	<?	$count = 0;
    	foreach($users as $user){
        $userid = $user->id;
	  		$fullname = $user->fname . " " . $user->lname;
        $username = $user->username;
        $email = $user->email;
	  		++ $count;

 	 ?>
    <tbody>
      <tr>
      	<td><?= $count; ?></td>
        <td><a href="userDetail.php?id=<?= $userid ?>"><?= $fullname; ?></a></td>
        <td><?= $username; ?></a></td>
        <td><?= $email; ?></a></td>
        <td >
        		<a href="userDetail.php?id=<?= $userid?>" class="btn btn-info">Info</a>
        		<a href="deleteUser.php?id=<?= $userid?>" class="btn btn-danger">Delete</a>
     	</td>
      </tr>
   
    </tbody>

	<?
		}
	?>
  </table>
</div>




<!-- Footer -->
<?php include "../footer.php"; ?>
