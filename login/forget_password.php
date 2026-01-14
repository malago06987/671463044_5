<div class="d-flex justify-content-center">
  <div class="card text-center border-0" style="width: 25rem;">


    <img src="./assets/images/LOGO/LOGO.png"
      class="rounded-circle mx-auto d-block border p-1 mt-3"
      alt="โลโก้"
      width="100">

    <hr class="my-3">


    <div class="card-body">
      <h5 class="card-title mb-3">กรุณากรอกอีเมล</h5>
<form action="../send_email/send_forget.php" method="POST">
      <input
        type="email"
        class="form-control mb-3"
        id="email"
        name="email"
        placeholder="กรอกอีเมล"
        required>

      <button type="submit" class="btn btn-primary w-100">
        ยืนยัน
      </button>
</form>
    </div>


    <div class="card-body pt-0">
      <a href="#"
        class="card-link"
        data-bs-toggle="modal"
        data-bs-target="#showLogin"
        data-bs-dismiss="modal">
        กลับสู่หน้าลงทะเบียน
      </a>
    </div>

  </div>
</div>