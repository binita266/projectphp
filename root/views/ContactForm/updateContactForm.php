<?php
require_once 'Database.php';
require_once 'ContactForm.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $t = new ContactForm();
    $cf = $t->getContactFormById($id, $dbcon);


}

if(isset($_POST['updcf'])){
    $id= $_POST['fid'];
    $title = $_POST['title'];

    $dbcon = Database::getDb();
    $t = new ContactForm();
    $count = $t->updateFaq($id, $question, $answer, $dbcon);

    if($count){
        header("Location: listContactForm.php");
    } else {
        echo  "problem updating";
    }


}
?>


<form action="" method="post">
    <input type="hidden" name="fid" value="<?= $faq->id; ?>" />
    Question: <input type="text" name="title" value="<?= $faq->question; ?>" /><br/>
    Answer: <input type="text" name="title" value="<?= $faq->answer; ?>" /><br/>
    <input type="submit" name="updcf" value="Update Faq">
</form>