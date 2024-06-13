<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaje primite</title>
    <style>
        /* Stilizare CSS pentru aspect */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .message {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .message p {
            margin: 5px 0;
        }
        .back-btn {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mesaje primite</h2>
        <?php
        // Conectare la baza de date
        $servername = "localhost";
        $username = "root";
        $password = "denisa13";
        $database = "users_db";
        $port = 3306;

        $conn = new mysqli($servername, $username, $password, $database, $port);

        if ($conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
        }

        // Interogare pentru a obține toate mesajele
        $sql = "SELECT * FROM messages ORDER BY created_at DESC";
        $result = $conn->query($sql);

        // Afisare mesaje
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='message'>";
                echo "<p><strong>Nume:</strong> " . htmlspecialchars($row['name']) . "</p>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
                echo "<p><strong>Subiect:</strong> " . htmlspecialchars($row['subject']) . "</p>";
                echo "<p><strong>Mesaj:</strong> " . htmlspecialchars($row['message']) . "</p>";
                echo "<p><strong>Data trimiterii:</strong> " . $row['created_at'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Nu există mesaje trimise momentan.</p>";
        }

        // Închiderea conexiunii cu baza de date
        $conn->close();
        ?>
        <a href="contact.php" class="back-btn">Înapoi la Pagina de Contact</a>
    </div>
</body>
</html>
