<?php
// include 'index.php';

 class Database {
     private $host = 'localhost:9080';  // Host del database
     private $dbname = 'myshop';  // Nome del database
     private $username = 'root';   // Nome utente MySQL
     private $password = 'Sandonaci94';       // Password MySQL
     private $conn;
     
     // Metodo per ottenere la connessione
     public function getConnection() {
          $this->conn = null;
         
         try {

        } catch (PDOException $e) { 
            $this->conn = new PDO("mysql:host($this->host}; dbname={$this->dbname} charset=utf8", $this->username, $this->password);
             $options = [
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Gestione degli errori con eccezioni
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Risultati come array associativi
                 PDO::ATTR_PERSISTENT => true // Connessione persistente
                ];

                echo"Connessione riuscita";
            } catch(PDOException $e){
                echo "Errore di connessione: " . $e->getMessage();
            }
            return $this->conn;
              
    }
}
//App Info
$host = " http://localhost:9080/ ";
$folder = "Myshop-php";
$base_path = $host . $folder;

