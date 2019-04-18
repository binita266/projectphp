
<!--
Author:    Rohit Arora; n01269796;
Feature:   Login after Registeration --> 
<?php 

require_once '../../model/Database.php';
require_once '../../model/User.php';
$msg="";
session_start();
	if(isset($_POST['login']))
		{

		$db = Database::getDb();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$u = new User();
		$valid = $u->validateUser($username,$password,$db);
		if($valid){
			$userid = $u->getUserId($username,$db);
		 	
       		$_SESSION['username'] = $username;
       		$_SESSION['id'] = $userid;
       		if($username == "admin"){
       			header("Location: adminProfile.php");
       		}else{
      			header("Location: userProfile.php");
		 //$msg = "welcome " . $username ."::::".$userid;
      		}
		 }
		 else{ 
		 	$msg = "Please Enter valid user or password ";
		 }
		

	}
include "../header.php"; 
?>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../../img/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST"  id="login-form" >
					<span class="login100-form-title">Login</span>
					<?= $msg?>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">Sign In</button>
					</div>

					<!-- will add when add the mailing api
					<div class="text-center">
						<span class="txt1">						
						<a class="txt2" href="#">Forgot Username | Password?</a></span>
					</div> -->

					<div class="text-center">
						<a class="txt2 btn btn-info" href="register.php">Sign Up</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- Footer -->
<?php include "../footer.php"; ?>