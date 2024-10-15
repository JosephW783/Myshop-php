<?php

include './index.php';

 class Database {
     private $host = 'localhost:9080';  // Host del database (in genere localhost)
     private $dbname = 'myshop';  // Nome del database
     private $username = 'root';   // Nome utente MySQL
     private $password = 'Sandonaci94';       // Password MySQL
     // private $conn;
     
     // Metodo per ottenere la connessione
     public function getConnection() {
        //  $this->conn = null;
         
         try {
             $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
             $options = [
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Gestione degli errori con eccezioni
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Risultati come array associativi
                 PDO::ATTR_PERSISTENT => true // Connessione persistente
                ];
                
                // Creazione della connessione PDO
                $pdo = new PDO($dsn, $this->username, $this->password, $options);
            } catch (PDOException $e) {
                // Gestione dell'errore
                echo "Errore di connessione: " . $e->getMessage();
            }
              
    }
}
    // App Info
   // $host = " http://localhost:9080/ ";
   //  $folder = "Myshop-php";
   // $base_path = $host . $folder;
