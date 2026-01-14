<?php

$recieve=$_GET['email'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {
    // ---------------- SMTP SETTINGS ----------------
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '671463044@crru.ac.th';
    $mail->Password   = 'tydf cspm jhak tzki'; // App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; // 

    $mail->CharSet  = 'UTF-8';
    $mail->Encoding = 'base64';
    // ---------------- SENDER ----------------
    $mail->setFrom('671463044@crru.ac.th', 'ระบบแจ้งเตือน');
    $mail->addAddress($recieve, 'ผู้รับ');
    // ---------------- CONTENT ----------------
    $mail->isHTML(true);
    $mail->Subject = 'ทดสอบการส่งเมลจาก PHP';
    $mail->Body    = '<h3>สวัสดี</h3><p>เมลนี้ถูกส่งจาก PHP ผ่าน Gmail SMTP</p>';
    $mail->AltBody = 'เมลทดสอบจาก PHP';
    $mail->send();
    echo '✅ ส่งอีเมลสำเร็จ';
} catch (Exception $e) {
    echo "❌ ส่งอีเมลไม่สำเร็จ: {$mail->ErrorInfo}";
}
