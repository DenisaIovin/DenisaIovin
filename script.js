document.addEventListener("DOMContentLoaded", function() {

    var isLoggedIn = document.getElementById("isLoggedIn").value;

    isLoggedIn = (isLoggedIn === 'true');

    // Dacă utilizatorul este autentificat ascunde butonul de autentificare
    if (isLoggedIn) {
        var authButton = document.getElementById("authButton");
        if (authButton) {
            authButton.style.display = "none";
        }
    }
});
