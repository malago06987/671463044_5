<?php

$recieve=$_POST['email'];
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
    $mail->Subject = 'ลืมรหัสผ่าน';
    $mail->Body    = 'คลิกลิ้งค์นี้เพื่อเปลี่ยนรหัสผ่านของคุณ: <a href="http://localhost/671463044_5/reset_password.php?email='.$recieve.'">เปลี่ยนรหัสผ่าน</a>';
    $mail->AltBody = 'ระบบแจ้งเตือนลืมรหัสผ่าน';
    $mail->send();
    echo "<script>
                    alert('ดูอีเมลเพื่อเปลี่ยนรหัสผ่าน!'); 
                    window.location.href='../index.php';
                  </script>";
} catch (Exception $e) {
    echo "❌ ส่งอีเมลไม่สำเร็จ: {$mail->ErrorInfo}";
}
