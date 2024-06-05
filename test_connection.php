<?php
$servername = "localhost";
$username = "admin";
$password = "parola";
$database = "users_db";
$port = 3306; // Portul pe care l-ați configurat

// Creare conexiune cu baza de date
$conn = new mysqli($servername, $username, $password, $database, $port);

// Verificare conexiune
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}
echo "Conexiune reușită la baza de date!";

// Închide conexiunea cu baza de date
$conn->close();
?>
