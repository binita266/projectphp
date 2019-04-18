<!--
Author:    Rohit Arora; n01269796;
-->

<?php

class Feedback
{

	 // function to insert feedbacks    

    public function addFeedback($title,$message,$product_id	, $user_id, $db) {
        $sql = "INSERT INTO feedbacks (title,message,product_id,user_id) 
              VALUES (:title,:message,:product_id, :user_id) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':title', $title);
        $pst->bindParam(':message', $message);
        $pst->bindParam(':product_id', $product_id);
        $pst->bindParam(':user_id', $user_id);
        $effectedRows = $pst->execute();
        return $effectedRows;
    }


     //function to get feedbacks for a perticular productby pruductid
    public function getFeedbackByProductId($product_id, $db){
        $sql = "SELECT * FROM feedbacks WHERE product_id = :product_id ";
        $statement = $db->prepare($sql);
        $statement->bindParam(':product_id', $product_id);
        $statement->execute();
        $feedbacks =  $statement->fetchAll(PDO::FETCH_OBJ);
        return $feedbacks;

    }

     // function to get list of all feedbacks    
    public function getAllFeedbacks($dbcon){
        $sql = "SELECT * FROM feedbacks";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $feedbacks = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $feedbacks;
    }
    
    //function to get feedback by id
     public function getFeedbackById($id, $db){
        $sql = "SELECT * FROM feedbacks WHERE id = :id ";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $feedback =  $statement->fetch(PDO::FETCH_OBJ);
        return $feedback;

    }


    // function to delete feedback  
     public function deleteFeedback($id, $db){
        $sql = "DELETE FROM feedbacks WHERE id = :id";
        $prepareStatement = $db->prepare($sql);
        $prepareStatement->bindParam(':id', $id);
        $effectedRows = $prepareStatement->execute();
        return $effectedRows;
    }


}

