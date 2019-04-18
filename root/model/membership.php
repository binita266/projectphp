<?php

class Member
{
	public function getAllMembers($dbcon){
		
		$sql = "SELECT * FROM memberships";
		$pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $members = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $members;
	}
	public function addMember($title, $price, $db)
	{
	
		$sql = "INSERT INTO memberships (title, price)
				VALUES (:title, :price)";
		$pst = $db->prepare($sql);
		$pst->bindParam(':title', $title);
		$pst->bindParam(':price', $price);
		
		
		$count = $pst->execute();
		return $count;
	}
	public function deleteMember($id, $db){
        $sql = "DELETE FROM memberships WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;


    }
	 public function getMemberById($id, $db){
        $sql = "SELECT * FROM memberships WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $member =  $pst->fetch(PDO::FETCH_OBJ);

        return $member;


    }

	public function updateMember($id, $title, $price, $db){
			$sql = "UPDATE memberships
					SET title = :title,
					price = :price
					
					WHERE id = :id";
					
			$pst = $db->prepare($sql);
			$pst->bindParam(':id', $id);
			$pst->bindParam(':title', $title);
			$pst->bindParam(':price', $price);
			

			$count = $pst->execute();
			return $count;
		}
}
			