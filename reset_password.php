<?php 
session_start();

?>
<!doctype html>
<html lang="en">
    <head>
        <title>รีเซ็ครหัส</title>
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
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>



        <div class="d-flex justify-content-center mt-5">
    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title text-center">ตั้งรหัสผ่านใหม่</h5>
            <p class="text-muted text-center">สำหรับอีเมล: <?php echo ($email); ?></p>
            
            <form action="login/check/check_reset_password.php" method="POST">
                <input type="hidden" name="email" value="<?php echo ($email); ?>">
                
                <div class="mb-3">
                    <label class="form-label">รหัสผ่านใหม่</label>
                    <input type="password" name="new_password" class="form-control" required placeholder="กรอกรหัสผ่านใหม่">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" name="confirm_password" class="form-control" required placeholder="ยืนยันรหัสผ่าน">
                </div>
                
                <button type="submit" class="btn btn-primary w-100">บันทึกรหัสผ่านใหม่</button>
            </form>
        </div>
    </div>
</div>
        </main>
        <footer>
            <!-- place footer here -->
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
