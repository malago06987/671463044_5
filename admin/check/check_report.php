<?php
session_start();
include "../../database/connectDB.php";

if (isset($_GET['review_id']) && isset($_GET['report_id'])) {
    $review_id = $_GET['review_id'];
    $report_id = $_GET['report_id'];

    $sql_report = "DELETE FROM report WHERE report_id = '$report_id'";
    if (mysqli_query($conn, $sql_report)) {

        $sql_review = "DELETE FROM review WHERE review_id = '$review_id'";
        if (mysqli_query($conn, $sql_review)) {
            echo "<script>alert('ลบคอมเม้นเรียบร้อยเเล้ว'); window.location.href='../index.php?page=6';</script>";
        } else {
            echo "<script>alert('ลบรีวิวไม่สำเร็จ'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('ลบรายการรายงานไม่สำเร็จ'); window.history.back();</script>";
    }
} else {
    header("Location: ../pages/report.php");
}
?>