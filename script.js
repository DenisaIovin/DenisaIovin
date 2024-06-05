
document.addEventListener("DOMContentLoaded", function() {
    // Verificăm dacă utilizatorul este autentificat sau nu
    var isLoggedIn = <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ? 'true' : 'false'; ?>;

    // Dacă utilizatorul este autentificat, ascundem butonul de autentificare
    if (isLoggedIn) {
        var authButton = document.getElementById("authButton");
        if (authButton) {
            authButton.style.display = "none";
        }
    }
});
