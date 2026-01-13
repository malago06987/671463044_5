<div class="card">
    <div class="card-header d-flex justify-content-end">
   


        <div class="btn-group dropstart">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                เพิ่มอีบุคใหม่
            </button>
            <div class="dropdown-menu p-4" style="min-width: 350px;">
                <form method="POST" action="check/check_addEbook.php" enctype="multipart/form-data">
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
                            while($cat = mysqli_fetch_assoc($categories)) {
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


    



    <div class="card-body">
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

                    $sql = "SELECT ebooks.*, categories.category_name 
                            FROM ebooks 
                            LEFT JOIN categories ON ebooks.category_id = categories.category_id 
                            ORDER BY ebooks.created_at DESC";
                    
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr class="align-middle">
                                <td>
                                    <img src="../assets/images/ebook/<?= $row['image_title'] ?>" width="50" class="border">
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