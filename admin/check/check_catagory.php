<?php
session_start();
include "../../database/connectDB.php";


/* เพิ่ม */
if (isset($_POST['add_category'])) {
    $category_name = trim($_POST['category_name'] ?? '');

    if ($category_name === '') {
        echo "<script>alert('กรุณากรอกชื่อหมวดหมู่'); window.history.back();</script>";
        exit;
    }

    $stmt = $conn->prepare("SELECT category_id FROM categories WHERE category_name = ?");
    if ($stmt) {
        $stmt->bind_param("s", $category_name);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->close();
            echo "<script>alert('ชื่อหมวดหมู่มีอยู่แล้ว'); window.location.href='../index.php?page=1';</script>";
            exit;
        }
        $stmt->close();
    }


    $stmt = $conn->prepare("INSERT INTO categories (category_name) VALUES (?)");
    if ($stmt) {
        $stmt->bind_param("s", $category_name);
        if ($stmt->execute()) {
            echo "<script>alert('เพิ่มหมวดหมู่สำเร็จ'); window.location.href='../index.php?page=catagory';</script>";
        } else {
            $err = addslashes($stmt->error ?: $conn->error);
            echo "<script>alert('เกิดข้อผิดพลาด: {$err}'); window.history.back();</script>";
        }
        $stmt->close();
    } else {
        $err = addslashes($conn->error);
        echo "<script>alert('เกิดข้อผิดพลาด: {$err}'); window.history.back();</script>";
    }
}








/* ลบ */
if (isset($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];

    $sql = "DELETE FROM categories WHERE category_id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php?page=catagory");
        exit;
    } else {
        echo "ลบไม่สำเร็จ";
    }
}









// แก้ไข
if (isset($_POST['update_category'])) {
    $id = (int) $_POST['category_id'];
    $name = trim($_POST['category_name'] ?? '');

    if ($name === '') {
        echo "<script>alert('กรุณากรอกชื่อหมวดหมู่'); window.history.back();</script>";
        exit;
    }

    $stmt = $conn->prepare("UPDATE categories SET category_name = ? WHERE category_id = ?");
    if ($stmt) {
        $stmt->bind_param("si", $name, $id);
        if ($stmt->execute()) {
            header("Location: ../index.php?page=1");
            exit;
        } else {
            $err = addslashes($stmt->error ?: $conn->error);
            echo "<script>alert('แก้ไขไม่สำเร็จ: {$err}'); window.history.back();</script>";
        }
        $stmt->close();
    } else {
        $err = addslashes($conn->error);
        echo "<script>alert('เกิดข้อผิดพลาด: {$err}'); window.history.back();</script>";
    }
}
?>







