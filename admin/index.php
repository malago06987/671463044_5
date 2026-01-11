<?php 
session_start();
include "../database/connectDB.php";



?>
<!doctype html>
<html lang="en">

<head>
    <title>ภาพรวม</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
        
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
          <div class="collapse d-md-block" id="adminSidebar">
            <h6 class="text-uppercase text-muted mb-3 fw-bold">
              หน้าต่างแอดมิน
            </h6>

            <nav class="nav nav-pills flex-column gap-1">
  <a class="nav-link <?= ($_GET['page'] ?? 'overview') === 'overview' ? 'active' : 'text-dark' ?>"
     href="dashboard.php?page=overview">
    📊 ภาพรวม
  </a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'users' ? 'active' : 'text-dark' ?>"
     href="dashboard.php?page=users">
    👤 ผู้ใช้
  </a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'categories' ? 'active' : 'text-dark' ?>"
     href="dashboard.php?page=categories">
    ⚙️ หมวดหมู่
  </a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'ebooks' ? 'active' : 'text-dark' ?>"
     href="dashboard.php?page=ebooks">
    📘 การเพิ่มอีบุค
  </a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'approve' ? 'active' : 'text-dark' ?>"
     href="dashboard.php?page=approve">
    📰 การอนุมัติ
  </a>

  <a class="nav-link <?= ($_GET['page'] ?? '') === 'report' ? 'active' : 'text-dark' ?>"
     href="dashboard.php?page=report">
    📊 การรายงาน
  </a>
            </nav>
          </div>
        </div>


    <div class="col-12 col-md-9 col-lg-10 p-4">

<?php
$page = $_GET['page'] ?? 'dashboard';

$pages = [
  'dashboard'   => 'dashboard.php',
  'users'      => 'users.php',
  'categories' => 'categories.php',
  'ebooks'     => 'ebooks.php',
  'approve'    => 'approve.php',
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

        <script src="../assets/js.js"></script> 
</body>

</html>