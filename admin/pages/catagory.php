<div class="card">
    
  <div class="card-header d-flex justify-content-end">
  
<div class="btn-group dropstart">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    เพิ่ม
  </button>
 <div class="dropdown-menu dropdown-menu-end p-2" style="min-width: 260px;">
      <!-- Dropdown menu links -->
      <div class="card rounded-0 border-0">
<form method="POST" action="check/check_catagory.php">
    <label class="form-label fw-bold">เพิ่มหมวดหมู่</label>
    <input type="text" name="category_name" class="form-control mb-2" required> 
    <button type="submit" name="add_category" class="btn btn-success btn-sm w-100">บันทึก</button>
</form>
      </div>
    </div>
  </div>
</div>

        <table class="table table-bordered  bg-white">
            <thead class="table-secondary text-center">
                <tr>
                    <th width="10%">ลำดับ</th>
                    <th>ชื่อหมวดหมู่</th>
                    <th width="20%">การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM categories ORDER BY category_id ASC";
                $result = mysqli_query($conn, $sql);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td class="text-center"><?= $no ?></td>
                            <td><?= $row["category_name"] ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editCategoryModal"
                                        data-id="<?= $row['category_id'] ?>"
                                        data-name="<?= $row['category_name'] ?>">
                                    แก้ไข
                                </button>
                                
                                <a href="check/check_catagory.php?delete_id=<?= $row['category_id'] ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('ยืนยันการลบหมวดหมู่ [<?= $row['category_name'] ?>] ?')">
                                    ลบ
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









    <div class="modal fade" id="editCategoryModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="check/check_catagory.php" class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title">แก้ไขหมวดหมู่</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="category_id" id="edit_id">

        <label class="form-label">ชื่อหมวดหมู่</label>
        <input type="text" name="category_name" id="edit_name" class="form-control" required>
      </div>

      <div class="modal-footer">
        <button type="submit" name="update_category" class="btn btn-success">บันทึก</button>
      </div>

    </form>
  </div>
</div>

<script>
  const editCategoryModal = document.getElementById('editCategoryModal');
  editCategoryModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_name').value = name;
  });
</script>



