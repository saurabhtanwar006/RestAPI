<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
 include($_SERVER['DOCUMENT_ROOT']."/api/config/database.php");
 include($_SERVER['DOCUMENT_ROOT']."/api/objects/truck.php");
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$truck = new truck($db);
 
// set ID property of product to be edited
$truck->number = isset($_GET['number']) ? $_GET['number'] : die();
 //echo $truck->number;
// read the details of product to be edited
$truck->readOne($truck->number);
 
// create array
$truck_arr = array(
    "number" =>  $truck->number,
    "lon" => $truck->lon,
    "lat" => $truck->lat,
);
 
// make it json format
print_r(json_encode($truck_arr));
?>