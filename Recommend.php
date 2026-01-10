<?php 
session_start();
include "./database/connectDB.php"



?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
        
</head>

<body>
    <header>
        <?php include "./include/navbar.php" ?>
    </header>
    <main>

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


อันนี้ทดสอบเฉยๆ
    </main>

    <footer>
      <?php include "./include/footer.php" ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

        <script src="./assets/js.js"></script>
</body>

</html>