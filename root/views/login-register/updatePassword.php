<?php
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/User.php';
require_once "function.php";

//waiting for getting id of user when click a user in  listuser.php
session_start();
if(isset($_SESSION['id'])){
       
        $opasserr = $passerr = $cpasserr = "";
        if(isset($_POST['passUpdate'])){
          $userid = $_SESSION['id'];
          $db = Database::getDb();

          $opass = $_POST['opass'];
          $newpass = $_POST['newpass'];
          $cnewpass = $_POST['cnewpass'];

          $valid = validateUpdatePassword($opasserr,$passerr, $cpasserr,$opass, $newpass,$cnewpass,$userid,$db);
	      if($valid){
	       	$u = new User();
	       	$effectedRow =  $u->updateUserPassword($userid,$newpass,$db);
	       	header("Location: userProfile.php");
	      }

        }   

}else{
  header("Location: login.php");
}

?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <div class="col-sm-10">
    <div class="jumbotron">
      <h2>Update Password</h2>
      <form class="form-horizontal" method="POST">
        <div class="form-group">
          <label class="control-label col-sm-2" for="opass">Previuos Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="opass" placeholder="Enter old password" name="opass">
            <span style="color: red"> <?= $opasserr;?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="newpass"> New Password:</label>
          <div class="col-sm-10">          
            <input type="password" class="form-control" id="newpass" placeholder="Enter new password" name="newpass">
            <span style="color: red"> <?= $passerr;?></span>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="cnewpass">Confirm New Password:</label>
          <div class="col-sm-10">          
            <input type="password" class="form-control" id="cnewpass" placeholder="Confirm new password" name="cnewpass">
            <span style="color: red"> <?= $cpasserr;?></span>
          </div>
        </div>
        
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" name="passUpdate">Update Password</button>
          </div>
        </div>
      </form>
    </div>
</div>
<div class="col-sm-2">
<a href="userProfile.php" class="btn btn-primary">Back To Profile</a>
</div>



<!-- Footer -->
<?php include "../footer.php"; ?>