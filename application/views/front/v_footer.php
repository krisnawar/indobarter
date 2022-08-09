  <?php $url_bootstrap = base_url('assets/front/') ?>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 footer-contact">
            <h3><?= $perusahaan->nama_perusahaan ?></h3>
            <p>
              <strong>Alamat:</strong><br>
              <?= $perusahaan->alamat_perusahaan ?><br><br>
              <?php
              if ($perusahaan->no_telp != '' || $perusahaan->no_telp != null || $perusahaan->no_hp != '' || $perusahaan->no_hp != null) {
                echo '<strong>Nomor Telepon:</strong><br>';
              }
              if ($perusahaan->no_telp != '' || $perusahaan->no_telp != null) {
                echo $perusahaan->no_telp . '<br>';
              }
              if ($perusahaan->no_hp != '' || $perusahaan->no_hp != null) {
                echo $perusahaan->no_hp . '<br>';
              }
              ?>
              <br>
              <?php
              if ($perusahaan->email_perusahaan != '' || $perusahaan->email_perusahaan != null || $perusahaan->email_alternatif != '' || $perusahaan->email_alternatif != null) {
                echo '<strong>Email:</strong><br>';
              }
              if ($perusahaan->email_perusahaan != '' || $perusahaan->email_perusahaan != null) {
                echo '<a href="mailto:' . $perusahaan->email_perusahaan . '" style="color: rgba(255, 255, 255, 0.7)">' . $perusahaan->email_perusahaan . '</a><br>';
              }
              if ($perusahaan->email_alternatif != '' || $perusahaan->email_alternatif != null) {
                echo '<a href="mailto:' . $perusahaan->email_alternatif . '" style="color: rgba(255, 255, 255, 0.7)">' . $perusahaan->email_alternatif . '</a>';
              }
              ?>
            </p>
          </div>
          <div class="col-lg-4 col-md-6 footer-links">
            <h3>Produk Kami</h3>
            <ul>
              <?php
              foreach ($produk as $p) {
              ?>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="<?= base_url('p/detailproduk/' . substr(sha1($p->id_produk), 16, 7)) ?>"><?= $p->nama_produk ?></a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 footer-links">
            <h3>Marketplace Lain</h3>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="https://www.tokopedia.com/indobarter/">Tokopedia Indobarter</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="https://shopee.com/">Shopee Indobarter*</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span><?= $perusahaan->nama_perusahaan ?></span></strong>. Developed by <a href="https://bayusapp.com" target="_blank"><strong><span>Bayu SAPP</span></strong></a> & <a href="https://instagram.com/krisna.war" target="_blank"><strong><span>Krisna WAR</span></strong></a>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <?php
        if ($perusahaan->facebook_perusahaan) {
          echo '<a href="' . $perusahaan->facebook_perusahaan . '" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a> ';
        }
        if ($perusahaan->twitter_perusahaan) {
          echo '<a href="' . $perusahaan->twitter_perusahaan . '" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a> ';
        }
        if ($perusahaan->instagram_perusahaan) {
          echo '<a href="' . $perusahaan->instagram_perusahaan . '" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a> ';
        }
        if ($perusahaan->whatsapp_perusahaan) {
          echo '<a href="http://wa.me/' . $perusahaan->whatsapp_perusahaan . '" target="_blank" class="facebook"><i class="bx bxl-whatsapp"></i></a> ';
        }
        ?>
      </div>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <!-- Vendor JS Files -->
  <script src="<?= $url_bootstrap ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/php-email-form/validate.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/venobox/venobox.min.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= $url_bootstrap ?>vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="<?= $url_bootstrap ?>js/main.js"></script>
  </body>

  </html>