<?php 

class ContactForm
{
	
	public function getContactFormById($id, $db){
        $sql = "SELECT * FROM contact_form WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $cf =  $pst->fetch(PDO::FETCH_OBJ);
        return $cf;
    }
	
    //add data to database
    public function addContactForm($f_name, $l_name, $phone_number, $email, $city, $gender, $category, $message, $db){
        $sql = "INSERT INTO contact_form (f_name,l_name,phone_number, email, city, gender, category, message )
                VALUES (:f_name, :l_name, :phone_number, :email, :city, :gender, :category, :message)";
        $pst = $db->prepare($sql); 
		
        $pst->bindParam(':f_name', $f_name);
        $pst->bindParam(':l_name', $l_name);
		$pst->bindParam(':phone_number', $phone_number);
		$pst->bindParam(':email', $email);
		$pst->bindParam(':city', $city);
		$pst->bindParam(':gender', $gender);
		$pst->bindParam(':category', $category);
		$pst->bindParam(':message', $message);
		
        $result = $pst->execute(); 
        return $result;
    }   

 public function getAllContactForm($db){
        $sql = "SELECT * FROM contact_form";
        $pst = $db->prepare($sql);
        $pst->execute();
        $cf = $pst->fetchAll(PDO::FETCH_OBJ);
        return $cf;
    }
	
 public function deleteContactForm($id, $db)
    {
        $sql = "DELETE FROM contact_form WHERE id=:id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }	
} 