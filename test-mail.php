<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.mail.yahoo.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'denisaiovin13@yahoo.com'; 
    $mail->Password = 'rjlzuibtcctkzqmc'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('denisaiovin13@yahoo.com', 'Mailer');
    $mail->addAddress('denisaiovin13@yahoo.com');

    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email';
    $mail->AltBody = 'This is a test email';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

