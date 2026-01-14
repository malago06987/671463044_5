<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid">


    <?php if (isset($_SESSION['user_id'])): ?>
    <div class="d-flex align-items-center">
    <div class="dropdown ms-2">
        <?php $user_img = !empty($_SESSION['img_user']) ? $_SESSION['img_user'] : 'default.png'; ?>
        
        <div class="dropdown-toggle d-flex align-items-center" role="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
            <img src="./assets/images/profile/<?php echo $user_img; ?>"
                class="rounded-circle border"
                width="40" height="40"
                style="object-fit: cover;">
            <span class="ms-2 text-white">สวัสดีจ้า <?php echo $_SESSION['user_name']; ?></span>
        </div>

        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="settingsDropdown">
            <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person"></i> โปรไฟล์</a></li>
            <li><a class="dropdown-item" href="up_ebook.php"><i class="bi bi-upload"></i>   การอัปโหลด</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="./login/logout.php">ออกจากระบบ</a></li>
        </ul>
    </div>
</div>
    <?php else: ?>
      <a href="#"
        class="btn btn-light btn-lg fw-semibold px-5 shadow-sm "
        data-bs-toggle="modal"
        data-bs-target="#showLogin">
        เข้าสู่ระบบ
      </a>
    <?php endif; ?>



    <div class="navbar navbar-expand-lg navbar-dark bg-info text-white" id="navbarSupportedContent">
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
            $result1 = $conn->query("SELECT * FROM categories ORDER BY category_name ASC");

            while ($row = $result1->fetch_assoc()) {
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
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
  <li class="nav-item">
    <a class="nav-link" href="admin/index.php">หน้าปรับเเต่ง</a>
  </li>
<?php endif; ?>

      </li>
      </ul>
  
        <div class="d-flex flex-grow-1 ms-3">
                <input type="search" class="form-control form-control-lg" id="search" placeholder="ค้นหา" aria-label="Search">
            </div>
    </div>
  </div>
</nav>