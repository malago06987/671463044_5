<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">


    <?php if (isset($_SESSION['user_id'])): ?>
     <div class="d-flex align-items-center">
    <div class="dropdown ms-2">
        <?php $user_img = !empty($_SESSION['img_user']) ? $_SESSION['img_user'] : 'default.png'; ?>
        
        <div class="dropdown-toggle d-flex align-items-center" role="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
            <img src="../assets/images/profile/<?php echo $user_img; ?>"
                class="rounded-circle border"
                width="40" height="40"
                style="object-fit: cover;">
            <span class="ms-2 text-white">สวัสดีจ้า <?php echo $_SESSION['user_name']; ?></span>
        </div>

        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="settingsDropdown">
            <li><a class="dropdown-item" href="../profile.php">โปรไฟล์</a></li>
            <li><a class="dropdown-item" href="../up_ebook.php">การอัปโหลด</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="../login/logout.php">ออกจากระบบ</a></li>
        </ul>
    </div>
</div>
    <?php else: ?>
      <a href="#"
        class="btn btn-light btn-lg fw-semibold px-4 rounded-pill shadow-sm"
        data-bs-toggle="modal"
        data-bs-target="#showLogin">
        เข้าสู่ระบบ
      </a>
    <?php endif; ?>



    <div class="navbar navbar-expand-lg navbar-dark bg-info text-white" id="navbarSupportedContent">

       
        

        
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <li class="nav-item">
        <?php 
        $current_path = $_SERVER['PHP_SELF'];
        if (strpos($current_path, '/admin/') !== false) {
            echo '<a class="nav-link" href="../index.php">หน้าหลัก</a>';
        } else {
            echo '<a class="nav-link" href="admin/index.php">หน้าปรับเเต่ง</a>';
        }
        ?>
    </li>
<?php endif; ?>

      </li>
      </ul>
      <form class="d-flex flex-grow-1 ms-3">
        <input class="form-control me-2" type="search" placeholder="ค้นหา">
      </form>
    </div>
  </div>
</nav>