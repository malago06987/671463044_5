
<div class="d-flex justify-content-center">
 <div class="card text-center border-0" style="width: 25rem;">
<img src="./assets/images/LOGO/LOGO.png"class="rounded-circle mx-auto d-block border p-1"alt="โลโก้"width="100">
<hr class="my-3">
  <ul class="list-group list-group-flush">
     <form class="login-form" method="post" action="login/check/check_login.php" id="loginForm">
                  <div class="text-start mt-2">
                    <label for="login_user_name">ชื่อ</label>
                    <input type="text" name="user_name" id="login_user_name" class="form-control" placeholder="UserName" required>
                  </div>
                  <div class="text-start mt-2">
                    <label for="login_password">รหัสผ่าน</label>
                    <input type="password" name="password" id="login_password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group mt-3">
                    <button type="submit" name="login" class="btn btn-primary w-100">ล็อคอิน</button>
                  </div>
                  
                </form>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#showForget" data-bs-dismiss="modal">ลืมรหัสผ่าน</a>
  </div>
</div>
</div>
