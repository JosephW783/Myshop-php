<?php
    $host = "localhost:9080";          // Indirizzo del database
    $username = "root";                // Username del database
    $password = "Sandonaci94";         // Password del database
    $dbname = "myshop";                // Nome del database
    $charset = 'utf8';
    // Metodo per connettersi al database Mysql
    try {
        // Creare la connessione PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
        echo " Connessione avvenuta con successo!";
    
        // Impostare la modalità di gestione degli errori a eccezione
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Query SQL
        $sql = "SELECT * FROM users";
        foreach ($pdo->query($sql) as $row) {
            echo $row['id'] . " - " . $row['name'] . " - " . $row['email'] . "<br>";
        }
    
    } catch (PDOException $e) {
        // Messaggio di errore in caso di fallimento della connessione
        echo "Connessione fallita!: " . $e->getMessage();
    }
    // App Info
    $host = " http://localhost:9080/ ";
    $folder = "Myshop-php";
    $base_path = $host . $folder;
