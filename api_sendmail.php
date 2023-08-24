<?php
require 'vendor/autoload.php'; // ใช้งาน Autoloader ของ Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ตรวจสอบว่าเป็นการเรียกใช้งานผ่าน HTTP POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับข้อมูลจาก HTTP POST หรือ JSON body (ขึ้นอยู่กับการใช้งาน)
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // สร้างอินสแตนซ์ของ PHPMailer
    $mail = new PHPMailer(true);

    try {
        // ตั้งค่าการเชื่อมต่อ SMTP (แก้ไขตามความต้องการ)
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_username';
        $mail->Password = 'your_password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // ตั้งค่าผู้ส่งและผู้รับ
        $mail->setFrom('sender@example.com', 'Your Name');
        $mail->addAddress($to);

        // ตั้งค่าเนื้อหาอีเมล
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // ส่งอีเมล
        $mail->send();
        echo json_encode(['success' => true, 'message' => 'Email sent']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Email could not be sent']);
    }
}
