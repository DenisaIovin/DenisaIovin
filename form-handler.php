<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
            $mail->Password = '$IDVmua13!'; // Parolă de aplicație
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Modul de depanare
            $mail->SMTPDebug = 2; // Setează la 0 pentru dezactivare, 2 pentru informații detaliate de depanare
            $mail->Debugoutput = 'html'; // Modul de afișare a mesajelor de debug

            // Destinatar și expeditor
            $mail->setFrom('emailtest@gmail.com', 'Mailer');
            $mail->addAddress('denisaiovin13@yahoo.com'); // Adresa destinatar

            // Conținutul emailului
            $mail->isHTML(true);
            $mail->Subject = 'New Form Submission';
            $mail->Body = "User Name: $name.<br>User Email: $visitor_email.<br>User Subject: $subject.<br>User Message: $message.<br>";
            $mail->AltBody = "User Name: $name.\nUser Email: $visitor_email.\nUser Subject: $subject.\nUser Message: $message.\n";

            $mail->send();
            header("Location: contact.php?status=success");
        } catch (Exception $e) {
            echo "Mesajul nu a putut fi trimis. Eroare: {$mail->ErrorInfo}";
        }
    } else {
        header("Location: contact.php?status=validation_error");
    }
    exit();
}


?>