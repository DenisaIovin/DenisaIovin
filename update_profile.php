<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html"); 
    exit;
}

$servername = "localhost";
$username = "root";
$password = "denisa13";
$database = "users_db";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$new_username = $_POST['username'];
$new_email = $_POST['email'];
$new_password = $_POST['password'];

if (!empty($new_password)) {
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    // Actualizăm toate informațiile
    $sql = "UPDATE users SET username=?, email=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $new_username, $new_email, $hashed_password, $_SESSION['id']);
} else {
    // Actualizăm doar numele de utilizator și adresa de email
    $sql = "UPDATE users SET username=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_username, $new_email, $_SESSION['id']);
}

if ($stmt->execute()) {
    echo "Informațiile contului au fost actualizate cu succes.";
} else {
    echo "Eroare la actualizarea informațiilor contului: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
