<?php
// required headers
header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/truck.php';
// instantiate database and truck object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$truck = new truck($db);
 
// query trucks
$stmt = $truck->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // trucks array
    $trucks_arr=array();
    $trucks_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $truck_item=array(
            "number" => $number,
            "lon" => $lon,
            "lat" => $lat,
        );
 
        array_push($trucks_arr["records"], $truck_item);
    }
 
    echo json_encode($trucks_arr);
}
 
else{
    echo json_encode(
        array("message" => "No trucks found.")
    );
}

?>
