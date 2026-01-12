<?php 
session_start();
include "../database/connectDB.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>ตั้งค่าเเอดมิน</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body>
    <header>
        <?php include "./include/navbarAdmin.php" ?>
    </header>



    <main>
    <div class="container-fluid">


      <div class="row">
        <!-- Sidebar -->
        <div class="col-12 col-md-3 col-lg-2 bg-light border-end min-vh-100 p-3">
        
            <h6 class="text-uppercase text-muted mb-3 fw-bold">
              หน้าต่างแอดมิน
            </h6>

            <nav class="nav nav-pills flex-column gap-1">
  <a class="nav-link  <?= ($_GET['page'] ?? 'dashboard') === 'dashboard' ? 'active bg-success text-white' : 'text-dark' ?>"href="index.php?page=dashboard" ><i class="bi bi-tv"></i> ภาพรวม</a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'user' ? 'active bg-success text-white' : 'text-dark' ?>"href="index.php?page=user"><i class="bi bi-people"></i> ผู้ใช้</a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'catagory' ? 'active bg-success text-white' : 'text-dark' ?>"href="index.php?page=catagory"><i class="bi bi-tags"></i> หมวดหมู่</a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'addEbook' ? 'active bg-success text-white' : 'text-dark' ?>"href="index.php?page=addEbook"><i class="bi bi-bookmark-plus"></i> การเพิ่มอีบุค</a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'approval' ? 'active bg-success text-white' : 'text-dark' ?>"href="index.php?page=approval"><i class="bi bi-bookmark-check"></i> การอนุมัติ</a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'report' ? 'active bg-success text-white' : 'text-dark' ?>"href="index.php?page=report"><i class="bi bi-envelope-exclamation"></i> การรายงาน</a>

            </nav>
     
        </div>





    <div class="col-12 col-md-9 col-lg-10 p-4">

<?php
$page = $_GET['page'] ?? 'dashboard';

$pages = [
  'dashboard'   => 'dashboard.php',
  'user'      => 'user.php',
  'catagory' => 'catagory.php',
  'addEbook'     => 'addEbook.php',
  'approval'    => 'approval.php',
  'report'     => 'report.php'
];

if (array_key_exists($page, $pages)) {
    include __DIR__ . '/pages/' . $pages[$page];
} else {
    echo "<h4>ไม่พบหน้านี้</h4>";
}
?>

</div>




      </div>

    </div>
    </main>

    <footer>
     
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
<script src="../assets/js.js"></script> 
</body>

</html>