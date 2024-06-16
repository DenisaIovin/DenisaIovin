<?php
session_start();

// Verificarea autentificării
if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] === 'admin' && $_POST['password'] === 'parola') {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = 'admin'; // Setarea numelui de utilizator în sesiune
    $_SESSION['password'] = 'parola'; // Setarea parolei în sesiune
    header("Location: pagina_de_start.php"); // Redirecționarea către pagina de start după autentificare
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" href="images/page_icon.PNG">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
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
    <h1>Contact</h1>
</section>

<section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d696.251454820315!2d21.244580959349324!3d45.73097810916269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47455d8c3d6bca37%3A0x4a9a1f602438df52!2sSalon%20Carina%20Munteanu!5e0!3m2!1sen!2sro!4v1709571192905!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>


</section>
<section class="contact-us">
    <div class="row">
        <div class="contact-col">
            <div>
                <i class="fa fa-home"></i>
                <span>
                    <h5>Str. Mareșal Constantin Prezan 140</h5>
                    <p>Timisoara, Romania, EU</p>
                </span>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <span>
                    <h5>+4 0758 808 848</h5>
                    <p>Luni-Duminica 8:00 - 18:00 </p>
                </span>
            </div>
            <div>
                <i class="fa fa-envelope-o"></i>
                <span>
                    <h5>denisaiovin13@yahoo.com</h5>
                    <p>Contacteaza-ma prin email! </p>
                </span>
            </div>
        </div>
        <div class="contact-col">
            <form action="form-handler.php" method="post" onsubmit="return validateForm()">
                <input type="text" name="name" placeholder="Numele tau" required>  
                <input type="email" name="email" placeholder="Adresa de email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">  
                <input type="text" name="subject" placeholder="Subiect" required>  
                <textarea rows="8" name="message" placeholder="Mesaj" required></textarea> 
                <button type="submit" class="MainMore-btn">Trimite mesajul</button>
            </form>
            <div id="form-status">
                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'success') {
                        echo "<p>Mesajul a fost trimis cu succes!</p>";
                    } elseif ($_GET['status'] == 'error') {
                        echo "<p>Eroare la trimiterea mesajului. Te rugăm să încerci din nou.</p>";
                    } elseif ($_GET['status'] == 'invalid') {
                        echo "<p>Formular invalid. Verifică informațiile și încearcă din nou.</p>";
                    }
                }
                ?>
            </div>
        </div>

    </div>

</section>

<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/ecfd2f6e-0d84-4ddb-a0a7-e181f150ec37/webchat/config.js" defer></script>

<?php
    // Verificăm dacă utilizatorul este autentificat ca admin
    if(isset($_SESSION['loggedin']) && isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['username'] === 'admin' && $_SESSION['password'] === 'parola') {
        // Dacă utilizatorul este autentificat ca admin, afișăm butonul
        echo '<a href="messages.php" class="MainMore-btn done-btn">Vezi Mesajele</a>';
    }
    ?>
    
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
    function validateForm() {
        const email = document.querySelector('input[name="email"]').value;
        const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
        if (!emailPattern.test(email)) {
            alert("Adresa de email trebuie sa respecte acest format: example@domain.com");
            return false;
        }
        return true;
    }
</script>
</body>
</html>