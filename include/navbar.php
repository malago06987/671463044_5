<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">


    <?php if (isset($_SESSION['user_id'])): ?>
      <div class="d-flex align-items-center">
        <?php
        $user_img = !empty($_SESSION['img_user']) ? $_SESSION['img_user'] : 'default.png';
        ?>
        <img src="./assets/images/profile/<?php echo $user_img; ?>"
          class="rounded-circle border"
          width="40" height="40"
          style="object-fit: cover;">
        <span class="ms-2 text-white">สวัสดีจ้า <?php echo $_SESSION['user_name']; ?></span>

        <div class="dropdown ms-2">
          <a class="text-white text-decoration-none" href="#" role="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
              <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
            </svg>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
            <li><a class="dropdown-item" href="#">โปรไฟล์</a></li>
            <li><a class="dropdown-item" href="./login/logout.php">ออกจากระบบ</a></li>
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



    <div class="navbar navbar-expand-lg navbar-dark bg-success text-white" id="navbarSupportedContent">
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
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <li class="nav-item">
          <a class="nav-link" href="admin/index.php">หน้าปรับเเต่ง</a>
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