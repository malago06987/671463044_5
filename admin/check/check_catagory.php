<?php
session_start();
include "./database/connectDB.php";

if (isset($_POST['add_category'])) {
    $catagory_name = mysqli_real_escape_string($conn, $_POST['category_name']);

    if (!empty($catagory_name)) {
        $sql_insert = "INSERT INTO categories (category_name) VALUES ('$catagory_name')";
        if (mysqli_query($conn, $sql_insert)) {
            echo "<script>alert('เพิ่มหมวดหมู่สำเร็จ'); window.location.href='../index.php?page=catagory';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
