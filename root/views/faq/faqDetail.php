<?php
require_once '../../model/Database.php';
require_once '../../model/Faq.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $t = new Faq();
    $faq = $t->getFaqById($id, $dbcon);

}

echo  "Question : " . $faq->faq_question . "<br />";
echo  "Answer : " . $faq->faq_answer . "<br />";
