<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configurați setările serverului SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.mail.yahoo.com'; // Host SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'denisaiovin13@yahoo.com'; // Nume utilizator SMTP
    $mail->Password = 'rjlzuibtcctkzqmc'; // Parola de aplicație Yahoo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinatar și expeditor
    $mail->setFrom('denisaiovin13@yahoo.com', 'Mailer');
    $mail->addAddress('denisaiovin13@yahoo.com');

    // Conținutul emailului
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email';
    $mail->AltBody = 'This is a test email';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

