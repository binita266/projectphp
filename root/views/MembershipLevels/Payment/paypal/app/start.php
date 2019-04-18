<?php

//container to create a new instance of paypal object

require 'vendor/autoload.php';
//not sure about if this is the correct site.  It was showing success message before not it does not
define('SITE_URL', 'http://localhost/PHP%20Project%20New/project-techo-avengers/root/views/Payment/addpayment.php'); //to direct users after payment back to our site.


$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
    'AZgA9Jv7Mdwm1vbE_gAmqviAIx39hm0jZZAGwI5dbd5Wlhx-Dzv0QrQo-j49sIlcAJ5C39Y0mnJgC9iM',//client id from paypal generate code
    'EOg_IkC-GFZeuEpYSxI-7IX6slKwCU-tMQN7H52r6UIqKxNPPXQQhlYjZ9vhLynbmoHKFYTT-Mo8G77Y'//secrect from paypal
    ) 
    
);






