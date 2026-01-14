<div class="card shadow-sm">
    <table class="table table-bordered bg-white" id="myEbookTable">
        <thead class="table-secondary text-center">
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="10%">ผู้แจ้ง</th>
                <th width="15%">หนังสือที่เกี่ยวข้อง</th>
                <th>ข้อความที่ถูกรายงาน</th>
                <th width="20%">เหตุผลการรายงาน</th>
                <th width="12%">วันที่แจ้ง</th>
                <th width="10%">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT r.report_id, r.report_data, r.created_at, 
                           u.user_name AS reporter_name, 
                           rev.comment AS reported_comment, rev.review_id,
                           eb.title AS ebook_title
                    FROM report r
                    JOIN users u ON r.user_id = u.user_id
                    JOIN review rev ON r.review_id = rev.review_id
                    JOIN ebooks eb ON rev.ebook_id = eb.ebook_id
                    ORDER BY r.report_id ASC";
            
            $result = mysqli_query($conn, $sql);
            $no = 1;

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td><?= $row["reporter_name"] ?></td>
                        <td><?= $row["ebook_title"] ?></td>
                        <td><small class="text-muted"><?= $row["reported_comment"] ?></small></td>
                        <td class="text-danger fw-bold"><?= $row["report_data"] ?></td>
                        <td class="text-center"><?= date('d/m/Y', strtotime($row["created_at"])) ?></td>
                        <td class="text-center">
                            <a href="check/check_report.php?review_id=<?= $row['review_id'] ?>&report_id=<?= $row['report_id'] ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('ยืนยันที่จะลบรีวิวนี้หรือไม่?')">
                                ลบรีวิว
                            </a>
                        </td>
                    </tr>
            <?php
                    $no++;
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูลการรายงาน</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>