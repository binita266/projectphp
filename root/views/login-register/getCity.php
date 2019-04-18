<?php
require_once '../../model/Database.php';
require_once "../../model/CityProvince.php";

$db = Database::getDb();
$cp = new CityProvince();

$province = $_GET['province'];

$cities = $cp->getAllCitiesByProvince($province,$db);
$c = "";
foreach($cities as $city) {
        $c .= "<option value='$city->city'>$city->city</option>";
    }
                                        
echo $c ;