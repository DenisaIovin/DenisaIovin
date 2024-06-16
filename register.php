<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "denisa13";
$database = "users_db";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $plain_password = $_POST['password'];

    // Verificare format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresa de email nu este validă.";
        exit;
    }

    // Verificăm dacă există deja un utilizator cu același email sau număr de telefon în baza de date
    $sql = "SELECT * FROM users WHERE email=? OR phone=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Există deja un utilizator cu acest email sau număr de telefon.";
        exit;
    }

    // Criptare parolă și alocare rol
    $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);
    $role = "user";

    // Inserare utilizator în baza de date
    $sql = "INSERT INTO users (username, phone, email, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $phone, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        header("Location: index.html");
        exit;
    } else {
        echo "Eroare la adăugarea utilizatorului: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>