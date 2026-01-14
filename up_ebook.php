<?php
session_start();
include "./database/connectDB.php"
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
        <?php include "./include/navbar.php" ?>
    </header>
    <main>
        <?php include "./include/modal.php" ?>


<div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-end">



                <div class="btn-group dropstart" >
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        เพิ่มอีบุคใหม่
                    </button>
                    <div class="dropdown-menu p-4" style="min-width: 350px;">
                        <form method="POST" action="admin/check/check_addEbook.php" enctype="multipart/form-data">
                            <div class="mb-2">
                                <label class="form-label">ชื่อเรื่อง</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">ผู้แต่ง</label>
                                <input type="text" name="author" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">หมวดหมู่</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">เลือกหมวดหมู่</option>
                                    <?php
                                    $categories = mysqli_query($conn, "SELECT * FROM categories");
                                    while ($cat = mysqli_fetch_assoc($categories)) {
                                        echo "<option value='{$cat['category_id']}'>{$cat['category_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">รายละเอียด</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">รูปหน้าปก</label>
                                <input type="file" name="image_title" class="form-control" accept="image/*" required>
                            </div>
                            <button type="submit" name="add_ebook" class="btn btn-info w-100">บันทึกข้อมูล</button>
                        </form>
                    </div>
                </div>
            </div>






            <div class="card-body" >
                <div class="table-responsive">
                    <table class="table table-hover" id="myEbookTable">
                        <thead>
                            <tr>
                                <th>รูปปก</th>
                                <th>ชื่อเรื่อง</th>
                                <th>หมวดหมู่</th>
                                <th>สถานะ</th>
                                <th>วันที่อัปโหลด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $user_id = $_SESSION['user_id'];
                            $sql = "SELECT ebooks.*, categories.category_name 
                            FROM ebooks 
                            LEFT JOIN categories ON ebooks.category_id = categories.category_id 
                            WHERE ebooks.user_id = '$user_id'
                            ORDER BY ebooks.created_at DESC";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr class="align-middle">
                                        <td>
                                            <img src="assets/images/ebook/<?= $row['image_title'] ?>" width="50" class="border">
                                        </td>
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
                                echo "<tr><td colspan='5' class='text-center'>ยังไม่มีอีบุค</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
        <?php include "./include/footer.php" ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
  <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>


        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js.js"></script> 
</body>

</html>