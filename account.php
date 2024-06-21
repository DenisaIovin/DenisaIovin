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

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contul meu</title>
    <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,500&display=swap" 
        rel="stylesheet">
    <style>
        .account-container {
            width: 80%;
            margin: auto;
            text-align: center;
            padding: 50px 0;
        }
        .account-info {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 600px;
            margin: auto;
        }
        .account-info p {
            font-size: 18px;
            margin: 10px 0;
        }
        .account-info p strong {
            display: inline-block;
            width: 120px;
            text-align: left;
        }
        .account-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .done-btn {
            padding: 10px 20px;
            background-color: #000; 
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .done-btn:hover {
            background-color: #8b5992; 
        }
    </style>
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

<div class="account-container">
    <h1>Contul meu</h1>
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <p style="color: green; text-align: center;">Informațiile au fost actualizate cu succes.</p>
    <?php endif; ?>
    <div class="account-info">
        <p><strong>Nume:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Telefon:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
    </div>
    <div class="account-actions">
        <a href="edit_account.php" class="done-btn">Editează informațiile</a>
        <a href="logout.php" class="done-btn">Deconectare</a>
    </div>
</div>

</body>
</html>
