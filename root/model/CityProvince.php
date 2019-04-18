<!--
Author:    Rohit Arora; n01269796;
-->


<?php

class CityProvince
{
	public function getAllProvinces($db){
        $query = "SELECT DISTINCT admin FROM mytable";
        $pdostm = $db->prepare($query);
        $pdostm->execute();

        //fetch all result
        $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    
    public function getAllCities($db){
        $query = "SELECT DISTINCT city FROM mytable";
        $pdostm = $db->prepare($query);
        $pdostm->execute();

        //fetch all result
        $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function getAllCitiesByProvince($province,$db){
        $query = "SELECT DISTINCT city FROM mytable WHERE admin = :province ";
        $pdostm = $db->prepare($query);
        $pdostm->bindParam(':province', $province);
        $pdostm->execute();

        //fetch all result
        $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
}
