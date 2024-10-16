<?php
// include 'index.php';

$host = "localhost";
$databaseName = "myshop";
$username = "root";
$password = "Sandonaci94";

$dsn = "mysql:host = $host; dbname=$databaseName";

try {
    $databaseConnection = new PDO($dsn,  $username, $password);

    $databaseConnection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connessione riuscita!";
   // $sql = "SELECT * FROM users";
    // $users = $databaseConnection->query($sql);
    // foreach($users AS $user){
      //  echo "<li>" . $user["name"] . "</li>";

    // } 
    foreach (PDO::getAvailableDrivers() as $driver){
        echo "<p>driver:".$driver."</p>";
    }
} catch (PDOException $error){
    echo $error->getMessage();
}
//App Info
// $host = " http://localhost:9080/ ";mysql 
// $folder = "Myshop-php";
// $base_path = $host . $folder;
