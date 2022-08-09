  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="my-auto">Testimoni</h2>
        </div>
      </div>
    </section>
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">
        <div class="row">
          <?php
          $delay = 0;
          foreach ($testimoni as $t) {
          ?>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
              <div class="testimonial-item mt-4">
                <img src="<?= base_url($t->foto_testimoni) ?>" style="height: 90px; width: 90px" class="testimonial-img" alt="">
                <h3><?= $t->nama_testimoni ?></h3>
                <h4><?= $t->asal_testimoni ?></h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?= $t->deskripsi_testimoni ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          <?php
            $delay = $delay + 100;
          }
          ?>
        </div>
      </div>
    </section>
  </main>