<!-- HEADER -->
<?php 
$page_title = "Contact Form";
include "../../views/header.php";
require_once '../../model/Database.php';
require_once '../../model/ContactForm.php';
?>

<h2>We would like to hear from you!!!</h2>
  
<?php

function check($info, $patternInfo){
    
      if($info == ""){
            return "Please enter value.";
                      }
      if(!preg_match($patternInfo, $info)){
        return "please enter valid data.";
           }
        
        }
		
$fnameErr = $lnameErr = $numberErr = $emailErr = $messageErr = " ";
$fname = $lname = $number = $email = $city = $message = $gender =" ";

if(isset($_POST['addmsg'])){
		 $fname = $_POST['fname'];
		 $lname = $_POST['lname'];
		 $number = $_POST['number'];
		 $email = $_POST['email'];
		 $city = $_POST['city'];
		 //$gender=filter_input(INPUT_POST, 'gender');
		 $category = $_POST['category'];
		 $message = $_POST['message'];
        
        $db = Database::getDb();
        $c = new ContactForm();
        $my_data = $c->addContactForm($fname, $lname, $number, $email, $city, $gender, $category, $message, $db);
		
	   

// validation

 // created regex for name and last name.
    $pattern = "/^[a-zA-z]*$/";

    // validation for first name.
    
    $fnameErr = check($fname, $pattern);

    //  validation for lastname.
    $lnameErr = check($lname,$pattern);


	
    if (empty($number)) {
        $numberErr =  "Please enter phone number <br />";
    } elseif (!preg_match("/^[0-9]{10}$/", $number)) {
        $numberErr =  "Please enter valid phone number <br />";
    } else {
        $numberErr = "";
    }
	
	 if ($email == "") {
        $emailErr =  "Please enter email <br />";
    }elseif(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
        $emailErr =  "Please enter valid email format<br />";
    }else {
        $emailErr =  "";
    }
	
   if($gender == NULL){
     $gendererr= "Please Select gender";
   }

 if (empty($message)) {
        $messageErr =  "Please enter message<br />";
    } else {
        $numberErr = "";
    }   
}
	?>
<main id="main">
<div class="container">
  <h2><center>Get In Touch</center></h2>
    <div class="container-fluid"  style="background-color:#cfd1d3;">
      <div class="row">
        <div class="col-sm-4"><center><i class="fas fa-map-marker-alt"></i><br/><br/><br/>205 Humber College Blvd.,<br/>Toronto,<br/>Ontario, <br/> Canada <br/> M9W 5L7</center></div>
        <div class="col-sm-4"><center><i class="fas fa-envelope-open-text"></i><br/><br/><br/>test123@gmail.com</center></div>
        <div class="col-sm-4"><center><i class="fas fa-phone"></i><br/><br/><br/>1234567890</center></div>
    </div>
   </div>
</div>

<div class="container">	
</br></br>	
<!--form starts here-->
 <form action="#" method="post" id="form">
   <div class="form-group">
     <label for="contact_form_fname">First Name:<span class="red">*<?= $fnameErr; ?></span></label>
     <input type="text" class="form-control" name="fname" value="<?= $fname; ?>" placeholder="First name..."><br />
    </div>
	
	<div class="form-group">
	<label for="contact_form_lname">Last Name:<span class="red">*<?= $lnameErr; ?></span></label>
    <input type="text" name="lname" class="form-control" value="<?= $lname; ?>" placeholder="Last name..."><br /></div>
	
	<div class="form-group">
    <label for="contact_form_number">Phone:<span class="red">*<?= $numberErr; ?></span></label><br />
    <input type="text" name="number" class="form-control"  value="<?= $number; ?>" placeholder="Phone..."><br /></div>
	
	<div class="form-group">
	<label for="contact_form_email">E-mail:<span class="red">*<?= $emailErr; ?></span></label><br />
    <input type="text" name="email" class="form-control" value="<?= $email; ?>" placeholder="E-mail..."><br /></div>
	
	<div class="form-group">
	<label for="contact_form_city">City:</label><br />
    <input type="text" name="city" class="form-control" value="<?= $city; ?> "><br /></div>
	
	<div class="form-check form-check-inline">
	  <label for="contact_form_gender">Gender:</label><br />
      <input type="radio" name="gender" value="male"> Male<br />
      <input type="radio" name="gender" value="female"> Female<br />
      <input type="radio" name="gender" value="other"> Other<br />
    </div>


	<div class="col-auto my-1">
      <label for="inlineFormCustomSelect">Category</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">
        <option selected>Choose...</option>
        <option value="Cars">Cars</option>
        <option value="Phones">Phones</option>
        <option value="Sports">Sports</option>
		<option value="Others">Others</option>
      </select>
	</div>
	
	<div class="form-group">
      <label for="contact_form_message">Message:<span class="red">*<?= $messageErr; ?></span></label><br />
      <input type="text" name="message" value="<?= $message; ?>" placeholder="Message..." ><br />
	
      <input type="submit" name="addmsg" value="Send Message" class="btn btn-success"></div>
 </form>
</div>
</main>

<!--footer-->

<?php 
include "../../views/footer.php";
?>

	
	