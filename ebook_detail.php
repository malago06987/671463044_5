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
    <link rel="stylesheet" href="assets/style.css">

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
        $result3 = $conn->query($sql);
        $row = $result3->fetch_assoc();
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
                            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin')): ?>
                                <div class="card mb-4 border-0 shadow-sm bg-light">
                                    <div class="card-body">
                                        <h5 class="fw-bold">เขียนรีวิวของคุณ</h5>
                                        <form action="login/check/check_review.php" method="POST">
                                            <input type="hidden" name="ebook_id" value="<?php echo $ebook_id; ?>">
                                            <div class="wrapper">
                                                
                                                    <h2 id="title" class="call-to-action-text">ให้คะเเนนอีบุ๊ค:</h2>
                                                    <div class="star-wrap">
                                                        <input class="star" checked type="radio" value="-1" id="skip-star" name="star-radio" autocomplete="off" />
                                                        <label class="star-label hidden"></label>
                                                        <input class="star" type="radio" id="st-1" value="1" name="star-radio" autocomplete="off" />
                                                        <label class="star-label" for="st-1">
                                                            <div class="star-shape"></div>
                                                        </label>
                                                        <input class="star" type="radio" id="st-2" value="2" name="star-radio" autocomplete="off" />
                                                        <label class="star-label" for="st-2">
                                                            <div class="star-shape"></div>
                                                        </label>
                                                        <input class="star" type="radio" id="st-3" value="3" name="star-radio" autocomplete="off" />
                                                        <label class="star-label" for="st-3">
                                                            <div class="star-shape"></div>
                                                        </label>
                                                        <input class="star" type="radio" id="st-4" value="4" name="star-radio" autocomplete="off" />
                                                        <label class="star-label" for="st-4">
                                                            <div class="star-shape"></div>
                                                        </label>
                                                        <input class="star" type="radio" id="st-5" value="5" name="star-radio" autocomplete="off" />
                                                        <label class="star-label" for="st-5">
                                                            <div class="star-shape"></div>
                                                        </label>
                                                        <label class="skip-button" for="skip-star">
                                                            ×
                                                        </label>
                                                    </div>
                                                

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">ความคิดเห็น</label>
                                                <textarea name="comment" class="form-control" rows="3" placeholder="เขียนรีวิวของคุณสิ" required></textarea>                   
                                            </div>
                                            <div class="form-check form-switch mb-3">
                                                <input type="hidden" name="spoiler" value="NoSpoiler">
                                                <input class="form-check-input" type="checkbox" name="spoiler" value="Spoiler" id="spoilerCheck">
                                                <label class="form-check-label text-danger" for="spoilerCheck">
                                                    <i class="bi bi-eye-slash"></i> รีวิวนี้มีการเปิดเผยเนื้อหา
                                                </label>
                                            </div>
                                            </div>
                                         <button type="submit" name="add_review" class="btn btn-info w-100">ส่งรีวิว</button>
                                        </form>
                                    </div>
                                </div>

                                <?php
                                $review_sql = "SELECT review.*, users.user_name, users.img_user 
                    FROM review 
                    JOIN users ON review.user_id = users.user_id 
                    WHERE review.ebook_id = '$ebook_id' 
                    ORDER BY review.created_at DESC";
                                $comment = $conn->query($review_sql);

                                if ($comment->num_rows > 0):
                                    while ($review = $comment->fetch_assoc()):
                                ?>
                                        <div class="d-flex mb-4 p-3 border-bottom">
                                            <div class="flex-shrink-0">
                                                <img src="assets/images/profile/<?php echo $review['img_user']; ?>"
                                                    class="rounded-circle border" width="50" height="50" style="object-fit: cover;">
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fw-bold mb-0"><?php echo htmlspecialchars($review['user_name']); ?></h6>
                                                <div class="text-warning mb-1">
                                                    <?php
                                                    for ($i = 1; $i <= 5; $i++) {

                                                        if ($i <= $review['rating']) {
                                                            echo '★';
                                                        } else {
                                                            echo '☆';
                                                        }
                                                    }
                                                    ?>

                                                    <span class="text-muted small">(<?php echo $review['rating']; ?>/5)</span>
                                                </div>
                                                <p class="mb-1"><?php echo nl2br(htmlspecialchars($review['comment'])); ?></p>
                                                <small class="text-muted">รีวิวเมื่อ: <?php echo date('d/m/Y', strtotime($review['created_at'])); ?></small>
                                                <small class="text-muted">เวลา: <?php echo date('H:i', strtotime($review['created_at'])); ?></small>
                                            </div>
                                        </div>
                                <?php
                                    endwhile;
                                else:
                                    echo '<p class="text-center text-muted">ยังไม่มีรีวิวสำหรับหนังสือเล่มนี้</p>';
                                endif;
                                ?>

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