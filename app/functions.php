<?php
include 'index.php';

// Get all records from a database table
function getAll($conn, $table){
    
    $sql = "SELECT * FROM '$table'";
    $result = $conn->query($sql);

    if($result && $result->num_rows >0){

        $records=[];

    } 
    elseif($result){
        $records=[];
    }
    else {
        $records = false;
    }

    //Close database connection
    $conn->Close();

    return $records;

}