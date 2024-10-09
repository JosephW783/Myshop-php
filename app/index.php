<?php
include 'DbUser.php';

// Connessione a MySQL
$mysqli = new mysqli("mysql", $username, $password, $db_name);

if ($mysqli->connect_error) {
    die("Connessione fallita: " . $mysqli->connect_error);
}
echo "Connessione avvenuta con successo>";

// Ottieni tutte le tabelle del database MYSQL
$query_tables = "SHOW TABLES";
$result_tables = $mysqli->query($query_tables);

if ($result_tables->num_rows > 0) {
    while ($row = $result_tables->fetch_array()) {
        $table_name = $row[0];
        echo "Contenuto della tabella: $table_name<br>";

        // Esegui una query per ottenere tutti i dati dalla tabella
        $query_data = "SELECT * FROM $table_name";
        $result_data = $mysqli->query($query_data);

        if ($result_data->num_rows > 0) {
            // Mostra i dati
            while ($data_row = $result_data->fetch_assoc()) {
                // Puoi personalizzare il modo in cui i dati vengono visualizzati qui
                echo "<pre>" . print_r($data_row, true) . "</pre>";
            }
        } else {
            echo "Nessun risultato trovato nella tabella $table_name.<br>";
        }
    }
} else {
    echo "Nessuna tabella trovata nel database.";
}

// Chiudi la connessione
$mysqli->close();
