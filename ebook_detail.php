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

    <div class="container mt-5 mb-5">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h4><i class="bi bi-journal-text"></i> รายละเอียดอีบุ๊ก</h4>
                       
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <h2 class="text-primary fw-bold"><?php echo $row['topic_header']; ?></h2>
                                <hr>

                                <div class="mb-3">
                                    <label class="fw-bold text-secondary">รายละเอียด:</label>
                                    <p class="card-text"><?php echo nl2br($row['topic_detail']); ?></p>
                                </div>

                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item bg-transparent">
                                        <strong><i class="bi bi-person-video3"></i> ผู้เเต่ง:</strong>
                                        <span class="text-dark"><?php echo $row['lecturer_name']; ?></span>
                                    </li>
                                    <li class="list-group-item bg-transparent">
                                        <strong><i class="bi bi-calendar-event"></i> วันที่อัปโหลด:</strong>
                                        <span class="text-success"><?php echo $row['start']; ?></span> ถึง <span class="text-danger"><?php echo $row['end']; ?></span>
                                    </li>
                                    <li class="list-group-item bg-transparent">
                                        <strong><i class="bi bi-geo-alt-fill"></i> สถานที่:</strong>
                                        <?php echo $row['place']; ?>
                                    </li>
                                </ul>
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