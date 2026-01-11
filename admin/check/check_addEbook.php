<?php
session_start();
include "../../database/connectDB.php"; 

if (isset($_POST['add_ebook'])) {
    $user_id     = $_SESSION['user_id']; 
    $title       = $_POST['title'];
    $author      = $_POST['author'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];



    $image_title = "";
    if (!empty($_FILES['image_title']['name'])) {
        $target_dir = "../../assets/images/ebook/"; 
        
        $ext = pathinfo($_FILES['image_title']['name'], PATHINFO_EXTENSION);
        $new_name = uniqid("ebook_") . "." . $ext;
        $target_file = $target_dir . $new_name;

        if (move_uploaded_file($_FILES['image_title']['tmp_name'], $target_file)) {
            $image_title = $new_name;
        } else {
            echo "<script>alert('อัปโหลดรูปภาพหน้าปกไม่สำเร็จ'); history.back();</script>";
            exit;
        }
    }
    if (!empty($title) && !empty($author) && !empty($image_title)) {
        $sql = "INSERT INTO ebooks (title, description, author, image_title, category_id, user_id) 
                VALUES ('$title', '$description', '$author', '$image_title', '$category_id', '$user_id')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('เพิ่มอีบุคสำเร็จ!'); 
                    window.location.href='../index.php?page=addEbook';
                  </script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด: " . mysqli_error($conn) . "'); history.back();</script>";
        }
    } else {
        echo "<script>alert('กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน'); history.back();</script>";
    }
}
?>