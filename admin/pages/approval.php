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
                                <td><?= $row["user_name"] ?></td>
                                <td>
                                    <?php $modalId = "modal_" . $row['ebook_id']; ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
                                        ดูรายละเอียด
                                    </button>

                                    <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="<?= $modalId ?>Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="<?= $modalId ?>Label">รายละเอียด: <?= $row["title"] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="../assets/images/ebook/<?= $row['image_title'] ?>" class="img-fluid border mb-3">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p><strong>ชื่อเรื่อง:</strong> <?= $row["title"] ?></p>
                                                            <p><strong>ผู้แต่ง:</strong> <?= $row["author"] ?></p>
                                                            <p><strong>หมวดหมู่:</strong> <?= $row["category_name"] ?></p>
                                                            <p><strong>วันที่อัปโหลด:</strong> <?= date('d/m/Y', strtotime($row["created_at"])) ?></p>
                                                            <p><strong>รายละเอียด:</strong></p>
                                                            <p><? ($row["description"]) ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php if ($row['status'] == 'waiting'): ?>
                                        <a href="check/check_approval.php?id=<?= $row['ebook_id'] ?>&status=approve"
                                            class="btn btn-sm btn-success"
                                            onclick="return confirm('ยืนยันการอนุมัติ')">
                                            อนุมัติ
                                        </a>

                                        <a href="check/check_approval.php?id=<?= $row['ebook_id'] ?>&status=rejected"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('ยืนยันการไม่อนุมัติ')">
                                            ไม่อนุมัติ
                                        </a>
                                    <?php endif; ?>

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