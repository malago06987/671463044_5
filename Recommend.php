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
        rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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









<div class="container my-5">
            <?php
            $sql_cat = "SELECT * FROM categories ORDER BY category_name ASC";
            $query_cat = mysqli_query($conn, $sql_cat);

            while ($cat = mysqli_fetch_assoc($query_cat)) {
                $cat_id = $cat['category_id'];
                $cat_name = $cat['category_name'];
            ?>
                <div class="d-flex justify-content-between align-items-center mb-4 mt-5 border-bottom pb-2">
                    <h4 class="fw-bold mb-0 text-primary"><i class="bi bi-film"></i>  <?php echo $cat_name; ?></h4>
                </div>

                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 justify-content-start">
                    <?php
                    $sql_ebooks = "SELECT e.*, c.category_name, 
                                   COUNT(r.review_id) as total_reviews, 
                                   AVG(r.rating) as avg_rating 
                                   FROM ebooks e 
                                   LEFT JOIN categories c ON e.category_id = c.category_id 
                                   LEFT JOIN review r ON e.ebook_id = r.ebook_id 
                                   WHERE e.category_id = '$cat_id' AND e.status = 'approve' 
                                   GROUP BY e.ebook_id 
                                   ORDER BY e.created_at DESC LIMIT 5";
                    
                    $result = $conn->query($sql_ebooks);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm border border-secondary-subtle card-hover">
                                <img src="assets/images/ebook/<?php echo $row['image_title']; ?>" 
                                     class="card-img-top" 
                                     style="height: 220px; object-fit: cover;" 
                                     alt="<?php echo $row['title']; ?>">

                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-info text-dark" style="font-size: 0.7rem;">
                                            <?php echo $row['category_name']; ?>
                                        </span>
                                        <div class="small">
                                            <?php if ($row['total_reviews'] > 0): ?>
                                                <span class="text-warning" style="font-size: 0.8rem;">
                                                    <i class="bi bi-star-fill"></i> <?php echo round($row['avg_rating'], 1); ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="text-muted" style="font-size: 0.7rem;">ไม่มีรีวิว</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <h6 class="card-title fw-bold text-truncate" title="<?php echo $row['title']; ?>">
                                        <?php echo $row['title']; ?>
                                    </h6>

                                    <p class="card-text text-muted mb-2" style="font-size: 0.75rem;">
                                        โดย: <?php echo $row['author']; ?>
                                    </p>

                                    <p class="card-text text-muted small flex-grow-1" style="font-size: 0.75rem; height: 3em; overflow: hidden;">
                                       <?php echo mb_substr($row['description'], 0, 60).'...'; ?>
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
                        echo "<div class='col-12'><p class='text-muted small ps-2'>ยังไม่มีอีบุ๊กในหมวดนี้</p></div>";
                    }
                    ?>
                </div>
            <?php } ?>
        </div>


    </main>

    <footer>
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

        <script src="assets/js.js"></script> 
<script>
  // modalหลังสมัคร
  <?php if (isset($_GET['reg_info']) && $_GET['reg_info'] == 1): ?>
    window.addEventListener('load', function() {
      const loginModal = new bootstrap.Modal(document.getElementById('showLogin'));
      loginModal.show();
    });
  <?php endif; ?>
</script>
</body>

</html>