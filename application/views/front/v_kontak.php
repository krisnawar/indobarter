  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="my-auto">Kontak Kami</h2>
        </div>
      </div>
    </section>
    <div class="map-section">
      <style type="text/css" media="screen">
        iframe {
          width: 100%;
          height: 350px;
          border: 0;
        }
      </style>
      <?= html_entity_decode($perusahaan->maps_perusahaan) ?>
    </div>
    <section id="contact" class="contact">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="icofont-google-map"></i>
                  <h4>Alamat:</h4>
                  <p><?= $perusahaan->alamat_perusahaan ?></p>
                </div>
                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>
                    <?php
                    if ($perusahaan->email_perusahaan != '' || $perusahaan->email_perusahaan != null) {
                      echo '<a href="mailto:' . $perusahaan->email_perusahaan . '" style="color: #444444">' . $perusahaan->email_perusahaan . '</a><br>';
                    }
                    if ($perusahaan->email_alternatif != '' || $perusahaan->email_alternatif != null) {
                      echo '<a href="mailto:' . $perusahaan->email_alternatif . '" style="color: #444444">' . $perusahaan->email_alternatif . '</a>';
                    }
                    ?>
                  </p>
                </div>
                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-phone"></i>
                  <h4>Nomor Telepon:</h4>
                  <p>
                    <?php
                    if ($perusahaan->no_telp != '' || $perusahaan->no_telp != null) {
                      echo $perusahaan->no_telp . '<br>';
                    }
                    if ($perusahaan->no_hp != '' || $perusahaan->no_hp != null) {
                      echo $perusahaan->no_hp;
                    }
                    ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>