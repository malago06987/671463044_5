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

    
  </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>หมวดหมู่</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM categories ORDER BY category_id ASC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?= $row["category_id"] ?></td>
                        <td><?= $row["category_name"] ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr>ไม่มีข้อมูลหมวดหมู่</tr>";
            }

            ?>
        </tbody>
    </table>

</div>




