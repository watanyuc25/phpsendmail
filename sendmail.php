#!/usr/bin/php -q
<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '<email>@gmail.com';
    $mail->Password = '<App Password>';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('<email>@gmail.com', 'Name Sender');
    $mail->addAddress('<email>@hotmail.com', 'Name destination');

    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body = 'Message body';

    $mail->send();
    echo 'Email sent!';
} catch (Exception $e) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>