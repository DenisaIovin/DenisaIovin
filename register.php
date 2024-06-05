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

// Verificăm dacă cererea este POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obținem datele din formular
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $plain_password = $_POST['password'];

    // Verificăm dacă emailul are formatul corect
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

    // Criptăm parola
    $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

    // Setăm rolul utilizatorului
    $role = "user";

    // Inserăm utilizatorul în baza de date
    $sql = "INSERT INTO users (username, phone, email, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $phone, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        // Setăm sesiunea pentru utilizatorul nou creat
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirecționăm utilizatorul către pagina principală
        header("Location: index.html");
        exit;
    } else {
        echo "Eroare la adăugarea utilizatorului: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>