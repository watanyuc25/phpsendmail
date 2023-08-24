#!/usr/bin/php -q
<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_username';
    $mail->Password = '<App Password>';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('sender@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body = 'Message body';

    $mail->send();
    echo 'Email sent!';
} catch (Exception $e) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>