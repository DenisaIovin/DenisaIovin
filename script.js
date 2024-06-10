document.addEventListener("DOMContentLoaded", function() {
    // Obține valoarea din elementul HTML
    var isLoggedIn = document.getElementById("isLoggedIn").value;

    // Convertește valoarea la tip boolean
    isLoggedIn = (isLoggedIn === 'true');

    // Dacă utilizatorul este autentificat, ascunde butonul de autentificare
    if (isLoggedIn) {
        var authButton = document.getElementById("authButton");
        if (authButton) {
            authButton.style.display = "none";
        }
    }
});
