<?php 
session_start();
include "./database/connectDB.php"
?>
<!doctype html>
<html lang="en">

<head>
    <title>รายละเอียด</title>
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
        <?php include "./include/navbar.php" ?>
    </header>
    <main>
   <?php include "./include/modal.php" ?>


<?php $ebook_id = $_GET['id'] ?? '';
$sql = "SELECT ebooks.*, categories.category_name 
        FROM ebooks 
        LEFT JOIN categories ON ebooks.category_id = categories.category_id 
        WHERE ebooks.ebook_id = '$ebook_id' AND ebooks.status = 'approve'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
        <div class="container mt-5 mb-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><i class="bi bi-book"></i> รายละเอียดอีบุ๊ก</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <img src="assets/images/ebook/<?php echo $row['image_title']; ?>" 
                                 class="img-fluid rounded shadow border" 
                                 alt="<?php echo $row['title']; ?>"
                                 style="max-height: 500px; object-fit: cover;">
                        </div>

                        <div class="col-md-8">
                            <span class="badge bg-info text-dark mb-2"><?php echo $row['category_name']; ?></span>
                            <h2 class="text-primary fw-bold"><?php echo $row['title']; ?></h2>
                            <p class="text-muted">โดย: <?php echo $row['author']; ?></p>
                            <hr>

                            <div class="mb-4">
                                <h5 class="fw-bold text-secondary">เรื่องย่อ :</h5>
                                <p class="card-text" style="white-space: pre-line;">
                                    <?php echo !empty($row['description']) ? $row['description'] : 'ไม่มีรายละเอียดข้อมูล'; ?>
                                </p>
                            </div>

                            
                                 <div class="mb-4">
    <span class="fw-bold text-secondary">วันที่อัปโหลด :</span>
    <span class="ms-2"><?php echo date('d/m/Y', strtotime($row['created_at'])); ?></span>
</div>

<div class="mb-4">
    <span class="fw-bold text-secondary">หมวดหมู่ :</span>
    <span class="ms-2"><?php echo $row['category_name']; ?></span>
</div>


                            <div class="d-grid gap-2 d-md-block">
                                <a href="index.php" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> ย้อนกลับ
                                </a>
                                </div>
                        </div>
                        


<div class="mt-4">
    <hr>
    <h2>รีวิวทั้งหมด</h2>
<?php if (
    isset($_SESSION['role']) &&($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin')): ?>


<?php echo basename(__FILE__); ?>


<?php else: ?>

 
<div class="">

     <div class="text-center">
      <a href="#"
        class="btn btn-primary btn-lg fw-semibold px-5 shadow-sm"
        data-bs-toggle="modal"
        data-bs-target="#showLogin">
        เข้าสู่ระบบเพื่อเขียนเเละอ่านรีวิว
      </a>
      </div>

</div>


<?php endif; ?>

</div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <?php include "./include/footer.php" ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/js.js"></script>

</body>

</html>