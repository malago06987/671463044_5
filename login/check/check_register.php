<?php
include "../../database/connectDB.php";

// ---------------- รับค่าจากฟอร์ม ----------------
$user_name = trim($_POST['user_name']);
$email   = trim($_POST['email']);
$password  = $_POST['password'];
$confirm  = $_POST['confirm_password'];

// ---------------- อัปโหลดรูป ----------------
if (!empty($_FILES['img_profile']['name'])) {
    $target_dir = "../images/profile/";
    $ext = pathinfo($_FILES['img_profile']['name'], PATHINFO_EXTENSION);
    $new_name = uniqid("user_") . "." . $ext;
    $target_file = $target_dir . $new_name;

    if (move_uploaded_file($_FILES['img_profile']['tmp_name'], $target_file)) {
        $img_profile = $new_name;
    } else {
        echo "<script>alert('อัปโหลดรูปไม่สำเร็จ'); history.back();</script>";
        exit;
    }
}


if(
    $user_name != "" &&
    $email != "" &&
    $password != "" &&
    $confirm != ""){




// ---------------- ตรวจสอบข้อมูล ----------------
if ($password != $confirm) {
  echo "<script>
    alert('รหัสผ่านไม่ตรงกัน');
    history.back();
  </script>";
  exit;
}

// ---------------- ตรวจสอบอีเมลซ้ำ ----------------
$check_sql = "SELECT user_id FROM users WHERE email = '$email'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
  echo "<script>
    alert('อีเมลนี้ถูกใช้งานแล้ว');
    history.back();
  </script>";
  exit;
}

// ---------------- ตรวจสอบuser_nameซ้ำ ----------------
$check_sql = "SELECT user_name FROM users WHERE user_name = '$user_name'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
  echo "<script>
    alert('user_name นี้ถูกใช้งานแล้ว');
    history.back();
  </script>";
  exit;
}
// ---------------- เข้ารหัสรหัสผ่าน ----------------
$hash_password = password_hash($password, PASSWORD_DEFAULT);

// ---------------- Insert ข้อมูล ----------------
$insert_sql = "
  INSERT INTO users (user_name, email, password, img_user)
  VALUES ('$user_name', '$email', '$hash_password', '$img_profile')
";

if ($conn->query($insert_sql) === TRUE) {
  echo "<script>
    alert('สมัครสมาชิกเรียบร้อยแล้ว');
    window.location='login.php';
  </script>";
} else {
  echo "<script>
    alert('เกิดข้อผิดพลาด: {$conn->error}');
    history.back();
  </script>";
}
} else {
  echo "<script>
    alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');
    history.back();
  </script>";
}
?>

