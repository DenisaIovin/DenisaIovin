<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Activează raportarea erorilor
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $visitor_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($name && $visitor_email && $subject && $message) {
        $mail = new PHPMailer(true);

        try {
            // Configurați setările serverului SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mail.yahoo.com'; // Host SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'denisaiovin13@yahoo.com'; // Nume utilizator SMTP
            $mail->Password = 'rjlzuibtcctkzqmc'; // Parolă de aplicație
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinatar și expeditor
            $mail->setFrom('denisaiovin13@yahoo.com', 'Mailer');
            $mail->addAddress('denisaiovin13@yahoo.com'); // Adresa destinatar

            // Conținutul emailului
            $mail->isHTML(true);
            $mail->Subject = 'New Form Submission';
            $mail->Body = "User Name: $name.<br>User Email: $visitor_email.<br>User Subject: $subject.<br>User Message: $message.<br>";
            $mail->AltBody = "User Name: $name.\nUser Email: $visitor_email.\nUser Subject: $subject.\nUser Message: $message.\n";

            $mail->send();
            header("Location: contact.php?status=success");
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            header("Location: contact.php?status=error");
        }
    } else {
        header("Location: contact.php?status=invalid");
    }
    exit();
} else {
    header("Location: contact.php");
    exit();
}
