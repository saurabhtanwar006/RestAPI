<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
 include($_SERVER['DOCUMENT_ROOT']."/api/config/database.php");
 include($_SERVER['DOCUMENT_ROOT']."/api/objects/truck.php");
 
$database = new Database();
$db = $database->getConnection();
 
$truck = new truck($db);
 
// get posted data
//$data = json_decode(file_get_contents("php://input"));
 
// set product property values
//$truck->number = $data->no;
//$product->lon = $data->lon;
//$product->lat = $data->lat;
$truck->number=$_GET['number'];
$truck->lon=$_GET['lon'];
$truck->lat=$_GET['lat'];
$error="0";
if($_GET['number']=="" || $_GET['lat']=="" || $_GET['lon']=="" )
{
	$error= '"message": "Error : All fields are mandatory."';
}
// create the product
if($truck->create()){
    echo '{';
        echo '"message": "Truck details added."';
    echo '}';
}
 
// if unable to create the product, tell the user
else{
    echo '{';
    	if(strlen($error)>2)
    	{
    		echo $error;
    	}
    	else

        echo '"message": "Unable to add details."';
    echo '}';
}
?>