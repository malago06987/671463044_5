  <!-- เข้าสู่ระบบ-->
        <div class="modal fade" id="showLogin" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content rounded-5">
                    <div class="modal-header bg-info rounded-top-5">
                        <h5 class="modal-title text-white w-100 text-center">เข้าสู่ระบบ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php include "./login/login.php" ?>
                    </div>

                    <div class="modal-footer">
                        หากยังไม่ได้ลงทะเบียน<button type="button" class="btn btn-info"  data-bs-toggle="modal"data-bs-target="#showRegister" data-bs-dismiss="modal">ลงทะเบียน</button>
                    </div>
                </div>
            </div>

        </div>

 <!-- ลงทะเบียน-->
        <div class="modal fade" id="showRegister" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content rounded-5">
                    <div class="modal-header bg-info rounded-top-5">
                        <h5 class="modal-title text-white w-100 text-center">ลงทะเบียน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php include "./login/register.php" ?>
                    </div>

                
                </div>
            </div>

        </div>

         <!-- ลืมรหัส-->
        <div class="modal fade" id="showForget" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content rounded-5">
                    <div class="modal-header bg-info rounded-top-5">
                        <h5 class="modal-title text-white w-100 text-center">ลืมรหัสผ่าน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php include "./login/forget_password.php" ?>
                    </div>

                
                </div>
            </div>

        </div>





     


