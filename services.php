<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicii</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,500&display=swap" 
        rel="stylesheet">

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
    <script src="script.js" defer></script>
    <input type="hidden" id="isLoggedIn" value="<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ? 'true' : 'false'; ?>">
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
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="account.php">Contul meu</a></li>
                </ul>
            </div>
            <i class="fa-solid fa-bars icon" onclick="showMenu()"></i>
        </nav>
        <h1>Servicii</h1>
    </section>

    <section class="servicii_page">
        <h1>Servicii</h1>
        <div class="servicii_page-col">
            <img src="images/diana.jpg" alt="Machiaj profesional">
            <div class="servicii_page-text">
                <h3>Machiaj profesional</h3>
                <p>Îți dorești un machiaj profesional ultra rezistent? 
                Machiajul este cea mai ușoară metodă prin care să te simți încrezătoare
                oriunde pășești.</p>

                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <a href="https://calendly.com/iovindenisa-v/programare-machiaj" class="done-btn-servicii" target="_blank">Programează-te acum!</a>
            <?php endif; ?>
            
            <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                <a href="login.html" class="done-btn-servicii">Autentificare pentru programare</a>
            <?php endif; ?>

            </div>
        </div>

        <div class="servicii_page-col">
            <img src="images/stilizare_sprancene.jpg" alt="Stilizare sprâncene">
            <div class="servicii_page-text">
                <h3>Stilizare sprâncene</h3>
                <p>Știai că sprâncenele joacă cel mai important rol când vine vorba de trăsăturile feței? 
                    Acestea pot modifica expresivitatea 
                    și armonia trăsăturilor.</p>
    
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <a href="https://calendly.com/iovindenisa-v/programare-stilizare-sprancene" class="done-btn-servicii" target="_blank">Programează-te acum!</a>
            <?php endif; ?>
            
            <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                <a href="login.html" class="done-btn-servicii">Autentificare pentru programare</a>
            <?php endif; ?>

            </div>
        </div>

        <div class="servicii_page-col">
            <img src="images/extensii_gene.jpg" alt="Extensii de gene">
            <div class="servicii_page-text">
                <h3>Extensii de gene</h3>
                <p>Îți dorești să pari machiată încă de la prima oră a dimineții?
                    Atunci extensiile de gene sunt pentru tine. Efect până la o lună de la aplicare.</p>
    
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <a href="https://calendly.com/iovindenisa-v/programare-extensii-de-gene" class="done-btn-servicii" target="_blank">Programează-te acum!</a>
            <?php endif; ?>
            
            <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                <a href="login.html" class="done-btn-servicii">Autentificare pentru programare</a>
            <?php endif; ?>

            </div>
        </div>
       
        <div class="servicii_page-col">
            <img src="images/laminare.jpg" alt="Laminare de gene și sprâncene">
            <div class="servicii_page-text">
                <h3>Laminare de gene și sprâncene</h3>
                <p>Laminarea este un proces ideal pentru persoanele care își doresc să păstreze
                    naturalețea. Prin această metodă, genele și sprâncenele tale vor
                    arăta stilizate chiar și după 6 săptămâni.</p>
              
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <a href="https://calendly.com/iovindenisa-v/laminare-gene-sprancene" class="done-btn-servicii" target="_blank">Programează-te acum!</a>
            <?php endif; ?>
            
            <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true): ?>
                <a href="login.html" class="done-btn-servicii">Autentificare pentru programare</a>
            <?php endif; ?>
                

            </div>
        </div>
    </section>

    <!--Footer-->
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


</body>
</html>
