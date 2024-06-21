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

// Obține comentariile din baza de date după apăsarea butonului
$comments = [];
if (isset($_POST['show_comments'])) {
    $sql = "SELECT * FROM comments ORDER BY created_at DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" href="images/page_icon.PNG">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        .comment {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .comment p {
            margin: 0;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .comment-header strong {
            font-size: 1.1em;
            color: #333;
        }

        .comment-body {
            margin-bottom: 5px;
            color: #555;
        }

        .comment-footer {
            text-align: right;
            font-size: 0.9em;
            color: #999;
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
        <h1>Blog</h1>
    </section>

<section id="blog_page">
    <div class="blog-heading">
        <h3>Totul despre toate</h3>

    </div>

    <div class="blog-container">

        <div class="blog-box">
            <div class="blog-img">
                <img src="images/totul_despre_pensule.png" alt="Blog">
            </div>

            <div class="blog-text">
                <span>19 Martie 2024 / Totul despre pensule</span>
                <a href="#" class="blog-title">Ghid complet despre pensulele de machiaj</a>
                <p>Fiecare pensulă de machiaj are rolul ei? Părul și forma acesteia joacă un rol foarte important.</p>
                <a href="Blog1-Ghid_pensule.html">Citește mai multe</a>
            </div>
        </div>

        
        <div class="blog-box">
            <div class="blog-img">
                <img src="images/îngrijirea_pensulelor.png" alt="Blog">
            </div>

            <div class="blog-text">
                <span>19 Martie 2024 / Îngrijirea pensulelor de machiaj</span>
                <a href="#" class="blog-title">Îngrijirea pensulelor de machiaj</a>
                <p>Cum să îți îngrijești pensulele de machiaj ca acestea să reziste în timp.</p>
                <a href="#">Citește mai multe</a>
            </div>
        </div>



        <div class="blog-box">
            <div class="blog-img">
                <img src="images/alegerea_nuantei_fondului_de_ten.png" alt="Blog">
            </div>

            <div class="blog-text">
                <span>19 Martie 2024 / Nuanța fondului de ten</span>
                <a href="#" class="blog-title">Cum să alegi corect nuanța și subtonul fondului de ten?</a>
                <p>Colorimetria poate părea complicată însă te voi învăța cum să o înțelegi logic.</p>
                <a href="#">Citește mai multe</a>
            </div>
        </div>
        <br>

        <div class="blog-box">

            <div class="blog-img">
                <img src="images/greseala_clasica_a_makeup_artistilor.png" alt="Blog">
            </div>

            <div class="blog-text">
                <span>20 Martie 2024 / Greșeala clasică a make-up artiștilor.</span>
                <a href="#" class="blog-title">Greșeala pe care majoritatea make-up artiștilor o fac!</a>
                <p>Motivul pentru care make-up artiștii stagnează și nu își pot depăși condiția,</p>
                <a href="#">Citește mai multe</a>
            </div>
        </div>


        
    </div>
</section>

   
    <!-- Secțiunea de comentarii -->
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
    <section class="comments">
        <h2>Comentarii</h2>
        <form action="add_comment.php" method="POST">
            <textarea name="comment" placeholder="Adaugă un comentariu" required></textarea>
            <button type="submit" class="done-btn">Trimite</button>
        </form>
    </section>
    <?php else: ?>
    <p>Trebuie să vă <a href="login.html">autentificați</a> pentru a adăuga comentarii.</p>
    <?php endif; ?>

    <!-- Afișarea comentariilor din baza de date -->
    <form method="POST" action="">
        <button type="submit" name="show_comments" class="done-btn">Vezi comentariile</button>
    </form>

    <?php if (!empty($comments)): ?>
    <section class="comments-list">
        <h3>Comentarii de la utilizatori:</h3>
        <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <div class="comment-header">
                <strong><?php echo isset($comment['username']) ? htmlspecialchars($comment['username']) : 'Anonim'; ?></strong>
                <span class="comment-footer"><?php echo htmlspecialchars($comment['created_at'] ?? ''); ?></span>
            </div>
            <div class="comment-body">
                <?php echo htmlspecialchars($comment['comment'] ?? ''); ?>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
    <?php endif; ?>

    <section class="footer">
        <h4>Despre mine</h4>
        <p>Îmi doresc să fac cat mai multe femei să se simtă frumoase și încrezătoare,
        <br>iar dacă simți că rezonezi cu mine, aștept să mă contactezi.
        </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
        </div>
    </section>

    <script>
        function hideMenu() {
            document.getElementById("navLinks").style.display = "none";
        }
        function showMenu() {
            document.getElementById("navLinks").style.display = "block";
        }
    </script>
</body>
</html>