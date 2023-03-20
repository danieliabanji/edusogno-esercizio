<?php

$host = "localhost";
$user = "root;";
$password = "root";
$db = "edusogno_db";

$connection = new mysqli ($host, $user, $password, $db);

if($connection === false){
    die("Errore durante la connessione: " . $connection->connect_error);
}
