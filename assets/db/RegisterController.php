<?php
require_once('DBController.php');

$conn = DB::getConn();

$name = $conn->real_escape_string($_POST['firstName']);
$surname = $conn->real_escape_string($_POST['lastName']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// controllo unicità email, se unica procedo
$sql = "SELECT * FROM utenti WHERE email = '$email'";
if ($conn->query($sql)->num_rows == 0) {

    
    $sql = "INSERT INTO utenti (nome,cognome,email, password) VALUES ('$name','$surname','$email','$hashed_password')";
    if ($conn->query($sql) === true) {
        echo '<p style="background-color:green;">Registrazione effettuata con successo</p>';
        header('Refresh:4; URL=../../index.php');
    } else {
        echo 'Errore durante la registrazione di un nuovo account utente $sql. ' . $conn->error;
    }
} else {
    echo '<p style="background-color:yellow;">Email già registrata</p>';
    header('Refresh: 4; URL=../../register.php');
}