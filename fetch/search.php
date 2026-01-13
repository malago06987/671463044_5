<?php
include("../database/connectDB.php");
$data1 = $_GET["data1"] ?? "";

$sql = "SELECT ebooks.*, categories.category_name 
        FROM ebooks 
        LEFT JOIN categories ON ebooks.category_id = categories.category_id 
        WHERE (ebooks.title LIKE '%$data1%'
        OR ebooks.author LIKE '%$data1%')
        AND ebooks.status = 'approve'
        ORDER BY ebooks.created_at DESC";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<div class='col-12 mt-3 text-center text-danger'>ไม่พบข้อมูล</div>";
    exit;
}

while ($row = $result->fetch_assoc()) {
    $short_detail = mb_substr($row['title'], 0, 100, 'UTF-8') . '...';
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

                <h5 class="card-title fw-bold text-truncate">
                    <?php echo $row['title']; ?>
                </h5>

                <p class="card-text text-muted small mb-1">
                    โดย: <?php echo $row['author']; ?>
                </p>

                <p class="card-text text-muted small flex-grow-1">
                    <?php echo mb_substr($row['description'], 0, 60, 'UTF-8') . '...'; ?>
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
?>
