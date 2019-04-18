<?php
require_once '../../model/Database.php';
require_once '../../model/ContactForm.php';

 if(isset($_POST['addmsg'])){
                       $msg = "Thanks!!  $fname; your details have been sucessfully added";
                       //header("Location: index.php");
                   } else {
                        //header("Location: customerr.php");
                       $msg =  "Error Occured Please try again";
                   }