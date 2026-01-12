<div class="card">
        <table class="table table-bordered  bg-white" id="myEbookTable">
            <thead class="table-secondary text-center">
                <tr>
                    <th width="10%">ลำดับ</th>
                    <th width="10%">ID</th>
                    <th>ชื่อผู้ใช้</th>
                    <th width="25%">อีเมล</th>
                    <th width="10%">บทบาท</th>
                    <th width="10%">สร้างเมื่อ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users ORDER BY user_id ASC";
                $result = mysqli_query($conn, $sql);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td class="text-center"><?= $no ?></td>
                            <td><?= $row["user_id"] ?></td>
                            <td><?= $row["user_name"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["role"] ?></td>
                            <td><?= date('d/m/Y', strtotime($row["created_at"])) ?></td>
                       
                        </tr>
                <?php
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>ไม่มีข้อมูลผู้ใช้</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>