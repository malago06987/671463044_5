<!-- Remove the container if you want to extend the Footer to full width. -->

    <!-- Footer -->
    <footer class="text-center text-white bg-info">
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Links -->
            <section class="mt-5">
                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center pt-5">
                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">About us</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">Products</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">Awards</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">Help</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#!" class="text-white">Contact</a>
                        </h6>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-2" />

            <!-- Section: Text -->
            <section class="mb-2">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>
นี่คือชุมชนคนที่สนใจเรื่องราวของอีบุคหลากหลายประเภท มีไว้เพื่อเเนะนำ พูดคุยเเละการค้นหาอีบบุคเล่มใหม่ๆ
                        </p>
                    </div>
                </div>
                 <div class="col-md-5 offset-md-1 mb-3">
              <form action="send_email/mail.php" method="post">
    <h5>ส่งข้อความเพื่อให้คำแนะนำใหม่ๆ ในการพัฒนาเว็บไซต์ให้ดีขึ้น</h5>
    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
        <input id="newsletter1" name="message" type="text" class="form-control" placeholder="อธิบายสิ่งที่ต้องการ" required>
        
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        
        <button class="btn btn-primary" type="submit">ส่ง</button>
    </div>
</form>
            </div>

            </section>
            <!-- Section: Text -->

            <!-- Section: Social -->
            <section class="text-center mb-1">
                <a href="" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-github"></i>
                </a>
            </section>
            <!-- Section: Social -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div
            class="text-center p-2"
            style="background-color: rgba(0, 0, 0, 0.2)">
            © 2026 Copyright:
            <a class="text-white" >เดชา ลาคำ</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

<!-- End of .container -->
 