<?php
session_start();

// Dezautentifică utilizatorul prin eliminarea tuturor datelor de sesiune
$_SESSION = array();

// Șterge cookie-urile de sesiune
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Distruge sesiunea
session_destroy();

// Redirecționează utilizatorul către pagina de login
header("Location: login.html");
exit;
?>
