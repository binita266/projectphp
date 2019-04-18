<?php

function validateFeedback(&$titleerr, &$messageerr, $title,$message){
 
  if (empty($title)) {
        $titleerr =  "Please enter title";
        return false;
    }
    if (empty($message)) {
        $messageerr =  "Please enter message";
        return false;
    }
  
    return true;
  }



 