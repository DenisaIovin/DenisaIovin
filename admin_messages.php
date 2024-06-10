<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}

// Verificare rol de admin
if ($_SESSION['role'] !== 'admin') {
    // Dacă utilizatorul nu are rol de admin, redirecționează către pagina de cont
    header("Location: account.php");
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

// Obțineți mesajele din baza de date
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaje de la utilizatori</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Mesaje de la utilizatori</h1>

<div class="message-container">
    <?php
    if ($result->num_rows > 0) {
        // Afiseaza fiecare mesaj
        while ($row = $result->fetch_assoc()) {
            echo "<div class='message'>";
            echo "<p><strong>Nume:</strong> " . htmlspecialchars($row['name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
            echo "<p><strong>Subiect:</strong> " . htmlspecialchars($row['subject']) . "</p>";
            echo "<p><strong>Mesaj:</strong> " . htmlspecialchars($row['message']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Nu există mesaje de afișat.</p>";
    }
    ?>
</div>

</body>
</html>

<?php
// Închideți conexiunea la baza de date
$conn->close();
?>
