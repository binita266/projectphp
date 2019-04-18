<?php

class Payment
{
	 public function getPaymentById($id, $db){
		/* $sql = "SELECT users.fname, users.lname, memberships.title, paymentdate, amountpaid from transactions 
		INNER JOIN users ON transactions.client_id = users.id 
		INNER JOIN memberships on transactions.membership_id= memberships.id WHERE transactions.id = :id ";*/
		
        $sql = "SELECT * FROM transactions WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $payment =  $pst->fetch(PDO::FETCH_OBJ);

        return $payment;


    }

	public function getAllPayments($dbcon){
		
		
		$sql = "SELECT * FROM transactions";
		$pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $payment = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $payment;
	}
	public function addPayment($client_id, $paymentdate,$amountpaid, $db)
	{
	
		$sql = "INSERT INTO transactions (client_id, paymentdate, amountpaid)
				VALUES (:client_id, :paymentdate, :amountpaid )";
		$pst = $db->prepare($sql);
		$pst->bindParam(':client_id', $client_id);
		$pst->bindParam(':paymentdate', $paymentdate);
		$pst->bindParam(':amountpaid', $amountpaid);	
		
		
		$count = $pst->execute();
		return $count;
	}
	public function deletePayment($id, $db){
        $sql = "DELETE FROM transactions WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;


    }
	
	public function updatePayment($id, $paymentdate, $amountpaid, $db){
			$sql = "UPDATE transactions
					SET paymentdate = :paymentdate,
					amountpaid = :amountpaid			
					
					WHERE id = :id";
					
			$pst = $db->prepare($sql);
			$pst->bindParam(':id', $id);
			//$pst->bindParam(':client_id', $client_id);
			$pst->bindParam(':paymentdate', $paymentdate);
			$pst->bindParam(':amountpaid', $amountpaid);	
			

			$count = $pst->execute();
			return $count;
		}
}
			