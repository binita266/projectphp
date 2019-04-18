<?php
$page_title = "AddFAQ";

session_start();
require_once '../../model/Database.php';
require_once '../../model/Faq.php';
include "../../views/headeradmin.php"; 
echo "<link rel='stylesheet' type='text/css' href='faq.css' />";

// define variables and set to empty values
$queErr = $ansErr = "";
$question = $answer = "";

// Only admin will be able to make some changes!
if(isset($_SESSION['username'] )){
    if ($_SESSION['username'] !== 'admin' ) {
        header("Location: ../login-register/login.php");
        die();
    } 
}else{
    header("Location: ../login-register/login.php");
    die();
}

 if(isset($_POST['question'])){
       $faq_question = $_POST['question'];
	   $faq_answer = $_POST['answer'];
        
        $db = Database::getDb();
        $c = new Faq();
        $my_data = $c->addFaq($faq_question, $faq_answer, $db);
 
	if (empty($question)) {
        $queErr =  "Please enter question <br />";
    } else {
        $queErr = "";
    }   
	
	if (empty($answer)) {
        $ansErr =  "Please enter answer <br />";
    } else {
        $ansErr = "";  
 }  
 }
?>

<div class="container">
    <h3>Add new FAQ</h3>
<form action="#" method="post">
	<label for="faq_question">Question:</label>
	<input type="text" name="question" value="<?php echo $question;?>"/>
	<span class="error"><?php echo $queErr;?></span>
	<br/>
	<label for="faq_question">Answer:</label>
	<input type="text" name="answer" value="<?php echo $answer;?>"/>
	<span class="error"><?php echo $ansErr;?></span>
	<br/>

	<input type="submit" name="addfaq" value="Add Faq">
</form>
<a href="listfaqs.php">Go to the list</a>
</div>

<?php
include "../../views/adminfooter.php"; 
?>
