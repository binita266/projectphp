<?php
//this email works*************************************************//
//gets receiver's name, receivers email and message from addreferal.php form and posts referal to database and attaches our website link sends email to receiver
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/vendor/autoload.php';
require_once('addReferal.php');
    $mail = new PHPMailer;
    $mail->isSMTP();
	$mail->SMTPDebug = 0; //2 for development, shows detailed message
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "akalid1000@gmail.com";
    $mail->Password = "addisababa";
	$mail->setFrom('akalid1000@gmail.com', 'The best barter site');
	$mail->addReplyTo('replyto@example.com', 'The best barter site');
	//$mail->addAddress('example@gmail.com', 'Receiver Name');
	
	
		$comment = $_POST['comment'];
	
    if ($mail->addAddress($_POST['friend_email'], $_POST['friend_name'])) {
        $mail->Subject = 'PHPMailer contact form';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
Message: {$_POST['comment']}
"http://http://localhost/PHPproject/project-techo-avengers/root/views/index.php"
EOT;
        if (!$mail->send()) {
            $msg = 'Sorry, something went wrong. Please try again later.';
			
        } else {
            $msg = 'Message sent! Thanks for recomending our site.';
			
        }
		} else {
			$msg = 'Invalid email address, message ignored.';
			
		}
	
?>
