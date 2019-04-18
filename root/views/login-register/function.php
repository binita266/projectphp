<?php
function validateUpdatePassword(&$opasserr,&$passerr, &$cpasserr,$opass, $newpass,$cnewpass,$userid,$db){
$u = new User();
$user = $u->getUserById($userid, $db);
$userpassword = $user->password;

if(empty($opass)){
 $opasserr =  "Please enter old password";
  return false; 
}
elseif(strcmp($opass,$userpassword) != 0){
    $opasserr = "Please Enter Correct password";
    return false; 
  }

if(empty($newpass)){
 $passerr =  "Please enter new password";
  return false; 
}
elseif(empty($cnewpass)){
 $cpasserr =  "Please enter confirm new password";
  return false; 
}
elseif(strcmp($newpass,$cnewpass) != 0){
    $cpasserr = "Confirm password does not match with new password";
    return false; 
  }
  return true;

}
 





function validate(&$fnamerr, &$lnamerr,  &$addresserr, &$postal_codeerr,  &$usernameerr,  &$passworderr,  &$cpassworderr ,  &$emailerr ,  &$alternative_emailerr, &$phone_numbererr, &$fname,  &$lname ,  &$address, &$postal_code,  &$username ,  &$password,   &$cpassword,   &$email,  &$alternative_email,  &$phone_number,$db){
 
	if (empty($fname)) {
        $fnamerr =  "Please enter First Name";
        return false;
    }
    if (empty($lname)) {
        $lnamerr =  "Please enter Last Name ";
        return false;
    }
    
     if (empty($address)) {
        $addresserr =  "Please enter Last Name ";
        return false;
    }

    $patternPc ="/\w\d\w\s\d\w\d/i";
     if (empty($postal_code)) {
        $postal_codeerr =  "Please enter Postcode";
        return false;
       }elseif(!preg_match($patternPc,$postal_code)){
        $postal_codeerr =  "Please enter valid Postal code format eg M9V 4M8";
        return false;
       }

       $uu = new User();

    if (empty($username)) {
        $usernameerr =  "Please enter username";
        return false;
       }
       elseif( $uu->checkDuplicateUser($username,$db)){
        $usernameerr =  "Username already taken";
        return false;
       }


    $patternPass ="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,20}$";

    if (empty($password)) {
        $passworderr =  "Please enter password";
        return false;
       }
       // elseif(!preg_match($patternPass,$password)){
       //  $passworderr =  " Password must be at least 4 characters, no more than 20 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit.";
       //  return false;
       // }

    if (empty($cpassword)) {
        $cpassworderr =  "Please enter confirm Password";
        return false;
       }
       elseif(strcmp($cpassword,$password) != 0){
        $cpassworderr =  "Password does not match";
        return false;
       }
	
	if (empty($phone_number)) {
        $phone_numbererr =  "Please enter Phone Number ";
        return false;
    }


    if (empty($email)) {
        $emailerr =  "Please enter email <br />";
        return false;
    }
    elseif(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
        $emailerr =  "Please enter valid email format<br />";
        return false;
    }

    if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
        $$alternative_emailerr =  "Please enter valid email format<br />";
        return false;
    }
    return true;
        

}