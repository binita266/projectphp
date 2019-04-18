<?php

session_start();

//phpinfo();
require_once '../../model/Database.php';
require_once '../../model/referal.php';

include '../header.php';

$namePattern = "/^[a-zA-Z ]*$/";
$friend_name = $friend_email = $comment =  "";
$nameerr = $emailerr = $commenterr = "";


if(isset($_SESSION['id']))
{
	$client_id = $_SESSION['id'];
	$username = $_SESSION['username'];
	echo "Welcome" . " " .$username. "<br>";
	//echo $client_id;
	
	
	if (isset($_POST['refer']))
		
	{	
		//$client_id = $_SESSION['id'];
		
		
		//$client_id = $_POST['client_id'];
		$friend_name = $_POST['friend_name'];	
		$friend_email = $_POST['friend_email'];
		$comment = $_POST['comment'];	
	
		
		$db = Database::getDb();
		$m = new Referal();
		
		$c = $m->addReferal($client_id, $friend_name, $friend_email, $comment, $db);
		
		if($c) {
			echo "Referal added successfully ";
		}else {
			echo "problem adding a referal";
		}
	}

}else{
	//"<li><a href='referalDetail.php?id=$referal->id'>" .  $referal->friend_name  . "</a>".
	echo  "<a href='login.php'></a>";
	echo "<a href='../login-register/login.php'>Login</a>";
	 
	
	}

	
	//validate for empty field and if entry matches pattern
	function validate_name($fieldName, $fieldValue, $pattern) {   
		if (empty($fieldValue)){
			$nameerr = "Please enter" . ' ' . "your friend's name<br />";
		}elseif (!preg_match($pattern,  $fieldValue)) {
			$nameerr = "Please enter valid" . ' ' ."name<br/>";
		}else {
			$nameerr = "";
	   }
	   return $nameerr;
	}  

	//validate email for empty field and email format
	function validate_email($fieldName, $fieldValue) {   	
		if (empty($fieldValue)){
				$emailerr = "Please enter email <br />";
			}elseif(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
				$emailerr = "Please enter valid email format<br />";
			}else {
				$emailerr = "";
			}
			return $emailerr;
	   }
   
	
   function validate_empty ($fieldName, $fieldValue){
	   if (empty($fieldValue)){
		$commenterr = "Please enter" . ' ' .$fieldName;
	   }else {
		 $commenterr = "";
	   }
	   return $commenterr;
   }
  
	
	
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak-referal_wrapper">

					<form action="" method = "post" id="ak_referform" name="ak_refer_form">
						<h2> Recommend our site to a friend </h2>  
						
						Friend Name:<br/> <input type="text" class="ak_inputfield" name="friend_name" />
									<span class="error">* <?php echo validate_name('friend_name', $friend_name,$namePattern);?></span><br/>
						Friend Email:<br/> <input type="text" class="ak_inputfield" name="friend_email" />
								<span class="error">*  <?php echo validate_email('friend_email', $friend_email);?></span><br/></br>
									
						Comment:<br/> <input type="text" id="ak-comment" class="ak_inputfield" name="comment" />
									<span class="error">* <?php echo validate_empty('comment', $comment,$namePattern);?></span><br/>			
								
						
						 <input type="submit" id="ak_add_refer_but" name="refer" value="Add Referal">
						 <div id="ak_refer_message">
						 </div>
						 
					</form>		
				</div>
			</div>
		</div>
	</div>

</div>



<?php include "../footer.php"; ?>
