<?php
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/User.php';
require_once "../../model/CityProvince.php";

//waiting for update button submit from listuser.php
session_start();
if(isset($_SESSION['id'])){
  if(isset($_GET['id'])){
  
    $userid = $_GET['id'];
    $db = Database::getDb();
    $u = new User();
    $user = $u->getUserById($userid, $db);
    $cp = new CityProvince();
    $provinces = $cp->getAllProvinces($db);
    $cities = $cp->getAllCities($db);
    
//waiting for update button submit from below form

    if(isset($_POST['userUpdated'])){
         $id = $_POST['uid'];
         $fname = $_POST['fname'];
         $lname = $_POST['lname'];  
         $address = $_POST['address'];
         $province = $_POST['province'];
         $city = $_POST['city'];      
         $postal_code = $_POST['postal_code'];       
         $username = $_POST['username'];
         $email = $_POST['email'];
         $alternative_email = $_POST['alternative_email'];
         $phone_number = $_POST['phone_number'];

          $db = Database::getDb();
          $u = new User();
          $effectedRow = $u->updateUser($id,$fname,$lname,$username, $address, $city, $province, $postal_code,$email, $phone_number,$alternative_email, $db);
          
          if($effectedRow){
              header("Location: userProfile.php");
          } else {
              echo  "Error Occured Please try again";
          }


        }
  }

}
else{
  
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


<!--form for getting details -->
<div class="col-sm-8">
  <form action="" method="post">
      <input type="hidden" name="uid" value="<?= $userid; ?>" />
      FName: <input type="text" name="fname" value="<?= $user->fname; ?>" /><br/>
      lNAME: <input type="text" name="lname" value="<?= $user->lname; ?>" /><br />
      username: <input type="text" name="username" value="<?= $user->username; ?>" /><br />
      city: <input type="text" name="city" value="<?= $user->city; ?>"/><br />
      province: <input type="text" name="province" value="<?= $user->province; ?>"/><br />
      postal_code: <input type="text" name="postal_code" value="<?= $user->postal_code; ?>"/><br />
      address: <input type="text" name="address" value="<?= $user->address; ?>"/><br />
      email: <input type="email" name="email" value="<?= $user->email; ?>"/><br />
      alternative_email: <input type="text" name="alternative_email" value="<?= $user->alternative_email; ?>"/><br />
      phone_number: <input type="text" name="phone_number" value="<?= $user->phone_number; ?>"/><br />
      <input class="btn btn-success" type="submit" name="userUpdated" value="Update">
  </form>
</div>
<div class="col-sm-4">
<a href="userProfile.php?id=<?= $userid?>" class="btn btn-primary">Back To Profile</a>
<a href="updatePassword.php?id=<?= $userid?>" class="btn btn-info">Update Password</a> 
</div>

<!-- Footer -->
<?php include "../footer.php"; ?>
