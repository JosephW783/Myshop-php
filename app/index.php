<?php
// require_once '/app/Database.php';
// include 'Database.php';
require_once 'Database.php';



 // Get all records from a database table
 function getAll($conn, $table){
    
    $tables= $conn->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
          $data = [];

           foreach($tables as $table){
               $stmt = $conn->query(("SELECT * FROM $table"));
         }
           

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
  print_r($data);
  //  echo'</pre>';
    
    //Close database connection
   // $conn->Close();
            
    
return $records;
 }
