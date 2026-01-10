<?php
session_start();
include "../../database/connectDB.php";
if ((isset($_REQUEST['user_name'])) && isset($_REQUEST['password'])) {


  // ---------------- รับค่าจากฟอร์ม ----------------
  $user_name = trim($_REQUEST['user_name']); // email หรือ user_name
  $password = $_REQUEST['password'];

  // ---------------- ตรวจสอบข้อมูลว่าง ----------------
  if ($user_name == "" || $password == "") {
    echo "<script>
    alert('กรุณากรอกชื่อผู้ใช้และรหัสผ่าน');
    history.back();
  </script>";
    exit;
  }

  // ---------------- ตรวจสอบผู้ใช้ในฐานข้อมูล ----------------
  $sql = "
  SELECT * 
  FROM users 
  WHERE email = '$user_name' 
   OR user_name = '$user_name'
  LIMIT 1
";

  $result = $conn->query($sql);

  if ($result->num_rows == 1) {

    $user = $result->fetch_assoc();

    // ---------------- ตรวจสอบรหัสผ่าน ----------------
    if (password_verify($password, $user['password'])) {

      // ---------- สร้าง session ----------
      $_SESSION['user_id']   = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['email']     = $user['email'];
            $_SESSION['role']      = $user['role']; 
            $_SESSION['img_user']  = $user['img_user'];

      echo "<script>
      window.location='../../index.php';
    </script>";
    } else {
      echo "<script>
      alert('รหัสผ่านไม่ถูกต้อง');
      history.back();
    </script>";
    }
  } else {
    echo "<script>
    alert('ไม่พบผู้ใช้นี้ในระบบ');
    history.back();
  </script>";
  }
}
?>