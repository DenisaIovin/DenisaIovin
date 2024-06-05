<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $user_id) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET username=?, email=?, phone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, $phone, $user_id);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username; // Actualizăm numele de utilizator în sesiune dacă este necesar
        $_SESSION['email'] = $email; // Actualizăm email-ul în sesiune dacă este necesar
        $_SESSION['phone'] = $phone; // Actualizăm telefonul în sesiune dacă este necesar
        header("Location: account.php?status=success");
        exit;
    } else {
        echo "Eroare la actualizarea informațiilor: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
