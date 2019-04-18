<?php 
//this works - the only issue I had was my gmail account block the login as insecure email
require_once('../PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->STMPSecure = 'ssl'; //or tls
$mail->Host = 'smtp.gmail.com';
//$mail->Port = '465';
$mail->Port = '587';
$mail->isHTML(true);
$mail->Username = ''; //sender's email
$mail->Password = '';//enter senders gmail password
$mail->setFrom('no-reply@howcode.org'); //reply email
$mail->Subject = 'Hello World';
$mail->Body = '<
$mail->AddAddress('n01306505@humbermail.ca');  //receivers email
$mail->Send();


?>