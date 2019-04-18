<?php

class Faq
{   
     public function getFaqById($id, $db){
        $sql = "SELECT * FROM faq WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $faq =  $pst->fetch(PDO::FETCH_OBJ);
        return $faq;
    }
	
	    public function displayFaq($db){
        $sql = "SELECT * FROM faq ORDER BY faq_question ASC";
        $pst = $db->prepare($sql);
        $pst->execute();

        $faq = $pst->fetchAll(PDO::FETCH_OBJ);
        return $faq;
    }
	
    public function getAllFaq($db){
        $sql = "SELECT * FROM faq";
        $pst = $db->prepare($sql);
        $pst->execute();

        $faq = $pst->fetchAll(PDO::FETCH_OBJ);
        return $faq;
    }

    public function addFaq($faq_question, $faq_answer, $db)
    {
        $sql = "INSERT INTO faq(faq_question, faq_answer) 
              VALUES (:faq_question, :faq_answer) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':faq_question', $faq_question);
        $pst->bindParam(':faq_answer', $faq_answer);
        $count = $pst->execute();
        return $count;
    }
	
	 public function deleteFaq($id, $db)
    {
        $sql = "DELETE FROM faq WHERE id=:id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
	
	 public function updateFaq($id, $faq_question, $faq_answer, $db)
    {
        $sql ="UPDATE faq 
		       SET faq_question= :faq_question, faq_answer= :faq_answer
			   WHERE id= :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
		$pst->bindParam(':faq_question', $faq_question);
        $pst->bindParam(':faq_answer', $faq_answer);
        $count = $pst->execute();
        return $count;
    }
}