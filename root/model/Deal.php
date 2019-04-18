<!--
Author:    Rohit Arora; n01269796;
-->

<?php

class Deal
{

 // function to insert Deal    

    public function addDeal($caption,$start_date,$end_date,$product_id,  $db) {
        $sql = "INSERT INTO daily_deals (caption,start_date,end_date,product_id) 
              VALUES (:caption,:start_date,:end_date,:product_id) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':caption', $caption);
        $pst->bindParam(':start_date', $start_date);
        $pst->bindParam(':end_date', $end_date);
        $pst->bindParam(':product_id', $product_id);
        $effectedRows = $pst->execute();
        return $effectedRows;
    }


     //function to get deals for a perticular product by pruductid
    public function getDealByProductId($product_id, $db){
        $sql = "SELECT * FROM daily_deals WHERE product_id = :product_id ";
        $statement = $db->prepare($sql);
        $statement->bindParam(':product_id', $product_id);
        $statement->execute();
        $deals =  $statement->fetchAll(PDO::FETCH_OBJ);
        return $deals;

    }

      // function to get list of all Deals    
    public function getAllDeals($dbcon){
        $sql = "SELECT * FROM daily_deals";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $deals = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $deals;
    }


        //function to get deal by id
     public function getDealById($id, $db){
        $sql = "SELECT * FROM daily_deals WHERE id = :id ";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $deal =  $statement->fetch(PDO::FETCH_OBJ);
        return $deal;

    }

    // function to delete deal  
     public function deleteDeal($id, $db){
        $sql = "DELETE FROM daily_deals WHERE id = :id";
        $prepareStatement = $db->prepare($sql);
        $prepareStatement->bindParam(':id', $id);
        $effectedRows = $prepareStatement->execute();
        return $effectedRows;
    }


     //  function to update user data 

    public function editDeal($id, $caption,$end_date, $db){
        $sql = "UPDATE daily_deals
                SET caption = :caption,
                end_date = :end_date
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':caption', $caption);
        $pst->bindParam(':end_date', $end_date);
        $pst->bindParam(':id', $id);
        $effectedRows = $pst->execute();
        return $effectedRows;
    }




}