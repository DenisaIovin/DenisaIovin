<?php
$servername = "webdb";
$username = "admin";
$password = "parola";
$database = "users_db";

// Creare conexiune cu bd
$conn = new mysqli($servername, $username, $password, $database);

// Verificare conexiune
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

// Verificăm dacă sunt date POST trimise către script
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obținem datele din formularul trimis
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Interogare pentru a găsi utilizatorul în baza de date
    $sql = "SELECT * FROM users WHERE username='$input_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Utilizatorul există în baza de date
        $user = $result->fetch_assoc();
        
        // Verificăm parola
        if (password_verify($input_password, $user['password'])) {
            // Autentificare reușită
            echo "Autentificare reușită pentru utilizator: " . $user['username'];
        } else {
            // Parolă incorectă
            echo "Parolă incorectă.";
        }
    } else {
        // Utilizatorul nu există în baza de date
        echo "Utilizatorul nu există.";
    }
}

// Închide conexiunea
$conn->close();
?>