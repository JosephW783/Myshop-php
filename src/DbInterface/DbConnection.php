<?php

include __DIR__.'/DbInterface/DbUser.php';
include __DIR__.'/DbInterface/IDbconnection.php';

//Connessione al databse
$conn = new mysqli('localhost:8000', 'root', 'Sandonaci94', 'myshop');

//Check connection
if ($conn->connect_error){
    die( " Si è verificato un errore nella connsessione: " . $conn->connect_error);
}