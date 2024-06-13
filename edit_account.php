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

if ($user_id) {
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editare cont</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<section class="sub-header">
    <nav>
        <a href="index.html"><img src="images/logo_Alb.PNG"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa-solid fa-xmark icon" onclick="hideMenu()"></i>
            <ul>
                <li><a href="index.html">Acasă</a></li>
                <li><a href="about.html">Despre mine</a></li>
                <li><a href="course.html">Cursuri</a></li>
                <li><a href="services.php">Servicii</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="account.php">Contul meu</a></li>
            </ul>
        </div>
        <i class="fa-solid fa-bars icon" onclick="showMenu()"></i>
    </nav>
</section>

<div class="wrapper_edit">
    <h1>Editare cont</h1>
    <form action="update_account.php" method="post">
        <label for="username">Nume:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <label for="phone">Telefon:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>

        <button type="submit" class="done-btn">Salvează modificările</button>
    </form>
    <a href="account.php" class="back-btn">Înapoi la contul meu</a>
</div>

</body>
</html>
