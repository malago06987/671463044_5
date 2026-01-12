<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;}
include "./database/connectDB.php";


$user_id = $_SESSION['user_id'];
$sql = "SELECT user_name, img_user FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

?>


<!doctype html>
<html lang="en">
  <head>
    <title>โปรไฟล์</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"

    />
  </head>

  <body>
    <header>
      <!-- place navbar here -->
        <?php include "./include/navbar.php" ?>
    </header>



    <main>
<div class="card mx-auto mt-5" style="width: 30rem;">
  <h5 class="card-header text-center">เเก้ไขโปรไฟล์</h5>

   <div class="card-body">
         <img src="./assets/images/profile/<?php echo $user_img; ?>"
          class="rounded-circle border mx-auto d-block my-3"
          width="200" height="200"
          style="object-fit: cover;">
<form method="POST" action="login/check/check_profile.php"  enctype="multipart/form-data" >
      <div class="text-start mt-0">
          <label>เลือกรูปภาพ:</label>
          <input type="file" name="img_profile" class="form-control mb-2"accept="image/*"  >
        </div>
  <div class="mb-2 text-start">
<label class="form-label">ชื่อผู้ใช้</label>
<input type="text" name="user_name" id="user_name"class="form-control">
</div>
 <div class="mb-2 text-start">
<label class="form-label">รหัสผ่านเดิม</label>
<input type="password" name="user_password" id="user_password" class="form-control">
</div>
 <div class="mb-2 text-start">
<label class="form-label">รหัสผ่านใหม่</label>
<input type="password" name="new_pass" id="new_pass"class="form-control">
</div>


     <button type="submit" class="btn btn-success w-100">
        บันทึกการเปลี่ยนแปลง
      </button>

</form>
    </div>
</div>


    </main>



    <footer>
      <!-- place footer here -->
         <?php include "./include/footer.php" ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
