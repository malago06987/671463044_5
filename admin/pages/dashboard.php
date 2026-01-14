<?php
// 1. นับจำนวนผู้ใช้งาน
$sql_users = "SELECT COUNT(*) as total FROM users";
$res_users = mysqli_query($conn, $sql_users);
$row_users = mysqli_fetch_assoc($res_users);

// 2. นับจำนวน E-book ทั้งหมด และแยกตามสถานะ
$sql_ebooks = "SELECT 
                COUNT(*) as total,
                SUM(CASE WHEN status = 'approve' THEN 1 ELSE 0 END) as approved,
                SUM(CASE WHEN status = 'waiting' THEN 1 ELSE 0 END) as waiting
               FROM ebooks";
$res_ebooks = mysqli_query($conn, $sql_ebooks);
$row_ebooks = mysqli_fetch_assoc($res_ebooks);

// 3. นับจำนวนรายงานปัญหา (Reports)
$sql_reports = "SELECT COUNT(*) as total FROM report";
$res_reports = mysqli_query($conn, $sql_reports);
$row_reports = mysqli_fetch_assoc($res_reports);

// 4. นับจำนวนหมวดหมู่
$sql_cats = "SELECT COUNT(*) as total FROM categories";
$res_cats = mysqli_query($conn, $sql_cats);
$row_cats = mysqli_fetch_assoc($res_cats);
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">ผู้ใช้งานทั้งหมด: <?php echo $row_users['total']; ?> คน</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=2">ดูรายละเอียด</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">E-book (อนุมัติแล้ว): <?php echo $row_ebooks['approved']; ?> เล่ม</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=5">จัดการการอนุมัติ</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-dark mb-4">
                <div class="card-body">E-book (รออนุมัติ): <?php echo $row_ebooks['waiting']; ?> เล่ม</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-dark stretched-link" href="?page=5">ไปที่หน้าอนุมัติ</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">รายงานปัญหา: <?php echo $row_reports['total']; ?> รายการ</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=6">ดูรายงาน</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            อีบุคที่ลงทะเบียนล่าสุด
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ชื่อเรื่อง</th>
                        <th>หมวดหมู่</th>
                        <th>สถานะ</th>
                        <th>วันที่เพิ่ม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_recent = "SELECT e.*, c.category_name 
                                   FROM ebooks e 
                                   INNER JOIN categories c ON e.category_id = c.category_id 
                                   ORDER BY e.created_at DESC LIMIT 5";
                    $result_recent = mysqli_query($conn, $sql_recent);

                    if (mysqli_num_rows($result_recent) > 0) {
                        while ($row = mysqli_fetch_assoc($result_recent)) {
                    ?>
                            <tr class="align-middle">
                                <td>
                                    <div class="fw-bold"><?= $row["title"] ?></div>
                                    <small class="text-muted">โดย: <?= $row["author"] ?></small>
                                </td>
                                <td><?= $row["category_name"] ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 'approve') {
                                        $color = "bg-success";
                                        $status = "อนุมัติแล้ว";
                                    } elseif ($row['status'] == 'waiting') {
                                        $color = "bg-warning text-dark";
                                        $status = "รอการตรวจสอบ";
                                    } else {
                                        $color = "bg-danger";
                                        $status = "ไม่อนุมัติ";
                                    }
                                    ?>
                                    <span class="badge <?php echo $color; ?>">
                                        <?php echo $status; ?>
                                    </span>
                                </td>
                                <td><?= date('d/m/Y', strtotime($row["created_at"])) ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>ยังไม่มีอีบุค</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>