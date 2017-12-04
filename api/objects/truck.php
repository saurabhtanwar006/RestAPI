<?php
class truck{
 
    // database connection and table name
    function read(){
 
    // select all query
    $query = "SELECT
                *
            FROM
                " . $this->table_name . " p";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}



function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                number=:number, lon=:lon, lat=:lat";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->number=htmlspecialchars(strip_tags($this->number));
    $this->lon=htmlspecialchars(strip_tags($this->lon));
    $this->lat=htmlspecialchars(strip_tags($this->lat));
    // bind values
    $stmt->bindParam(":number", $this->number);
    $stmt->bindParam(":lon", $this->lon);
    $stmt->bindParam(":lat", $this->lat);
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

function readOne($num){
 
    // query to read single record
    $query = "SELECT
               *
            FROM
                " . $this->table_name . " p
            WHERE
                p.number = ".$num."";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->number);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->number = $row['number'];
    $this->lon = $row['lon'];
    $this->lat = $row['lat'];
}


// read products with pagination
public function readPaging($from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
                " . $this->table_name . " p
                LIMIT ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}
// used for paging products
public function count(){
    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}


    private $conn;
    private $table_name = "trucks";
 
    // object properties
    public $number;
    public $lon;
    public $lat;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}


?>