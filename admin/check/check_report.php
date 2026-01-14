<?php
session_start();
include "../../database/connectDB.php";
if (isset($_GET['review_id']) && isset($_GET['report_id'])) {
    $review_id = $_GET['review_id'];
    $report_id = $_GET['report_id'];
    mysqli_begin_transaction($conn);

    try {
        $sql_report = "DELETE FROM report WHERE report_id = '$report_id'";
        mysqli_query($conn, $sql_report);
        $sql_review = "DELETE FROM review WHERE review_id = '$review_id'";
        mysqli_query($conn, $sql_review);

        mysqli_commit($conn);
        echo "<script>alert('ลบคอมเม้นเเล้ว'); window.location.href='../pages/report.php';</script>";
    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo "<script>alert('เกิดข้อผิดพลาด: " . $e->getMessage() . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../pages/report.php");
}
?>