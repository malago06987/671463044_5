<div class="d-flex justify-content-center">
  <div class="card text-center border-0" style="width: 25rem;">
    <img id="addPreview" class="rounded-circle mx-auto d-block border p-1" width="120" height="120" style="object-fit: cover; background-color: #f8f9fa;">

    <hr class="my-2">

    <div class="card-body">
      <h5 class="card-title">เลือกรูปโปรไฟล์ของคุณ</h5>
    </div>
    <ul class="list-group list-group-flush">
      <form class="login-form" method="post" action="check/check_register.php" id="registerForm" enctype="multipart/form-data">
        
      <div class="text-start mt-0">
          <label>เลือกรูปภาพ:</label>
          <input type="file" name="img_profile" class="form-control mb-2"
            accept="image/*" onchange="previewAddImage(event)">
        </div>

        <div class="text-start mt-1">
          <label for="user_name">ชื่อ</label>
          <input type="text" name="user_name" id="user_name" class="form-control" placeholder="UserName" required>
        </div>
        <div class="text-start mt-2">
          <label for="password">อีเมล</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="email" required>
        </div>
        <div class="text-start mt-2">
          <label for="password">รหัสผ่าน</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="text-start mt-2">
          <label for="password">คอนเฟิร์มรหัสผ่าน</label>
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="confirm password" required>
        </div>
        <div class="form-group mt-3">
          <button type="submit" name="login" class="btn btn-primary w-100">ลงทะเบียน</button>
        </div>
      </form>


    </ul>
    <div class="card-body">
      <a href="#" class="card-link " data-bs-toggle="modal" data-bs-target="#showLogin" data-bs-dismiss="modal">กลับสู่หน้าลงทะเบียน</a>
    </div>
  </div>
</div>