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
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    
        echo "Parola din formular: " . $input_password . "<br>";
        echo "Parola din baza de date: " . $user['password'] . "<br>";
    
        if (password_verify($input_password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.html");
            exit;
        } else {
            echo "Parolă incorectă.";
        }
    } else {
        echo "Utilizatorul nu există.";
    }
    
}

$conn->close();
?>
