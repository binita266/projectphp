
<!-- 
Author:    Rohit Arora; n01269796;
Feature:   Registeration -->
<?php 
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/User.php';
require_once "../../model/CityProvince.php";
require_once "function.php";


$db = Database::getDb();
$cp = new CityProvince();
$provinces = $cp->getAllProvinces($db);

$msg ="";
$fname = $lname = $address = $postal_code  = $username = $password =  $cpassword =  $email = $alternative_email = 
$phone_number = "";
$fnamerr = $lnamerr = $addresserr  = $postal_codeerr = $usernameerr = $passworderr = $cpassworderr = $emailerr = $alternative_emailerr = $phone_numbererr = "";

    //waiting for user add button submit
    if(isset($_POST['useradd'])){

       $fname = $_POST['fname'];
       $lname = $_POST['lname'];  
       $address = $_POST['address'];
       $province = $_POST['province'];
       $city = $_POST['city'];      
       $postal_code = $_POST['postal_code'];       
       $username = $_POST['username'];
       $password = $_POST['password'];
       $cpassword = $_POST['cpassword'];
       $email = $_POST['email'];
       $alternative_email = $_POST['alternative_email'];
       $phone_number = $_POST['phone_number'];

       //checking validation
       $valid = validate($fnamerr, $lnamerr,  $addresserr, $postal_codeerr,  $usernameerr,  $passworderr,  $cpassworderr ,  $emailerr ,             $alternative_emailerr, $phone_numbererr, $fname,  $lname ,  $address,  $postal_code,  $username ,  $password,   $cpassword,             $email,  $alternative_email,  $phone_number,$db);
       if($valid){
                   $u = new User();
                   $effectedRow = $u->addUser($fname,$lname,$username, $address, $city, $province, $postal_code, $email, $phone_number, $password,$alternative_email, $db);
                
                   if($effectedRow){
                    echo "hua";
                       $msg = "Thanks!! your details have been sucessfully added";
                       //header("Location: index.php");
                   } else {
                        //header("Location: customerr.php");
                       $msg =  "Error Occured Please try again";
                   }

        }
}



?>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
            
        </script>

    <div class="r_main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="../../img/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fname">First Name :</label>
                                <input type="text" name="fname" id="fname" value="<?= $fname; ?>"required/>
                                <span class="hidden" style="color: red"> <?= $fnamerr;?></span>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name :</label>
                                <input type="text" name="lname" id="lname" value="<?= $lname; ?>" required/>
                                <span class="hidden" style="color: red"> <?= $lnamerr;?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Street">Street :</label>
                            <input type="text" name="address" id="Street" value="<?= $address; ?>" required/>
                            <span class="hidden" style="color: red"> <?= $addresserr;?></span>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="Province">Province :</label>
                                <div class="form-select">
                                    <select name="province" id="province">
                                        <? foreach ($provinces as $province) {
                                        ?>    
                                        <option value="<?= $province->admin ?>"><?= $province->admin ?></option>
                                        <?  }
                                        ?>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">City :</label>
                                <div class="form-select">
                                    <select name="city" id="city">
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="Postcode">Postcode :</label>
                            <input type="text" name="postal_code" id="Postcode" value="<?= $postal_code; ?>">
                            <span class="hidden" style="color: red"> <?= $postal_codeerr;?></span>
                        </div>
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" name="username" id="username" value="<?= $username; ?>"/>
                            <span class="hidden" style="color: red"> <?= $usernameerr;?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="text" name="password" id="password"  />
                            <span class="hidden" style="color: red"> <?= $passworderr;?></span>
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password :</label>
                            <input type="text" name="cpassword" id="cpassword" />
                            <span class="hidden" style="color: red"> <?= $cpassworderr;?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" id="email" value="<?= $email; ?>"/>
                            <span class="hidden" style="color: red"> <?= $emailerr;?></span>
                        </div>
                        <div class="form-group">
                            <label for="alteremail">Alternate Email ID :</label>
                            <input type="email" name="alternative_email" id="alteremail" value="<?= $alternative_email; ?>"/>
                            <span class="hidden" style="color: red"> <?= $alternative_emailerr;?></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone :</label>
                            <input type="text" name="phone_number" id="phone" value="<?= $phone_number; ?>" />
                            <span class="hidden" style="color: red"> <?= $phone_numbererr;?></span>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="useradd" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
 <div><?= $msg; ?></div>



<script>
    $(document).ready(function (){
       
       province = $('#province').val();

            $.ajax({
                url:"getCity.php",
                method:"GET",
                data:{province: province},
                success:function(cities){           
                $('#city').html(cities);
                }
              });

        $('#province').change(function(){
           province = $('#province').val();
          
            console.log(province);
            $.ajax({
                url:"getCity.php",
                method:"GET",
                data:{province: province},
                success:function(cities){                 
                $('#city').html(cities);
                }
              });




        })


    })
</script>

   
<!-- Footer -->
<?php include "../footer.php"; ?>
