<?php
$servername = "localhost";
$username = "root";
$password = "denisa13";
$database = "users_db";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$plain_password = "parola"; 
$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, phone, email, password, role) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $username, $phone, $email, $hashed_password, $role);

$username = "admin"; 
$email = "admin@example.com"; 
$phone = "0712345678";
$role = "admin"; 

if ($stmt->execute()) {
    echo "Utilizator adăugat cu succes.";
} else {
    echo "Eroare la adăugarea utilizatorului: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
