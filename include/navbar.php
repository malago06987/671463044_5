<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
  <span class="navbar-toggler-icon"></span>
</button>
<?php if (isset($_SESSION['user_id'])): ?>
      <div class="d-flex align-items-center">
        <?php 
          // เช็คว่ามีรูปโปรไฟล์ไหม ถ้าไม่มีให้ใช้รูป Default
          $user_img = !empty($_SESSION['img_user']) ? $_SESSION['img_user'] : 'default.png'; 
        ?>
        <img src="./assets/images/profile/<?php echo $user_img; ?>" 
             class="rounded-circle border" 
             width="40" height="40" 
             style="object-fit: cover;">
        <span class="ms-2 text-white">ยินดีต้อนรับ, <?php echo $_SESSION['user_name']; ?></span>
        <a href="./login/logout.php" class="btn btn-outline-light btn-sm ms-3">ออกจากระบบ</a>
      </div>

    <?php else: ?>
      <a class="navbar-brand" href="#" data-bs-toggle="modal" data-bs-target="#showLogin">ลงทะเบียนเพื่อเข้าร่วม</a>
    <?php endif; ?>


    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./Recommend.php">เเนะนำ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            อีบุคทั้งหมด
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
            $result = $conn->query("SELECT * FROM categories ORDER BY category_name ASC");

            while ($row = $result->fetch_assoc()) {
              echo "
            <li>
        <a class='dropdown-item' href='index.php?cat_id={$row['category_id']}'>
            {$row['category_name']}
        </a>
             </li>";
            }
            ?>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">รอคิดว่าจะใส่ไร</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex w-25">
        <input class="form-control me-2 " type="search" placeholder="ค้นหา" aria-label="Search">

      </form>
    </div>
  </div>
</nav>