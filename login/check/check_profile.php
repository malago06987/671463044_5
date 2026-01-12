<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}
include "../../database/connectDB.php";

$user_id   = $_SESSION['user_id'];
$user_name = $_POST['user_name'];
$old_pass  = $_POST['user_password'];
$new_pass  = $_POST['new_pass'];

// ---------------- อัปโหลดรูป ----------------
$img_profile = "";
if (!empty($_FILES['img_profile']['name'])) {
    $target_dir = "../../assets/images/profile/";
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
    $password != "" &&
    $new_pass != ""){

















    }

?>