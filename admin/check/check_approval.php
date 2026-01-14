<?php
include "../../database/connectDB.php"; 

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

   
    if ($status == 'approve' || $status == 'rejected') {
      
        $sql = "UPDATE ebooks SET status = '$status' WHERE ebook_id = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('ดำเนินการสำเร็จ');
                    window.location.href='../index.php?page=5'; 
                  </script>";
        } else {
            echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
        }
    }
}
?>