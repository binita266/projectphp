<?php

class Referal
{

    

    public function getReferalById($id, $db){
        $sql = "SELECT * FROM referings WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $referal =  $pst->fetch(PDO::FETCH_OBJ);

        return $referal;


    }
    public function getAllReferals($dbcon){


        $sql = "SELECT * FROM referings";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $referals = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $referals;
    }

    public function addReferal($client_id, $friend_name, $friend_email, $comment, $db)
    {
        $sql = "INSERT INTO referings (client_id, friend_name, friend_email, comment) 
              VALUES (:client_id, :friend_name, :friend_email, :comment) ";
        $pst = $db->prepare($sql);
		$pst->bindParam(':client_id', $client_id);
        $pst->bindParam(':friend_name', $friend_name);
        $pst->bindParam(':friend_email', $friend_email);
        $pst->bindParam(':comment', $comment);

        $count = $pst->execute();

        return $count;
    }
    
    public function deleteReferal($id, $db){
        $sql = "DELETE FROM referings WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;


    }

    public function updateReferal($id, $friend_name, $friend_email, $comment, $db)
	{
	
        $sql = "UPDATE referings
                SET friend_name = :friend_name,
                friend_email = :friend_email,
                comment = :comment
                WHERE id = :id";
        $pst = $db->prepare($sql);
		$pst->bindParam(':id', $id);
        $pst->bindParam(':friend_name', $friend_name);
        $pst->bindParam(':friend_email', $friend_email);
        $pst->bindParam(':comment', $comment);

        $count = $pst->execute();
        return $count;


    }
}