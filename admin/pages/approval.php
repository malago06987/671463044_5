<div class="card">







    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="myEbookTable">
                <thead>
                    <tr>
                        <th width="5%">ลำดับ</th>
                        <th width="25%">ชื่อเรื่อง</th>
                        <th width="15">หมวดหมู่</th>
                        <th width="5">สถานะ</th>
                        <th width="2">วันที่อัปโหลด</th>
                        <th width="10">อัปโหลด</th>
                        <th width="10">เพิ่มเติม</th>
                        <th width="10">การอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

$sql = "SELECT ebooks.*, categories.category_name, users.user_name 
        FROM ebooks 
        LEFT JOIN categories ON ebooks.category_id = categories.category_id 
        LEFT JOIN users ON ebooks.user_id = users.user_id 
        ORDER BY ebooks.created_at DESC";
                    $result = mysqli_query($conn, $sql);
                    $no = 1;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td class="text-center"><?= $no ?></td>
                                <td><?= $row["title"] ?></td>
                                <td><?= $row["category_name"] ?></td>
                                <td> <?= $row["status"] ?>
                                </td>
                                <td><?= date('d/m/Y', strtotime($row["created_at"])) ?></td>
                                <td><?= $row["user_name"] ?></td>
                                <td>
<?php $collapseId = "collapse_" . $row['ebook_id']; ?>
<p class="d-inline-flex gap-1">
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $collapseId ?>" aria-expanded="false" aria-controls="<?= $collapseId ?>">
    ดู
  </button>
</p>
<div class="collapse" id="<?= $collapseId ?>">
  <div class="card card-body">
    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
  </div>
</div>

</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal"
                                        data-id="<?= $row['category_id'] ?>"
                                        data-name="<?= $row['category_name'] ?>">
                                        อนุมัติ
                                    </button>

                                    <a href="check/check_catagory.php?delete_id=<?= $row['ebook_id'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('ยืนยันการไม่อนุมัต [<?= $row['title'] ?>] ?')">
                                        ไม่อนุมัติ
                                    </a>
                                </td>
                            </tr>
                    <?php
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>ไม่มีข้อมูลหมวดหมู่</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>








