<?php
session_start();
include "../../database/connectDB.php"; 

if (isset($_POST['add_review'])) {
    $ebook_id = $_POST['ebook_id'];
    $user_id = $_SESSION['user_id']; 
    $comment = $_POST['comment'];
    $rating = $_POST['star-radio']; 
    $spoil = $_POST['spoiler']; 
    
    if (empty($comment) || $rating == -1) {
        echo "<script>alert('กรุณาให้คะเเนน'); window.history.back();</script>";
        exit();
    }

    
    $sql = "INSERT INTO review (ebook_id, user_id, comment, rating,Spoiler) VALUES ('$ebook_id', '$user_id', '$comment', '$rating','$spoil')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        echo "<script>alert('บันทึกรีวิวเรียบร้อยแล้ว'); window.location.href='../../ebook_detail.php?id=$ebook_id';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php");
    exit();
}
?>