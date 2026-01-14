<?php
session_start();
include "../../database/connectDB.php";

if (isset($_POST['report']) && isset($_SESSION['user_id'])) {
    $review_id = $_POST['review_id'];
    $user_id = $_SESSION['user_id']; 
    $report_data = $_POST['report_data'];

    $sql = "INSERT INTO report (review_id, user_id, report_data) VALUES ('$review_id', '$user_id', '$report_data')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('ส่งรายงานเรียบร้อยแล้ว'); window.history.back();</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: ../../index.php");
}
?>