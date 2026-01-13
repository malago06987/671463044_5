<?php 
session_start();
include "./database/connectDB.php"
?>
<!doctype html>
<html lang="en">

<head>
    <title>หน้าหลัก</title>
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


            <?php
            $folder_name = "assets/images/ebook/";
            $images = glob($folder_name . "*.{jpg,png,jpeg,gif}", GLOB_BRACE);
            if (count($images) > 0) {
            ?>
                <div id="folderCarousel"
                    class="carousel slide"
                    data-bs-ride="carousel"
                    data-bs-interval="3000">
                    <div class="carousel-inner">
                        <?php
                        $isFirst = true;
                        foreach ($images as $image_file) {
                            $active_class = ($isFirst) ? 'active' : '';
                            $isFirst = false;
                        ?>
                            <div class="carousel-item <?php echo $active_class; ?>">
                                <img src="<?php echo $image_file; ?>" class="d-block w-100" style="height: 300px; object-fit: contain; background-color: #f0f0f0;" alt="Slide Image">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            } else {
                echo "<div class='alert alert-warning'>ไม่พบไฟล์รูปภาพในโฟลเดอร์ $folder_name</div>";
            }
            ?>




            <div class="container my-4">
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 justify-content-center" id="result">
    <?php
    $sql = "SELECT ebooks.*, categories.category_name 
            FROM ebooks 
            LEFT JOIN categories ON ebooks.category_id = categories.category_id 
            WHERE ebooks.status = 'approve' 
            ORDER BY ebooks.created_at DESC";
            
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
           <div class="col">
    <div class="card h-100 shadow border border-secondary-subtle">
        <img src="assets/images/ebook/<?php echo $row['image_title']; ?>" 
             class="card-img-top" 
             style="height: 200px; object-fit: cover;" 
             alt="<?php echo $row['title']; ?>">

        <div class="card-body d-flex flex-column">
            <span class="badge bg-info text-dark mb-2 align-self-start">
                <?php echo $row['category_name']; ?>
            </span>

           <h5 class="card-title fw-bold d-block w-100">
    <?php echo $row['title']; ?>
</h5>

            <p class="card-text text-muted small mb-1">
                โดย: <?php echo $row['author']; ?>
            </p>

            <p class="card-text text-muted small flex-grow-1">
               <?php echo mb_substr($row['description'], 0, 100).'...'; ?>

            </p>

            <a href="ebook_detail.php?id=<?php echo $row['ebook_id']; ?>" 
               class="btn btn-outline-info btn-sm w-100 mt-auto">
                อ่านรายละเอียด
            </a>
        </div>
    </div>
</div>

    <?php
        }
    } else {
      
        echo "<div class='col-12'><div class='alert alert-secondary text-center'>ยังไม่มีอีบุ๊กที่ได้รับการอนุมัติในขณะนี้</div></div>";
    }
    ?>
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