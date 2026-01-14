<?php
include '../../database/connectDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];


    if ($new_password !== $confirm_password) {
        echo "<script>alert('รหัสผ่านไม่ตรงกัน!'); window.history.back();</script>";
        exit;
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    try {
        $sql = "UPDATE user SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$hashed_password, $email]);

        echo "<script>
                alert('เปลี่ยนรหัสผ่านสำเร็จแล้ว!'); 
                window.location.href='../../index.php'; 
              </script>";
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
}
?>