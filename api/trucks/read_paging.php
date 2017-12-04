<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
 include($_SERVER['DOCUMENT_ROOT']."/api/config/database.php");
 include($_SERVER['DOCUMENT_ROOT']."/api/objects/truck.php");
 
 include($_SERVER['DOCUMENT_ROOT']."/api/config/core.php");
 include($_SERVER['DOCUMENT_ROOT']."/api/shared/utilites.php");
// utilities
$utilities = new Utilities();
 
// instantiate database and truck object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$truck = new truck($db);
 
// query trucks
$stmt = $truck->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // trucks array
    $trucks_arr=array();
    $trucks_arr["records"]=array();
    $trucks_arr["paging"]=array();
 
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
            "lat" => $lat
        );
 
        array_push($trucks_arr["records"], $truck_item);
    }
 
 
    // include paging
    $total_rows=$truck->count();
    $page_url="{$home_url}trucks/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $trucks_arr["paging"]=$paging;
 
    echo json_encode($trucks_arr);
}
 
else{
    echo json_encode(
        array("message" => "No trucks found.")
    );
}
?>